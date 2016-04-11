<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unique();;
            $table->integer('user_id')->unsigned()->index();
            $table->integer('content_id')->unsigned()->index();
            $table->string('content');
            $table->tinyInteger('vote');

        //constraints for table
        $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign('votes_user_id_foreign');
        });

        Schema::drop('answers');
    }
}
