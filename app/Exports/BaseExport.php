<?php

namespace App\Exports;

use App\Models\Base;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
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
                'importe' => number_format($item->importe, 2, '.', ','),
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
        // Configurar la orientación de la página y el tamaño del papel
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        // Ajustar la escala para que el contenido quepa en una página
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(1);

        // Ajustar márgenes de la página (en pulgadas)
        $sheet->getPageMargins()->setTop(0);
        $sheet->getPageMargins()->setRight(0);
        $sheet->getPageMargins()->setLeft(0);
        $sheet->getPageMargins()->setBottom(0);

        // Reducir cualquier espacio adicional dentro de las celdas
        $sheet->getDefaultRowDimension()->setRowHeight(-1); // Ajusta el alto automáticamente
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())->getAlignment()->setWrapText(false); // Desactiva el ajuste de texto

        // Aplicar estilo a la fuente y encabezados
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())->getFont()->setName('Helvetica')->setSize(8);
        $sheet->getStyle('A1:J1')->getFont()->setBold(true);

        // Centrar contenido dentro de las celdas
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        return [];
    }
}
