<?php

declare(strict_types = 1);

namespace App\Interfaces\Airport;

interface CreateInterface
{
    public function create(string $name, string $city, string $country);
}
