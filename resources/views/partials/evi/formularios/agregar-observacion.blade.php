<x-penguin-ui.feedback.modal  title="Agregar Observación" wire:model="verModalAgregarObservacion" :visible="$verModalAgregarObservacion">
    
    <form wire:submit.prevent="updateObservacion" class="mx-auto w-[400px] p-3">    
        
        <div>
            
            <x-penguin-ui.input.textarea 
                wire:model="agregar_observacion.observacion"
                placeholder="Escribe en este campo una observación.."
                
            />
        </div>
       
        <div class="mt-10 flex justify-end">
            <x-penguin-ui.input.button type="submit" target="updateObservacion">
                Guardar Observacion
            </x-penguin-ui.input.button>
        </div>
    </form>
</x-penguin-ui.feedback.modal>