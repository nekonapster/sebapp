{{-- VISTA DE INVITADO, TABLA DE LOS DATOS --}}
<div class="overflow-x-auto">
    <div class="flex justify-end mb-3 items-center">
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
        </svg>
        <input type="text" placeholder="{{ __('Search') }}" class="input input-md m-3 w-72">
    </div>

    <div class="m-3">
        <table class="table table-xs text-center table-zebra">
            <thead>
                <tr>
                    <th class="text-1xl uppercase text-white">proveedor</th>
                    <th class="text-1xl uppercase text-white">fecha factura</th>
                    <th class="text-1xl uppercase text-white">fecha vencimiento</th>
                    <th class="text-1xl uppercase text-white">factura nº</th>
                    <th class="text-1xl uppercase text-white">importe</th>
                    <th class="text-1xl uppercase text-white">cc</th>
                    <th class="text-1xl uppercase text-white">notas</th>
                    <th class="text-1xl uppercase text-white">fecha de pago</th>
                    <th class="text-1xl uppercase text-white">banco</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bases as $base)
                <tr class="max-w-0">
                    <td>
                        {{ $base->proveedor_name }}
                    </td>
                    <td>
                        {{ $base->fechaFactura }}
                    </td>
                    <td>
                        {{ $base->fechaVencimiento }}
                    </td>
                    <td>
                        {{ $base->nFactura }}
                    </td>
                    <td>
                        {{ $base->importe }}
                    </td>
                    <td>
                        {{ $base->cc }}
                    </td>
                    <td>
                        {{ $base->notas }}
                    </td>
                    <td>
                        {{ $base->fechaPago }}
                    </td>
                    <td>
                        {{ $base->banco }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>