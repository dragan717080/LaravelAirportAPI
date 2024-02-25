<?php

declare(strict_types = 1);

namespace App\Interfaces\Airline;

interface CreateInterface
{
    public function create(string $name, string $city, string $country, int $founded, int $fleetSize, int $destinations);
}
