<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\ResponseBuilder;
use App\Services\AirlineService;

class AirlineController extends BaseController
{
    public function __construct(private AirlineService $airlineService) {}

    public function getAll()
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->airlineService->getAll()
        );
    }

    public function getById(string $id)
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->airlineService->getById($id)
        );
    }

    public function create(Request $req)
    {
        $airline = $req->request->all();
        return ResponseBuilder::getResponse(fn () => 
            $this->airlineService->create(
                $airline['name'],
                $airline['city'],
                $airline['country'],
                $airline['founded'],
                $airline['fleetSize'],
                $airline['destinations'],
            )
        );
    }

    public function update(string $id, Request $req)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->airlineService->update(
                $id,
                $req->input('name'),
                $req->input('city'),
                $req->input('country'),
                $req->input('founded'),
                $req->input('fleetSize'),
                $req->input('destinations'),
            )
        );
    }

    public function delete(string $id)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->airlineService->delete($id)
        );
    }
}
