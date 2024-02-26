<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permiso extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    const DELETED_AT = 'eliminado_en';
    
    protected $table = 'permiso';
    protected $primaryKey = 'permiso_id';
    protected $fillable = [
        'permiso_id',
        'permiso_nombre',
        'permiso_estado',
    ];

    public function rol_permiso()
    {
        return $this->hasMany(RolPermiso::class, 'permiso_id', 'permiso_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_permiso', 'permiso_id', 'rol_id');
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('permiso_nombre', 'LIKE', "%$search%");
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($permiso) {
            $permiso->creado_por = auth()->id();
        });

        static::updating(function ($permiso) {
            $permiso->actualizado_por = auth()->id();
        });

        static::deleting(function ($permiso) {
            $permiso->eliminado_por = auth()->id();
        });
    }
}
