<div>
    @if (session('success'))
        <x-penguin-ui.feedback.notification.success :message="session('success')" />
    @endif
    
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
    <x-slot name="breadcrumb" >
        <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
            Home
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Formulario Espacio Protector
        </x-penguin-ui.navigation.breadcrumb-item>
    </x-slot>

    {{-- Titulo --}}
    <h2 class="mt-3 text-2xl text-green-800 font-bold">Formulario Espacio Protector</h2>

    {{-- Indicadores --}}
    <x-evi.card-indicator 
        :encuestado="$encuestado" 
        :gestionado="$gestionado" 
        :sin_revisar="$sin_revisar" 
        :muestra="$muestra" 
        :estrato="$estrato" 
    />

    {{-- Tabla de beneficiarios --}}

    @include('partials.evi.formularios.tabla')

    {{-- Modal de Agregar Observación --}}
    @include('partials.evi.formularios.agregar-observacion')

</div>
