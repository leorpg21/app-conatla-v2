@if(auth()->user()->can('editar_infraestructura'))
<form wire:submit.prevent="editarInfraestructura">
@endif

<div class="my-6 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark mb-15">
    <table class="w-full table-fixed min-w-[1100px] text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead class="text-xs border-b border-outline bg-surface-alt text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
            <tr>
                <th scope="col" class="p-4 w-[30px]">#</th>
                <th scope="col" class="p-4 w-[280]">
                    Adecuación de la infraestructura, equipamiento y puesta en marcha del nuevo Centro de Integración para Migrantes en la ciudad de Barranquilla
                </th>
                <th scope="col" class="p-4 w-[100px]">
                    Cantidad Reportada
                </th>
                <th scope="col" class="p-4 w-[100px]">
                    Unidad de Medida
                </th>
                <th scope="col" class="p-4 w-[120px]">
                    Cantidad Verificada
                </th>
               
                <th scope="col" class="p-4 w-[120px]">
                    Estado
                </th>
                <th scope="col" class="p-4 w-[200px]">
                    Observación
                </th>
                
            </tr>
        </thead>
        <tbody class="divide-y divide-outline dark:divide-outline-dark text-xs">
            @foreach ($lc_infraestructura as $infraestructura)
            <tr>
                <td class="p-4 truncate">{{$infraestructura->id}}</td>
                <td class="p-4 truncate">{{$infraestructura->adecuacion_infraestructura}}</td>
                <td class="p-4 truncate">{{$infraestructura->cantidad_reportada}}</td>
                <td class="p-4 truncate">
                    {{$infraestructura->unidad_medida}}
                </td>
                @if(auth()->user()->can('editar_infraestructura'))
                <td class="p-4  truncate">
                    <x-penguin-ui.input.text type="number" wire:model="editar_infraestructura.cantidad_verificada.{{ $infraestructura->id }}" class="min-w-[100px]"/>
                </td>
                <td class="p-4  truncate">
                    <x-penguin-ui.input.select wire:model="editar_infraestructura.estado.{{ $infraestructura->id }}" class="min-w-[100px]">
                        <option>Selecionar</option>
                        @foreach (config('form_selects.estado_lc') as $value)
                            <option value="{{ $value['value'] }}">{{ $value['nombre'] }}</option>

                        @endforeach
                    </x-penguin-ui.input.select>
                </td>
                <td class="p-4  truncate">
                    <x-penguin-ui.input.text  wire:model="editar_infraestructura.observacion.{{ $infraestructura->id }}" class="min-w-[180px]"/>
                </td>
                @else
                <td class="p-4 w-[150px] truncate">{{$infraestructura->cantidad_verificada}}</td>
                <td class="p-4 w-[150px] truncate">{{$infraestructura->estado}}</td>
                <td class="p-4 w-[200px] truncate">{{$infraestructura->observacion}}</td>
                @endif
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@if(auth()->user()->can('editar_infraestructura'))

<div class="fixed bottom-0 right-0 m-4">
    <x-penguin-ui.input.button type="submit" variant="primary" target="editarInfraestructura" class="mt-5" >Actualizar información</x-penguin-ui.input.button>
</div>
</form>
@endif