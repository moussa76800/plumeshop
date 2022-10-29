<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book__authors', function (Blueprint $table) {
           
            $table->id();
            $table->foreignId('book_id')->reference('id')->constrained('books')->onDelete('cascade');
            $table->foreignId('author_id')->reference('id')->constrained('authors')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book__authors');
    }
}
