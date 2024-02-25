<?php

declare(strict_types = 1);

namespace App\Interfaces\Baggage;

interface UpdateInterface
{
    public function update(string $id, ?float $weight, ?bool $isChecked, ?string $passengerId, ?string $flightId);
}
