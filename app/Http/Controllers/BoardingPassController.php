<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\ResponseBuilder;
use App\Services\BoardingPassService;

class BoardingPassController extends BaseController
{
    public function __construct(private BoardingPassService $boardingPassService) {}

    public function getAll()
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->boardingPassService->getAll()
        );
    }

    public function getById(string $id)
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->boardingPassService->getById($id)
        );
    }

    public function create(Request $req)
    {
        $boardingPass = $req->request->all();
        return ResponseBuilder::getResponse(fn () => 
            $this->boardingPassService->create(
                $boardingPass['seatNumber'],
                $boardingPass['gateNumber'],
                $boardingPass['boardingTime'],
                $boardingPass['passengerId'],
                $boardingPass['flightId'],
            )
        );
    }

    public function update(string $id, Request $req)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->boardingPassService->update(
                $id,
                $req->input('seatNumber'),
                $req->input('gateNumber'),
                $req->input('boardingTime'),
                $req->input('passengerId'),
                $req->input('flightId'),
            )
        );
    }

    public function delete(string $id)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->boardingPassService->delete($id)
        );
    }
}
