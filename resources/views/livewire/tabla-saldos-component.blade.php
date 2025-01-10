{{-- uso poll para actualizar la pantalla y quitar el mensaje de confirm --}}
<div>
    <!-- Mostrar mensaje de error o confirmación usando session flash -->
     <div wire:poll.3>
         @if (session()->has('msg_ok'))
         <div class="alert alert-success mt-2 mb-5">{{ session('msg_ok') }}</div>
         @endif
         @if (session()->has('msg_nok'))
         <div class="alert alert-error mt-2 mb-5">{{ session('msg_nok') }}</div>
         @endif
     </div>
     <div class="flex justify-end mr-1 items-center">
         <button wire:click='toExcel' wire:loading.attr='disabled'
             class="ml-3 btn btn-xs btn-outline btn-accent"><span><svg class="w-4 h-4 text-gray-800 dark:text-teal-500"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                     viewBox="0 0 24 24">
                     <path fill-rule="evenodd"
                         d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z"
                         clip-rule="evenodd" />
                     <path fill-rule="evenodd"
                         d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                         clip-rule="evenodd" />
                 </svg>
             </span>Excel</button>
         <button wire:click='toPdf' class="ml-3 btn btn-error btn-xs btn-outline" wire:loading.attr='disabled'><span><svg
                      class="w-4 h-4 text-gray-800 dark:text-red-500" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                     <path fill-rule="evenodd"
                         d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z"
                         clip-rule="evenodd" />
                     <path fill-rule="evenodd"
                         d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                         clip-rule="evenodd" />
                 </svg>
             </span>PDF</button>
 
     </div>
     <div class="overflow-x-auto mt-5">
         <table class="table table-xs bg-base-100">
             <thead>
                 <tr class="text-center">
                     {{-- <th>USER</th>
                     <th>CARGADO</th> --}}
                     <th>FECHA</th>
                     <th>A893</th>
                     <th>A430</th>
                     <th>PARROQUIA</th>
                     <th>ADM</th>
                     <th>SANT1</th>
                     <th>SANT2</th>
                     <th>SANT3</th>
                     <th>893</th>
                     <th>430</th>
                     <th>1486</th>

                     <th>CA430</th>
                     <th>ASOC 1</th>
                     <th>ASOC 2</th>
                     
                     <th>FCI-A</th>
                     <th>FCI-P</th>
                     <th>MP</th>
                     <th>CAJA</th>
                     <th class="text-emerald-500 font-bold">TOTAL</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($listarTablas as $listarTabla)
                 <tr wire:key='{{$listarTabla->id}}' class="text-center">
                      {{-- <th>{{$listarTabla->userName}}</th>
                     <th>{{$listarTabla->created_at}}</th> --}}
                     <th>{{$listarTabla->fechaSaldos}}</th>
                     <th>{{$listarTabla->bancoProvincia["a893"]}}</th>
                     <th>{{$listarTabla->bancoProvincia["a430"]}}</th>
                     <th>{{$listarTabla->bancoProvincia["parroquia"]}}</th>
                     <th>{{$listarTabla->bancoProvincia["adm"]}}</th>
 
                     <th>{{$listarTabla->santander["sant1"]}}</th>
                     <th>{{$listarTabla->santander["sant2"]}}</th>
                     <th>{{$listarTabla->santander["sant3"]}}</th>
 
                     <th>{{$listarTabla->santanderP["893"]}}</th>
                     <th>{{$listarTabla->santanderP["430"]}}</th>
                     <th>{{$listarTabla->santanderP["1486"]}}</th>
              
                     <th>{{$listarTabla->ciudad["cA430"]}}</th>
                     <th>{{$listarTabla->ciudad["asoc1"]}}</th>
                     <th>{{$listarTabla->ciudad["asoc2"]}}</th>
 
                     <th>{{$listarTabla->fci["fciA"]}}</th>
                     <th>{{$listarTabla->fci["fciPlus"]}}</th>
                     <th>{{$listarTabla->digital["mercadoPago"]}}</th>
                     <th>{{$listarTabla->efectivo["caja"]}}</th>
                     <th>{{$listarTabla->calcularTotal}}</th>
                 </tr>
                 @endforeach
             </tbody>
         </table>
     </div> 
 </div>