<?php

namespace App\Livewire;

use App\Models\Proveedor;
use Livewire\Component;
use Illuminate\Support\Str;

class TablaNuevoProveedoresComponent extends Component
{
    public $listeners = ['recargarTablaNuevoProveedor'];



    public function borrarProveedor($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        $this->listeners = ['recargarTablaNuevoProveedor'];

        // Emitir el evento con el nuevo nombre del proveedor
        $this->dispatch('recargaSelectNombreProveedor');
    }


    public function editarProveedor($id)
    {
        $this->dispatch('editarProveedorId', $id);
        // dd($id);

    }

    public function render()
    {
        $proveedores = Proveedor::all()->map(function ($proveedor) {
            $proveedor->id_corto = Str::substr($proveedor->_id, -5); // Agrega un campo para los últimos 5 números
            return $proveedor;
        });

        return view('livewire.tabla-nuevo-proveedores-component', [
            'proveedores' => $proveedores,
        ]);
    }
}
