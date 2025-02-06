<?php

namespace App\Livewire;

use App\Models\Banco;
use App\Models\Base;
use Carbon\Carbon;
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

        $fechaPagoFormateada = Carbon::parse($this->fechaPago)->format('d-m-Y');


        $datosPagar = Base::find($this->idPagar);
        
        $datosPagar->update([
            'tipoPago' => strtolower($this->tipoPago),
            'fechaPago' => $fechaPagoFormateada,
            'banco' => strtolower($this->banco),
            'cuentaBanco' => strtolower($this->cuentaBanco),
            'nCheque' => strtolower($this->nCheque),
            'ordenPago' => strtolower($this->ordenPago),
            'estado' => true,
            'retenciones' => strtolower($this->retenciones ? 'si' : 'no') ,
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
