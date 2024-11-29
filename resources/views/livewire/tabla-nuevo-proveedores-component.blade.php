<div>
    <div class="w-52 mb-3">
        <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
        <div class="relative">
            <input wire:model.live.debounce.300ms="search" type="text" id="hs-as-table-product-review-search"
                name="hs-as-table-product-review-search"
                class="py-1 px-3 ps-11 input input-sm block w-full bg-gray-50 border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                placeholder="Search">
            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                <svg class="flex-shrink-0 size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </div>
        </div>
    </div>
    <table class="table table-xs text-center table-pin-rows" id="myTable">
        <!-- head -->
        <thead class="">
            <tr>
                {{-- <th class="px-0 text-center">ID</th> --}}
                <th class="px-0 text-center">PROVEEDOR</th>
                <th class="px-0 text-center">TEL</th>
                <th class="px-0 text-center">EMAIL</th>
                <th class="px-0 text-center">CONTACTO</th>
                <th class="px-0 text-center">DESCRIPCION</th>
                <th class="px-0 text-center">RUBRO</th>
                <th class="px-0 text-center">CC</th>
                <th class="px-0" colspan="2">ACCION</th>
            </tr>
        </thead>
        <tbody class="text-xs text-center">
            @foreach ($proveedores as $proveedor)
            <tr wire:key='{{$proveedor->id}}' class="">
                {{-- <td class="px-0">{{$proveedor->id_corto}}</td> --}}
                <td class="px-0">{{$proveedor->proveedor_name}}</td>
                <td class="px-0">{{$proveedor->tel}}</td>
                <td class="px-0">{{$proveedor->email}}</td>
                <td class="px-0">{{$proveedor->contacto}}</td>
                <td class="px-0">{{$proveedor->descripcion}}</td>
                <td class="px-0">{{$proveedor->rubro}}</td>
                <td class="px-0">{{$proveedor->numeroCC}}</td>
                <td class="px-0"></td>
                <td class="flex justify-evenly">
                    {{-- EDITAR PROVEEDOR --}}
                    <button class="botonEditar" wire:click="editarProveedor('{{$proveedor->id}}')" type="button"><svg
                        class="w-6 h-6 text-yellow-500 aria-hidden=true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                        d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                        clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                        d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                        clip-rule="evenodd" />
                    </svg>
                </button>
                
                {{-- BORRAR PROVEEDOR --}}
                <button class="" wire:click="borrarProveedor('{{$proveedor->id}}')"
                        wire:confirm.prompt='Esta apunto de borrar un proveedor de la base de datos, esta seguro?|del'
                        type="button"><svg class="w-6 h-6 text-red-500 aria-hidden=true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>