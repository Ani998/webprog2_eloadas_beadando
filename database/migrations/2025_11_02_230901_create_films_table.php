<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('film', function (Blueprint $table) {
            $table->integer('id');       // id (szám)
            $table->string('cim');       // cim (szöveg)
            $table->integer('ev');       // ev (szám)
            $table->integer('hossz');    // hossz (szám)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('film');
    }
};
