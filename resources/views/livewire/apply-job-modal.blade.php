<div>
    @if($showModal)
        <!-- Modal Backdrop -->
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <!-- Background overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                     wire:click="closeModal"
                     aria-hidden="true"></div>

                <!-- Center modal -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!-- Modal panel -->
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form wire:submit.prevent="submit">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <!-- Modal Header -->
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Apply for {{ $job->title }}
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">{{ $job->company_name }}</p>
                                </div>
                                <button type="button"
                                        wire:click="closeModal"
                                        class="text-gray-400 hover:text-gray-500">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="mt-4 space-y-4">
                                <!-- Applicant Info (Read-only) -->
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Your Information</h4>
                                    <div class="space-y-1 text-sm">
                                        <p><span class="font-medium">Name:</span> {{ auth()->user()->name }}</p>
                                        <p><span class="font-medium">Email:</span> {{ auth()->user()->email }}</p>
                                        @if(auth()->user()->phone)
                                            <p><span class="font-medium">Phone:</span> {{ auth()->user()->phone }}</p>
                                        @endif
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2">
                                        <a href="{{ route('profile') }}" class="text-blue-600 hover:underline">Update your profile</a>
                                    </p>
                                </div>

                                <!-- CV Upload -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Upload Your CV/Resume <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-blue-400 transition-colors">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="cv-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                                    <span>Upload a file</span>
                                                    <input id="cv-upload"
                                                           type="file"
                                                           wire:model="cv"
                                                           class="sr-only"
                                                           accept=".pdf,.doc,.docx">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PDF, DOC, DOCX up to 5MB</p>
                                        </div>
                                    </div>

                                    @if ($cv)
                                        <div class="mt-2 flex items-center text-sm text-green-600">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            <span>{{ $cv->getClientOriginalName() }} ({{ number_format($cv->getSize() / 1024, 2) }} KB)</span>
                                        </div>
                                    @endif

                                    @error('cv')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror

                                    <!-- Loading indicator for file upload -->
                                    <div wire:loading wire:target="cv" class="mt-2 text-sm text-blue-600">
                                        <i class="fas fa-spinner fa-spin mr-2"></i>
                                        Uploading...
                                    </div>
                                </div>

                                <!-- Cover Letter (Optional) -->
                                <div>
                                    <label for="coverLetter" class="block text-sm font-medium text-gray-700 mb-2">
                                        Cover Letter (Optional)
                                    </label>
                                    <textarea
                                        id="coverLetter"
                                        wire:model="coverLetter"
                                        rows="4"
                                        class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        placeholder="Tell us why you're a great fit for this position..."></textarea>
                                    <p class="mt-1 text-xs text-gray-500">Maximum 1000 characters</p>
                                    @error('coverLetter')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-3">
                            <button type="submit"
                                    wire:loading.attr="disabled"
                                    wire:target="submit,cv"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#2A2D5A] text-base font-medium text-white hover:bg-[#1f2347] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm disabled:opacity-50 disabled:cursor-not-allowed">
                                <span wire:loading.remove wire:target="submit">Submit Application</span>
                                <span wire:loading wire:target="submit">
                                    <i class="fas fa-spinner fa-spin mr-2"></i>
                                    Submitting...
                                </span>
                            </button>
                            <button type="button"
                                    wire:click="closeModal"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

        @push('scripts')
            <script>
                document.addEventListener('livewire:init', () => {
                    Livewire.on('application-submitted', (event) => {
                        Swal.fire({
                            icon: 'success',
                            title: event.title,
                            html: `
                        <p class="mb-2">${event.message}</p>
                        <p class="text-sm text-gray-600">Job: <strong>${event.jobTitle}</strong></p>
                    `,
                            confirmButtonColor: '#2A2D5A',
                            confirmButtonText: 'View My Applications',
                            showCancelButton: true,
                            cancelButtonText: 'Continue Browsing',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to user dashboard (we'll create this later)
                                window.location.href = '/dashboard';
                            } else {
                                // Refresh to update the "Apply Now" button
                                window.location.reload();
                            }
                        });
                    });
                });
            </script>
        @endpush
</div>
