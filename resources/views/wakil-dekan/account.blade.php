<x-layouts.dashboard title="Akun Saya">
    <div class="card">
        <div class="flex flex-wrap">
            <div class="border-e border-gray-200">
                <nav class="flex flex-col space-y-2" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                    <button type="button"
                        class="hs-tab-active:border-red-500 hs-tab-active:text-red-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-red-600 focus:outline-hidden focus:text-red-600 disabled:opacity-50 disabled:pointer-events-none active"
                        id="vertical-tab-with-border-item-1" aria-selected="true"
                        data-hs-tab="#vertical-tab-with-border-1" aria-controls="vertical-tab-with-border-1"
                        role="tab">
                        Akun
                    </button>
                    <button type="button"
                        class="hs-tab-active:border-red-500 hs-tab-active:text-red-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-red-600 focus:outline-hidden focus:text-red-600 disabled:opacity-50 disabled:pointer-events-none"
                        id="vertical-tab-with-border-item-2" aria-selected="false"
                        data-hs-tab="#vertical-tab-with-border-2" aria-controls="vertical-tab-with-border-2"
                        role="tab">
                        Password
                    </button>
                </nav>
            </div>

            <div class="ms-3 grow">
                <div id="vertical-tab-with-border-1" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-1">
                    <div class="lg:grid grid-cols-5">
                        <form action="{{ route('dekan.account.update') }}" method="post" class="mt-5 col-span-2"
                            autocomplete="off">
                            @method('PUT')
                            @csrf

                            <x-errors />

                            <div class="mb-3">
                                <label for="nuptkInput" class="block text-sm font-medium mb-2">NUPTK</label>
                                <input type="text" id="nuptkInput" name="nuptk"
                                    class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Masukkan nuptk" value="{{ $user->nuptk }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nameInput" class="block text-sm font-medium mb-2">Nama Lengkap</label>
                                <input type="text" id="nameInput" name="nama"
                                    class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Masukkan nama" value="{{ $user->nama }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="emailInput" class="block text-sm font-medium mb-2">Email</label>
                                <input type="email" id="emailInput" name="email"
                                    class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Masukkan email" value="{{ $user->email }}" required>
                            </div>

                            <button type="submit"
                                class="mb-3 mt-5 w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-hidden focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                Simpan
                            </button>
                        </form>

                        <div class="text-center hidden lg:block col-span-3">
                            <img src="{{ asset('assets/images/account.svg') }}" alt=""
                                class="xl:w-1/2 lg:2/3 mx-auto">
                        </div>
                    </div>
                </div>
                <div id="vertical-tab-with-border-2" class="hidden" role="tabpanel"
                    aria-labelledby="vertical-tab-with-border-item-2">
                    <div class="lg:grid grid-cols-5">
                        <form action="{{ route('dekan.account.password') }}" method="post" class="mt-5 col-span-2"
                            autocomplete="off">
                            @method('PUT')
                            @csrf

                            <x-errors />

                            <div class="mb-3">
                                <label class="block text-sm font-medium mb-2" for="oldPasswordInput">Password
                                    Lama</label>
                                <div class="relative">
                                    <input id="oldPasswordInput" type="password" name="old_password"
                                        class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                        placeholder="Masukkan password" required>
                                    <button type="button" data-hs-toggle-password='{"target": "#oldPasswordInput"}'
                                        class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                                        <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                            </path>
                                            <line class="hs-password-active:hidden" x1="2" x2="22"
                                                y1="2" y2="22"></line>
                                            <path class="hidden hs-password-active:block"
                                                d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                                            </path>
                                            <circle class="hidden hs-password-active:block" cx="12"
                                                cy="12" r="3">
                                            </circle>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="block text-sm font-medium mb-2" for="passwordInput">Password</label>
                                <div class="relative">
                                    <input id="passwordInput" type="password" name="password"
                                        class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                        placeholder="Masukkan password" required>
                                    <button type="button" data-hs-toggle-password='{"target": "#passwordInput"}'
                                        class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                                        <svg class="shrink-0 size-3.5" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                            </path>
                                            <line class="hs-password-active:hidden" x1="2" x2="22"
                                                y1="2" y2="22"></line>
                                            <path class="hidden hs-password-active:block"
                                                d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                                            </path>
                                            <circle class="hidden hs-password-active:block" cx="12"
                                                cy="12" r="3">
                                            </circle>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="block text-sm mb-2" for="passwordConfirmationInput">Konfirmasi
                                    Password</label>
                                <div class="relative">
                                    <input id="passwordConfirmationInput" type="password"
                                        name="password_confirmation"
                                        class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                        placeholder="Masukkan ulang password" required>
                                    <button type="button"
                                        data-hs-toggle-password='{"target": "#passwordConfirmationInput"}'
                                        class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                                        <svg class="shrink-0 size-3.5" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                            </path>
                                            <line class="hs-password-active:hidden" x1="2" x2="22"
                                                y1="2" y2="22"></line>
                                            <path class="hidden hs-password-active:block"
                                                d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                                            </path>
                                            <circle class="hidden hs-password-active:block" cx="12"
                                                cy="12" r="3">
                                            </circle>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <button type="submit"
                                class="mb-3 mt-5 w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-hidden focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                Simpan
                            </button>
                        </form>

                        <div class="text-center hidden lg:block col-span-3 ">
                            <img src="{{ asset('assets/images/password.svg') }}" alt=""
                                class="xl:w-1/2 lg:2/3 mx-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
