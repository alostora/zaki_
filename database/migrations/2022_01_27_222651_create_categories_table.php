<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->id();

            $table->string('categoryName')->nullable();

            $table->string('categoryNameAr')->nullable();

            $table->string('categoryImage')->nullable();

            $table->bigInteger('main_type_id')->unsigned()->nullable();

            $table->foreign('main_type_id')
                ->references('id')
                ->on('main_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('categories');
    }
}
