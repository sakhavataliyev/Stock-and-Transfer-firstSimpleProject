<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refunds extends Model
{
    use HasFactory;

    protected $fillable = [
        'transfer_id',
        'seller_id',
        'client_id',
        'product_id',
        'product_cost',
        'product_price',
        'product_quantity',
        'refunds_status',
    ];

}
