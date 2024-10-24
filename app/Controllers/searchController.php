<?php

namespace App\Controllers;

use App\Models\UnitModel;

class SearchController extends BaseController
{
    protected $db;

    public function __construct()
    {
        // Inisialisasi database
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // Ambil query pencarian dari form
        $searchQuery = $this->request->getPost('search_query');

        // Lakukan pencarian di database berdasarkan struktur tabel
        $results = $this->db->table('units')
            ->select('name, unit_code, category_id, stock, cost_rent_per_day, cost_rent_per_month, image')
            ->like('name', $searchQuery)
            ->get()
            ->getResultArray();

        // Kirim hasil pencarian ke view
        return view('search_results', ['results' => $results, 'searchQuery' => $searchQuery]);
    }
}
