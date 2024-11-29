{{-- COMPONENTE DE BASE GENERAL --}}
<x-app-layout>
    <div class="card overflow-hidden shadow-sm sm:rounded-lg -mb-1">
        <div class="card-body bg-base-200 rounded-xl mx-10 grid">
            @livewire('formulario-general-component')
        </div>
    </div>

    <div class="mx-10">
        {{-- ! Tabla base general --}}
        <div class="card bg-base-200 w-full mt-3 pb-10">
            @livewire('tabla-base-general-component')
        </div>
    </div>
</x-app-layout>