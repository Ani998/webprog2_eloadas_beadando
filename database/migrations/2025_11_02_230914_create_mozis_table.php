<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mozi', function (Blueprint $table) {
            $table->integer('id');       // id (szám)
            $table->string('neve');      // neve (szöveg)
            $table->string('varos');     // varos (szöveg)
            $table->integer('ferohely'); // ferohely (szám)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mozi');
    }
};
