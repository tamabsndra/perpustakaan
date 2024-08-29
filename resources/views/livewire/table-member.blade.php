<div class="px-4 mt-20 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-4xl font-semibold leading-6 text-gray-900">Members</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the member in system.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            @if (Auth::user()->no_anggota == 'AD001')
            @include('member.add')
            @endif
        </div>
    </div>

    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Member Number</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">NIK</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Day of Birth</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Joined On</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                <span class="sr-only">Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($members as $item)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{
                                $item->no_anggota }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->nama }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->no_ktp }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->tgl_lahir }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->tgl_bergabung }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>