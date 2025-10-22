@props([
    'active' => false,
    'separator' => 'default'
])
@php
    $icon_separator = "chevron-right";
@endphp

@if ($active == false )
<li class="flex items-center gap-1">
    <a {{ $attributes->merge([
        'class' => 'hover:text-on-surface-strong dark:hover:text-on-surface-dark-strong'
    ])
    }}
    >
    {{ $slot }}
    </a>
    <x-dynamic-component :component="'lucide-'.$icon_separator" class="size-4"/>
</li>
@else 
<li class="flex items-center text-on-surface-strong gap-1 font-bold dark:text-on-surface-dark-strong" aria-current="page">{{ $slot }}</li>
@endif