<x-app-layout>
    <div class="py-5 bg-neutral mx-10 rounded-xl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="overflow-hidden  sm:rounded-lg mb-6">
                <div class="p-1 flex items-center gap-6 justify-between m-2">
                    
                    <h1 class="text-3xl">Crear usuarios</h1>
                    {{-- boton modal para crear usuario --}}
                    @livewire('modal-crear-usuarios-component')
                </div>
                <div class="divider mt-5"></div>                    
            </div>
            <div class="overflow-hidden  sm:rounded-lg">
                <div class="p-1">
                    {{-- tabla de los usuarios creados --}}
                    @livewire('tabla-usuario-component')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
