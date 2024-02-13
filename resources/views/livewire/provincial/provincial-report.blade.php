<div x-data>
    <div class="w-[40rem] flex space-x-4">
        <x-native-select label="Municipality" wire:model.live="municipality_id">

            <option>Select an Option</option>

            @foreach ($municipalities as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach

        </x-native-select>
        @if ($municipality_id)
            <x-native-select label="Tourist Spot" wire:model.live="spot_id">

                <option>Select an Option</option>

                @foreach ($spots as $spot)
                    <option value="{{ $spot->id }}">{{ $spot->name }}</option>
                @endforeach

            </x-native-select>
        @endif
    </div>

    <div>

        @if ($spot_id)
            <div class="mt-10 bg-white rounded-xl p-10">
                <div x-ref="printContainer">
                    <h1 class="text-2xl font-bold text-gray-700 uppercase ">Number of Tourist</h1>
                    <h1>{{ \App\Models\TouristSpot::where('id', $spot_id)->first()->name }}</h1>
                    <div class="mt-5">
                        <table id="example" class="table-auto mt-5" style="width:100%">
                            <thead class="font-normal">
                                <tr>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">MONTH</th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @php
                                    $months = [['id' => 1, 'name' => 'January'], ['id' => 2, 'name' => 'February'], ['id' => 3, 'name' => 'March'], ['id' => 4, 'name' => 'April'], ['id' => 5, 'name' => 'May'], ['id' => 6, 'name' => 'June'], ['id' => 7, 'name' => 'July'], ['id' => 8, 'name' => 'August'], ['id' => 9, 'name' => 'September'], ['id' => 10, 'name' => 'October'], ['id' => 11, 'name' => 'November'], ['id' => 12, 'name' => 'December']];
                                @endphp
                                @foreach ($months as $month)
                                    <tr>
                                        <td class="border-2 text-gray-700 px-3 py-1">{{ $month['name'] }}</td>
                                        <td class="border-2 text-gray-700 px-3 py-1">
                                            @php
                                                $total_tourist = \App\Models\User::whereHas('booking_transactions', function ($query) use ($spot_id, $month) {
                                                    $query
                                                        ->where('tourist_spot_id', $spot_id)
                                                        ->where('status', 'accepted')
                                                        ->whereMonth('arrival_date', $month['id']);
                                                })->count();
                                                echo $total_tourist;
                                            @endphp
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
    </div>
</div>
