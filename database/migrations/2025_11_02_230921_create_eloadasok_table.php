<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eloadas', function (Blueprint $table) {
            $table->integer('filmid');   // filmid (szám)
            $table->integer('moziid');   // moziid (szám)
            $table->date('datum');       // datum (dátum)
            $table->integer('nezoszam'); // nezoszam (szám)
            $table->integer('bevetel');  // bevetel (szam)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eloadas');
    }
};
