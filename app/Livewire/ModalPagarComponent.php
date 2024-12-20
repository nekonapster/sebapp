<?php

namespace App\Livewire;

use App\Models\Banco;
use App\Models\Base;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalPagarComponent extends Component
{

    public $bancos;

    public $idPagar;
    public $tipoPago;
    public $fechaPago;
    public $banco;
    public $cuentaBanco;
    public $nCheque;
    public $ordenPago;
    
    
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
        $datosPagar = Base::find($this->idPagar);
        
        $datosPagar->update([
            'tipoPago' => $this->tipoPago,
            'fechaPago' => $this->fechaPago,
            'banco' => $this->banco,
            'cuentaBanco' => $this->cuentaBanco,
            'nCheque' => $this->nCheque,
            'ordenPago' => $this->ordenPago,
            'estado' => true
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
