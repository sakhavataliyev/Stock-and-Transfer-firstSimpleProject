<?php

namespace App\Models;
use App\Models\Stocks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StocksViews extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'stock_quantity',
        'total_cost',
        'total_price',
    ];

    // protected $guarded = [];

    // public function content(){
    // 	return $this->belongsTo(Stocks::class,'product_id','id');
    // }
}
