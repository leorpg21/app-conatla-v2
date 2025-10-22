<div>
    @if ($successMessage)
        @foreach($successMessage as $msg)
            <x-penguin-ui.feedback.notification.success :message="$msg" />
        @endforeach
    @endif

    @if ($errorMessage)
        @foreach($errorMessage as $msg)
            <x-penguin-ui.feedback.notification.error  :message="$msg" />
        @endforeach
    @endif
    <x-slot name="breadcrumb">  
        <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
            Home
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Indicador Seis
        </x-penguin-ui.navigation.breadcrumb-item>  
    </x-slot>
    @include('partials.evi.sfi.cabecera')

    <div class="my-5 flex">
        @can('cargar_indicador')
            @include('partials.evi.sfi.cargar-info')
            <a href="{{ asset('assets/document/iseis.xlsx') }}" class="ml-3 ">
                <x-penguin-ui.input.button variant="warning" icon="file-down">Descargar Documento de Prueba</x-penguin-ui.input.button>

            </a>
        @endcan
    </div>

    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección F. Informe de gastos Asociados
    </h3>

    <div class="my-2 flex justify-center">
        <div class="bg-green-500 text-white py-1 px-8 border-r border-white">Proyectado</div>
        <div class="bg-green-500 text-white py-1 px-8 border-r border-white">{{ $proyectado }}</div>
        <div class="bg-yellow-300 text-white py-1 px-8">{{ $porcentaje_proyectado }}%</div>
    </div>
    
    @include('partials.evi.sfi.tabla')

</div>
