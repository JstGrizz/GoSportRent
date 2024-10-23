<?php

namespace App\Helpers;

use App\Models\RentalModel;

function getPendingRentals()
{
    $model = new RentalModel();
    return $model->select('rentals.id, users.name as user_name, rentals.status_rent')
        ->join('users', 'users.id = rentals.user_id')
        ->whereIn('rentals.status_rent', ['waiting_approval', 'waiting_return'])
        ->findAll();
}
