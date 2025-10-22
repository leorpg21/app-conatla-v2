@props([
    'expanded' => false,
    'title' => null,
    'icon' => 'house'
])
<div  x-data="{ isExpanded: @json($expanded) }" class="flex flex-col" >
    <button type="button" x-on:click="isExpanded = ! isExpanded" id="user-management-btn" aria-controls="user-management" x-bind:aria-expanded="isExpanded ? 'true' : 'false'" class="flex items-center justify-between rounded-radius gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline" x-bind:class="isExpanded ? 'text-on-surface-strong bg-primary/10 dark:text-on-surface-dark-strong dark:bg-primary-dark/10' :  'text-on-surface hover:bg-primary/5 hover:text-on-surface-strong dark:text-on-surface-dark dark:hover:text-on-surface-dark-strong dark:hover:bg-primary-dark/5'">
        <x-dynamic-component :component="'lucide-'.$icon" class="size-4 shrink-0" />
        <span :class="collapseDesktop ? 'mr-auto text-left' : 'md:hidden'">{{ $title }}</span>

        <div :class="collapseDesktop ? '' : 'md:hidden'">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
            </svg>
        </div>
    </button>

    <ul x-cloak x-collapse x-show="isExpanded && collapseDesktop" aria-labelledby="user-management-btn" id="user-management">
        
        {{ $slot }}
    </ul>

   
</div>