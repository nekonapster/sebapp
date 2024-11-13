<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Base extends Model
{
    use HasFactory;



    protected $fillable = [
        'baseGeneral_id',
        'proveedor_name',
        'fechaFactura',
        'fechaVencimiento',
        'auxiliar',
        'activacion',
        'ptoVenta',
        'nFactura',
        'importe',
        'gastos',
        'proyecto',
        'notas',
    ];
}
