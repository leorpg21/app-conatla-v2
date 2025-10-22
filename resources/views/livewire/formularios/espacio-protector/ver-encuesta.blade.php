<div>
<x-slot name="breadcrumb" >
    <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
        Home
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item :href="route('espacio_protector.index')" wire:navigate>
        Formulario Espacio Protector
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Ver Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

    <x-evi.formularios.cabecera 
        titulo="F11-Formulario_Espacio Protector"
        version="1"
    />

    @include('partials.evi.formularios.ver-preguntas-beneficiario')

    {{-- Preguntas del formulario Educación--}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B11. Asistencia en servicios de salud articulados por el Centro Intégrate
    </h3>
    
     {{-- Pregunta B11.1 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b11_1">
       B11.1. ¿Participó en la Escuela de Padres ofrecida en el Centro Intégrate?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta B11.2 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b11_2">
       B11.2. ¿Considera que esta experiencia le ayudó a fortalecer sus conocimientos y prácticas en la crianza de sus hijos?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta B11.3 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b11_3">
       B11.3. ¿Asistió a alguno de los talleres de salud mental enfocados en el manejo de emociones y fortalecimiento emocional?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta B11.4 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b11_4">
       B11.4. ¿Cree que estos talleres han contribuido a su adaptación e integración en la comunidad de acogida?
    </x-evi.formularios.ver-pregunta>


    {{-- Pregunta b11.5 --}}
    <x-evi.formularios.ver-pregunta wire:model="otro_servicio" version=2 >
        B11.5. ¿Otro servicio? ¿Cuál?
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

