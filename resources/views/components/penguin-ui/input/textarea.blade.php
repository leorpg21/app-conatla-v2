@php
    $divAttributes = $attributes->only(['class']);
    $inputAttributes = $attributes->except(['class']);
    // Capturar wire:model (si se pasó)
    $wireModel = $attributes->get('wire:model');
    $label = $attributes->get('label');

    // Si se pasó wire:model="nombre", obtenemos "nombre"
    $inputName = $wireModel ? str_replace(['$', 'this.'], '', $wireModel) : null;
@endphp
<div
    {{ $divAttributes->merge(['class' => 'flex w-full  flex-col gap-1 text-on-surface dark:text-on-surface-dark']) }}
>
    @if ($label)
        <label 
            class="w-fit pl-0.5 text-sm"
            for="{{ $inputName }}" 
        >
        {{ $label }}
    </label>
        
    @endif
    <textarea
        {{ $inputAttributes->merge([
            'class' => 'w-full rounded-radius border border-outline bg-surface-alt px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark',
            'rows' => '3'
            ]) }} 
        id="{{ $inputName }}" 
     >
    </textarea>

    @if($inputName)
        @error($inputName)
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    @endif
</div>
