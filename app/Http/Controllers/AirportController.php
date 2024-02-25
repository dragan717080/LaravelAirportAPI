<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\ResponseBuilder;
use App\Services\AirportService;

class AirportController extends BaseController
{
    public function __construct(private AirportService $airportService) {}

    public function getAll()
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->airportService->getAll()
        );
    }

    public function getById(string $id)
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->airportService->getById($id)
        );
    }

    public function create(Request $req)
    {
        $airport = $req->request->all();
        return ResponseBuilder::getResponse(fn () => 
            $this->airportService->create(
                $airport['name'],
                $airport['city'],
                $airport['country'],
            )
        );
    }

    public function update(string $id, Request $req)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->airportService->update(
                $id,
                $req->input('name'),
                $req->input('city'),
                $req->input('country'),
            )
        );
    }

    public function delete(string $id)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->airportService->delete($id)
        );
    }
}
