<?php

namespace App\Livewire;

use App\Models\Banco;
use Livewire\Component;

class ModalPagarComponent extends Component
{

        public $bancos;

        
    public function mount(){
        $this->bancos = Banco::select('nombre_banco', 'cuentaAsociada')->get();
    }

        public function render()
    {
        return view('livewire.modal-pagar-component',[
            'bancos' => $this->bancos,
        ]);
    }
}
