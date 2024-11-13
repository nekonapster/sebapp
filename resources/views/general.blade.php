{{-- COMPONENTE DE BASE GENERAL --}}
<x-app-layout>
    <div class="card overflow-hidden shadow-sm sm:rounded-lg">
        <div class="card-body bg-neutral rounded-xl mx-10 grid">
            @livewire('general-component')
        </div>
    </div>

    <div class="mx-10">
        {{-- ! Tabla base general --}}
        <div class="card bg-neutral text-neutral-content w-full mt-3 pb-5">
            @livewire('tabla-base-general-component')
        </div>
    </div>
</x-app-layout>