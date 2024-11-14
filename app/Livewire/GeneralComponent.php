<?php

namespace App\Livewire;

use App\Models\Base;
use Livewire\Component;

class GeneralComponent extends Component
{
    public $baseGeneral_id;
    public $proveedor_name;
    public $fechaFactura;
    public $fechaVencimiento;
    public $auxiliar;
    public $activacion;
    public $ptoVenta;
    public $nFactura;
    public $importe;
    public $gastos;
    public $proyecto;
    public $notas;



    public function datosBaseGeneral()
    {
        Base::create([
            'baseGeneral_id' => $this->baseGeneral_id ?? '',
            'proveedor_name' => $this->proveedor_name,
            'fechaFactura' => $this->fechaFactura,
            'fechaVencimiento' => $this->fechaVencimiento,
            'auxiliar' => strtolower($this->auxiliar),
            'activacion' => $this->activacion,
            'ptoVenta' => strtolower($this->ptoVenta),
            'nFactura' => strtolower($this->nFactura),
            'importe' => $this->importe,
            'gastos' => $this->gastos,
            'proyecto' => $this->proyecto,
            'notas' => strtolower($this->notas),
        ]);

        // refresco la pagina
        return redirect('/general');
    }

    public function render()
    {
        return view('livewire.general-component');
    }
}
