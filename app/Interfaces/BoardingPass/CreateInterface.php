<?php

declare(strict_types = 1);

namespace App\Interfaces\BoardingPass;

interface CreateInterface
{
    public function create(int $seatNumber, int $gateNumber, string $boardingTime, string $passengerId, string $flightId);
}
