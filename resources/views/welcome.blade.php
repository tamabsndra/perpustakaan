<x-template>
    <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            
        </div>
        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
            <div class="text-center">
                @auth
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-4">Halo, {{Auth::user()->nama}}!!</h1>
                @endauth
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Welcome to Online Library</h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">How can I assist you with it today? Are you looking for information, trying to access resources, or something else?</p>
                <div class="mt-4 flex items-center justify-center gap-x-6">
                    <a href="#"
                        class="rounded-md bg-sky-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">Find Book Now</a>
                </div>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            
        </div>
    </div>
</x-template>