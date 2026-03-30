<x-filament-panels::page>
    <form wire:submit="submit">
        {{ $this->form }}

        <br>
        <div class="mt-6 flex justify-end gap-3">
            <x-filament::button type="button" color="gray" wire:click="mount">
                Reset
            </x-filament::button>

            <x-filament::button type="submit">
                Submit MMRF
            </x-filament::button>
        </div>
    </form>

    <x-filament-actions::modals />
</x-filament-panels::page>