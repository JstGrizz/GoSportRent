<?php

namespace App\Models;

use CodeIgniter\Model;

class RentalModel extends Model
{
    protected $table = 'rentals';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'unit_id', 'rental_date', 'return_date', 'status'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function getDetailedRentals()
    {
        $this->select('rentals.*, users.username as user_name, units.name as unit_name');
        $this->join('users', 'rentals.user_id = users.id');
        $this->join('units', 'rentals.unit_id = units.id');
        return $this->findAll();
    }
}
