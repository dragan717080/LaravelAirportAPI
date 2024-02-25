<?php

declare(strict_types = 1);

namespace App\Services;

use App\Repositories\TicketRepository;

use App\Interfaces\{ ReadInterface, DeleteInterface };
use App\Interfaces\Ticket\{ CreateInterface, UpdateInterface };

use Illuminate\Database\Eloquent\Collection;
use App\Models\Ticket;

class TicketService implements CreateInterface,
    ReadInterface, UpdateInterface, DeleteInterface
{
    public function __construct(private TicketRepository $ticketRepository) {}
 
    public function getAll(): Collection
    {
        return $this->ticketRepository->getAll();
    }

    public function getById(string $id): ?Ticket
    {
        return $this->ticketRepository->getById($id);
    }

    public function create(
        int $seatNumber,
        int $ticketPrice,
        string $passengerId,
        string $flightId
    ): Ticket
    {
        return $this->ticketRepository->create($seatNumber, $ticketPrice, $passengerId, $flightId);
    }

    public function update(
        string $id,
        ?int $seatNumber,
        ?int $ticketPrice,
        ?string $passengerId,
        ?string $flightId
    ): ?Ticket
    {
        return $this->ticketRepository->update($id, $seatNumber, $ticketPrice, $passengerId, $flightId);
    }

    public function delete(string $id): int
    {
        return $this->ticketRepository->delete($id);
    }
}
