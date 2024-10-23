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


        return view('search_results', ['results' => $results, 'query' => $query]);
    }
}
