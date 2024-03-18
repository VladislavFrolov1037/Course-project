<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('address_id')->constrained();
            $table->foreignId('repair_type_id')->constrained();
            $table->integer('num_rooms');
            $table->integer('num_floors');
            $table->integer('floor');
            $table->integer('square');
            $table->integer('price');
            $table->string('type_object');
            $table->string('balcony');
            $table->string('rental_time');
            $table->text('description');
            $table->unsignedBigInteger('views')->default(0);
            $table->foreignId('status_id')->default(1)->constrained();
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
