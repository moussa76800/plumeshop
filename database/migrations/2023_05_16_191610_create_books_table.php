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
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('ISBN')->unique();
            $table->string('image');
            $table->float('prix');
            $table->string('datePublication');
            $table->string('langue');
            $table->Integer('product_code');
            $table->Integer('product_qty');
            $table->integer('discount_price')->nullable();
            $table->string('short_descp_en');
            $table->string('short_descp_fr');
            $table->string('product_thambnail');
            $table->integer('special_offer')->nullable();
            $table->integer('featured')->nullable();
            $table->string('long_descp_en');
            $table->string('long_descp_fr');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('subCategory_id'); 
            $table->unsignedBigInteger('categoryBook_id'); 
            $table->unsignedBigInteger('publisher_id');
            $table->foreign('categoryBook_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreign('subCategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
}
