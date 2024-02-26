<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    const DELETED_AT = 'eliminado_en';

    protected $table = 'rol';
    protected $primaryKey = 'rol_id';
    protected $fillable = [
        'rol_id',
        'rol_nombre',
        'rol_estado',
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'rol_id', 'rol_id');
    }

    public function rol_permiso()
    {
        return $this->hasMany(RolPermiso::class, 'rol_id', 'rol_id');
    }

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'rol_permiso', 'rol_id', 'permiso_id');
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('rol_nombre', 'LIKE', "%$search%");
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($rol) {
            $rol->creado_por = auth()->id();
        });

        static::updating(function ($rol) {
            $rol->actualizado_por = auth()->id();
        });

        static::deleting(function ($rol) {
            $rol->eliminado_por = auth()->id();
        });
    }
}
