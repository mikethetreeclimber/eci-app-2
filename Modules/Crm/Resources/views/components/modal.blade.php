<div x-data="{open: false}" @keydown.window.escape="open = false">
    <button @click="open = true" class="btn btn-primary">{{ $button }}</button>
    <div x-cloak x-show="open" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-base-100 bg-opacity-75 transition-opacity" @click="open = false"
                aria-hidden="true">
            </div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>

            <div x-show="open" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom text-left overflow-hidden transform transition-all sm:align-middle sm:max-w-sm sm:w-full sm:p-6">


                <div class="bg-base-300 card shadow">
                    <div class="card-body">
                        <h2 class="card-title text-center"> {{ $cardTitle }}</h2>
                        {{ $slot }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
