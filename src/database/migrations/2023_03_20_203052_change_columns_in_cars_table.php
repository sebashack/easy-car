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
        Schema::table('cars', function (Blueprint $table) {
            $table->enum('transmission_type', ['mechanic', 'automatic', 'triptonic'])
            ->change();
            $table->enum('type', ['van', 'sedan', 'truck', 'suv', 'coupe', 'sport'])
            ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['transmission_type', 'type']);
        });
    }
};
