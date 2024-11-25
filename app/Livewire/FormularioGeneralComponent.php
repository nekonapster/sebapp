<?php

namespace App\Livewire;

use App\Models\Base;
use App\Models\Proveedor;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormularioGeneralComponent extends Component
{

    public $baseGeneral_id;
    #[Validate('required|min:5')]
    public $proveedor_name;
    #[Validate('required')]
    public $fechaFactura;
    #[Validate('required')]
    public $fechaVencimiento;
    #[Validate('required')]
    public $auxiliar;
    #[Validate('required')]
    public $activacion;
    #[Validate('required')]
    public $ptoVenta;
    #[Validate('required')]
    public $nFactura;
    #[Validate('required')]
    public $importe;
    #[Validate('required')]
    public $gastos;
    #[Validate('required')]
    public $proyecto;
    #[Validate('required')]
    public $notas;
    #[Validate('required')]
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
        $this->validate();
        
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
