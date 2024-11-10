<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseGeneral extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_name',
        'fechaFactura',
        'fechaVencimiento',
        'auxiliar',
        'ptoVenta',
        'nFactura',
        'importe',
        'gastos',
        'proyecto',
        'activacion',
        'notas',
        'cc',
    ];

}
