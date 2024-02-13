<div>
    {{ $this->table }}
    <x-modal wire:model.defer="booking_receipt" modal-width="3xl" align="center">

        <x-card>

            <div class="border-green-600 border-2 p-5">
                <div class="text-center font-bold text-xl text-green-600 font-salsa">
                    BOOKING RECEIPT
                </div>
                <div class="flex justify-between mt-5 items-start">
                    <div>
                        <h1 class="font-bold uppercase text-2xl">{{ $booked_data->tourist_spot->name ?? '' }}</h1>
                        <h1 class="text-sm">{{ $booked_data->tourist_spot->address ?? '' }}</h1>
                    </div>
                    <div class="font-bold text-gray-700">
                        {{ now()->format('F d, Y') }}
                    </div>
                </div>
                <div class="mt-10">
                    <span class="text-lg font-medium"> Billing Details:</span>
                    <h1>Booking Fee -
                        &#8369;{{ number_format($booked_data->tourist_spot->billing_amount ?? 0, 2) }}/person x
                        {{ $booked_data->no_of_guest ?? '' }}</h1>
                    <h1 class="uppercase mt-2 font-bold">Total:
                        {{ number_format(($booked_data->tourist_spot->billing_amount ?? 0) * ($booked_data->no_of_guest ?? 0), 2) }}
                    </h1>


                </div>
                <div class="mt-5">
                    <h1 class="text-lg font-medium">Customer Details:</h1>
                    <div class="flex flex-col space-y-2">
                        <span>Name: {{ ($booked_data->firstname ?? '') . ' ' . ($booked_data->lastname ?? '') }}</span>
                        <span>Email: {{ $booked_data->email ?? '' }}</span>
                        <span>Phone Number: {{ $booked_data->phone_number ?? '' }}</span>
                        <span>Number of Guest: {{ $booked_data->no_of_guest ?? '' }}</span>
                        <span>Arrival:
                            {{ \Carbon\Carbon::parse($booked_data->arrival_date ?? '')->format('F d, Y') }}</span>
                        <span>Address:
                            {{ ($booked_data->address ?? '') . ', ' . ($booked_data->city ?? '') . ', ' . ($booked_data->municipality ?? '') }}</span>
                    </div>
                </div>
            </div>
            <x-slot name="footer">

                <div class="flex justify-end gap-x-4">

                    <x-button flat negative label="Close" x-on:click="close" />



                </div>

            </x-slot>

        </x-card>

    </x-modal>
</div>
