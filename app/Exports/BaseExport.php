<?php

namespace App\Exports;

use App\Models\Base;
use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BaseExport implements FromCollection, ShouldAutoSize, WithStyles, WithHeadings
{
    public function collection()
    {
        // Obtener todos los documentos de la colección 'bases'
        $baseGeneralDatos = Base::all();

        $datosCombinados = collect();

        foreach ($baseGeneralDatos as $base) {
            // Buscar el proveedor relacionado usando proveedor_id
            $proveedor = Proveedor::find($base->proveedor_id);

            $datosCombinados->push([
                'nFactura' => $base->nFactura,
                'proveedor_name' => $base->proveedor_name,
                'fechaVencimiento' => $base->fechaVencimiento,
                'importe' => number_format($base->importe, 2, '.', ','),
                'tipoPago' => $base->tipoPago,
                'fechaPago' => $base->fechaPago,
                'banco' => $base->banco,
                'cuentaBanco' => $base->cuentaBanco,
                'nCheque' => $base->nCheque,
                'ordenPago' => $base->ordenPago,
                'numeroCC' => $base->cc, // CC directamente de la base
                'rubro' => $proveedor->rubro ?? null, // Si existe el proveedor, usa su rubro
                'descripcion' => $proveedor->descripcion ?? null, // Si existe el proveedor, usa su descripción
                'tipo' => $proveedor->tipo ?? null, // Si existe el proveedor, usa su tipo
            ]);
        }

        return $datosCombinados;
    }

    public function headings(): array
    {
        return [
            'nFactura',
            'Proveedor Name',
            'Fecha Vencimiento',
            'Importe',
            'Tipo Pago',
            'Fecha Pago',
            'Banco',
            'Cuenta Banco',
            'nCheque',
            'Orden Pago',
            'Numero CC',
            'Rubro',
            'Descripcion',
            'Tipo',
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
        $sheet->getStyle('A1:N' . $sheet->getHighestRow())->getAlignment()->setWrapText(false); // Desactiva el ajuste de texto

        // Aplicar estilo a la fuente y encabezados
        $sheet->getStyle('A1:N' . $sheet->getHighestRow())->getFont()->setName('Helvetica')->setSize(8);
        $sheet->getStyle('A1:N1')->getFont()->setBold(true);

        // Centrar contenido dentro de las celdas
        $sheet->getStyle('A1:N' . $sheet->getHighestRow())->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:N' . $sheet->getHighestRow())->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        return [];
    }
}
