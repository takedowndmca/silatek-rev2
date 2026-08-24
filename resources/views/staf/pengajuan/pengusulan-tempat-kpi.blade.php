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

                                    <div class="mb-3">
                                        <label for="nomorInput" class="block text-sm font-medium mb-2">Nomor
                                            Surat</label>
                                        <input type="text" id="nomorInput" name="nomor"
                                            value="{{ App\Utils\NomorSurat::keputusan() }}"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pembimbingInput"
                                            class="block text-sm font-medium mb-2">Pembimbing</label>
                                        <input type="text" id="pembimbingInput" name="pembimbing"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mahasiswa" class="block text-sm font-medium mb-2">Mahasiswa</label>
                                        <textarea id="mahasiswa" name="mahasiswa"
                                            class="py-2 px-3 sm:py-3 sm:px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                            rows="3"></textarea>
                                        <span class="text-gray-500 text-sm mt-1">Masukkan data mahasiswa dengan format
                                            (Nama / NIM) dan dipisahkan
                                            dengan baris baru</span>
                                    </div>
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
                                @csrf
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
                                    <button type="submit"
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
