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
        Schema::table('users', function (Blueprint $table) {
            //direccion_de_entrega
            //$table->string('direccion_de_entrega')->nullable();
            //telefono
            //$table->string('telefono')->nullable();

            //fecha_de_nacimiento
            $table->date('fecha_de_nacimiento')->nullable();
            //ingredientes_que_no_consumo
            $table->string('ingredientes_que_no_consumo')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //fecha_de_nacimiento
            $table->dropColumn('fecha_de_nacimiento');
            //ingredientes_que_no_consumo
            $table->dropColumn('ingredientes_que_no_consumo');
        });
    }
};
