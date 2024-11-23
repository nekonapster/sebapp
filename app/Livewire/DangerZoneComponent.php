<?php

namespace App\Livewire;

use App\Models\Banco;
use App\Models\Base;
use App\Models\CuentaContable;
use App\Models\Proveedor;
use App\Models\Saldo;
use Livewire\Component;

class DangerZoneComponent extends Component
{
    public $contador = []; // Almacenará los conteos de las colecciones
    public $id;
    /*
1 = baseGeneral
2 = proveedores
3 = cuentasContables
4 = bancos
5 = saldos
*/

public function mount()
{
    // Cargar el número de documentos de cada colección al iniciar el componente
    $this->contador = [
        'basesGenerales' =>  Base::count(),
        'proveedores' => Proveedor::count(),
        'cuentasContables' => CuentaContable::count(),
        'bancos' => Banco::count(),
        'saldos' => Saldo::count(),
    ];
}

    public function loadTableToTruncate($id)
    {
        switch ($id) {
            case '1':
                $this->id = $id;
                break;
            case '2':
                $this->id = $id;
                break;
            case '3':
                $this->id = $id;
                break;
            case '4':
                $this->id = $id;
                break;
            case '5':
                $this->id = $id;
                break;

            default:
                // return redirect('/dangerZone');
                break;
        }
    }

    public function truncateTable()
    {
        switch ($this->id) {
            case '1':
                Base::truncate();
                break;
            case '2':
                Proveedor::truncate();
                break;
            case '3':
                CuentaContable::truncate();
                break;
            case '4':
                Banco::truncate();
                break;
            case '5':
                Saldo::truncate();
                break;

            default:
            break;
        }
        session()->flash('msg', 'La tabla ha sido vaciada con exito');
        return redirect('/dangerZone');
    }



    public function render()
    {
// dd($this->collectionsCount);

        return view('livewire.danger-zone-component', [
            'contadores' => $this->contador,
        ]);
    }
}
