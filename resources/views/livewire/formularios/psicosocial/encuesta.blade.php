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
        <x-penguin-ui.navigation.breadcrumb-item :href="route('psicosocial.index')" wire:navigate>
            Formulario Psicosocial
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Encuesta
        </x-penguin-ui.navigation.breadcrumb-item>
    </x-slot>
<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera titulo="F12-Formulario_Psicosocial" version="1" />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario psicosocial --}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B12. Asistencia en servicios de salud articulados por el Centro Intégrate
    </h3>
    
    {{-- Pregunta b12.1 --}}
    <x-evi.formularios.preguntas wire:model="psicosocial.pregunta_b12_1">
        B12.1. 	¿Recibió orientación jurídica relacionada con situaciones de violencia basada en género (VBG) a través del Centro Intégrate?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b12.2 --}}
    <x-evi.formularios.preguntas wire:model="psicosocial.pregunta_b12_2">
        B12.2. ¿Participó en actividades o recibió información sobre prevención de la trata de personas?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b12.3 --}}
    <x-evi.formularios.preguntas wire:model="psicosocial.pregunta_b12_3">
        B12.3. ¿Fue remitido a alguna institución de apoyo o dependencia de la Alcaldía para continuar con la atención de su caso?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta b12.4 --}}
    <x-evi.formularios.preguntas wire:model="psicosocial.pregunta_b12_4">
        B12.4. ¿Recibió seguimiento por parte del Centro Intégrate después de ser atendido por servicios psicosociales o trabajo social?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta b12.5 --}}
    <x-evi.formularios.preguntas wire:model="psicosocial.otro_servicio" version=2 >
        B12.5. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="psicosocial.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="psicosocial.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="psicosocial.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    <x-penguin-ui.input.textarea wire:model="psicosocial.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
