<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // ✅ IMPORTANTE

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // ✅ agregado

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre_u',
        'telefono_u',
        'correo_u',
        'codigo_postal',
        'role',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔥 Laravel usará correo_u como email
    public function getAuthIdentifierName()
    {
        return 'correo_u';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    // Para que auth()->user()->name funcione
    public function getNameAttribute()
    {
        return $this->nombre_u;
    }

    // Para rutas con id_usuario
    public function getRouteKeyName()
    {
        return 'id_usuario';
    }
}