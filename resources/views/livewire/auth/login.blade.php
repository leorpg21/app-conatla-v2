<div class="max-w-md w-full px-8">
    <h2 class="text-2xl font-semibold text-center mb-2">Inicie sesión en su cuenta</h2>
    <p class="text-center text-gray-500 mb-6">
        Ingrese su correo electrónico y contraseña para continuar
    </p>

    <form wire:submit.prevent="login" class="space-y-5">
        <x-penguin-ui.input.text placeholder="Usuario" label="Usuario" wire:model="username" class="my-3"/>
        
        <x-penguin-ui.input.text type="password" placeholder="Contraseña" label="Contraseña" wire:model="password" class="mb-3"/>

        <x-penguin-ui.input.button type="submit" target="login" class="mt-3 w-full text-center">
            Iniciar sesión
        </x-penguin-ui.input.button>
    </form>
</div> 