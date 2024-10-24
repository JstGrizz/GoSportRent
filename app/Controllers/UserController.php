<?php

namespace App\Controllers;

use App\Models\UnitModel;

use App\Models\RentalModel;

use App\Models\PolicyModel;

class UserController extends BaseController
{
    public function index()
    {
        // Ensure you have an admin dashboard view
        return view('dashboard');
    }

    public function userProfile()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }

        $session = session();
        $userId = $session->get('id');  // Assuming user_id is stored in session

        if (!$userId) {
            return redirect()->to(base_url('/login'))->with('error', 'Please log in to view your profile.');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to(base_url('/login'))->with('error', 'User not found.');
        }

        return view('user_profile', ['user' => $user]);
    }

    public function editProfile()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }

        $session = session();
        $userId = $session->get('id');

        if (!$userId) {
            return redirect()->to(base_url('/login'))->with('error', 'Please log in to edit your profile.');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to(base_url('/login'))->with('error', 'User not found.');
        }

        return view('edit_profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }

        $session = session();
        $userId = $session->get('id');

        if (!$userId) {
            return redirect()->to(base_url('/login'))->with('error', 'Please log in to update your profile.');
        }

        $userModel = new \App\Models\UserModel();
        $newEmail = $this->request->getPost('email');
        $currentData = $userModel->find($userId);

        if ($newEmail !== $currentData['email']) {
            $existingUser = $userModel->where('email', $newEmail)->where('id !=', $userId)->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'Email already in use by another account.');
            }
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $newEmail,
        ];

        if ($userModel->update($userId, $data)) {
            return redirect()->to('user_profile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }


    public function viewUnits()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }

        $model = new UnitModel();
        $data['units'] = $model->fetchUnitsWithCategories();

        return view('unit_list', $data);
    }


    public function rentUnit($unitId)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }

        $userId = session()->get('id');

        helper(['form']);
        $unitModel = new UnitModel();
        $rentalModel = new RentalModel();

        $unit = $unitModel->getUnitDetails($unitId);
        if (!$unit) {
            return redirect()->back()->with('error', 'Unit not found.');
        }

        if ($unit['stock'] <= 0) {
            return redirect()->to('unit_list')->with('error', 'Stock is empty.');
        }

        return view('rent_unit', ['unit' => $unit]);
    }

    public function processRental()
    {

        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }


        $unitModel = new UnitModel();
        $rentalModel = new RentalModel();

        $userId = session()->get('id');
        $unitId = $this->request->getPost('unit_id');
        $amount = $this->request->getPost('amount');
        $duration = $this->request->getPost('duration');
        $type = $this->request->getPost('type');

        $unit = $unitModel->getUnitDetails($unitId);

        $cost = ($type === 'day' ? $unit['cost_rent_per_day'] : $unit['cost_rent_per_month']) * $duration * $amount;

        if ($amount > 2) {
            return redirect()->back()->with('error', "Can't Rent More Than Two");
        } else if ($amount > $unit['stock']) {
            return redirect()->back()->with('error', "Stock isn't enough");
        }

        $rentalData = [
            'user_id' => $userId,
            'unit_id' => $unitId,
            'days_rented' => $type === 'day' ? $duration : $duration * 30,
            'amount' => $amount,
            'cost' => $cost,
            'status_rent' => 'waiting_approval'
        ];

        if ($rentalModel->createRental($rentalData)) {
            return redirect()->to('my_rentals')->with('success', 'Rental request submitted successfully. Waiting for admin approval.');
        } else {
            return redirect()->back()->with('error', 'Failed to create rental.');
        }
    }


    public function myRentals()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }


        $model = new RentalModel();
        $userId = session()->get('id');
        $data['rentals'] = $model->getUserRentals($userId);

        return view('my_rentals', $data);
    }

    public function payRental($rentalId)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }


        $model = new RentalModel();
        if ($model->updatePaymentStatus($rentalId, 'paid')) {
            return redirect()->to('my_rentals')->with('success', 'Payment successful');
        } else {
            return redirect()->to('my_rentals')->with('error', 'Payment failed');
        }
    }

    public function returnRental($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }


        $model = new RentalModel();
        $rental = $model->find($id);

        if (!$rental || $rental['user_id'] !== session()->get('id')) {
            return redirect()->to('my_rentals')->with('error', 'Invalid rental record.');
        }

        $policyModel = new PolicyModel();
        $policy = $policyModel->first();

        $rentalDate = new \DateTime($rental['rental_date']);
        $today = new \DateTime();
        $interval = $rentalDate->diff($today);
        $daysRented = $interval->days;

        $updateData = [
            'status_rent' => 'waiting_return',
            'cost' => $rental['cost']
        ];

        if ($daysRented > $policy['max_rental_days']) {
            $overdueDays = $daysRented - $policy['max_rental_days'];
            $overdueFee = $overdueDays * $policy['overdue_fee_per_day'];
            $updateData['status_paid'] = 'paid_with_fee';
            $updateData['cost'] += $overdueFee;
        }

        $model->update($id, $updateData);

        return redirect()->to('my_rentals')->with('success', 'Return initiated successfully. Please wait for admin approval.');
    }
}
