<x-penguin-ui.input.button icon="file-up" wire:click="$set('modalCargarDocumento', true)">
    Cargar Información
</x-penguin-ui.input.button>

<x-penguin-ui.feedback.modal title="Cargar Información" wire:model="modalCargarDocumento" :visible="$modalCargarDocumento" class="">
    <form wire:submit.prevent="cargarInformacion" class="space-y-6 px-10" enctype="multipart/form-data" >
        

        {{-- <flux:input type="file" wire:model="cargar_informacion.documento" label="Subir documento CSV" accept=".xlsx" /> --}}
        <div 
            x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false; progress = 0"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
            class="relative flex w-full max-w-sm flex-col gap-1 text-on-surface dark:text-on-surface-dark"
        >
            <!-- Label -->
            <label for="fileInput" class="w-fit pl-0.5 text-sm">Agregar documento</label>

            <!-- Input de archivo -->
            <input
                wire:model="cargar_informacion.documento"
                id="fileInput"
                type="file"
                class="w-full max-w-md overflow-clip rounded-radius border border-outline bg-surface-alt/50 text-sm file:mr-4 file:border-none file:bg-surface-alt file:px-4 file:py-2 file:font-medium file:text-on-surface-strong focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:file:bg-surface-dark-alt dark:file:text-on-surface-dark-strong dark:focus-visible:outline-primary-dark"
            />

            <!-- Recomendaciones -->
            <small class="pl-0.5">xlsx - Max 1MB</small>

            <!-- Error -->
            @error('cargar_informacion.documento')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <!-- Barra de progreso -->
            <div x-show="isUploading" class="mt-2 w-full h-2 rounded bg-gray-200 overflow-hidden">
                <div class="h-full bg-green-600 transition-all duration-300" :style="'width: ' + progress + '%'"></div>
            </div>
        </div>

       

        <div class="flex justify-end my-5">
            <x-penguin-ui.input.button target="cargarInformacion" type="submit" variant="primary">Realizar Cambios</x-penguin-ui.input.button>
        </div>
    </form>
</x-penguin-ui.feedback.modal>