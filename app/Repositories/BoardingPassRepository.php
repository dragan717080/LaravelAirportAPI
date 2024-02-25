<?php

namespace App\Repositories;

use App\Models\BoardingPass;
use App\Repositories\{ PassengerRepository, FlightRepository };
use App\Repositories\Traits\{ GetByIdTrait, DeleteTrait, GetByNameTrait };

class BoardingPassRepository
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
        $this->model = new BoardingPass();
    }

    public function getAll()
    {
        return BoardingPass::all();
    }

    public function update(
        string $id,
        int $seatNumber,
        int $gateNumber,
        string $boardingTime,
        ?string $passengerId,
        ?string $flightId
    )
    {
        $boardingPass = $this->model->find($id);

        if (!$boardingPass) {
            return null;
        }

        if ($seatNumber !== null) {
            $boardingPass->seat_number = $seatNumber;
        }

        if ($gateNumber !== null) {
            $boardingPass->gate_number = $gateNumber;
        }

        if ($boardingTime !== null) {
            $boardingPass->boarding_time = $boardingTime;
        }

        if ($passengerId !== null) {
            $passenger = $this->passengerRepository->getById($passengerId);
            $boardingPass->passenger_id = $passenger->id;
        }

        if ($flightId !== null) {
            $flight = $this->flightRepository->getById($flightId);
            $boardingPass->flight_id = $flight->id;
        }

        $boardingPass->save();

        return $boardingPass;
    }

    public function create(
        int $seatNumber,
        int $gateNumber,
        string $boardingTime,
        string $passengerId,
        string $flightId
    )
    {
        $boardingPass = new BoardingPass();

        $passenger = $this->passengerRepository->getById($passengerId);
        $flight = $this->flightRepository->getById($flightId);

        $boardingPass->seat_number = $seatNumber;
        $boardingPass->gate_number = $gateNumber;
        $boardingPass->boarding_time = $boardingTime;
        $boardingPass->passenger_id = $passenger->id;
        $boardingPass->flight_id = $flight->id;

        $boardingPass->save();

        return $boardingPass;
    }
}
