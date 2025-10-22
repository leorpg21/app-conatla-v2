@props([
    'variant' => 'default',
    'icon' => null
])

@php
    $class_init = 'rounded-radius w-fit border px-1 py-1 text-xs font-medium';

    switch ($variant) {
        case 'default':
            $class_init .= "border-outline bg-surface-alt text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark";
            break;

        case 'inverse':
            $class_init .= "border-outline-dark bg-surface-dark-alt text-on-surface-dark dark:border-outline dark:bg-surface-alt dark:text-on-surface";
            break;

        case 'primary':
            $class_init .= "border-primary bg-primary text-on-primary dark:border-primary-dark dark:bg-primary-dark dark:text-on-primary";
            break;

        case 'secondary':
            $class_init .= "border-secondary bg-secondary px-2 text-on-secondary dark:border-secondary-dark dark:bg-secondary-dark dark:text-on-secondary-dark";
            break;

        case 'info':
            $class_init .= "border-info bg-info px-2 text-on-info dark:border-info dark:bg-info dark:text-on-info";
            break;

        case 'success':
            $class_init .= "border-success bg-success px-2 text-on-success dark:border-success dark:bg-success dark:text-on-success";
            break;

        case 'warning':
            $class_init .= "border-warning bg-warning px-2 text-on-warning dark:border-warning dark:bg-warning dark:text-on-warning";
            break;
        
        case 'danger':
            $class_init .= "border-danger bg-danger px-2 text-on-danger dark:border-danger dark:bg-danger dark:text-on-danger";
            break;

        default:
            $class_init .= "border-outline bg-surface-alt text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark";
            break;
    }
@endphp

<span 
    {{ $attributes->merge(['class' => $class_init ]) }}
>
    {{ $slot }}
</span>






