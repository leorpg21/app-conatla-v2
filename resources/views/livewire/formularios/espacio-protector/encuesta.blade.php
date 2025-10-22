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
        <x-penguin-ui.navigation.breadcrumb-item :href="route('espacio_protector.index')" wire:navigate>
            Formulario Espacio Protector
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Encuesta
        </x-penguin-ui.navigation.breadcrumb-item>
    </x-slot>
<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera titulo="F11-Formulario_Espacio Protector" version="1" />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario espacio protectoro--}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B11. Asistencia en servicios de salud articulados por el Centro Intégrate
    </h3>

    {{-- Pregunta B11.1 --}}
    <x-evi.formularios.preguntas wire:model="espacio_protector.pregunta_b11_1">
       B11.1. ¿Participó en la Escuela de Padres ofrecida en el Centro Intégrate?
    </x-evi.formularios.preguntas>

    {{-- Pregunta B11.2 --}}
    <x-evi.formularios.preguntas wire:model="espacio_protector.pregunta_b11_2">
       B11.2. ¿Considera que esta experiencia le ayudó a fortalecer sus conocimientos y prácticas en la crianza de sus hijos?
    </x-evi.formularios.preguntas>

    {{-- Pregunta B11.3 --}}
    <x-evi.formularios.preguntas wire:model="espacio_protector.pregunta_b11_3">
       B11.3. ¿Asistió a alguno de los talleres de salud mental enfocados en el manejo de emociones y fortalecimiento emocional?
    </x-evi.formularios.preguntas>

    {{-- Pregunta B11.4 --}}
    <x-evi.formularios.preguntas wire:model="espacio_protector.pregunta_b11_4">
       B11.4. ¿Cree que estos talleres han contribuido a su adaptación e integración en la comunidad de acogida?
    </x-evi.formularios.preguntas>

    
    {{-- Pregunta B11.5 --}}
    <x-evi.formularios.preguntas wire:model="espacio_protector.otro_servicio" version=2 >
        B11.5. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="espacio_protector.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="espacio_protector.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="espacio_protector.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    <x-penguin-ui.input.textarea wire:model="espacio_protector.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
