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
            $table->string('status')->default(0);
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('review_id')->nullable();
            $table->unsignedBigInteger('other_id')->nullable();
            $table->unsignedBigInteger('blog_id')->nullable(); 
            $table->timestamps();

            // Définition des clés étrangères
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->foreign('other_id')->references('id')->on('messages')->onDelete('cascade');
            $table->foreign('blog_id')->references('id')->on('blog_posts')->onDelete('cascade');
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
