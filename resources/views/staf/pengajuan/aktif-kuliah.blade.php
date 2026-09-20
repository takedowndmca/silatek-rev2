@push('scripts')
    <script type="module">
        new DataTable('#myTable', {
            paging: false,
            ordering: false,
            info: false,
        })
    </script>
@endpush

<x-layouts.dashboard title="Detail Pengajuan {{ config('layanan')[$layanan]['label'] }}">
    <div class="card">
        <div class="md:grid grid-cols-2 gap-8">

            {{-- ========================================================= --}}
            {{-- DATA MAHASISWA --}}
            {{-- ========================================================= --}}
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-5">
                    Data Mahasiswa
                </h2>

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


            {{-- ========================================================= --}}
            {{-- BERKAS PENGAJUAN --}}
            {{-- ========================================================= --}}
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-5">
                    Berkas Pengajuan
                </h2>

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
                                            class="text-blue-600 hover:text-blue-900"
                                            target="_blank">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                {{-- ===================================================== --}}
                {{-- DATA YANG DIISI MAHASISWA --}}
                {{-- ===================================================== --}}
                <div class="border border-gray-200 rounded-lg p-4 mb-5">
                    <h3 class="font-semibold text-gray-800 mb-4">
                        Data Pengajuan Aktif Kuliah
                    </h3>

                    @php
                        $dataAktifKuliah = $pengajuan->data ?? [];
                    @endphp

                    <div class="mb-3">
                        <span class="block text-sm font-medium text-gray-700">
                            Semester
                        </span>

                        <span class="block text-sm text-gray-600">
                            {{ data_get($dataAktifKuliah, 'semester', '-') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <span class="block text-sm font-medium text-gray-700">
                            Alamat
                        </span>

                        <span class="block text-sm text-gray-600 whitespace-pre-line">
                            {{ data_get($dataAktifKuliah, 'alamat', '-') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <span class="block text-sm font-medium text-gray-700">
                            Nama Orang Tua/Wali
                        </span>

                        <span class="block text-sm text-gray-600">
                            {{ data_get($dataAktifKuliah, 'namaortu', '-') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <span class="block text-sm font-medium text-gray-700">
                            NIP / NRP
                        </span>

                        <span class="block text-sm text-gray-600">
                            {{ data_get($dataAktifKuliah, 'nip', '-') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <span class="block text-sm font-medium text-gray-700">
                            Pangkat / Golongan
                        </span>

                        <span class="block text-sm text-gray-600">
                            {{ data_get($dataAktifKuliah, 'pangkatgolongan', '-') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <span class="block text-sm font-medium text-gray-700">
                            Instansi
                        </span>

                        <span class="block text-sm text-gray-600">
                            {{ data_get($dataAktifKuliah, 'instansi', '-') }}
                        </span>
                    </div>

                    <div>
                        <span class="block text-sm font-medium text-gray-700">
                            Jabatan
                        </span>

                        <span class="block text-sm text-gray-600">
                            {{ data_get($dataAktifKuliah, 'jabatan', '-') }}
                        </span>
                    </div>
                </div>


                {{-- ===================================================== --}}
                {{-- TOMBOL BUAT SURAT --}}
                {{-- ===================================================== --}}
                <button type="button"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog"
                    aria-expanded="false"
                    aria-controls="formSurat"
                    data-hs-overlay="#formSurat">

                    <i data-lucide="file" class="w-4 h-4"></i>

                    Buat Surat
                </button>


                {{-- ===================================================== --}}
                {{-- TOMBOL TOLAK --}}
                {{-- ===================================================== --}}
                <button type="button"
                    class="mt-1 w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog"
                    aria-expanded="false"
                    aria-controls="tolakPengajuan"
                    data-hs-overlay="#tolakPengajuan">

                    <i data-lucide="x" class="w-4 h-4"></i>

                    Berkas Tidak Sesuai
                </button>


                {{-- ===================================================== --}}
                {{-- MODAL BUAT SURAT --}}
                {{-- ===================================================== --}}
                <div id="formSurat"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
                    role="dialog"
                    tabindex="-1"
                    aria-labelledby="formSurat-label">

                    <div
                        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">

                        <div
                            class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">

                            {{-- Header --}}
                            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">

                                <h3 id="formSurat-label"
                                    class="font-bold text-gray-800">
                                    Buat Surat {{ config('layanan')[$layanan]['label'] }}
                                </h3>

                                <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                    aria-label="Close"
                                    data-hs-overlay="#formSurat">

                                    <span class="sr-only">
                                        Close
                                    </span>

                                    <svg class="shrink-0 size-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">

                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>


                            {{-- Form --}}
                            <form action="{{ route('staf.layanan.terima', [$layanan, $pengajuan]) }}"
                                method="post">

                                @csrf

                                <div class="p-4 overflow-y-auto">

                                    <x-errors />


                                    {{-- ================================= --}}
                                    {{-- SEMESTER --}}
                                    {{-- ================================= --}}
                                    <div class="mb-3">
                                        <label for="semester"
                                            class="block text-sm font-medium mb-2">
                                            Semester
                                        </label>

                                        <select id="semester"
                                            name="semester"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                            required>

                                            <option value="">
                                                Pilih Semester
                                            </option>

                                            @for ($i = 1; $i <= 8; $i++)
                                                <option value="{{ $i }}"
                                                    @selected(old('semester', data_get($dataAktifKuliah, 'semester')) == $i)>
                                                    Semester {{ $i }}
                                                </option>
                                            @endfor

                                        </select>
                                    </div>


                                    {{-- ================================= --}}
                                    {{-- ALAMAT --}}
                                    {{-- ================================= --}}
                                    <div class="mb-3">
                                        <label for="alamat"
                                            class="block text-sm font-medium mb-2">
                                            Alamat
                                        </label>

                                        <textarea id="alamat"
                                            name="alamat"
                                            rows="4"
                                            class="py-2 px-3 sm:py-3 sm:px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                            required>{{ old('alamat', data_get($dataAktifKuliah, 'alamat')) }}</textarea>
                                    </div>


                                    {{-- ================================= --}}
                                    {{-- NAMA ORANG TUA --}}
                                    {{-- ================================= --}}
                                    <div class="mb-3">
                                        <label for="namaortu"
                                            class="block text-sm font-medium mb-2">
                                            Nama Orang Tua/Wali
                                        </label>

                                        <input type="text"
                                            id="namaortu"
                                            name="namaortu"
                                            value="{{ old('namaortu', data_get($dataAktifKuliah, 'namaortu')) }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                            required>
                                    </div>


                                    {{-- ================================= --}}
                                    {{-- NIP / NRP --}}
                                    {{-- ================================= --}}
                                    <div class="mb-3">
                                        <label for="nip"
                                            class="block text-sm font-medium mb-2">
                                            NIP / NRP
                                        </label>

                                        <input type="text"
                                            id="nip"
                                            name="nip"
                                            value="{{ old('nip', data_get($dataAktifKuliah, 'nip')) }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>


                                    {{-- ================================= --}}
                                    {{-- PANGKAT / GOLONGAN --}}
                                    {{-- ================================= --}}
                                    <div class="mb-3">
                                        <label for="pangkatgolongan"
                                            class="block text-sm font-medium mb-2">
                                            Pangkat / Golongan
                                        </label>

                                        <input type="text"
                                            id="pangkatgolongan"
                                            name="pangkatgolongan"
                                            value="{{ old('pangkatgolongan', data_get($dataAktifKuliah, 'pangkatgolongan')) }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                            required>
                                    </div>


                                    {{-- ================================= --}}
                                    {{-- INSTANSI --}}
                                    {{-- ================================= --}}
                                    <div class="mb-3">
                                        <label for="instansi"
                                            class="block text-sm font-medium mb-2">
                                            Instansi
                                        </label>

                                        <input type="text"
                                            id="instansi"
                                            name="instansi"
                                            value="{{ old('instansi', data_get($dataAktifKuliah, 'instansi')) }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                            required>
                                    </div>


                                    {{-- ================================= --}}
                                    {{-- JABATAN --}}
                                    {{-- ================================= --}}
                                    <div class="mb-3">
                                        <label for="jabatan"
                                            class="block text-sm font-medium mb-2">
                                            Jabatan
                                        </label>

                                        <input type="text"
                                            id="jabatan"
                                            name="jabatan"
                                            value="{{ old('jabatan', data_get($dataAktifKuliah, 'jabatan')) }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                            required>
                                    </div>


                                    {{-- ================================= --}}
                                    {{-- NOMOR SURAT --}}
                                    {{-- ================================= --}}
                                    <div class="mb-3">
                                        <label for="nomorInput"
                                            class="block text-sm font-medium mb-2">
                                            Nomor Surat
                                        </label>

                                        <input type="text"
                                            id="nomorInput"
                                            name="nomor"
                                            value="{{ old('nomor', App\Utils\NomorSurat::keputusan()) }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                            required>
                                    </div>


                                    {{-- ================================= --}}
                                    {{-- TANGGAL SURAT --}}
                                    {{-- ================================= --}}
                                    <div class="mb-3">
                                        <label for="tanggalSuratInput"
                                            class="block text-sm font-medium mb-2">
                                            Tanggal Surat
                                        </label>

                                        <input type="date"
                                            id="tanggalSuratInput"
                                            name="tanggal_surat"
                                            value="{{ old('tanggal_surat', now()->format('Y-m-d')) }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                            required>
                                    </div>

                                </div>


                                {{-- Footer --}}
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">

                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50"
                                        data-hs-overlay="#formSurat">

                                        Tutup
                                    </button>

                                    <button type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700">

                                        Buat Surat
                                    </button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>


                {{-- ===================================================== --}}
                {{-- MODAL TOLAK PENGAJUAN --}}
                {{-- ===================================================== --}}
                <div id="tolakPengajuan"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
                    role="dialog"
                    tabindex="-1"
                    aria-labelledby="tolakPengajuan-label">

                    <div
                        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">

                        <div
                            class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">

                            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">

                                <h3 id="tolakPengajuan-label"
                                    class="font-bold text-gray-800">
                                    Tolak Pengajuan
                                </h3>

                                <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200"
                                    aria-label="Close"
                                    data-hs-overlay="#tolakPengajuan">

                                    <span class="sr-only">
                                        Close
                                    </span>

                                    <svg class="shrink-0 size-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">

                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>

                                </button>
                            </div>


                            <form action="{{ route('staf.layanan.tolak', [$layanan, $pengajuan]) }}"
                                method="post">

                                @csrf

                                <div class="p-4 overflow-y-auto">

                                    <div class="mb-3">

                                        <label for="alasan"
                                            class="block text-sm font-medium mb-2">
                                            Alasan
                                        </label>

                                        <textarea id="alasan"
                                            name="alasan"
                                            class="py-2 px-3 sm:py-3 sm:px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                            rows="3"
                                            required></textarea>

                                    </div>

                                </div>


                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">

                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50"
                                        data-hs-overlay="#tolakPengajuan">

                                        Tutup
                                    </button>

                                    <button type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700">

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
