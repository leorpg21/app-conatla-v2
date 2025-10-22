@php
    $route_encuesta = "atencion_campo.encuesta";
    $gestionado = 0;
    $encuestado = 0;
    $sin_revisar = 0;
    $muestra = 0;
    $estrato = 0;
    foreach ($beneficiarios as $value) 
    {
        if($value->estado == 'gestionado') $gestionado ++;
        if($value->estado == 'encuestado') $encuestado ++;
        if($value->estado == 'sin revisar') $sin_revisar ++;
    }
@endphp
<div>
    @if (session('success'))
        <x-penguin-ui.feedback.notification.success message="{{ session('success') }}" />
    @endif
    {{-- Breadcrumb --}}
    <x-penguin-ui.navigation.breadcrumb >
        <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
            Home
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Formulario Atención en el Campo
        </x-penguin-ui.navigation.breadcrumb-item>
    </x-penguin-ui.navigation.breadcrumb>

    {{-- Titulo --}}
    <h2 class="mt-3 text-2xl text-green-800 font-bold">Formulario Atención en el Campo</h2>

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
