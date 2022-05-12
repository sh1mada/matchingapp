<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_like', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('like_id');
            $table->unsignedBigInteger('status')->nullable();//申請=1 承認された=2 拒否された=3
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('like_id')->references('id')->on('users');
            
            $table->unique(['user_id', 'like_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_like');
    }
}
