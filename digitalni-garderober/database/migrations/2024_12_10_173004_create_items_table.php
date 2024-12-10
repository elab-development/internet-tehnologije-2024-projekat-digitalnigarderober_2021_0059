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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('ime');
            $table->string('kategorija');
            $table->string('boja');
            $table->string('temperatura');
            $table->string('slika');
            $table->unsignedBigInteger('wardrobe_id');
            $table->timestamps();

            $table->foreign('wardrobe_id')->references('id')->on('wardrobes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
