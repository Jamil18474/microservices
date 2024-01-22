<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = 'reservations';

    protected $fillable = [
        'id_user', 'idTarif', 'idSeance'
    ];
}