<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

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
        'tipoPago',
        'fechaPago',
        'banco',
        'cuentaBanco',
        'nCheque',
        'ordenPago',
        'proyectarFechas',
        'estado',
        'proveedor_id',
        'cc'
    ];


     protected $casts = [
        'importe' => 'double',
    ];
}
