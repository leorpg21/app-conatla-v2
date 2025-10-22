<div>
<x-slot name="breadcrumb" >
    <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
        Home
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item :href="route('sisben.index')" wire:navigate>
        Formulario Sisben
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Ver Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

    <x-evi.formularios.cabecera 
        titulo="F10-Formulario_SISBEN"
        version="1"
    />

    @include('partials.evi.formularios.ver-preguntas-beneficiario')

    {{-- Preguntas del formulario Sisben--}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B10. Asistencia en servicios de salud articulados por el Centro Intégrate
    </h3>
    
    {{-- Pregunta b10.1 --}}
    <x-evi.formularios.ver-pregunta wire:model="sisben.pregunta_b10_1">
        B10.1. ¿Recibió asesoría u orientación en el punto de atención del SISBÉN?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b10.2 --}}
    <x-evi.formularios.ver-pregunta wire:model="sisben.pregunta_b10_2">
        B10.2. ¿Realizó la inclusión suya o de algún miembro de su núcleo familiar en el SISBÉN?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b10.3 --}}
    <x-evi.formularios.ver-pregunta wire:model="sisben.pregunta_b10_3">
        B10.3. ¿Solicitó la modificación de algún dato personal en el SISBÉN?
    </x-evi.formularios.ver-pregunta>
    
    {{-- Pregunta b10.4 --}}
    <x-evi.formularios.ver-pregunta wire:model="sisben.pregunta_b10_4">
        B10.4. 	¿Tramitó el retiro suyo o de algún miembro de su núcleo familiar del SISBÉN?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b10.5 --}}
    <x-evi.formularios.ver-pregunta wire:model="sisben.pregunta_b10_5">
        B10.5. ¿Solicitó una nueva encuesta del SISBÉN?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b10.6 --}}
    <x-evi.formularios.ver-pregunta wire:model="sisben.pregunta_b10_6">
        B10.6. ¿Fue atendido para una verificación por actualización de datos en el SISBÉN?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b10.7 --}}
    <x-evi.formularios.ver-pregunta wire:model="sisben.pregunta_b10_7">
        B10.7. ¿Accedió a algún otro tipo de servicio o trámite relacionado con el SISBÉN? ¿Cuál?
    </x-evi.formularios.ver-pregunta>
    
    {{-- Pregunta b10.8 --}}
    <x-evi.formularios.ver-pregunta wire:model="sisben.otro_servicio" version=2 >
        B10.8. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.ver-pregunta>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_c1" :disabled="true">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_c2" :disabled="true">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.ver-pregunta>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="pregunta_d1" readonly/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    <x-penguin-ui.input.textarea wire:model="observaciones_encuesta"  readonly/>


</div>
