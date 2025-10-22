<x-penguin-ui.feedback.modal  title="Actualizar Contraseña" wire:model="verModalPassword" :visible="$verModalPassword">
    
    <form wire:submit.prevent="updatePassword" class="mx-auto w-[400px] p-3">    
        <x-penguin-ui.input.text wire:model="actualizarPassword.password" type="password" label="Contraseña" class="mb-4" />
        
        <x-penguin-ui.input.text wire:model="actualizarPassword.password_confirmation" type="password" label="Contraseña" class="mb-4" />
       
        <div class="mt-10 flex justify-end">
            <x-penguin-ui.input.button type="submit" target="updatePassword">
                Actualizar
            </x-penguin-ui.input.button>
        </div>
    </form>
</x-penguin-ui.feedback.modal>