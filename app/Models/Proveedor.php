<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'my_custom_collection';

    protected $fillable = [
        'id_proveedor',
        'proveedor_name',
        'tel',
        'email',
        'contacto',
        'descripcion',
        'rubro',
        'cc',
    ];
}
