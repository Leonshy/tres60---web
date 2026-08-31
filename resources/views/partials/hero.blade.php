<section id="inicio" class="relative overflow-hidden bg-ink-deep text-white">
    <div class="contenedor grid gap-12 py-20 md:py-24 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:py-28">
        <div class="relative z-10 max-w-[62ch]">
            <div class="inline-flex rounded-full border border-line-dark bg-[#2A2E06]/70 px-3 py-1.5 text-[0.8125rem] font-semibold uppercase tracking-[0.14em] text-ink-on-dark">
                Una marca de {{ config('tres360.legal') }}
            </div>

            <h1 class="mt-6 font-display text-[clamp(2.25rem,6vw,4.25rem)] font-extrabold leading-[1.05] tracking-[-0.02em] text-white">
                Administración integral de departamentos.
                <span class="text-brand">Tú disfrutas de tu inversión, nosotros del resto.</span>
            </h1>

            <p class="mt-6 max-w-[58ch] text-[clamp(1.0625rem,1.6vw,1.3rem)] leading-[1.55] text-ink-on-dark">
                Con 360, el servicio exclusivo de property management de {{ config('tres360.legal') }}, gestionamos tu propiedad de principio a fin. Optimizamos tus ingresos y cuidamos tu inmueble con el estándar de calidad y confianza que nos caracteriza.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <x-boton variante="primario" href="#contacto">Quiero rentabilizar mi propiedad</x-boton>
                <x-boton variante="secundario" href="https://wa.me/{{ config('tres360.whatsapp') }}?text={{ urlencode(config('tres360.wa_texto')) }}" target="_blank" rel="noopener">Hablar con un asesor</x-boton>
            </div>
        </div>

        <div id="contacto" class="relative z-10 rounded-2xl bg-white p-5 sombra-marca md:p-8">
            @if (session('ok'))
                <div role="status" aria-live="polite" class="rounded-2xl border border-[#D4E8D1] bg-[#F1F9F2] p-6 text-ink">
                    <p class="text-lg font-semibold">Recibimos tus datos. Un asesor de 360 se va a comunicar con vos a la brevedad.</p>
                </div>
            @else
                <h2 class="font-display text-xl font-bold text-ink">Solicitá una propuesta a medida</h2>
                <p class="mt-1 text-sm text-ink-muted">Dejanos tus datos y un asesor de 360 te contacta a la brevedad.</p>

                <form method="POST" action="{{ route('leads.store') }}" novalidate class="mt-5 grid gap-4">
                    @csrf
                    <input type="text" name="empresa_web" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true" value="">
                    <input type="hidden" name="_ts" value="{{ time() }}">
                    <input type="hidden" name="_sig" value="{{ hash_hmac('sha256', (string) time(), config('app.key')) }}">

                    <div>
                        <label for="nombre" class="mb-2 block text-sm font-semibold text-ink">Nombre</label>
                        <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" autocomplete="name" required minlength="2" maxlength="80"
                            class="w-full rounded-xl border border-line bg-white px-4 py-3 text-base text-ink placeholder:text-ink-muted focus:border-ink focus:outline-none focus:ring-2 focus:ring-ink/20"
                            aria-invalid="{{ $errors->has('nombre') ? 'true' : 'false' }}" aria-describedby="nombre-error">
                        @error('nombre')
                            <p id="nombre-error" class="mt-2 text-sm font-medium text-[#7a1d1d]">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="telefono" class="mb-2 block text-sm font-semibold text-ink">Teléfono</label>
                        <input id="telefono" name="telefono" type="tel" value="{{ old('telefono') }}" autocomplete="tel" inputmode="tel" required minlength="6" maxlength="25"
                            class="w-full rounded-xl border border-line bg-white px-4 py-3 text-base text-ink placeholder:text-ink-muted focus:border-ink focus:outline-none focus:ring-2 focus:ring-ink/20"
                            aria-invalid="{{ $errors->has('telefono') ? 'true' : 'false' }}" aria-describedby="telefono-error">
                        @error('telefono')
                            <p id="telefono-error" class="mt-2 text-sm font-medium text-[#7a1d1d]">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="ubicacion" class="mb-2 block text-sm font-semibold text-ink">Ubicación del departamento</label>
                        <input id="ubicacion" name="ubicacion" type="text" value="{{ old('ubicacion') }}" autocomplete="street-address" required minlength="3" maxlength="160"
                            class="w-full rounded-xl border border-line bg-white px-4 py-3 text-base text-ink placeholder:text-ink-muted focus:border-ink focus:outline-none focus:ring-2 focus:ring-ink/20"
                            aria-invalid="{{ $errors->has('ubicacion') ? 'true' : 'false' }}" aria-describedby="ubicacion-error">
                        @error('ubicacion')
                            <p id="ubicacion-error" class="mt-2 text-sm font-medium text-[#7a1d1d]">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-ink">Correo <span class="font-normal text-ink-muted">(opcional)</span></label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" maxlength="255"
                            class="w-full rounded-xl border border-line bg-white px-4 py-3 text-base text-ink placeholder:text-ink-muted focus:border-ink focus:outline-none focus:ring-2 focus:ring-ink/20"
                            aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" aria-describedby="email-error">
                        @error('email')
                            <p id="email-error" class="mt-2 text-sm font-medium text-[#7a1d1d]">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-boton variante="oscuro" type="submit">Solicitar una propuesta a medida</x-boton>

                    <p class="text-sm text-ink">
                        También podés escribirnos directo por <a href="https://wa.me/{{ config('tres360.whatsapp') }}?text={{ urlencode(config('tres360.wa_texto')) }}" target="_blank" rel="noopener" class="font-semibold underline decoration-2 underline-offset-2">WhatsApp</a>.
                    </p>
                </form>
            @endif
        </div>
    </div>
</section>
