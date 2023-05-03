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
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained(
                table:'eventos'
            );
            $table->foreignId('fotografo_id')->constrained(
                table:'fotografos_estudios'
            );
            $table->decimal('precio',5,2);
            $table->String('url');
            $table->unsignedSmallInteger('tipo')->default(1);
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
        Schema::dropIfExists('fotos');
    }
};
