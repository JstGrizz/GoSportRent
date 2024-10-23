<?php

namespace App\Models;

use CodeIgniter\Model;

class PolicyModel extends Model
{
    protected $table = 'policies';
    protected $primaryKey = 'id';
    protected $allowedFields = ['max_rental_days', 'overdue_fee_per_day'];
    protected $returnType = 'array';
    protected $useTimestamps = false; // Modify this as necessary if timestamps are used
}
