<div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
    <div class="sticky left-0 flex p-2 border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
        <x-penguin-ui.input.select wire:model.live="per_page" class="max-w-[72px]">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="50">50</option>
        </x-penguin-ui.input.select>
        
        <x-penguin-ui.input.text wire:model.live="search" class="ml-3 " kbd="⌘K" icon="search" placeholder="Buscar Beneficiarios..."/>
        <x-penguin-ui.input.button wire:click="clear" icon="eraser" class="ml-3 hover:cursor-pointer" variant="alternate"></x-penguin-ui.input.button>

    </div>
    <table class=" w-full table-fixed min-w-[1100px] text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
            <tr>
                <th scope="col" class="p-4 w-[80px]">
                    <button class="w-full flex items-center gap-x-2 justify-between hover:cursor-pointer" wire:click="sortable('id')">
                        <span class="truncate">Indice</span>
                        <x-dynamic-component :component="'lucide-'.($campo === 'id' ? $icon  : 'circle')" class="text-green-600 size-4"/>
                    </button>
                </th>
                <th scope="col" class="p-4 w-[220px]">
                    <button class="w-full flex items-center gap-x-2 justify-between hover:cursor-pointer" wire:click="sortable('nombre')">
                        <span class="truncate">Nombre del beneficiario</span>
                        <x-dynamic-component :component="'lucide-'.($campo === 'nombre' ? $icon  : 'circle')" class="text-green-600 size-4"/>
                    </button>
                </th>
                <th scope="col" class="p-4 w-[160px]">
                    <button class="w-full flex items-center gap-x-2 justify-between hover:cursor-pointer" wire:click="sortable('numero_telefono')">
                        <span class="truncate">N° Teléfono del tutor</span>
                        <x-dynamic-component :component="'lucide-'.($campo === 'numero_telefono' ? $icon  : 'circle')" class="text-green-600 size-4"/>
                    </button>
                </th>
                <th scope="col" class="p-4 w-[180px]">
                    <button class="w-full flex items-center gap-x-2 justify-between hover:cursor-pointer" wire:click="sortable('correo')">
                        <span class="truncate">Correo</span>
                        <x-dynamic-component :component="'lucide-'.($campo === 'correo' ? $icon  : 'circle')" class="text-green-600 size-4"/>
                    </button>
                </th>
                <th scope="col" class="p-4 w-[240px]">
                    <button class="w-full flex items-center gap-x-2 justify-between hover:cursor-pointer" wire:click="sortable('tipo_servicio_prestado')">
                        <span class="truncate">Servicio Prestado</span>
                        <x-dynamic-component :component="'lucide-'.($campo === 'tipo_servicio_prestado' ? $icon  : 'circle')" class="text-green-600 size-4"/>
                    </button> 
                </th>
                <th scope="col" class="p-4 w-[120px]">
                    <button class="flex items-center gap-x-2" wire:click="sortable('estado')">
                        <span class="truncate">Estado</span>
                        <x-dynamic-component  :component="'lucide-'.($campo === 'estado' ? $icon  : 'circle')" class="text-green-600 size-4" />
                    </button>
                </th>
                <th scope="col" class="p-4 w-[140px] text-center">Acciones</th>
                <th scope="col" class="p-4 w-[120px] text-center">Observación</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-outline dark:divide-outline-dark">
            @forelse ($beneficiarios as $bnf )
            <tr class="even:bg-primary/5 dark:even:bg-primary-dark/10 text-xs">
                <td class="p-4 truncate">{{ $bnf->id }}</td>
                <td class="p-4 truncate">{{ $bnf->beneficiario->nombre }}</td>
                <td class="p-4 ">{{ $bnf->beneficiario->numero_telefono }}</td>
                <td class="p-4 truncate">{{ $bnf->beneficiario->correo }}</td>
                <td class="p-4 truncate">{{ $bnf->beneficiario->tipo_servicio_prestado }}</td>
                <td class="p-4">
                    @if ($bnf->estado == 'encuestado')
                        <x-penguin-ui.display.badge variant="success">{{ $bnf->estado }}</x-penguin-ui.display.badge>
                    @elseif ($bnf->estado == 'gestionado')
                        <x-penguin-ui.display.badge variant="warning">{{ $bnf->estado }}</x-penguin-ui.display.badge>
                    @elseif ($bnf->estado == 'sin revisar')
                        <x-penguin-ui.display.badge variant="danger">{{ $bnf->estado }}</x-penguin-ui.display.badge>
                    @endif
                </td>
                <td class="p-4 flex justify-between">
                    @if ($bnf->estado == 'encuestado')
                    <x-penguin-ui.feedback.tooltip position="bottom" message="Ver Encuesta" >
                     
                        <a href="{{ route($route_ver_encuesta, $bnf->id) }}" wire:navigate>
                            <x-penguin-ui.input.button icon="eye" variant="secondary"/>
                            
                        </a>
                    </x-penguin-ui.feedback.tooltip>
                    <a href="{{ route($route_encuesta, $bnf->id) }}" wire:navigate class="mr-2">
                        <x-penguin-ui.feedback.tooltip position="bottom" message="Editar Encuesta">
                            <x-penguin-ui.input.button icon="notebook-pen"></x-penguin-ui.input.button>
                        </x-penguin-ui.feedback.tooltip>
                    </a>
                    @else
                    <a href="{{ route($route_encuesta, $bnf->id) }}" wire:navigate class="mr-2">
                        <x-penguin-ui.feedback.tooltip position="bottom" message="Realizar Encuesta">
                            <x-penguin-ui.input.button icon="book-check"></x-penguin-ui.input.button>
                        </x-penguin-ui.feedback.tooltip>
                    </a>
                    <x-penguin-ui.feedback.tooltip position="bottom" message="Realizar Observación">
                        <x-penguin-ui.input.button 
                            wire:click="agregarObservacion({{ $bnf->id }})" 
                            icon="file-warning" 
                            variant="warning"
                            class="cursor-pointer"
                        />
                    </x-penguin-ui.feedback.tooltip>
                    @endif
                    
                </td>
                <td class="p-4 text-center truncate">
                    @if ($bnf->observacion)
                        @include('partials.evi.formularios.ver-observacion')
                    @endif
                </td>
            </tr>
                
            @empty
            <tr>
                <td colspan="8" class="text-center p-2"> No se encontraron registro </td>
            </tr>
            @endforelse   
        </tbody>
    </table>
    <div class="sticky left-0 p-2 border-t border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
        {{ $beneficiarios->links() }}
    </div>
</div>

