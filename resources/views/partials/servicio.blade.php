@php
    $pasos = [
        [
            'numero' => '01',
            'titulo' => 'Comercialización y Marketing',
            'texto' => 'Publicación destacada y gestión de perfiles en las principales plataformas (Airbnb, Booking, etc.) con fotografías profesionales.',
        ],
        [
            'numero' => '02',
            'titulo' => 'Atención al Huésped 24/7',
            'texto' => 'Comunicación cálida y constante antes, durante y después de la estadía. Filtramos perfiles para garantizar la seguridad del edificio.',
        ],
        [
            'numero' => '03',
            'titulo' => 'Mantenimiento Preventivo y Correctivo',
            'texto' => 'Con el equipo técnico y el estándar de METRIKA SA, resolvemos cualquier desperfecto de forma rápida y eficiente para que tu inmueble se mantenga impecable.',
        ],
        [
            'numero' => '04',
            'titulo' => 'Logística de Check-in y Check-out',
            'texto' => 'Recepción fluida, entrega de llaves y revisión exhaustiva del departamento tras cada salida.',
        ],
    ];

    $plataformas = ['Airbnb', 'Booking', 'Alquiler temporario', 'Corporativo'];
@endphp

<section id="servicio" class="bg-cream">
    <div class="contenedor seccion">
        <x-encabezado-seccion antetitulo="Nuestro Servicio 360" titulo="Tu propiedad cuidada desde el primer anuncio hasta la entrega final." />

        <div class="mt-12 grid gap-5 md:grid-cols-2">
            @foreach ($pasos as $i => $paso)
                <article x-data x-reveal :style="`transition-delay: {{ $i * 70 }}ms`" class="rounded-2xl border border-line bg-white p-6 sombra-marca">
                    <span class="font-display text-4xl font-extrabold text-brand" style="-webkit-text-stroke: 1px var(--color-ink);">{{ $paso['numero'] }}</span>
                    <h3 class="mt-3 font-display text-xl font-bold text-ink">{{ $paso['titulo'] }}</h3>
                    <p class="mt-2 text-[1.0625rem] leading-[1.65] text-ink-muted">{{ $paso['texto'] }}</p>

                    @if ($loop->first)
                        <div class="mt-5 flex flex-wrap gap-2">
                            @foreach ($plataformas as $plataforma)
                                <span class="rounded-full border border-line px-3 py-1 text-sm text-ink-muted">{{ $plataforma }}</span>
                            @endforeach
                        </div>
                    @endif
                </article>
            @endforeach
        </div>
    </div>
</section>
