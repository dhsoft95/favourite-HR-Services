<div
    x-data="{
        show: false,
        message: '',
        type: 'success',
        init() {
            // Listen for show-alert event
            window.addEventListener('show-alert', (event) => {
                this.message = event.detail.message || event.detail[0].message;
                this.type = event.detail.type || event.detail[0].type || 'success';
                this.show = true;
                setTimeout(() => { this.show = false }, 5000);
            });

            // Listen for application-submitted event
            window.addEventListener('application-submitted', (event) => {
                const data = event.detail[0] || event.detail;
                this.message = data.message || 'Application submitted successfully!';
                this.type = 'success';
                this.show = true;
                setTimeout(() => {
                    this.show = false;
                    // Refresh page after toast disappears
                    window.location.reload();
                }, 3000);
            });
        }
    }"
    x-show="show"
    x-transition:enter="transform ease-out duration-300 transition"
    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-4 right-4 z-50 max-w-sm w-full"
    style="display: none;"
>
    <div
        :class="{
            'bg-green-50 border-green-200': type === 'success',
            'bg-red-50 border-red-200': type === 'error',
            'bg-blue-50 border-blue-200': type === 'info',
            'bg-yellow-50 border-yellow-200': type === 'warning'
        }"
        class="rounded-lg shadow-lg border-l-4 p-4"
    >
        <div class="flex items-start">
            <!-- Icons -->
            <div class="flex-shrink-0">
                <!-- Success Icon -->
                <svg x-show="type === 'success'" class="h-6 w-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>

                <!-- Error Icon -->
                <svg x-show="type === 'error'" class="h-6 w-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>

                <!-- Info Icon -->
                <svg x-show="type === 'info'" class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>

                <!-- Warning Icon -->
                <svg x-show="type === 'warning'" class="h-6 w-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>

            <!-- Message -->
            <div class="ml-3 flex-1">
                <p
                    x-text="message"
                    :class="{
                        'text-green-800': type === 'success',
                        'text-red-800': type === 'error',
                        'text-blue-800': type === 'info',
                        'text-yellow-800': type === 'warning'
                    }"
                    class="text-sm font-medium"
                ></p>
            </div>

            <!-- Close Button -->
            <div class="ml-4 flex-shrink-0 flex">
                <button
                    @click="show = false"
                    :class="{
                        'text-green-400 hover:text-green-500': type === 'success',
                        'text-red-400 hover:text-red-500': type === 'error',
                        'text-blue-400 hover:text-blue-500': type === 'info',
                        'text-yellow-400 hover:text-yellow-500': type === 'warning'
                    }"
                    class="inline-flex rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                >
                    <span class="sr-only">Close</span>
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="mt-2 relative h-1 bg-gray-200 rounded-full overflow-hidden">
            <div
                class="absolute top-0 left-0 h-full"
                :class="{
                    'bg-green-500': type === 'success',
                    'bg-red-500': type === 'error',
                    'bg-blue-500': type === 'info',
                    'bg-yellow-500': type === 'warning'
                }"
                x-show="show"
                style="width: 100%; animation: shrink 5s linear forwards;"
            ></div>
        </div>
    </div>
</div>

<style>
    @keyframes shrink {
        from {
            width: 100%;
        }
        to {
            width: 0%;
        }
    }
</style>
