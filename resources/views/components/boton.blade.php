@props(['variante' => 'primario', 'href' => null, 'type' => 'button'])

@php
    $base = 'inline-flex min-h-[44px] items-center justify-center rounded-full px-6 py-3.5 text-base font-bold transition duration-180 focus:outline-none focus-visible:ring-2 focus-visible:ring-ink focus-visible:ring-offset-2';

    $variantes = [
        'primario' => 'bg-brand text-ink hover:-translate-y-0.5 hover:bg-brand-600 focus-visible:ring-offset-ink-deep',
        'secundario' => 'border border-white/40 bg-transparent text-white hover:-translate-y-0.5 hover:border-white hover:bg-white/5 focus-visible:ring-white focus-visible:ring-offset-ink-deep',
        'oscuro' => 'w-full bg-ink-deep text-white hover:-translate-y-0.5 hover:bg-ink focus-visible:ring-offset-brand',
    ];

    $clases = $base.' '.($variantes[$variante] ?? $variantes['primario']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class([$clases]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->class([$clases]) }}>{{ $slot }}</button>
@endif
