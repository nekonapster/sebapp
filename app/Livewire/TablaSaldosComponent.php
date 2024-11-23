<?php

namespace App\Livewire;

use App\Models\Saldo;
use Livewire\Component;

class TablaSaldosComponent extends Component
{

    public $listarTablas;
    public $msg;

    public function listarTabla()
    {
        // odernar segun parametros
        $this->listarTablas = Saldo::orderByDesc('fechaSaldos')->get() ?? collect([]);
        // $this->listarTablas = Saldo::orderByDesc('created_at')->get() ?? collect([]);

        // sin ordenamiento
        // $this->listarTablas = Saldo::all() ?? collect([]);
    }

    public function toExcel()
    {
        return redirect()->route('export-saldos-excel');
    }
    public function toPdf()
    {
        return redirect()->route('export-saldos-pdf');
    }

    public function vaciarTablaSaldo()
    {
        $usuario = auth()->user()->name;
        // solo usuario especifico puede vaciar tablas
        if ($usuario === "nekonapster") {
            Saldo::truncate();
            session()->flash('msg_ok', 'La tabla de saldos ha sido vaciada exitosamente.');
        } else {
            session()->flash('msg_nok', 'No tienes permisos para borrar la base de datos.');
        }
    }

    public function render()
    {
        $this->listarTabla();
        return view('livewire.tabla-saldos-component');
    }
}
