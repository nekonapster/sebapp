<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_name',
        'tel',
        'email',
        'contacto',
        'descripcion',
        'rubro',
        'numeroCC',
        'tipo',
    ];
}
