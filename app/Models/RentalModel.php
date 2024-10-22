<?php

namespace App\Models;

use CodeIgniter\Model;

class RentalModel extends Model
{
    protected $table = 'rentals';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'unit_id', 'rental_date', 'return_date', 'days_rented', 'cost', 'status_rent', 'status_paid', 'approved_rent_by', 'approved_return_by'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}
