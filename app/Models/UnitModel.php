<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'unit_code', 'stock', 'cost_rent_per_day', 'cost_rent_per_month', 'image'];
    protected $returnType = 'array';

    public function fetchUnitsWithCategories()
    {
        $this->select('units.*, GROUP_CONCAT(categories.name ORDER BY categories.name ASC) AS category_names');
        $this->join('unit_categories', 'unit_categories.unit_id = units.id', 'left');
        $this->join('categories', 'categories.id = unit_categories.category_id', 'left');
        $this->groupBy('units.id');
        return $this->findAll();
    }

    public function getUnitDetails($id)
    {
        $this->select('units.*, GROUP_CONCAT(categories.name ORDER BY categories.name ASC) AS category_names');
        $this->join('unit_categories', 'unit_categories.unit_id = units.id', 'left');
        $this->join('categories', 'categories.id = unit_categories.category_id', 'left');
        $this->where('units.id', $id);
        $this->groupBy('units.id');
        return $this->first();
    }
}
