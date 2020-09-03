<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('follows');
        Schema::create('follows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('follower_id')->unsigned();
            $table->integer('followee_id')->unsigned();
            $table->foreign('follower_id')->references('id')->on('users')->OnDelete('cascade');
            $table->foreign('followee_id')->references('id')->on('users')->OnDelete('cascade');
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
        Schema::dropIfExists('follows');
    }
}
