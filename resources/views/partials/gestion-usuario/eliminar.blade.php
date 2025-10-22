<x-penguin-ui.feedback.modal  title="Eliminar Usuario" wire:model="verModalEliminar" :visible="$verModalEliminar">
    <form wire:submit.prevent="destroy" class="mx-auto w-[400px] p-3">
        <span>Estas seguro que deseas eliminar este usuario? </span>
        <div class="mt-10 flex justify-end">
            <x-penguin-ui.input.button type="submit" target="destroy" variant="danger">
                Eliminar Usuario
            </x-penguin-ui.input.button>
        </div>
    </form>
</x-penguin-ui.feedback.modal>
