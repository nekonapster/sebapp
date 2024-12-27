<?php

namespace App\Livewire;

use App\Models\Base;
use App\Models\Saldo;
use Carbon\Carbon;
use Livewire\Component;

class ChartComponent extends Component
{
    public $fechaActual;
    public $ingresosDelMes = [];
    public $egresosDelMes = [];
    public $inicioMes;
    public $finMes;

    public function mount()
    {
        // $this->inicioMes = Carbon::now()->startOfMonth();
        // $this->finMes  = Carbon::now()->endOfMonth();
        $this->fechaActual = Carbon::now();

        $this->ingresosPorMes();
        $this->egresosPorMes();
    }
    
    // ingresos del mes = sum de 4xxx que esten en pagadas (true)
    public function ingresosPorMes()
    {
        $this->ingresosDelMes = [];
    
        for ($i = 1; $i <= 12; $i++) {
            $inicioMes = Carbon::create(null, $i, 1)->startOfMonth();
            $finMes = Carbon::create(null, $i, 1)->endOfMonth();
            $diasDelMes = $inicioMes->daysInMonth;
    
            $ingresosDiarios = array_fill(1, $diasDelMes, 0);
    
            for ($dia = 1; $dia <= $diasDelMes; $dia++) {
                $saldo = Base::where('cc', 'like', '4%')
                    ->where('estado', true)
                    ->whereBetween('created_at', [$inicioMes, $finMes])
                    ->sum('importe');
                $ingresosDiarios[$dia] = $saldo;
            }
    
            $nombreMes = Carbon::create(null, $i, 1)->translatedFormat('F');
            $this->ingresosDelMes[$nombreMes] = $ingresosDiarios;
        }
    }
    
    // egresos pagados del mes = sum de 5xxx que esten en pagadas (true)
    public function egresosPorMes()
    {
        $this->egresosDelMes = [];
    
        for ($i = 1; $i <= 12; $i++) {
            $inicioMes = Carbon::create(null, $i, 1)->startOfMonth();
            $finMes = Carbon::create(null, $i, 1)->endOfMonth();
            $diasDelMes = $inicioMes->daysInMonth;
    
            $egresosDiarios = array_fill(1, $diasDelMes, 0);
    
            for ($dia = 1; $dia <= $diasDelMes; $dia++) {
                $saldo = Base::where('cc', 'like', '5%')
                    ->where('estado', true)
                    ->whereBetween('created_at', [$inicioMes, $finMes])
                    ->sum('importe');
                $egresosDiarios[$dia] = $saldo;
            }
    
            $nombreMes = Carbon::create(null, $i, 1)->translatedFormat('F');
            $this->egresosDelMes[$nombreMes] = $egresosDiarios;
        }
    }
    

    public function render()
    {
        return view('livewire.chart-component', [
            'ingresosDelMes' => $this->ingresosDelMes,
            'egresosDelMes' => $this->egresosDelMes,
        ]);
    }
}
