<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_file', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id')->unsigned();
            $table->integer('file_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('message_id')->references('id')->on('messages');
            $table->foreign('file_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_file');
    }
}
