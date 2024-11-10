<?php

namespace App\Exports;

use App\Models\Saldo;
use Maatwebsite\Excel\Concerns\FromCollection;

class SaldoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Saldo::all();
    }
}
