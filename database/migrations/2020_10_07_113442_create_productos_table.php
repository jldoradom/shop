<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabricantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('pais');
            $table->string('telefono');
            $table->string('direccion_id')->constrained();
            $table->string('web');
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('id_categoria_padre')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->double('precio');
            $table->integer('estado');
            $table->foreignId('user_id')->constrained();
            $table->uuid('uuid');
            $table->foreignId('fabricante_id')->constrained();
            $table->foreignId('categoria_id')->constrained();
            $table->string('codigo');
            $table->string('categoria_web');
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
        Schema::dropIfExists('fabricantes');
        Schema::dropIfExists('productos');

    }
}
