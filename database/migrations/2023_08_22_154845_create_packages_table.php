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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId("room_id")->constrained("rooms")->onDelete("cascade");
            $table->tinyInteger("days");
            $table->tinyInteger("nights");
            $table->tinyInteger("person");
            $table->tinyInteger("adult")->nullable();
            $table->tinyInteger("child")->nullable();
            $table->string("location")->nullable();
            $table->string("image");
            $table->integer("price");
            $table->string("status")->default("active");
            $table->text("description")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
