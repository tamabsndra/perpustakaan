<div class="px-4 mt-20 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-4xl font-semibold leading-6 text-gray-900">Books</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the books in library.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            @if (Auth::user()->no_anggota == 'AD001')
            @include('buku.add')
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
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Book
                                Title</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Pages</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Stock</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                <span class="sr-only">Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($buku as $item)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{
                                $item->judul_buku }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->jumlah_halaman }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->harga }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->bukuTersedia() }}</td>
                            <td
                                class="flex gap-2 whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                @if (Auth::user()->no_anggota == 'AD001')
                                <button wire:click='edit({{$item->id_buku}})' data-modal-target="edit-book" data-modal-toggle="edit-book"
                                    class="block text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800"
                                    type="button">
                                    Edit
                                </button>
                                <button wire:click='delete({{$item->id_buku}})' data-modal-target="delete-book" data-modal-toggle="delete-book"
                                    class="block text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800"
                                    type="button">
                                    Delete
                                </button>
                                @else
                                    @if ($item->bukuTersedia()<=0)
                                    <button
                                        class="block cursor-not-allowed text-white bg-sky-700  font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800"
                                        type="">
                                        Out of Stock
                                    </button>
                                    @elseif ($item->isDipinjamOleh(Auth::user()->no_anggota, $item->id_buku))
                                        <button
                                            class="block cursor-not-allowed text-white bg-sky-700  font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800"
                                            type="">
                                            Already Have
                                        </button>
                                    @else
                                    <button wire:click='delete({{$item->id_buku}})' data-modal-target="borrow-book" data-modal-toggle="borrow-book"
                                        class="block text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800"
                                        type="button">
                                        Borrow
                                    </button>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('buku.edit')
    @include('buku.delete')
    @include('buku.borrow')
</div>