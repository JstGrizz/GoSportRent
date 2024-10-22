<?php

namespace App\Database\Seeds;

class UsersSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role'     => 'admin'
        ];
        // Using query builder
        $this->db->table('users')->insert($data);

        $data = [
            'username' => 'user',
            'email'    => 'user@gmail.com',
            'password' => password_hash('user123', PASSWORD_DEFAULT),
            'role'     => 'user'
        ];
        // Using query builder
        $this->db->table('users')->insert($data);
    }
}
