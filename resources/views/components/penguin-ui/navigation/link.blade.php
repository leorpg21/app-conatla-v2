@props([
    'icon' => null,
    'active_page' => false
])

@php
    $class_current = 'text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong';
    
    if($active_page) $class_current = 'text-on-surface-strong underline-offset-2 bg-primary/10 dark:bg-primary-dark/10 dark:text-on-surface-dark-strong';

    $class_inicial = "flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium focus-visible:underline focus:outline-hidden $class_current";

@endphp

<a 
{{ $attributes->merge([
        'class' => $class_inicial
    ])
}}
>

        
    @if($icon)
    <x-dynamic-component :component="'lucide-' . $icon" class="size-4 shrink-0" />
    @endif
    <span x-cloak :class="!collapseDesktop ? 'md:hidden' : ''">{{ $slot }}</span>
    
</a>
