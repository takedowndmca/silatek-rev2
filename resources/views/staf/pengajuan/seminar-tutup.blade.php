@push('scripts')
    <script type="module">
        new DataTable('#myTable', {
            paging: false,
            ordering: false,
            info: false,
        });


        // =========================================================
        // CONTAINER
        // =========================================================

        const pembimbingContainer =
            document.getElementById('pembimbing-container');

        const pengujiContainer =
            document.getElementById('penguji-container');


        // =========================================================
        // UPDATE NAME PEMBIMBING
        // =========================================================

        function updatePembimbingNames() {

            const items =
                pembimbingContainer.querySelectorAll('.pembimbing-item');

            items.forEach((item, index) => {

                const nomor = index + 1;

                const input = item.querySelector('input');

                if (input) {
                    input.name = `pembimbing[${nomor}]`;
                    input.placeholder = `Pembimbing ${nomor}`;
                }
            });

            updateKetuaDariPembimbing();
            updateSekretarisDariPembimbing();
        }


        // =========================================================
        // UPDATE NAME PENGUJI
        // =========================================================

        function updatePengujiNames() {

            const items =
                pengujiContainer.querySelectorAll('.penguji-item');

            items.forEach((item, index) => {

                const nomor = index + 1;

                const input = item.querySelector('input');

                if (input) {
                    input.name = `penguji[${nomor}]`;
                    input.placeholder = `Penguji ${nomor}`;
                }
            });
        }


        // =========================================================
        // BUAT PEMBIMBING
        // =========================================================

        function buatPembimbing() {

            const div = document.createElement('div');

            div.className =
                'pembimbing-item flex gap-2 mb-2';

            div.innerHTML = `
                <input type="text"
                    class="py-2.5 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm"
                    required>

                <button type="button"
                    class="hapus-pembimbing px-3 text-red-500 hover:text-red-700">
                    ×
                </button>
            `;

            pembimbingContainer.appendChild(div);

            updatePembimbingNames();
        }


        // =========================================================
        // BUAT PENGUJI
        // =========================================================

        function buatPenguji() {

            const div = document.createElement('div');

            div.className =
                'penguji-item flex gap-2 mb-2';

            div.innerHTML = `
                <input type="text"
                    class="py-2.5 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm"
                    required>

                <button type="button"
                    class="hapus-penguji px-3 text-red-500 hover:text-red-700">
                    ×
                </button>
            `;

            pengujiContainer.appendChild(div);

            updatePengujiNames();
        }


        // =========================================================
        // UPDATE TOMBOL HAPUS PEMBIMBING
        // =========================================================

        function updateNomorPembimbing() {

            const items =
                pembimbingContainer.querySelectorAll('.pembimbing-item');

            items.forEach((item, index) => {

                const tombolHapus =
                    item.querySelector('.hapus-pembimbing');

                if (index === 0) {

                    if (tombolHapus) {
                        tombolHapus.remove();
                    }

                } else {

                    if (!tombolHapus) {

                        item.insertAdjacentHTML(
                            'beforeend',
                            `
                            <button type="button"
                                class="hapus-pembimbing px-3 text-red-500 hover:text-red-700">
                                ×
                            </button>
                            `
                        );
                    }
                }
            });
        }


        // =========================================================
        // UPDATE TOMBOL HAPUS PENGUJI
        // =========================================================

        function updateNomorPenguji() {

            const items =
                pengujiContainer.querySelectorAll('.penguji-item');

            items.forEach((item, index) => {

                const tombolHapus =
                    item.querySelector('.hapus-penguji');

                if (index === 0) {

                    if (tombolHapus) {
                        tombolHapus.remove();
                    }

                } else {

                    if (!tombolHapus) {

                        item.insertAdjacentHTML(
                            'beforeend',
                            `
                            <button type="button"
                                class="hapus-penguji px-3 text-red-500 hover:text-red-700">
                                ×
                            </button>
                            `
                        );
                    }
                }
            });
        }


        // =========================================================
        // TAMBAH PEMBIMBING
        // =========================================================

        document
            .getElementById('tambahPembimbing')
            .addEventListener('click', function() {

                buatPembimbing();

                updateNomorPembimbing();

                updatePembimbingNames();
            });


        // =========================================================
        // TAMBAH PENGUJI
        // =========================================================

        document
            .getElementById('tambahPenguji')
            .addEventListener('click', function() {

                buatPenguji();

                updateNomorPenguji();

                updatePengujiNames();
            });


        // =========================================================
        // HAPUS PEMBIMBING / PENGUJI
        // =========================================================

        document.addEventListener('click', function(event) {

            if (
                event.target.classList.contains(
                    'hapus-pembimbing'
                )
            ) {

                const item =
                    event.target.closest('.pembimbing-item');

                if (item) {
                    item.remove();
                }

                updateNomorPembimbing();
                updatePembimbingNames();
            }


            if (
                event.target.classList.contains(
                    'hapus-penguji'
                )
            ) {

                const item =
                    event.target.closest('.penguji-item');

                if (item) {
                    item.remove();
                }

                updateNomorPenguji();
                updatePengujiNames();
            }

        });


        // =========================================================
        // KETUA SIDANG
        // SAMA DENGAN PEMBIMBING 1
        // =========================================================

        const ketuaCheckbox =
            document.getElementById('ketuaSamaPembimbing');

        const ketuaInput =
            document.getElementById('ketuaSidang');


        function updateKetuaDariPembimbing() {

            if (!ketuaCheckbox || !ketuaInput) {
                return;
            }

            if (!ketuaCheckbox.checked) {
                return;
            }

            const pembimbing1 =
                pembimbingContainer.querySelector(
                    'input[name="pembimbing[1]"]'
                );

            if (pembimbing1) {

                ketuaInput.value =
                    pembimbing1.value;

                ketuaInput.readOnly = true;
            }
        }


        if (ketuaCheckbox) {

            ketuaCheckbox.addEventListener(
                'change',
                function() {

                    if (this.checked) {

                        const pembimbing1 =
                            pembimbingContainer.querySelector(
                                'input[name="pembimbing[1]"]'
                            );

                        if (pembimbing1) {

                            ketuaInput.value =
                                pembimbing1.value;

                            ketuaInput.readOnly = true;
                        }

                    } else {

                        ketuaInput.value = '';

                        ketuaInput.readOnly = false;
                    }
                }
            );
        }


        // =========================================================
        // SEKRETARIS SIDANG
        // SAMA DENGAN PEMBIMBING 2
        // =========================================================

        const sekretarisCheckbox =
            document.getElementById(
                'sekretarisSamaPembimbing'
            );

        const sekretarisInput =
            document.getElementById(
                'sekretarisSidang'
            );


        function updateSekretarisDariPembimbing() {

            if (
                !sekretarisCheckbox ||
                !sekretarisInput
            ) {
                return;
            }

            if (!sekretarisCheckbox.checked) {
                return;
            }

            const pembimbing2 =
                pembimbingContainer.querySelector(
                    'input[name="pembimbing[2]"]'
                );

            if (pembimbing2) {

                sekretarisInput.value =
                    pembimbing2.value;

                sekretarisInput.readOnly = true;
            }
        }


        if (sekretarisCheckbox) {

            sekretarisCheckbox.addEventListener(
                'change',
                function() {

                    if (this.checked) {

                        const pembimbing2 =
                            pembimbingContainer.querySelector(
                                'input[name="pembimbing[2]"]'
                            );

                        if (pembimbing2) {

                            sekretarisInput.value =
                                pembimbing2.value;

                            sekretarisInput.readOnly = true;
                        }

                    } else {

                        sekretarisInput.value = '';

                        sekretarisInput.readOnly = false;
                    }
                }
            );
        }


        // =========================================================
        // KETIKA PEMBIMBING DIUBAH
        // =========================================================

        pembimbingContainer.addEventListener(
            'input',
            function(event) {

                if (
                    event.target.matches(
                        'input[name^="pembimbing["]'
                    )
                ) {

                    updateKetuaDariPembimbing();

                    updateSekretarisDariPembimbing();
                }
            }
        );


        // =========================================================
        // DEFAULT
        // 2 PEMBIMBING
        // =========================================================

        buatPembimbing();
        buatPembimbing();

        updateNomorPembimbing();
        updatePembimbingNames();


        // =========================================================
        // DEFAULT
        // 3 PENGUJI
        // =========================================================

        buatPenguji();
        buatPenguji();
        buatPenguji();

        updateNomorPenguji();
        updatePengujiNames();
    </script>
