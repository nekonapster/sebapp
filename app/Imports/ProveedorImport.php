<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use MongoDB\Client;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProveedorImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        // Conectar a MongoDB
        $client = new Client('mongodb://localhost:27017');
        $database = $client->selectDatabase('sebapp');

        // Acceder a las colecciones
        $proveedoresCollection = $database->selectCollection('proveedors');
        $cuentasContablesCollection = $database->selectCollection('cuenta_contables');

        // Insertar datos en la colección 'proveedors' y los números de cuenta en 'cuentas_contables'
        foreach ($rows as $row) {
            // Insertar en la colección 'proveedors'
            $proveedoresCollection->insertOne([
                'proveedor_name' => $row['proveedor'] ?? null,
                'tel' => (string) $row['tel'] ?? null,
                'email' => $row['email'] ?? null,
                'contacto' => $row['contacto'] ?? null,
                'descripcion' => $row['descripcion'] ?? null,
                'rubro' => $row['rubro'] ?? null,
                'numeroCC' => $row['cc'] ?? null,                    
                'tipo' => $row['tipo'] ?? null,                
            ]);

            // Insertar solo el numeroCC en la colección 'cuentas_contables'
            if ($row['cc']) {
                $cuentasContablesCollection->updateOne(
                    ['numeroCC' => $row['cc']], // Filtra por el numero de cuenta contable
                    [
                        '$set' => [
                            'rubro' => $row['rubro'] ?? null,
                            'descripcion' => $row['descripcion'] ?? null,
                            'tipo' => $row['tipo'] ?? null,
                            'numeroCC' => $row['cc'], // Aseguramos que 'numeroCC' se mantenga actualizado
                        ]
                    ], // Operación de actualización
                    ['upsert' => true] // Si no existe, lo inserta
                );
            }
            
        }
    }
}
