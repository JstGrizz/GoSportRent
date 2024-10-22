<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'unit_code', 'category_id'];
    protected $returnType = 'array';
    protected $useTimestamps = false;  // Enable if timestamps are used in the table

    // Add method to fetch units with category names
    public function fetchUnitsWithCategory()
    {
        $this->select('units.*, categories.name AS category_name');
        $this->join('categories', 'units.category_id = categories.id', 'left');
        return $this->findAll();
    }
}
