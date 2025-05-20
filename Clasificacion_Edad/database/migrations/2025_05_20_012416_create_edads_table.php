<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('edads', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('valor'); // TINYINT (0-255) es suficiente para edades
            $table->string('rango'); // Para guardar el rango al que pertenece
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('edads');
    }
};