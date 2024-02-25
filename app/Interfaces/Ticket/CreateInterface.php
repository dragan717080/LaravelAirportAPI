<?php

declare(strict_types = 1);

namespace App\Interfaces\Ticket;

interface CreateInterface
{
    public function create(int $seatNumber, int $ticketPrice, string $passengerId, string $flightId);
}
