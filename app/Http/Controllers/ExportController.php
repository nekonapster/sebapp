<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

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
        // $sheet->setCellValue('A1', 'USER');
        // $sheet->setCellValue('B1', 'CARGADO');
        $sheet->setCellValue('A1', 'FECHA');
        $sheet->setCellValue('B1', 'A893');
        $sheet->setCellValue('C1', 'A430');
        $sheet->setCellValue('D1', 'PARROQUIA');
        $sheet->setCellValue('E1', 'ADM');
        $sheet->setCellValue('F1', 'SANT1');
        $sheet->setCellValue('G1', 'SANT2');
        $sheet->setCellValue('H1', 'SANT3');
        $sheet->setCellValue('I1', '893');
        $sheet->setCellValue('J1', '430');
        $sheet->setCellValue('K1', '1486');
        $sheet->setCellValue('L1', 'CA430');
        $sheet->setCellValue('M1', 'ASOC1');
        $sheet->setCellValue('N1', 'ASOC2');
        $sheet->setCellValue('O1', 'FCI');
        $sheet->setCellValue('P1', 'FCIp');
        $sheet->setCellValue('Q1', 'MP');
        $sheet->setCellValue('R1', 'CAJA');
        $sheet->setCellValue('S1', 'TOTAL');

        // Llenamos las columnas con los datos de la BD
        $row = 2;  // Comenzamos en la fila 2 para dejar la fila 1 como encabezado
        foreach ($saldos as $saldo) {
            // $sheet->setCellValue('A' . $row, $saldo->userName);
            // $sheet->setCellValue('B' . $row, $saldo->updated_at);
            $sheet->setCellValue('A' . $row, $saldo->fechaSaldos);
            $sheet->setCellValue('B' . $row, $saldo->bancoProvincia['a893']);
            $sheet->setCellValue('C' . $row, $saldo->bancoProvincia['a430']);
            $sheet->setCellValue('D' . $row, $saldo->bancoProvincia['parroquia']);
            $sheet->setCellValue('E' . $row, $saldo->bancoProvincia['adm']);
            $sheet->setCellValue('F' . $row, $saldo->santander['sant1']);
            $sheet->setCellValue('G' . $row, $saldo->santander['sant2']);
            $sheet->setCellValue('H' . $row, $saldo->santander['sant3']);
            $sheet->setCellValue('I' . $row, $saldo->santanderP['893']);
            $sheet->setCellValue('J' . $row, $saldo->santanderP['430']);
            $sheet->setCellValue('K' . $row, $saldo->santanderP['1486']);
            $sheet->setCellValue('L' . $row, $saldo->ciudad['cA430']);
            $sheet->setCellValue('M' . $row, $saldo->ciudad['asoc1']);
            $sheet->setCellValue('N' . $row, $saldo->ciudad['asoc2']);
            $sheet->setCellValue('O' . $row, $saldo->fci['fciA']);
            $sheet->setCellValue('P' . $row, $saldo->fci['fciPlus']);
            $sheet->setCellValue('Q' . $row, $saldo->digital['mercadoPago']);
            $sheet->setCellValue('R' . $row, $saldo->efectivo['caja']);
            $sheet->setCellValue('S' . $row, $saldo->calcularTotal);
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
            'Saldos_'.$currentDate.'.xlsx'
        );
    }
    
    public function exportToPdf()
    {
        // Establecemos y formateamos fecha
        $currentDate = date('d-m-Y');

        // Recuperamos los saldos de la base de datos
        $saldos = Saldo::all();
        
        // <th>USER</th>
        // <th>CARGADO</th>

        // Crear el contenido HTML para el PDF
        $html = '<h1>Reporte de Saldos</h1>';
        $html .= '<table border="1" style="width:100%; border-collapse: collapse; font-size:8px;  text-align: center">
                <thead style="background-color:black; color:white">
                    <tr>
                        <th>FECHA</th>
                        <th>A893</th>
                        <th>A430</th>
                        <th>PARROQUIA</th>
                        <th>ADM</th>
                        <th>SANT1</th>
                        <th>SANT2</th>
                        <th>SANT3</th>
                        <th>893</th>
                        <th>430</th>
                        <th>1486</th>
                        <th>CA430</th>
                        <th>ASOC1</th>
                        <th>ASOC2</th>
                        <th>FCI</th>
                        <th>FCIp</th>
                        <th>MP</th>
                        <th>CAJA</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>';

        // Llenamos la tabla con los datos de la base de datos
        foreach ($saldos as $saldo) {
        // formateo la fecha que viene de la base de datos (de la bd se devuelve un date)
            $fechaCreacionFormateada = date_format($saldo->created_at, 'd-m-Y H:i:s');

            // <td>' . $saldo->userName . '</td>
            // <td>' . $fechaCreacionFormateada . '</td>

            $html .= '<tr>
                    <td>' . $saldo->fechaSaldos . '</td>
                    <td>' . $saldo->bancoProvincia['a893'] . '</td>
                    <td>' . $saldo->bancoProvincia['a430'] . '</td>
                    <td>' . $saldo->bancoProvincia['parroquia'] . '</td>
                    <td>' . $saldo->bancoProvincia['adm'] . '</td>
                    <td>' . $saldo->santander['sant1'] . '</td>
                    <td>' . $saldo->santander['sant2'] . '</td>
                    <td>' . $saldo->santander['sant3'] . '</td>
                    <td>' . $saldo->santanderP['893'] . '</td>
                    <td>' . $saldo->santanderP['430'] . '</td>
                    <td>' . $saldo->santanderP['1486'] . '</td>
                    <td>' . $saldo->ciudad['cA430'] . '</td>
                    <td>' . $saldo->ciudad['asoc1'] . '</td>
                    <td>' . $saldo->ciudad['asoc2'] . '</td>
                    <td>' . $saldo->fci['fciA'] . '</td>
                    <td>' . $saldo->fci['fciPlus'] . '</td>
                    <td>' . $saldo->digital['mercadoPago'] . '</td>
                    <td>' . $saldo->efectivo['caja'] . '</td>
                    <td><strong>' . $saldo->calcularTotal . '</strong></td>
                  </tr>';
        }

        $html .= '</tbody></table>';
        
        //Instanciamos el objeto Options y le pasamos una fuente
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');


        // Instanciamos el objeto Dompdf
        $dompdf = new Dompdf($options);

        // Cargar el HTML generado
        $dompdf->loadHtml($html);

        // Configuramos el tamaño de papel y orientación (apaisado)
        $dompdf->setPaper('A4', 'landscape');

        // Renderizamos el PDF
        $dompdf->render();

        // Forzar la descarga del archivo PDF
        return $dompdf->stream('saldos_'.$currentDate.'.pdf', [
            'Attachment' => 1  // Esto fuerza la descarga en lugar de mostrar en el navegador
        ]);
    }
}
