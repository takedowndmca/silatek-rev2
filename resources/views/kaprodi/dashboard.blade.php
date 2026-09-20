<x-layouts.dashboard title="Dashboard Kaprodi">

{{-- Statistik --}}
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

    {{-- Total --}}
    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
        <div class="flex items-center gap-x-4">
            <div class="size-12 flex justify-center items-center rounded-lg bg-blue-100 text-blue-600">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5h6" />
                </svg>
            </div>

            <div>
                <p class="text-sm text-gray-500">Total Pengajuan</p>
                <p class="text-2xl font-semibold text-gray-800">
                    {{ $pengajuan->total() }}
                </p>
            </div>
        </div>
    </div>

    {{-- Menunggu --}}
    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
        <div class="flex items-center gap-x-4">
            <div class="size-12 flex justify-center items-center rounded-lg bg-yellow-100 text-yellow-600">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />
                </svg>
            </div>

            <div>
                <p class="text-sm text-gray-500">Menunggu</p>
                <p class="text-2xl font-semibold text-gray-800">
                    {{ $pengajuan->where('status', 'menunggu_wakil_dekan')->count() }}
                </p>
            </div>
        </div>
    </div>

    {{-- Ditolak --}}
    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
        <div class="flex items-center gap-x-4">
            <div class="size-12 flex justify-center items-center rounded-lg bg-red-100 text-red-600">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <div>
                <p class="text-sm text-gray-500">Ditolak</p>
                <p class="text-2xl font-semibold text-gray-800">
                    {{ $pengajuan->where('status', 'ditolak')->count() }}
                </p>
            </div>
        </div>
    </div>

    {{-- Selesai --}}
    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
        <div class="flex items-center gap-x-4">
            <div class="size-12 flex justify-center items-center rounded-lg bg-green-100 text-green-600">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <div>
                <p class="text-sm text-gray-500">Selesai</p>
                <p class="text-2xl font-semibold text-gray-800">
                    {{ $pengajuan->whereIn('status', ['selesai', 'disetujui'])->count() }}
                </p>
            </div>
        </div>
    </div>

</div>

