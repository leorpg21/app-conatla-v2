@php
    $formularios = Session::get('formularios');
    $expandedForms = false;
    $expandedSfi = false;
    if(request()->routeIs('rumv.*') 
    || request()->routeIs('salud.*') 
    || request()->routeIs('educacion.*') 
    || request()->routeIs('empleabilidad.*')
    || request()->routeIs('ruta_productiva.*')
    || request()->routeIs('atencion_campo.*')
    || request()->routeIs('formacion_trabajo.*')
    || request()->routeIs('violencia_genero.*')
    || request()->routeIs('promocion_prevencion.*')
    || request()->routeIs('sisben.*')
    || request()->routeIs('espacio_protector.*')
    || request()->routeIs('psicosocial.*')
    ){
        $expandedForms = true;
    }
    
    if(request()->routeIs('indicador_seis.*') 
    || request()->routeIs('indicador_siete.*') 
    || request()->routeIs('indicador_ocho.*') 
    
    ){
        $expandedSfi = true;
    }

@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="ligth">
    <head>
        @include('partials.default.head')
          
    </head>
    <body>
       <div  
         x-data="{ 
                showSidebar: false, 
                collapseDesktop: JSON.parse(localStorage.getItem('collapseDesktop') ?? 'true')
            }"
            x-effect="localStorage.setItem('collapseDesktop', JSON.stringify(collapseDesktop))"
            class="relative flex w-full flex-col md:flex-row"
        >
        
            <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
            <a class="sr-only" href="#main-content">skip to the main content</a>
            
            <!-- dark overlay for when the sidebar is open on smaller screens  -->
            <div x-cloak x-show="showSidebar" class="fixed inset-0 z-10 bg-surface-dark/10 backdrop-blur-xs md:hidden" aria-hidden="true" x-on:click="showSidebar = false" x-transition.opacity></div>

            <nav x-cloak  class="fixed left-0 z-20 flex h-svh shrink-0 flex-col border-r border-outline bg-surface-alt p-4 transition-transform duration-300  md:translate-x-0 md:relative dark:border-outline-dark dark:bg-surface-dark-alt" x-bind:class="showSidebar ? 'translate-x-0' : '-translate-x-60'" aria-label="sidebar navigation">
                <!-- logo  -->
                <a href="{{ route('home') }}" wire:navigate :class="collapseDesktop ? 'me-5 flex items-center space-x-2 rtl:space-x-reverse' : ''">
                    <x-app-logo />
                </a>

               

                <!-- sidebar links  -->
                <div class="mt-5 flex flex-col gap-2 overflow-y-auto pb-6">
                    <x-penguin-ui.navigation.link icon="house" :href="route('home')" :active_page="request()->routeIs('home')" wire:navigate>
                        Inicio
                    </x-penguin-ui.navigation.link>
                    
                    {{-- @can('ver_dashboard')
                    <x-penguin-ui.navigation.link :href="route('dashboard')" :active_page="request()->routeIs('dashboard')" icon="airplay" wire:navigate>
                        Dashboard
                    </x-penguin-ui.navigation.link>
                    @endcan --}}
                    
                    @canany(['ver_usuarios', 'modificar_usuario'])
                    <x-penguin-ui.navigation.link :href="route('gestion-usuario.index')" :active_page="request()->routeIs('gestion-usuario.index')" icon="user-cog" wire:navigate>
                        Gestionar Usuario
                    </x-penguin-ui.navigation.link>
                    @endcanany
                    
                    @hasanyrole('super_usuario|coordinador')
                    <x-penguin-ui.navigation.link icon="square-mouse-pointer" :href="route('muestra.index')" :active_page="request()->routeIs('muestra.index')" wire:navigate>
                        Selección para la muestra
                    </x-penguin-ui.navigation.link>
                    @endhasanyrole

                    @canany(['ver_formulario_asignado', ['asignar_formulario']])
                    <x-penguin-ui.navigation.link :href="route('gestion-formulario.index')" :active_page="request()->routeIs('gestion-formulario.index')" icon="book-copy" wire:navigate>
                        Gestionar Formulario
                    </x-penguin-ui.navigation.link>
                    @endcanany

                    {{-- Formularios --}}
                    @hasanyrole('super_usuario|coordinador|encuestador')
                    <x-penguin-ui.navigation.group-links title="Formularios" :expanded="$expandedForms" icon="book-check">
                        @if(($formularios && in_array('rumv', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('rumv.index')" :active_page="request()->routeIs('rumv.*')" wire:navigate>
                                F01-RUMV
                            </x-penguin-ui.navigation.link>
                        </li>
                        @endif

                        @if(($formularios && in_array('educacion', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('educacion.index')" :active_page="request()->routeIs('educacion.*')" wire:navigate>
                                F02-Educación
                            </x-penguin-ui.navigation.link>
                        
                        </li>
                        @endif

                        @if(($formularios && in_array('salud', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('salud.index')" :active_page="request()->routeIs('salud.*')" wire:navigate>
                                F03-Salud
                            </x-penguin-ui.navigation.link>
                        </li>
                        @endif

                        @if(($formularios && in_array('empleabilidad', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('empleabilidad.index')" :active_page="request()->routeIs('empleabilidad.*')" wire:navigate>
                                F04-Empleabilidad
                            </x-penguin-ui.navigation.link>
                        </li>
                        @endif

                        @if(($formularios && in_array('ruta_productiva', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('ruta_productiva.index')" :active_page="request()->routeIs('ruta_productiva.*')" wire:navigate>
                                F05-Ruta Productiva
                            </x-penguin-ui.navigation.link>
                        </li>
                        @endif

                        @if(($formularios && in_array('atencion_campo', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        {{-- <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('atencion_campo.index')" :active_page="request()->routeIs('atencion_campo.*')" wire:navigate>
                                F06-Atención en el campo
                            </x-penguin-ui.navigation.link>
                        </li> --}}
                        @endif

                        @if(($formularios && in_array('formacion_trabajo', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('formacion_trabajo.index')" :active_page="request()->routeIs('formacion_trabajo.*')" wire:navigate>
                                F07-Formación para el Trabajo
                            </x-penguin-ui.navigation.link>
                        </li>
                        @endif

                        @if(($formularios && in_array('violencia_genero', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('violencia_genero.index')" :active_page="request()->routeIs('violencia_genero.*')" wire:navigate>
                                F08-Violencia Genero
                            </x-penguin-ui.navigation.link>
                        </li>
                        @endif

                        @if(($formularios && in_array('promocion_prevencion', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('promocion_prevencion.index')" :active_page="request()->routeIs('promocion_prevencion.*')" wire:navigate>
                                F09-Promoción y Prevención
                            </x-penguin-ui.navigation.link>
                        </li>
                        @endif

                        @if(($formularios && in_array('sisben', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('sisben.index')" :active_page="request()->routeIs('sisben.*')" wire:navigate>
                                F10-Sisben
                            </x-penguin-ui.navigation.link>
                        </li>
                        @endif

                        @if(($formularios && in_array('espacio_protector', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('espacio_protector.index')" :active_page="request()->routeIs('espacio_protector.*')" wire:navigate>
                                F11-Espacio Protector
                            </x-penguin-ui.navigation.link>
                        </li>
                        @endif

                        @if(($formularios && in_array('psicosocial', $formularios)) || auth()->user()->getRoleNames()->first() == 'coordinador' | auth()->user()->getRoleNames()->first() == 'super_usuario')
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('psicosocial.index')" :active_page="request()->routeIs('psicosocial.*')" wire:navigate>
                                F12-Psicosocial
                            </x-penguin-ui.navigation.link>
                        </li>
                        @endif
                       

                    </x-penguin-ui.navigation.group-links>
                    @endhasanyrole

                    {{-- Lista Checkeo Infraestructura --}}
                    @canany(['ver_infraestructura','editar_infraestructura','cargar_infraestructura'])
                    <x-penguin-ui.navigation.link :href="route('lc_infraestructura.index')" :active_page="request()->routeIs('lc_infraestructura.index')" wire:navigate icon="list-check">
                        LC Infraestructura
                    </x-penguin-ui.navigation.link>
                    @endcanany
                    {{-- Soporte Financiero --}}

                    @canany(['ver_indicador','editar_indicador','cargar_indicador'])
                    <x-penguin-ui.navigation.group-links title="Soporte Financiero" :expanded="$expandedSfi" icon="sheet">
                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('indicador_seis.index')" :active_page="request()->routeIs('indicador_seis.index')" wire:navigate>
                                Indicador Seis
                            </x-penguin-ui.navigation.link>
                        </li>

                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('indicador_siete.index')" :active_page="request()->routeIs('indicador_siete.index')" wire:navigate>
                                Indicador Siete
                            </x-penguin-ui.navigation.link>
                        </li>

                        <li class="px-1 py-0.5 first:mt-2">
                            <x-penguin-ui.navigation.link :href="route('indicador_ocho.index')" :active_page="request()->routeIs('indicador_ocho.index')" wire:navigate>
                                Indicador Ocho
                            </x-penguin-ui.navigation.link>
                        </li>

                    </x-penguin-ui.navigation.group-links>
                    @endcanany

                    {{-- @can('ver_data')
                        <x-penguin-ui.navigation.link icon="braces" :href="route('data.index')" :active_page="request()->routeIs('data.index')" wire:navigate>
                            Data
                        </x-penguin-ui.navigation.link>
                    @endcan --}}
                    
                </div>

                
                <div x-data="{ menuIsOpen: false }" class="mt-auto" x-on:keydown.esc.window="menuIsOpen = false">
                    <button type="button" class="flex w-full items-center rounded-radius gap-2  text-left text-on-surface hover:bg-primary/5 hover:text-on-surface-strong focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong dark:focus-visible:outline-primary-dark" x-bind:class="menuIsOpen ? 'bg-primary/10 dark:bg-primary-dark/10' : ''" aria-haspopup="true" x-on:click="menuIsOpen = ! menuIsOpen" x-bind:aria-expanded="menuIsOpen">
                        <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                            <span
                                class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black "
                            >
                                {{ auth()->user()->initials() }}
                            </span>
                        </span>
                        <div  :class="!collapseDesktop ? 'md:hidden' :'flex flex-col'">
                            <span class="text-sm font-bold text-on-surface-strong dark:text-on-surface-dark-strong"> {{ auth()->user()->name }} </span>
                            <span class="w-32 overflow-hidden text-ellipsis text-xs md:w-36" aria-hidden="true">{{ auth()->user()->username }}</span>
                            <span class="sr-only">profile settings</span>
                        </div>
                        <svg :class="!collapseDesktop ? 'md:hidden' : 'ml-auto size-4 shrink-0 -rotate-90 md:rotate-0'"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"  aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                    </button>  
                    
                    <!-- menu -->
                    <div x-cloak  x-show="menuIsOpen" class="absolute bottom-20 right-6 z-20 -mr-1 w-48 border divide-y divide-outline border-outline bg-surface dark:divide-outline-dark dark:border-outline-dark dark:bg-surface-dark rounded-radius md:-right-44 md:bottom-4" role="menu" x-on:click.outside="menuIsOpen = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition="" x-trap="menuIsOpen">
                    
                       

                        {{-- <div class="flex flex-col py-1.5">
                            <a href="#" class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong" role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"/>
                                </svg>
                                <span>Configuración</span>
                            </a>
                            
                        </div> --}}

                        <div class="flex flex-col py-1.5">
                            <form method="POST" action="{{ route('logout') }}" class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong" role="menuitem">
                                @csrf
                                <x-lucide-log-in class="size-5 shrink-0" />
                                <button type="submit">Cerrar Sesión</button>
                            </form>
                        </div>

                    </div>
                </div>
            </nav>

            <!-- main content  -->
            <div id="main-content" class="h-svh w-full overflow-y-auto  bg-surface dark:bg-surface-dark">
                <div class=" w-full flex p-4">
                    
                    <x-lucide-panel-left class="size-5 hidden md:flex mr-3 hover:cursor-pointer" 
                    @click="collapseDesktop = !collapseDesktop" />
                    
                    @if (isset($breadcrumb))
                    <x-penguin-ui.navigation.breadcrumb>
                        {{ $breadcrumb }}
                    </x-penguin-ui.navigation.breadcrumb>
                    @endif

                </div>
                <div class="w-full px-4 pb-4">
                    {{ $slot }}
                </div>
            </div>

            <!-- toggle button for small screen  -->
            <button x-cloak class="fixed right-4 top-4 z-20 rounded-full bg-primary p-4 md:hidden text-on-primary dark:bg-primary-dark dark:text-on-primary-dark" x-on:click="showSidebar = ! showSidebar">
                <svg x-show="showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5" aria-hidden="true">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
                <svg x-show="! showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5" aria-hidden="true">
                    <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5-1v12h9a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM4 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2z"/>
                </svg>
                <span class="sr-only">sidebar toggle</span>
            </button>
        </div>

       

        @livewireScripts
    </body>
</html>

