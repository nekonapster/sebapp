<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;


class CuentaContable extends Model
{
    use HasFactory;

    protected $fillable = [
        'rubro',
        'descripcion',
        'tipo',
    ];
}
