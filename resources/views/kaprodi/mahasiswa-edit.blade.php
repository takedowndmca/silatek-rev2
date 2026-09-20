@push('scripts')
    <script type="module">
        $('#passwordInput').on('keyup', function() {
            if ($(this).val().length > 0) {
                if ($('#passwordConfirmationSection').length == 0) {
                    $('#passwordSection').after(`
                        <div class="mb-3" id="passwordConfirmationSection">
                            <label class="block text-sm mb-2" for="passwordConfirmationInput">Konfirmasi Password</label>
                            <div class="relative">
                                <input id="passwordConfirmationInput" type="password" name="password_confirmation" value=""
                                    class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Masukkan ulang password" required>
                                <button type="button" data-hs-toggle-password='{"target": "#passwordConfirmationInput"}'
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
                                        <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                                            y2="22"></line>
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                                        </path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
                                        </circle>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    `)
                }
            } else {
                if ($('#passwordConfirmationSection').length > 0) {
                    $('#passwordConfirmationSection').remove()
                }
            }
        })
    </script>
@endpush

<x-layouts.dashboard title="Edit Mahasiswa">
    <div class="card">
        <div class="md:grid grid-cols-2 gap-8">
            <form action="{{ route('dekan.mahasiswa.update', $user) }}" method="post">
                @method('PUT')
                @csrf
                <x-errors />

                <div class="mb-4">
                    <label for="nimInput" class="block text-sm font-medium mb-2">Nomor Induk Mahasiswa</label>
                    <input type="text" id="nimInput" name="nim" value="{{ $user->nim }}"
                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Masukkan NIM" required>
                </div>
                <div class="mb-4">
                    <label for="namaInput" class="block text-sm font-medium mb-2">Nama Lengkap</label>
                    <input type="text" id="namaInput" name="nama" value="{{ $user->nama }}"
                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Masukkan Nama" required>
                </div>
                <div class="mb-4">
                    <label for="emailInput" class="block text-sm font-medium mb-2">Email</label>
                    <input type="email" id="emailInput" name="email" value="{{ $user->email }}"
                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Masukkan email" required>
                </div>
                <div class="mb-4" id="passwordSection">
                    <label class="block text-sm mb-2" for="passwordInput">Ganti Password</label>
                    <div class="relative">
                        <input id="passwordInput" type="password" name="password"
                            class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Masukkan password">
                        <button type="button"
                            data-hs-toggle-password='{
                              "target": "#passwordInput"
                            }'
                            class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                            <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                <path class="hs-password-active:hidden"
                                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                </path>
                                <path class="hs-password-active:hidden"
                                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                </path>
                                <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                                    y2="22"></line>
                                <path class="hidden hs-password-active:block"
                                    d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
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
                            <option value="{{ $prodi->id }}" @if ($prodi->id == $user->prodi_id) selected @endif>
                                {{ $prodi->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="noTelpInput" class="block text-sm font-medium mb-2">Nomor Telepon</label>
                    <input type="text" id="noTelpInput" name="no_telp" value="{{ $user->no_telp }}"
                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Masukkan No. Telp" required>
                </div>
                <div class="mb-4">
                    <label for="angkatanInput" class="block text-sm font-medium mb-2">Angkatan</label>
                    <input type="text" id="angkatanInput" name="angkatan" value="{{ $user->angkatan }}"
                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Masukkan Angkatan" required>
                </div>

                <button
                    class="w-full mt-3 py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-500 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Simpan
                </button>
            </form>

            <div class="hidden lg:flex items-center justify-center">
                <img src="{{ asset('assets/images/database.svg') }}" alt="" class="w-2/3">
            </div>
        </div>
    </div>
</x-layouts.dashboard>
