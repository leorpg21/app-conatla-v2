<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.default.head')  
    </head>
    <body class="h-screen flex">
        <!-- Lado Izquierdo (oculto en pantallas pequeñas) -->
        
        <div class="hidden lg:flex w-1/2 relative text-white flex-col justify-between p-10"
            style="background-image: url('{{ asset('assets/image/bg/bg-informe.jpg') }}'); background-size: cover; background-position: center;">
            
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/50"></div>

            <!-- Contenido -->
            <div class="relative z-10 flex items-center gap-3">
                <x-app-logo-icon class="size-8 fill-current text-white" />
                <h1 class="text-2xl font-semibold">Conatla App</h1>
            </div>
        </div>

        <!-- Lado Derecho -->
        <div class="flex w-full lg:w-1/2 items-center justify-center bg-white">
            {{ $slot }}
        </div>

    @livewireScripts
    </body>
</html>
