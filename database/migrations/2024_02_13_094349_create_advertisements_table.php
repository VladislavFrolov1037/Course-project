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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('address', 100);
            $table->integer('house_number');
            $table->text('description');
            $table->integer('price');
            $table->integer('square');
            $table->integer('floor');
            $table->integer('num_floors');
            $table->string('balcony');
            $table->foreignId('rental_time_id')->constrained();
            $table->integer('num_rooms');
            $table->foreignId('repair_type_id')->constrained();
            $table->foreignId('status_id')->constrained();
            $table->unsignedBigInteger('views')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->foreignId('type_object_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
