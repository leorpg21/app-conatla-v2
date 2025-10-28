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
    
    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">  
        <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
            Home
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Selección para la muestra
        </x-penguin-ui.navigation.breadcrumb-item>  
    </x-slot>

    {{-- Titulo --}}
    <h2 class="mt-3 text-2xl text-green-800 font-bold">Selección Para La Muestra</h2>
    
    {{-- Tarjetas de Muestra --}}
    @include('partials.evi.seleccion-muestra.tarjetas-muestra')


    {{-- Tabla --}}
    @include('partials.evi.seleccion-muestra.tabla')
    
</div>
