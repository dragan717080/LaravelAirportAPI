<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\ResponseBuilder;
use App\Services\FlightService;

class FlightController extends BaseController
{
    public function __construct(private FlightService $flightService) {}

    public function getAll()
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->flightService->getAll()
        );
    }

    public function getById(string $id)
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->flightService->getById($id)
        );
    }

    public function create(Request $req)
    {
        $flight = $req->request->all();
        return ResponseBuilder::getResponse(fn () => 
            $this->flightService->create(
                $flight['departureTime'],
                $flight['arrivalTime'],
                $flight['airline'],
                $flight['departureAirport'],
                $flight['arrivalAirport']
            )
        );
    }

    public function update(string $id, Request $req)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->flightService->update(
                $id,
                $req->input('departureTime'),
                $req->input('arrivalTime'),
                $req->input('airline'),
                $req->input('departureAirport'),
                $req->input('arrivalAirport')
            )
        );
    }

    public function delete(string $id)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->flightService->delete($id)
        );
    }
}
