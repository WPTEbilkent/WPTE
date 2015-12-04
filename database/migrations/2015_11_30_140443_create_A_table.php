<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('question_id')->unsigned()->index();
            $table->longText('answer',30000);
            $table->integer('answerer_id');
            $table->integer('rate')->defult(0);
            $table->dateTime('created_at');


        });
        Schema::table('answers', function (Blueprint $table){
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('A', function (Blueprint $table) {
            //
        });
    }
}
