<?php

declare(strict_types = 1);

namespace App\Services;

use App\Repositories\AirlineRepository;

use App\Interfaces\{ ReadInterface, DeleteInterface };
use App\Interfaces\Airline\{ CreateInterface, UpdateInterface };

use Illuminate\Database\Eloquent\Collection;
use App\Models\Airline;

class AirlineService implements CreateInterface,
    ReadInterface, UpdateInterface, DeleteInterface
{
    public function __construct(private AirlineRepository $airlineRepository) {}
 
    public function getAll(): Collection
    {
        return $this->airlineRepository->getAll();
    }

    public function getById(string $id): Airline
    {
        return $this->airlineRepository->getById($id);
    }

    public function create(
        string $name,
        string $city,
        string $country,
        int $founded,
        int $fleetSize,
        int $destinations,
    ): Airline
    {
        return $this->airlineRepository->create($name, $city, $country, $founded, $fleetSize, $destinations);
    }

    public function update(
        string $id,
        ?string $name, 
        ?string $city, 
        ?string $country,
        ?int $founded,
        ?int $fleetSize,
        ?int $destinations,
    ): ?Airline
    {
        return $this->airlineRepository->update($id, $name, $city, $country, $founded, $fleetSize, $destinations);
    }

    public function delete(string $id): int
    {
        return $this->airlineRepository->delete($id);
    }
}
