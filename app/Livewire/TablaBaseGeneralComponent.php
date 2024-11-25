<?php

namespace App\Livewire;

use App\Models\Base;
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
    public $search = "";
    public $listarTablas;

    #[On('idPagar')]
    public function idPagar($id)
    {
        $this->idPagar = $id;
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

    public function baseToExcel()
    {
        return redirect()->route('export-base-excel');
    }
    public function baseToPdf()
    {
        return redirect()->route('export-base-pdf');
    }

    public function listarTabla()
    {
        // Consulta con filtro y ordenamiento
        $listaOrdenada = Base::where('proveedor_name', 'like', '%' . $this->search . '%');

        // Aplica ordenamiento descendente en el campo deseado
        $this->listarTablas = $listaOrdenada->orderByDesc('fechaVencimiento')->get() ?? collect([]); // Obtiene los resultados o devuelve una colección vacía
    }

    public function render()
    {
        $this->listarTabla();
        return view('livewire.tabla-base-general-component');
    }
}
