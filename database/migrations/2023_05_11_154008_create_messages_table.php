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
            $table->unsignedBigInteger('review_id')->nullable();
            $table->unsignedBigInteger('otherMessage_id')->nullable();
            $table->unsignedBigInteger('blogMessage_id')->nullable(); 
            $table->timestamps();

            // Définition des clés étrangères
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->foreign('otherMessage_id')->references('id')->on('others_messages')->onDelete('cascade');
            $table->foreign('blogMessage_id')->references('id')->on('blog_messages')->onDelete('cascade');
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
