<?php

namespace App\Database\Seeds;

class RentalSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 2,
                'unit_id' => 1,
                'rental_date' => '2021-01-01',
                'return_date' => '2021-01-05',
                'status' => 'returned'
            ]
        ];

        // Using Query Builder
        $this->db->table('rentals')->insertBatch($data);
    }
}
