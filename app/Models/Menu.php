<?php

namespace App\Models;  // Corregido el error de "nnamespace"

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'descripcion'];

    // Relación con las oficinas
    public function oficinas()
    {
        return $this->belongsToMany(Oficina::class); // Un menú puede tener muchas oficinas
    }
}
