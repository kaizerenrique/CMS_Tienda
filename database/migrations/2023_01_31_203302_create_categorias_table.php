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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('categoria');//nombre de la categoria
            $table->string('descripcion')->nullable();//descripción de la categoria
            $table->boolean('stado')->default(null)->nullable();//estado de categoria 
            $table->string('slug');// slug para rutas
            $table->string('cover_img')->nullable();//imagen de categoria
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
        Schema::dropIfExists('categorias');
    }
};
