<?php

namespace App\Exports;

use App\Models\Base;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Reader\Gnumeric\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup as WorksheetPageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;



class BaseExport extends Dompdf implements FromCollection, ShouldAutoSize, WithStyles, WithHeadings
{
    public function collection()
    {
        $datos = Base::select(
            'nFactura',
            'proveedor_name',
            'fechaVencimiento',
            'importe',
            'tipoPago',
            'fechaPago',
            'banco',
            'cuentaBanco',
            'nCheque',
            'ordenPago'
        )->get();

        // Mapear los datos para eliminar el campo `_id` si MongoDB lo incluye automáticamente
        return $datos->map(function ($item) {
            return [
                'nFactura' => $item->nFactura,
                'proveedor_name' => $item->proveedor_name,
                'fechaVencimiento' => $item->fechaVencimiento,
                'importe' => $item->importe,
                'tipoPago' => $item->tipoPago,
                'fechaPago' => $item->fechaPago,
                'banco' => $item->banco,
                'cuentaBanco' => $item->cuentaBanco,
                'nCheque' => $item->nCheque,
                'ordenPago' => $item->ordenPago,
            ];
        });

        $datos->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
    }

    public function headings(): array
    {
        return [
            'Nº factura',
            'Proveedor',
            'Fecha vencimiento',
            'Importe',
            'Tipo pago',
            'Fecha pago',
            'Banco',
            'Cuenta banco',
            'Nº cheque',
            'Orden pago'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Configurar la orientación de la página
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Configurar el tamaño de la página a A4 
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);


        // Ajustar la escala para que todo el contenido quepa en una página
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(1);

        // Ajustar los márgenes de la página
        $sheet->getPageMargins()->setTop(0.10);
        $sheet->getPageMargins()->setRight(0.10);
        $sheet->getPageMargins()->setLeft(0.10);
        $sheet->getPageMargins()->setBottom(0.10);

        // Configurar el área de impresión
        $sheet->getPageSetup()->setPrintArea('A1:J' . $sheet->getHighestRow());

        // Ajustar el tamaño de la fuente para que todo el contenido quepa en la página
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())->getFont()->setSize(9);

        // Ajustar el ancho de cada columna automáticamente al contenido
        foreach (range('A', 'J') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
        
        
        // Ajustar el tipo de fuente
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())->getFont()->setName('Helvetica');


        // Centrar el contenido de todas las celdas después de ajustar el ancho 
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        return [
            // Aplica negrita a la primera fila (encabezados)
            1 => ['font' => ['bold' => true]],
        ];
    }
}
