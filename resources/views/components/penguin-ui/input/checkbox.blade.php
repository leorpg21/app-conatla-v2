@props([
    'type' => 'text',
    'label' => null,
    'variant' => 'primary'
])

@php
    $class_label = 'flex items-center gap-2 text-sm font-medium text-on-surface dark:text-on-surface-dark has-checked:text-on-surface-strong dark:has-checked:text-on-surface-dark-strong has-disabled:opacity-75 has-disabled:cursor-not-allowed';

    // Capturar wire:model (si se pasó)
    $wireModel = $attributes->get('wire:model');

    // Si se pasó wire:model="nombre", obtenemos "nombre"
    $inputName = $wireModel ? str_replace(['$', 'this.'], '', $wireModel) : null;

    
    $class_checkbox = "before:content[''] peer relative size-4 appearance-none overflow-hidden rounded-sm border border-outline bg-surface-alt before:absolute before:inset-0 focus:outline-2 focus:outline-offset-2 active:outline-offset-0 disabled:cursor-not-allowed dark:border-outline-dark dark:bg-surface-dark-alt dark:focus:outline-outline-dark-strong";

    switch ($variant) {
        case 'primary':
            $class_checkbox .= 'checked:border-primary checked:before:bg-primary focus:outline-outline-strong checked:focus:outline-primary  dark:checked:border-primary-dark dark:checked:before:bg-primary-dark dark:checked:focus:outline-primary-dark';
            break;
        case 'secondary':
            $class_checkbox .= 'checked:border-secondary checked:before:bg-secondary focus:outline-outline-strong checked:focus:outline-secondary dark:checked:border-secondary-dark dark:checked:before:bg-secondary-dark  dark:checked:focus:outline-secondary-dark';
            break;
        case 'info':
            $class_checkbox .= 'checked:border-info checked:before:bg-info focus:outline-outline-strong checked:focus:outline-info dark:checked:border-info dark:checked:before:bg-info  dark:checked:focus:outline-info';
            break;
        case 'success':
            $class_checkbox .= 'checked:border-success checked:before:bg-success focus:outline-outline-strong checked:focus:outline-success dark:checked:border-success dark:checked:before:bg-success  dark:checked:focus:outline-success';
            break;
        case 'warning':
            $class_checkbox .= 'checked:border-warning checked:before:bg-warning focus:outline-outline-strong checked:focus:outline-warning dark:checked:border-warning dark:checked:before:bg-warning  dark:checked:focus:outline-warning';
            break;
        case 'danger':
            $class_checkbox .= 'checked:border-danger checked:before:bg-danger focus:outline-outline-strong checked:focus:outline-danger dark:checked:border-danger dark:checked:before:bg-danger dark:checked:focus:outline-danger';
            break;
        default:
            $class_checkbox .= 'checked:border-primary checked:before:bg-primary focus:outline-outline-strong checked:focus:outline-primary  dark:checked:border-primary-dark dark:checked:before:bg-primary-dark dark:checked:focus:outline-primary-dark';
            break;
    }

    $lableAtri = $attributes->only(['class']);
    $inputAtri = $attributes->except(['class']);
@endphp

<!-- primary Checkbox -->
<label 
    {{ $lableAtri->merge(['class' => "$class_label"]) }}
    >
    <span class="relative flex items-center">
        <input 
            {{ $inputAtri->merge(['class' => "$class_checkbox"]) }}
            type="checkbox" 
        />

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="4" class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-on-primary peer-checked:visible dark:text-on-primary-dark">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
        </svg>
    </span>
    <span>{{ $label }}</span>
</label>
