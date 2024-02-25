<?php

declare(strict_types = 1);

namespace App\Services;

use App\Repositories\PassengerRepository;

use App\Interfaces\{ ReadInterface, DeleteInterface };
use App\Interfaces\Passenger\{ CreateInterface, UpdateInterface };

use Illuminate\Database\Eloquent\Collection;
use App\Models\Passenger;

class PassengerService implements CreateInterface,
    ReadInterface, UpdateInterface, DeleteInterface
{
    public function __construct(private PassengerRepository $passengerRepository) {}
 
    public function getAll(): Collection
    {
        return $this->passengerRepository->getAll();
    }

    public function getById(string $id): ?Passenger
    {
        return $this->passengerRepository->getById($id);
    }

    public function create(
        string $name,
        int $passport
    ): Passenger
    {
        return $this->passengerRepository->create($name, $passport);
    }

    public function update(
        string $id,
        ?string $name,
        ?int $passport
    ): ?Passenger
    {
        return $this->passengerRepository->update($id, $name, $passport);
    }

    public function delete(string $id): int
    {
        return $this->passengerRepository->delete($id);
    }
}
