<div>
    @if ($successMessage)
        @foreach($successMessage as $msg)
            <x-penguin-ui.feedback.notification.success :message="$msg" />
        @endforeach
    @endif

    @if ($errorMessage)
        @foreach($errorMessage as $msg)
            <x-penguin-ui.feedback.notification.error  :message="$msg" />
        @endforeach
    @endif
    <x-slot name="breadcrumb">  
        <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
            Home
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Lista de Checkeo de Infraestructura
        </x-penguin-ui.navigation.breadcrumb-item>  
    </x-slot>

    @include('partials.evi.lc-infraestructura.cabecera')

    @include('partials.evi.lc-infraestructura.tabla')
    
</div>
