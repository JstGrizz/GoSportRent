<?php

namespace App\Database\Seeds;

class CategorySeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Bola'],
            ['name' => 'Raket']
        ];


        $this->db->table('categories')->insertBatch($data);
    }
}
