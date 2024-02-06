<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->text('description');
            $table->string('image');
            $table->integer('price');
            $table->integer('square');
            $table->integer('floor');
            $table->integer('num_floors');
            $table->string('city');
            $table->string('time_of_agreement');
            $table->boolean('balcony');
            $table->integer('num_rooms');
            $table->string('phone');
            $table->unsignedInteger('views')->default(0);
            $table->boolean('is_published')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('products');
    }
};
