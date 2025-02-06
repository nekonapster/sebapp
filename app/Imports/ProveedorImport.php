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
        $client = new Client(env('DB_URI'));
        $database = $client->selectDatabase(env('DB_DATABASE'));

        // Acceder a las colecciones
        $proveedoresCollection = $database->selectCollection('proveedors');
        $cuentasContablesCollection = $database->selectCollection('cuenta_contables');

        foreach ($rows as $row) {
            // Convertir todos los valores en minúsculas y asegurarse de que existen
            $proveedorName = isset($row['proveedor']) ? strtolower(trim($row['proveedor'])) : null;
            $tel = isset($row['tel']) ? (string) $row['tel'] : null;
            $email = isset($row['email']) ? strtolower(trim($row['email'])) : null;
            $contacto = isset($row['contacto']) ? strtolower(trim($row['contacto'])) : null;
            $descripcion = isset($row['descripcion']) ? strtolower(trim($row['descripcion'])) : null;
            $rubro = isset($row['rubro']) ? strtolower(trim($row['rubro'])) : null;
            $tipo = isset($row['tipo']) ? strtolower(trim($row['tipo'])) : null;
            
            // Validar que numeroCC tenga exactamente 8 dígitos
            $numeroCC = isset($row['cc']) ? (string) trim($row['cc']) : null;
            if ($numeroCC && (!preg_match('/^\d{8}$/', $numeroCC))) {
                // Si no es válido, omitir este registro y continuar con el siguiente
                continue;
            }

            // Insertar en la colección 'proveedors'
            $proveedoresCollection->insertOne([
                'proveedor_name' => $proveedorName,
                'tel' => $tel,
                'email' => $email,
                'contacto' => $contacto,
                'descripcion' => $descripcion,
                'rubro' => $rubro,
                'numeroCC' => $numeroCC,                    
                'tipo' => $tipo,                
            ]);

            // Insertar o actualizar en la colección 'cuentas_contables'
            if ($numeroCC) {
                $cuentasContablesCollection->updateOne(
                    ['numeroCC' => $numeroCC], // Filtra por número de cuenta contable
                    [
                        '$set' => [
                            'rubro' => $rubro,
                            'descripcion' => $descripcion,
                            'tipo' => $tipo,
                            'numeroCC' => $numeroCC, // Aseguramos que 'numeroCC' se mantenga actualizado
                        ]
                    ],
                    ['upsert' => true] // Si no existe, lo inserta
                );
            }
        }
    }
}
