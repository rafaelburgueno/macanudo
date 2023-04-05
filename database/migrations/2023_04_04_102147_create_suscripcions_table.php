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
        Schema::create('suscripcions', function (Blueprint $table) {
            $table->id();


            //$table->string('nombre')->nullable();
            $table->string('tipo')->nullable();
            $table->smallInteger('precio')->nullable();
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            //direccion_de_entrega
            $table->string('direccion_de_entrega')->nullable();
            //telefono
            $table->string('telefono')->nullable();

            // cantidad de canastas
            $table->tinyInteger('cantidad_de_canastas')->nullable();

            // columna fecha_de_inicio
            $table->date('fecha_de_inicio')->nullable();
            // columna fecha_de_renovacion
            $table->date('fecha_de_renovacion')->nullable();
            
            // cantidad de quesos
            $table->tinyInteger('cantidad_de_quesos')->nullable();
            // dia de entrega
            $table->string('dia_de_entrega')->nullable();
            // activo
            $table->boolean('activo')->default(true);




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
        Schema::dropIfExists('suscripcions');
    }
};
