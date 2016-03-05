<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('title',150);
            $table->longText('question',30000);
            $table->integer('publisher_id');
            $table->integer('rate')->default(0);
            $table->dateTime('date');
            $table->string('subject');
            $table->string('tag_id');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Q', function (Blueprint $table) {
            //
        });
    }
}