{{-- Daftar Pengajuan --}}
<div class="bg-white border border-gray-200 rounded-xl shadow-sm">

    {{-- Header --}}
    <div class="p-5 border-b border-gray-200">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h2 class="text-lg font-semibold text-gray-800">
                    Pengajuan Mahasiswa
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Daftar pengajuan mahasiswa dari program studi Anda.
                </p>
            </div>

            {{-- Search & Filter --}}
            <form method="GET" action="{{ url()->current() }}"
                class="flex flex-col sm:flex-row gap-2">

                <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari NIM / nama..."
                    class="py-2.5 px-4 block w-full sm:w-64 border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">

                <select name="status"
                    onchange="this.form.submit()"
                    class="py-2.5 px-4 pe-9 block border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">

                    <option value="">Semua Status</option>

                    <option value="menunggu_wakil_dekan"
                        @selected(request('status') === 'menunggu_wakil_dekan')>
                        Menunggu Wakil Dekan
                    </option>

                    <option value="ditolak"
                        @selected(request('status') === 'ditolak')>
                        Ditolak
                    </option>

                    <option value="disetujui"
                        @selected(request('status') === 'disetujui')>
                        Disetujui
                    </option>

                    <option value="selesai"
                        @selected(request('status') === 'selesai')>
                        Selesai
                    </option>

                </select>

                <button type="submit"
                    class="py-2.5 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                    Cari
                </button>

            </form>

        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">
                <tr>

                    <th scope="col"
                        class="px-6 py-3 text-start text-xs font-semibold text-gray-500 uppercase">
                        Mahasiswa
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-start text-xs font-semibold text-gray-500 uppercase">
                        Layanan
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-start text-xs font-semibold text-gray-500 uppercase">
                        Status
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-start text-xs font-semibold text-gray-500 uppercase">
                        Progress
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-start text-xs font-semibold text-gray-500 uppercase">
                        Tanggal
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-end text-xs font-semibold text-gray-500 uppercase">
                        Aksi
                    </th>

                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

                @forelse ($pengajuan as $item)

    <tr class="hover:bg-gray-50">

        {{-- Mahasiswa --}}
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center gap-x-3">

                <div
                    class="size-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold">
                    {{ strtoupper(substr($item->nama ?? 'M', 0, 1)) }}
                </div>

                <div>
                    <div class="font-medium text-gray-800">
                        {{ $item->nama }}
                    </div>

                    <div class="text-sm text-gray-500">
                        {{ $item->nim }}
                    </div>
                </div>

            </div>
        </td>


        {{-- Layanan --}}
        <td class="px-6 py-4 whitespace-nowrap">
            <span class="text-sm font-medium text-gray-700">
                {{ ucwords(str_replace('-', ' ', $item->layanan)) }}
            </span>
        </td>


        {{-- Status --}}
        <td class="px-6 py-4 whitespace-nowrap">

            @php
                $status = $item->status;

                $statusClass = match ($status) {
                    'ditolak' => 'bg-red-100 text-red-700',
                    'selesai', 'disetujui' => 'bg-green-100 text-green-700',
                    'menunggu_wakil_dekan' => 'bg-yellow-100 text-yellow-700',
                    'menunggu_staf' => 'bg-blue-100 text-blue-700',
                    default => 'bg-gray-100 text-gray-700',
                };

                $statusLabel = match ($status) {
                    'ditolak' => 'Ditolak',
                    'selesai' => 'Selesai',
                    'disetujui' => 'Disetujui',
                    'menunggu_wakil_dekan' => 'Menunggu Wakil Dekan',
                    'menunggu_staf' => 'Menunggu Staf',
                    default => ucwords(str_replace('_', ' ', $status ?? 'Belum diproses')),
                };
            @endphp

            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium {{ $statusClass }}">

                <span class="size-1.5 rounded-full bg-current"></span>

                {{ $statusLabel }}

            </span>

        </td>


        {{-- Progress --}}
        <td class="px-6 py-4 min-w-[220px]">

            @php
                $steps = [
                    'menunggu_staf' => 1,
                    'menunggu_wakil_dekan' => 2,
                    'disetujui' => 3,
                    'selesai' => 4,
                ];

                $currentStep = $steps[$item->status] ?? 0;
            @endphp

            @if ($item->status === 'ditolak')

                <div class="flex items-center gap-2 text-red-600 text-sm font-medium">
                    <svg class="size-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>

                    Pengajuan ditolak
                </div>

            @else

                <div class="flex items-center">

                    @for ($step = 1; $step <= 4; $step++)

                        <div class="flex items-center">

                            <div
                                class="size-7 rounded-full flex items-center justify-center text-xs font-semibold
                                {{ $step <= $currentStep
                                    ? 'bg-blue-600 text-white'
                                    : 'bg-gray-200 text-gray-500' }}">

                                {{ $step }}

                            </div>

                            @if ($step < 4)

                                <div
                                    class="w-8 h-0.5
                                    {{ $step < $currentStep
                                        ? 'bg-blue-600'
                                        : 'bg-gray-200' }}">
                                </div>

                            @endif

                        </div>

                    @endfor

                </div>

                <div class="flex justify-between mt-1 text-[10px] text-gray-400">
                    <span>Staf</span>
                    <span>WD</span>
                    <span>Setuju</span>
                    <span>Selesai</span>
                </div>

            @endif

        </td>


        {{-- Tanggal --}}
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $item->created_at?->format('d/m/Y H:i') }}
        </td>


        {{-- Aksi --}}
        <td class="px-6 py-4 whitespace-nowrap text-end">

            <div class="inline-flex items-center gap-x-2">

                {{-- Detail --}}
                <button
                    type="button"
                    data-hs-overlay="#detail-{{ $item->id }}"
                    class="py-2 px-3 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-700 hover:bg-gray-50">

                    <svg class="size-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7z" />

                    </svg>

                    Detail

                </button>


                {{-- Delete --}}
                <button
                    type="button"
                    onclick="confirmDelete({{ $item->id }})"
                    class="py-2 px-3 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-red-200 bg-white text-red-600 hover:bg-red-50">

                    <svg class="size-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10" />

                    </svg>

                    Hapus

                </button>

                <form
                    id="delete-form-{{ $item->id }}"
                    action="{{ route('kaprodi.pengajuan.destroy', $item->id) }}"
                    method="POST"
                    class="hidden">

                    @csrf
                    @method('DELETE')

                </form>

            </div>

        </td>

    </tr>

