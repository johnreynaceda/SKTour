<x-guest-layout>
    <div class="flex ">

        <div class="relative top-0 bottom-0 right-0 flex-shrink-0 hidden w-1/3 overflow-hidden bg-cover lg:block">

            <div class="absolute inset-0 z-20 w-full h-full opacity-70 bg-gradient-to-t from-black"></div>
            <img src="{{ asset('images/bansada.jpg') }}" class="z-10 object-cover w-full h-full" />
        </div>
        <div class="relative flex flex-wrap items-center w-full h-full p-8 py-20">
            <div class="relative w-full max-w-md mx-auto lg:mb-0">
                <div class="relative text-center">

                    <div class="flex flex-col mb-6 space-y-2">
                        <div class="text-center font-black text-3xl text-green-600 font-salsa">
                            SKTOUR
                        </div>
                        <h1 class="text-2xl font-semibold tracking-tight">Create an account</h1>
                        <p class="text-sm text-neutral-500">Please enter the required fields.</p>
                    </div>
                    <div>
                        <livewire:auth.register-user />
                    </div>
                </div>
                <p class="mt-6 text-sm text-center text-neutral-500">Already have an account? <a
                        href="{{ route('login') }}" class="relative font-medium text-blue-600 group"><span>Login
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
