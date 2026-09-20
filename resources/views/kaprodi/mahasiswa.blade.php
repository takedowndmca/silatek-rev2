@push('scripts')
    <script type="module">
        new DataTable('#myTable', {
            ordering: false,
        })
    </script>
@endpush

<x-layouts.dashboard title="Mahasiswa">
    <div class="card">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold text-gray-800">Daftar Mahasiswa</h1>
            <button aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-offcanvas-right"
                data-hs-overlay="#hs-offcanvas-right"
                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                <i data-lucide="plus" class="w-4 h-4"></i>
            </button>

            <div id="hs-offcanvas-right"
                class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xs w-full z-80 bg-white border-s border-gray-200 dark:bg-neutral-800 dark:border-neutral-700"
                role="dialog" tabindex="-1" aria-labelledby="hs-offcanvas-right-label">
                <div
                    class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                    <h3 id="hs-offcanvas-right-label" class="font-bold text-gray-800 dark:text-white">
                        Form Mahasiswa
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-offcanvas-right">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4">
                    <form action="{{ route('dekan.mahasiswa.store') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="nimInput" class="block text-sm font-medium mb-2">Nomor Induk Mahasiswa</label>
                            <input type="text" id="nimInput" name="nim"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan NIM" required>
                        </div>
                        <div class="mb-4">
                            <label for="namaInput" class="block text-sm font-medium mb-2">Nama Lengkap</label>
                            <input type="text" id="namaInput" name="nama"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-4">
                            <label for="emailInput" class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" id="emailInput" name="email"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan email" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm mb-2" for="passwordInput">Password</label>
                            <div class="relative">
                                <input id="passwordInput" type="password" name="password"
                                    class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Masukkan password" required>
                                <button type="button"
                                    data-hs-toggle-password='{
                                      "target": "#passwordInput"
                                    }'
                                    class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                        </path>
                                        <line class="hs-password-active:hidden" x1="2" x2="22"
                                            y1="2" y2="22"></line>
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                            r="3">
                                        </circle>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm mb-2" for="passwordConfirmationInput">Konfirmasi
                                Password</label>
                            <div class="relative">
                                <input id="passwordConfirmationInput" type="password" name="password_confirmation"
                                    class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Masukkan password kembali" required>
                                <button type="button"
                                    data-hs-toggle-password='{
                                      "target": "#passwordConfirmationInput"
                                    }'
                                    class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                        </path>
                                        <line class="hs-password-active:hidden" x1="2" x2="22"
                                            y1="2" y2="22"></line>
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                            r="3">
                                        </circle>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="prodiSelect" class="block text-sm font-medium mb-2">Program Studi</label>
                            <select id="prodiSelect" name="prodi_id"
                                class="py-3 px-4 pe-9 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                required>
                                <option value="" hidden selected>Pilih</option>
                                @foreach ($daftarProdi as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="noTelpInput" class="block text-sm font-medium mb-2">Nomor Telepon</label>
                            <input type="text" id="noTelpInput" name="no_telp"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan No. Telp" required>
                        </div>
                        <div class="mb-4">
                            <label for="angkatanInput" class="block text-sm font-medium mb-2">Angkatan</label>
                            <input type="text" id="angkatanInput" name="angkatan"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan Angkatan" required>
                        </div>

                        <button type="submit"
                            class="w-full mt-3 py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-500 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Angkatan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->nim }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->prodi->nama }}</td>
                            <td>{{ $user->angkatan }}</td>
                            <td class="whitespace-nowrap text-end text-sm font-medium">
                                <button type="button"
                                    onclick="location.href = '{{ route('dekan.mahasiswa.edit', $user->id) }}'"
                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                                    Edit
                                </button>
                                <form action="{{ route('dekan.mahasiswa.destroy', $user->id) }}" method="post"
                                    class="inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-hidden focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>
