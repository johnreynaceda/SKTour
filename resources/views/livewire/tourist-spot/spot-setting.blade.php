<div>
    <h1 class="font-bold text-xl text-gray-700">BOOKING INFORMATION</h1>
    <div class="w-96 mt-10">
        <x-input label="Booking Amount" wire:model="amount" type="number" />

        <x-button wire:click="save" right-icon="arrow-right" dark class="mt-3">Save</x-button>
    </div>
</div>
