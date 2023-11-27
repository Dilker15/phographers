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
        Schema::create('evento_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained(
                table:'eventos'
            )->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('invitado_id')->constrained(
                table:'invitados'
            )->nullable();
            $table->boolean('estado')->default(0);
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
        Schema::dropIfExists('evento_fotos');
    }
};
