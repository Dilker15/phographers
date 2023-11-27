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
        Schema::create('lista_invitados', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('codigo_qr_id')->constrained(
            //     table:'codigos_qr'
            // )->nullable();
            $table->foreignId('invitado_id')->constrained(
                table:'invitados'
            )->nullable();

            $table->foreignId('evento_id')->constrained(
                table:'eventos'
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
        Schema::dropIfExists('lista_invitados');
    }
};
