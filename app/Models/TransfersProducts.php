<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransfersProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'transfer_id',
        'client_id',
        'product_id',
        'product_price',
        'product_quantity',
    ];




}
