<?php

namespace App\Models;

use Database\Factories\UserTypeFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeUsers extends Model
{
    use HasFactory;
    protected $table = 'type_users';

    protected $fillable = [
        'nom'
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return UserTypeFactory::new();
    }
}
