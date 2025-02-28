<div class="grid columns-2 gap-2">
    {{-- INGRESOS DEL MES --}}
    <div class="ingresos flex justify-between gap-5">
        <div class="stats shadow w-full h-36">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="stat-title">Ingresos del mes</div>
                <div class="stat-value sm:text-2xl">{{number_format($ingresosDelMes, 2, '.', ',')}}</div>
                <div class="stat-desc">{{$hoy}}</div>
            </div>
        </div>
        {{-- EGRESOS DEL MES --}}
        <div class="stats shadow w-full h-36">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="stat-title">Egresos del mes</div>
                <div class="stat-value sm:text-2xl">{{number_format($egresosDelMes, 2, '.', ',')}}</div>
                <div class="stat-desc">{{$hoy}}</div>
            </div>
        </div>
    </div>
    {{-- SALDOS CUENTAS --}}
    <div class="ingresos flex justify-between gap-5">
        <div class="stats shadow w-full h-36">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="stat-title">Saldos cuentas</div>
                <div class="stat-value sm:text-2xl">
                    @if ($saldosCuentas == false) <span class="text-red-600 text-xl">Pendiente de cargar</span>
                    @else {{number_format($saldosCuentas, 2, '.', ',')}}@endif
                </div>
                <div class="stat-desc">{{$hoy}}</div>
            </div>
        </div>

        {{-- FACTURAS PENDIENTES DE PAGO --}}
        <div class="stats shadow w-full h-36">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="stat-title">Facturas pendientes de pago</div>
                <div class="stat-value sm:text-2xl">{{number_format($egresos_aPagar, 2, '.', ',')}}</div>
                <div class="stat-desc">{{$hoy}}</div>
            </div>
        </div>
    </div>

    <div class="font-bold ml-1 text-gray-500">Proyectar Facturas: PROXIMAMENTE</div>
    <div class="flex justify-between">
        <div class="skeleton h-5 w-20 shadow"></div>
        <div class="skeleton h-5 w-20 shadow"></div>
        <div class="skeleton h-5 w-20 shadow"></div>
        <div class="skeleton h-5 w-20 shadow"></div>
        <div class="skeleton h-5 w-20 shadow"></div>
        <div class="skeleton h-5 w-20 shadow"></div>
        <div class="skeleton h-5 w-20 shadow"></div>
        <div class="skeleton h-5 w-20 shadow"></div>
    </div>
        {{-- ! RESERVADO para agregar datos sobre las proyecciones --}}
    {{-- <div role="alert" class="alert shadow bg-base-100">
    </div> --}}
</div>