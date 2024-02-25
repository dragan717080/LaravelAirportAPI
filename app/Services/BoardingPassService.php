<?php

declare(strict_types = 1);

namespace App\Services;

use App\Repositories\BoardingPassRepository;

use App\Interfaces\{ ReadInterface, DeleteInterface };
use App\Interfaces\BoardingPass\{ CreateInterface, UpdateInterface };

use Illuminate\Database\Eloquent\Collection;
use App\Models\BoardingPass;

class BoardingPassService implements CreateInterface,
    ReadInterface, UpdateInterface, DeleteInterface
{
    public function __construct(private BoardingPassRepository $boardingPassRepository) {}
 
    public function getAll(): Collection
    {
        return $this->boardingPassRepository->getAll();
    }

    public function getById(string $id): ?BoardingPass
    {
        return $this->boardingPassRepository->getById($id);
    }

    public function create(
        int $seatNumber,
        int $gateNumber,
        string $boardingTime,
        string $passengerId,
        string $flightId
    ): BoardingPass
    {
        return $this->boardingPassRepository->create($seatNumber, $gateNumber, $boardingTime, $passengerId, $flightId);
    }

    public function update(
        string $id,
        ?int $seatNumber,
        ?int $gateNumber,
        ?string $boardingTime,
        ?string $passengerId,
        ?string $flightId
    ): ?BoardingPass
    {
        return $this->boardingPassRepository->update($id, $seatNumber, $gateNumber, $boardingTime, $passengerId, $flightId);
    }

    public function delete(string $id): int
    {
        return $this->boardingPassRepository->delete($id);
    }
}
