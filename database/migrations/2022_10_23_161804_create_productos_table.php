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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('slug');
            $table->string('nombre');
            $table->string('tipo', 50); //tipo: 'untable', tipo: 'de horma'
            $table->string('descripcion');
            $table->smallInteger('precio');
            $table->smallInteger('stock')->nullable();
            $table->string('ingredientes')->nullable();

            $table->smallInteger('peso_neto')->nullable();
            $table->string('informacion_nutricional', 1000)->nullable();

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
        Schema::dropIfExists('productos');
    }
};
