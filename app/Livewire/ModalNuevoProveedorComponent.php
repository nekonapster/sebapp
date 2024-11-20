<?php

namespace App\Livewire;

use App\Models\CuentaContable;
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
    // este cc es el que lo envia a la bd cuenta_contables
    public $cc;
    //01. listeners es una variable especial que admite un array asoc, el primer parametro es el parametro del dispatch en el componente y el segundo parametro es el metodo que disparara en el componente del listeners
    protected $listeners = [
        'ccSelectRefresh' => 'cargarCuentas',
        'editarProveedorId' => 'loadUser'
    ];
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

        $this->validate([
            'proveedor_name' => 'required|string|max:255',
            'tel' => 'required|max:24',
            'email' => 'required|email',
            'contacto' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'rubro' => 'required|string|max:255',
            'cc' => 'required|string|max:255',
        ]);

        Proveedor::create([
            'id_proveedor' => $this->id_proveedor,
            'proveedor_name' => strtolower($this->proveedor_name),
            'tel' => $this->tel,
            'email' => strtolower($this->email),
            'contacto' => strtolower($this->contacto),
            'descripcion' => strtolower($this->descripcion),
            'rubro' => strtolower($this->rubro),
            'numeroCC' => $this->cc,
        ]);

        $this->dispatch('recargarTablaNuevoProveedor');
        $this->reset(['id_proveedor', 'proveedor_name', 'tel', 'email', 'contacto', 'descripcion', 'rubro', 'cc']);
    }

    public function loadUser($id)
    {
        $proveedor = Proveedor::find($id);

        $this->fill([
            'id_proveedor' => $proveedor->id,
            'proveedor_name' => $proveedor->proveedor_name,
            'tel' => $proveedor->tel,
            'email' => $proveedor->email,
            'contacto' => $proveedor->contacto,
            'descripcion' => $proveedor->descripcion,
            'rubro' => $proveedor->rubro,
            'cc' => $proveedor->numeroCC,
        ]);
    }

    public function editarProveedor()
    {
        $proveedor = Proveedor::find($this->id_proveedor);

        if ($proveedor) {
            $proveedor->update([
                'id_proveedor' => $this->id_proveedor,
                'proveedor_name' => $this->proveedor_name,
                'tel' => $this->tel,
                'email' => $this->email,
                'contacto' => $this->contacto,
                'descripcion' => $this->descripcion,
                'rubro' => $this->rubro,
                'numeroCC' => $this->cc,
            ]);

            $this->reset([
                'id_proveedor',
                'proveedor_name',
                'tel',
                'email',
                'contacto',
                'descripcion',
                'rubro',
                'cc',
            ]);

            $this->dispatch('recargarTablaNuevoProveedor');
        }
    }



    public function render()
    {
        return view('livewire.modal-nuevo-proveedor-component');
    }
}
