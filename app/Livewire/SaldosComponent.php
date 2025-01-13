<?php

namespace App\Livewire;

use App\Models\Saldo;
use Livewire\Component;

use function Termwind\parse;

class SaldosComponent extends Component
{
    public $fechaSaldos;

    public $provincia = [
        'a893' => '',
        'a430' => '',
        'parroquia' => '',
        'adm' => ''
    ];
    public $santanderP = [
        'sant1' => '',
        'sant2' => '',
        'sant3' => '',
    ];
    public $santanderA = [
        '893' => '',
        '430' => '',
        '1486' => '',
    ];

    public $ciudad = [
        'cA430' => '',
        'asoc1' => '',
        'asoc2' => '',
    ];

    public $fci = [
        'fciA' => '',
        'fciPlus' => '',
    ];
    public $digital = [
        'mercadoPago' => '',
    ];
    public $efectivo = [
        'caja' => '',
    ];


    public $conjuntoSaldos;
    public $mostrarTotal;
    // reglas de validacion////
    public $rules = [
        'provincia.a893' => 'required',
        'provincia.a430' => 'required',
        'provincia.parroquia' => 'required',
        'provincia.adm' => 'required',
        'santanderP.sant1' => 'required',
        'santanderP.sant2' => 'required',
        'santanderP.sant3' => 'required',
        'santanderA.893' => 'required',
        'santanderA.430' => 'required',
        'santanderA.1486' => 'required',
        'ciudad.cA430' => 'required',
        'ciudad.asoc1' => 'required',
        'ciudad.asoc2' => 'required',
        'fci.fciA' => 'required',
        'fci.fciPlus' => 'required',
        'digital.mercadoPago' => 'required',
        'efectivo.caja' => 'required',
    ];

    public $messages = [
        'provincia.a893.required' => 'Obligatorio',
        'provincia.a430.required' => 'Obligatorio',
        'provincia.parroquia.required' => 'Obligatorio',
        'provincia.adm.required' => 'Obligatorio',
        'santanderP.sant1.required' => 'Obligatorio',
        'santanderP.sant2.required' => 'Obligatorio',
        'santanderP.sant3.required' => 'Obligatorio',
        'santanderA.893.required' => 'Obligatorio',
        'santanderA.430.required' => 'Obligatorio',
        'santanderA.1486.required' => 'Obligatorio',
        'ciudad.cA430.required' => 'Obligatorio',
        'ciudad.asoc1.required' => 'Obligatorio',
        'ciudad.asoc2.required' => 'Obligatorio',
        'fci.fciA.required' => 'Obligatorio',
        'fci.fciPlus.required' => 'Obligatorio',
        'digital.mercadoPago.required' => 'Obligatorio',
        'efectivo.caja.required' => 'Obligatorio',
    ];
    //////////////////////////

    // Convierte un string formateado a un número flotante
    public function parseNumber($number)
    {
        // Elimina las comas de miles
        $number = str_replace(',', '', $number);

        // Convierte la cadena resultante a flotante
        return (float) $number;
    }

    // public function convertToFloat(array $array): array
    // {
    //     return array_map(function ($value) {
    //         // Si el valor es un número formateado como string (con puntos y comas)
    //         if (is_string($value)) {
    //             // Quita los puntos de miles y reemplaza las comas por puntos para convertir
    //             $value = str_replace(['.', ','], ['', '.'], $value);
    //         }

    //         return is_numeric($value) ? (float) $value : $value;
    //     }, $array);
    // }

    //agrupo los array de string, los formateo en numeros de tipo float y los redondeo a 3 decimales. 
    public function calcularTotal()
    {
        // unifico todos los array
        $conjunto = array_merge(
            $this->provincia,
            $this->santanderP,
            $this->santanderA,
            $this->ciudad,
            $this->fci,
            $this->digital,
            $this->efectivo
        );

        // Convierte cada valor formateado a un número flotante
        $this->conjuntoSaldos = array_map(fn($valor) => $this->parseNumber($valor), $conjunto);

        // sumo los valores del array unificado
        $this->mostrarTotal = round(array_sum($this->conjuntoSaldos), 3);
    }

    public function toBd()
    {
        $this->validate();

        $this->calcularTotal();

        // capturo el usuario activo en la sesion
        $usuario = auth()->user();

        //logica para subir cada valor a la bd
        Saldo::create([
            // convierto fecha string a fecha en formato carbon
            $fechaConvertida = \Carbon\Carbon::parse($this->fechaSaldos),

            // formateo la fecha a dia-mes-año
            $fechaSaldos = date_format($fechaConvertida, 'd-m-Y'),

            'userName' => $usuario->name,
            'calcularTotal' => $this->mostrarTotal,
            'bancoProvincia' => $this->provincia,
            'santanderP' => $this->santanderP,
            'santanderA' => $this->santanderA,
            'ciudad' => $this->ciudad,
            'fci' => $this->fci,
            'digital' => $this->digital,
            'efectivo' => $this->efectivo,
            'fechaSaldos' => $fechaSaldos,
        ]);

        // refresco la pagina
        return $this->redirect('/saldos', navigate: true);
    }




    public function render()
    {
        return view('livewire.saldos-component', [
            'mostrarTotal' => number_format($this->mostrarTotal, 2, '.', ','),
            'fechaSaldos' => $this->fechaSaldos,
        ]);
    }
}
