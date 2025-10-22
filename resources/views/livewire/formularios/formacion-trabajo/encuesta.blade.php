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
    <x-penguin-ui.navigation.breadcrumb-item :href="route('formacion_trabajo.index')" wire:navigate>
        Formulario Formación para el trabajo
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera 
        titulo="F07-Formulario_Formación_Para_el_Trabajo" 
    />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario formacion_trabajo --}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B7. Acceso a inclusión socioeconómica - Formación para el trabajo y certificación por competencias 
    </h3>
    
    {{-- Pregunta b7.1 --}}
    <x-evi.formularios.preguntas wire:model="formacion_trabajo.pregunta_b7_1">
        B7.1.  ¿El Centro de Oportunidades o Centro Intégrate le ayudó a hacer un curso para aprender un oficio o mejorar sus habilidades?
    </x-evi.formularios.preguntas>


    {{-- Pregunta b7.2 --}}
    <x-evi.formularios.preguntas wire:model="formacion_trabajo.pregunta_b7_2">
        B7.2. ¿El Centro de Oportunidades o Centro Intégrate le ayudó a conseguir una beca (ayuda económica) para estudiar o capacitarse?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta b7.3 --}}
    <x-evi.formularios.preguntas wire:model="formacion_trabajo.otro_servicio" version=2 >
        B7.3. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="formacion_trabajo.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="formacion_trabajo.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="formacion_trabajo.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    
    <x-penguin-ui.input.textarea wire:model="formacion_trabajo.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
