<div>
@if ($warningMessage)
    @foreach($warningMessage as $msg)
        <x-penguin-ui.feedback.notification.warning :message="$msg" />
    @endforeach
@endif

@if ($errorMessage)
    @foreach($errorMessage as $msg)
        <x-penguin-ui.feedback.notification.error  :message="$msg" />
    @endforeach
@endif
<x-slot name="breadcrumb" >
    <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
        Home
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item :href="route('promocion_prevencion.index')" wire:navigate>
        Formulario Promoción y Prevención
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera 
        titulo="F09-Formulario_Promocion y Prevención" 
    />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario promocion_prevencion --}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B9. Acceso a los servicios de promoción y prevención en VBG
    </h3>
    
    {{-- Pregunta b9.1 --}}
    <x-evi.formularios.preguntas wire:model="promocion_prevencion.pregunta_b9_1">
        B9.1. ¿Tuvo la oportunidad de participar en charlas sobre la prevención de la violencia, en las cuales se le enseñaron a identificar los diferentes tipos de violencia a través de la Oficina de la Mujer (OFM)?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta b9.1 --}}
    <x-evi.formularios.preguntas wire:model="promocion_prevencion.otro_servicio" version=2 >
        B9.2. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="promocion_prevencion.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="promocion_prevencion.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="promocion_prevencion.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    
    <x-penguin-ui.input.textarea wire:model="promocion_prevencion.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
