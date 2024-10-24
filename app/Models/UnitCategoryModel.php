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

    public function getCategoryIdsForUnit($unitId)
    {
        return $this->select('category_id')
            ->where('unit_id', $unitId)
            ->findAll();
    }

    public function insertUnitCategories($unitId, array $categoryIds)
    {
        foreach ($categoryIds as $categoryId) {
            $data = [
                'unit_id' => $unitId,
                'category_id' => $categoryId
            ];

            if (!$this->insert($data)) {
                return false;
            }
        }
        return true;
    }

    public function removeUnitCategories($unitId)
    {
        return $this->where('unit_id', $unitId)->delete();
    }

    public function updateUnitCategories($unitId, array $newCategoryIds)
    {
        $existingCategories = $this->where('unit_id', $unitId)->findAll();
        $existingCategoryIds = array_column($existingCategories, 'category_id');

        $toDelete = array_diff($existingCategoryIds, $newCategoryIds);
        $toAdd = array_diff($newCategoryIds, $existingCategoryIds);

        if (!empty($toDelete)) {
            $this->where('unit_id', $unitId)
                ->whereIn('category_id', $toDelete)
                ->delete();
        }

        foreach ($toAdd as $categoryId) {
            $this->insert([
                'unit_id' => $unitId,
                'category_id' => $categoryId
            ]);
        }
    }
}
