<section id="contacto" class="bg-brand">
    <div class="contenedor seccion">
        <h2 class="font-display text-[clamp(1.75rem,3.6vw,2.75rem)] font-bold tracking-[-0.01em] text-ink-deep">
            Protege tu inversión inmobiliaria con los que saben. Deja la gestión diaria en manos de 360 by {{ config('tres360.legal') }}.
        </h2>

        <div class="mt-8 rounded-2xl bg-white p-5 sombra-marca md:p-8">
            @if (session('ok'))
                <div role="status" aria-live="polite" class="rounded-2xl border border-[#D4E8D1] bg-[#F1F9F2] p-6 text-ink">
                    <p class="text-lg font-semibold">Recibimos tus datos. Un asesor de 360 se va a comunicar con vos a la brevedad.</p>
                </div>
            @else
                <form method="POST" action="{{ route('leads.store') }}" novalidate class="grid gap-5">
                    @csrf
                    <input type="text" name="empresa_web" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true" value="">
                    <input type="hidden" name="_ts" value="{{ time() }}">
                    <input type="hidden" name="_sig" value="{{ hash_hmac('sha256', (string) time(), config('app.key')) }}">

                    <div class="grid gap-5 md:grid-cols-2">
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
                    </div>

                    <div class="pt-2">
                        <x-boton variante="oscuro" type="submit">Solicitar una propuesta a medida</x-boton>
                    </div>

                    <p class="mt-2 text-sm text-ink">
                        También podés escribirnos directo por <a href="https://wa.me/{{ config('tres360.whatsapp') }}?text={{ urlencode(config('tres360.wa_texto')) }}" target="_blank" rel="noopener" class="font-semibold underline decoration-2 underline-offset-2">WhatsApp</a>.
                    </p>
                </form>
            @endif
        </div>
    </div>
</section>
