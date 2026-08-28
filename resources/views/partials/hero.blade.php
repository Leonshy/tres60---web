<section id="inicio" class="relative overflow-hidden bg-ink-deep text-white">
    <div class="contenedor grid gap-12 py-20 md:py-24 lg:min-h-[88vh] lg:grid-cols-[1.15fr_.85fr] lg:items-center lg:py-0">
        <div class="relative z-10 max-w-[62ch]">
            <div class="inline-flex rounded-full border border-line-dark bg-[#2A2E06]/70 px-3 py-1.5 text-[0.8125rem] font-semibold uppercase tracking-[0.14em] text-ink-onDark">
                Una marca de {{ config('tres360.legal') }}
            </div>

            <h1 class="mt-6 font-display text-[clamp(2.25rem,6vw,4.25rem)] font-extrabold leading-[1.05] tracking-[-0.02em] text-white">
                Administración integral de departamentos.
                <span class="text-brand">Tú disfrutas de tu inversión, nosotros del resto.</span>
            </h1>

            <p class="mt-6 max-w-[58ch] text-[clamp(1.0625rem,1.6vw,1.3rem)] leading-[1.55] text-ink-onDark">
                Con 360, el servicio exclusivo de property management de {{ config('tres360.legal') }}, gestionamos tu propiedad de principio a fin. Optimizamos tus ingresos y cuidamos tu inmueble con el estándar de calidad y confianza que nos caracteriza.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <x-boton variante="primario" href="#contacto">Quiero rentabilizar mi propiedad</x-boton>
                <x-boton variante="secundario" href="https://wa.me/{{ config('tres360.whatsapp') }}?text={{ urlencode(config('tres360.wa_texto')) }}" target="_blank" rel="noopener">Hablar con un asesor</x-boton>
            </div>
        </div>

        <div class="relative hidden min-h-[420px] items-end justify-end lg:flex" aria-hidden="true">
            <svg viewBox="0 0 700 700" class="absolute -right-5 bottom-0 h-[620px] w-[620px] text-brand opacity-[0.06]">
                <path d="M123 438c-11-84 31-170 110-221 26-17 63-34 108-47 34-10 65-14 103-14 66 0 127 21 177 58 69 51 97 146 86 236-10 79-58 135-118 168-60 34-138 49-214 45-78-5-158-29-220-76-54-41-84-95-92-149Zm61 7c10 56 35 100 74 135 65 58 152 76 245 66 72-8 131-32 173-75 42-44 64-104 58-168-7-76-52-131-115-164-62-33-135-41-208-31-69 10-129 40-168 89-41 52-60 114-59 148Z" fill="currentColor"/>
                <path d="M246 494c-31-31-46-69-47-112 0-19 3-37 12-56 9-19 26-38 48-57 22-18 51-34 84-46 49-18 102-21 147-12 48 10 89 35 118 72 31 39 46 88 41 136-5 44-20 75-45 95-26 21-58 34-100 41-62 10-117 0-162-29-26-17-51-46-64-73-7-15-10-29-11-41Z" fill="currentColor" opacity=".7"/>
            </svg>
        </div>
    </div>
</section>
