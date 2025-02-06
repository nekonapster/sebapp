<?php

namespace App\Livewire;

use App\Models\Base;
use Livewire\Component;
use Illuminate\Support\Str;


class TablesComponent extends Component
{
    public $search = ""; // Campo para búsqueda
    public $facturasPendientes; // Datos filtrados

    public function mount()
    {
        // Inicializa las facturas pendientes al cargar el componente
        $this->search();
    }

    /**
     * Método de búsqueda en la colección 'base'
     */
    // public function search()
    // {
    //     $this->facturasPendientes = Base::query()
    //         ->where('estado', false) // Solo facturas pendientes
    //         ->when($this->search, function ($query) {
    //             $query->where('proveedor_name', 'like', '%' . $this->search . '%');
    //         })
    //         ->get();
    // }

    public function search()
{
    $this->facturasPendientes = Base::query()
        ->where('estado', false) // Solo facturas pendientes
        ->when($this->search, function ($query) {
            $query->where('proveedor_name', 'like', '%' . $this->search . '%');
        })
        ->get()
        ->map(function ($factura) {
            if (Str::startsWith($factura->cc, '4')) { 
                $factura->fechaVencimiento = 'No aplica'; // Si el número del CC empieza por '4', se sustituye la fecha de vencimiento por la leyenda  'no aplica' 
            }
            return $factura;
        });
}


    /**
     * Escucha automáticamente cuando cambia 'search'
     */
    public function updatedSearch()
    {
        $this->search();
    }

    public function elegirFactura($data)
    {
        session()->flash('facturaSeleccionada', $data);
        return $this->redirect('/general', navigate: true);
    }

    public function render()
    {
        return view('livewire.tables-component', [
            'facturasPendientes' => $this->facturasPendientes,
        ]);
    }
}
