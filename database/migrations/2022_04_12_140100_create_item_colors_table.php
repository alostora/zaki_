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
        Schema::create('item_colors', function (Blueprint $table) {
            $table->id();
            $table->integer('qty')->unsigned()->default(1);

            $table->bigInteger('color_id')->unsigned()->nullable();
            $table->foreign('color_id')
            ->references('id')
            ->on('colors')
            ->onDelete('cascade')
            ->onUpdate('cascade');


            $table->bigInteger('size_id')->unsigned()->nullable();
            $table->foreign('size_id')
            ->references('id')
            ->on('sizes')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->bigInteger('item_id')->unsigned()->nullable();
            $table->foreign('item_id')
            ->references('id')
            ->on('items')
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
        Schema::dropIfExists('item_colors');
    }
};
