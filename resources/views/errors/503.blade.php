<!DOCTYPE html>
<html lang="id" class="">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SILAMAT | Coming Soon</title>

    <meta name="description"
        content="SILAMAT - Sistem Informasi Layanan Akademik Teknik Universitas Islam Makassar">


    <!-- =========================================
         DARK MODE INITIALIZATION
    ========================================== -->

    <script>
        (() => {

            const savedTheme = localStorage.getItem('theme');

            const systemDark =
                window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (
                savedTheme === 'dark' ||
                (!savedTheme && systemDark)
            ) {

                document.documentElement.classList.add('dark');

            }

        })();
    </script>


    <!-- =========================================
         TAILWIND CSS CDN
    ========================================== -->

    <script src="https://cdn.tailwindcss.com"></script>


    <script>

        tailwind.config = {

            darkMode: 'class',

            theme: {

                extend: {

                    fontFamily: {

                        sans: [
                            'Inter',
                            'sans-serif'
                        ],

                        jakarta: [
                            'Plus Jakarta Sans',
                            'sans-serif'
                        ],

                    },

                    colors: {

                        uim: {

                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',

                        }

                    },

                    animation: {

                        'float':
                            'float 5s ease-in-out infinite',

                        'float-slow':
                            'float 7s ease-in-out infinite',

                        'pulse-soft':
                            'pulse-soft 2s ease-in-out infinite',

                        'spin-slow':
                            'spin 12s linear infinite',

                    },

                    keyframes: {

                        float: {

                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },

                            '50%': {
                                transform: 'translateY(-12px)'
                            },

                        },

                        'pulse-soft': {

                            '0%, 100%': {
                                opacity: '1'
                            },

                            '50%': {
                                opacity: '.45'
                            },

                        }

                    }

                }

            }

        }

    </script>


    <!-- =========================================
         GOOGLE FONT
    ========================================== -->

    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
        rel="stylesheet">


    <style>

        body {
            font-family: 'Inter', sans-serif;
        }

        .font-jakarta {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

    </style>

</head>


<body
    class="min-h-screen overflow-x-hidden

           bg-gradient-to-br
           from-emerald-50
           via-white
           to-amber-50

           dark:from-slate-950
           dark:via-slate-900
           dark:to-emerald-950

           text-slate-800
           dark:text-slate-100

           transition-colors
           duration-500">


    <!-- =========================================
         BACKGROUND
    ========================================== -->

    <div
        class="fixed
               -top-40
               -left-40

               w-[30rem]
               h-[30rem]

               rounded-full

               bg-emerald-200/20
               dark:bg-emerald-500/10

               blur-3xl

               pointer-events-none">

    </div>


    <div
        class="fixed
               -bottom-40
               -right-40

               w-[32rem]
               h-[32rem]

               rounded-full

               bg-amber-200/20
               dark:bg-amber-500/10

               blur-3xl

               pointer-events-none">

    </div>


    <div
        class="fixed
               top-1/3
               left-1/2

               w-40
               h-40

               rounded-full

               bg-emerald-100/20
               dark:bg-emerald-400/5

               blur-3xl

               pointer-events-none">

    </div>


    <!-- =========================================
         MAIN
    ========================================== -->

    <main
        class="min-h-screen
               flex
               items-center
               justify-center

               px-4
               py-10
               sm:px-6">


        <div class="w-full max-w-5xl">


            <!-- =====================================
                 CARD
            ====================================== -->

            <div
                class="relative
                       overflow-hidden

                       rounded-[2rem]

                       bg-white/85
                       dark:bg-slate-900/80

                       backdrop-blur-xl

                       border
                       border-white
                       dark:border-slate-800

                       shadow-2xl
                       shadow-emerald-900/10
                       dark:shadow-black/30

                       transition-colors
                       duration-500">


                <!-- TOP GRADIENT -->

                <div
                    class="absolute
                           top-0
                           left-0
                           right-0
                           h-1.5

                           bg-gradient-to-r
                           from-emerald-600
                           via-emerald-400
                           to-amber-400">
                </div>


                <!-- =================================
                     CONTENT
                ================================== -->

                <div
                    class="relative

                           grid
                           lg:grid-cols-2

                           gap-10
                           lg:gap-16

                           items-center

                           p-7
                           sm:p-10
                           lg:p-16">


                    <!-- =================================
                         LEFT
                    ================================== -->

                    <div
                        class="text-center
                               lg:text-left">


                        <!-- BRAND -->

                        <div
                            class="flex
                                   items-center
                                   justify-center
                                   lg:justify-start

                                   gap-3

                                   mb-8">


                            <div
                                class="w-14
                                       h-14

                                       rounded-2xl

                                       bg-white
                                       dark:bg-slate-800

                                       border
                                       border-slate-200
                                       dark:border-slate-700

                                       p-2.5

                                       shadow-sm

                                       flex
                                       items-center
                                       justify-center">

                                <img
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/LOGO_UIM_.png/500px-LOGO_UIM_.png"
                                    alt="Logo Universitas Islam Makassar"

                                    class="w-full
                                           h-full
                                           object-contain"
                                >

                            </div>


                            <div class="text-left">

                                <div
                                    class="font-jakarta
                                           font-extrabold

                                           text-xl

                                           text-emerald-800
                                           dark:text-emerald-400">

                                    SILAMAT

                                </div>


                                <div
                                    class="text-[10px]
                                           sm:text-xs

                                           text-slate-400
                                           dark:text-slate-500">

                                    Sistem Informasi Layanan Akademik Teknik

                                </div>

                            </div>

                        </div>


                        <!-- BADGE -->

                        <div
                            class="inline-flex
                                   items-center
                                   gap-2

                                   px-4
                                   py-2

                                   rounded-full

                                   bg-amber-50
                                   dark:bg-amber-500/10

                                   border
                                   border-amber-100
                                   dark:border-amber-500/20

                                   text-amber-700
                                   dark:text-amber-400

                                   text-xs
                                   font-semibold

                                   mb-6">


                            <span
                                class="relative
                                       flex
                                       w-2
                                       h-2">

                                <span
                                    class="absolute
                                           inline-flex
                                           w-full
                                           h-full

                                           rounded-full

                                           bg-amber-400

                                           opacity-75

                                           animate-ping">
                                </span>


                                <span
                                    class="relative
                                           inline-flex

                                           w-2
                                           h-2

                                           rounded-full

                                           bg-amber-500">
                                </span>

                            </span>


                            Sedang dalam tahap pengembangan

                        </div>


                        <!-- HEADING -->

                        <h1
                            class="font-jakarta
                                   font-extrabold

                                   text-5xl
                                   sm:text-6xl
                                   lg:text-[4.5rem]

                                   leading-[1.02]

                                   tracking-tight

                                   text-slate-900
                                   dark:text-white

                                   mb-6">

                            Something<br>

                            <span
                                class="text-emerald-600
                                       dark:text-emerald-400">

                                Great is Coming.

                            </span>

                        </h1>


                        <!-- DESCRIPTION -->

                        <p
                            class="text-slate-500
                                   dark:text-slate-400

                                   text-sm
                                   sm:text-base

                                   leading-7

                                   max-w-xl

                                   mx-auto
                                   lg:mx-0

                                   mb-8">

                            SILAMAT sedang dipersiapkan untuk memberikan
                            pengalaman layanan akademik yang lebih mudah,
                            cepat, dan terintegrasi bagi civitas akademika
                            Fakultas Teknik Universitas Islam Makassar.

                        </p>


                        <!-- PROGRESS -->

                        <div
                            class="max-w-md
                                   mx-auto
                                   lg:mx-0

                                   mb-8">


                            <div
                                class="flex
                                       items-center
                                       justify-between

                                       mb-2">


                                <span
                                    class="text-xs
                                           font-semibold

                                           text-slate-500
                                           dark:text-slate-400">

                                    Persiapan sistem

                                </span>


                                <span
                                    class="text-xs
                                           font-bold

                                           text-emerald-600
                                           dark:text-emerald-400">

                                    75%

                                </span>

                            </div>


                            <div
                                class="h-2

                                       rounded-full

                                       bg-slate-100
                                       dark:bg-slate-800

                                       overflow-hidden">


                                <div
                                    class="h-full
                                           w-[75%]

                                           rounded-full

                                           bg-gradient-to-r
                                           from-emerald-600
                                           to-emerald-400

                                           shadow-sm
                                           shadow-emerald-500/30">

                                </div>

                            </div>

                        </div>


                        <!-- INFO -->

                        <div
                            class="grid
                                   grid-cols-2

                                   gap-3

                                   max-w-md

                                   mx-auto
                                   lg:mx-0">


                            <!-- AKADEMIK -->

                            <div
                                class="rounded-2xl

                                       bg-slate-50
                                       dark:bg-slate-800/70

                                       border
                                       border-slate-200
                                       dark:border-slate-700

                                       p-4

                                       text-left

                                       transition-colors">


                                <div class="text-xl mb-2">
                                    🎓
                                </div>


                                <div
                                    class="text-sm
                                           font-bold

                                           text-slate-700
                                           dark:text-slate-200">

                                    Akademik

                                </div>


                                <div
                                    class="text-[11px]

                                           text-slate-400
                                           dark:text-slate-500

                                           mt-1">

                                    Layanan mahasiswa

                                </div>

                            </div>


                            <!-- TERINTEGRASI -->

                            <div
                                class="rounded-2xl

                                       bg-slate-50
                                       dark:bg-slate-800/70

                                       border
                                       border-slate-200
                                       dark:border-slate-700

                                       p-4

                                       text-left

                                       transition-colors">


                                <div class="text-xl mb-2">
                                    ⚡
                                </div>


                                <div
                                    class="text-sm
                                           font-bold

                                           text-slate-700
                                           dark:text-slate-200">

                                    Terintegrasi

                                </div>


                                <div
                                    class="text-[11px]

                                           text-slate-400
                                           dark:text-slate-500

                                           mt-1">

                                    Satu sistem layanan

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- =================================
                         RIGHT
                    ================================== -->

                    <div class="flex justify-center">


                        <div
                            class="relative

                                   w-64
                                   h-64

                                   sm:w-80
                                   sm:h-80">


                            <!-- OUTER -->

                            <div
                                class="absolute
                                       inset-0

                                       rounded-full

                                       border
                                       border-emerald-200/60
                                       dark:border-emerald-500/20

                                       bg-gradient-to-br

                                       from-emerald-100/40
                                       dark:from-emerald-500/10

                                       to-transparent

                                       animate-pulse-soft">

                            </div>


                            <!-- ROTATING RING -->

                            <div
                                class="absolute
                                       inset-5

                                       rounded-full

                                       border-2
                                       border-dashed

                                       border-emerald-200/70
                                       dark:border-emerald-500/20

                                       animate-spin-slow">

                            </div>


                            <!-- INNER -->

                            <div
                                class="absolute
                                       inset-10

                                       rounded-full

                                       bg-white/70
                                       dark:bg-slate-800/70

                                       border
                                       border-white
                                       dark:border-slate-700

                                       shadow-xl
                                       shadow-emerald-900/10
                                       dark:shadow-black/20

                                       flex
                                       items-center
                                       justify-center">


                                <!-- LOGO -->

                                <div
                                    class="w-36
                                           h-36

                                           sm:w-44
                                           sm:h-44

                                           rounded-[2rem]

                                           bg-white

                                           p-6

                                           shadow-lg

                                           border
                                           border-slate-100

                                           flex
                                           items-center
                                           justify-center

                                           animate-float">


                                    <img
                                        src="https://upload.wikimedia.org/wikipedia/commons/e/e3/LOGO_UIM_.png?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=original"
                                        alt="Logo UIM"

                                        class="w-full
                                               h-full
                                               object-contain"
                                    >

                                </div>

                            </div>


                            <!-- ROCKET -->

                            <div
                                class="absolute

                                       -top-1
                                       right-2

                                       sm:top-5
                                       sm:right-0

                                       px-4
                                       py-3

                                       rounded-2xl

                                       bg-white
                                       dark:bg-slate-800

                                       border
                                       border-slate-100
                                       dark:border-slate-700

                                       shadow-lg

                                       animate-float">

                                <div class="text-lg">
                                    🚀
                                </div>

                            </div>


                            <!-- BOOK -->

                            <div
                                class="absolute

                                       bottom-3
                                       -left-2

                                       sm:bottom-8
                                       sm:left-0

                                       px-4
                                       py-3

                                       rounded-2xl

                                       bg-white
                                       dark:bg-slate-800

                                       border
                                       border-slate-100
                                       dark:border-slate-700

                                       shadow-lg

                                       animate-float-slow">

                                <div class="text-lg">
                                    📚
                                </div>

                            </div>


                            <!-- DOT -->

                            <div
                                class="absolute

                                       top-1/2
                                       -right-4

                                       w-8
                                       h-8

                                       rounded-full

                                       bg-amber-400

                                       shadow-lg
                                       shadow-amber-400/30

                                       animate-pulse">

                            </div>


                            <div
                                class="absolute

                                       bottom-20
                                       -left-2

                                       w-5
                                       h-5

                                       rounded-full

                                       bg-emerald-500

                                       shadow-lg
                                       shadow-emerald-500/30">

                            </div>

                        </div>

                    </div>

                </div>


                <!-- =====================================
                     FOOTER
                ====================================== -->

                <div
                    class="border-t

                           border-slate-100
                           dark:border-slate-800

                           px-7
                           sm:px-10
                           lg:px-16

                           py-5

                           flex
                           flex-col
                           sm:flex-row

                           items-center
                           justify-between

                           gap-3

                           text-center
                           sm:text-left">


                    <div
                        class="text-xs
                               text-slate-400
                               dark:text-slate-500">

                        <span
                            class="font-semibold
                                   text-emerald-700
                                   dark:text-emerald-400">

                            Universitas Islam Makassar

                        </span>

                        · Fakultas Teknik

                    </div>


                    <!-- THEME BUTTON -->

                    <button
                        type="button"
                        onclick="toggleTheme()"

                        class="group

                               inline-flex
                               items-center
                               gap-2

                               px-3
                               py-2

                               rounded-xl

                               bg-slate-100
                               dark:bg-slate-800

                               border
                               border-slate-200
                               dark:border-slate-700

                               text-slate-500
                               dark:text-slate-400

                               hover:bg-slate-200
                               dark:hover:bg-slate-700

                               transition-all
                               duration-300">


                        <!-- SUN -->

                        <svg
                            id="sunIcon"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="w-4 h-4 hidden">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-2.636-1.591 1.591M5.25 12H3m2.636-4.773L4.045 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />

                        </svg>


                        <!-- MOON -->

                        <svg
                            id="moonIcon"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="w-4 h-4">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21.752 15.002A9.718 9.718 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 1 0 21.752 15.002Z" />

                        </svg>


                        <span class="text-xs font-medium">

                            <span id="themeText">
                                Dark Mode
                            </span>

                        </span>

                    </button>


                    <div
                        class="text-[10px]

                               text-slate-400
                               dark:text-slate-600">

                        SILAMAT · Coming Soon

                    </div>

                </div>

            </div>


            <!-- COPYRIGHT -->

            <div
                class="text-center
                       mt-5

                       text-[10px]
                       sm:text-xs

                       text-slate-400
                       dark:text-slate-600">

                © {{ date('Y') }}
                Universitas Islam Makassar.
                All rights reserved.

            </div>

        </div>

    </main>


    <!-- =========================================
         DARK MODE SCRIPT
    ========================================== -->

    <script>

        function updateThemeButton() {

            const isDark =
                document.documentElement
                    .classList
                    .contains('dark');


            const moonIcon =
                document.getElementById('moonIcon');

            const sunIcon =
                document.getElementById('sunIcon');

            const themeText =
                document.getElementById('themeText');


            if (isDark) {

                moonIcon.classList.add('hidden');

                sunIcon.classList.remove('hidden');

                themeText.textContent =
                    'Light Mode';

            } else {

                sunIcon.classList.add('hidden');

                moonIcon.classList.remove('hidden');

                themeText.textContent =
                    'Dark Mode';

            }

        }


        function toggleTheme() {

            const html =
                document.documentElement;


            const isDark =
                html.classList.toggle('dark');


            localStorage.setItem(
                'theme',
                isDark
                    ? 'dark'
                    : 'light'
            );


            updateThemeButton();

        }


        updateThemeButton();

    </script>


</body>

</html>
