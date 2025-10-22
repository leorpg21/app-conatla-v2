<x-penguin-ui.input.button wire:click="$set('verModalCrear', true)" icon="user-plus">
    Crear Usuario
</x-penguin-ui.input.button>


<x-penguin-ui.feedback.modal  title="Crear Usuarios" wire:model="verModalCrear" :visible="$verModalCrear">
    <form wire:submit.prevent="save" class="mx-auto w-[400px] p-3">
        <x-penguin-ui.input.text wire:model="crearUsuario.nombre" label="Nombre" class="mb-4"/>

        <x-penguin-ui.input.text wire:model="crearUsuario.username" label="Usuario" class="mb-4"/>

        <x-penguin-ui.input.text wire:model="crearUsuario.password" type="password" label="Contraseña" class="mb-4" />
        
        <x-penguin-ui.input.select wire:model="crearUsuario.rol" label="Rol">
            <option>Seleccionar</option>

            @foreach ($roles as $key => $value )
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach

        </x-penguin-ui.input.select>
        <div class="mt-10 flex justify-end">
            <x-penguin-ui.input.button type="submit" target="save">
                Crear Usuario
            </x-penguin-ui.input.button>
        </div>
    </form>
</x-penguin-ui.feedback.modal>




