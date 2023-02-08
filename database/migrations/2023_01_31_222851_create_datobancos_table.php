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
        Schema::create('datobancos', function (Blueprint $table) {
            $table->id();
            $table->string('nrocuenta');
            $table->string('cuentadante');
            $table->string('nrotelefono')->nullable();;
            $table->string('tipo');
            $table->string('documento');
            $table->boolean('transferencia')->nullable();
            $table->boolean('pagomovil')->nullable();

            $table->foreignId('banco_id') // UNSIGNED BIG INT
                    ->nullable() // <-- IMPORTANTE: LA COLUMNA DEBE ACEPTAR NULL COMO VALOR VALIDO
                    ->constrained()  // <-- DEFINE LA RESTRICCION DE LLAVE FORANEA
                    ->onDelete('SET NULL')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('datobancos');
    }
};
