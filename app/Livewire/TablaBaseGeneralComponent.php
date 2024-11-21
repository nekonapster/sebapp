<?php

namespace App\Livewire;

use App\Models\Base;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Str;

class TablaBaseGeneralComponent extends Component
{

    public $idPagar;
    public $tipoPago;
    public $fechaPago;
    public $banco;
    public $cuentaBanco;
    public $nCheque;
    public $ordenPago;


    #[On('idPagar')]
    public function idPagar($id)
    {
        $this->idPagar = $id;

        $this->dispatch('test' , $id);
    }


    public function cargarEnFormulario($id)
    {
        $loadUserToForm = Base::find($id);
        dd($loadUserToForm);
    }

    public function borrarDatoBaseGeneral($id)
    {
        $borrarDato = Base::find($id);
        $borrarDato->delete();
    }

    public function render()
    {
        $tablas = Base::all() ?? collect([]);
        return view('livewire.tabla-base-general-component', [
            'tablas' => $tablas,
        ]);
    }
}
