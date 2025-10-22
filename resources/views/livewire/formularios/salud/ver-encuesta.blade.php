<div>
<x-slot name="breadcrumb" >
    <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
        Home
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item :href="route('salud.index')" wire:navigate>
        Formulario Salud
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Ver Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

    <x-evi.formularios.cabecera 
        titulo="F03-Formulario_Salud"
    />

    @include('partials.evi.formularios.ver-preguntas-beneficiario')

    {{-- Preguntas del formulario Salud--}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B3. Asistencia en servicios de salud articulados por el Centro Intégrate
    </h3>
    
    {{-- Pregunta b3.1 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b3_1" :disabled="true">
        B3.1. ¿Tuvo la oportunidad de participar en jornadas de atención médica general organizadas por el Centro Intégrate?   
    </x-evi.formularios.ver-pregunta>


    {{-- Pregunta b3.2 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b3_2" :disabled="true">
        B3.2. ¿Tuvo la oportunidad de participar en jornadas de atención en salud oral organizadas por el Centro Intégrate?
    </x-evi.formularios.ver-pregunta>
    
    {{-- Pregunta b3.3 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b3_3" :disabled="true">
        B3.3. Durante su estancia en el Centro Intégrate, ¿participó en jornadas de desparasitación?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b3.4 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b3_4" :disabled="true">
        B3.4. Durante su estancia en el Centro Intégrate, ¿participó en jornadas de vacunación?
    </x-evi.formularios.ver-pregunta>
    
    {{-- Pregunta b3.5 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b3_5" :disabled="true">
        B3.5. Durante su estancia en el Centro Intégrate, ¿participó en jornadas de aplicación de flúor dental organizadas en el CI?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b3.6 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b3_6" :disabled="true">
        B3.6. Durante su embarazo, ¿recibió servicios de atención prenatal a través del Centro Intégrate?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b3.7 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b3_7" :disabled="true">
        B3.7. Posterior a su embarazo, ¿recibió servicios de atención en planificación familiar, a través del Centro Intégrate?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b3.8 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b3_8" :disabled="true">
        B3.8. ¿Recibió atención en medicina general y le fueron entregados los medicamentos necesarios para el tratamiento de enfermedades básicas?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b3.9 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b3_9" :disabled="true">
        B3.9. ¿Recibió tratamiento de desparasitación como parte de la atención médica?
    </x-evi.formularios.ver-pregunta>

    

    {{-- Pregunta b3.10 --}}
    <x-evi.formularios.ver-pregunta wire:model="otro_servicio" version=2 >
        B3.10. ¿Otro servicio? ¿Cuál?
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
