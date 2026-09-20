<x-layouts.dashboard title="Edit Pengumuman">
    <div class="md:grid grid-cols-2 gap-8">
        <div class="mb-3">
            <div class="card">
                <form action="{{ route('dekan.pengumuman.update', $pengumuman) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="judulInput" class="block text-sm font-medium mb-2">Judul</label>
                        <input type="text" id="judulInput" name="judul" value="{{ $pengumuman->judul }}"
                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="konten" class="block text-sm font-medium mb-2">Isi Pengumuman</label>
                        <textarea id="konten" name="konten" rows="7"
                            class="py-2 px-3 sm:py-3 sm:px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            rows="3">{{ $pengumuman->konten }}</textarea>
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">

                        <button type="submit"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center">
            <img src="{{ asset('assets/images/pengumuman.svg') }}" alt="" class="w-2/3">
        </div>
    </div>

</x-layouts.dashboard>
