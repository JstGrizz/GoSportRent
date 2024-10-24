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
        $this->select('units.*, GROUP_CONCAT(categories.name ORDER BY categories.name ASC) as category_names');
        $this->join('unit_categories', 'unit_categories.unit_id = units.id', 'left');
        $this->join('categories', 'categories.id = unit_categories.category_id', 'left');
        $this->groupBy('units.id');

        $units = $this->findAll();
        foreach ($units as $key => $unit) {
            $units[$key]['categories'] = array_map(function ($categoryName) {
                return ['name' => trim($categoryName)];
            }, explode(',', $unit['category_names']));
        }
        return $units;
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

    public function updateStock($unitId, $quantityChange)
    {
        $unit = $this->find($unitId);
        if ($unit) {
            $newStock = $unit['stock'] + $quantityChange;
            $newStock = max($newStock, 0);
            $this->update($unitId, ['stock' => $newStock]);
        }
    }
}
