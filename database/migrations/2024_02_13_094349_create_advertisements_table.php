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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('address_id')->constrained();
            $table->enum('repair_type', ['Без ремонта', 'Косметический ремонт', 'Евроремонт', 'Дизайнерский ремонт']);
            $table->integer('num_rooms');
            $table->integer('num_floors');
            $table->integer('floor')->nullable();
            $table->integer('square');
            $table->integer('price');
            $table->enum('type_object', ['Квартира', 'Дом']);
            $table->string('balcony')->nullable();
            $table->enum('rental_time', ['Долгосрочно', 'Посуточно']);
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
