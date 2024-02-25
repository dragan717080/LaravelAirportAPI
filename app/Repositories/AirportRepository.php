<?php

namespace App\Repositories;

use App\Models\Airport;
use App\Repositories\Traits\{ GetByIdTrait, DeleteTrait, GetByNameTrait };

class AirportRepository
{
    use GetByIdTrait;
    use DeleteTrait;
    use GetByNameTrait;

    public $model;

    public function __construct()
    {
        $this->model = new Airport();
    }

    public function getAll()
    {
        return Airport::all();
    }

    public function update(
        string $id,
        ?string $name, 
        ?string $city, 
        ?string $country
    )
    {
        $airport = $this->model->find($id);

        if (!$airport) {
            return null;
        }

        if ($name !== null) {
            $airport->name = $name;
        }

        if ($city !== null) {
            $airport->city = $city;
        }

        if ($country !== null) {
            $airport->country = $country;
        }

        $airport->save();

        return $airport;
    }

    public function create(
        string $name, 
        string $city, 
        string $country,
    )
    {
        $airport = new Airport();

        $airport->name = $name;
        $airport->city = $city;
        $airport->country = $country;

        $airport->save();

        return $airport;
    }
}
