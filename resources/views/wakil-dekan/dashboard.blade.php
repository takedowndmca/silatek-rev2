<x-layouts.dashboard title="Dashboard Wakil Dekan">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                    <i class="fas fa-users"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Total Mahasiswa</p>
                    <p class="text-2xl font-semibold text-gray-700">
                        {{ number_format($totalMahasiswa) }}
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <i class="fas fa-building"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Program Studi</p>
                    <p class="text-2xl font-semibold text-gray-700">
                        {{ number_format(count($daftarProdi)) }}
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 text-red-600">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Pengumuman</p>
                    <p class="text-2xl font-semibold text-gray-700">
                        {{ number_format($totalPengumuman) }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Pengumuman Terbaru -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-700">
                    Pengumuman Terbaru
                </h3>

                <a href="{{ route('wakil_dekan.pengumuman') }}"
                    class="text-sm text-indigo-600 hover:text-indigo-800">
                    Lihat Semua
                </a>
            </div>

            <div class="space-y-4">
                @forelse ($pengumumanTerbaru as $pengumuman)
                    <div class="@if ($pengumuman->id == $pengumumanTerbaru->last()->id) border-b pb-4 @endif">
                        <div class="flex justify-between">
                            <h4 class="text-md font-medium text-gray-800">
                                {{ $pengumuman->judul }}
                            </h4>

                            <span class="text-xs text-gray-500">
                                {{ Carbon\Carbon::parse($pengumuman->created_at)->diffForHumans() }}
                            </span>
                        </div>

                        <p class="text-sm text-gray-600 mt-1">
                            {{ Str::limit($pengumuman->konten, 200) }}
                        </p>

                        <p class="text-xs text-gray-500 mt-2">
                            Oleh: {{ $pengumuman->penulis }}
                        </p>
                    </div>
                @empty
                    <p class="text-sm text-gray-600 py-14 text-center">
                        Tidak ada pengumuman
                    </p>
                @endforelse
            </div>
        </div>

        <!-- Statistik Mahasiswa -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-700">
                    Statistik Mahasiswa per Program Studi
                </h3>
            </div>

            <div class="mt-6">
                <div class="space-y-3">
                    @foreach ($daftarProdi as $prodi)
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">
                                {{ $prodi->nama }}
                            </span>

                            <span class="text-sm font-medium">
                                {{ $prodi->mahasiswa->count() }}
                            </span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-indigo-600 h-2 rounded-full"
                                style="width: {{ $prodi->mahasiswa->count() ? ($prodi->mahasiswa->count() / $totalMahasiswa) * 100 : 0 }}%">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</x-layouts.dashboard>
