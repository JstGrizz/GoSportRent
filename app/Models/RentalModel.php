<?php

namespace App\Models;

use CodeIgniter\Model;

class RentalModel extends Model
{
    protected $table = 'rentals';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'unit_id',
        'rental_date',
        'return_date',
        'days_rented',
        'cost',
        'status_rent',
        'status_paid',
        'approved_rent_by',
        'approved_return_by'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function fetchDetailedRentals()
    {
        return $this->select('rentals.*, users.name as user_name, units.name as unit_name')
            ->join('users', 'users.id = rentals.user_id')
            ->join('units', 'units.id = rentals.unit_id')
            ->findAll();
    }

    public function getRentalDetails($id)
    {
        return $this->select('rentals.*, users.name as user_name, units.name as unit_name, users.username, units.unit_code')
            ->join('users', 'users.id = rentals.user_id')
            ->join('units', 'units.id = rentals.unit_id')
            ->where('rentals.id', $id)
            ->first();
    }
}
