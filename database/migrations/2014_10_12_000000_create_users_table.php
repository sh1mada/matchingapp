<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('hobby')->nullable();
            $table->string('gender');
            $table->string('password');
            $table->string('age')->nullable();
            $table->string('residence')->nullable();
            $table->string('food')->nullable();
            $table->string('salary')->nullable();
            $table->string('job')->nullable();
            $table->string('birthday')->nullable();
            $table->string('content')->nullable();
            $table->string('img_url')->default('images/user.png');
            $table->rememberToken();
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
        Schema::dropIfExists('chats');
        Schema::dropIfExists('users');
        
    }
}
