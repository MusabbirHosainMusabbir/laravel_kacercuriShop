<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('product_name');
            $table->float('product_price','8','2');
            $table->text('product_description');
            $table->text('product_image');
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
        Schema::defaultStringLength(191);
        Schema::dropIfExists('products');
    }
}
