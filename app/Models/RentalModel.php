<?php

namespace App\Models;

use CodeIgniter\Model;

class RentalModel extends Model
{
    protected $table = 'rentals';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'unit_id',
        'rental_date',
        'return_date',
        'days_rented',
        'cost',
        'amount',
        'status_rent',
        'status_paid',
        'approved_rent_by',
        'approved_return_by'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function fetchDetailedRentals()
    {
        return $this->select('rentals.*, users.name as user_name, units.name as unit_name')
            ->join('users', 'users.id = rentals.user_id')
            ->join('units', 'units.id = rentals.unit_id')
            ->findAll();
    }

    public function getUserRentals($userId)
    {
        return $this->select('rentals.*, units.name as unit_name, units.unit_code, units.image')
            ->join('units', 'units.id = rentals.unit_id')
            ->where('user_id', $userId)
            ->findAll();
    }

    public function getRentalDetails($id)
    {
        return $this->select('rentals.*, users.name as user_name, units.name as unit_name, users.username, units.unit_code')
            ->join('users', 'users.id = rentals.user_id')
            ->join('units', 'units.id = rentals.unit_id')
            ->where('rentals.id', $id)
            ->first();
    }

    public function createRental($data)
    {
        return $this->insert($data);
    }

    public function updateRentalStatus($rentalId, $status)
    {
        return $this->update($rentalId, ['status_rent' => $status]);
    }

    public function getPendingRentals()
    {
        return $this->select('rentals.id, users.name as user_name, rentals.status_rent')
            ->join('users', 'users.id = rentals.user_id')
            ->whereIn('rentals.status_rent', ['waiting_approval', 'waiting_return'])
            ->findAll();
    }

    // Update payment status
    public function updatePaymentStatus($rentalId, $status)
    {
        return $this->update($rentalId, ['status_paid' => $status]);
    }

    public function countOngoingRentals($userId)
    {
        return $this->where('user_id', $userId)
            ->where('return_date', null)
            ->countAllResults();
    }
}
