<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotografos_estudios', function (Blueprint $table) {
            $table->id();
            $table->String('nombre');
            $table->String('apellidos');
            $table->String('foto_perfil');
            $table->String('email')->unique();
            $table->String('telefono');
            $table->unsignedSmallInteger('estudio')->default(0);
            $table->unsignedSmallIntegeR('tipo')->default('3');
            $table->unsignedSmallInteger('sexo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotografos_estudios');
    }
};