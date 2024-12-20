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
            <canvas id="grafica" class="mx-10"></canvas>
        </div>
        
    </div>



    <script>
        document.addEventListener('livewire:navigated', () => {
    const ctx3 = document.getElementById('grafica');
    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep','Oct', 'Nov', 'Dic'],
            datasets: [
                {
                    label: 'Ingresos',
                    data: [25, 15, 22, 20, 28, 18, 11, 25, 15, 22, 20, 28, 18],
                    // fill: true,
                    borderColor: 'rgb(0, 178, 159)',
                    backgroundColor: 'rgb(0, 178, 159)',
                    // tension: 0.1
                },
                {
                    label: 'Egresos',
                    data: [12, 19, 3, 5, 2, 3, 13, 12, 19, 3, 5, 2, 3],
                    // fill: true,
                    borderColor: 'rgb(231, 165, 0)',
                    backgroundColor: 'rgb(231, 165, 0)',
                    // tension: 0.1
                },
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