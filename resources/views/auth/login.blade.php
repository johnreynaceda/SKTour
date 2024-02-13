<x-guest-layout>
    <!-- Session Status -->

    <div class="flex ">

        <div class="relative top-0 bottom-0 right-0 flex-shrink-0 hidden w-1/3 overflow-hidden bg-cover lg:block">

            <div class="absolute inset-0 z-20 w-full h-full opacity-70 bg-gradient-to-t from-black"></div>
            <img src="{{ asset('images/bansada.jpg') }}" class="z-10 object-cover w-full h-full" />
        </div>
        <div class="relative flex flex-wrap items-center w-full h-full p-8 py-20">
            <div class="relative w-full max-w-sm mx-auto lg:mb-0">
                <div class="relative text-center">

                    <div class="flex flex-col mb-6 space-y-2">
                        <div class="text-center font-black text-3xl text-green-600 font-salsa">
                            SKTOUR
                        </div>
                        <h1 class="text-xl font-semibold tracking-tight text-gray-600">Sign In to your Account</h1>
                        <p class="text-sm text-neutral-500"></p>
                    </div>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="text-left">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4 text-left">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4 text-left ">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-primary-button class="ms-3">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
                <p class="mt-6 text-sm text-center text-neutral-500">Don't have an account? <a
                        href="{{ route('register') }}" class="relative font-medium text-blue-600 group"><span>Sign Up
                            here</span><span
                            class="absolute bottom-0 left-0 w-0 group-hover:w-full ease-out duration-300 h-0.5 bg-blue-600"></span></a>
                </p>
                <p class="px-8 mt-1 text-sm text-center text-neutral-500">By continuing, you agree to our <a
                        class="underline underline-offset-4 hover:text-primary" href="/terms">Terms</a> and <a
                        class="underline underline-offset-4 hover:text-primary" href="/privacy">Policy</a>.</p>
            </div>
        </div>
    </div>

</x-guest-layout>
