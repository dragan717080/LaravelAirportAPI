<?php

declare(strict_types = 1);

namespace App\Interfaces\Ticket;

interface UpdateInterface
{
    public function update(string $id, ?int $seatNumber, ?int $ticketPrice, ?string $passengerId, ?string $flightId);
}
