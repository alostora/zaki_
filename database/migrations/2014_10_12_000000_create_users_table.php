<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable()->unique();
            $table->enum('gender',['male','female'])->nullable();
            $table->string('birthDate')->nullable();
            $table->string('image')->default('defaultLogo.png');
            $table->string('api_token')->unique()->nullable();
            $table->string('verify_token')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->text('shippingAddress')->nullable();
            
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->foreign('country_id')
            ->references('id')
            ->on('countries')
            ->onDelete('set null')
            ->onUpdate('cascade');


            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')
            ->references('id')
            ->on('cities')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
