@php
    $beneficios = [
        [
            'titulo' => 'El respaldo de los expertos',
            'texto' => 'Al ser parte de METRIKA SA, conocemos el mercado inmobiliario desde su concepción. Nadie cuidará y valorará tu departamento mejor que nosotros.',
            'icono' => 'shield-check',
        ],
        [
            'titulo' => 'Rentabilidad maximizada',
            'texto' => 'Utilizamos estrategias de precios dinámicos para asegurar que tu inmueble genere los mayores ingresos posibles en todo momento.',
            'icono' => 'trending-up',
        ],
        [
            'titulo' => 'Gestión sin preocupaciones',
            'texto' => 'Nos hacemos cargo de todo el proceso: comercialización, trato con huéspedes, cobros y mantenimiento.',
            'icono' => 'sparkles',
        ],
        [
            'titulo' => 'Transparencia total',
            'texto' => 'Recibe reportes claros, puntuales y detallados sobre la ocupación y el rendimiento financiero de tu inversión.',
            'icono' => 'file-bar-chart',
        ],
    ];

    $iconos = [
        'shield-check' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-4"/>',
        'trending-up' => '<path d="m22 7-8.5 8.5-5-5L2 17"/><path d="M16 7h6v6"/>',
        'sparkles' => '<path d="M12 3v4M12 17v4M3 12h4M17 12h4M5.6 5.6l2.8 2.8M15.6 15.6l2.8 2.8M18.4 5.6l-2.8 2.8M8.4 15.6l-2.8 2.8"/>',
        'file-bar-chart' => '<path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2Z"/><path d="M14 2v6h6"/><path d="M9 17v-3M12 17v-5M15 17v-2"/>',
    ];
@endphp

<section id="beneficios" class="bg-white">
    <div class="contenedor seccion">
        <x-encabezado-seccion antetitulo="Por qué elegirnos" titulo="Gestión de inversión con criterio, calma y resultados." />

        <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($beneficios as $i => $beneficio)
                <article x-data x-reveal :style="`transition-delay: {{ $i * 70 }}ms`" class="rounded-2xl border border-line bg-white p-6 sombra-marca transition duration-200 hover:-translate-y-0.5 hover:border-brand hover:sombra-marca-hover">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-brand text-ink">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="22" height="22" aria-hidden="true">{!! $iconos[$beneficio['icono']] !!}</svg>
                    </div>
                    <h3 class="mt-4 font-display text-xl font-bold text-ink">{{ $beneficio['titulo'] }}</h3>
                    <p class="mt-2 text-[1.0625rem] leading-[1.65] text-ink-muted">{{ $beneficio['texto'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
