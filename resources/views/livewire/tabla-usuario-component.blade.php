{{-- TABLAS PARA CRUD EN USUARIOS ZONA DE EDITAR Y BORRAR--}}
<div>
    <div
        class="px-6 py-4 grid gap-3 md:flex md:justify- md:items-center border-b border-base-content">
        <!-- Input -->
        <div class="sm:col-span-1">
            <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
            <div class="relative">
                <input wire:model.live.debounce.300ms="search" type="text" id="hs-as-table-product-review-search"
                    name="hs-as-table-product-review-search"
                    class="py-1 px-3 ps-11 input input-sm block w-full bg-gray-50 border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-base-300 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
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


        <div class="overflow-x-auto min-w-full inline-block align-middle">
                <table class="table table-xs bg-base-100 mt-5">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-start text-xs font-medium">
                                name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium">
                                rol
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium">
                                email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium w-44">
                                action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($listaUsuarios as $listaUsuario)
                        <tr wire:key="{{$listaUsuario->id}}">
                            <td
                                class="text-sm text-start">
                                {{$listaUsuario->name}}</td>

                            <td
                                class="text-sm">
                                {{$listaUsuario->role}}</td>

                            <td class="text-sm">
                                {{$listaUsuario->email}}</td>

                            <td class="">
                                <button 
                                    wire:click="editar('{{$listaUsuario->_id}}')"
                                    onclick="editarUsuario.showModal()"
                                    class="pr-3 mx-0 text-right" type="button"
                                    {{-- añado condicional; si el usuario es nekonapster que desabilite el boton --}}
                                    {{$listaUsuario->name === 'nekonapster' ? 'disabled' : '' }}>
                                    {{-- añado condicional; si el usuario es nekonapster que cambiel el color del boton --}}
                                        <svg 
                                        class="w-5 h-5 text-yellow-500 {{$listaUsuario->name === 'nekonapster' ? ' dark:text-gray-600' : '' }}" 
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                                        width="24" height="24" 
                                        fill="currentColor" 
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            
                                <button 
                                    wire:click="borrarUsuario('{{$listaUsuario->_id}}')"
                                    wire:confirm="Estas a punto de borrar al usuario: ({{$listaUsuario->name}}), estas seguro?"
                                    class="pl-3 mx-0 text-left" type="button"
                                    {{-- añado condicional; si el usuario es nekonapster que desabilite el boton --}}
                                    {{$listaUsuario->name === 'nekonapster' ? 'disabled' : '' }}>
                                    {{-- añado condicional; si el usuario es nekonapster que cambiel el color del boton --}}
                                    <svg class="w-5 h-5 text-red-500 {{$listaUsuario->name === 'nekonapster' ? ' dark:text-gray-600' : '' }}" 
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24"
                                        fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    {{-- modal EDIT --}}
    @livewire('modal-editar-usuario-component')
    {{-- fin modal EDIT --}}
</div>