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
        Schema::create('invitados', function (Blueprint $table) {
            $table->id();
            $table->String('nombre');
            $table->String('apellidos')->nullable();
            $table->String('foto_perfil')->nullable();
            $table->String('email')->unique();
            $table->String('telefono')->nullable();
            $table->unsignedSmallInteger('sexo')->default(1)->nullable();
            $table->unsignedSmallInteger('tipo')->default(2);
            

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
        Schema::dropIfExists('invitados');
    }
};
