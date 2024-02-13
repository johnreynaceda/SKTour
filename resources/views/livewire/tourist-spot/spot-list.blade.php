<div>
    <div class="bg-white rounded-lg 2xl:p-10 p-2">
        {{ $this->table }}
    </div>
    <x-modal wire:model.defer="add_modal" align="center">
        <x-card title="Create Spot">
            {{ $this->form }}
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button dark label="Create Spot" wire:click="createSpot" spinner="createSpot"
                        right-icon="arrow-right" class="font-medium" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <x-modal wire:model.defer="edit_modal" align="center">
        <x-card title="Edit Spot">
            {{ $this->form }}
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button dark label="Update Spot" wire:click="updateSpot" spinner="updateSpot"
                        right-icon="arrow-right" class="font-medium" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
