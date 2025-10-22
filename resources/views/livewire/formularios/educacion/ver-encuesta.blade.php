<div>
<x-slot name="breadcrumb" >
    <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
        Home
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item :href="route('educacion.index')" wire:navigate>
        Formulario Educación
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Ver Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

    <x-evi.formularios.cabecera 
        titulo="F02-Formulario_Educación"
    />

    @include('partials.evi.formularios.ver-preguntas-beneficiario')

    {{-- Preguntas del formulario Educación--}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B2. Asistencia en servicios de educación articulados por el Centro Intégrate
    </h3>
    
    {{-- Pregunta B2.1 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b2_1" :disabled="true">
        B2.1 Recibió usted apoyo del Centro Intégrate (CI) en la gestión de un cupo escolar para su hijo o hija?
    </x-evi.formularios.ver-pregunta>


    {{-- Pregunta b2.2 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b2_2" :disabled="true">
        B2.2 ¿Cuántos niños, niñas y adolescentes (NNA) fueron asistidos por los programas sociales durante las fechas del tramo 1 en el Centro Intégrate?
    </x-evi.formularios.ver-pregunta>
    


    {{-- Pregunta b2.3 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b2_3" :disabled="true">
        B2.3. Durante su estancia en el Centro Intégrate, ¿el niño o la niña participó en actividades educativas (como talleres, clases, juegos didácticos) o culturales?
    </x-evi.formularios.ver-pregunta>
    


    {{-- Pregunta b2.4 --}}
    <x-evi.formularios.ver-pregunta wire:model="otro_servicio" version=2 >
        B2.4. ¿Otro servicio? ¿Cuál?
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
