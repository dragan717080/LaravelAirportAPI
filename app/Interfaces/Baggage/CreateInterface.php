<?php

declare(strict_types = 1);

namespace App\Interfaces\Baggage;

interface CreateInterface
{
    public function create(float $weight, bool $isChecked, string $passengerId, string $flightId);
}
