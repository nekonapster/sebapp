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

    // casting to float or null
    protected $casts = [
        'importe' => 'float' ?? null,
    ];

    // Setter para convertir a número antes de guardar
    public function setImporteAttribute($value)
    {
        // Convierte a float o guarda null si no es válido
        $this->attributes['importe'] = is_numeric($value) ? (float) $value : null; 
    }
}
