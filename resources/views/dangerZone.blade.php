{{-- COMPONENTE DE USUARIOS --}}
<x-app-layout>
    <div class="py-5 bg-neutral mx-10 rounded-xl">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-4">
            <div class="overflow-hidden sm:rounded-lg m-3">
                <div class="flex items-center gap-6 justify-between">
                    <h1 class="text-2xl ml-1 mt-3">Vaciado de tablas</h1>
                </div>
                <span class="text-sm text-left">Estas en una zona peligrosa, los cambios que hagas aca no son
                    reversibles y se
                    perdera toda la informacion almacenada en las base de datos.</span>
                </div>
            <div class="divider">!</div>
        @livewire('danger-zone-component')
</x-app-layout>