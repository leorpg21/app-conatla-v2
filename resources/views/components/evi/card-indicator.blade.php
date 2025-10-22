@props([
    'muestra'     => 0,
    'estrato'     => 0,
    'encuestado'  => 0,
    'gestionado'  => 0,
    'sin_revisar' => 0,
])
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 my-3">

  <!-- Card 1 (dividida con dos infos) -->
  <div class=" rounded-xl border border-outline bg-surface-alt p-5 flex flex-col justify-between">
      <div class="flex items-center gap-4">
        <div class="bg-blue-500 p-3 rounded-xl">
            <x-lucide-clipboard-list class="w-6 h-6 text-white"  />
        
        </div>
          
        <div>
            <span>T. Muestra</span>
            <h3 class="mt-2 tabular-nums text-xl">{{ $muestra }}</h3>
        </div>
        <flux:separator vertical />        
        <div>
            <span>T. Estrato</span>
            <h3 class="mt-2 tabular-nums text-xl">{{ $estrato }}</h3>

        </div>

    </div>
  </div>

  <!-- Card 2 -->
  <div class=" rounded-xl border border-outline bg-surface-alt p-5 flex flex-col justify-between">
      <div class="flex items-center gap-4">
        <div class="bg-green-500 p-3 rounded-xl">
            <x-lucide-book-check class="w-6 h-6 text-white"  />
        
        </div>
          
        <div>
            <span>Encuestado</span>
            <h3 class="mt-2 tabular-nums text-xl">{{ $encuestado }}</h3>
        </div>

    </div>
  </div>

  <!-- Card 3 -->
  <div class=" rounded-xl border border-outline bg-surface-alt p-5 flex flex-col justify-between">
      <div class="flex items-center gap-4">
        <div class="bg-yellow-500 p-3 rounded-xl">
            <x-lucide-file-warning class="w-6 h-6 text-white"  />
        
        </div>
          
        <div>
            <span>Gestionado</span>
            <h3 class="mt-2 tabular-nums text-xl"> {{ $gestionado }} </h3>
        </div>

    </div>
  </div>

  <!-- Card 4 -->
  <div class=" rounded-xl border border-outline bg-surface-alt p-5 flex flex-col justify-between">
      <div class="flex items-center gap-4">
        <div class="bg-red-500 p-3 rounded-xl">
            <x-lucide-x class="w-6 h-6 text-white"  />
        
        </div>
          
        <div>
            <span>Encuestado</span>
            <h3 class="mt-2 tabular-nums text-xl"> {{ $sin_revisar }} </h3>
        </div>

    </div>
  </div>
</div>
