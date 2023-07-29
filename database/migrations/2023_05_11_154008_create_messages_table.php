<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('content');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            // $table->unsignedBigInteger('reviews_id');
            //  $table->foreign('reviews_id')->references('id')->on('reviews')->onDelete('cascade');  
            // $table->unsignedBigInteger('othersMess_id');
            // $table->foreign('othersMess_id')->references('id')->on('others_messages')->onDelete('cascade');  
            // $table->unsignedBigInteger('blogMess_id');
            // $table->foreign('blogMess_id')->references('id')->on('blog_messages')->onDelete('cascade');  
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
        Schema::dropIfExists('messages');
    }
}
