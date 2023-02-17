<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productions extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_code',
        'product_size',
        'product_status',
    ];

}
