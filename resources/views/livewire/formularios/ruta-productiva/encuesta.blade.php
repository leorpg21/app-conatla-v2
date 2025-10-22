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
        <x-penguin-ui.navigation.breadcrumb-item :href="route('ruta_productiva.index')" wire:navigate>
            Formulario Ruta Productiva
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Encuesta
        </x-penguin-ui.navigation.breadcrumb-item>
    </x-slot>
<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera titulo="F05-Formulario_Ruta_productiva" />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario ruta_productiva --}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B5. Acceso a inclusión socioeconómica - Ruta de desarrollo productivo
    </h3>
    
    {{-- Pregunta b5.1 --}}
    <x-evi.formularios.preguntas wire:model="ruta_productiva.pregunta_b5_1">
        B5.1. ¿El Centro de Oportunidades o Centro Intégrate anotó o registró su idea de negocio para apoyarlo?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b5.2 --}}
    <x-evi.formularios.preguntas wire:model="ruta_productiva.pregunta_b5_2">
        B5.2. ¿El Centro de Oportunidades o Centro Intégrate le ayudó a conectar su negocio con otras entidades o a participar en eventos?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b5.3 --}}
    <x-evi.formularios.preguntas wire:model="ruta_productiva.pregunta_b5_3">
        B5.3.Su Idea/negocio, ha recibido acompañamiento o seguimiento en temas financieros a través del Centro de Oportunidades?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta b5.4 --}}
    <x-evi.formularios.preguntas wire:model="ruta_productiva.pregunta_b5_4">
        B5.4. Su idea o negocio, ha recibido acompañamiento o seguimiento en temas financieros a través del Centro de Oportunidades?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b5.5 --}}
    <x-evi.formularios.preguntas wire:model="ruta_productiva.pregunta_b5_5">
        B5.5. Su idea o negocio, ha recibido acompañamiento o seguimiento en otros temas a través del Centro de Oportunidades?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta b5.6 --}}
    <x-evi.formularios.preguntas wire:model="ruta_productiva.otro_servicio" version=2 >
        B5.6. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="ruta_productiva.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="ruta_productiva.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="ruta_productiva.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    <x-penguin-ui.input.textarea wire:model="ruta_productiva.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
