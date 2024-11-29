<?php

namespace App\Livewire;

use App\Models\Proveedor;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class TablaNuevoProveedoresComponent extends Component
{
    public $search = '';
    public $proveedores;
    public $listeners = ['recargarTablaNuevoProveedor'];

    public function mount()
    {
        $this->search();
    }
    
    
    #[On('recargarTablafrom_ModalNuevoProveedorComponent')]
    public function actualizaTabla(){
        $this->proveedores = Proveedor::all();
    }
    
    
    public function updatedSearch()
    {
        $this->search();
    }
    
    public function search()
    {
        $query = Proveedor::query();
        
        if ($this->search) {
            $query->where('proveedor_name', 'like', '%' . $this->search . '%');
        }
        
        $this->proveedores = $query->get()->map(function ($proveedor) {
            $proveedor->id_corto = Str::substr($proveedor->_id, -5); // Add short ID
            return $proveedor;
        });
      
        // llamo a la funcion para actualizar la tabla del modal
        $this->actualizaTabla();
    }

    public function editarProveedor($id)
    {
        $this->dispatch('editarProveedorIdFrom_tablaNuevoProveedoresComponent', $id);
        $this->listeners = ['recargarTablaNuevoProveedor'];
    }
 
    public function borrarProveedor($id)
    {
        $this->dispatch('borrarProveedorFrom_tablaNuevoProveedorComponent', $id);
        $this->listeners = ['recargarTablaNuevoProveedor'];
    }


    public function render()
    {
        return view('livewire.tabla-nuevo-proveedores-component', [
            'proveedores' => $this->proveedores,
        ]);
    }
}