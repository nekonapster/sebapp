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
    public $inicioMes;
    public $finMes;


    public function mount()
    {
        $this->mesActual = strtoupper(Carbon::now()->translatedFormat('F'));
        $this->inicioMes = Carbon::now()->startOfMonth();
        $this->finMes  = Carbon::now()->endOfMonth();
        
        
        $this->ingresosMes();
        $this->egresosMes();
        $this->saldosCuentas();
        $this->egresos_aPagar();
        
    }


    // ingresos del mes = sum de 4xxx que esten en pagadas (false)
    public function ingresosMes()
    {
        $this->ingresosDelMes = Base::where('cc', 'like', '4%')
             //Borro la condicion de estado a false. 
            // ->where('estado', false)
            ->whereBetween(
                'created_at',
                [
                    $this->inicioMes,
                    $this->finMes
                ]
            )
            ->sum('importe');
    }


    // egresos pagados del mes = sum de 5xxx que esten en pagadas (true)
    public function egresosMes()
    {
        $this->egresosDelMes = Base::where('cc', 'like', '5%')
            ->where('estado', true)
            ->whereBetween(
                'created_at',
                [
                    $this->inicioMes,
                    $this->finMes,
                ]
            )
            ->sum('importe');
    }

    // saldos cuentas = el valor diario de 'calcularTotal' en 'saldos'. 
    public function saldosCuentas()
    {
        $this->saldosCuentas = Saldo::whereDate('created_at', Carbon::today())
            ->sum('calcularTotal');
    }   

    // Facturas pendientes de pago = sum de 5xxx que esten impagas (false) y con fecha de vencimiento menor o igual al último día del mes
    public function egresos_aPagar()
    {
        $fechaLimite = now()->endOfMonth()->toDateString(); // Último día del mes actual en formato YYYY-MM-DD
    
        $this->egresos_aPagar = Base::where('cc', 'like', '5%') // Filtra por código que comienza con "5"
            ->where('estado', false) // Filtra facturas con estado false
            ->where('fechaVencimiento', '<=', $fechaLimite) // Filtra facturas hasta el último día del mes
            ->sum('importe'); // Suma los importes de las facturas filtradas
    }

    public function render()
    {
        // formateo la fecha en mayusculas, español y formato
        $this->hoy = strtoupper(Carbon::now()->translatedFormat('d F'));

        // dd($this->saldosCuentas);

        return view('livewire.dashboard-component', [
            'ingresosDelMes' => $this->ingresosDelMes,
            'egresosDelMes' => $this->egresosDelMes,
            'saldosCuentas' => $this->saldosCuentas,
            'egresos_aPag' => $this->egresos_aPagar,
            'hoy' => $this->hoy,
        ]);
    }
}
