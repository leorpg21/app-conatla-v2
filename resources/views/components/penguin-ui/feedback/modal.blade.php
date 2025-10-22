@props([
    'title' => '',
    'visible' => false,
])

@php
    $modelProp = $attributes->get('wire:model');
@endphp

<div 
    x-data="{ show: @entangle($modelProp) }"
    x-show="show"
    x-cloak
    x-transition.opacity.duration.200ms
    class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
    role="dialog"
    aria-modal="true"
    aria-labelledby="defaultModalTitle"
    x-init="document.addEventListener('keydown', function(e) { if (e.key === 'Escape') { show = false } })" 
>
    <div 
        x-show="show"
        @click.away="show = false"   
        x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
        x-transition:enter-start="opacity-0 scale-50"
        x-transition:enter-end="opacity-100 scale-100"
        class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark"
    >
        <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20">
            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-on-surface-strong dark:text-on-surface-dark-strong">
                {{ $title }}
            </h3>
            <button @click="show = false" aria-label="Cerrar Modal">
                <x-lucide-x class="w-5 h-5" />
            </button>
        </div>

        {{ $slot }}
    </div>
</div>
