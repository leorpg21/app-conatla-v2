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
        <x-penguin-ui.navigation.breadcrumb-item :href="route('rumv.index')" wire:navigate>
            Formulario RUMV
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Encuesta
        </x-penguin-ui.navigation.breadcrumb-item>
    </x-slot>
<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario RUMV --}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B1. Información general de la población migrante, vulnerable y de acogida en la ciudad de Barranquilla respecto al acceso a los servicios sociales ofrecidos para facilitar la expedición del Registro Único de Migrantes Venezolanos (RUMV)
    </h3>
    {{-- Pregunta B1.1 --}}
    <x-evi.formularios.preguntas wire:model="rumv.pregunta_b1_1">
        B1.1. ¿Recibió usted apoyo de la Alcaldía en el proceso de pre-registro para obtener el Permiso por Protección Temporal (PPT)?
    </x-evi.formularios.preguntas>


    {{-- Pregunta B1.2 --}}
    <x-evi.formularios.preguntas wire:model="rumv.pregunta_b1_2">
        B1.2. ¿Recibió usted apoyo de la Alcaldía en el proceso de registro biométrico para obtener el Permiso por Protección Temporal (PPT)?
    </x-evi.formularios.preguntas>
    


    {{-- Pregunta B1.3 --}}
    <x-evi.formularios.preguntas wire:model="rumv.pregunta_b1_3">
        B1.3. ¿Recibió apoyo en el  pre registro para la expedición del PPT  ?
    </x-evi.formularios.preguntas>
    


    {{-- Pregunta B1.4 --}}
    <x-evi.formularios.preguntas wire:model="rumv.pregunta_b1_4">
        B1.4. ¿Recibió apoyo en el registro biométrico para la expedición del PPT?
    </x-evi.formularios.preguntas>
    

    
    {{-- Pregunta B1.5 --}}
    <x-evi.formularios.preguntas wire:model="rumv.otro_servicio" version=2 >
        B1.5. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="rumv.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="rumv.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="rumv.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    <x-penguin-ui.input.textarea wire:model="rumv.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
