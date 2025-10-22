@props([
    'position' => 'top',  // Posición del tooltip (top, bottom, left, right)
    'message' => '',      // El mensaje del tooltip (texto)
])

@php
    // Mapeo de las posiciones para el tooltip
    $positions = [
        'top' => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
        'left' => 'right-full top-1/2 -translate-y-1/2 mr-2',
        'right' => 'left-full top-1/2 -translate-y-1/2 ml-2',
    ];

    // Obtener la clase correspondiente según la posición
    $tooltipPosition = $positions[$position] ?? $positions['top'];
@endphp

<div class="relative group inline-block w-full">
    {{-- Contenido (slot): El contenido sobre el cual pasa el mouse --}}
    <div class="w-full">
        {{ $slot }}
    </div>

    {{-- Tooltip: El mensaje que pasa como prop --}}
    <div class="absolute {{ $tooltipPosition }}
                px-2 py-1 text-sm text-white bg-black rounded
                opacity-0 group-hover:opacity-100 transition-opacity
                pointer-events-none z-50 whitespace-nowrap">
        {{ $message }}
    </div>
</div>