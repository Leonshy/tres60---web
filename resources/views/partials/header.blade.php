<header
    x-data="{
        open: false,
        scrolled: false,
        init() {
            const update = () => { this.scrolled = window.scrollY > 40 };
            update();
            window.addEventListener('scroll', update, { passive: true });
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && this.open) this.open = false;
            });
        },
    }"
    class="fixed inset-x-0 top-0 z-50 transition-all duration-300"
>
    <div class="border-b border-white/10 transition-colors duration-300" :class="scrolled ? 'bg-ink-deep/80 backdrop-blur-sm' : 'bg-transparent'">
        <div class="contenedor flex items-center justify-between py-4">
            <a href="#inicio" aria-label="Volver al inicio" class="inline-flex items-center">
                <img src="{{ asset('img/logo-tres360-blanco.png') }}" alt="{{ config('tres360.empresa') }}" width="180" height="38" class="h-8 w-auto md:h-9">
            </a>

            <nav class="hidden items-center gap-8 text-sm font-medium text-ink-onDark md:flex">
                <a href="#beneficios" class="transition hover:text-white">Beneficios</a>
                <a href="#servicio" class="transition hover:text-white">Servicio</a>
                <a href="#contacto" class="transition hover:text-white">Contacto</a>
            </nav>

            <div class="hidden md:block">
                <x-boton variante="primario" href="https://wa.me/{{ config('tres360.whatsapp') }}?text={{ urlencode(config('tres360.wa_texto')) }}" class="!px-5 !py-2.5 text-sm" target="_blank" rel="noopener">
                    Hablar con un asesor
                </x-boton>
            </div>

            <button
                type="button"
                @click="open = !open"
                :aria-expanded="open"
                aria-label="Abrir menú"
                class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/20 bg-white/5 text-white md:hidden"
            >
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
        </div>
    </div>

    <div
        x-show="open"
        x-transition
        x-trap.inert.noscroll="open"
        @click.self="open = false"
        class="fixed inset-0 z-40 bg-ink-deep/95 p-6 md:hidden"
    >
        <div class="mt-20 flex flex-col gap-4 text-lg font-medium text-white">
            <a href="#beneficios" @click="open = false" class="rounded-xl border border-white/10 px-4 py-3">Beneficios</a>
            <a href="#servicio" @click="open = false" class="rounded-xl border border-white/10 px-4 py-3">Servicio</a>
            <a href="#contacto" @click="open = false" class="rounded-xl border border-white/10 px-4 py-3">Contacto</a>
            <x-boton variante="primario" href="https://wa.me/{{ config('tres360.whatsapp') }}?text={{ urlencode(config('tres360.wa_texto')) }}" target="_blank" rel="noopener" class="mt-3 justify-center">
                Hablar con un asesor
            </x-boton>
        </div>
    </div>
</header>
