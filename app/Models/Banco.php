<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'nombre_banco',
        'cuentaAsociada',
    ];
}
