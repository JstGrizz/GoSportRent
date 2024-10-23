<?php

namespace App\Database\Seeds;

class PolicySeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'max_rental_days' => 5, // limit 5 hari
            'overdue_fee_per_day' => 100000, // bayar Rp100.0000 per hari
        ];

        $this->db->table('policies')->insert($data);
    }
}
