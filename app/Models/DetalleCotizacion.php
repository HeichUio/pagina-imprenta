<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleCotizacion extends Model
{
    use HasFactory;

    protected $table = 'detalle_cotizacion';
    protected $primaryKey = 'id_detalle';

    public $timestamps = false; 

    protected $fillable = [
        'descripcion_cot',
        'cantidad',
        'precio_unitario', 
        'subtotal',
        'id_cotizacion',
        'id_producto'
    ];

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'id_cotizacion', 'id_cotizacion');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }

    protected static function boot()
{
    parent::boot();


    static::creating(function ($detalle) {

        $producto = $detalle->producto()->lockForUpdate()->first();

        if (!$producto) {
            throw new \Exception('Producto no encontrado');
        }


        $producto->cantidad_disponible-= $detalle->cantidad;
        $producto->save();
    });
}

    
}
