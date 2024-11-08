<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    public function exportToExcel()
    {

        // Establecemos y formateamos fecha
        $currentDate = date('d-m-Y');

        // Obtener todos los registros de la tabla 'saldos'
        $saldos = Saldo::all();

        // Crear una nueva instancia de Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Obtener la hoja activa
        $sheet = $spreadsheet->getActiveSheet();

        // Establecer los encabezados
        $sheet->setCellValue('A1', 'USER');
        $sheet->setCellValue('B1', 'CARGADO');
        $sheet->setCellValue('C1', 'FECHA');
        $sheet->setCellValue('D1', 'A893');
        $sheet->setCellValue('E1', 'A430');
        $sheet->setCellValue('F1', 'PARROQUIA');
        $sheet->setCellValue('G1', 'ADM');
        $sheet->setCellValue('H1', 'SANT1');
        $sheet->setCellValue('I1', 'SANT2');
        $sheet->setCellValue('J1', 'SANT3');
        $sheet->setCellValue('K1', 'FCI');
        $sheet->setCellValue('L1', 'FCIp');
        $sheet->setCellValue('M1', '893');
        $sheet->setCellValue('N1', '430');
        $sheet->setCellValue('O1', '1486');
        $sheet->setCellValue('P1', 'MP');
        $sheet->setCellValue('Q1', 'CAJA');
        $sheet->setCellValue('R1', 'TOTAL');

        // Llenamos las columnas con los datos de la BD
        $row = 2;  // Comenzamos en la fila 2 para dejar la fila 1 como encabezado
        foreach ($saldos as $saldo) {
            $sheet->setCellValue('A' . $row, $saldo->userName);
            $sheet->setCellValue('B' . $row, $saldo->updated_at);
            $sheet->setCellValue('C' . $row, $saldo->fecha);
            $sheet->setCellValue('D' . $row, $saldo->bancoProvincia['a893']);
            $sheet->setCellValue('E' . $row, $saldo->bancoProvincia['a430']);
            $sheet->setCellValue('F' . $row, $saldo->bancoProvincia['parroquia']);
            $sheet->setCellValue('G' . $row, $saldo->bancoProvincia['adm']);
            $sheet->setCellValue('H' . $row, $saldo->santander['sant1']);
            $sheet->setCellValue('I' . $row, $saldo->santander['sant2']);
            $sheet->setCellValue('J' . $row, $saldo->santander['sant3']);
            $sheet->setCellValue('K' . $row, $saldo->fci['fciA']);
            $sheet->setCellValue('L' . $row, $saldo->fci['fciPlus']);
            $sheet->setCellValue('M' . $row, $saldo->santanderP['893']);
            $sheet->setCellValue('N' . $row, $saldo->santanderP['430']);
            $sheet->setCellValue('O' . $row, $saldo->santanderP['1486']);
            $sheet->setCellValue('P' . $row, $saldo->digital['mercadoPago']);
            $sheet->setCellValue('Q' . $row, $saldo->efectivo['caja']);
            $sheet->setCellValue('R' . $row, $saldo->calcularTotal);
            $row++;
        }

        // Crear un escritor de Excel en formato Xlsx utilizando la hoja de cálculo previamente creada ($spreadsheet)
        $writer = new Xlsx($spreadsheet);

        // Retornar una respuesta de descarga para que el usuario pueda descargar el archivo directamente
        return response()->streamDownload(
            function () use ($writer) {
                // Guardar el archivo en la salida directa (php://output) para que se envíe al navegador
                $writer->save('php://output');
            },
            // Nombre del archivo de descarga, incluye la fecha actual para que sea único
            'Saldos' . $currentDate . '.xlsx'
        );
    }
}
