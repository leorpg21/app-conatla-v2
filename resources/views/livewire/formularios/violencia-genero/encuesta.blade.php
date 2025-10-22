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
    <x-penguin-ui.navigation.breadcrumb-item :href="route('violencia_genero.index')" wire:navigate>
        Formulario Violencia Genero
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>
<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera titulo="F08- Formulario  Violencia Genero" />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario violencia_genero --}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B8. Acceso a los servicios de Violencia Basada en Genero (VBG)
    </h3>
    {{-- Pregunta b8.1 --}}
    <x-evi.formularios.preguntas wire:model="violencia_genero.pregunta_b8_1">
        B8.1. ¿La Oficina de la Mujer (OFM) le ofreció ayuda legal o le orientó sobre sus derechos?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b8.2 --}}
    <x-evi.formularios.preguntas wire:model="violencia_genero.pregunta_b8_2">
        B8.2. ¿Recibió acompañamiento o apoyo emocional en la Oficina de la Mujer (OFM)?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta b8.3 --}}
    <x-evi.formularios.preguntas wire:model="violencia_genero.pregunta_b8_3">
        B8.3.¿Le explicaron en la Oficina de la Mujer (OFM) sus derechos como mujer y cómo protegerlos?
    </x-evi.formularios.preguntas>
  
    {{-- Pregunta b8.4 --}}
    <x-evi.formularios.preguntas wire:model="violencia_genero.otro_servicio" version=2 >
        B8.4. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="violencia_genero.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="violencia_genero.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="violencia_genero.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    <x-penguin-ui.input.textarea wire:model="violencia_genero.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
