<?php

namespace App\Exports;

use App\Models\Base;
use Maatwebsite\Excel\Concerns\FromCollection;

class BaseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Base::all();
    }
}
