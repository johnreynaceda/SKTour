<div x-data>
    <div class="flex space-x-3 w-6/12">
        <x-native-select label="Type of Report" wire:model.live="report">
            <option>Select An Option</option>
            <option>Number Of Tourist</option>
            <option>List Of Tourist</option>
        </x-native-select>
        @if ($report == 'List Of Tourist')
            <x-native-select label="Tourist Spot" wire:model.live="spot_id">
                <option>Select An Option</option>
                @foreach ($spots as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach

            </x-native-select>
        @endif


    </div>
    @if ($report == 'Number Of Tourist')
        <div class="mt-10">
            <div x-ref="printContainer">
                <h1 class="font-bold text-2xl  uppercase">Number of Tourist</h1>
                <h1>{{ $name }}</h1>
                <div class="mt-5">
                    <table id="example" class="table-auto mt-5" style="width:100%">
                        <thead class="font-normal">
                            <tr>
                                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">TOURIST SPOT
                                </th>

                                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                    TOTAL
                                </th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @php
                                $grandTotal = 0;
                            @endphp
                            @foreach ($spots as $spot)
                                <tr>
                                    <td class="border-2  text-gray-700  px-3 py-1">
                                        {{ $spot->name }}
                                    </td>
                                    <td class="border-2  text-gray-700  px-3 py-1">
                                        @php
                                            $total = \App\Models\User::whereHas('booking_transactions', function ($record) use ($spot) {
                                                $record->where('tourist_spot_id', $spot->id)->where('status', 'accepted');
                                            })->count();

                                            $grandTotal += $total;
                                        @endphp
                                        {{ $total }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>

                                <td class="text-right pr-1 text-gray-700">
                                    TOTAL:
                                </td>
                                <td class="border-2  text-gray-700 font-bold  px-3 py-1">
                                    {{ $grandTotal }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-5">
                <x-button label="Print Report" icon="printer" dark @click="printOut($refs.printContainer.outerHTML);" />
            </div>
        </div>
    @elseif($report == 'List Of Tourist')
        @if ($spot_id)
            <div class="mt-10">
                <div x-ref="printContainer">
                    <h1 class="font-bold text-2xl  uppercase">List of Tourist</h1>
                    <h1>{{ $name }}</h1>
                    <div class="mt-5">
                        <table id="example" class="table-auto mt-5" style="width:100%">
                            <thead class="font-normal">
                                <tr>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">NAME OF
                                        TOURIST</th>

                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        DATE
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($tourists as $tourist)
                                    <tr>

                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $tourist->fullname }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            @php
                                                $date = \App\Models\BookingTransaction::where('user_id', $tourist->id)->first()->arrival_date;
                                            @endphp
                                            {{ \Carbon\Carbon::parse($date)->format('F d, Y') }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-5">
                    <x-button label="Print Report" icon="printer" dark
                        @click="printOut($refs.printContainer.outerHTML);" />
                </div>
            </div>
        @endif
    @else
    @endif
</div>
