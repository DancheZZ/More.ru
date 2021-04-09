<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image',50);
            $table->string('subjects',50);
            $table->bigInteger('money_required');
            $table->bigInteger('collected_money');
            $table->string('description',180);
            $table->integer('count_likes');
            $table->integer('count_dislikes');
            $table->date('start_date');
            $table->date('final_date');
            $table->boolean('completed');
            $table->string('comment_moderator',180);
            $table->boolean('published');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
