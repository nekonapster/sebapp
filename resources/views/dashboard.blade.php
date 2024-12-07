{{-- COMPONENTE DEL PANEL --}}
<x-app-layout>
    <div class="grid grid-cols-2 gap-3 mx-10" id="base">
        <div class="bg-base-200 rounded-lg p-3 w-full">
            @livewire('dashboard-component')

            {{-- <div class="divider"></div> --}}

        </div>

        <div class="grid grid-cols-2 w-full">
            <div class="col-span-2 bg-base-200 h-full rounded-lg">
                <canvas id="grafica" class="w-full mt-10"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 w-full overflow-x-auto h-96">
        @livewire('tabla-dashboard-component')
    </div>

    <script>
        document.addEventListener('livewire:navigated', () => {
    const ctx3 = document.getElementById('grafica');
    new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre','Octubre', 'Noviembre', 'Diciembre'],
            datasets: [
                {
                    label: 'Jardin',
                    data: [12, 19, 3, 5, 2, 3, 13, 12, 19, 3, 5, 2, 3],
                    fill: true,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    tension: 0.1
                },
                {
                    label: 'Primaria',
                    data: [25, 15, 22, 20, 28, 18, 11, 25, 15, 22, 20, 28, 18],
                    fill: true,
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    tension: 0.1
                },
                {
                    label: 'Secundaria',
                    data: [10, 25, 15, 3, 20, 28, 10, 10, 25, 15, 3, 20, 28],
                    fill: true,
                    borderColor: 'rgb(255, 206, 86)',
                    backgroundColor: 'rgba(255, 206, 86)',
                    tension: 0.1
                }
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

    </script>
</x-app-layout>