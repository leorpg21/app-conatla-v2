<div>
<x-slot name="breadcrumb" >
    <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
        Home
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item :href="route('formacion_trabajo.index')" wire:navigate>
        Formulario Formación para el trabajo
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Ver Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

    <x-evi.formularios.cabecera 
        titulo="F07-Formulario_Formación_Para_el_Trabajo"
    />

    @include('partials.evi.formularios.ver-preguntas-beneficiario')

    {{-- Preguntas del formulario Educación--}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B7. Acceso a inclusión socioeconómica - Formación para el trabajo y certificación por competencias
    </h3>
    
    {{-- Pregunta b7.1 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b7_1">
        B7.1.  ¿El Centro de Oportunidades o Centro Intégrate le ayudó a hacer un curso para aprender un oficio o mejorar sus habilidades?
    </x-evi.formularios.ver-pregunta>


    {{-- Pregunta b7.2 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b7_2">
        B7.2. ¿El Centro de Oportunidades o Centro Intégrate le ayudó a conseguir una beca (ayuda económica) para estudiar o capacitarse?
    </x-evi.formularios.ver-pregunta>
    
    {{-- Pregunta b7.3 --}}
    <x-evi.formularios.ver-pregunta wire:model="otro_servicio" version=2 >
        B7.3. ¿Otro servicio? ¿Cuál?
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

