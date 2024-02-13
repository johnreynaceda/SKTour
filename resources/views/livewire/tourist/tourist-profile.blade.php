<div>
    <div class="w-8/12 border rounded-xl p-5">
        {{ $this->form }}
    </div>
    <div class="mt-5">
        <x-button label="Save Record" wire:click="saveRecord" spinner="saveRecord" right-icon="save" positive
            class="font-semibold" />
    </div>
</div>
