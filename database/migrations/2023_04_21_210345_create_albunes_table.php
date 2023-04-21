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
        Schema::create('albunes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fotografo_id')->constrained(
                table:'fotografos_estudios'
            );
            $table->String('foto1');
            $table->String('foto2');
            $table->String('foto3');
            $table->String('foto4');
            $table->String('foto5');
            $table->String('foto6');
            $table->String('foto7');
            $table->String('foto8');
            $table->String('foto9');
            $table->String('foto10');
            
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
        Schema::dropIfExists('albunes');
    }
};
