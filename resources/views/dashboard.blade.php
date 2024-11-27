{{-- COMPONENTE DEL PANEL --}}
<x-app-layout>
  <div class="grid grid-cols-2 gap-3 mx-10" id="base">
    <div class="bg-neutral rounded-lg p-3 w-full">
      @livewire('dashboard-component')
     
      <div class="divider"></div>
     
      <div class="">
        <table class="table table-xs table-pin-rows">
          <!-- head -->
          <thead>
            <tr class="text-center">
              <th>#</th>
              <th>Name</th>
              <th>Job</th>
              <th>Favorite Color</th>
            </tr>
          </thead>
          <tbody>
            <!-- Filas de la tabla -->
            @for ($i = 1; $i <= 20; $i++) <tr class="text-center">
              <th>{{ $i }}</th>
              <td>Nombre {{ $i }}</td>
              <td>Ocupación {{ $i }}</td>
              <td>Color {{ $i }}</td>
              </tr>
              @endfor
          </tbody>
        </table>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-3 w-full">
      <div class="bg-neutral rounded-lg p-3 h-80">
        <canvas id="myChart1" class="w-full"></canvas>
      </div>
      <div class="bg-neutral rounded-lg p-3 h-80">
        <canvas id="myChart2" class="w-full"></canvas>
      </div>
      <div class="col-span-2 bg-neutral h-96 rounded-lg">
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
    
    type: 'bar',
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
  </script>


</x-app-layout>