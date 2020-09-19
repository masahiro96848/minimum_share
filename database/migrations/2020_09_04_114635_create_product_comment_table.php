<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('product_comment');

        // Schema::create('product_comment', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('product_id')->unsigned();
        //     $table->integer('comment_id')->unsigned();
        //     $table->foreign('product_id')->references('id')->on('products')->OnDelete('cascade');
        //     $table->foreign('comment_id')->references('id')->on('comments')->OnDelete('cascade');
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
        // Schema::dropIfExists('comments');
        // Schema::dropIfExists('product_comment');
    }
}
