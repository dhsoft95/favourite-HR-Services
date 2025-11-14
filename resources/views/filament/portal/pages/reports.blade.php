<x-filament-panels::page>
    <div class="space-y-6">
        <x-filament::section>
            <x-slot name="heading">
                How to Generate Reports
            </x-slot>
            <x-slot name="description">
                Select your desired filters for each report type and click the "Generate" button.
                Reports will be downloaded as Excel files that you can open, print, or share.
            </x-slot>
        </x-filament::section>

        <form wire:submit.prevent="submit">
            {{ $this->form }}
        </form>
    </div>
</x-filament-panels::page>
