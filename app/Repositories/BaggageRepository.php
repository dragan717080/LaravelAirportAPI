<?php

namespace App\Repositories;

use App\Models\Baggage;
use App\Repositories\{ PassengerRepository, FlightRepository };
use App\Repositories\Traits\{ GetByIdTrait, DeleteTrait, GetByNameTrait };

class BaggageRepository
{
    use GetByIdTrait;
    use DeleteTrait;
    use GetByNameTrait;

    public $model;

    public function __construct(
        private PassengerRepository $passengerRepository,
        private FlightRepository $flightRepository
    )
    {
        $this->model = new Baggage();
    }

    public function getAll()
    {
        return Baggage::all();
    }

    public function update(
        string $id,
        ?float $weight,
        ?bool $isChecked,
        ?string $passengerId,
        ?string $flightId
    )
    {
        $baggage = $this->model->find($id);

        if (!$baggage) {
            return null;
        }

        if ($weight !== null) {
            $baggage->weight = $weight;
        }

        if ($isChecked !== null) {
            $baggage->is_checked = $isChecked;
        }

        if ($passengerId !== null) {
            $passenger = $this->passengerRepository->getById($passengerId);
            $baggage->passenger_id = $passenger->id;
        }

        if ($flightId !== null) {
            $flight = $this->flightRepository->getById($flightId);
            $baggage->flight_id = $flight->id;
        }

        $baggage->save();

        return $baggage;
    }

    public function create(
        float $weight,
        bool $isChecked,
        string $passengerId,
        string $flightId
    )
    {
        $baggage = new Baggage();

        $passenger = $this->passengerRepository->getById($passengerId);
        $flight = $this->flightRepository->getById($flightId);

        $baggage->weight = $weight;
        $baggage->is_checked = $isChecked;
        $baggage->passenger_id = $passenger->id;
        $baggage->flight_id = $flight->id;

        $baggage->save();

        return $baggage;
    }
}
