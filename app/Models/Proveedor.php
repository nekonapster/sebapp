<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'proveedor_name',
        'descripcion',
        'rubro',
        'telefono',
        'contacto',
        'email',
        'cc',
    ];
}
