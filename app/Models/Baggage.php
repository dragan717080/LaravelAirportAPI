<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Baggage extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['weight', 'is_checked'];

    // Since baggage is singularia tantum table name must be specified
    protected $table = 'baggages';
}
