<!-- Sidebar -->
<div id="hs-sidebar-footer"
    class="hs-overlay [--auto-close:lg] lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 w-64 hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform h-full hidden fixed top-0 start-0 bottom-0 z-60 bg-gray-800 border-e border-gray-600"
    role="dialog" tabindex="-1" aria-label="Sidebar">

    <div class="relative flex flex-col h-full max-h-full">

        <!-- Header -->
        <header class="p-4 flex justify-between items-center gap-x-2">

            <a class="flex-none font-semibold text-xl text-white focus:outline-hidden focus:opacity-80"
                href="/"
                aria-label="{{ config('app.name') }}">

                {{ config('app.name') }}

            </a>

            <div class="lg:hidden -me-2">
                <!-- Close Button -->
                <button type="button"
                    class="flex justify-center items-center gap-x-3 size-6 bg-white border border-gray-200 text-sm text-gray-600 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100"
                    data-hs-overlay="#hs-sidebar-footer">

                    <svg class="shrink-0 size-4"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
                <!-- End Close Button -->
            </div>
        </header>
        <!-- End Header -->

        <!-- Body -->
        <nav
            class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">

            @php
                $menuGuard = null;
                $currentUser = null;

                if (Auth::guard('admin')->check()) {
                    $menuGuard = 'admin';
                    $currentUser = Auth::guard('admin')->user();

                } elseif (Auth::guard('dekan')->check()) {
                    $currentUser = Auth::guard('dekan')->user();

                    $menuGuard = $currentUser->jabatan === 'wakil_dekan'
                        ? 'wakil_dekan'
                        : 'dekan';

                } elseif (Auth::guard('staf')->check()) {
                    $menuGuard = 'staf';
                    $currentUser = Auth::guard('staf')->user();

                } elseif (Auth::guard('user')->check()) {
                    $menuGuard = 'user';
                    $currentUser = Auth::guard('user')->user();
                }
            @endphp

            @if ($menuGuard && isset(config('menu')[$menuGuard]))

                <div class="hs-accordion-group pb-0 px-2 w-full flex flex-col flex-wrap"
                    data-hs-accordion-always-open>

                    <ul class="space-y-1">

                        @foreach (config('menu')[$menuGuard] as $menu)

                            {{-- ========================================================= --}}
                            {{-- MENU DENGAN SUBMENU --}}
                            {{-- ========================================================= --}}

                            @if (isset($menu['submenu']))

                                <li class="hs-accordion
                                    @if ($menu['active'] == request()->segment(2))
                                        active
                                    @endif"
                                    id="projects-accordion">

                                    <button type="button"
                                        class="hs-accordion-toggle w-full text-start nav-link
                                            @if (request()->segment(2) == $menu['active'])
                                                nav-active
                                            @endif"
                                        aria-expanded="true"
                                        aria-controls="projects-accordion-sub-1-collapse-1">

                                        <i data-lucide="{{ $menu['icon'] }}"
                                            class="size-4"></i>

                                        {{ $menu['label'] }}


                                        <!-- Arrow Open -->
                                        <svg class="hs-accordion-active:block ms-auto hidden size-4 text-white group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">

                                            <path d="m18 15-6-6-6 6" />

                                        </svg>


                                        <!-- Arrow Close -->
                                        <svg class="hs-accordion-active:hidden ms-auto block size-4 text-white group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">

                                            <path d="m6 9 6 6 6-6" />

                                        </svg>

                                    </button>


                                    <!-- Submenu -->
                                    <div id="projects-accordion-sub-1-collapse-1"
                                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300
                                            @if ($menu['active'] == request()->segment(2))
                                                block
                                            @else
                                                hidden
                                            @endif"
                                        role="region"
                                        aria-labelledby="projects-accordion">

                                        <ul class="pt-1 ps-7 space-y-1">

                                            @foreach ($menu['submenu'] as $submenu)

                                                <li>

                                                    <a class="nav-link
                                                        @if (
                                                            request()->segment(2) == $menu['active'] &&
                                                            request()->segment(3) == $submenu['active']
                                                        )
                                                            bg-gray-600
                                                        @endif"
                                                        href="{{ isset($submenu['route'])
                                                            ? route(
                                                                $submenu['route'],
                                                                $submenu['route_params'] ?? []
                                                            )
                                                            : '#'
                                                        }}">

                                                        {{ $submenu['label'] }}

                                                    </a>

                                                </li>

                                            @endforeach

                                        </ul>

                                    </div>
                                    <!-- End Submenu -->

                                </li>

                            {{-- ========================================================= --}}
                            {{-- MENU BIASA --}}
                            {{-- ========================================================= --}}

                            @else

                                <li>

                                    <a class="w-full nav-link
                                        @if (request()->segment(2) == $menu['active'])
                                            nav-active
                                        @endif"
                                        href="{{ isset($menu['route'])
                                            ? route(
                                                $menu['route'],
                                                $menu['route_params'] ?? []
                                            )
                                            : '#'
                                        }}">

                                        <i data-lucide="{{ $menu['icon'] }}"
                                            class="size-4"></i>

                                        {{ $menu['label'] }}

                                    </a>

                                </li>

                            @endif

                        @endforeach

                    </ul>

                </div>

            @endif

        </nav>
        <!-- End Body -->


        <!-- Footer -->
        <footer class="mt-auto p-2 border-t border-gray-200">

            <!-- Account Dropdown -->
            <div class="hs-dropdown [--strategy:absolute] [--auto-close:inside] relative w-full inline-flex">

                <button id="hs-sidebar-footer-example-with-dropdown"
                    type="button"
                    class="w-full inline-flex shrink-0 items-center gap-x-2 p-2 text-start text-sm text-white rounded-md hover:bg-gray-700 focus:outline-hidden focus:bg-gray-600 active:bg-red-400"
                    aria-haspopup="menu"
                    aria-expanded="false"
                    aria-label="Dropdown">

                    <img class="shrink-0 size-5 rounded-full"
                        src="{{ asset('assets/images/avatar.png') }}"
                        alt="Avatar">

                    {{ Str::limit(auth()->user()->nama, 25) }}

                    <svg class="shrink-0 size-3.5 ms-auto"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">

                        <path d="m7 15 5 5 5-5" />
                        <path d="m7 9 5-5 5 5" />
                    </svg>
                </button>

                <!-- Account Dropdown -->
                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-60 transition-[opacity,margin] duration opacity-0 hidden z-20 bg-white border border-gray-200 rounded-lg shadow-lg"
                    role="menu"
                    aria-orientation="vertical"
                    aria-labelledby="hs-sidebar-footer-example-with-dropdown">
                    <div class="p-1">

                        @php

                            /*
                            |--------------------------------------------------------------------------
                            | Account Route
                            |--------------------------------------------------------------------------
                            */

                            $accountRoute = null;

                            if (Auth::guard('admin')->check()) {

                                $accountRoute = 'admin.account';

                            } elseif (Auth::guard('dekan')->check()) {

                                $dekan = Auth::guard('dekan')->user();

                                if ($dekan->jabatan === 'Wakil Dekan') {

                                    $accountRoute = 'wakil_dekan.account';

                                } else {

                                    $accountRoute = 'dekan.account';

                                }

                            } elseif (Auth::guard('staf')->check()) {

                                $accountRoute = 'staf.account';

                            } elseif (Auth::guard('user')->check()) {

                                $accountRoute = 'user.account';

                            }

                        @endphp


                        @if ($accountRoute)

                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100"
                                href="{{ route($accountRoute) }}">

                                My account

                            </a>

                        @endif


                        <!-- Sign Out -->
                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100"
                            href="{{ route('auth.logout') }}">
                            Sign out
                        </a>
                    </div>
                </div>
                <!-- End Account Dropdown -->
            </div>
            <!-- End Account Dropdown -->
        </footer>
        <!-- End Footer -->
    </div>
</div>
<!-- End Sidebar -->
