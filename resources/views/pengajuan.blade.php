<x-layouts.main>
    <h1 class="text-xl font-semibold text-gray-800 mb-4">Pengajuan {{ config('layanan.' . $layanan)['label'] }}</h1>

    <div class="card">
        <div class="md:grid grid-cols-2 gap-8">
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-5">Data Mahasiswa</h2>

                <div class="mb-4">
                    <label for="namaInput" class="block text-sm font-medium mb-2">Nama Lengkap</label>
                    <input type="text" id="namaInput" value="{{ $mahasiswa->nama }}"
                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        readonly>
                </div>
                <div class="mb-4">
                    <label for="nimInput" class="block text-sm font-medium mb-2">Nomor Induk Mahasiswa</label>
                    <input type="text" id="nimInput" value="{{ $mahasiswa->nim }}"
                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="prodiInput" class="block text-sm font-medium mb-2">Program Studi</label>
                    <input type="text" id="prodiInput" value="{{ $mahasiswa->prodi->nama }}"
                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="angkatanInput" class="block text-sm font-medium mb-2">Angkatan</label>
                    <input type="text" id="angkatanInput" value="{{ $mahasiswa->angkatan }}"
                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        readonly>
                </div>
                <div class="mb-4">
                    <label for="noTelpInput" class="block text-sm font-medium mb-2">Nomor Telepon</label>
                    <input type="text" id="noTelpInput" value="{{ $mahasiswa->no_telp }}"
                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        readonly>
                </div>
            </div>
            <div class="mb-4">

                <h2 class="text-lg font-semibold text-gray-800">
                    Formulir Pengajuan
                </h2>

                <p class="text-gray-600 text-sm mb-5">
                    Silakan lengkapi formulir di bawah ini untuk mengajukan
                    {{ config('layanan.' . $layanan)['label'] }}.
                </p>


                {{-- ALERT JIKA DITOLAK --}}
                @if ($pengajuan && $pengajuan->ditolak)

                    <x-alert color="red">

                        <h3 class="text-sm font-semibold">
                            Pengajuan ditolak
                        </h3>

                        @if ($pengajuan->alasan_ditolak)

                            <p class="text-sm mt-1">
                                {{ $pengajuan->alasan_ditolak }}
                            </p>

                        @else

                            <p class="text-sm mt-1">
                                Silahkan ajukan ulang dengan mengupload kembali berkas dengan benar
                            </p>

                        @endif

                    </x-alert>

                @endif


                <form
                    action="{{ route('pengajuan.store', $layanan) }}"
                    method="post"
                    enctype="multipart/form-data"
                >

                    @csrf


                    {{-- ================================================= --}}
                    {{-- FIELD DINAMIS --}}
                    {{-- ================================================= --}}

                    @foreach (config("layanan.$layanan.fields", []) as $field)

                        <div class="mb-4">

                            <label
                                for="{{ $field['name'] }}"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                {{ $field['label'] }}

                                @if ($field['required'] ?? false)
                                    <span class="text-red-500">*</span>
                                @endif
                            </label>


                            {{-- TEXT --}}
                            @if ($field['type'] === 'text')

                                <input
                                    type="text"
                                    name="data[{{ $field['name'] }}]"
                                    id="{{ $field['name'] }}"
                                    value="{{ old(
                                        'data.' . $field['name'],
                                        $pengajuan?->getField($field['name'])
                                    ) }}"
                                    placeholder="{{ $field['placeholder'] ?? '' }}"
                                    @required($field['required'] ?? false)
                                    class="block w-full border border-gray-200 rounded-lg text-sm
                                        focus:border-blue-500 focus:ring-blue-500"
                                >


                            {{-- TEXTAREA --}}
                            @elseif ($field['type'] === 'textarea')

                                <textarea
                                    name="data[{{ $field['name'] }}]"
                                    id="{{ $field['name'] }}"
                                    rows="4"
                                    placeholder="{{ $field['placeholder'] ?? '' }}"
                                    @required($field['required'] ?? false)
                                    class="block w-full border border-gray-200 rounded-lg text-sm
                                        focus:border-blue-500 focus:ring-blue-500"
                                >{{ old(
                                    'data.' . $field['name'],
                                    $pengajuan?->getField($field['name'])
                                ) }}</textarea>


                            {{-- SELECT --}}
                            @elseif ($field['type'] === 'select')

                                <select
                                    name="data[{{ $field['name'] }}]"
                                    id="{{ $field['name'] }}"
                                    @required($field['required'] ?? false)
                                    class="block w-full border border-gray-200 rounded-lg text-sm
                                        focus:border-blue-500 focus:ring-blue-500"
                                >

                                    <option value="">
                                        -- Pilih {{ $field['label'] }} --
                                    </option>

                                    @foreach ($field['options'] ?? [] as $value => $label)

                                        <option
                                            value="{{ $value }}"
                                            @selected(
                                                old(
                                                    'data.' . $field['name'],
                                                    $pengajuan?->getField($field['name'])
                                                ) == $value
                                            )
                                        >
                                            {{ $label }}
                                        </option>

                                    @endforeach

                                </select>


                            {{-- DATE --}}
                            @elseif ($field['type'] === 'date')

                                <input
                                    type="date"
                                    name="data[{{ $field['name'] }}]"
                                    id="{{ $field['name'] }}"
                                    value="{{ old(
                                        'data.' . $field['name'],
                                        $pengajuan?->getField($field['name'])
                                    ) }}"
                                    @required($field['required'] ?? false)
                                    class="block w-full border border-gray-200 rounded-lg text-sm
                                        focus:border-blue-500 focus:ring-blue-500"
                                >

                            @endif


                            {{-- ERROR --}}
                            @error('data.' . $field['name'])

                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    @endforeach


                    {{-- ================================================= --}}
                    {{-- BERKAS PDF --}}
                    {{-- ================================================= --}}

                    @foreach ($daftarBerkas as $berkas)

                        <div class="mb-3">

                            <label
                                for="berkas{{ $berkas->id }}"
                                class="block text-sm font-medium mb-2"
                            >

                                {{ $berkas->nama }}

                                <span class="text-gray-500">
                                    (.pdf)
                                </span>

                            </label>

                            <input
                                type="file"
                                name="berkas[{{ $berkas->id }}]"
                                id="berkas{{ $berkas->id }}"
                                accept="application/pdf"
                                class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm
                                    focus:z-10 focus:border-blue-500 focus:ring-blue-500
                                    file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                                required
                            >

                            @if ($berkas->keterangan)

                                <span class="text-gray-500 text-sm mt-1">
                                    {{ $berkas->keterangan }}
                                </span>

                            @endif

                        </div>

                    @endforeach


                    {{-- SUBMIT --}}

                    <button
                        type="submit"
                        class="w-full py-3 mt-5 px-4 inline-flex justify-center items-center gap-x-2
                            text-sm font-medium rounded-lg border border-transparent
                            bg-blue-600 text-white hover:bg-blue-700
                            focus:outline-hidden focus:bg-blue-700
                            disabled:opacity-50 disabled:pointer-events-none"
                    >

                        <i data-lucide="upload" class="w-4 h-4"></i>

                        Kirim Pengajuan

                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.main>
