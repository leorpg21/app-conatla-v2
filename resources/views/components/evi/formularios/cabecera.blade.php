@props([
    'objetivo' => 'Verificar el grado de exactitud, confiabilidad y consistencia de la información con relación a población migrante, vulnerable y de acogida en la ciudad de Barranquilla respecto al acceso a los servicios sociales, de inclusión económica, y de género provista, coordinado o gestionado',
    'titulo' => 'F01-Formulario_RUMV',
    'version' => 4
    ]
)
<div class="w-full mx-auto ">
    <div class="flex justify-between ">
      <div class="dark:bg-accent-foreground rounded-lg p-1">
        <img src="{{ asset('assets/image/alcaldia-baq.svg') }}" class="h-12" alt="Logo Alcaldía">

      </div>
      <div class="dark:bg-accent-foreground rounded-lg p-1">
        <img src="{{ asset('assets/image/logo-conatla.png') }}" class="h-12" alt="Logo Conatla">
      </div>
    </div>

    <h1 class="text-center text-lg font-bold text-on-surface dark:text-on-surface-dark">FORMULARIO EVI MEDICIÓN INDICADORES SOCIALES</h1>

    <div class="mt-5 flex max-w-[500px] container mx-auto">
        <h2 class="w-7/10 p-1 bg-zinc-950 text-zinc-50 font-semibold">{{ $titulo }}</h2>
        <span class="w-3/10 py-1 text-center bg-yellow-300">Versión {{ $version }}</span>
    </div>
    
    <!-- Objetivo -->
    <div class="mt-5 bg-gray-50 p-3 rounded border border-outline text-on-surface dark:text-on-surface-dark">
      <p><span class="font-bold">Objetivo del Instrumento:</span> {{ $objetivo }}</p>
    </div>

</div>