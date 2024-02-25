<?php

declare(strict_types = 1);

namespace App\Interfaces\Airport;

interface UpdateInterface
{
    public function update(string $id, ?string $name, ?string $city, ?string $country);
}
