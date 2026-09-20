@push('scripts')
    <script type="module">
        let fullInformasi = $('.card-text').map((_, e) => e.innerHTML)

        $(window).on('load', function() {
            let text = $('.card-text').map((_, e) => e)
            text.each((index, e) => {
                console.log(index)
                let informasi = e.innerHTML
                if (informasi.length > 201) {
                    text[index].innerHTML = informasi.substr(0, 200) + '&hellip;'
                }
            })
        });

        function toggleRead(id, index) {
            let informasi = $(id)[0].innerHTML
            if (informasi.length > 201) {
                $(id)[0].innerHTML = informasi.substr(0, 200) + '&hellip;'
                $('#toggle' + index)[0].innerHTML = "Lihat selengkapnya"
            } else {
                $(id)[0].innerHTML = fullInformasi[index]
                $('#toggle' + index)[0].innerHTML = "Sembunyikan"
            }
        }

        function deleteData(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Informasi ini akan terhapus dari database.",
                icon: 'warning',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#formDelete${id}`).submit();
                }
            });
        }

        window.toggleRead = toggleRead
        window.deleteData = deleteData
    </script>
@endpush

<x-layouts.dashboard title="Pengumuman">
    <div class="md:grid grid-cols-2 gap-8">
        <div>
            <div class="flex justify-end mb-4">
                <button type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal"
                    data-hs-overlay="#hs-scale-animation-modal">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                </button>
            </div>

            <div id="hs-scale-animation-modal"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
                role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
                <div
                    class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                    <div
                        class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">
                        <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                            <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800">
                                Form Pengumuman
                            </h3>
                            <button type="button"
                                class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <form action="{{ route('dekan.pengumuman.store') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="p-4 overflow-y-auto">
                                <div class="mb-3">
                                    <label for="judulInput" class="block text-sm font-medium mb-2">Judul</label>
                                    <input type="text" id="judulInput" name="judul"
                                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="konten" class="block text-sm font-medium mb-2">Isi Pengumuman</label>
                                    <textarea id="konten" name="konten" rows="7"
                                        class="py-2 px-3 sm:py-3 sm:px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        rows="3"></textarea>
                                </div>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                                <button type="button"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                    data-hs-overlay="#hs-scale-animation-modal">
                                    Tutup
                                </button>
                                <button type="submit"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Tambah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @forelse ($daftarPengumuman as $pengumuman)
                <div class="bg-white rounded-lg shadow px-6 py-4 my-3">
                    <div class="flex items-center justify-between">
                        <h5 class="text-lg font-semibold">{{ $pengumuman->judul }}</h5>
                        <h6 class="text-sm text-gray-600">{{ tanggal($pengumuman->created_at) }}</h6>
                    </div>
                    <p class="mt-2 text-gray-700 card-text" id="informasi{{ $pengumuman->id }}">
                        {{ $pengumuman->konten }}</p>
                    @if (Str::length($pengumuman->konten) > 201)
                        <span class="text-blue-500 underline cursor-pointer" id="toggle{{ $loop->index }}"
                            onclick="toggleRead('#informasi{{ $pengumuman->id }}', {{ $loop->index }})">Lihat
                            selengkapnya</span>
                    @endif
                    <div class="flex items-center justify-end mt-4">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1"
                            onclick="document.location.href = '{{ Request::url() }}?id={{ $pengumuman->id }}'">
                            <i data-lucide="edit" class="w-4 h-4"></i>
                        </button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded m-1"
                            onclick="deleteData({{ $pengumuman->id }})">
                            <i data-lucide="trash" class="w-4 h-4"></i>
                        </button>
                        <form action="{{ route('dekan.pengumuman.destroy', $pengumuman) }}" class="inline"
                            method="POST" id="formDelete{{ $pengumuman->id }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $pengumuman->id }}">
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow px-6 py-4 mb-5">
                    <div class="flex items-center justify-center py-5">
                        <div class="text-center">
                            <div class="text-lg">Belum ada pengumuman apapun</div>
                            <span class="text-sm text-gray-600">Tekan tombol + untuk mulai menulis pengumuman</span>
                        </div>
                    </div>
                </div>
            @endforelse

            @if ($daftarPengumuman->hasPages())
                <div class="card">
                    {{ $daftarPengumuman->links() }}
                </div>
            @endif
        </div>

        <div class="hidden lg:flex items-center justify-center">
            <img src="{{ asset('assets/images/pengumuman.svg') }}" alt="" class="w-2/3">
        </div>
    </div>
</x-layouts.dashboard>
