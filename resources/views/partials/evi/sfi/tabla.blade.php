@php
$texto = $cabecera_tabla ?? 'Indicador 6: Migrantes que son asistidos en el pre-registro y registro biométrico a través del sistema de Registro Único de Migrantes Venezolanos (RUMV) en Barranquilla';
@endphp

@if(auth()->user()->can('editar_indicador'))
<form wire:submit.prevent="editarIndicador">
@endif

<div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark mb-15">
    <div class="sticky left-0 w-full px-2 py-4 text-on-surface-dark bg-blue-950 text-xs font-semibold">
        <p>
            {{ $texto }}
        </p>
    </div>
    <table class="w-full table-fixed min-w-[1100px] text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead class="text-xs border-b border-outline bg-surface-alt text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
            <tr>
                <th scope="col" class="p-4 w-[150px]">Fecha Pago</th>
                <th scope="col" class="p-4 w-[150px]">Egreso</th>
                <th scope="col" class="p-4 w-[100px]">TRM</th>
                <th scope="col" class="p-4 w-[700px]">Proyecto</th>
                <th scope="col" class="p-4 w-[180px]">Valor Egreso</th>
                <th scope="col" class="p-4 w-[120px]">USD</th>
                <th scope="col" class="p-4 w-[150px]">Contrato</th>
                <th scope="col" class="p-4 w-[150px]">CDP</th>
                <th scope="col" class="p-4 w-[120px]">RP</th>
                <th scope="col" class="p-4 w-[200px]">Link de anexos</th>
                <th scope="col" class="p-4 w-[150px]">Verificado</th>
                <th scope="col" class="p-4 w-[200px]">Observación</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline dark:divide-outline-dark text-xs">
            @foreach ($soporte_finaciero as $sf)
            <tr>
                <td class="p-4 truncate">{{$sf->fecha_pago}}</td>
                <td class="p-4 truncate">{{$sf->egreso}}</td>
                <td class="p-4 truncate">{{$sf->trm}}</td>
                <td class="p-4 truncate">
                    {{$sf->proyecto}}
                </td>
                <td class="p-4 truncate">{{$sf->valor_egreso}}</td>
                <td class="p-4 truncate">{{$sf->usd}}</td>
                <td class="p-4 truncate">{{$sf->contrato}}</td>
                <td class="p-4 truncate">{{$sf->cdp}}</td>
                <td class="p-4 truncate">{{$sf->rp}}</td>
                <td class="p-4 truncate">
                    <a href="{{ $sf->link_anexo }}" target="_bank" class="text-green-600">
                        {{$sf->link_anexo}}
                    </a>
                </td>
                @if(auth()->user()->can('editar_indicador'))
                <td class="p-4 w-[150px] truncate">
                    <x-penguin-ui.input.select wire:model="editar_indicador.verificado.{{ $sf->id }}" class="min-w-[120px]">
                        <option>Selecionar</option>
                        @foreach (config('form_selects.respusetas_si_no') as $value)
                            <option value="{{ $value['value'] }}">{{ $value['nombre'] }}</option>

                        @endforeach
                    </x-penguin-ui.input.select>
                </td>
                <td class="p-4 w-[200px] truncate">
                    <x-penguin-ui.input.text  wire:model="editar_indicador.observacion.{{ $sf->id }}" class="min-w-[200px]"/>
                </td>
                @else
                
                <td class="p-4 w-[150px] truncate">{{$sf->verificado}}</td>
                <td class="p-4 w-[200px] truncate">{{$sf->observacion}}</td>
                @endif
            </tr>
            @endforeach
            <tr class="text-black font-bold text-md">
                <td colspan="2" class="p-4 truncate">Subtotal</td>
                <td colspan="2" class="p-4 truncate"></td>
                <td class="p-4 truncate">{{ $total_egreso }}</td>
                <td class="p-4 truncate">{{ $total_usd }}</td>
                <td colspan="6" class="p-4 truncate"></td>
            </tr>
        </tbody>
    </table>
</div>
@if(auth()->user()->can('editar_indicador'))

<div class="fixed bottom-0 right-0 m-4">
    <x-penguin-ui.input.button type="submit" variant="primary" target="editarIndicador" class="mt-5" >Actualizar información</x-penguin-ui.input.button>
</div>
</form>
@endif