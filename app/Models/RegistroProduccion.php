<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\DetalleCotizacion;

class RegistroProduccion extends Model
{
    use HasFactory;

    protected $table = 'registro_produccion';
    protected $primaryKey = 'id_registro';

    protected $fillable = [
        'fecha_salida',
        'cantidad_utilizada',
        'costo_produccion',
        'observaciones',
        'id_detalle'
    ];

    
    public function detalle()
    {
        return $this->belongsTo(DetalleCotizacion::class, 'id_detalle', 'id_detalle');
    }

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($registro) {
            $detalle = DetalleCotizacion::find($registro->id_detalle);

            if ($detalle) {
                $registro->cantidad_utilizada = $detalle->cantidad;
            }
        });
    }

    
    public function getVentaAttribute()
    {
        return optional($this->detalle)->subtotal ?? 0;
    }


    public function getGananciaAttribute()
    {
        $venta = optional($this->detalle)->subtotal ?? 0;
        $costo = $this->costo_produccion ?? 0;

        return $venta - $costo;
    }
}
