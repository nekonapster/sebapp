<?php

namespace App\Livewire;

use App\Models\CuentaContable;
use App\Models\Proveedor;
use Livewire\Attributes\On;
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
    // este cc es el que lo envia a la bd cuenta_contables
    public $cc;
    //01. listeners es una variable especial que admite un array asoc, el primer parametro es el parametro del dispatch en el componente y el segundo parametro es el metodo que disparara en el componente del listeners
    protected $listeners = ['ccSelectRefresh' => 'cargarCuentas'];
    // este numeroCC el que lo recupera de la bd cuenta_contables
    public $numerosCC;

    //02. Lo primero que se carga cuando se renderiza un componente es el metodo mount, este a su vez llama a cargarCuentas que hace una peticion de las cuentas a la BD 
    //04. Luego de ejecutar el metodo interior se envia al view.
    public function mount()
    {
        $this->cargarCuentas();
    }

    // 03. el siguiente metodo extrae un solo documento de la bd que es el que se le pasa por parametro ('numeroCC'), en la bd tenemos: numeroCC, rubro, descripcion y tipo. 
    public function cargarCuentas()
    {
        $this->numerosCC = CuentaContable::pluck('numeroCC');
    }

    public function crearProveedor()
    {
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

        return redirect('/general');
    }

    public function render()
    {
        return view('livewire.modal-nuevo-proveedor-component');
    }
}
