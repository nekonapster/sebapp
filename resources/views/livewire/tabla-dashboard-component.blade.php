<div>
    <table class="table table-xs table-pin-rows bg-base-100 text-base-content">
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
