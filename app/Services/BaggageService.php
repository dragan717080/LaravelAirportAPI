<?php

declare(strict_types = 1);

namespace App\Services;

use App\Repositories\BaggageRepository;

use App\Interfaces\{ ReadInterface, DeleteInterface };
use App\Interfaces\Baggage\{ CreateInterface, UpdateInterface };

use Illuminate\Database\Eloquent\Collection;
use App\Models\Baggage;

class BaggageService implements CreateInterface,
    ReadInterface, UpdateInterface, DeleteInterface
{
    public function __construct(private BaggageRepository $baggageRepository) {}
 
    public function getAll(): Collection
    {
        return $this->baggageRepository->getAll();
    }

    public function getById(string $id): ?Baggage
    {
        return $this->baggageRepository->getById($id);
    }

    public function create(
        float $weight,
        bool $isChecked,
        string $passengerId,
        string $flightId,
    ): Baggage
    {
        return $this->baggageRepository->create($weight, $isChecked, $passengerId, $flightId);
    }

    public function update(
        string $id,
        ?float $weight,
        ?bool $isChecked,
        ?string $passengerId,
        ?string $flightId,
    ): ?Baggage
    {
        return $this->baggageRepository->update($id, $weight, $isChecked, $passengerId, $flightId);
    }

    public function delete(string $id): int
    {
        return $this->baggageRepository->delete($id);
    }
}
