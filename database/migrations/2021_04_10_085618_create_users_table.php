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
            $table->bincrements('id');
            
            $table->string('avatar',50)->nullable();
            $table->string('phone',12);
            $table->string('mail')->unique();
            $table->string('name',50);
            $table->string('surname',50);
            $table->integer('age');
            $table->date('date_registration');
            $table->string('password',30);
            $table->boolean('is_admin');
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
