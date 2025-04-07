<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    use HasFactory;

    // Agrega 'nombre' a la propiedad fillable
    protected $fillable = ['nombre'];

    // Relación con los usuarios en la oficina
    public function usuarios()
    {
        return $this->hasMany(Usuario::class); // Una oficina tiene muchos usuarios
    }

    // Relación con los menús de la oficina
    public function menus()
    {
        return $this->hasMany(Menu::class); // Una oficina tiene muchos menús
    }

    // Relación con los documentos de la oficina
    public function documentos()
    {
        return $this->hasMany(Documento::class); // Una oficina tiene muchos documentos
    }
}
