<div>
<x-slot name="breadcrumb" >
    <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
        Home
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item :href="route('ruta_productiva.index')" wire:navigate>
        Formulario Ruta Productiva
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Ver Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

    <x-evi.formularios.cabecera 
        titulo="F05-Formulario_Ruta_productiva"
    />

    @include('partials.evi.formularios.ver-preguntas-beneficiario')

    {{-- Preguntas del formulario Rumv--}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B5. Acceso a inclusión socioeconómica - Ruta de desarrollo productivo
    </h3>
    
    {{-- Pregunta b5.1 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b5_1">
        B5.1. ¿El Centro de Oportunidades o Centro Intégrate anotó o registró su idea de negocio para apoyarlo?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b5.2 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b5_2">
        B5.2. ¿El Centro de Oportunidades o Centro Intégrate le ayudó a conectar su negocio con otras entidades o a participar en eventos?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b5.3 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b5_3">
        B5.3.Su Idea/negocio, ha recibido acompañamiento o seguimiento en temas financieros a través del Centro de Oportunidades?
    </x-evi.formularios.ver-pregunta>
    
    {{-- Pregunta b5.4 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b5_4">
        B5.4. Su idea o negocio, ha recibido acompañamiento o seguimiento en temas financieros a través del Centro de Oportunidades?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b5.5 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b5_5">
        B5.5. Su idea o negocio, ha recibido acompañamiento o seguimiento en otros temas a través del Centro de Oportunidades?
    </x-evi.formularios.ver-pregunta>
    
    {{-- Pregunta b5.6 --}}
    <x-evi.formularios.ver-pregunta wire:model="otro_servicio" version=2 >
        B5.6. ¿Otro servicio? ¿Cuál?
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
