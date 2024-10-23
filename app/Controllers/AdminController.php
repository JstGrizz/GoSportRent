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

    public function createUser()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/login'));
        }

        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role')
        ];
        $model->save($data);
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

        $model = new UnitModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'unit_code' => $this->request->getPost('unit_code'),
            'category_id' => $this->request->getPost('category_id'),
            'stock' => $this->request->getPost('stock'),
            'cost_rent_per_day' => $this->request->getPost('cost_rent_per_day'),
            'cost_rent_per_month' => $this->request->getPost('cost_rent_per_month')
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
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'unit_code' => $this->request->getPost('unit_code'),
            'category_id' => $this->request->getPost('category_id'),
            'stock' => $this->request->getPost('stock'),
            'cost_rent_per_day' => $this->request->getPost('cost_rent_per_day'),
            'cost_rent_per_month' => $this->request->getPost('cost_rent_per_month')
        ]);
        return redirect()->to('/admin/units');
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

        $model = new RentalModel();
        $currentStatus = $model->where('id', $id)->first()['status_rent'];
        $newStatus = $this->request->getPost('status_rent');
        $updateData = [
            'status_rent' => $newStatus
        ];

        // Check status transition to set the appropriate fields
        if ($currentStatus === 'waiting_approval' && $newStatus === 'rented') {
            $updateData['approved_rent_by'] = session()->get('id');
            $updateData['rental_date'] = date("Y-m-d");
        } elseif ($currentStatus === 'waiting_return' && $newStatus === 'returned') {
            $updateData['approved_return_by'] = session()->get('id');
            $updateData['return_date'] = date("Y-m-d");
        }

        if ($model->update($id, $updateData)) {
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
