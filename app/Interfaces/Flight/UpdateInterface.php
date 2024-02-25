<?php

declare(strict_types = 1);

namespace App\Interfaces\Flight;

interface UpdateInterface
{
    public function update(string $id, ?string $departureTime, ?string $arrivalTime, ?string $airline, ?string $departureAirport, ?string $arrivalAirport);
}
