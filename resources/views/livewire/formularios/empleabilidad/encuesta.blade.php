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
    <x-penguin-ui.navigation.breadcrumb-item :href="route('empleabilidad.index')" wire:navigate>
        Formulario Empleabilidad
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera 
        titulo="F04-Formulario_empleabilidad" 
    />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario empleabilidad --}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B4. Acceso a Inclusión socioeconómica  - Ruta de empleabilidad
    </h3>
    {{-- Pregunta b4.1 --}}
    <x-evi.formularios.preguntas wire:model="empleabilidad.pregunta_b4_1">
        B4.1. ¿El Centro de Oportunidades o Centro Intégrate le ayudó en el registro de su hoja de vida?
    </x-evi.formularios.preguntas>


    {{-- Pregunta b4.2 --}}
    <x-evi.formularios.preguntas wire:model="empleabilidad.pregunta_b4_2">
        B4.2. ¿Tuvo la oportunidad de recibir Orientación Ocupacional a través del  Centro de Oportunidades o Centro Intégrate ?
    </x-evi.formularios.preguntas>
    


    {{-- Pregunta b4.3 --}}
    <x-evi.formularios.preguntas wire:model="empleabilidad.pregunta_b4_3">
        B4.3. ¿Tuvo la oportunidad de asistir a un taller donde le enseñaron como realizar su hoja de vida, como ir presentada a una entrevista y temas relacionados a la preparación para una entrevista de trabajo?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b4.3 --}}
    <x-evi.formularios.preguntas wire:model="empleabilidad.pregunta_b4_4">
        B4.4. ¿El Centro de Oportunidades u Centro Intégrate  le apoyo en la búsqueda o identificación de ofertas labores que se ajusten a su perfil laboral?
    </x-evi.formularios.preguntas>
    

    
    {{-- Pregunta b4.5 --}}
    <x-evi.formularios.preguntas wire:model="empleabilidad.otro_servicio" version=2 >
        B4.5. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="empleabilidad.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="empleabilidad.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="empleabilidad.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    
    <x-penguin-ui.input.textarea wire:model="empleabilidad.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
