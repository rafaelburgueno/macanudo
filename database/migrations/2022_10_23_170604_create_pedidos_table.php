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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->string('status', 50); //'pedido', 'preparando/despachando', 'en camino', 'entregado'
            $table->string('tipo', 50)->nullable(); // 'pedido normal', 'club del queso'

            $table->unsignedBigInteger('canasta_id')->nullable();
            $table->foreign('canasta_id')->references('id')->on('canastas')->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->string('nombre');
            $table->string('email');
            $table->string('documento_de_identidad', 20)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('direccion', 100);
            $table->string('localidad', 50)->nullable();
            $table->string('departamento', 50)->nullable();
            $table->string('pais', 50)->nullable();

            $table->unsignedBigInteger('costo_de_envio_id')->nullable();
            $table->foreign('costo_de_envio_id')->references('id')->on('costo_de_envios')->onDelete('set null');

            $table->unsignedBigInteger('cupon_id')->nullable();
            $table->foreign('cupon_id')->references('id')->on('cupons')->onDelete('set null');
            
            $table->string('medio_de_pago', 50)->nullable();
            $table->integer('monto');
            $table->boolean('recibir_novedades')->default(true);
            $table->string('tipo_de_cliente', 50)->nullable();
            $table->integer('numero_de_factura')->nullable();

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
        Schema::dropIfExists('pedidos');
    }
};
