<?php

namespace App\Livewire;

use Livewire\Component;
use App\Imports\ProveedorImport;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ModalCargaMasivaComponent extends Component
{
    use WithFileUploads;

    public $file; // Para almacenar temporalmente el archivo

    public function cargarMasivaProveedores()
    {
        // Validar el archivo antes de procesarlo
        $this->validate([
            'file' => 'mimes:xlsx,xls,jpg|max:2048', // Máximo 2MB
        ]);

        dd($this->file);
        // Procesar el archivo usando Maatwebsite/Excel
        // Excel::import(new ProveedorImport, $this->archivo->getRealPath());

        // Procesar el archivo con Maatwebsite Excel
        // $path = $this->file->store('temp'); // Guardar temporalmente el archivo
        // Excel::import(new ProveedorImport, $path);



        // Limpiar el archivo después de la carga
        // $this->reset('file');

        // Mensaje de éxito
        // session()->flash('success', 'Proveedores importados correctamente.');


        return redirect('/general');
    }

    public function render()
    {
        return view('livewire.modal-carga-masiva-component');
    }
}
