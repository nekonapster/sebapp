<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ModalCargaMasivaComponent extends Component
{
    use WithFileUploads;

    public $file; // Para almacenar temporalmente el archivo

    public function cargarMasivaProveedores()
    {
        // Validar el archivo antes de procesarlo
        $this->validate([
            'file' => 'mimes:xlsx,xls|max:2048', // Máximo 2MB
        ]);
        return $this->redirect('/general', navigate:true);
    }

    public function render()
    {
        return view('livewire.modal-carga-masiva-component');
    }
}
