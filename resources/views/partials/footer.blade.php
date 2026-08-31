<footer class="bg-cream py-10 text-ink-muted">
    <div class="contenedor flex flex-col gap-8 md:flex-row md:items-end md:justify-between">
        <div>
            <img src="{{ asset('img/logo-tres360-ink.png') }}" alt="{{ config('tres360.empresa') }}" width="180" height="38" class="h-8 w-auto">
        </div>

        <div class="flex flex-col gap-1 text-sm md:items-end md:text-right">
            <span>{{ config('tres360.direccion') }}</span>
            <span>{{ config('tres360.ciudad') }}</span>
            <a href="tel:{{ config('tres360.tel_e164') }}" class="hover:text-ink">{{ config('tres360.telefono') }}</a>
            <a href="https://wa.me/{{ config('tres360.whatsapp') }}?text={{ urlencode(config('tres360.wa_texto')) }}" target="_blank" rel="noopener" class="hover:text-ink">WhatsApp</a>
            <a href="mailto:{{ config('tres360.email') }}" class="hover:text-ink">{{ config('tres360.email') }}</a>
        </div>
    </div>

    <div class="contenedor mt-8 border-t border-line pt-6 text-xs text-ink-muted/80">
        © {{ date('Y') }} {{ config('tres360.empresa') }} · Una marca de {{ config('tres360.legal') }} · {{ config('tres360.ciudad') }}
    </div>
</footer>
