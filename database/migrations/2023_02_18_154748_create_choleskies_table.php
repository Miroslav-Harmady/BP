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
        Schema::create('choleskies', function (Blueprint $table) {
            $table->id('id');
            $table->String('left');
            $table->String('right');
            $table->Integer('approximation');
            $table->String('resultL');
            $table->String('resultX');
            $table->String('resultY');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choleskies');
    }
};
