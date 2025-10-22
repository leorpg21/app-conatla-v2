<div>
    
    @if ($successMessage)
        @foreach($successMessage as $msg)
            <x-penguin-ui.feedback.notification.success :message="$msg" />
        @endforeach
    @endif

    @if ($errorMessage)
        @foreach($errorMessage as $msg)
            <x-penguin-ui.feedback.notification.error  :message="$msg" />
        @endforeach
    @endif

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb" >
        <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
            Home
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Gestionar Formulario
        </x-penguin-ui.navigation.breadcrumb-item>
    </x-slot>

    <h2 class="mt-3 text-2xl text-green-800 font-bold">Gestionar Formulario</h2>

    <div class="mt-5 overflow-hidden max-w-xl overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
        <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
            <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                <tr>
                    <th scope="col" class="p-4">Nombre</th>
                    <th scope="col" class="p-4">Rol</th>
                    <th scope="col" class="p-4"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline dark:divide-outline-dark">
                    @foreach ($gestores as $gestor)
                    <tr class="even:bg-primary/5 dark:even:bg-primary-dark/10">
                        <td class="p-4">{{ $gestor->name }}</td>
                        <td class="p-4">Gestor</td>
                        <td class="p-4">
                            @can('ver_formulario_asignado')
                                
                            @endcan
                            @can('asignar_formulario')
                                <x-penguin-ui.input.button wire:click="edit({{ $gestor->id }})">
                                    Asignar Formularios
                                </x-penguin-ui.input.button>                                
                            @endcan
                        </td>
                    </tr>
                        
                    @endforeach
                    
            </tbody>
        </table>
    </div>
    {{-- <x-penguin-ui.feedback.tooltip message="Toop"/> --}}
    
    @include('partials.gestion-formulario.asignar')
</div>
