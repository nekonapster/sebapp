<?php

namespace App\Livewire;

use App\Models\Proveedor;
use Livewire\Component;

class ModalNuevoProveedorComponent extends Component
{

public $id_proveedor;
public $proveedor_name;
public $tel;
public $email;
public $contacto;
public $descripcion;
public $rubro;
public $cc;

public function crearProveedor(){

    Proveedor::create([
        'id_proveedor' => $this->id_proveedor,
        'proveedor_name' => strtolower($this->proveedor_name),
        'tel' => $this->tel,
        'email' => strtolower($this->email),
        'contacto' => strtolower($this->contacto),
        'descripcion' => strtolower($this->descripcion),
        'rubro' => strtolower($this->rubro),
        'cc' => $this->cc,
    ]);
}

    public function render()
    {
        return view('livewire.modal-nuevo-proveedor-component');
    }
}
