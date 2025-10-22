<div>
    @if ($successMessage)
        @foreach($successMessage as $msg)
            <x-penguin-ui.feedback.notification.success :message="$msg" />
        @endforeach
    @endif

    @if ($errorMessage)
        @foreach($errorMessage as $msg)
            <x-penguin-ui.feedback.notification.success  :message="$msg" />
        @endforeach
    @endif
    
    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb" >
        <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
            Home
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Gestionar Usuario
        </x-penguin-ui.navigation.breadcrumb-item>
    </x-slot>

    <h2 class="mt-3 text-2xl text-green-800 font-bold">Gestionar Usuario</h2>

    <div class="mt-8 flex">
        <div class="relative flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-on-surface/50 dark:text-on-surface-dark/50"> 
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input wire:model.live="search" class="w-full rounded-radius border border-outline bg-surface-alt py-2 pl-10 pr-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"  placeholder="Buscar Usuario" />
        </div>
        <div class="ml-3">
            @include('partials.gestion-usuario.crear')
        </div>
    </div>


    <div class="mt-2 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
        <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
            <thead class="border-b border-outline bg-surface-alt text-sm text-green-600 dark:border-outline-dark dark:bg-surface-dark-alt ">
                <tr>
                    <th scope="col" class="p-4">Nombre</th>
                    <th scope="col" class="p-4">Usuario</th>
                    <th scope="col" class="p-4">Rol</th>
                    <th scope="col" class="p-4 text-center"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline dark:divide-outline-dark">
                @foreach ($usuarios as $usuario )
                    <tr class="even:bg-primary/5 dark:even:bg-primary-dark/10">
                        <td class="p-4">
                            {{ $usuario->name }}
                        </td>
                        <td class="p-4">
                            {{ $usuario->username }}
                        </td>
                        <td class="p-4">
                            <x-penguin-ui.display.badge>
                                {{ $usuario->getRoleNames()->first() }}
                            </x-penguin-ui.display.badge>
                        </td>
                        <td class="p-4 flex justify-end">
                            {{-- Acción Editar Usuario --}}
                            <x-penguin-ui.input.button 
                                wire:click="edit({{ $usuario->id }})"
                                icon="user-round-pen"
                            >
                                Editar
                            </x-penguin-ui.input.button>

                            {{-- Acción Cambiar Contraseña --}}
                            <x-penguin-ui.input.button 
                                wire:click="editPassword({{ $usuario->id }})"
                                icon="key-round"
                                class="ml-3"
                                variant="secondary"
                            >
                                Actualizar Contraseña
                            </x-penguin-ui.input.button>

                            {{-- Acción Eliminar Usuario --}}
                            <x-penguin-ui.input.button 
                                wire:click="delete({{ $usuario->id }})"
                                icon="trash-2"
                                class="ml-3"
                                variant="danger"
                            >
                                Eliminar Usuario
                            </x-penguin-ui.input.button>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        @include('partials.gestion-usuario.editar')
        @include('partials.gestion-usuario.actualizar-pass')
        @include('partials.gestion-usuario.eliminar')
    
    
</div>
