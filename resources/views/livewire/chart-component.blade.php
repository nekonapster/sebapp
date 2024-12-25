<div>
    <canvas id="grafica" class="mx-10"></canvas>
</div>

@script
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
                        data: [
                            {{$saldosPorMes['enero'][$fechaActual->day] ?? 0}}, 
                            {{$saldosPorMes['febrero'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['marzo'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['abril'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['mayo'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['junio'][$fechaActual->day] ?? 0}}, 
                            {{$saldosPorMes['julio'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['agosto'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['septiembre'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['octubre'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['noviembre'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['diciembre'][$fechaActual->day] ?? 0}}
                        ],
                        // fill: true,
                        borderColor: 'rgb(0, 178, 159)',
                        backgroundColor: 'rgb(0, 178, 159)',
                        // tension: 0.1
                    },
                    {
                        label: 'Egresos',
                        data: [
                            {{$saldosPorMes['enero'][$fechaActual->day] ?? 0}}, 
                            {{$saldosPorMes['febrero'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['marzo'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['abril'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['mayo'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['junio'][$fechaActual->day] ?? 0}}, 
                            {{$saldosPorMes['julio'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['agosto'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['septiembre'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['octubre'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['noviembre'][$fechaActual->day] ?? 0}},
                            {{$saldosPorMes['diciembre'][$fechaActual->day] ?? 0}}
                        ],
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
@endscript