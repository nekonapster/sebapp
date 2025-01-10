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
        'santander',
        'santanderP',
        'ciudad',
        'fci',
        'digital',
        'efectivo',
        'calcularTotal',
        'fechaSaldos'
    ];

    // protected $casts = [
    //     'bancoProvincia' => 'integer',
    //     'santander' => 'array',
    //     'santanderP' => 'array',
    //     'fci' => 'array',
    //     'digital' => 'array',
    //     'efectivo' => 'array',
    //     'calcularTotal' => 'integer',
    //     'fechaSaldos' => 'datetime',
    // ];

       // Setter para convertir a número antes de guardar
       public function setCalcularTotalAttribute($value)
       {
           $this->attributes['calcularTotal'] = is_numeric($value) ? (float) $value : null; // Convierte a float o guarda null si no es válido
       }
}

