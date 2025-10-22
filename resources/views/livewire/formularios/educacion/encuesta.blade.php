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
    <x-penguin-ui.navigation.breadcrumb-item :href="route('educacion.index')" wire:navigate>
        Formulario Educación
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera 
        titulo="F02-Formulario_Educación" 
    />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario educacion --}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B2. Asistencia en servicios de educación articulados por el Centro Intégrate
    </h3>
    {{-- Pregunta b2.1 --}}
    <x-evi.formularios.preguntas wire:model="educacion.pregunta_b2_1">
        B2.1 Recibió usted apoyo del Centro Intégrate (CI) en la gestión de un cupo escolar para su hijo o hija?
    </x-evi.formularios.preguntas>


    {{-- Pregunta b2.2 --}}
    <x-evi.formularios.preguntas wire:model="educacion.pregunta_b2_2">
        B2.2 ¿Cuántos niños, niñas y adolescentes (NNA) fueron asistidos por los programas sociales durante las fechas del tramo 1 en el Centro Intégrate?
    </x-evi.formularios.preguntas>
    


    {{-- Pregunta b2.3 --}}
    <x-evi.formularios.preguntas wire:model="educacion.pregunta_b2_3">
        B2.3. Durante su estancia en el Centro Intégrate, ¿el niño o la niña participó en actividades educativas (como talleres, clases, juegos didácticos) o culturales?
    </x-evi.formularios.preguntas>
    

    
    {{-- Pregunta b2.5 --}}
    <x-evi.formularios.preguntas wire:model="educacion.otro_servicio" version=2 >
        B2.4. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="educacion.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="educacion.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="educacion.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    
    <x-penguin-ui.input.textarea wire:model="educacion.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
