@props([
    'type' => 'submit',
    'target' => null, // acción específica opcional
    'variant' => 'primary',
    'icon' => null
])


@php
    $class_inicial = 'whitespace-nowrap rounded-radius px-3 py-2 text-sm font-medium tracking-wide  transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2  active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed ';
     
    switch ($variant) {
        case 'primary':
            $class_inicial .= 'border bg-primary border-primary text-on-primary focus-visible:outline-primary';
            break;
        case 'secondary':
            $class_inicial .= 'border bg-secondary border border-secondary  text-on-secondary  focus-visible:outline-secondary dark:bg-secondary-dark dark:border-secondary-dark dark:text-on-secondary-dark dark:focus-visible:outline-secondary-dark';
            break;

        case 'info':
            $class_inicial .= 'border bg-info border-info  text-on-info focus-visible:outline-info  dark:bg-info dark:border-info dark:text-on-info dark:focus-visible:outline-info';
            break;
        case 'warning':
            $class_inicial .= 'border bg-warning border-warning text-on-warning focus-visible:outline-warning dark:bg-warning dark:border-warning dark:text-on-warning dark:focus-visible:outline-warning';
            break;
        case 'danger':
            $class_inicial .= 'border bg-danger border-danger text-on-danger focus-visible:outline-danger dark:bg-danger dark:border-danger dark:text-on-danger dark:focus-visible:outline-danger';
            break;
        case 'success':
            $class_inicial .= 'border bg-success border-success text-on-success focus-visible:outline-success dark:bg-success dark:border-success dark:text-on-success dark:focus-visible:outline-success';
            break;
        case 'alternate':
            $class_inicial .= 'bg-surface-alt border border-surface-alt text-on-surface-strong focus-visible:outline-surface-alt  disabled:opacity-75 disabled:cursor-not-allowed dark:bg-surface-dark-alt dark:border-surface-dark-alt dark:text-on-surface-dark-strong dark:focus-visible:outline-surface-dark-alt';
            break;
        default:
            $class_inicial .= 'border bg-primary border-primary text-on-primary focus-visible:outline-primary';
            break;
    }

    $class_inicial .= 'inline-flex items-center justify-center relative';
@endphp


<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => $class_inicial
    ]) }}
    @if($target)
        wire:loading.attr="disabled"
        wire:target="{{ $target }}"
    @endif
>
    @if($target)
        <svg 
            wire:loading 
            wire:target="{{ $target }}"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" 
            aria-hidden="true" 
            class="absolute left-1/2 -translate-x-1/2 size-5 fill-white motion-safe:animate-spin dark:fill-on-surface-dark">
            <path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,19a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" opacity=".25" />
            <path d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z" />
        </svg>
      

        <div 
            wire:loading.remove 
            wire:target="{{ $target }}"
            class="flex items-center justify-center gap-2 w-full"
        >
            @if ($icon)
                <x-dynamic-component :component="'lucide-'.$icon" class="size-5 shrink-0" />
            @endif

            @if (trim($slot))
                <span class="self-center">{{ $slot }}</span>
            @endif
        </div>

       

        {{-- Permance Invisible cuando carga --}}
        <div
            wire:loading 
            wire:target="{{ $target }}" 
            class="invisible flex items-center justify-center gap-2 w-full"
        >
            @if ($icon)
                <x-dynamic-component :component="'lucide-'.$icon" class="size-5 shrink-0" />
            @endif

            @if (trim($slot))
                <span class="self-center">{{ $slot }}</span>
            @endif
        </div>
       
        
    @else
        <div class="flex items-center justify-center gap-2 w-full">
            @if ($icon)
                <x-dynamic-component :component="'lucide-'.$icon" class="size-5 shrink-0" />
            @endif

            @if (trim($slot))
                <span class="self-center">{{ $slot }}</span>
            @endif
        </div>
    @endif
</button>
