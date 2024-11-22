{{-- COMPONENTE DE USUARIOS --}}
<x-app-layout>
    <div class="py-5 bg-neutral mx-10 rounded-xl">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-4">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="flex items-center gap-6 justify-between">
                    <h1 class="text-2xl ml-1">Vaciado de tablas</h1>
                </div>
                <div>
                    <spam class="text-sm ml-1">Estas en una zona peligrosa, los cambios que hagas aca no son reversibles
                        y se perdera toda la informacion almacenada en las bases de datos.</spam>
                </div>
                </hr>
                <div class="overflow-hidden sm:rounded-lg">
                    {{-- boton de vaciar la tabla --}}
                    <div>
                        <button type="button" class="btn btn-sm btn-error mt-5" {{-- onclick="confirmarVaciado()" --}}
                            wire:click='vaciarTabla'
                            wire:confirm.prompt='Esta accion no es reversible, seguro que deseas continuar?|del'>
                            <x-lineawesome-skull-crossbones-solid class="w-6" />
                            Vaciar
                        </button>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>