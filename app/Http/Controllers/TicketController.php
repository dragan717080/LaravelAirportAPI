<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\ResponseBuilder;
use App\Services\TicketService;

class TicketController extends BaseController
{
    public function __construct(private TicketService $ticketService) {}

    public function getAll()
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->ticketService->getAll()
        );
    }

    public function getById(string $id)
    {
        return ResponseBuilder::getResponse(fn () =>
            $this->ticketService->getById($id)
        );
    }

    public function create(Request $req)
    {
        $ticket = $req->request->all();
        return ResponseBuilder::getResponse(fn () => 
            $this->ticketService->create(
                $ticket['seatNumber'],
                $ticket['ticketPrice'],
                $ticket['passengerId'],
                $ticket['flightId'],
            )
        );
    }

    public function update(string $id, Request $req)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->ticketService->update(
                $id,
                $req->input('seatNumber'),
                $req->input('ticketPrice'),
                $req->input('passengerId'),
                $req->input('flightId'),
            )
        );
    }

    public function delete(string $id)
    {
        return ResponseBuilder::getResponse(fn () => 
            $this->ticketService->delete($id)
        );
    }
}
