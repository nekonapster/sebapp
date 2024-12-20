<!-- Start coding here -->
<div class="bg-base dark:bg-base-100 relative shadow-md sm:rounded-lg">
    <div class="flex items-center justify-between d p-4">
        <div class="flex">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search"  type="text" class="input-sm bg-base-200 text-sm rounded-lg block w-full pl-10 p-2 "
                    placeholder="Search" required="">
            </div>
        </div>
        {{-- <div class="flex space-x-3">
            <div class="flex space-x-3 items-center">
                <label class="w-40 font-medium text-base">User Type :</label>
                <select class="select select-bordered select-sm rounded-lg block w-full pl-2 p-0 ">
                    <option value="">All</option>
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>
        </div> --}}
    </div>
    <div class="overflow-x-auto h-96">
        <table class="w-full text-sm text-center table-xs">
            <thead class="text-base uppercase">
                <tr>
                    <th scope="col" class="text-xs">proveedor</th>
                    <th scope="col" class="text-xs">numero factura</th>
                    <th scope="col" class="text-xs">vencimiento factura</th>
                    <th scope="col" class="text-xs">importe</th>
                    <th scope="col" class="text-xs">accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturasPendientes as $facturasPendiente)
                <tr wire:key='{{$facturasPendiente->id}}' class="border-b dark:border-gray-700">
                    <td class="py-1">{{$facturasPendiente->proveedor_name}}</td>
                    <td class="py-1">{{$facturasPendiente->nFactura}}</td>
                    <td class="py-1 text-red-500">{{$facturasPendiente->fechaVencimiento}}</td>
                    <td class="py-1">{{$facturasPendiente->importe}} $</td>
                    <td class="py-1">
                        <button wire:click="elegirFactura('{{$facturasPendiente->proveedor_name}}')"
                            class="btn btn-accent btn-sm px-7 rounded-2xl" type="button">ir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="py-4 px-3">
        <div class="flex ">
            <div class="flex space-x-4 items-center mb-3">
                <label class="w-32 font-medium text-base">Per Page</label>
                <select class="text-sm rounded-lg block w-full select-sm bg-base-200 pl-2 p-0">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div> --}}
</div>