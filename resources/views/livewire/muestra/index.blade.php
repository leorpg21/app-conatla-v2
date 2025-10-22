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
    
    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">  
        <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
            Home
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Selección para la muestra
        </x-penguin-ui.navigation.breadcrumb-item>  
    </x-slot>

    {{-- Titulo --}}
    <h2 class="mt-3 text-2xl text-green-800 font-bold">Selección Para La Muestra</h2>
    
    {{-- <div class="w-full mx-auto  py-6 grid gap-6 sm:grid-cols-1 md:grid-cols-3">
        <!-- Tarjeta 1 -->
        <div class="bg-green-800 rounded-lg shadow p-6 flex flex-col">
            <h2 class="text-xl text-white font-semibold mb-4 truncate">Gestor Uno</h2>
            <p class="text-gray-300 truncate text-sm">F1-FORMULARIO RUMV <span class="text-white font-semibold">52</span> MUESTRAS</p>
            <p class="text-gray-300 truncate text-sm">F1-FORMULARIO SALUD <span class="text-white font-semibold">30</span> MUESTRAS</p>
            <p class="text-gray-300 truncate text-sm">F1-FORMULARIO Educación <span class="text-white font-semibold">12</span> MUESTRAS</p>
        </div>

        <!-- Tarjeta 1 -->
        <div class="bg-green-800 rounded-lg shadow p-6 flex flex-col">
            <h2 class="text-xl text-white font-semibold mb-4 truncate">Gestor Uno</h2>
            <p class="text-gray-300 truncate text-sm">F1-FORMULARIO RUMV <span class="text-white font-semibold">52</span> MUESTRAS</p>
            <p class="text-gray-300 truncate text-sm">F1-FORMULARIO SALUD <span class="text-white font-semibold">30</span> MUESTRAS</p>
            <p class="text-gray-300 truncate text-sm">F1-FORMULARIO Educación <span class="text-white font-semibold">12</span> MUESTRAS</p>
        </div>

        <!-- Tarjeta 1 -->
        <div class="bg-green-800 rounded-lg shadow p-6 flex flex-col">
            <h2 class="text-xl text-white font-semibold mb-4 truncate">Gestor Uno</h2>
            <p class="text-gray-300 truncate text-sm">F1-FORMULARIO RUMV <span class="text-white font-semibold">52</span> MUESTRAS</p>
            <p class="text-gray-300 truncate text-sm">F1-FORMULARIO SALUD <span class="text-white font-semibold">30</span> MUESTRAS</p>
            <p class="text-gray-300 truncate text-sm">F1-FORMULARIO Educación <span class="text-white font-semibold">12</span> MUESTRAS</p>
        </div>

       

        
    </div> --}}

  

    @include('partials.evi.seleccion-muestra.tabla')
    
</div>
