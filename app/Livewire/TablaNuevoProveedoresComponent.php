<?php

namespace App\Livewire;

use App\Models\Proveedor;
use Livewire\Component;
use Livewire\Attributes\On;

class TablaNuevoProveedoresComponent extends Component
{
    public $search = '';
    public $proveedores;
    public $listeners = ['recargarTablaNuevoProveedor'];

    public function mount()
    {
        $this->search(); // Carga la tabla inicial filtrada
    }
    
    #[On('recargarTablafrom_ModalNuevoProveedorComponent')]
    public function actualizaTabla()
    {
        $this->search(); // Recarga la tabla con búsqueda actual
    }
    
    public function updatedSearch()
    {
        $this->search();
    }
    
    public function search()
    {
        $query = Proveedor::query();

        if ($this->search) {
            // Busca por nombre de proveedor
            $query->where('proveedor_name', 'like', '%' . $this->search . '%');
        }

        $this->proveedores = $query->get();
    }

    public function editarProveedor($id)
    {
        $this->dispatch('editarProveedorIdFrom_tablaNuevoProveedoresComponent', $id);
    }

    public function borrarProveedor($id)
    {
        $this->dispatch('borrarProveedorFrom_tablaNuevoProveedorComponent', $id);
    }

    public function render()
    {
        return view('livewire.tabla-nuevo-proveedores-component', [
            'proveedores' => $this->proveedores,
        ]);
    }
}
