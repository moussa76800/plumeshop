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
            $table->string('category')->default('1');
            $table->string('subcategory')->default('1');
            $table->string('product')->default('1');
            $table->string('publisher')->default('1');
            $table->string('auteur')->default('1');
            $table->string('slider')->default('1');
            $table->string('coupons')->default('1');
            $table->string('shipping')->default('1');
            $table->string('blog')->default('1');
            $table->string('setting')->default('1');
            $table->string('returnorder')->default('1');
            $table->string('reviews')->default('1');
            $table->string('order')->default('1');
            $table->string('reports')->default('1');
            $table->string('stock')->default('1');
            $table->string('allusers')->default('1');
            $table->string('adminuserrole')->default('1');
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
