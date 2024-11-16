<?php

namespace App\Livewire;

use App\Models\Proveedor;
use Livewire\Component;

class TablaNuevoProveedoresComponent extends Component
{
    public $listeners = ['recargarTablaNuevoProveedor'];
    
    
    
    public function borrarProveedor($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        $this->listeners = ['recargarTablaNuevoProveedor'];
    }




    public function render()
    {
        $proveedores = Proveedor::all() ?? collect([]);
        return view('livewire.tabla-nuevo-proveedores-component', [
            'proveedores' => $proveedores,
        ]);
    }
}
