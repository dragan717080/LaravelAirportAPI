<?php

namespace App\Repositories;

use App\Models\Airline;
use App\Repositories\Traits\{ GetByIdTrait, DeleteTrait, GetByNameTrait };

class AirlineRepository
{
    use GetByIdTrait;
    use DeleteTrait;
    use GetByNameTrait;

    public $model;

    public function __construct()
    {
        $this->model = new Airline();
    }

    public function getAll()
    {
        return Airline::all();
    }

    public function update(
        string $id,
        ?string $name, 
        ?string $city, 
        ?string $country,
        ?int $founded,
        ?int $fleetSize,
        ?int $destinations,
    )
    {
        $airline = $this->model->find($id);

        if (!$airline) {
            return null;
        }

        if ($name !== null) {
            $airline->name = $name;
        }

        if ($city !== null) {
            $airline->city = $city;
        }

        if ($country !== null) {
            $airline->country = $country;
        }

        if ($founded !== null) {
            $airline->founded = $founded;
        }

        if ($fleetSize !== null) {
            $airline->fleet_size = $fleetSize;
        }

        if ($destinations !== null) {
            $airline->destinations = $destinations;
        }

        $airline->save();

        return $airline;
    }

    public function create(
        string $name, 
        string $city, 
        string $country,
        int $founded,
        int $fleetSize,
        int $destinations,
    )
    {
        $airline = new Airline();

        $airline->name = $name;
        $airline->city = $city;
        $airline->country = $country;
        $airline->founded = $founded;
        $airline->fleet_size = $fleetSize;
        $airline->destinations = $destinations;

        $airline->save();

        return $airline;
    }
}
