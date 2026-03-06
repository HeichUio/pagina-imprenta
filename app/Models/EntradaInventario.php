<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class EntradaInventario extends Model
{
    protected $table = 'entradas';
    protected $primaryKey = 'id_entrada';

    protected $fillable = [
        'id_producto',
        'cantidad',
        'costo_unitario',
        'observaciones',
        'fecha_entrada'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($entrada) {

            $producto = Producto::find($entrada->id_producto);

            if ($producto) {
                $producto->cantidad_disponible += $entrada->cantidad;
                $producto->save();
            }
        });
    }
}
