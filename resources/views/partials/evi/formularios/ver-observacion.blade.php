<div x-data="{modalIsOpen: false}">
    <x-penguin-ui.input.button x-on:click="modalIsOpen = true"  variant="alternate" class="max-w-[100px] cursor-pointer overflow-hidden text-ellipsis whitespace-nowrap text-xs text-start " wire:click="$set('modalVerObservacion', true)">
            ver observación
    </x-penguin-ui.input.button>
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex w-lg flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark">
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-on-surface-strong dark:text-on-surface-dark-strong"></h3>
                <button x-on:click="modalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <!-- Dialog Body -->
            <span class=" text-xl"> 
                {{ $bnf->observacion }}
            </span>
        </div>
    </div>
</div>