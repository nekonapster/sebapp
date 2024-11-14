<?php

namespace App\Livewire;

use App\Models\Saldo;
use Livewire\Component;

class SaldosComponent extends Component
{
    public $fechaSaldos;

    public $provincia = [
        'a893' => '',
        'a430' => '',
        'parroquia' => '',
        'adm' => ''
    ];
    public $santander = [
        'sant1' => '',
        'sant2' => '',
        'sant3' => '',
    ];
    public $santanderP = [
        '893' => '',
        '430' => '',
        '1486' => '',
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
        'santander.sant1' => 'required',
        'santander.sant2' => 'required',
        'santander.sant3' => 'required',
        'santanderP.893' => 'required',
        'santanderP.430' => 'required',
        'santanderP.1486' => 'required',
        'fci.fciA' => 'required',
        'fci.fciPlus' => 'required',
        'digital.mercadoPago' => 'required',
        'efectivo.caja' => 'required',
    ];

    public $messages = [
        'provincia.a893.required' => 'Escriba un numero',
        'provincia.a430.required' =>'Escriba un numero',
        'provincia.parroquia.required' =>'Escriba un numero',
        'provincia.adm.required' =>'Escriba un numero',
        'santander.sant1.required' =>'Escriba un numero',
        'santander.sant2.required' =>'Escriba un numero',
        'santander.sant3.required' =>'Escriba un numero',
        'santanderP.893.required' =>'Escriba un numero',
        'santanderP.430.required' =>'Escriba un numero',
        'santanderP.1486.required' =>'Escriba un numero',
        'fci.fciA.required' =>'Escriba un numero',
        'fci.fciPlus.required' =>'Escriba un numero',
        'digital.mercadoPago.required' =>'Escriba un numero',
        'efectivo.caja.required' =>'Escriba un numero',
    ];
    //////////////////////////

    public function calcularTotal()
    {
        // unifico todos los array
        $this->conjuntoSaldos = array_merge($this->provincia, $this->santander, $this->santanderP, $this->fci, $this->digital, $this->efectivo);

        // sumo los valores del array unificado
        $this->mostrarTotal = round(array_sum($this->conjuntoSaldos), 3);
        ds($this->mostrarTotal);
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
            $fechaSaldos = date_format($fechaConvertida,'d-m-Y'),

            'userName' => $usuario->name,
            'calcularTotal' => $this->mostrarTotal,
            'bancoProvincia' => $this->provincia,
            'santander' => $this->santander,
            'santanderP' => $this->santanderP,
            'fci' => $this->fci,
            'digital' => $this->digital,
            'efectivo' => $this->efectivo,
            'fechaSaldos' => $fechaSaldos,
        ]);

        // refresco la pagina
        return redirect('/saldos');
    }




    public function render()
    {
        return view('livewire.saldos-component', [
            'mostrarTotal' => $this->mostrarTotal,
            'fechaSaldos' => $this->fechaSaldos,
        ]);
    }
}
