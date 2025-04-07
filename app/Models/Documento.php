<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'tipo', 'usuario_id', 'oficina_id', 'carpeta_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function oficina()
    {
        return $this->belongsTo(Oficina::class);
    }

    public function carpeta()
    {
        return $this->belongsTo(Carpeta::class);
    }
}
