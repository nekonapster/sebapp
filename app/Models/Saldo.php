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
}

