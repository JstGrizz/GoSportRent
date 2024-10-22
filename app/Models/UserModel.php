<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'role'];
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
