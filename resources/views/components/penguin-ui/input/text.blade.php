@props([
    'type' => 'text',
    'label' => null,
    'variant' => 'text',
    'icon' => null,
])

@php
    $divAttributes = $attributes->only(['class']);
    $inputAttributes = $attributes->except(['class']);

    // Capturar wire:model (si se pasó)
    $wireModel = $attributes->get('wire:model');

    // Si se pasó wire:model="nombre", obtenemos "nombre"
    $inputName = $wireModel ? str_replace(['$', 'this.'], '', $wireModel) : null;

    $borderColor = "border-outline dark:border-outline-dark";
@endphp

@if($inputName)
    @error($inputName)
        @php
            $borderColor = "border-danger";
        @endphp
    @enderror
@endif


<div {{ $divAttributes->merge(['class' => 'relative flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark']) }}>
    @if($label)
        <label for="{{ $inputName }}" class="w-fit pl-0.5 text-sm font-semibold">
            {{ $label }}
        </label>
    @endif
    @if($icon)
        <x-dynamic-component :component="'lucide-'.$icon" class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-on-surface/50 dark:text-on-surface-dark/50" />
        <input 
        id="{{ $inputName }}"
        name="{{ $inputName }}"
        type="{{ $type }}"
        {{ $inputAttributes->merge([
            'class' => 'w-full rounded-radius border '. $borderColor .' bg-surface-alt py-2 pl-10 pr-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark'
        ]) }}
    >
    @else
        <input 
            id="{{ $inputName }}"
            name="{{ $inputName }}"
            type="{{ $type }}"
            {{ $inputAttributes->merge([
                'class' => 'w-full rounded-radius border '. $borderColor .' bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark'
            ]) }}
        >
    @endif
    

    @if($inputName)
        @error($inputName)
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    @endif
</div>
