<x-slot name="breadcrumb">  
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Home
    </x-penguin-ui.navigation.breadcrumb-item> 
</x-slot>
<div class="flex flex-col-reverse lg:flex-row items-center justify-between max-w-7xl mx-auto px-6 py-12 gap-10">
    
    <!-- Texto -->
    <div class="max-w-lg text-center lg:text-left">
        
        <h1 class="text-3xl md:text-4xl font-bold text-on-surface-strong dark:text-on-surface-dark-strong mt-4">
        Bienvenido a la App Web
        </h1>
        <h2 class="text-2xl md:text-3xl font-semibold text-green-600 mt-2">
        Verificación de Indicadores Sociales
        </h2>
        <button class="mt-6 bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-800 transition">
        Ver Contenido
        </button>
       
    </div>

    <!-- Imagen -->
    <div class="w-full lg:w-1/2 flex justify-center">
        <img src="{{ asset('assets/image/data-reports.svg') }}" alt="Ilustración" class="w-full max-w-md h-auto">
    </div>
</div>