<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\ResponseBuilder;
use App\Services\PassengerService;

class PassengerController extends BaseController
{
    public function __construct(private PassengerService $passengerService) {}

    public function getAll()
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->passengerService->getAll()
        );
    }

    public function getById(string $id)
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->passengerService->getById($id)
        );
    }

    public function create(Request $req)
    {
        $passenger = $req->request->all();
        return ResponseBuilder::getResponse(fn () => 
            $this->passengerService->create(
                $passenger['name'],
                $passenger['passport']
            )
        );
    }

    public function update(string $id, Request $req)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->passengerService->update(
                $id,
                $req->input('name'),
                $req->input('passport'),
            )
        );
    }

    public function delete(string $id)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->passengerService->delete($id)
        );
    }
}
