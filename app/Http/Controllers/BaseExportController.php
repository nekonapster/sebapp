<?php

namespace App\Http\Controllers;

use App\Exports\BaseExport;
use Maatwebsite\Excel\Facades\Excel;

class BaseExportController extends Controller
{
    function exportToExcel(){

        Return Excel::download(new BaseExport, 'baseGeneral.xls');
    }

    function exportToPdf(){
        return Excel::download(new BaseExport, 'baseGeneral.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
