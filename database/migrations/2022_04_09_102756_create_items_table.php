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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('itemName')->nullable();

            $table->string('itemNameAr')->nullable();

            $table->text('itemDesc')->nullable();

            $table->text('itemDescAr')->nullable();

            $table->integer('itemPrice')->default(0);

            $table->integer('itemCount')->default(1);

            $table->integer('itemDiscount')->default(0);

            $table->boolean('active')->default(0);
            
            $table->bigInteger('main_type_id')->unsigned()->nullable();

            $table->bigInteger('sub_category_id')->unsigned()->nullable();
            $table->foreign('sub_category_id')
            ->references('id')
            ->on('sub_categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->foreign('country_id')
            ->references('id')
            ->on('countries')
            ->nullOnDelete()
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
        Schema::dropIfExists('items');
    }
};
