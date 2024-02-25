<?php

declare(strict_types = 1);

namespace App\Services;

use App\Repositories\FlightRepository;

use App\Interfaces\{ ReadInterface, DeleteInterface };
use App\Interfaces\Flight\{ CreateInterface, UpdateInterface };

use Illuminate\Database\Eloquent\Collection;
use App\Models\Flight;

class FlightService implements CreateInterface,
    ReadInterface, UpdateInterface, DeleteInterface
{
    public function __construct(private FlightRepository $flightRepository) {}
 
    public function getAll(): Collection
    {
        return $this->flightRepository->getAll();
    }

    public function getById(string $id): ?Flight
    {
        return $this->flightRepository->getById($id);
    }

    public function create(
        string $departureTime,
        string $arrivalTime,
        string $airline,
        string $departureAirport,
        string $arrivalAirport,
    ): Flight
    {
        return $this->flightRepository->create($departureTime, $arrivalTime, $airline, $departureAirport, $arrivalAirport);
    }

    public function update(
        string $id,
        ?string $departureTime,
        ?string $arrivalTime,
        ?string $airline,
        ?string $departureAirport,
        ?string $arrivalAirport,
    ): ?Flight
    {
        return $this->flightRepository->update($id, $departureTime, $arrivalTime, $airline, $departureAirport, $arrivalAirport);
    }

    public function delete(string $id): int
    {
        return $this->flightRepository->delete($id);
    }
}
