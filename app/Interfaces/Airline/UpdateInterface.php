<?php

declare(strict_types = 1);

namespace App\Interfaces\Airline;

interface UpdateInterface
{
    public function update(string $id, ?string $name, ?string $city, ?string $country, ?int $founded, ?int $fleetSize, ?int $destinations);
}
