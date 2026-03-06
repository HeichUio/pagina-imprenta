<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registro_produccion', function (Blueprint $table) {
            $table->id('id_registro');

            $table->date('fecha_salida'); 
            $table->integer('cantidad_utilizada')->nullable();
            $table->decimal('costo_produccion',10,2);
            $table->text('observaciones');

        
            $table->unsignedBigInteger('id_detalle');

            $table->foreign('id_detalle')
                  ->references('id_detalle')
                  ->on('detalle_cotizacion')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registro_produccion');
    }
};
