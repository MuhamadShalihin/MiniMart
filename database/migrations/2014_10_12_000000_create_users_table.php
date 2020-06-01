<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('user_level')->nullable();
            $table->string('email')->unique();
            $table->string('street')->nullable();
            $table->string('state');
            $table->char('postal_code')->default('5');
            $table->string('bank_name')->nullable();
            $table->string('card_number')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('cvv2')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
