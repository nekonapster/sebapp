<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;

    protected $fillable = [
        'userName',
        'bancoProvincia',
        'santanderP',
        'santanderA',
        'ciudad',
        'fci',
        'digital',
        'efectivo',
        'calcularTotal',
        'fechaSaldos'
    ];

    protected $casts = [
        'calcularTotal' => 'float' ?? null,
    ];

    
       // Setter para convertir a número antes de guardar
       public function setCalcularTotalAttribute($value)
       {
           // Convierte a float o guarda null si no es válido
           $this->attributes['calcularTotal'] = is_numeric($value) ? (float) $value : null;
       }
}

