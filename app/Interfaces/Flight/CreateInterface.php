<?php

declare(strict_types = 1);

namespace App\Interfaces\Flight;

interface CreateInterface
{
    public function create(string $departureTime, string $arrivalTime, string $airline, string $departureAirport, string $arrivalAirport);
}