@empty


                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">

                            <div class="flex flex-col items-center">

                                <div class="size-14 rounded-full bg-gray-100 flex items-center justify-center mb-3">
                                    <svg class="size-7 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>

                                <p class="font-medium text-gray-800">
                                    Belum ada pengajuan
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    Belum terdapat pengajuan mahasiswa pada program studi Anda.
                                </p>

                            </div>

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>
{{-- Modal Detail Semua Pengajuan --}}
@foreach ($pengajuan as $item)

    <div id="detail-{{ $item->id }}"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">

        <div
            class="hs-overlay-open:mt-7
                   hs-overlay-open:opacity-100
                   hs-overlay-open:duration-500
                   mt-0
                   opacity-0
                   ease-out
                   transition-all
                   sm:max-w-3xl
                   sm:w-full
                   m-3
                   sm:mx-auto
                   min-h-[calc(100%-3.5rem)]
                   flex
                   items-center">

            <div
                class="w-full flex flex-col bg-white border border-gray-200 shadow-xl rounded-xl pointer-events-auto">

                {{-- Header --}}
                <div class="flex justify-between items-center py-4 px-5 border-b border-gray-200">

                    <div>
                        <h3 class="font-semibold text-gray-800">
                            Detail Pengajuan
                        </h3>

                        <p class="text-xs text-gray-500 mt-1">
                            {{ $item->nim }} · {{ $item->nama }}
                        </p>
                    </div>

                    <button
                        type="button"
                        class="size-8 inline-flex justify-center items-center rounded-lg bg-gray-100 text-gray-800 hover:bg-gray-200"
                        data-hs-overlay="#detail-{{ $item->id }}">

                        <svg class="size-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />

                        </svg>

                    </button>

                </div>


                {{-- Body --}}
                <div class="p-5 max-h-[75vh] overflow-y-auto">

                    {{-- Data Mahasiswa --}}
                    <div class="mb-6">

                        <h4 class="text-sm font-semibold text-gray-800 mb-3">
                            Informasi Mahasiswa
                        </h4>

                        <div class="grid sm:grid-cols-2 gap-4">

                            <div class="p-3 bg-gray-50 rounded-lg">
                                <p class="text-xs text-gray-500">
                                    Nama
                                </p>

                                <p class="text-sm font-medium text-gray-800 mt-1">
                                    {{ $item->nama }}
                                </p>
                            </div>

                            <div class="p-3 bg-gray-50 rounded-lg">
                                <p class="text-xs text-gray-500">
                                    NIM
                                </p>

                                <p class="text-sm font-medium text-gray-800 mt-1">
                                    {{ $item->nim }}
                                </p>
                            </div>

                            <div class="p-3 bg-gray-50 rounded-lg">
                                <p class="text-xs text-gray-500">
                                    Prodi
                                </p>

                                <p class="text-sm font-medium text-gray-800 mt-1">
                                    {{ $item->prodi }}
                                </p>
                            </div>

                            <div class="p-3 bg-gray-50 rounded-lg">
                                <p class="text-xs text-gray-500">
                                    Angkatan
                                </p>

                                <p class="text-sm font-medium text-gray-800 mt-1">
                                    {{ $item->angkatan ?? '-' }}
                                </p>
                            </div>

                            <div class="p-3 bg-gray-50 rounded-lg">
                                <p class="text-xs text-gray-500">
                                    No. Telepon
                                </p>

                                <p class="text-sm font-medium text-gray-800 mt-1">
                                    {{ $item->no_telp ?? '-' }}
                                </p>
                            </div>

                            <div class="p-3 bg-gray-50 rounded-lg">
                                <p class="text-xs text-gray-500">
                                    Tanggal Pengajuan
                                </p>

                                <p class="text-sm font-medium text-gray-800 mt-1">
                                    {{ $item->created_at?->format('d F Y H:i') }}
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Pengajuan --}}
                    <div class="mb-6">

                        <h4 class="text-sm font-semibold text-gray-800 mb-3">
                            Informasi Pengajuan
                        </h4>

                        <div class="p-4 border border-gray-200 rounded-lg">

                            <div class="flex items-center justify-between gap-4">

                                <div>
                                    <p class="text-xs text-gray-500">
                                        Layanan
                                    </p>

                                    <p class="text-sm font-semibold text-gray-800 mt-1">
                                        {{ ucwords(str_replace('-', ' ', $item->layanan)) }}
                                    </p>
                                </div>

                                @php
                                    $statusClass = match ($item->status) {
                                        'ditolak' => 'bg-red-100 text-red-700',
                                        'selesai', 'disetujui' => 'bg-green-100 text-green-700',
                                        'menunggu_wakil_dekan' => 'bg-yellow-100 text-yellow-700',
                                        'menunggu_staf' => 'bg-blue-100 text-blue-700',
                                        default => 'bg-gray-100 text-gray-700',
                                    };

                                    $statusLabel = match ($item->status) {
                                        'ditolak' => 'Ditolak',
                                        'selesai' => 'Selesai',
                                        'disetujui' => 'Disetujui',
                                        'menunggu_wakil_dekan' => 'Menunggu Wakil Dekan',
                                        'menunggu_staf' => 'Menunggu Staf',
                                        default => ucwords(str_replace('_', ' ', $item->status ?? 'Belum diproses')),
                                    };
                                @endphp

                                <span
                                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium {{ $statusClass }}">

                                    <span class="size-1.5 rounded-full bg-current"></span>

                                    {{ $statusLabel }}

                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Berkas --}}
                    <div class="mb-6">

                        <div class="flex items-center justify-between mb-3">

                            <h4 class="text-sm font-semibold text-gray-800">
                                Berkas Pengajuan
                            </h4>

                            <span class="text-xs text-gray-500">
                                {{ $item->berkas->count() }} berkas
                            </span>

                        </div>


                        <div class="border border-gray-200 rounded-lg overflow-hidden">

                            @if ($item->berkas->isNotEmpty())

                                <table class="min-w-full divide-y divide-gray-200">

                                    <thead class="bg-gray-50">

                                        <tr>

                                            <th
                                                class="px-4 py-3 text-start text-xs font-semibold text-gray-500 uppercase">
                                                Berkas
                                            </th>

                                            <th
                                                class="px-4 py-3 text-end text-xs font-semibold text-gray-500 uppercase">
                                                Aksi
                                            </th>

                                        </tr>

                                    </thead>

                                    <tbody class="divide-y divide-gray-200">

                                        @foreach ($item->berkas as $berkas)

                                            <tr>

                                                <td class="px-4 py-3">

                                                    <p class="text-sm font-medium text-gray-800">
                                                        {{ $berkas->berkas }}
                                                    </p>

                                                    <p class="text-xs text-gray-500">
                                                        {{ $berkas->file }}
                                                    </p>

                                                </td>

                                                <td class="px-4 py-3 text-end">

                                                    <a
                                                        href="{{ asset('files/pengajuan/' . $item->layanan . '/' . $berkas->file) }}"
                                                        target="_blank"
                                                        class="inline-flex items-center gap-x-1.5 py-2 px-3 rounded-lg text-xs font-medium bg-blue-600 text-white hover:bg-blue-700">

                                                        <svg class="size-4"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7z" />

                                                        </svg>

                                                        Lihat Berkas

                                                    </a>

                                                </td>

                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            @else

                                <div class="p-6 text-center">

                                    <p class="text-sm text-gray-500">
                                        Belum ada berkas yang diunggah.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- Detail Surat --}}
                    @php
                        $surat = $item->surat;
                    @endphp

                    <div class="mb-6">

                        <h4 class="text-sm font-semibold text-gray-800 mb-3">
                            Detail Surat
                        </h4>

                        @if ($surat)

                            <div class="border border-gray-200 rounded-lg">

                                <div class="p-4 bg-gray-50 border-b border-gray-200">

                                    <p class="text-sm font-semibold text-gray-800">
                                        Surat {{ ucwords(str_replace('-', ' ', $item->layanan)) }}
                                    </p>
                                    {{-- Tombol Preview --}}
        <div class="flex items-center gap-2 shrink-0">

            @foreach (array_keys(config('layanan')[$item->layanan]['pdf']) as $pdf)

                <a href="{{ route('kaprodi.surat.pdf', [
                        'layanan' => $item->layanan,
                        'pengajuan' => $item->uuid,
                    ]) }}?jenis={{ $pdf }}"
                    target="_blank"
                    class="inline-flex items-center gap-x-1.5 px-3 py-1.5 rounded-lg bg-blue-600 text-white text-xs font-medium hover:bg-blue-700 transition whitespace-nowrap">

                    <svg class="size-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7 1.274 4.057 5.065 7 9.542 7z" />

                    </svg>

                    Preview {{ ucwords(str_replace('_', ' ', $pdf)) }}

                </a>

            @endforeach

        </div>

                                </div>

                                <div class="p-4">

                                    <div class="grid sm:grid-cols-2 gap-4">

                                        @if ($surat->nomor ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Nomor Surat
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ $surat->nomor }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->nomor_sk ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Nomor SK
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ $surat->nomor_sk }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->mahasiswa ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Mahasiswa
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ $surat->mahasiswa }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->pembimbing ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Pembimbing
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1 whitespace-pre-line">
                                                    {{ $surat->pembimbing }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->penguji ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Penguji
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1 whitespace-pre-line">
                                                    {{ $surat->penguji }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->judul_skripsi ?? false)
                                            <div class="sm:col-span-2">
                                                <p class="text-xs text-gray-500">
                                                    Judul Skripsi
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ $surat->judul_skripsi }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->tujuan_instansi ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Tujuan Instansi
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ $surat->tujuan_instansi }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->alamat_tujuan ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Alamat Tujuan
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ $surat->alamat_tujuan }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->tempat_kpi ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Tempat KPI
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ $surat->tempat_kpi }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->tanggal_surat ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Tanggal Surat
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d F Y') }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->tanggal_ujian ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Tanggal Ujian
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ \Carbon\Carbon::parse($surat->tanggal_ujian)->format('d F Y') }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->waktu ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Waktu
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ $surat->waktu }}
                                                </p>
                                            </div>
                                        @endif

                                        @if ($surat->tempat ?? false)
                                            <div>
                                                <p class="text-xs text-gray-500">
                                                    Tempat
                                                </p>

                                                <p class="text-sm font-medium text-gray-800 mt-1">
                                                    {{ $surat->tempat }}
                                                </p>
                                            </div>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        @else

                            <div class="border border-dashed border-gray-300 rounded-lg p-6 text-center">

                                <p class="text-sm font-medium text-gray-700">
                                    Surat belum dibuat
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Pengajuan masih dalam proses.
                                </p>

                            </div>

                        @endif

                    </div>


                    {{-- Alasan Ditolak --}}
                    @if ($item->status === 'ditolak')

                        <div class="p-4 rounded-lg bg-red-50 border border-red-200">

                            <p class="text-sm font-semibold text-red-700">
                                Alasan Penolakan
                            </p>

                            <p class="text-sm text-red-600 mt-1">
                                {{ $item->alasan_ditolak ?? 'Tidak ada alasan penolakan.' }}
                            </p>

                        </div>

                    @endif

                </div>


                {{-- Footer --}}
                <div class="flex justify-end items-center gap-x-2 py-3 px-5 border-t border-gray-200">

                    <button
                        type="button"
                        data-hs-overlay="#detail-{{ $item->id }}"
                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-700 hover:bg-gray-50">

                        Tutup

                    </button>

                </div>

            </div>

        </div>

    </div>

@endforeach

    {{-- Pagination --}}
    @if ($pengajuan->hasPages())

        <div class="px-5 py-4 border-t border-gray-200">
            {{ $pengajuan->withQueryString()->links() }}
        </div>

    @endif

</div>

{{-- Delete Confirmation --}}
<script>
    function confirmDelete(id) {

        if (confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')) {
            document.getElementById('delete-form-' + id).submit();
        }

    }
</script>

</x-layouts.dashboard>