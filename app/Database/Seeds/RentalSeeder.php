<?php

namespace App\Database\Seeds;

class RentalSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'unit_id' => 1,
                'rental_date' => '2024-01-01',
                'days_rented' => 5,
                'cost' => 500.00,
                'amount' => 2,
                'status_rent' => 'rented',
                'status_paid' => 'unpaid',
                'approved_rent_by' => 1
            ],
        ];

        $this->db->table('rentals')->insertBatch($data);
    }
}
