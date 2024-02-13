<div>
    {{-- {{ $this->form }} --}}

    <div class="grid 2xl:grid-cols-2 gap-3 grid-cols-1">
        <x-input label="Firstname" wire:model="firstname" />
        <x-input label="Lastname" wire:model="lastname" />
        <x-input label="Email" wire:model="email" type="email" />
        <x-input label="Password" wire:model="password" type="password" />
        <div class="flex text-left">
            <x-native-select label="User Type" wire:model.live="user_type">
                <option>Select An Option</option>
                <option>tourist</option>
                <option>tourist spot</option>
            </x-native-select>
        </div>
        <div></div>
    </div>
    @if ($user_type == 'tourist spot')
        <div class="p-2 border mt-4 rounded-xl grid 2xl:grid-cols-2 gap-3 grid-cols-1">
            <x-input label="Name" wire:model="name" />
            <x-input label="Address" wire:model="address" />
            <div class="col-span-2">
                <x-textarea wire:model="description" label="Description" />
            </div>
            <div class="col-span-2">
                {{ $this->form }}
            </div>
        </div>
    @endif
    <div class="mt-5">
        <x-button label="Create Now" dark class="font-medium w-full" right-icon="arrow-right" wire:click="createAccount"
            spinner="createAccount" />
    </div>
</div>
