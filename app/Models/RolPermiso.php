<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolPermiso extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    const DELETED_AT = 'eliminado_en';

    protected $table = 'rol_permiso';
    protected $primaryKey = 'rol_permiso_id';
    protected $fillable = [
        'rol_permiso_id',
        'rol_id',
        'permiso_id',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'rol_id');
    }

    public function permiso()
    {
        return $this->belongsTo(permiso::class, 'permiso_id', 'permiso_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($rol_permiso) {
            $rol_permiso->creado_por = auth()->id();
        });

        static::updating(function ($rol_permiso) {
            $rol_permiso->actualizado_por = auth()->id();
        });

        static::deleting(function ($rol_permiso) {
            $rol_permiso->eliminado_por = auth()->id();
        });
    }
}
