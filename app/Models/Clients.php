<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_surname',
        'client_store',
        'client_city',
        'client_phone',
        'client_status',
    ];

}
