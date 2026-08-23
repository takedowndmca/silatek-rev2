<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <div class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white text-sm py-5">
            <div class="max-w-[85rem] w-full mx-auto px-4 flex flex-wrap basis-full items-center justify-between">
                <a class="sm:order-1 flex-none text-xl font-semibold focus:outline-hidden focus:opacity-80"
                    href="/">{{ config('app.name') }}</a>
                <div class="sm:order-3 flex items-center gap-x-2">
                    @auth('user')
                        <div
                            class="hs-dropdown [--placement:bottom-right] [--strategy:absolute] [--flip:false] hs-dropdown-example relative inline-flex ml-auto">
                            <button class="shrink-0 group text-left" id="hs-dropdown-example" aria-haspopup="menu"
                                aria-expanded="false" aria-label="Dropdown">
                                <div class="flex items-center">
                                    <img class="inline-block shrink-0 size-9.5 rounded-full"
                                        src="{{ asset('assets/images/avatar.png') }}" alt="Avatar">
                                    <div class="ms-3">
                                        <h3 class="font-semibold text-gray-800">{{ Str::limit(auth()->user()->nama, 17) }}
                                        </h3>
                                        <p class="text-sm font-medium text-gray-400">{{ auth()->user()->nim }}</p>
                                    </div>
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7">
                                        </path>
                                    </svg>
                                </div>
                            </button>

                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700"
                                role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-example">
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                    href="{{ route('user.account') }}">
                                    Akun Saya
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                    href="{{ route('auth.logout') }}">
                                    Logout
                                </a>
                            </div>
                        </div>
                    @endauth
                    @auth('admin')
                        <button type="button" onclick="location.href='{{ route('admin.index') }}'"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 shadow-2xs disabled:opacity-50 disabled:pointer-events-none">
                            Dashboard
                        </button>
                    @endauth
                    @auth('staf')
                        <button type="button" onclick="location.href='{{ route('staf.index') }}'"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 shadow-2xs disabled:opacity-50 disabled:pointer-events-none">
                            Dashboard
                        </button>
                    @endauth
                    @auth('dekan')
                        @php
                            $user = auth('dekan')->user();

                            $dashboardRoute = $user->jabatan === 'wakil_dekan'
                                ? 'wakil_dekan.index'
                                : 'dekan.index';
                        @endphp

                        <button
                            type="button"
                            onclick="location.href='{{ route($dashboardRoute) }}'"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 shadow-2xs disabled:opacity-50 disabled:pointer-events-none"
                        >
                            Dashboard
                        </button>
                    @endauth
                    @if (
                        !auth()->guard('user')->check() &&
                            !auth()->guard('admin')->check() &&
                            !auth()->guard('staf')->check() &&
                            !auth()->guard('dekan')->check())
                        <button type="button" onclick="location.href='{{ route('login') }}'"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                            Login
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full sm:pb-4 text-sm bg-gray-800">
            <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between">
                <div
                    class="flex flex-row items-center py-4 sm:pb-0 gap-5 overflow-x-auto sm:justify-end sm:overflow-x-visible [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                    <x-nav-link href="{{ route('index') }}" :active="request()->is('/')">
                        Beranda
                    </x-nav-link>
                    <x-nav-link href="{{ route('layanan') }}" :active="request()->segment(1) == 'layanan'">
                        Layanan Akademik
                    </x-nav-link>
                    <x-nav-link href="{{ route('pengumuman') }}" :active="request()->segment(1) == 'pengumuman'">
                        Pengumuman
                    </x-nav-link>
                    <x-nav-link href="{{ route('surat') }}" :active="request()->segment(1) == 'surat'">
                        Cek Surat
                    </x-nav-link>
                </div>
            </nav>
        </div>
    </header>

    <main class="max-w-[85rem] w-full mx-auto px-4 my-7 min-h-[calc(100vh-280px)]">
        {{ $slot }}
    </main>

    <footer class="max-w-[85rem] w-full mx-auto px-4 sm:px-0 mt-7 mb-2">
        <div class="bg-gray-800 p-2 rounded-xl text-gray-100">
            <p class="text-center text-sm text-gray-100">© 2025 {{ config('app.name') }}. All rights
                reserved.</p>
        </div>
    </footer>

    @if (Session::has('success'))
        <script type="module">
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ Session::get('success') }}'
            })
        </script>
    @endif

    @if (Session::has('error'))
        <script type="module">
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ Session::get('error') }}'
            })
        </script>
    @endif
</body>

</html>
