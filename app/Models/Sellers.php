<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_name',
        'seller_surname',
        'seller_city',
        'seller_phone',
        'seller_status',
    ];


}
