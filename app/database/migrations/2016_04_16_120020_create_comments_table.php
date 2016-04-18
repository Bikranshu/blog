<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //comments table
        Schema::create('comments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->default(0);
            $table->foreign('post_id')
                    ->references('id')->on('posts')
                    ->onDelete('cascade');
            $table->integer('commentor_id')->unsigned()->default(0);
            $table->foreign('commentor_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->text('body');
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
        // drop comments
        Schema::drop('comments');
    }

}
