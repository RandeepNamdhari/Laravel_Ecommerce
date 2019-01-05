<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supported_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assemble_product_id');
            $table->integer('supported_products_id');
            $table->timestamps();
            $table->foreign('supported_products_id')
                  ->references('products_id')->on('products')
                  ->onDelete('cascade');
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supported_products');
    }
}
