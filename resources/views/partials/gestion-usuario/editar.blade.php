<x-penguin-ui.feedback.modal  title="Editar Usuario" wire:model="verModalEditar" :visible="$verModalEditar">
    <form wire:submit.prevent="update" class="mx-auto w-[400px] p-3">
        <x-penguin-ui.input.text wire:model="editarUsuario.nombre" label="Nombre" class="mb-4"/>

        <x-penguin-ui.input.text wire:model="editarUsuario.username" label="Usuario" class="mb-4"/>
        
        <x-penguin-ui.input.select wire:model="editarUsuario.rol" label="Rol">
            <option>Seleccionar</option>

            @foreach ($roles as $key => $value )
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach

        </x-penguin-ui.input.select>
        <div class="mt-10 flex justify-end">
            <x-penguin-ui.input.button type="submit" target="update">
                Editar Usuario
            </x-penguin-ui.input.button>
        </div>
    </form>
</x-penguin-ui.feedback.modal>
