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
        $session = session();
        $userId = $session->get('id');

        if (!$userId) {
            return redirect()->to(base_url('/login'))->with('error', 'Please log in to update your profile.');
        }

        $userModel = new \App\Models\UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        if ($userModel->update($userId, $data)) {
            return redirect()->to('user_profile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }

    public function viewUnits()
    {
        $model = new UnitModel();
        $data['units'] = $model->fetchUnitsWithCategory();

        return view('unit_list', $data);
    }

    public function rentUnit($unitId)
    {
        helper(['form']);
        $unitModel = new UnitModel();
        $rentalModel = new RentalModel();

        $unit = $unitModel->getUnitDetails($unitId);
        if (!$unit) {
            return redirect()->back()->with('error', 'Unit not found.');
        }

        // // Check if user has already rented 2 items
        // if ($rentalModel->countUserRentals(session()->get('id')) >= 2) {
        //     return redirect()->back()->with('error', 'You can only rent up to 2 units at a time.');
        // }

        // Show rental form
        return view('rent_unit', ['unit' => $unit]);
    }

    public function processRental()
    {
        $unitModel = new UnitModel();
        $rentalModel = new RentalModel();

        $unitId = $this->request->getPost('unit_id');
        $duration = $this->request->getPost('duration');
        $type = $this->request->getPost('type');

        $unit = $unitModel->getUnitDetails($unitId);
        if ($unit['stock'] < 1) {
            return redirect()->back()->with('error', 'This unit is currently out of stock.');
        }

        $cost = $type === 'day' ? $unit['cost_rent_per_day'] * $duration : $unit['cost_rent_per_month'] * $duration;

        $rentalData = [
            'user_id' => session()->get('id'),
            'unit_id' => $unitId,
            'days_rented' => $type === 'day' ? $duration : $duration * 30,
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
        $model = new RentalModel();
        $userId = session()->get('id');
        $data['rentals'] = $model->getUserRentals($userId);

        return view('my_rentals', $data);
    }

    public function payRental($rentalId)
    {
        $model = new RentalModel();
        if ($model->updatePaymentStatus($rentalId, 'paid')) {
            return redirect()->to('my_rentals')->with('success', 'Payment successful');
        } else {
            return redirect()->to('my_rentals')->with('error', 'Payment failed');
        }
    }

    public function returnRental($id)
    {
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

        $updateData = ['status_rent' => 'waiting_return'];

        if ($daysRented > $policy['max_rental_days']) {
            $overdueDays = $daysRented - $policy['max_rental_days'];
            $overdueFee = $overdueDays * $policy['overdue_fee_per_day'];
            $updateData['status_paid'] = 'due';
            // Optionally update cost to include the overdue fee
            $updateData['cost'] += $overdueFee;
        }

        $model->update($id, $updateData);

        return redirect()->to('my_rentals')->with('success', 'Return initiated successfully. Please wait for admin approval.');
    }
}