@endpush

<x-layouts.dashboard title="Detail Pengajuan {{ config('layanan')[$layanan]['label'] }}">
    <div class="card">
        <div class="md:grid grid-cols-2 gap-8">
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-5">Data Mahasiswa</h2>

                <div class="mb-3">
                    <span class="block text-sm font-medium">Nama Lengkap</span>
                    <span class="block w-full">
                        {{ $pengajuan->nama }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">Nomor Induk Mahasiswa</span>
                    <span class="block w-full">
                        {{ $pengajuan->nim }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">Program Studi</span>
                    <span class="block w-full">
                        {{ $pengajuan->prodi }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">Angkatan</span>
                    <span class="block w-full">
                        {{ $pengajuan->angkatan }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">Nomor Telepon</span>
                    <span class="block w-full">
                        {{ $pengajuan->no_telp }}
                    </span>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-5">Berkas Pengajuan</h2>
                <div class="mb-5">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Berkas</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajuan->berkas as $berkas)
                                <tr>
                                    <td>{{ $berkas->berkas }}</td>
                                    <td class="text-end">
                                        <a href="{{ asset('files/pengajuan/' . $layanan . '/' . $berkas->file) }}"
                                            class="text-blue-600 hover:text-blue-900" target="_blank">Lihat Berkas</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <button type="button"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="formSurat" data-hs-overlay="#formSurat">
                    <i data-lucide="file" class="w-4 h-4"></i> Buat Surat
                </button>

                <button type="button"
                    class="mt-1 w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="tolakPengajuan"
                    data-hs-overlay="#tolakPengajuan">
                    <i data-lucide="x" class="w-4 h-4"></i> Berkas Tidak Sesuai
                </button>

                <div id="formSurat"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
                    role="dialog" tabindex="-1" aria-labelledby="formSurat-label">
                    <div
                        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                        <div
                            class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                                <h3 id="formSurat-label" class="font-bold text-gray-800">
                                    Buat Surat {{ config('layanan')[$layanan]['label'] }}
                                </h3>
                                <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                    aria-label="Close" data-hs-overlay="#formSurat">
                                    <span class="sr-only">Close</span>
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <form action="{{ route('staf.layanan.terima', [$layanan, $pengajuan]) }}" method="post">
                                @csrf
                                <div class="p-4 overflow-y-auto">
                                    <x-errors />

                                    <h3 class="text-sm font-semibold text-gray-800 mb-3">Surat Keputusan</h3>
                                    <div class="mb-3">
                                        <label for="nomorSKInput" class="block text-sm font-medium mb-2">Nomor
                                            Surat Keputusan</label>
                                        <input type="text" id="nomorSKInput" name="nomor_sk"
                                            value="{{ App\Utils\NomorSurat::keputusan() }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            required>
                                    </div>
                                    {{-- =========================================================
     PEMBIMBING
========================================================= --}}

                                    <div class="mb-5">
                                        <div class="flex justify-between items-center mb-2">

                                            <label class="block text-sm font-medium">
                                                Pembimbing
                                            </label>

                                            <button type="button" id="tambahPembimbing"
                                                class="text-sm text-blue-600 hover:text-blue-800">
                                                + Tambah Pembimbing
                                            </button>

                                        </div>

                                        <div id="pembimbing-container"></div>
                                    </div>


                                    {{-- =========================================================
     KETUA SIDANG
========================================================= --}}

                                    <div class="mb-5">

                                        <div class="flex items-center justify-between mb-2">

                                            <label for="ketuaSidang" class="block text-sm font-medium">
                                                Ketua Sidang
                                            </label>

                                            <label
                                                class="inline-flex items-center gap-2 text-sm text-gray-600 cursor-pointer">

                                                <input type="checkbox" id="ketuaSamaPembimbing"
                                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">

                                                Sama dengan Pembimbing 1

                                            </label>

                                        </div>

                                        <input type="text" id="ketuaSidang" name="ketua_sidang"
                                            placeholder="Nama Ketua Sidang"
                                            class="py-2.5 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm"
                                            required>

                                    </div>


                                    {{-- =========================================================
     SEKRETARIS SIDANG
========================================================= --}}

                                    <div class="mb-5">

                                        <div class="flex items-center justify-between mb-2">

                                            <label for="sekretarisSidang" class="block text-sm font-medium">
                                                Sekretaris Sidang
                                            </label>

                                            <label
                                                class="inline-flex items-center gap-2 text-sm text-gray-600 cursor-pointer">

                                                <input type="checkbox" id="sekretarisSamaPembimbing"
                                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">

                                                Sama dengan Pembimbing 2

                                            </label>

                                        </div>

                                        <input type="text" id="sekretarisSidang" name="sekretaris_sidang"
                                            placeholder="Nama Sekretaris Sidang"
                                            class="py-2.5 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm"
                                            required>

                                    </div>


                                    {{-- =========================================================
     PENGUJI
========================================================= --}}

                                    <div class="mb-5">

                                        <div class="flex justify-between items-center mb-2">

                                            <label class="block text-sm font-medium">
                                                Penguji
                                            </label>

                                            <button type="button" id="tambahPenguji"
                                                class="text-sm text-blue-600 hover:text-blue-800">
                                                + Tambah Penguji
                                            </button>

                                        </div>

                                        <div id="penguji-container"></div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="judulSkripsiInput" class="block text-sm font-medium mb-2">Judul
                                            Skripsi</label>
                                        <input type="text" id="judulSkripsiInput" name="judul_skripsi"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            required>
                                    </div>

                                    <hr class="my-4 border-gray-200">

                                    <h3 class="text-sm font-semibold text-gray-800">Surat Undangan</h3>
                                    <div class="mb-3">
                                        <label for="nomorUndanganInput" class="block text-sm font-medium mb-2">Nomor
                                            Surat Undangan</label>
                                        <input type="text" id="nomorUndanganInput" name="nomor_undangan"
                                            value="{{ App\Utils\NomorSurat::undangan() }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalUjianInput" class="block text-sm font-medium mb-2">Tanggal
                                            Ujian</label>
                                        <input type="date" id="tanggalUjianInput" name="tanggal_ujian"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="waktuInput" class="block text-sm font-medium mb-2">Waktu</label>
                                        <input type="text" id="waktuInput" name="waktu"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tempatInput" class="block text-sm font-medium mb-2">Tempat</label>
                                        <input type="text" id="tempatInput" name="tempat"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            required>
                                    </div>

                                    <hr class="my-4 border-gray-200">

                                    <div class="mb-3">
                                        <label for="tanggalSuratInput" class="block text-sm font-medium mb-2">Tanggal
                                            Surat</label>
                                        <input type="date" id="tanggalSuratInput" name="tanggal_surat"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            required>
                                    </div>
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        data-hs-overlay="#formSurat">
                                        Tutup
                                    </button>
                                    <button type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Buat Surat
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="tolakPengajuan"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
                    role="dialog" tabindex="-1" aria-labelledby="tolakPengajuan-label">
                    <div
                        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                        <div
                            class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                                <h3 id="tolakPengajuan-label" class="font-bold text-gray-800">
                                    Tolak Pengajuan
                                </h3>
                                <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                    aria-label="Close" data-hs-overlay="#tolakPengajuan">
                                    <span class="sr-only">Close</span>
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <form action="{{ route('staf.layanan.tolak', [$layanan, $pengajuan]) }}" method="post">
                                <div class="p-4 overflow-y-auto">
                                    <div class="mb-3">
                                        <label for="alasan" class="block text-sm font-medium mb-2">Alasan</label>
                                        <textarea id="alasan" name="alasan"
                                            class="py-2 px-3 sm:py-3 sm:px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        data-hs-overlay="#tolakPengajuan">
                                        Tutup
                                    </button>
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Kembalikan Pengajuan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
