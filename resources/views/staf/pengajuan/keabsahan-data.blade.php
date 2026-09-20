@push('scripts')
    <script type="module">
        new DataTable('#myTable', {
            paging: false,
            ordering: false,
            info: false,
        })

        let perubahanIndex = 1

        document.addEventListener('click', function (event) {

            if (event.target.closest('#tambahPerubahan')) {

                const container = document.getElementById('containerPerubahan')

                const html = `
                    <div class="perubahan-item border border-gray-200 rounded-lg p-4 mb-4">

                        <div class="flex justify-between items-center mb-3">
                            <span class="font-medium text-gray-800">
                                Perubahan ${perubahanIndex + 1}
                            </span>

                            <button
                                type="button"
                                class="hapusPerubahan text-red-600 hover:text-red-800 text-sm font-medium"
                            >
                                Hapus
                            </button>
                        </div>

                        <div class="mb-3">
                            <label class="block text-sm font-medium mb-2">
                                Data Salah
                            </label>

                            <input
                                type="text"
                                name="perubahan[${perubahanIndex}][salah]"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Data yang salah"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="block text-sm font-medium mb-2">
                                Data Benar
                            </label>

                            <input
                                type="text"
                                name="perubahan[${perubahanIndex}][benar]"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Data yang benar"
                                required
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Keterangan
                            </label>

                            <input
                                type="text"
                                name="perubahan[${perubahanIndex}][keterangan]"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Keterangan perubahan"
                                required
                            >
                        </div>

                    </div>
                `

                container.insertAdjacentHTML('beforeend', html)

                perubahanIndex++
            }


            if (event.target.closest('.hapusPerubahan')) {

                const item = event.target.closest('.perubahan-item')

                if (item) {
                    item.remove()
                }

            }

        })
    </script>
@endpush


