<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre_p');
            $table->string('descripcion_p');
            $table->string('unidad_m', 20);
            $table->decimal('costo_unitario', 10, 2);
            $table->decimal('precio_venta', 10, 2);
            $table->integer('cantidad_disponible');
            $table->date('fecha_entrada');

            
            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')
                  ->references('id_proveedor')
                  ->on('proveedores')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
