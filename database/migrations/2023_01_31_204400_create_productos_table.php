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
            $table->string('nombre');//nombre del producto
            $table->string('descripcion')->nullable();//descripción de la categoria
            $table->decimal('costo', 12, 3);//costo del producto
            $table->boolean('iva')->default(true);//el producto tiene impuesto IVA
            $table->enum('metodo',['USD' , 'BS']);//moneda
            $table->string('codigo')->nullable();//codigo alterno
            $table->boolean('stado')->default(false);//estado de del producto 
            $table->boolean('destacado')->default(false);//el producto es destacado
            $table->boolean('delivery')->default(true);//el producto tiene impuesto IVA            
            $table->string('cover_img')->nullable();//imagen de de producto
            $table->string('slug');// slug para rutas
            
            $table->foreignId('categoria_id') // UNSIGNED BIG INT
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
        Schema::dropIfExists('productos');
    }
};
