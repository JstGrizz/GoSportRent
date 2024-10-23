<?php

namespace App\Database\Seeds;

class UnitSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Raket Tennis',
                'unit_code' => 'RT001',
                'category_id' => 2,
                'stock' => 15,
                'cost_rent_per_day' => 50.00,
                'cost_rent_per_month' => 1500.00,
                'image' => 'path/to/tennis_racket_image.jpg',
            ],
            [
                'name' => 'Bola Kaki',
                'unit_code' => 'BK001',
                'category_id' => 1,
                'stock' => 30,
                'cost_rent_per_day' => 30.00,
                'cost_rent_per_month' => 900.00,
                'image' => 'path/to/football_image.jpg',
            ],
        ];

        $this->db->table('units')->insertBatch($data);
    }
}
