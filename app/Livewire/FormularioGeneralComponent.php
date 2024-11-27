<?php

namespace App\Livewire;

use App\Models\Base;
use App\Models\Metrica;
use App\Models\Proveedor;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class FormularioGeneralComponent extends Component
{

    public $baseGeneral_id;
    #[Validate('required|min:5', message: 'Obligatorio')]
    public $proveedor_name;
    #[Validate('required', message: 'Obligatorio')]
    public $fechaFactura;
    #[Validate('required', message: 'Obligatorio')]
    public $fechaVencimiento;
    #[Validate('required', message: 'Obligatorio')]
    public $auxiliar;
    #[Validate('required', message: 'Obligatorio')]
    public $activacion;
    #[Validate('required', message: 'Obligatorio')]
    public $ptoVenta;
    #[Validate('required', message: 'Obligatorio')]
    public $nFactura;
    #[Validate('required', message: 'Obligatorio')]
    public $importe;
    #[Validate('required', message: 'Obligatorio')]
    public $gastos;
    #[Validate('required', message: 'Obligatorio')]
    public $proyecto;
    #[Validate('required', message: 'Obligatorio')]
    public $notas;
    #[Validate('required', message: 'Obligatorio')]
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
    public $proyectarGastos;
    public $activarProyectarGastos = false;
    public $metrica_id;

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
        // Encontrar el registro en la colección Base
        $loadUserToForm = Base::find($this->baseGeneral_id);

        if ($loadUserToForm) {
            // Actualizar los datos de la base
            $loadUserToForm->update([
                '_id' => $this->baseGeneral_id, // Este campo no es necesario, ya que _id no cambia
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

            // Buscar el registro relacionado en la colección Metrica
            $loadMetricaById = Metrica::where('base_id', $this->baseGeneral_id)->first();

            if ($loadMetricaById) {
                // Calcular el valor de proyectarGastos
                $mesCarbon = Carbon::parse($this->fechaFactura)->month;
                $mesesProyectados = 12 - $mesCarbon;
                $this->proyectarGastos = $this->importe * $mesesProyectados;

                // Actualizar la métrica relacionada
                $loadMetricaById->update([
                    'proyectarGastos' => $this->proyectarGastos,
                    'mesActual' => $mesCarbon, // Opcional, si necesitas almacenar el mes
                ]);
            }
            // Redirigir al usuario a la página anterior
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


        $base = Base::create([
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

        $base_id  = $base->_id;

        if ($this->activarProyectarGastos == true) {
            $this->proyectarGastos($base_id);
        }

        // refresco la pagina
        return redirect('/general');
    }


    public function proyectarGastos($base_id)
    {
        $base_id = $base_id;
        $mesCarbon = Carbon::parse($this->fechaFactura)->month;

        $mesesProyectados = 12 - $mesCarbon;
        $this->proyectarGastos = $this->importe * $mesesProyectados;

        Metrica::create([
            'proyectarGastos' => $this->proyectarGastos,
            'mesActual' => $mesCarbon,
            'base_id' => $base_id,
        ]);

        return redirect('/general');
    }





    public function render()
    {

        return view('livewire.formulario-general-component', [
            'nombres' => $this->proveedorName,
        ]);
    }
}
