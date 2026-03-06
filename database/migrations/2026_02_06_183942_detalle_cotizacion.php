<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_cotizacion', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->string('descripcion_cot');
            $table->integer('cantidad');
            $table->decimal('precio_unitario',10,2);
            $table->decimal('subtotal',10,2);
           
            $table->unsignedBigInteger('id_cotizacion');
            $table->foreign('id_cotizacion')
                  ->references('id_cotizacion')
                  ->on('cotizaciones')
                  ->onDelete('cascade');

            
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')
                  ->references('id_producto')
                  ->on('productos')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_cotizacion');
    }
};
