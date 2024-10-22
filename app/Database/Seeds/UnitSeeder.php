<?php

namespace App\Database\Seeds;

class UnitSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Raket Tennis', 'unit_code' => 'RT001', 'category_id' => 2],
            ['name' => 'Bola Kaki', 'unit_code' => 'BK001', 'category_id' => 1]
        ];

        // Using Query Builder
        $this->db->table('units')->insertBatch($data);
    }
}
