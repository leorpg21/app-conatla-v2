<div>
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección A1. Información general del migrante, vulnerable y de acogida en la ciudad de Barranquilla
    </h3>
    
    <h4 class="mt-5 p-1 text-center font-semibold bg-zinc-300">
        Información del encuestado
    </h4>

    <div class="flex flex-wrap justify-between pt-5">
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="beneficiario.nombre" type="text" label="A1. Nombre del Encuestado"  />
        </div>
        <div class="w-[380px] ">
             <x-penguin-ui.input.select wire:model="documento.tipo_documento" label="A2. Tipo de documento" >
                 <option>Seleccionar</option>
                 @if (empty($documento->tipo_documento))
                     <option selected>No registra esta información</option>
                 @endif
                @foreach (config('form_selects.tipo_documento') as $tipo_documento )
                    <option value="{{ $tipo_documento['value'] }}">{{ $tipo_documento['nombre'] }}</option>
                    
                @endforeach
            </x-penguin-ui.input.select>
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="documento.numero_documento" type="text" label="A3. Numero de documento" />
        </div>
    </div>

    <div class="flex flex-wrap justify-between pt-5">
        <div class="w-[380px] ">
             <x-penguin-ui.input.select wire:model="beneficiario.genero" label="A4. Genero:" >
                 <option value="">Seleccionar</option>
                 @if (empty($documento->tipo_documento))
                     <option selected>No registra esta información</option>
                 @endif
                @foreach (config('form_selects.genero') as $genero )
                    <option value="{{ $genero['value'] }}">{{ $genero['nombre'] }}</option>
                    
                @endforeach
            </x-penguin-ui.input.select>
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text 
                wire:model="beneficiario.edad" 
                type="number" 
                label="A5. Edad:" 
                placeholder="{{ (empty($beneficiario->edad) ? 'No registra esta información' : '') }}" 
            />
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text 
                wire:model="beneficiario.numero_telefono" 
                type="text" 
                label="A6. Número de Teléfono / Celular:" 
                placeholder="{{ (empty($beneficiario->numero_telefono) ? 'No registra esta información' : '') }}"
                />
        </div>      
        
    </div>

    <div class="flex flex-wrap justify-between pt-5">
        <div class="w-[380px] ">
            <x-penguin-ui.input.text 
                wire:model="beneficiario.correo" 
                type="text" 
                label="A7. Correo electrónico:"  
                placeholder="{{ (empty($beneficiario->correo) ? 'No registra esta información' : '') }}"
            />
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.select wire:model="beneficiario.tipo_poblacion_vulnerable" label="A8. Tipo de Población Vulnerable (Principal):" >
                 <option value="">Seleccionar</option>
                @foreach (config('form_selects.tipo_poblacion') as $poblacion_vulnerable )
                    <option value="{{ $poblacion_vulnerable['value'] }}">{{ $poblacion_vulnerable['nombre'] }}</option>
                    
                @endforeach
            </x-penguin-ui.input.select>
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="beneficiario.otra_poblacion_vulnerable" type="text" label="A.9 Otra Cual?:" />
        </div>
        
    </div>

    <h4 class="mt-5 p-1 text-center font-semibold bg-zinc-300">
        Información general del la ubicación del encuestado
    </h4>

    <div class="flex flex-wrap justify-between pt-5">
        <div class="w-[380px] ">
             <x-penguin-ui.input.select wire:model="direccion.municipio" wire:change="actualizarMunicipios" label="A10. Municipio:" >
                 <option value="">Seleccionar</option>
                 
                @foreach ($listaMunicipios as $key => $municipio )
                    <option 
                        value="{{ $key }}"
                    > 
                    {{ $key }}
                    </option>
                    
                @endforeach
            </x-penguin-ui.input.select>
        </div>
        <div class="w-[380px] ">
             <x-penguin-ui.input.select wire:model="direccion.corregimiento" label="A11. Corregimiento:" >
                
                 <option value="">Seleccionar</option>
                @foreach ($listaCorregimientos as  $corregimiento )
                    <option 
                        value="{{ $corregimiento }}"
                    > 
                    {{ $corregimiento }}
                    </option>
                    
                @endforeach
            </x-penguin-ui.input.select>
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="direccion.barrio" type="text" label="A12. Barrio:" />
        </div>      
        
    </div>

    <div class="flex flex-wrap justify-between pt-5 items-end">
        

        <div class="w-[700px]">
            <x-penguin-ui.feedback.tooltip message="Carrera 25 # 9b - 17" position="right">
                <x-penguin-ui.input.text wire:model="direccion.direccion" type="text" label="A.13 Dirección de la vivienda:" placeholder="Carrera 25 # 9b - 17"/>
            </x-penguin-ui.feedback.tooltip>
        </div>
        

        <div class="w-[380px] ">
             <x-penguin-ui.input.select wire:model="beneficiario.pais_nacimiento"  label="A14. País de Nacimiento:" >
                 <option>Seleccionar</option>
                @foreach (config('form_selects.pais_nacimiento') as $pais_nacimiento  )
                    <option 
                        value="{{ $pais_nacimiento['value'] }}"
                    > 
                    {{ $pais_nacimiento['nombre'] }}
                    </option>
                    
                @endforeach
            </x-penguin-ui.input.select>
        </div>
    </div>
</div>