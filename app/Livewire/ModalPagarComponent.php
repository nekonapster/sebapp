<?php

namespace App\Livewire;

use App\Models\Banco;
use App\Models\Base;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ModalPagarComponent extends Component
{

    #[Validate('required', message: 'Obligatorio')]
    public $bancos;
    #[Validate('required', message: 'Obligatorio')]
    public $idPagar;
    #[Validate('required', message: 'Obligatorio')]
    public $tipoPago;
    #[Validate('required', message: 'Obligatorio')]
    public $fechaPago;
    #[Validate('required', message: 'Obligatorio')]
    public $banco;
    #[Validate('required', message: 'Obligatorio')]
    public $cuentaBanco;
    #[Validate('required', message: 'Obligatorio')]
    public $nCheque;
    #[Validate('required', message: 'Obligatorio')]
    public $ordenPago;

    public $retenciones = false;
    
    
    public function mount()
    {
        $this->bancos = Banco::select('nombre_banco', 'cuentaAsociada')->get();
    }
    
    #[On('idFrom_TablaBaseGeneralComponent')]
    public function loadPagar($id)
    {
        $this->idPagar = ($id);
    }
    
    public function pagar()
    {

        $this->validate();
        
        $datosPagar = Base::find($this->idPagar);
        
        $datosPagar->update([
            'tipoPago' => $this->tipoPago,
            'fechaPago' => $this->fechaPago,
            'banco' => $this->banco,
            'cuentaBanco' => $this->cuentaBanco,
            'nCheque' => $this->nCheque,
            'ordenPago' => $this->ordenPago,
            'estado' => true,
            'retenciones' => $this->retenciones ? 'si' : 'no' ,
        ]);

        return $this->redirect('/general', navigate:true);
    }   


    public function render()
    {
        return view('livewire.modal-pagar-component', [
            'bancos' => $this->bancos,
        ]);
    }
}
