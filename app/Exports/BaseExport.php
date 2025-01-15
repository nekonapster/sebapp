<?php

namespace App\Exports;

use App\Models\Base;
use App\Models\CuentaContable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BaseExport implements FromCollection, ShouldAutoSize, WithStyles, WithHeadings
{
    public function collection()
    {
        // Obtener ambas colecciones y fusionarlas, como en la solución anterior.
        $baseGeneralDatos = Base::select(
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

        $cuentasContablesDatos = CuentaContable::select(
            'numeroCC',
            'rubro',
            'descripcion',
            'tipo'
        )->get();

        $maxFilas = max($baseGeneralDatos->count(), $cuentasContablesDatos->count());

        $datosCombinados = collect();

        for ($i = 0; $i < $maxFilas; $i++) {
            $base = $baseGeneralDatos->get($i) ?? [];
            $cuenta = $cuentasContablesDatos->get($i) ?? [];

            $datosCombinados->push([
                'nFactura' => $base['nFactura'] ?? null,
                'proveedor_name' => $base['proveedor_name'] ?? null,
                'fechaVencimiento' => $base['fechaVencimiento'] ?? null,
                'importe' => isset($base['importe']) ? number_format($base['importe'], 2, '.', ',') : null,
                'tipoPago' => $base['tipoPago'] ?? null,
                'fechaPago' => $base['fechaPago'] ?? null,
                'banco' => $base['banco'] ?? null,
                'cuentaBanco' => $base['cuentaBanco'] ?? null,
                'nCheque' => $base['nCheque'] ?? null,
                'ordenPago' => $base['ordenPago'] ?? null,
                'numeroCC' => $cuenta['numeroCC'] ?? null,
                'rubro' => $cuenta['rubro'] ?? null,
                'descripcion' => $cuenta['descripcion'] ?? null,
                'tipo' => $cuenta['tipo'] ?? null,
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
