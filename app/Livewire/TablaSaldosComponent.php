<?php

namespace App\Livewire;

use App\Models\Saldo;
use Livewire\Component;

class TablaSaldosComponent extends Component
{

    public $listarTablas;
    public $msg;

    // public function listarTabla()
    // {
    //     // odernar segun parametros
    //     $this->listarTablas = Saldo::orderByDesc('fechaSaldos')->get() ?? collect([]);
    // }

    public function listarTabla()
    {
        $this->listarTablas = Saldo::raw(function ($collection) {
            return $collection->aggregate([
                [
                    '$addFields' => [
                        // Convierte el string "dd-mm-yyyy" a tipo Date
                        'fechaOrdenar' => [
                            '$dateFromString' => [
                                'dateString' => '$fechaSaldos',
                                'format' => '%d-%m-%Y' // Define el formato de tu string
                            ]
                        ]
                    ]
                ],
                [
                    '$sort' => ['fechaOrdenar' => -1] // Ordena descendente
                ]
            ]);
        });
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
