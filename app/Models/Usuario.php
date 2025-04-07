<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'email', 'password', 'oficina_id', 'role_id']; 

    // Relación con la oficina
    public function oficina()
    {
        return $this->belongsTo(Oficina::class); // Un usuario pertenece a una oficina
    }

    // Relación con el rol
    public function rol()
    {
        return $this->belongsTo(Role::class); // Un usuario tiene un rol
    }

    // Relación con los documentos creados por el usuario
    public function documentos()
    {
        return $this->hasMany(Documento::class); // Un usuario puede tener muchos documentos
    }

    // Relación con las carpetas creadas por el usuario
    public function carpetas()
    {
        return $this->hasMany(Carpeta::class); // Un usuario puede tener muchas carpetas
    }
}
