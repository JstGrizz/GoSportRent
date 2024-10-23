<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'unit_code', 'category_id', 'stock', 'cost_rent_per_day', 'cost_rent_per_month'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    // Add method to fetch units with category names
    public function fetchUnitsWithCategory()
    {
        $this->select('units.*, categories.name AS category_name');
        $this->join('categories', 'units.category_id = categories.id');
        return $this->findAll();
    }

    public function getUnitDetails($id)
    {
        return $this->find($id);
    }
}
