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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users");
            $table->foreignId('room_id')->constrained('rooms')->restrictOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('adults')->nullable();
            $table->string('child')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('contact');
            $table->integer('days')->nullable();
            $table->integer('total_amount')->nullable();
            $table->integer('total_due')->nullable();
            $table->integer('advance')->nullable();
            $table->string('card_type')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
