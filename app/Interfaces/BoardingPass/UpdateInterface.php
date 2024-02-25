<?php

declare(strict_types = 1);

namespace App\Interfaces\BoardingPass;

interface UpdateInterface
{
    public function update(string $id, ?int $seatNumber, ?int $gateNumber, ?string $boardingTime, ?string $passengerId, ?string $flightId);
}
