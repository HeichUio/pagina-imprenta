<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';

    protected $fillable = [
        'nombre_prov',
        'telefono_prov',
        'correo_pro'
    ];

    public function getRouteKeyName()
    {
        return 'id_proveedor';
    }
}