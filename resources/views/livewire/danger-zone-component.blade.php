<div wire:poll.3>
    @if (session('msg'))
        <div role="alert" class="alert alert-success mb-5 drop-shadow-xl" id="alert-message">
            {{session('msg')}}
        </div>
        @endif
        <div class="overflow-x-auto">
            <table class="table table-sm text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th class="w-1/6">Nombre de la coleccion</th>
                        <th  class="w-96">Numero de documentos</th>
                        <th class="w-1">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                        <tr>
                            <td>Base General</td>
                            <td>{{$contadores['basesGenerales']}}</td>
                            <td> <button onclick="dangerZone.showModal()" wire:click="loadTableToTruncate('1')"
                                type="button" class="btn btn-sm btn-error">
                                <x-lineawesome-skull-crossbones-solid class="w-6" />
                                Vaciar
                            </button></td>
                        </tr>
                    <!-- row 2 -->
                    <tr>
                        <td>Proveedores</td>
                        <td>{{$contadores['proveedores']}}</td>
                        <td> <button onclick="dangerZone.showModal()" wire:click="loadTableToTruncate('2')"
                                type="button" class="btn btn-sm btn-error">
                                <x-lineawesome-skull-crossbones-solid class="w-6" />
                                Vaciar
                            </button></td>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                        <td>Cuentas Contables</td>
                        <td>{{$contadores['cuentasContables']}}</td>
                        <td> <button onclick="dangerZone.showModal()" wire:click="loadTableToTruncate('3')"
                                type="button" class="btn btn-sm btn-error">
                                <x-lineawesome-skull-crossbones-solid class="w-6" />
                                Vaciar
                            </button></td>
                    </tr>
                    <!-- row 4 -->
                    <tr>
                        <td>Bancos</td>
                        <td>{{$contadores['bancos']}}</td>
                        <td> <button onclick="dangerZone.showModal()" wire:click="loadTableToTruncate('4')"
                                type="button" class="btn btn-sm btn-error">
                                <x-lineawesome-skull-crossbones-solid class="w-6" />
                                Vaciar
                            </button></td>
                    </tr>
                    <!-- row 5 -->
                    <tr>
                        <td>Saldos</td>
                        <td>{{$contadores['saldos']}}</td>
                        <td> <button onclick="dangerZone.showModal()" wire:click="loadTableToTruncate('5')"
                                type="button" class="btn btn-sm btn-error">
                                <x-lineawesome-skull-crossbones-solid class="w-6" />
                                Vaciar
                            </button></td>
                    </tr>
                </tbody>
            </table>
        </div>





        {{-- modal --}}
        <dialog id="dangerZone" class="modal" wire:ignore.self>
            <div class="modal-box" >
                <h3 class="text-lg text-red-700 font-bold">Atencion!</h3>
                <p class="py-4">Esta a punto de eliminar todos los registros de la tabla...</p>
                <div class="modal-action">
                    <!-- if there is a button in form, it will close the modal -->
                    <button wire:click='truncateTable' class="btn" wire:loading.remove
                    {{-- wire:loading.attr.3s='disabled' --}}
                    >Confirmar</button>
                </div>
            </div>
        </dialog>
    </div>