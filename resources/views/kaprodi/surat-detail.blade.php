@push('scripts')
    <script type="module">
        new DataTable('#myTable', {
            paging: false,
            ordering: false,
            info: false,
        })

        $('#btnTerima').on('click', (event) => {
            Swal.fire({
                title: 'Setujui Surat',
                text: 'Apakah Anda yakin ingin menyetujui surat ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#terimaPengajuan').submit()
                }
            })
        })

        $('#btnTolak').on('click', (event) => {
            Swal.fire({
                title: 'Tolak Surat',
                text: 'Apakah Anda yakin ingin menolak surat ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tolak!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#tolakPengajuan').submit()
                }
            })
        })
    </script>
@endpush

<x-layouts.dashboard title="Surat {{ config('layanan')[$layanan]['label'] }}">
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
                <h2 class="text-lg font-semibold text-gray-800 mb-5">Daftar Surat</h2>
                <div class="mb-5">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Jenis Surat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (array_keys(config('layanan')[$layanan]['pdf']) as $pdf)
                                <tr>
                                    <td>{{ ucfirst($pdf) }} {{ config('layanan')[$layanan]['label'] }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('dekan.surat.pdf', [$layanan, $pengajuan->uuid]) }}?jenis={{ $pdf }}"
                                            target="_blank" class="text-blue-600 hover:text-blue-900"
                                            target="_blank">Lihat Surat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                @if (!$pengajuan->surat->ttd)
                    <form action="{{ route('dekan.surat.terima', [$layanan, $pengajuan]) }}" method="post"
                        id="terimaPengajuan">
                        @csrf
                        <button type="button" id="btnTerima"
                            class="mt-1 w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-500 text-white hover:bg-green-700 focus:outline-hidden focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                            <i data-lucide="check" class="w-4 h-4"></i> Setujui Surat
                        </button>
                    </form>

                    <form action="{{ route('dekan.surat.tolak', [$layanan, $pengajuan]) }}" method="post"
                        id="tolakPengajuan">
                        @csrf
                        <button type="button" id="btnTolak"
                            class="mt-1 w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                            <i data-lucide="x" class="w-4 h-4"></i> Tolak Surat
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-layouts.dashboard>
