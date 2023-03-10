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
            $table->renameColumn('isNew', 'is_new')->change();
            $table->renameColumn('isAvailable', 'is_available')->change();
            $table->string('image_uri');
            $table->enum('transmission_type', ['mechanic', 'automatic', 'tripronic']);
            $table->enum('type', ['van', 'sedan', 'truck', 'suv', 'coupe']);
            $table->year('manufacture_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['image_uri', 'transmission_type', 'type', 'manufacture_year']);
        });
    }
};
