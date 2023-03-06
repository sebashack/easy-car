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
            $table->enum('transmission_type', ['Mechanic', 'Automatic', 'Triptonic']);
            $table->enum('type', ['Van', 'Sedan', 'Truck', 'SUV', 'Coupe']);
            $table->year('manufacture_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car', function (Blueprint $table) {
            //
        });
    }
};
