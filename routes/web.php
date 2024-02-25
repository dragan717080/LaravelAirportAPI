<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AirportController,
    AirlineController,
    FlightController,
    PassengerController,
    TicketController,
    BaggageController,
    BoardingPassController,
};
use App\Models\BoardingPass;

Route::prefix('airports')->group(function() {
    Route::get('/', [AirportController::class, 'getAll']);
    Route::get('/{id}', [AirportController::class, 'getById']);
    Route::post('/', [AirportController::class, 'create']);
    Route::patch('/{id}', [AirportController::class, 'update']);
    Route::delete('/{id}', [AirportController::class, 'delete']);
});

Route::prefix('airlines')->group(function() {
    Route::get('/', [AirlineController::class, 'getAll']);
    Route::get('/{id}', [AirlineController::class, 'getById']);
    Route::post('/', [AirlineController::class, 'create']);
    Route::patch('/{id}', [AirlineController::class, 'update']);
    Route::delete('/{id}', [AirlineController::class, 'delete']);
});

Route::prefix('flights')->group(function() {
    Route::get('/', [FlightController::class, 'getAll']);
    Route::get('/{id}', [FlightController::class, 'getById']);
    Route::post('/', [FlightController::class, 'create'])->middleware('validateFlightTimes');
    Route::patch('/{id}', [FlightController::class, 'update'])->middleware('validateFlightTimes');
    Route::delete('/{id}', [FlightController::class, 'delete']);
});

Route::prefix('passengers')->group(function() {
    Route::get('/', [PassengerController::class, 'getAll']);
    Route::get('/{id}', [PassengerController::class, 'getById']);
    Route::post('/', [PassengerController::class, 'create'])->middleware('validatePassport');
    Route::patch('/{id}', [PassengerController::class, 'update'])->middleware('validatePassport');
    Route::delete('/{id}', [PassengerController::class, 'delete']);
});

Route::prefix('tickets')->group(function() {
    Route::get('/', [TicketController::class, 'getAll']);
    Route::get('/{id}', [TicketController::class, 'getById']);
    Route::post('/', [TicketController::class, 'create'])->middleware('validatePassport');
    Route::patch('/{id}', [TicketController::class, 'update'])->middleware('validatePassport');
    Route::delete('/{id}', [TicketController::class, 'delete']);
});

Route::prefix('baggages')->group(function() {
    Route::get('/', [BaggageController::class, 'getAll']);
    Route::get('/{id}', [BaggageController::class, 'getById']);
    Route::post('/', [BaggageController::class, 'create'])->middleware('validatePassport');
    Route::patch('/{id}', [BaggageController::class, 'update'])->middleware('validatePassport');
    Route::delete('/{id}', [BaggageController::class, 'delete']);
});

Route::prefix('boarding-passes')->group(function() {
    Route::get('/', [BoardingPassController::class, 'getAll']);
    Route::get('/{id}', [BoardingPassController::class, 'getById']);
    Route::post('/', [BoardingPassController::class, 'create'])->middleware('validatePassport');
    Route::patch('/{id}', [BoardingPassController::class, 'update'])->middleware('validatePassport');
    Route::delete('/{id}', [BoardingPassController::class, 'delete']);
});

Route::get('/', function () {
    return view('welcome');
});
