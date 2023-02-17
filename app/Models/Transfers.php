<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfers extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'transfer_name',
        'transfer_status',
    ];

}
