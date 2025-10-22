<div>
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección A1. Información general del migrante, vulnerable y de acogida en la ciudad de Barranquilla
    </h3>
    
    <h4 class="mt-5 p-1 text-center font-semibold bg-zinc-300">
        Información del encuestado
    </h4>

    <div class="flex flex-wrap justify-between pt-5">
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="nombre" type="text" label="A1. Nombre del Encuestado"  readonly />
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="tipo_documento" type="text" label="A2. Tipo de documento"  readonly />
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="numero_documento" type="text" label="A3. Numero de documento"  readonly />
        </div>
    </div>

    <div class="flex flex-wrap justify-between pt-5">
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="genero" type="text" label="A4. Genero:"  readonly />
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="edad" type="text" label="A5. Edad:"  readonly />
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="numero_telefono" type="text" label="A6. Número de Teléfono / Celular:"  readonly />
        </div>
    </div>


    <div class="flex flex-wrap justify-between pt-5">
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="correo" type="text" label="A7. Correo electrónico:"  readonly />
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="tipo_poblacion_vulnerable" type="text" label="A8. Tipo de Población Vulnerable (Principal):"  readonly />
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="otra_poblacion_vulnerable" type="text" label="A.9 Otra Cual?:"  readonly />
        </div>
    </div>

    <h4 class="mt-5 p-1 text-center font-semibold bg-zinc-300">
        Información general del la ubicación del encuestado
    </h4>

    <div class="flex flex-wrap justify-between pt-5">
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="municipio" type="text" label="A10. Municipio:"  readonly />
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="corregimiento" type="text" label="A11. Corregimiento:"  readonly />
        </div>
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="barrio" type="text" label="A12. Barrio:"  readonly />
        </div>
    </div>
    
    <div class="flex flex-wrap justify-between pt-5 items-end">
        <div class="w-[700px]">
            <x-penguin-ui.feedback.tooltip message="Carrera 25 # 9b - 17" position="right">
                <x-penguin-ui.input.text wire:model="direccion" type="text" label="A.13 Dirección de la vivienda:" readonly/>
            </x-penguin-ui.feedback.tooltip>
        </div>
        
        <div class="w-[380px] ">
            <x-penguin-ui.input.text wire:model="pais_nacimiento" type="text" label="A14. País de Nacimiento:"  readonly />
        </div>
    </div>

</div>