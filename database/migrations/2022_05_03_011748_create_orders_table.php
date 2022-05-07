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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('orderCode')->nullable();
            $table->string('status')->default('new');
            
            $table->text('shippingDetails')->nullable();
            $table->text('notes')->nullable();
            
            $table->enum('paymentMethod',['cash','online'])->default('cash');//[online,cash]
            
            $table->integer('total_price')->default(1);
            $table->integer('discountCopon')->default(0)->nullable();
            $table->integer('shippingValue')->default(1);


            $table->bigInteger("user_id")->unsigned();
            $table->bigInteger("admin_id")->unsigned()->nullable();//admin table like employee
            $table->bigInteger("delivery_id")->unsigned()->nullable();//admin table like employee

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('admin_id')
            ->references('id')
            ->on('admins')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->foreign('delivery_id')
            ->references('id')
            ->on('admins')
            ->onDelete('set null')
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
        Schema::dropIfExists('orders');
    }
};
