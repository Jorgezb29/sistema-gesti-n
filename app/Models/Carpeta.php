<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carpeta extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'descripcion', 'usuario_id', 'oficina_id'];

    // Relación con el usuario propietario de la carpeta
    public function usuario()
    {
        return $this->belongsTo(Usuario::class); // Una carpeta pertenece a un usuario
    }

    // Relación con la oficina de la carpeta
    public function oficina()
    {
        return $this->belongsTo(Oficina::class); // Una carpeta pertenece a una oficina
    }

    // Relación con los documentos dentro de la carpeta
    public function documentos()
    {
        return $this->hasMany(Documento::class); // Una carpeta puede contener muchos documentos
    }
}
