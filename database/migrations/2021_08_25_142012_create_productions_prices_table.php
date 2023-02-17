<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->float('product_cost', 8, 2);
            $table->float('product_price', 8, 2);
            $table->integer('product_price_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productions_prices');
    }
}
