<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre_p',
        'descripcion_p',
        'unidad_m',
        'costo_unitario',
        'precio_venta',
        'cantidad_disponible',
        'fecha_entrada',
        'id_proveedor' 
    ];

    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor', 'id_proveedor');
    }
}
