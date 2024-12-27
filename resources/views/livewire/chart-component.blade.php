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
                            {{$ingresosDelMes['enero'][$fechaActual->day] ?? 0}}, 
                            {{$ingresosDelMes['febrero'][$fechaActual->day] ?? 0}},
                            {{$ingresosDelMes['marzo'][$fechaActual->day] ?? 0}},
                            {{$ingresosDelMes['abril'][$fechaActual->day] ?? 0}},
                            {{$ingresosDelMes['mayo'][$fechaActual->day] ?? 0}},
                            {{$ingresosDelMes['junio'][$fechaActual->day] ?? 0}}, 
                            {{$ingresosDelMes['julio'][$fechaActual->day] ?? 0}},
                            {{$ingresosDelMes['agosto'][$fechaActual->day] ?? 0}},
                            {{$ingresosDelMes['septiembre'][$fechaActual->day] ?? 0}},
                            {{$ingresosDelMes['octubre'][$fechaActual->day] ?? 0}},
                            {{$ingresosDelMes['noviembre'][$fechaActual->day] ?? 0}},
                            {{$ingresosDelMes['diciembre'][$fechaActual->day] ?? 0}}
                        ],
                        // fill: true,
                        // borderColor: 'rgba(0, 178, 159, 1)',
                        backgroundColor: 'rgba(0, 178, 159, 1)',
                        // tension: 0.1
                    },
                    {
                        label: 'Egresos',
                        data: [
                            {{$egresosDelMes['enero'][$fechaActual->day] ?? 0}}, 
                            {{$egresosDelMes['febrero'][$fechaActual->day] ?? 0}},
                            {{$egresosDelMes['marzo'][$fechaActual->day] ?? 0}},
                            {{$egresosDelMes['abril'][$fechaActual->day] ?? 0}},
                            {{$egresosDelMes['mayo'][$fechaActual->day] ?? 0}},
                            {{$egresosDelMes['junio'][$fechaActual->day] ?? 0}}, 
                            {{$egresosDelMes['julio'][$fechaActual->day] ?? 0}},
                            {{$egresosDelMes['agosto'][$fechaActual->day] ?? 0}},
                            {{$egresosDelMes['septiembre'][$fechaActual->day] ?? 0}},
                            {{$egresosDelMes['octubre'][$fechaActual->day] ?? 0}},
                            {{$egresosDelMes['noviembre'][$fechaActual->day] ?? 0}},
                            {{$egresosDelMes['diciembre'][$fechaActual->day] ?? 0}}
                        ],
                        // fill: true,
                        // borderColor: 'rgba(231, 165, 0, 1)',
                        backgroundColor: 'rgba(255, 82, 217, 1)',
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