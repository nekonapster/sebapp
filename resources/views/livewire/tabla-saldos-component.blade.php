<div>
    <div class="flex justify-end mr-7 items-center">
        
        <button class="ml-3 btn btn-sm btn-outline btn-accent"><span><svg class="w-6 h-6 text-gray-800 dark:text-teal-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
          </svg>
          </span>Excel</button>
        <button class="ml-3 btn btn-sm btn-outline btn-accent"><span><svg class="w-6 h-6 text-gray-800 dark:text-teal-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
          </svg>
          </span>CSV</button>
    </div>
    <div class="overflow-x-auto mt-5">
        <table class="table table-xs">
            <thead>
                <tr class="text-center">
                    <th>Fecha</th>
                    <th>a893</th>
                    <th>a430</th>
                    <th>Parroquia</th>
                    <th>ADM</th>
                    <th>Sant1</th>
                    <th>Sant2</th>
                    <th>Sant3</th>
                    <th>FCI</th>
                    <th>FCIp</th>
                    <th>430</th>
                    <th>893</th>
                    <th>1486</th>
                    <th>mp</th>
                    <th>caja</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testTablas as $testTabla)
                <tr class="text-center">
                   <th>{{$testTabla->created_at}}</th>
                   <th>{{$testTabla->bancoProvincia["a893"]}}'€</th>
                   <th>{{$testTabla->bancoProvincia["a430"]}}'€</th>
                   <th>{{$testTabla->bancoProvincia["parroquia"]}}'€</th>
                   <th>{{$testTabla->bancoProvincia["adm"]}}'€</th>

                   <th>{{$testTabla->santander["sant1"]}}'€</th>
                   <th>{{$testTabla->santander["sant2"]}}'€</th>
                   <th>{{$testTabla->santander["sant3"]}}'€</th>
                   
                   <th>{{$testTabla->santanderP["893"]}}'€</th>
                   <th>{{$testTabla->santanderP["430"]}}'€</th>
                   <th>{{$testTabla->santanderP["1486"]}}'€</th>

                   <th>{{$testTabla->fci["fciA"]}}'€</th>
                   <th>{{$testTabla->fci["fciPlus"]}}'€</th>
                   <th>{{$testTabla->digital["mercadoPago"]}}'€</th>
                   <th>{{$testTabla->efectivo["caja"]}}'€</th>
                   <th>{{$testTabla->calcularTotal}}'€</th>
                </tr>
                   @endforeach
            </tbody>
        </table>
    </div>
</div>