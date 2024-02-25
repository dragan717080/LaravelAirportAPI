<?php

declare(strict_types = 1);

namespace App\Services;

use App\Repositories\AirportRepository;

use App\Interfaces\{ ReadInterface, DeleteInterface };
use App\Interfaces\Airport\{ CreateInterface, UpdateInterface };

use Illuminate\Database\Eloquent\Collection;
use App\Models\Airport;

class AirportService implements CreateInterface,
    ReadInterface, UpdateInterface, DeleteInterface
{
    public function __construct(private AirportRepository $airportRepository) {}
 
    public function getAll(): Collection
    {
        return $this->airportRepository->getAll();
    }

    public function getById(string $id): ?Airport
    {
        return $this->airportRepository->getById($id);
    }

    public function create(
        string $name,
        string $city,
        string $country
    ): Airport
    {
        return $this->airportRepository->create($name, $city, $country);
    }

    public function update(
        string $id,
        ?string $name, 
        ?string $city, 
        ?string $country
    ): ?Airport
    {
        return $this->airportRepository->update($id, $name, $city, $country);
    }

    public function delete(string $id): int
    {
        return $this->airportRepository->delete($id);
    }
}
