<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
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
            $table->foreignId('user_id')->constrained();
            $table->string('total')->nullable();
            $table->string('estado');
            $table->string('seguimiento')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('pago');
            $table->string('ref');
            $table->timestamps();
        });

        Schema::create('linea_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreignId('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->integer('cantidad');
            $table->float('subtotal');
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
        Schema::dropIfExists('linea_pedidos');

    }
}
