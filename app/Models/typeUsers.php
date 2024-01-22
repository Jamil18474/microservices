<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeUsers extends Model
{
    protected $table = 'type_users';

    protected $fillable = [
        'nom'
    ];
}
