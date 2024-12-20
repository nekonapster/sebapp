<?php

namespace App\Livewire;

use App\Models\Base;
use Livewire\Component;

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
    public function search()
    {
        $this->facturasPendientes = Base::query()
            ->where('estado', false) // Solo facturas pendientes
            ->when($this->search, function ($query) {
                $query->where('proveedor_name', 'like', '%' . $this->search . '%');
            })
            ->get();
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
