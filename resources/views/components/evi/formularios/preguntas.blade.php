@props([
    'version' => 1,
    'disabled' => false
])
@php
    $flex_version = '';

    if($version == 2) $flex_version = 'flex-col';

    $wireModel = $attributes->get('wire:model');
    $inputName = $wireModel ? str_replace(['$', 'this.'], '', $wireModel) : null;
@endphp

@if($version == 2)
<div class="flex flex-col flex-wrap justify-between mt-5">
    <span class="w-full text-on-surface dark:text-on-surface-dark"> {{ $slot }} </span>
    <x-penguin-ui.input.textarea
            :capture="false"  
            wire:model="{{ $wireModel }}"
            rows="auto"
            class="w-full"
    />
</div>
@else
<div class="flex flex-wrap justify-between mt-5 items-center">
    <span class="max-w-[950px] text-on-surface dark:text-on-surface-dark"> {{ $slot }} </span>

   
    <x-penguin-ui.input.select :disabled="$disabled" :capture="false" wire:model="{{ $wireModel }}" class="max-w-[150px]" >
        <option>Seleccionar</option>
        @foreach (config('form_selects.respusetas_si_no') as $value  )
            <option 
                value="{{ $value['value'] }}"
            > 
            {{ $value['nombre'] }}
            </option>
            
        @endforeach
    </x-penguin-ui.input.select>
    
</div>
@endif
@if($inputName)
    @error($inputName)
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
@endif