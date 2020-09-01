<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('product_category', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('product_id')->unsigned();
        //     $table->integer('category_id')->unsigned();
        //     $table->foreign('product_id')->references('id')->on('products');
        //     $table->foreign('category_id')->references('id')->on('categories');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // $table->dropForeign('products_product_id_foreign');
        // $table->dropForeign('categories_category_id_foreign');
        Schema::dropIfExists('product_category');
    }
}
