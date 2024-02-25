<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\ResponseBuilder;
use App\Services\BaggageService;

class BaggageController extends BaseController
{
    public function __construct(private BaggageService $baggageService) {}

    public function getAll()
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->baggageService->getAll()
        );
    }

    public function getById(string $id)
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->baggageService->getById($id)
        );
    }

    public function create(Request $req)
    {
        $baggage = $req->request->all();
        return ResponseBuilder::getResponse(fn () => 
            $this->baggageService->create(
                $baggage['weight'],
                $baggage['isChecked'],
                $baggage['passengerId'],
                $baggage['flightId'],
            )
        );
    }

    public function update(string $id, Request $req)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->baggageService->update(
                $id,
                $req->input('weight'),
                $req->input('isChecked'),
                $req->input('passengerId'),
                $req->input('flightId'),
            )
        );
    }

    public function delete(string $id)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->baggageService->delete($id)
        );
    }
}
