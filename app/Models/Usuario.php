<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    const DELETED_AT = 'eliminado_en';

    protected $table = 'usuario';
    protected $primaryKey = 'usuario_id';
    protected $fillable = [
        'usuario_id',
        'usuario_correo',
        'usuario_contrasenia',
        'usuario_avatar',
        'usuario_estado',
        'persona_id',
        'rol_id',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'persona_id');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'rol_id');
    }

    public function getPermisoBoolAttribute($permiso): bool
    {
        $rol = $this->rol;
        $permisos = $rol->permisos;
        return $permisos->contains('permiso', $permiso);
    }

    public function tieneRol($rol): bool
    {
        $rol = $this->rol;
        return $rol->rol === $rol;
    }

    public function getAdminAttribute(): bool
    {
        return $this->tieneRol('ADMINISTRADOR');
    }

    //Comprobar las credenciales del usuario con contraseña hasheada
    public function comprobarCredenciales($contrasenia): bool
    {
        return password_verify($contrasenia, $this->usuario_contrasenia);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($usuario) {
            $usuario->creado_por = auth()->id();
        });

        static::updating(function ($usuario) {
            $usuario->actualizado_por = auth()->id();
        });

        static::deleting(function ($usuario) {
            $usuario->eliminado_por = auth()->id();
        });
    }
}
