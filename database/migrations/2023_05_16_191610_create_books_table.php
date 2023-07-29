<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('ISBN')->unique();
            $table->integer('num_pages');
            $table->string('image');
            $table->float('price');
            $table->string('datePublication');
            $table->string('langue');
            $table->string('product_code');
            $table->Integer('product_qty');
            $table->integer('discount_price')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('newBook')->nullable();
            $table->string('long_descp');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('categoryBook_id');
            $table->unsignedBigInteger('subCategory_id');
            $table->unsignedBigInteger('publisher_id');
            $table->foreign('categoryBook_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subCategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        
     Schema::dropIfExists('books');
    //    Schema::table('books', function (Blueprint $table) {
    //     $table->dropForeign(['subCategory_id']);
    //     $table->dropColumn('subCategory_id');
    // });
    }
}
