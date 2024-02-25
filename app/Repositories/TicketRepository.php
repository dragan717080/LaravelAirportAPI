<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Repositories\{ PassengerRepository, FlightRepository };
use App\Repositories\Traits\{ GetByIdTrait, DeleteTrait, GetByNameTrait };

class TicketRepository
{
    use GetByIdTrait;
    use DeleteTrait;
    use GetByNameTrait;

    public $model;

    public function __construct(
        private PassengerRepository $passengerRepository,
        private FlightRepository $flightRepository
    )
    {
        $this->model = new Ticket();
    }

    public function getAll()
    {
        return Ticket::all();
    }

    public function update(
        string $id,
        ?int $seatNumber,
        ?int $ticketPrice,
        ?string $passengerId,
        ?string $flightId
    )
    {
        $ticket = $this->model->find($id);

        if (!$ticket) {
            return null;
        }

        if ($seatNumber !== null) {
            $ticket->seat_number = $seatNumber;
        }

        if ($ticketPrice !== null) {
            $ticket->ticket_price = $ticketPrice;
        }

        if ($passengerId !== null) {
            $passenger = $this->passengerRepository->getById($passengerId);
            $ticket->passenger_id = $passenger->id;
        }

        if ($flightId !== null) {
            $flight = $this->flightRepository->getById($flightId);
            $ticket->flight_id = $flight->id;
        }

        $ticket->save();

        return $ticket;
    }

    public function create(
        int $seatNumber,
        int $ticketPrice,
        string $passengerId,
        string $flightId
    )
    {
        $ticket = new Ticket();

        $passenger = $this->passengerRepository->getById($passengerId);
        $flight = $this->flightRepository->getById($flightId);

        $ticket->seat_number = $seatNumber;
        $ticket->ticket_price = $ticketPrice;
        $ticket->passenger_id = $passenger->id;
        $ticket->flight_id = $flight->id;

        $ticket->save();

        return $ticket;
    }
}
