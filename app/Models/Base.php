<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        // 'fechaCreacion'
    ];


    protected $casts = [
        'importe' => 'double',
    ];

    // Setter para convertir a número antes de guardar
    public function setImporteAttribute($value)
    {
        $this->attributes['importe'] = is_numeric($value) ? (float) $value : null; // Convierte a float o guarda null si no es válido
    }
}
