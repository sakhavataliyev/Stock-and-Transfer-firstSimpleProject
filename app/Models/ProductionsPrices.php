<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionsPrices extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_cost',
        'product_price',
        'product_price_status',
    ];
}
