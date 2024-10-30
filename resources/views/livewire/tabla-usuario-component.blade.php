{{-- TABLAS PARA CRUD EN USUARIOS ZONA DE EDITAR Y BORRAR--}}
<div>
    <div
        class="px-6 py-4 grid gap-3 md:flex md:justify- md:items-center border-b border-gray-200 dark:border-neutral-700">
        <!-- Input -->
        <div class="sm:col-span-1">
            <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
            <div class="relative">
                <input wire:model.live.debounce.300ms="search" type="text" id="hs-as-table-product-review-search"
                    name="hs-as-table-product-review-search"
                    class="py-2 px-3 ps-11 block w-full bg-gray-50 border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Search">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                    <svg class="flex-shrink-0 size-4 text-gray-400 dark:text-neutral-500"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Input -->
    </div>
    <!-- End Header -->
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                rol
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-center dark:divide-neutral-700">
                        @foreach ($listaUsuarios as $listaUsuario)
                        <tr>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-start text-sm text-gray-800 dark:text-neutral-200">
                                {{$listaUsuario->name}}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                {{$listaUsuario->role}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                {{$listaUsuario->email}}</td>

                            <td class="text-center">
                                <button class="btn btn-sm btn-primary w-16 whitespace-nowrap"
                                    type="button">Editar</button>
                                <button class="btn btn-sm btn-secondary w-16 whitespace-nowrap"
                                    type="button">Borrar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live='perPage'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>