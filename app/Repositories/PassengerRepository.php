<?php

namespace App\Repositories;

use App\Models\Passenger;
use App\Repositories\Traits\{ GetByIdTrait, DeleteTrait, GetByNameTrait };

class PassengerRepository
{
    use GetByIdTrait;
    use DeleteTrait;
    use GetByNameTrait;

    public $model;

    public function __construct()
    {
        $this->model = new Passenger();
    }

    public function getAll()
    {
        return Passenger::all();
    }

    public function update(
        string $id,
        ?string $name, 
        ?int $passport
    )
    {
        $passenger = $this->model->find($id);

        if (!$passenger) {
            return null;
        }

        if ($name !== null) {
            $passenger->name = $name;
        }

        if ($passport !== null) {
            $passenger->passport = $passport;
        }

        $passenger->save();

        return $passenger;
    }

    public function create(
        string $name, 
        int $passport, 
    )
    {
        $passenger = new Passenger();

        $passenger->name = $name;
        $passenger->passport = $passport;

        $passenger->save();

        return $passenger;
    }
}