<x-layouts.dashboard title="Detail Pengajuan {{ config('layanan')[$layanan]['label'] }}">

    <div class="card">

        <div class="md:grid grid-cols-2 gap-8">

            {{-- =====================================================
                 DATA MAHASISWA
                 ===================================================== --}}
            <div class="mb-4">

                <h2 class="text-lg font-semibold text-gray-800 mb-5">
                    Data Mahasiswa
                </h2>

                <div class="mb-3">
                    <span class="block text-sm font-medium">
                        Nama Lengkap
                    </span>

                    <span class="block w-full">
                        {{ $pengajuan->nama }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">
                        Nomor Induk Mahasiswa
                    </span>

                    <span class="block w-full">
                        {{ $pengajuan->nim }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">
                        Program Studi
                    </span>

                    <span class="block w-full">
                        {{ $pengajuan->prodi }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">
                        Semester
                    </span>

                    <span class="block w-full">
                        {{ $pengajuan->semester }}
                    </span>
                </div>

            </div>


            {{-- =====================================================
                 BERKAS
                 ===================================================== --}}
            <div class="mb-4">

                <h2 class="text-lg font-semibold text-gray-800 mb-5">
                    Berkas Pengajuan
                </h2>

                <div class="mb-5">

                    <table class="display">

                        <thead>
                            <tr>
                                <th>Berkas</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($pengajuan->berkas as $berkas)

                                <tr>

                                    <td>
                                        {{ $berkas->berkas }}
                                    </td>

                                    <td class="text-end">

                                        <a
                                            href="{{ asset('files/pengajuan/' . $layanan . '/' . $berkas->file) }}"
                                            class="text-blue-600 hover:text-blue-900"
                                            target="_blank"
                                        >
                                            Lihat Berkas
                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="2" class="text-center">
                                        Tidak ada berkas
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- =====================================================
                     TOMBOL BUAT SURAT
                     ===================================================== --}}
                <button
                    type="button"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700"
                    aria-haspopup="dialog"
                    aria-expanded="false"
                    aria-controls="formSurat"
                    data-hs-overlay="#formSurat"
                >

                    <i data-lucide="file" class="w-4 h-4"></i>

                    Buat Surat

                </button>


                {{-- =====================================================
                     TOMBOL TOLAK
                     ===================================================== --}}
                <button
                    type="button"
                    class="mt-1 w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700"
                    aria-haspopup="dialog"
                    aria-expanded="false"
                    aria-controls="tolakPengajuan"
                    data-hs-overlay="#tolakPengajuan"
                >

                    <i data-lucide="x" class="w-4 h-4"></i>

                    Berkas Tidak Sesuai

                </button>


                {{-- =====================================================
                     MODAL BUAT SURAT
                     ===================================================== --}}
                <div
                    id="formSurat"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
                    role="dialog"
                    tabindex="-1"
                    aria-labelledby="formSurat-label"
                >

                    <div
                        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center"
                    >

                        <div
                            class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto"
                        >

                            {{-- HEADER --}}
                            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">

                                <h3
                                    id="formSurat-label"
                                    class="font-bold text-gray-800"
                                >
                                    Buat Surat Keabsahan Data
                                </h3>

                                <button
                                    type="button"
                                    class="size-8 inline-flex justify-center items-center rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200"
                                    aria-label="Close"
                                    data-hs-overlay="#formSurat"
                                >

                                    <span class="sr-only">
                                        Close
                                    </span>

                                    <svg
                                        class="shrink-0 size-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>

                                    </svg>

                                </button>

                            </div>


                            {{-- FORM --}}
                            <form
                                action="{{ route('staf.layanan.terima', [$layanan, $pengajuan]) }}"
                                method="post"
                            >

                                @csrf

                                <div class="p-4 overflow-y-auto">

                                    <x-errors />


                                    {{-- NOMOR --}}
                                    <div class="mb-3">

                                        <label
                                            for="nomorInput"
                                            class="block text-sm font-medium mb-2"
                                        >
                                            Nomor Surat
                                        </label>

                                        <input
                                            type="text"
                                            id="nomorInput"
                                            name="nomor"
                                            value="{{ App\Utils\NomorSurat::umum() }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm"
                                            required
                                        >

                                    </div>


                                    {{-- TANGGAL --}}
                                    <div class="mb-5">

                                        <label
                                            for="tanggalSuratInput"
                                            class="block text-sm font-medium mb-2"
                                        >
                                            Tanggal Surat
                                        </label>

                                        <input
                                            type="date"
                                            id="tanggalSuratInput"
                                            name="tanggal_surat"
                                            value="{{ old('tanggal_surat', now()->format('Y-m-d')) }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm"
                                            required
                                        >

                                    </div>

                                    <div class="mb-3">
    <label
        for="semesterInput"
        class="block text-sm font-medium mb-2"
    >
        Semester
    </label>

    <input
        type="text"
        id="semesterInput"
        name="semester"
        value="{{ old('semester') }}"
        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500"
        required
    >
</div>


                                    {{-- =================================================
                                         DATA PERUBAHAN
                                         ================================================= --}}
                                    <div class="mb-3">

                                        <div class="flex justify-between items-center mb-3">

                                            <label class="block text-sm font-medium">
                                                Data Perubahan
                                            </label>

                                            <button
                                                type="button"
                                                id="tambahPerubahan"
                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700"
                                            >

                                                <span class="text-lg leading-none">
                                                    +
                                                </span>

                                                Tambah Perubahan

                                            </button>

                                        </div>


                                        {{-- PERUBAHAN PERTAMA --}}
                                        <div
                                            id="containerPerubahan"
                                        >

                                            <div class="perubahan-item border border-gray-200 rounded-lg p-4 mb-4">

                                                <div class="flex justify-between items-center mb-3">

                                                    <span class="font-medium text-gray-800">
                                                        Perubahan 1
                                                    </span>

                                                </div>


                                                {{-- SALAH --}}
                                                <div class="mb-3">

                                                    <label class="block text-sm font-medium mb-2">
                                                        Data Salah
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="perubahan[0][salah]"
                                                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm"
                                                        placeholder="Data yang salah"
                                                    >

                                                </div>


                                                {{-- BENAR --}}
                                                <div class="mb-3">

                                                    <label class="block text-sm font-medium mb-2">
                                                        Data Benar
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="perubahan[0][benar]"
                                                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm"
                                                        placeholder="Data yang benar"
                                                        required
                                                    >

                                                </div>


                                                {{-- KETERANGAN --}}
                                                <div>

                                                    <label class="block text-sm font-medium mb-2">
                                                        Keterangan
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="perubahan[0][keterangan]"
                                                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm"
                                                        placeholder="Keterangan perubahan"
                                                        required
                                                    >

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                {{-- FOOTER --}}
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">

                                    <button
                                        type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800"
                                        data-hs-overlay="#formSurat"
                                    >
                                        Tutup
                                    </button>

                                    <button
                                        type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700"
                                    >
                                        Buat Surat
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                     MODAL TOLAK
                     ===================================================== --}}
                <div
                    id="tolakPengajuan"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
                    role="dialog"
                    tabindex="-1"
                    aria-labelledby="tolakPengajuan-label"
                >

                    <div
                        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center"
                    >

                        <div
                            class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto"
                        >

                            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">

                                <h3
                                    id="tolakPengajuan-label"
                                    class="font-bold text-gray-800"
                                >
                                    Tolak Pengajuan
                                </h3>

                                <button
                                    type="button"
                                    class="size-8 inline-flex justify-center items-center rounded-full bg-gray-100 text-gray-800"
                                    aria-label="Close"
                                    data-hs-overlay="#tolakPengajuan"
                                >

                                    <span class="sr-only">
                                        Close
                                    </span>

                                    <svg
                                        class="shrink-0 size-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <path d="M18 6 6 18 6 18"></path>
                                        <path d="m6 6 12 12"></path>

                                    </svg>

                                </button>

                            </div>


                            <form
                                action="{{ route('staf.layanan.tolak', [$layanan, $pengajuan]) }}"
                                method="post"
                            >

                                @csrf

                                <div class="p-4">

                                    <div class="mb-3">

                                        <label
                                            for="alasan"
                                            class="block text-sm font-medium mb-2"
                                        >
                                            Alasan
                                        </label>

                                        <textarea
                                            id="alasan"
                                            name="alasan"
                                            class="py-2 px-3 block w-full border border-gray-200 rounded-lg sm:text-sm"
                                            rows="3"
                                        ></textarea>

                                    </div>

                                </div>


                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">

                                    <button
                                        type="button"
                                        class="py-2 px-3 rounded-lg border border-gray-200 bg-white text-gray-800"
                                        data-hs-overlay="#tolakPengajuan"
                                    >
                                        Tutup
                                    </button>

                                    <button
                                        type="submit"
                                        class="py-2 px-3 rounded-lg bg-red-600 text-white"
                                    >
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
