<x-penguin-ui.feedback.modal  title="Asignar Forulario" wire:model="abrirModalPermisos" :visible="$abrirModalPermisos">
    
    <form wire:submit.prevent="update" class="mx-auto w-[400px] p-3">    
        
        <div>
            @foreach ($formularios as $formulario)
                <x-penguin-ui.input.checkbox 
                    label="{{ $formulario['nombre'] }}"
                    value="{{ $formulario['value'] }}"
                    wire:model="actualizarFormularios.formularios"
                />
                
            @endforeach

        </div>
       
        <div class="mt-10 flex justify-end">
            <x-penguin-ui.input.button type="submit" target="update">
                Asignar
            </x-penguin-ui.input.button>
        </div>
    </form>
</x-penguin-ui.feedback.modal>