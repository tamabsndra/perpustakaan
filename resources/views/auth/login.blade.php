<x-authLayouts>
    <h1 class="text-3xl text-slate-800 dark:text-slate-100 font-bold mb-6">{{ __('Selamat Datang!') }} ✨</h1>
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
    <!-- Form -->
    <form action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="no_anggota" class="block text-sm font-medium leading-6 text-gray-900">Nomor Anggota</label>
            <div class="mt-2">
                <input id="no_anggota" name="no_anggota" type="text" autocomplete="no_anggota" required
                    class="block w-full rounded-md border-0 p-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
    
        <div>
            <label for="no_ktp" class="block text-sm font-medium leading-6 text-gray-900">Nomor KTP</label>
            <div class="mt-2">
                <input id="no_ktp" name="no_ktp" type="password" autocomplete="current-no_ktp" required
                    class="block w-full rounded-md border-0 p-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
    
        <div>
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-sky-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">Sign
                in</button>
        </div>
    </form>
    <!-- Footer -->
</x-authLayouts>