<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = model('App\Models\UserModel');

        $data = [
            [
                'name'      => 'Khalid',
                'username'  => 'admin',
                'email'     => 'admin@example.com',
                'password'  => password_hash('admin123', PASSWORD_DEFAULT),
                'role'      => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name'      => 'Farhan',
                'username'  => 'user',
                'email'     => 'user@example.com',
                'password'  => password_hash('user123', PASSWORD_DEFAULT),
                'role'      => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
