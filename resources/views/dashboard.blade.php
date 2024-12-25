{{-- COMPONENTE DEL PANEL --}}
<x-app-layout>
    <div class="grid grid-cols-2 mx-10 gap-3" id="base">
        <div class="bg-base-200 rounded-lg p-3">
            @livewire('dashboard-component')
        </div>

        <div class="px-3 py-3 stats row-span-2 bg-base-200  shadow-md">
                @livewire('tables-component')
        </div>
        
        <div class="bg-base-200 h-80 rounded-lg">
           @livewire('chart-component')
        </div>
    </div>
</x-app-layout>