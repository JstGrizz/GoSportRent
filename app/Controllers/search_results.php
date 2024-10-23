<?php

namespace App\Controllers;

use App\Models\UnitModel;

class UnitController extends BaseController
{
    public function search_results()
    {
        $query = $this->request->getGet('query');
        $unitModel = new UnitModel();
        $results = $unitModel->like('name', $query)
            ->orLike('unit_code', $query)
            ->findAll();

        // Debugging untuk melihat hasil
        if (empty($results)) {
            return view('search_results', ['results' => [], 'query' => $query]);
        }
        echo " search_resul";
        return view('search_results', ['results' => $results, 'query' => $query]);
    }
}
