@props([
    'label' => null,
    'capture' => true,
    'disabled' => false
])
@php
    $divAttributes = $attributes->only(['class']);
    $inputAttributes = $attributes->except(['class']);

    // Capturar wire:model (si se pasó)
    $wireModel = $attributes->get('wire:model');

    // Si se pasó wire:model="nombre", obtenemos "nombre"
    $inputName = $wireModel ? str_replace(['$', 'this.'], '', $wireModel) : null;

    $class_select = "w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark";

@endphp

@if($inputName)
    @error($inputName)
        @php
            $class_select = "w-full appearance-none rounded-radius border border-danger bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark";
        @endphp
    @enderror
@endif
<div {{ $divAttributes->merge(['class' => 'relative flex w-full  flex-col gap-1 text-on-surface dark:text-on-surface-dark'])  }}>

    @if($label)
        <label for="{{ $inputName }}" class="w-fit pl-0.5 text-sm font-semibold">
            {{ $label }}
        </label>
    @endif

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute pointer-events-none right-4 {{ $label ? 'top-8' : 'top-2.5' }} size-5">
        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
    </svg>

    <select id="{{ $inputName }}"  
    {{ $inputAttributes->merge(['class' => $class_select ]) }}
    {{ $disabled ? 'disabled' : '' }}
    >
        {{$slot}}
    </select>
    
    @if($capture && $inputName)
        @error($inputName)
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    @endif
</div>
