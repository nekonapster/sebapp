<?php

namespace App\Http\Controllers;

use App\Imports\ProveedorImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function importExcel(Request $request)
    {
        $file = $request->file('excel');
        Excel::import(new ProveedorImport, $file);
        return redirect('/general');
    }
}
