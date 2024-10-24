<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitCategoryModel extends Model
{
    protected $table = 'unit_categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['unit_id', 'category_id'];

    protected $useTimestamps = false;

    protected $returnType = 'array';

    public function insertUnitCategories($unitId, array $categoryIds)
    {
        foreach ($categoryIds as $categoryId) {
            $data = [
                'unit_id' => $unitId,
                'category_id' => $categoryId
            ];
            // Insert each relationship entry into the database
            if (!$this->insert($data)) {
                return false; // Return false if any insert fails
            }
        }
        return true;
    }

    public function removeUnitCategories($unitId)
    {
        return $this->where('unit_id', $unitId)->delete();
    }

    public function updateUnitCategories($unitId, array $categoryIds)
    {
        // First, remove existing relationships
        $this->removeUnitCategories($unitId);

        // Then, add new relationships
        return $this->insertUnitCategories($unitId, $categoryIds);
    }
}
