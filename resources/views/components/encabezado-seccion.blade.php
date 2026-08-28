@props(['antetitulo' => null, 'titulo', 'bajada' => null, 'oscuro' => false])

<div {{ $attributes->class(['max-w-[62ch]']) }}>
    @if ($antetitulo)
        <p @if ($oscuro) class="text-[0.8125rem] font-semibold uppercase tracking-[0.14em] text-ink-onDark"
           @else class="text-[0.8125rem] font-semibold uppercase tracking-[0.14em] text-ink-muted" @endif>
            {{ $antetitulo }}
        </p>
    @endif

    <h2 @if ($oscuro) class="mt-4 font-display text-[clamp(1.75rem,3.6vw,2.75rem)] font-bold tracking-[-0.01em] text-white"
        @else class="mt-4 font-display text-[clamp(1.75rem,3.6vw,2.75rem)] font-bold tracking-[-0.01em] text-ink" @endif>
        {{ $titulo }}
    </h2>

    @if ($bajada)
        <p @if ($oscuro) class="mt-4 text-[1.0625rem] leading-[1.65] text-ink-onDark md:text-[1.125rem]"
           @else class="mt-4 text-[1.0625rem] leading-[1.65] text-ink-muted md:text-[1.125rem]" @endif>
            {{ $bajada }}
        </p>
    @endif
</div>
