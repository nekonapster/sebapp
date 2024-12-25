<?php

namespace App\Livewire;

use App\Models\Saldo;
use Carbon\Carbon;
use Livewire\Component;

class ChartComponent extends Component
{
    public $saldosPorMes = [];
    public $fechaActual;

    public function mount()
    {
        $this->ingresosPorMes();
        $this->fechaActual = Carbon::now();
    }
    

    public function ingresosPorMes()
    {
        $this->saldosPorMes = [];
    
        for ($i = 1; $i <= 12; $i++) {
            $inicioMes = Carbon::create(null, $i, 1)->startOfMonth();
            $finMes = Carbon::create(null, $i, 1)->endOfMonth();
            $diasDelMes = $inicioMes->daysInMonth;
    
            $saldosDiarios = array_fill(1, $diasDelMes, 0);
    
            for ($dia = 1; $dia <= $diasDelMes; $dia++) {
                $fecha = Carbon::create(null, $i, $dia);
                $saldo = Saldo::whereDate('created_at', $fecha)->sum('calcularTotal');
                $saldosDiarios[$dia] = $saldo;
            }
    
            $nombreMes = Carbon::create(null, $i, 1)->translatedFormat('F');
            $this->saldosPorMes[$nombreMes] = $saldosDiarios;
        }
    }
    
    
    

    public function render()
    {
        return view('livewire.chart-component', [
            'saldosPorMes' => $this->saldosPorMes,
        ]);
    }
}
