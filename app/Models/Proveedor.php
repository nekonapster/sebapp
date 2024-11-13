<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

protected $collection = 'proveedores';
    
protected $fillable = [
        'id_proveedor',
        'proveedor_name',
        // 'tel',
        // 'email',
        // 'contacto',
        // 'descripcion',
        // 'rubro',
        // 'cc',
    ];
}
