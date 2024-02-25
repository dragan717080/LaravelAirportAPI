<?php

declare(strict_types = 1);

namespace App\Interfaces\Passenger;

interface UpdateInterface
{
    public function update(string $id, ?string $name, ?int $passport);
}
