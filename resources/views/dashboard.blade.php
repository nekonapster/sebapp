{{-- COMPONENTE DEL PANEL --}}
<x-app-layout>
  <div class="grid grid-cols-2 gap-3 mx-10" id="base">
    <div class="bg-base-200 rounded-lg p-3 w-full">
      @livewire('dashboard-component')

      <div class="divider"></div>

      @livewire('tabla-dashboard-component')
    </div>

    <div class="grid grid-cols-2 gap-3 w-full">
      <div class="bg-base-200 rounded-lg p-3 h-80">
        <canvas id="myChart1" class="w-full"></canvas>
      </div>
      <div class="bg-base-200 rounded-lg p-3 h-80">
        <canvas id="myChart2" class="w-full"></canvas>
      </div>
      <div class="col-span-2 bg-base-200 h-96 rounded-lg">
        <canvas id="myChart3" class="w-full"></canvas>
      </div>
    </div>

  </div>



  <script>
    const ctx1 = document.getElementById('myChart1');

  new Chart(ctx1, {
    type: 'doughnut',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });


    const ctx2 = document.getElementById('myChart2');

  new Chart(ctx2, {
    type: 'polarArea',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });


    const ctx3 = document.getElementById('myChart3');

  new Chart(ctx3, {
    
    type: 'line',
    data: {
      labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
      datasets: [
    {
      label: 'Dataset 1',
      data: [12, 19, 3, 5, 2, 3],
      fill: true,
      borderColor: 'rgb(75, 192, 192)',
      backgroundColor: 'rgba(75, 192, 192, 0.5)',// Azul claro
      tension: 0.3
    },
    {
      label: 'Dataset 2',
      data: [25, 15, 22, 20, 28, 18],
      fill: true,
      borderColor: 'rgb(255, 99, 132)',
      backgroundColor: 'rgba(255, 99, 132, 0.5)', // Rojo claro
      tension: 0.3
    },
    {
      label: 'Dataset 3',
      data: [10, 25, 15, 3, 20, 28],
      fill: true,
      borderColor: 'rgb(255, 206, 86)',
      backgroundColor: 'rgba(255, 206, 86)',  // Amarillo claro
      tension: 0.3
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
  </script>
</x-app-layout>