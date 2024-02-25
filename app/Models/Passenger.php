<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Passenger extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['departure_time', 'arrival_time'];
}
