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
        <table class="table table-xs text-center table-zebra" >
            <thead>
                <tr>
                    <th class="text-1xl uppercase text-white">Nombre del Proveedor</th>
                    <th class="text-1xl uppercase text-white">Correo Electronico</th>
                    <th class="text-1xl uppercase text-white">Contacto</th>
                    <th class="text-1xl uppercase text-white">Nº Cuenta Contable</th>
                    <th class="text-1xl uppercase text-white">Rubro</th>
                    <th class="text-1xl uppercase text-white">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tablas as $tabla)
                <tr class="max-w-0">
                    <td>
                        {{ $tabla->proveedor_name }}
                    </td>
                    <td>
                        {{ $tabla->email }}
                    </td>
                    <td>
                        {{ $tabla->contacto }}
                    </td>
                    <td>
                        {{ $tabla->numeroCC }}
                    </td>
                    <td>
                        {{ $tabla->rubro }}
                    </td>
                    <td>
                        {{ $tabla->descripcion }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>