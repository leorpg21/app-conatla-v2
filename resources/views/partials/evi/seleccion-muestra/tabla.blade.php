<div class="mt-5 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
    <div class="sticky left-0 flex p-2 border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
        <x-penguin-ui.input.select wire:model.live="per_page" class="max-w-[72px] hover:cursor-pointer">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="50">50</option>
        </x-penguin-ui.input.select>

        <x-penguin-ui.input.select wire:model.live="selectedFormulario" class="ml-3 max-w-[135px] hover:cursor-pointer">
            @foreach (config('form_selects.formularios') as $forms )
                <option value="{{ $forms['value'] }}">{{ $forms['nombre'] }}</option>
                
            @endforeach
            
        </x-penguin-ui.input.select>
        
        <x-penguin-ui.input.text wire:model.live="search" class="ml-3 hover:cursor-pointer" kbd="⌘K" icon="search" placeholder="Buscar Beneficiarios..."/>
        <x-penguin-ui.input.button wire:click="clear" icon="eraser" class="ml-3 hover:cursor-pointer" variant="alternate"></x-penguin-ui.input.button>

    </div>
    <table class="w-full table-fixed min-w-[1100px] text-left text-sm text-on-surface dark:text-on-surface-dark">
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
                <th scope="col" class="p-4 w-[180px]">
                    <button class="w-full flex items-center gap-x-2 justify-between hover:cursor-pointer" wire:click="sortable('numero_telefono')">
                        <span class="truncate">N° Teléfono del tutor</span>
                        <x-dynamic-component :component="'lucide-'.($campo === 'numero_telefono' ? $icon  : 'circle')" class="text-green-600 size-4"/>
                    </button>
                </th>
                <th scope="col" class="p-4 w-[180px] ">
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
               
                <th scope="col" class="p-4 w-[180px] text-center">
                    {{-- <button class="w-full flex items-center gap-x-2 justify-between hover:cursor-pointer" wire:click="sortable('seleccionado_muestra')">
                        <span class="truncate">Acción</span>
                        <x-dynamic-component :component="'lucide-'.($campo === 'seleccionado_muestra' ? $icon  : 'circle')" class="text-green-600 size-4"/>
                    </button> --}}
                    <button class="w-full flex items-center gap-x-2 justify-between">
                        <span class="truncate">Acción</span>
                    </button>
                </th>
                
            </tr>
        </thead>

        <tbody class="divide-y divide-outline dark:divide-outline-dark">
            @forelse ($formularios as $formulario )
            <tr class="even:bg-primary/5 dark:even:bg-primary-dark/10 text-xs">
                <td class="p-4 truncate">{{ $formulario->id }}</td>
                <td class="p-4 truncate">{{ $formulario->beneficiario->nombre }}</td>
                <td class="p-4 truncate">{{ $formulario->beneficiario->numero_telefono }}</td>
                <td class="p-4 truncate">{{ $formulario->beneficiario->correo }}</td>
                <td class="p-4 truncate">{{ $formulario->beneficiario->tipo_servicio_prestado }}</td>
                <td class="p-4 truncate">
                    @if($formulario->seleccionado_muestra == 'si')
                        <form wire:submit.prevent="quitarMuestra({{ $formulario->id }})">
                            <x-penguin-ui.input.button variant="danger" type="submit" target="quitarMuestra({{ $formulario->id }})"> 
                                Quitar Muestra
                            </x-penguin-ui.input.button>
                        </form>
                        
                    @endif

                    @if($formulario->seleccionado_muestra == 'no')
                        <form wire:submit.prevent="subirMuestra({{ $formulario->id }})">
                            <x-penguin-ui.input.button type="submit" target="subirMuestra({{ $formulario->id }})"> 
                                Subir Mustra
                            </x-penguin-ui.input.button>
                            
                        </form>
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
    <div class="p-2 border-t border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
        {{ $formularios->links() }}
    </div>
</div>

