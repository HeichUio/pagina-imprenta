<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';
    protected $primaryKey = 'id_cotizacion';

    protected $fillable = [
        'fecha_creacion',
        'fecha_vigencia',
        'total_estimado',
        'estado_c',
        'id_usuario' 
    ];

    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function detalles()
{
    return $this->hasMany(DetalleCotizacion::class, 'id_cotizacion', 'id_cotizacion');
}


}
