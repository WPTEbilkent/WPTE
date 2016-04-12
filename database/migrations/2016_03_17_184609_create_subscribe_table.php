<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('subscriber_id')->unsigned()->index();
            $table->integer('subscribed_id')->unsigned()->index();
            $table->timestamps();

            //constraints for table
            $table->foreign('subscriber_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('subscribed_id')
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
        Schema::table('subscribe', function (Blueprint $table) {
            $table->dropForeign('subscribe_subscriber_id_foreign');
            $table->dropForeign('subscribe_subscribed_id_foreign');
        });

        Schema::drop('subscribe');
    }
}
