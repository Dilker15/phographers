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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->String('nombre');
            $table->String('descripcion');
            $table->date('fecha_evento');
            $table->time('hora_evento');
            $table->unsignedSmallInteger('estado');
            $table->String('ubicacion');
            // $table->foreignId('administador_id')->constrained(
            //     table: 'administradores'
            // );
            $table->foreignId('invitado_id')->constrained(
                table: 'invitados'
            )->nullable();
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
        Schema::dropIfExists('eventos');
    }
};
