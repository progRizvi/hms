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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_number');
            $table->unsignedBigInteger('room_number');
            $table->string('name');
            $table->enum('status', ['active', 'inactive']);
            $table->unsignedBigInteger('room_type_id');
            $table->json('beds');
            $table->json('images');
            $table->integer("single_bed");
            $table->integer("double_bed");
            $table->integer('person');
            $table->string('available_beds')->nullable();
            $table->string('availability')->nullable();
            $table->decimal('amount', 10, 2);
            $table->text('description')->nullable();
            $table->timestamps();

        });
        Schema::create('room_amenities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('amenity_id');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_amenities');
        Schema::dropIfExists('rooms');
    }
};
