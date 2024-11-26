<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Metrica extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyectarFechas',
        'mesActual',
    ];
}
