<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;


class CuentaContable extends Model
{
    use HasFactory;

    protected $fillable = [
        'numeroCC',
        'rubro',
        'descripcion',
        'tipo',
    ];


        // Setter para convertir a número antes de guardar
        public function setImporteAttribute($value)
        {
            // Convierte a float o guarda null si no es válido
            $this->attributes['numeroCC'] = is_numeric($value) ? (int) $value : null; 
        }
}
