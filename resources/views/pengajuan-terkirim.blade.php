<x-layouts.main>

    {{-- TIMELINE STATUS PENGAJUAN --}}
<div class="max-w-2xl mx-auto mb-8">

    <h2 class="text-lg font-semibold text-gray-800 mb-6">
        Status Pengajuan
    </h2>

    @php
        $statusSekarang = $pengajuan->status;

        $statuses = [
            'diajukan' => [
                'label' => 'Diajukan',
                'description' => 'Pengajuan telah dikirim dan sedang diproses oleh TU.',
            ],
            'menunggu_wakil_dekan' => [
                'label' => 'Menunggu Wakil Dekan',
                'description' => 'Pengajuan sedang menunggu persetujuan Wakil Dekan.',
            ],
            'menunggu_dekan' => [
                'label' => 'Menunggu Dekan',
                'description' => 'Pengajuan telah disetujui Wakil Dekan dan menunggu persetujuan Dekan.',
            ],
            'selesai' => [
                'label' => 'Selesai',
                'description' => 'Pengajuan telah disetujui dan surat telah selesai.',
            ],
        ];

        $urutanStatus = array_keys($statuses);

        if ($statusSekarang === 'ditolak') {
            $statusAktif = null;
        } else {
            $statusAktif = array_search($statusSekarang, $urutanStatus);
        }
    @endphp

    <div class="relative">

        {{-- GARIS TIMELINE --}}
        <div class="absolute left-4 top-4 bottom-4 w-0.5 bg-gray-200"></div>

        @foreach ($statuses as $key => $item)

            @php
                $index = array_search($key, $urutanStatus);

                if ($statusSekarang === 'ditolak') {
                    $selesai = false;
                } else {
                    $selesai = $index <= $statusAktif;
                }

                $sedangAktif = $statusSekarang === $key;
            @endphp

            <div class="relative flex gap-x-4 pb-8 last:pb-0">

                {{-- BULATAN --}}
                <div class="relative z-10 flex items-center justify-center
                    size-8 rounded-full shrink-0
                    @if ($selesai)
                        bg-blue-600 text-white
                    @else
                        bg-gray-200 text-gray-400
                    @endif">

                    @if ($selesai)
                        <svg class="size-4"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="3"
                             stroke-linecap="round"
                             stroke-linejoin="round">

                            <path d="m5 12 5 5L20 7"/>
                        </svg>
                    @else
                        <div class="size-2 rounded-full bg-gray-400"></div>
                    @endif

                </div>

                {{-- ISI --}}
                <div class="flex-1 pt-1">

                    <div class="flex items-center justify-between gap-3">

                        <h3 class="
                            font-semibold
                            @if ($sedangAktif)
                                text-blue-600
                            @else
                                text-gray-800
                            @endif
                        ">
                            {{ $item['label'] }}
                        </h3>

                        @if ($sedangAktif)
                            <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">
                                Saat ini
                            </span>
                        @endif

                    </div>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $item['description'] }}
                    </p>

                    {{-- UPDATED AT UNTUK STATUS TERAKHIR --}}
                    @if ($sedangAktif)
                        <p class="text-xs text-gray-400 mt-2">
                            Terakhir diperbarui:
                            {{ $pengajuan->updated_at->timezone('Asia/Makassar')->format('d M Y, H:i') }}
                            WITA
                        </p>
                    @endif

                </div>

            </div>

        @endforeach


        {{-- JIKA DITOLAK --}}
        @if ($statusSekarang === 'ditolak')

            <div class="relative flex gap-x-4">

                {{-- BULATAN MERAH --}}
                <div class="relative z-10 flex items-center justify-center
                    size-8 rounded-full shrink-0
                    bg-red-600 text-white">

                    <svg class="size-4"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="3"
                         stroke-linecap="round"
                         stroke-linejoin="round">

                        <path d="M18 6 6 18"/>
                        <path d="m6 6 12 12"/>

                    </svg>

                </div>

                <div class="flex-1 pt-1">

                    <div class="flex items-center justify-between gap-3">

                        <h3 class="font-semibold text-red-600">
                            Ditolak
                        </h3>

                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">
                            Saat ini
                        </span>

                    </div>

                    <p class="text-sm text-gray-500 mt-1">
                        Pengajuan Anda ditolak.
                    </p>

                    @if ($pengajuan->alasan_ditolak)
                        <div class="mt-2 p-3 rounded-lg bg-red-50 border border-red-200">
                            <p class="text-sm text-red-700">
                                <span class="font-semibold">Alasan:</span>
                                {{ $pengajuan->alasan_ditolak }}
                            </p>
                        </div>
                    @endif

                    <p class="text-xs text-gray-400 mt-2">
                        Terakhir diperbarui:
                        {{ $pengajuan->updated_at->timezone('Asia/Makassar')->format('d M Y, H:i') }}
                        WITA
                    </p>

                </div>

            </div>

        @endif

    </div>

</div>


        {{-- PESAN BERDASARKAN STATUS --}}

        @if ($pengajuan->status === 'selesai' && $pengajuan->surat && $pengajuan->surat->ttd)

            <h1 class="text-xl font-semibold text-gray-800 text-center my-3">
                Surat pengajuan Anda telah selesai
            </h1>

            <div class="text-center mb-5">
                @foreach (array_keys(config('layanan')[$layanan]['pdf']) as $pdf)
                    <a href="{{ route('pengajuan.pdf', [$layanan, $pengajuan->uuid]) }}?jenis={{ $pdf }}"
                       target="_blank"
                       class="px-4 py-2 rounded-lg bg-blue-600 text-white inline-block">

                        Buka {{ $pdf }}

                    </a>

                @endforeach

            </div>

        @elseif ($pengajuan->status === 'ditolak')

            <h1 class="text-xl font-semibold text-red-600 text-center my-3">
                Pengajuan Anda ditolak
            </h1>

            @if ($pengajuan->alasan_ditolak)

                <div class="max-w-xl mx-auto bg-red-50 border border-red-200 rounded-lg p-4 mb-5">

                    <p class="text-sm text-red-700">
                        <strong>Alasan:</strong>
                        {{ $pengajuan->alasan_ditolak }}
                    </p>

                </div>

            @endif

        @else

            <h1 class="text-xl font-semibold text-gray-800 text-center my-3">
                Surat pengajuan Anda sedang dalam proses,
                silahkan kembali lagi nanti
            </h1>

        @endif
    </div>
</x-layouts.main>
