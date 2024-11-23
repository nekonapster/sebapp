<?php

namespace App\Livewire;

use App\Models\Base;
use App\Models\CuentaContable;
use Livewire\Attributes\On;
use Livewire\Component;

class TablaBaseGeneralComponent extends Component
{

    public $idPagar;
    public $tipoPago;
    public $fechaPago;
    public $banco;
    public $cuentaBanco;
    public $nCheque;
    public $ordenPago;
    public $search = '';

    #[On('idPagar')]
    public function idPagar($id)
    {
        $this->idPagar = $id;

        $this->dispatch('test', $id);
    }


    public function cargarEnFormulario($id)
    {
        $loadUserToForm = Base::find($id);
        // dd($loadUserToForm);
    }

    public function borrarDatoBaseGeneral($id)
    {
        $borrarDato = Base::find($id);
        $borrarDato->delete();
    }

    public function vaciarTabla()
    {
        Base::truncate();
    }


    public function baseToExcel(){
        return redirect()->route('export-base-excel');
    }
    public function baseToPdf(){
        return redirect()->route('export-base-pdf');
    }

    public function render()
    {
        $tablas = Base::where('proveedor_name', 'like', '%' . $this->search . '%')->first();
    
        if ($tablas) {
            $tablas = $tablas->get();
        } else {
            $tablas = collect([]);
        }
    
        return view('livewire.tabla-base-general-component', [
            'tablas' => $tablas,
        ]);
    }
}
