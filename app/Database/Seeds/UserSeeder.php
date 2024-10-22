<?php

namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role' => 'admin'
            ],
            [
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'role' => 'user'
            ]
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
