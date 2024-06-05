<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {

            $table->id();

            $table->string('subCategoryName')->nullable();

            $table->string('subCategoryNameAr')->nullable();

            $table->string('subCategoryImage')->nullable();

            $table->bigInteger('main_type_id')->unsigned()->nullable();

            $table->foreign('main_type_id')

                ->references('id')

                ->on('main_types')

                ->onDelete('cascade')

                ->onUpdate('cascade');

            $table->bigInteger('category_id')->unsigned()->nullable();

            $table->foreign('category_id')

                ->references('id')

                ->on('categories')

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
        Schema::dropIfExists('sub_categories');
    }
};
