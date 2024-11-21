<?php

namespace App\Livewire;

use App\Models\Base;
use App\Models\Proveedor;
use Livewire\Attributes\On;
use Livewire\Component;

class FormularioGeneralComponent extends Component
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
    public $proveedorName;
    protected $listeners = [
        'recargaSelectNombreProveedor' => 'actualizarProveedores',
    ];

    public $tipoPago;
    public $fechaPago;
    public $banco;
    public $cuentaBanco;
    public $nCheque;
    public $ordenPago;    

    public function mount()
    {
        $this->actualizarProveedores();
    }

    // carga los datos en el formulario segun el id que nos llega
    #[On('cargarEnFormulario')]
    public function cargarEnFormulario($id)
    {
        $loadUserToForm = Base::find($id);
        $this->baseGeneral_id = $id;
        $this->proveedor_name = $loadUserToForm->proveedor_name;
        $this->fechaFactura = $loadUserToForm->fechaFactura;
        $this->fechaVencimiento = $loadUserToForm->fechaVencimiento;
        $this->auxiliar = $loadUserToForm->auxiliar;
        $this->activacion = $loadUserToForm->activacion;
        $this->ptoVenta = $loadUserToForm->ptoVenta;
        $this->nFactura = $loadUserToForm->nFactura;
        $this->importe = $loadUserToForm->importe;
        $this->gastos = $loadUserToForm->gastos;
        $this->proyecto = $loadUserToForm->proyecto;
        $this->notas = $loadUserToForm->notas;
    }

    public function actualizarDatosFormulario()
    {
        $loadUserToForm = Base::find($this->baseGeneral_id);

        if ($loadUserToForm) {
            $loadUserToForm->update([
                '_id' => $this->baseGeneral_id,
                'proveedor_name' => $this->proveedor_name,
                'fechaFactura' => $this->fechaFactura,
                'fechaVencimiento' => $this->fechaVencimiento,
                'auxiliar' => $this->auxiliar,
                'activacion' => $this->activacion,
                'ptoVenta' => $this->ptoVenta,
                'nFactura' => $this->nFactura,
                'importe' => $this->importe,
                'gastos' => $this->gastos,
                'proyecto' => $this->proyecto,
                'notas' => $this->notas,
            ]);
            return redirect(request()->header('Referer'));
        }
    }

    public function actualizarProveedores()
    {
        $this->proveedorName = Proveedor::pluck('proveedor_name');
    }

    public function nuevoDatoBaseGeneral()
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
            'tipoPago' => $this->tipoPago ?? '-',
            'fechaPago' => $this->fechaPago ?? '-',
            'banco' => $this->banco ?? '-',
            'cuentaBanco' => $this->cuentaBanco ?? '-',
            'nCheque' => $this->nCheque ?? '-',
            'ordenPago' => $this->ordenPago ?? '-',
        ]);

        // refresco la pagina
        return redirect('/general');
    }

    public function render()
    {
        return view('livewire.formulario-general-component', [
            'nombres' => $this->proveedorName,
        ]);
    }
}
