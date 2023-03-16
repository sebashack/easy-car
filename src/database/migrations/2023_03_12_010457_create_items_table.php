<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('price_to_date');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
            $table->foreign('car_id')
                   ->references('id')
                   ->on('cars')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');
            $table->foreign('order_id')
                   ->references('id')
                   ->on('orders')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
