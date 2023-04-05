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
        Schema::create('jacobis', function (Blueprint $table) {
            $table->id();
            $table->mediumText('matrix');
            $table->Integer('iterations');
            $table->float('dispersion', 5, 4);
            $table->String('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jacobis');
    }
};
