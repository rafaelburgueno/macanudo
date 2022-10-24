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
        Schema::create('costo_de_envios', function (Blueprint $table) {
            $table->id();

            $table->string('region', 100)->nullable();
            $table->string('departamento', 50)->nullable();

            $table->tinyInteger('dias_de_demora')->nullable();
            $table->string('dia_de_entrega', 50)->nullable();
            $table->string('hora_de_entrega', 20)->nullable();

            $table->smallInteger('costo_de_envio')->nullable();
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
        Schema::dropIfExists('costo_de_envios');
    }
};
