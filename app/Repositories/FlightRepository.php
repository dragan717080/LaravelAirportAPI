<?php

namespace App\Repositories;

use App\Models\Flight;
use App\Repositories\Traits\{ GetByIdTrait, DeleteTrait };
use App\Repositories\{ AirlineRepository, AirportRepository };

class FlightRepository
{
    use GetByIdTrait;
    use DeleteTrait;

    public $model;

    public function __construct(
        private AirlineRepository $airlineRepository,
        private AirportRepository $airportRepository
    )
    {
        $this->model = new Flight();
    }

    public function getAll()
    {
        return Flight::all();
    }

    public function update(
        string $id,
        ?string $departureTime,
        ?string $arrivalTime,
        ?string $airline,
        ?string $departureAirport,
        ?string $arrivalAirport,
    )
    {
        $flight = $this->model->find($id);

        if (!$flight) {
            return null;
        }

        if ($departureTime !== null) {
            $flight->departure_time = $departureTime;
        }

        if ($arrivalTime !== null) {
            $flight->arrival_time = $arrivalTime;
        }

        if ($airline !== null) {
            $airline = $this->airlineRepository->getByName($airline);
            $flight->airline_id = $airline->id;
        }

        if ($departureAirport !== null) {
            $departureAirport = $this->airportRepository->getByName($departureAirport);
            $flight->departure_airport_id = $departureAirport->id;
        }

        if ($arrivalAirport !== null) {
            $arrivalAirport = $this->airportRepository->getByName($arrivalAirport);
            $flight->arrival_airport_id = $arrivalAirport->id;
        }

        $flight->save();

        return $flight;
    }

    public function create(
        string $departureTime,
        string $arrivalTime,
        string $airline,
        string $departureAirport,
        string $arrivalAirport,
    )
    {
        $flight = new Flight();

        $airline = $this->airlineRepository->getByName($airline);
        $departureAirport = $this->airportRepository->getByName($departureAirport);
        $arrivalAirport = $this->airportRepository->getByName($arrivalAirport);

        $flight->departure_time = $departureTime;
        $flight->arrival_time = $arrivalTime;
        $flight->airline_id = $airline->id;
        $flight->departure_airport_id = $departureAirport->id;
        $flight->arrival_airport_id = $arrivalAirport->id;

        $flight->save();

        return $flight;
    }
}
