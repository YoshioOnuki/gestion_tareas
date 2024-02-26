<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Persona extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    const DELETED_AT = 'eliminado_en';

    protected $table = 'persona';
    protected $primaryKey = 'persona_id';
    protected $fillable = [
        'persona_id',
        'persona_nombre',
        'persona_apellido_paterno',
        'persona_apellido_materno',
        'persona_celular',
        'persona_estado',
    ];

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'persona_id', 'persona_id');
    }

    public function getAvatarAttribute(): string
    {
        return $this->usuario->usuario_avatar ?? 'https://ui-avatars.com/api/?name=' . $this->getNombreCortoAttribute() . '&size=64&&color=FFFFFF&background=0ea5e9&bold=true';
    }

    public function getNombreCortoAttribute(): string
    {
        $nombres = explode(' ', $this->persona_nombre);
        return $nombres[0].' '.$this->persona_apellido_paterno;
    }

    public function getNombreCompletoAttrebute(): string
    {
        return $this->persona_nombre.' '.$this->persona_apellido_paterno.' '.$this->persona_apellido_materno;
    }

    public function getNombreCompletoInversoAttribute(): string
    {
        return $this->persona_apellido_paterno.' '.$this->persona_apellido_materno.', '.$this->persona_nombre;
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('persona_nombre', 'LIKE', "%$search%")
                ->orWhere('persona_apellido_paterno', 'LIKE', "%$search%")
                ->orWhere('persona_apellido_materno', 'LIKE', "%$search%")
                ->orWhere(DB::raw("CONCAT(persona_nombre, ' ', persona_apellido_paterno, ' ', persona_apellido_materno)"), 'LIKE', "%$search%");
        }
        return $query;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($persona) {
            $persona->creado_por = auth()->id();
        });

        static::updating(function ($persona) {
            $persona->actualizado_por = auth()->id();
        });

        static::deleting(function ($persona) {
            $persona->eliminado_por = auth()->id();
        });
    }
}
