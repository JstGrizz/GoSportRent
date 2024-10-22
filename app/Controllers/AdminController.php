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
            return redirect()->to('/login');
        }

        return view('admin/dashboard');
    }

    public function users()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('admin/users', $data);
    }

    public function editUser($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('admin/edit_user', $data);
    }

    public function updateUser($id)
    {
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
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/admin/users');
    }

    public function createUser()
    {
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
        $model = new CategoryModel();
        $data['categories'] = $model->findAll();
        return view('admin/categories', $data);
    }

    public function createCategory()
    {
        return view('admin/create_category');
    }

    public function storeCategory()
    {
        $model = new CategoryModel();
        $model->save([
            'name' => $this->request->getPost('name')
        ]);
        return redirect()->to('/admin/categories');
    }

    public function editCategory($id)
    {
        $model = new CategoryModel();
        $data['category'] = $model->find($id);
        return view('admin/edit_category', $data);
    }

    public function updateCategory($id)
    {
        $model = new CategoryModel();
        $model->update($id, [
            'name' => $this->request->getPost('name')
        ]);
        return redirect()->to('/admin/categories');
    }

    public function deleteCategory($id)
    {
        $model = new CategoryModel();
        $model->delete($id);
        return redirect()->to('/admin/categories');
    }

    public function units()
    {
        $model = new UnitModel();
        $data['units'] = $model->fetchUnitsWithCategory();
        return view('admin/units', $data);
    }


    public function createUnit()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        return view('admin/create_unit', $data);
    }

    public function storeUnit()
    {
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
        $model = new UnitModel();
        $categoryModel = new CategoryModel();
        $data['unit'] = $model->find($id);
        $data['categories'] = $categoryModel->findAll();
        return view('admin/edit_unit', $data);
    }

    public function updateUnit($id)
    {
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
        $model = new UnitModel();
        $model->delete($id);
        return redirect()->to('/admin/units');
    }

    public function rentalHistory()
    {
        $model = new RentalModel();
        $data['rentals'] = $model->fetchDetailedRentals();
        return view('admin/rental_history', $data);
    }

    public function createRental()
    {
        $unitModel = new UnitModel(); // Ensure you load the necessary models
        $data['units'] = $unitModel->findAll();
        return view('admin/create_rental', $data);
    }

    public function storeRental()
    {
        $model = new RentalModel();
        $model->save([
            'user_id' => $this->request->getPost('user_id'), // Assuming you're getting this from a form or another method
            'unit_id' => $this->request->getPost('unit_id'),
            'rental_date' => $this->request->getPost('rental_date'),
            'days_rented' => $this->request->getPost('days_rented'),
            'cost' => $this->request->getPost('cost'),
            'status_rent' => 'waiting_approval', // Default on creation
            'status_paid' => 'unpaid' // Default on creation
        ]);
        return redirect()->to('/admin/rental_history');
    }

    public function editRental($id)
    {
        $model = new RentalModel();
        $data['rental'] = $model->find($id);
        $unitModel = new UnitModel();
        $data['units'] = $unitModel->findAll();
        return view('admin/edit_rental', $data);
    }

    public function updateRental($id)
    {
        $model = new RentalModel();
        $model->update($id, [
            'days_rented' => $this->request->getPost('days_rented'),
            'cost' => $this->request->getPost('cost'),
            'status_rent' => $this->request->getPost('status_rent'),
            'status_paid' => $this->request->getPost('status_paid')
        ]);
        return redirect()->to('/admin/rental_history');
    }

    public function deleteRental($id)
    {
        $model = new RentalModel();
        $model->delete($id);
        return redirect()->to('/admin/rental_history');
    }

    public function policies()
    {
        $model = new \App\Models\PolicyModel();
        $data['policies'] = $model->findAll();
        return view('admin/policies', $data);
    }

    public function createPolicy()
    {
        return view('admin/create_policy');
    }

    public function storePolicy()
    {
        $model = new \App\Models\PolicyModel();
        $model->save([
            'max_rental_days' => $this->request->getPost('max_rental_days'),
            'overdue_fee_per_day' => $this->request->getPost('overdue_fee_per_day')
        ]);
        return redirect()->to('/admin/policies');
    }

    public function editPolicy($id)
    {
        $model = new \App\Models\PolicyModel();
        $data['policy'] = $model->find($id);
        return view('admin/edit_policy', $data);
    }

    public function updatePolicy($id)
    {
        $model = new \App\Models\PolicyModel();
        $model->update($id, [
            'max_rental_days' => $this->request->getPost('max_rental_days'),
            'overdue_fee_per_day' => $this->request->getPost('overdue_fee_per_day')
        ]);
        return redirect()->to('/admin/policies');
    }

    public function deletePolicy($id)
    {
        $model = new \App\Models\PolicyModel();
        $model->delete($id);
        return redirect()->to('/admin/policies');
    }
}
