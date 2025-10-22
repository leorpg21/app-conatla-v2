<div>
<x-slot name="breadcrumb" >
    <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
        Home
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item :href="route('violencia_genero.index')" wire:navigate>
        Formulario Ruta Productiva
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Ver Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>

    <x-evi.formularios.cabecera 
        titulo="F08- Formulario  Violencia Genero"
    />

    @include('partials.evi.formularios.ver-preguntas-beneficiario')

    {{-- Preguntas del formulario violencia_genero--}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B8. Acceso a los servicios de Violencia Basada en Genero (VBG)
    </h3>
    
    {{-- Pregunta b8.1 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b8_1">
        B8.1. ¿La Oficina de la Mujer (OFM) le ofreció ayuda legal o le orientó sobre sus derechos?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b8.2 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b8_2">
        B8.2. ¿Recibió acompañamiento o apoyo emocional en la Oficina de la Mujer (OFM)?
    </x-evi.formularios.ver-pregunta>
    
    {{-- Pregunta b8.3 --}}
    <x-evi.formularios.ver-pregunta wire:model="pregunta_b8_3">
        B8.3.¿Le explicaron en la Oficina de la Mujer (OFM) sus derechos como mujer y cómo protegerlos?
    </x-evi.formularios.ver-pregunta>

    {{-- Pregunta b8.4 --}}
    <x-evi.formularios.ver-pregunta wire:model="otro_servicio" version=2 >
        B8.4. ¿Otro servicio? ¿Cuál?
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
