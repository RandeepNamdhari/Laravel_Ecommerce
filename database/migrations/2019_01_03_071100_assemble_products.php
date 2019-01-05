<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssembleProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('assemble_products', function (Blueprint $table) {
            $table->increments('assemble_product_id');
            $table->integer('categories_id');
            $table->integer('products_id');
            $table->tinyInteger('has_support');
            $table->timestamps();
            $table->foreign('products_id')
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
        Schema::dropIfExists('assemble_products');
    }
}
