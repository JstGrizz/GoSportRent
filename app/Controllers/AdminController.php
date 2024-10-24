<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Models\CategoryModel;

use App\Models\UnitModel;

use App\Models\RentalModel;

class AdminController extends BaseController
{
    public function index()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        return view('admin/dashboard');
    }

    public function users()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('admin/users', $data);
    }

    public function createUser()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        return view('admin/create_user');
    }


    public function storeUser()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role')
        ];

        if ($model->save($data)) {
            return redirect()->to(base_url('admin/users'))->with('success', 'User successfully added');
        } else {
            return redirect()->to(base_url('admin/create_user'))->with('error', 'Failed to add user');
        }
    }

    public function editUser($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('admin/edit_user', $data);
    }

    public function updateUser($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role')
        ];
        $model->update($id, $data);
        return redirect()->to('/admin/users');
    }

    public function deleteUser($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/admin/users');
    }


    public function categories()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new CategoryModel();
        $data['categories'] = $model->findAll();
        return view('admin/categories', $data);
    }

    public function createCategory()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        return view('admin/create_category');
    }

    public function storeCategory()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new CategoryModel();
        $model->save([
            'name' => $this->request->getPost('name')
        ]);
        return redirect()->to('/admin/categories');
    }

    public function editCategory($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new CategoryModel();
        $data['category'] = $model->find($id);
        return view('admin/edit_category', $data);
    }

    public function updateCategory($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new CategoryModel();
        $model->update($id, [
            'name' => $this->request->getPost('name')
        ]);
        return redirect()->to('/admin/categories');
    }

    public function deleteCategory($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new CategoryModel();
        $model->delete($id);
        return redirect()->to('/admin/categories');
    }

    public function units()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new UnitModel();
        $data['units'] = $model->fetchUnitsWithCategory();
        return view('admin/units', $data);
    }


    public function createUnit()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        return view('admin/create_unit', $data);
    }

    public function storeUnit()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        helper('text');  // Load the text helper

        $model = new UnitModel();
        $img = $this->request->getFile('image');
        $newImageName = '';
        $targetPath = FCPATH . 'Assets/image/';

        if ($img->isValid() && !$img->hasMoved()) {
            $newImageName = $img->getRandomName();
            $img->move($targetPath, $newImageName);
        }

        // Auto Generate Unit Code
        $unique = false;
        $unitCode = '';
        while (!$unique) {
            $unitCode = bin2hex(random_bytes(2));
            if (!$model->where('unit_code', $unitCode)->first()) {
                $unique = true;
            }
        }

        $model->save([
            'name' => $this->request->getPost('name'),
            'unit_code' => $unitCode,
            'category_id' => $this->request->getPost('category_id'),
            'stock' => $this->request->getPost('stock'),
            'cost_rent_per_day' => $this->request->getPost('cost_rent_per_day'),
            'cost_rent_per_month' => $this->request->getPost('cost_rent_per_month'),
            'image' => $newImageName
        ]);
        return redirect()->to('/admin/units');
    }


    public function editUnit($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new UnitModel();
        $categoryModel = new CategoryModel();
        $data['unit'] = $model->find($id);
        $data['categories'] = $categoryModel->findAll();
        return view('admin/edit_unit', $data);
    }

    public function updateUnit($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new UnitModel();

        // Get the image from the request
        $img = $this->request->getFile('image');
        $currentUnit = $model->find($id);
        $newName = $currentUnit['image'];


        $targetPath = FCPATH . 'Assets/image/';

        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move($targetPath, $newName);
        }

        $updateData = [
            'name' => $this->request->getPost('name'),
            'unit_code' => $this->request->getPost('unit_code'),
            'category_id' => $this->request->getPost('category_id'),
            'stock' => $this->request->getPost('stock'),
            'cost_rent_per_day' => $this->request->getPost('cost_rent_per_day'),
            'cost_rent_per_month' => $this->request->getPost('cost_rent_per_month'),
            'image' => $newName
        ];

        // Update the unit with new data
        if ($model->update($id, $updateData)) {
            return redirect()->to('/admin/units')->with('success', 'Unit updated successfully.');
        } else {
            return redirect()->to('/admin/units')->with('error', 'Failed to update the unit.');
        }
    }


    public function deleteUnit($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new UnitModel();
        $model->delete($id);
        return redirect()->to('/admin/units');
    }

    public function rentalHistory()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new RentalModel();
        $data['rentals'] = $model->fetchDetailedRentals();
        return view('admin/rental_history', $data);
    }

    public function editRental($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new RentalModel();
        $rental = $model->getRentalDetails($id);

        if (!$rental) {
            return redirect()->to('/admin/rental_history')->with('error', 'Rental not found');
        }

        return view('admin/edit_rental', ['rental' => $rental]);
    }


    public function updateRental($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $rentalModel = new RentalModel();
        $unitModel = new UnitModel();

        $rental = $rentalModel->where('id', $id)->first();
        $currentStatus = $rental['status_rent'];
        $newStatus = $this->request->getPost('status_rent');
        $updateData = ['status_rent' => $newStatus];
        $unitId = $rental['unit_id'];

        if ($currentStatus === 'waiting_approval' && $newStatus === 'rented') {
            $updateData['approved_rent_by'] = session()->get('id');
            $updateData['rental_date'] = date("Y-m-d");

            $unitModel->updateStock($unitId, -1);
        } elseif ($currentStatus === 'waiting_return' && $newStatus === 'returned') {
            $updateData['approved_return_by'] = session()->get('id');
            $updateData['return_date'] = date("Y-m-d");

            $unitModel->updateStock($unitId, 1);
        } elseif ($newStatus === 'rejected') {
            $updateData['rejected_by'] = session()->get('id');
            if ($rental['status_paid'] === 'paid') {
                $updateData['status_paid'] = 'refunded';
            }
        }

        if ($rentalModel->update($id, $updateData)) {
            return redirect()->to('/admin/rental_history')->with('success', 'Rental status updated successfully.');
        } else {
            return redirect()->to('/admin/rental_history')->with('error', 'Failed to update rental status.');
        }
    }


    public function deleteRental($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new RentalModel();
        $model->delete($id);
        return redirect()->to('/admin/rental_history');
    }


    public function policies()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new \App\Models\PolicyModel();
        $data['policies'] = $model->findAll();
        return view('admin/policies', $data);
    }

    public function createPolicy()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        return view('admin/create_policy');
    }

    public function storePolicy()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new \App\Models\PolicyModel();
        $model->save([
            'max_rental_days' => $this->request->getPost('max_rental_days'),
            'overdue_fee_per_day' => $this->request->getPost('overdue_fee_per_day')
        ]);
        return redirect()->to('/admin/policies');
    }

    public function editPolicy($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new \App\Models\PolicyModel();
        $data['policy'] = $model->find($id);
        return view('admin/edit_policy', $data);
    }

    public function updatePolicy($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new \App\Models\PolicyModel();
        $model->update($id, [
            'max_rental_days' => $this->request->getPost('max_rental_days'),
            'overdue_fee_per_day' => $this->request->getPost('overdue_fee_per_day')
        ]);
        return redirect()->to('/admin/policies');
    }

    public function deletePolicy($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new \App\Models\PolicyModel();
        $model->delete($id);
        return redirect()->to('/admin/policies');
    }
}
