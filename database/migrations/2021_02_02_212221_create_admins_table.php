<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('product')->nullable();
            $table->string('publisher')->nullable();
            $table->string('auteur')->nullable();
            $table->string('slider')->nullable();
            $table->string('coupons')->nullable();
            $table->string('shipping')->nullable();
            $table->string('blog')->nullable();
            $table->string('setting')->nullable();
            $table->string('returnorder')->nullable();
            $table->string('reviews')->nullable();
            $table->string('order')->nullable();
            $table->string('reports')->nullable();
            $table->string('stock')->nullable();
            $table->string('allusers')->nullable();
            $table->string('adminuserrole')->nullable();
            $table->integer('type')->default(1);
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
        Schema::dropIfExists('admins');
    }
}
