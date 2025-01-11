<div class="grid columns-2 gap-2">
    {{-- INGRESOS DEL MES --}}
    <div class="ingresos flex justify-center gap-5">
        <div class="stats shadow w-72 h-36">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="stat-title">Ingresos del mes</div>
                <div class="stat-value sm:text-3xl">{{$ingresosDelMes}}</div>
                <div class="stat-desc">{{$hoy}}</div>
            </div>
        </div>
        {{-- EGRESOS DEL MES --}}
        <div class="stats shadow w-72 ">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current"  >
                        <path class="tooltil" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="stat-title">Egresos del mes</div>
                <div class="stat-value sm:text-3xl">{{$egresosDelMes}}</div>
                <div class="stat-desc">{{$hoy}}</div>
            </div>
        </div>
    </div>
    {{-- SALDOS CUENTAS --}}
    <div class="ingresos flex justify-center gap-5">
        <div class="stats shadow w-72  h-36">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="stat-title">Saldos cuentas</div>
                <div class="stat-value sm:text-3xl">
                    @if ($saldosCuentas == false) <span class="text-red-600 text-xl">Pendiente de cargar</span> 
                    @else {{$saldosCuentas}}@endif
                </div>
                <div class="stat-desc">{{$hoy}}</div>
            </div>
        </div>

        {{-- EGRESOS PAGAR DEL MES --}}
        <div class="stats shadow w-72 ">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="stat-title">Egresos a pagar del mes</div>
                <div class="stat-value sm:text-3xl">{{$egresos_aPagar}}</div>
                <div class="stat-desc">{{$hoy}}</div>
            </div>
        </div>
    </div>
</div>