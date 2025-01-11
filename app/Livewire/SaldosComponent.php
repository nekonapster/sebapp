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
        'santander.sant1' => 'required',
        'santander.sant2' => 'required',
        'santander.sant3' => 'required',
        'santanderP.893' => 'required',
        'santanderP.430' => 'required',
        'santanderP.1486' => 'required',
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
        'provincia.a430.required' =>'Obligatorio',
        'provincia.parroquia.required' =>'Obligatorio',
        'provincia.adm.required' =>'Obligatorio',
        'santander.sant1.required' =>'Obligatorio',
        'santander.sant2.required' =>'Obligatorio',
        'santander.sant3.required' =>'Obligatorio',
        'santanderP.893.required' =>'Obligatorio',
        'santanderP.430.required' =>'Obligatorio',
        'santanderP.1486.required' =>'Obligatorio',
        'ciudad.cA430.required' =>'Obligatorio',
        'ciudad.asoc1.required' =>'Obligatorio',
        'ciudad.asoc2.required' =>'Obligatorio',
        'fci.fciA.required' =>'Obligatorio',
        'fci.fciPlus.required' =>'Obligatorio',
        'digital.mercadoPago.required' =>'Obligatorio',
        'efectivo.caja.required' =>'Obligatorio',
    ];
    //////////////////////////

     // Convierte un string formateado a un número flotante
     public function parseNumber($number)
     {
         // Reemplaza comas (separadores de miles)
         $number = str_replace(',', '', $number); // Elimina las comas de miles
     
         // Convierte la cadena resultante a flotante
         return (float) $number;
     }
     
    //agrupo los array de string, los formateo en numeros de tipo float y los redondeo a 3 decimales. 
    public function calcularTotal()
    {
        // unifico todos los array
        $conjunto = array_merge(
            $this->provincia, 
            $this->santander, 
            $this->santanderP, 
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
            $fechaSaldos = date_format($fechaConvertida,'d-m-Y'),

            'userName' => $usuario->name,
            'calcularTotal' => $this->mostrarTotal,
            'bancoProvincia' => $this->provincia,
            'santander' => $this->santander,
            'santanderP' => $this->santanderP,
            'ciudad' => $this->ciudad,
            'fci' => $this->fci,
            'digital' => $this->digital,
            'efectivo' => $this->efectivo,
            'fechaSaldos' => $fechaSaldos,
        ]);

        // refresco la pagina
        return $this->redirect('/saldos', navigate:true);
    }




    public function render()
    {
        return view('livewire.saldos-component', [
            'mostrarTotal' => $this->mostrarTotal,
            'fechaSaldos' => $this->fechaSaldos,
        ]);
    }
}
