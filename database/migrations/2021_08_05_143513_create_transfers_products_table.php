<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers_products', function (Blueprint $table) {
            $table->id();
            $table->integer('transfer_id');
            $table->integer('client_id');
            $table->integer('product_id');
            $table->float('product_cost', 8, 2);
            $table->float('product_price', 8, 2);
            $table->float('product_quantity', 8, 2);
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
        Schema::dropIfExists('transfers_products');
    }
}
