<?php

declare(strict_types = 1);

namespace App\Interfaces\Passenger;

interface CreateInterface
{
    public function create(string $name, int $passport);
}
