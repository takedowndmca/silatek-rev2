<x-layouts.dashboard title="Surat {{ config('layanan')[$layanan]['label'] }}">
    <div class="card">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold text-gray-800">Daftar Surat</h1>
        </div>

        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        NIM
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Nama
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Program Studi
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Tanggal Surat
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($daftarSurat as $surat)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $surat->pengajuan->nim }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $surat->pengajuan->nama }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $surat->pengajuan->prodi }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            @if ($surat->ttd)
                                                Selesai
                                            @else
                                                Proses
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ tanggal($surat->tanggal_surat) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <button type="button"
                                                onclick="location.href = '{{ route('dekan.surat.show', [$layanan, $surat->pengajuan]) }}'"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                                                Detail
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="hover:bg-gray-100">
                                        <td colspan="6"
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 text-center">
                                            Belum ada pengajuan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{ $daftarSurat->links() }}
    </div>
</x-layouts.dashboard>
