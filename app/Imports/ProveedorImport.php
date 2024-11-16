<?php

namespace App\Imports;

use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProveedorImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Proveedor([
            //'documento en la bd' => $row['cabecera del excel']
            'proveedor_name' => $row['proveedor'] ?? null,
            'tel' => $row['tel'] ?? null,
            'email' => $row['email'] ?? null,
            'contacto' => $row['contacto'] ?? null,
            'descripcion' => $row['descripcion'] ?? null,
            'rubro' => $row['rubro'] ?? null,
            'cc' => $row['cc'] ?? null,
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
