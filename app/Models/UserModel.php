<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'name', 'email', 'password', 'role'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function verifyUser($username, $password)
    {
        $user = $this->asArray()
            ->where(['username' => $username])
            ->first();

        if (!$user) return false;

        return password_verify($password, $user['password']) ? $user : false;
    }
}

class UnitModel extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'unit_code',
        'category_id',
        'stock',
        'cost_rent_per_day',
        'cost_rent_per_month',
        'image'
    ]; // Sesuaikan dengan field yang ada di tabel

}
