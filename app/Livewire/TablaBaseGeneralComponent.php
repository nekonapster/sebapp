<?php

namespace App\Livewire;

use App\Models\Base;
use Livewire\Component;
use Livewire\Attributes\On;


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

    public function mount()
    {
        if (session()->has('facturaSeleccionada')) {
            $this->actualizarBusqueda(session('facturaSeleccionada'));
        }
    }

    public function actualizarBusqueda($data)
    {
        $this->search = $data;
    }

    #[On('idPagar')]
    public function idPagar($id)
    {
        $this->idPagar = $id;
        $this->dispatch('idFrom_TablaBaseGeneralComponent', id: $this->idPagar);
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
        if ($this->search == "") {
            // Si el campo de búsqueda está vacío, trae todos los registros
            $this->listarTablas = Base::orderByDesc('fechaVencimiento')->get() ?? collect([]);
        } else {
            // Consulta con filtro y ordenamiento
            $this->listarTablas = Base::where('proveedor_name', 'like', '%' . $this->search . '%')
                ->orWhere('nFactura', 'like', '%' . $this->search . '%')
                ->orderByDesc('fechaVencimiento')
                ->get() ?? collect([]);
            // dd('test pass');
        }
    }


    public function borrarDatoBaseGeneral($id)
    {
        $borrarDato = Base::find($id);
        $borrarDato->delete();
    }


    public function resetTabla()
    {
        return $this->redirect('/general', navigate: true);
    }


    public function render()
    {
        $this->listarTabla();
        return view('livewire.tabla-base-general-component');
    }
}
