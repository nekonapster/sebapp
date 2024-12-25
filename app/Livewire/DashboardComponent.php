<?php

namespace App\Livewire;

use App\Models\Base;
use App\Models\Saldo;
use Carbon\Carbon;
use Livewire\Component;
use Carbon\CarbonImmutable; 

Carbon::setLocale('es'); 
CarbonImmutable::setLocale('es');

class DashboardComponent extends Component
{

    public $ingresosDelMes;
    public $egresosDelMes;
    public $saldosCuentas;
    public $egresos_aPagar;
    public $hoy;
    public $mesActual;
    

    public function mount(){
        $this->ingresosMes();
        $this->egresosMes();
        $this->saldosCuentas();
        $this->egresos_aPagar();
        $this->mesActual = strtoupper(Carbon::now()->translatedFormat('F'));
    }

    // ingresos del mes = sum de 4xxx que esten en pagadas (true)
    public function ingresosMes()
    {
        $this->ingresosDelMes = Base::where('cc', 'like', '4%')
            ->where('estado', true)
            ->whereDate('created_at', $this->hoy)
            ->sum('importe');
    }

    // egresos pagados del mes = sum de 5xxx que esten en pagadas (true)
    public function egresosMes()
    {
        $this->egresosDelMes = Base::where('cc', 'like', '5%')
        ->where('estado', true)
        ->whereDate('created_at', $this->hoy)
        ->sum('importe');
    }
    
    // saldos cuentas = sum de todos los saldos diarios. 
    public function saldosCuentas() {
        $this->saldosCuentas = Saldo::whereDate('created_at', $this->hoy)
        ->sum('calcularTotal');
    }

    // egresos a pagar del mes = sum de 5xxx que esten impagas (false)
    public function egresos_aPagar() {
        $this->egresos_aPagar = Base::where('cc', 'like', '5%')
        ->where('estado', false)
        ->whereDate('created_at', $this->hoy)
        ->sum('importe');
    }


    public function render()
    {
        $this->hoy = Carbon::today();

        return view('livewire.dashboard-component', [
            'ingresosDelMes' => $this->ingresosDelMes,
            'egresosDelMes' => $this->egresosDelMes,
            'saldosCuentas' => $this->saldosCuentas,
            'egresos_aPag' => $this->mesActual,
        ]);
    }
}
