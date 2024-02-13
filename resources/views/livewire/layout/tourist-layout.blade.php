<div x-data="{ modal: @entangle('modal') }">
    <div>
        <div class="hidden 2xl:block">
            <swiper-container class="mySwiper" wire:ignore pagination="true" pagination-clickable="true" slides-per-view="5"
                space-between="10" free-mode="true">
                @foreach ($municipalities as $item)
                    <swiper-slide>
                        <div wire:click="$set('municipality_id', {{ $item->id }})"
                            class=" shadow-lg w-full bg-gray-700 relative overflow-hidden rounded-xl h-40 cursor-pointer hover:border-2 hover:border-green-600 hover:scale-95">
                            <img src="{{ asset('images/Bansada.jpg') }}"
                                class="absolute top-0 bottom-0 opacity-50 left-0" alt="">
                            <div class="absolute bottom-2 left-3 text-left">
                                <h1 class="text-white font-bold text-xs"></h1>
                                <h1 class="text-white font-bold text-xl uppercase">{{ $item->name }}</h1>
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </div>
        <div class="2xl:hidden">
            <swiper-container wire:ignore class="mySwiper" pagination="true" pagination-clickable="true"
                slides-per-view="2" space-between="10" free-mode="true">
                @foreach ($municipalities as $item)
                    <swiper-slide>
                        <div wire:click="$set('municipality_id', {{ $item->id }})"
                            class=" shadow-lg w-full bg-gray-700 relative overflow-hidden rounded-xl h-40 cursor-pointer hover:border-2 hover:border-green-600 hover:scale-95">
                            <img src="{{ asset('images/Bansada.jpg') }}"
                                class="absolute top-0 bottom-0 opacity-50 left-0" alt="">
                            <div class="absolute bottom-2 left-3 text-left">
                                <h1 class="text-white font-bold text-xl uppercase">{{ $item->name }}</h1>
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </div>
    </div>
    <div class="mt-10 grid grid-cols-1 2xl:grid-cols-3 gap-5">
        <div class=" ">
            <header class="2xl:text-3xl text-2xl border-b-2 text-gray-700 font-bold font-salsa">
                {{ \App\Models\Municipality::where('id', $municipality_id)->first()->name }}
            </header>
            <div class="mt-5">
                <nav class="flex-1 space-y-1 bg-white">
                    <p class="  text-xs font-semibold text-gray-400 uppercase">
                        TOURIST SPOT
                    </p>
                    <ul>
                        @forelse ($tourist_spots as $item)
                            <li wire:click="$set('tourist_spot_id', {{ $item->id }})">
                                <a class="{{ $tourist_spot_id == $item->id ? 'bg-gray-100 text-green-600' : '' }} inline-flex items-center w-full px-4 py-2 mt-1 font-medium text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-green-600"
                                    href="#">
                                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M20.62 8.45c-1.05-4.62-5.08-6.7-8.62-6.7h-.01c-3.53 0-7.57 2.07-8.62 6.69-1.17 5.16 1.99 9.53 4.85 12.28A5.436 5.436 0 0012 22.25c1.36 0 2.72-.51 3.77-1.53 2.86-2.75 6.02-7.11 4.85-12.27z"
                                            opacity=".4"></path>
                                        <path d="M12 13.46a3.15 3.15 0 100-6.3 3.15 3.15 0 000 6.3z"></path>
                                    </svg>
                                    <span class="ml-3">
                                        {{ $item->name }}
                                    </span>
                                </a>
                            </li>
                        @empty
                            <li>
                                <span>No Available Tourist spot..</span>
                            </li>
                        @endforelse


                    </ul>

                </nav>
            </div>
        </div>
        <div class="col-span-2 ">
            <div class="border-2 rounded-xl 2xl:p-5 p-2">
                <div class="flex justify-between items-end">
                    <h1 class="font-medium uppercase text-green-700
                            font-salsa">SPOTS IN
                        {{ \App\Models\TouristSpot::where('id', $tourist_spot_id)->first()->name ?? '' }}
                    </h1>
                    @if ($tourist_spot_id)
                        <x-button right-icon="bookmark" xs label="Book An Appointment" dark
                            wire:click="$set('modal', true)" />
                    @endif
                </div>
                @if ($tourist_spot_id == null)
                    <div class="flex justify-center items-center flex-col ">
                        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" class="h-64 w-64"
                            viewBox="0 0 806.00748 609.71553" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M854.56633,579.69009H213.72783a16.51868,16.51868,0,0,1-16.5-16.5V168.03628a12.10185,12.10185,0,0,1,12.08789-12.08838H858.76921a12.31112,12.31112,0,0,1,12.29712,12.29736V563.19009A16.51867,16.51867,0,0,1,854.56633,579.69009Z"
                                transform="translate(-196.99626 -145.14223)" fill="#f2f2f2" />
                            <path
                                d="M833.84652,558.85777H236.60177c-8.755,0-15.87756-6.66993-15.87756-14.86817v-344.105c0-6.08008,5.278-11.02685,11.76563-11.02685H837.76352c6.59521,0,11.96069,5.02832,11.96069,11.20849V543.9896C849.72421,552.18784,842.60141,558.85777,833.84652,558.85777Z"
                                transform="translate(-196.99626 -145.14223)" fill="#fff" />
                            <path
                                d="M870.83659,170.09243H196.99626V161.692a16.57377,16.57377,0,0,1,16.56006-16.54981H854.27654A16.57369,16.57369,0,0,1,870.83659,161.692Z"
                                transform="translate(-196.99626 -145.14223)" fill="#3f3d56" />
                            <circle cx="30.09536" cy="12.5" r="4.28342" fill="#fff" />
                            <circle cx="46.35417" cy="12.5" r="4.28342" fill="#fff" />
                            <circle cx="62.61297" cy="12.5" r="4.28342" fill="#fff" />
                            <path
                                d="M389.34433,242.90775H283.794a15.99572,15.99572,0,0,0-16,16v71.83a15.99571,15.99571,0,0,0,16,16h105.5503a16.002,16.002,0,0,0,16-16v-71.83A16.002,16.002,0,0,0,389.34433,242.90775Z"
                                transform="translate(-196.99626 -145.14223)" fill="#14bf6d" />
                            <path
                                d="M463.7928,258.904v71.8385a16,16,0,0,0,16,16H585.34066a16,16,0,0,0,16-16V258.904a16,16,0,0,0-16-16H479.7928A16,16,0,0,0,463.7928,258.904Z"
                                transform="translate(-196.99626 -145.14223)" fill="#14bf6d" />
                            <path
                                d="M659.7928,258.904v71.8385a16,16,0,0,0,16,16H781.34066a16,16,0,0,0,16-16V258.904a16,16,0,0,0-16-16H675.7928A16,16,0,0,0,659.7928,258.904Z"
                                transform="translate(-196.99626 -145.14223)" fill="#e6e6e6" />
                            <path
                                d="M267.7928,417.904v71.8385a16,16,0,0,0,16,16H389.34066a16,16,0,0,0,16-16V417.904a16,16,0,0,0-16-16H283.7928A16,16,0,0,0,267.7928,417.904Z"
                                transform="translate(-196.99626 -145.14223)" fill="#e6e6e6" />
                            <path
                                d="M463.7928,417.904v71.8385a16,16,0,0,0,16,16H585.34066a16,16,0,0,0,16-16V417.904a16,16,0,0,0-16-16H479.7928A16,16,0,0,0,463.7928,417.904Z"
                                transform="translate(-196.99626 -145.14223)" fill="#e6e6e6" />
                            <path
                                d="M659.7928,417.904v71.8385a16,16,0,0,0,16,16H781.34066a16,16,0,0,0,16-16V417.904a16,16,0,0,0-16-16H675.7928A16,16,0,0,0,659.7928,417.904Z"
                                transform="translate(-196.99626 -145.14223)" fill="#14bf6d" />
                            <circle cx="139.57047" cy="149.68102" r="22" fill="#fff" />
                            <path
                                d="M370.18417,348.73777H302.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,370.18417,348.73777Z"
                                transform="translate(-196.99626 -145.14223)" fill="#fff" />
                            <circle cx="335.57047" cy="149.68102" r="22" fill="#fff" />
                            <path
                                d="M566.18417,348.73777H498.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,566.18417,348.73777Z"
                                transform="translate(-196.99626 -145.14223)" fill="#fff" />
                            <circle cx="531.57047" cy="149.68102" r="22" fill="#fff" />
                            <path
                                d="M762.18417,348.73777H694.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,762.18417,348.73777Z"
                                transform="translate(-196.99626 -145.14223)" fill="#fff" />
                            <circle cx="139.57047" cy="308.68102" r="22" fill="#fff" />
                            <path
                                d="M370.18417,507.73777H302.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,370.18417,507.73777Z"
                                transform="translate(-196.99626 -145.14223)" fill="#fff" />
                            <circle cx="335.57047" cy="308.68102" r="22" fill="#fff" />
                            <path
                                d="M566.18417,507.73777H498.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,566.18417,507.73777Z"
                                transform="translate(-196.99626 -145.14223)" fill="#fff" />
                            <circle cx="531.57047" cy="308.68102" r="22" fill="#fff" />
                            <path
                                d="M762.18417,507.73777H694.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,762.18417,507.73777Z"
                                transform="translate(-196.99626 -145.14223)" fill="#fff" />
                            <path d="M1002.00374,754.85777h-261a1,1,0,0,1,0-2h261a1,1,0,0,1,0,2Z"
                                transform="translate(-196.99626 -145.14223)" fill="#3f3d56" />
                            <polygon
                                points="670.716 597.522 658.457 597.521 652.624 550.233 670.718 550.234 670.716 597.522"
                                fill="#a0616a" />
                            <path
                                d="M649.69935,594.01828h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H634.81249a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,649.69935,594.01828Z"
                                fill="#2f2e41" />
                            <polygon
                                points="716.716 597.522 704.457 597.521 698.624 550.233 716.718 550.234 716.716 597.522"
                                fill="#a0616a" />
                            <path
                                d="M695.69935,594.01828h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H680.81249a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,695.69935,594.01828Z"
                                fill="#2f2e41" />
                            <path
                                d="M912.21515,601.82551a10.74271,10.74271,0,0,1-2.06221-16.343l-8.0725-114.55784,23.253,2.25509.63868,112.18665a10.80091,10.80091,0,0,1-13.757,16.45914Z"
                                transform="translate(-196.99626 -145.14223)" fill="#a0616a" />
                            <path
                                d="M867.13337,718.84125,853.637,718.1977a4.499,4.499,0,0,1-4.28587-4.46289c-3.5581-54.91919-8.48584-113.80722-.94189-136.55664a4.5011,4.5011,0,0,1,5.14646-4.48536l53.99366,7.83789a4.47385,4.47385,0,0,1,3.85353,4.41993c6.89356,26.9364,7.20508,75.78189,6.94434,126.53418a4.5005,4.5005,0,0,1-4.5,4.53417H899.29719a4.47887,4.47887,0,0,1-4.44531-3.80078l-8.97706-57.06738a3.5,3.5,0,0,0-6.93286.12793l-7.12622,59.60254a4.5171,4.5171,0,0,1-4.46875,3.96582Q867.24079,718.84711,867.13337,718.84125Z"
                                transform="translate(-196.99626 -145.14223)" fill="#2f2e41" />
                            <path
                                d="M876.63435,584.95648c-11.89942-6.61132-21.197-8.34863-25.67994-8.79589a4.41806,4.41806,0,0,1-3.05346-1.67286,4.47788,4.47788,0,0,1-.93115-3.40136l12.9375-96.05078a33.21916,33.21916,0,0,1,19.36352-25.957,32.30591,32.30591,0,0,1,31.39551,2.46094q.665.44238,1.30517.90332A33.17816,33.17816,0,0,1,924.608,487.01605c-7.93359,32.45508-10.65869,85.66211-11.12451,95.999a4.46544,4.46544,0,0,1-2.918,4.00488,45.08471,45.08471,0,0,1-15.22583,2.71094A38.1245,38.1245,0,0,1,876.63435,584.95648Z"
                                transform="translate(-196.99626 -145.14223)" fill="#3f3d56" />
                            <path
                                d="M907.34418,509.41765a4.4817,4.4817,0,0,1-1.85872-3.40065l-1.70385-30.87615A12.39863,12.39863,0,0,1,928.128,471.214l7.48456,27.60491a4.50507,4.50507,0,0,1-3.16561,5.52076l-21.29065,5.77257A4.4829,4.4829,0,0,1,907.34418,509.41765Z"
                                transform="translate(-196.99626 -145.14223)" fill="#3f3d56" />
                            <circle cx="690.45974" cy="266.33344" r="24.56103" fill="#a0616a" />
                            <path
                                d="M798.45229,459.7303a10.52582,10.52582,0,0,1,.23929,1.64013l42.95745,24.782,10.44142-6.01094,11.13116,14.57228-22.33714,15.92056-49.00792-38.66268a10.49579,10.49579,0,1,1,6.57574-12.24133Z"
                                transform="translate(-196.99626 -145.14223)" fill="#a0616a" />
                            <path
                                d="M843.18331,484.04509a4.48167,4.48167,0,0,1,1.29314-3.65336l21.86341-21.86849a12.39862,12.39862,0,0,1,19.16808,15.51622l-15.57,23.9922a4.50507,4.50507,0,0,1-6.22447,1.32511l-18.5043-12.00853A4.48291,4.48291,0,0,1,843.18331,484.04509Z"
                                transform="translate(-196.99626 -145.14223)" fill="#3f3d56" />
                            <path
                                d="M904.83661,430.90724c-4.582,4.88079-13.09132,2.26067-13.68835-4.40717a8.05387,8.05387,0,0,1,.01013-1.55569c.30826-2.95357,2.01461-5.63506,1.60587-8.7536a4.59044,4.59044,0,0,0-.8401-2.14892c-3.65125-4.88933-12.22228,2.18687-15.6682-2.23929-2.113-2.714.3708-6.98713-1.25066-10.02051-2.14005-4.00358-8.47881-2.0286-12.45388-4.22116-4.42275-2.43948-4.15821-9.22524-1.24686-13.35269,3.55053-5.03359,9.77573-7.71951,15.92336-8.10661s12.25292,1.27475,17.9923,3.51145c6.52108,2.54134,12.98768,6.05351,17.00066,11.78753,4.88022,6.97317,5.34986,16.34793,2.90917,24.50174C913.64535,420.86237,908.57827,426.92156,904.83661,430.90724Z"
                                transform="translate(-196.99626 -145.14223)" fill="#2f2e41" />
                        </svg>

                        <h1>Please select any tourist spot.</h1>
                    </div>
                @else
                    <div class="grid
                      grid-cols-2 mt-2 gap-3">
                        @foreach ($spots as $item)
                            <div class="border rounded-lg overflow-hidden p-2">
                                <img src="{{ Storage::url($item->photo_path) }}"
                                    class="w-full h-32 rounded-lg object-cover" alt="">
                                <div class="mt-2">
                                    <h1 class="uppercase text-gray-700 font-semibold">{{ $item->name }}</h1>
                                    <p class="text-sm">{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-5">
                        <div class="w-full relative overflow-hidden">
                            <div class="mapouter">
                                @if ($tourist_spot_id)
                                    <div wire:ignore class="gmap_canvas w-full">
                                        <iframe class="w-full"
                                            src="https://maps.google.com/maps?q={{ \App\Models\TouristSpot::where('id', $tourist_spot_id)->first()->address ?? '' }}&amp;ie=UTF8&amp;&amp;output=embed"></iframe><br />
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div x-show="modal" x-cloak class="relative z-10" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <!--
              Background backdrop, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
        <div x-show="modal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!--
                  Modal panel, show/hide based on modal state.

                  Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                  Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div x-show="modal" x-cloak x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-6xl">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="grid 2xl:grid-cols-3 grid-cols-1  rounded-xl overflow-hidden">
                            <div class="2xl:col-span-1">
                                <img src="{{ Storage::url(\App\Models\TouristSpot::where('id', $tourist_spot_id)->first()->background_path ?? '') }}"
                                    class="2xl:h-80 h-40 object-cover w-full" alt="">
                                <div class="bg-green-600 p-5 2xl:h-full">
                                    <h1 class="text-white font-salsa uppercase 2xl:text-2xl text-xl">
                                        {{ \App\Models\TouristSpot::where('id', $tourist_spot_id)->first()->name ?? '' }}
                                    </h1>
                                    <div class="mt-3">
                                        <p class="text-justify text-white">
                                            {{ \App\Models\TouristSpot::where('id', $tourist_spot_id)->first()->description ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="border 2xl:col-span-2">
                                <div class="mx-auto 2xl:px-10 p-5 2xl:py-10 ">
                                    <h1 class="text-3xl font-salsa font-bold text-green-600">BOOKING FORM</h1>
                                    <div class="mt-5">
                                        {{ $this->form }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" wire:click="submitBooking"
                            class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">SUBMIT
                            BOOKING</button>
                        <button type="button" wire:click="$set('modal', false)"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
