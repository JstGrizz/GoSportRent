<?php

namespace App\Database\Seeders;

use CodeIgniter\Database\Seeder;

class UnitCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['unit_id' => 1, 'category_id' => 1],
            ['unit_id' => 1, 'category_id' => 2],
            ['unit_id' => 2, 'category_id' => 1],
            ['unit_id' => 2, 'category_id' => 3],
        ];

        $this->db->table('unit_categories')->insertBatch($data);

        foreach ($data as $datum) {
            $this->db->table('unit_categories')->insert($datum);
        }
    }
}
