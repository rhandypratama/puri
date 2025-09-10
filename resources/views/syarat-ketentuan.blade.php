<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Lucide CDN -->
        <script src="https://unpkg.com/lucide@latest"></script>

        <!-- di dalam <head> -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-0 lg:p-0 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-full w-full flex-col-reverse lg:max-w-full lg:flex-row">
                
                <div class="text-[16px] leading-[20px] flex-1 p-4 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] lg:shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                    <div class="flex items-center mb-4 md:w-full">
                        <span class="font-normal pe-4" onclick="window.location='{{ route('absensi.index') }}'"><i data-lucide="arrow-left"></i></span>
                        <h1 class="font-bold text-lg">Syarat & Ketentuan Ronda</h1>
                    </div>

                    <div class="max-w-3xl mx-auto px-0 py-6">
                        <!-- Judul -->
                        <h1 class="text-xl font-bold text-center mb-6">🛡️ Syarat & Ketentuan Ronda</h1>

                        <!-- Deskripsi pembuka -->
                        <p class="text-gray-600 dark:text-[#b3b2ab] text-center mb-4">
                            Selamat datang di lingkungan kita yang guyub dan aman!  
                            Sebelum ikut serta dalam ronda, yuk pahami dulu syarat & ketentuannya biar semua nyaman:
                        </p>

                        <!-- Card -->
                        <div class="space-y-4">
                            <!-- 1 -->
                            <!-- <div class="p-5 bg-white rounded-lg shadow border border-gray-200">
                                <h2 class="font-semibold text-lg mb-2">🔑 1. Jadwal Ronda</h2>
                                <ul class="list-disc pl-6 text-gray-700 space-y-1">
                                    <li>Setiap warga <strong>wajib ikut ronda sesuai jadwal</strong> yang sudah dibagi.</li>
                                    <li>Kalau berhalangan, <strong>tolong konfirmasi</strong> dan cari pengganti.</li>
                                </ul>
                            </div> -->

                            <!-- 2 -->
                            <div class="p-5 bg-white dark:bg-[#161615] rounded-lg shadow border border-gray-200 dark:border-gray-500">
                                <h2 class="font-semibold text-lg mb-2">⏰ 1. Jadwal & Waktu Ronda</h2>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-[#b3b2ab] space-y-1">
                                    <li>Setiap warga <strong>wajib ikut ronda sesuai jadwal</strong> yang sudah dibagi.</li>
                                    <li>Ronda berlangsung mulai pukul <strong>22.00 – 01.00 WIB</strong>. Datang tepat waktu ya, jangan sampai warga yang lain nungguin 😊</li>
                                </ul>
                            </div>

                            <!-- 3 -->
                            <div class="p-5 bg-white dark:bg-[#161615] rounded-lg shadow border border-gray-200 dark:border-gray-500">
                                <h2 class="font-semibold text-lg mb-2">👥 2. Kehadiran & Absensi</h2>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-[#b3b2ab] space-y-1">
                                    <li>Setiap yang hadir <strong>wajib absen</strong> lewat sistem, jadi tidak dicatat manual lagi.</li>
                                    <li>Buat warga yang <strong>datang telat namun bisa dipastikan hadir</strong>, konfirmasi aja ke tim ronda sebelum jam 23.00 WIB, jadi absennya tetap aman.</li>
                                    <li>Untuk melakukan absensi ronda, bisa diwakilkan ke 1 orang saja</li>
                                    <li><strong>Penting !!</strong> Cek kembali apakah namamu sudah ada di daftar hadir ronda. <a href="{{ route('absensi.log') }}" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#00a9c3]">Lihat disini</a></li>
                                    <li>Tidak hadir = dianggap <span class="text-red-500 font-medium">tidak ronda 🚫</span></li>
                                </ul>
                            </div>

                            <!-- 4 -->
                            <div class="p-5 bg-white dark:bg-[#161615] rounded-lg shadow border border-gray-200 dark:border-gray-500">
                                <h2 class="font-semibold text-lg mb-2">🔔 3. Tugas Saat Ronda</h2>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-[#b3b2ab] space-y-1">
                                    <li>Pukul 23.00 WIB, setiap warga yang ronda <strong>wajib mengunci gerbang</strong>.</li>
                                    <li>Laporkan bila ada hal mencurigakan, jangan bertindak sendiri.</li>
                                    <li>Jagalah sikap, <em>ngobrol boleh, ketawa boleh, berisik jangan</em> 😄</li>
                                </ul>
                            </div>

                            <!-- 5 -->
                            <!-- <div class="p-5 bg-white rounded-lg shadow border border-gray-200">
                                <h2 class="font-semibold text-lg mb-2">💰 5. Iuran & Kas</h2>
                                <p class="text-gray-700">Setiap warga mendukung keamanan dengan iuran bulanan.  
                                Dana ini dipakai untuk kebutuhan ronda: <em>senter, HT, konsumsi, hingga kas cadangan</em>.</p>
                            </div> -->

                            <!-- 6 -->
                            <div class="p-5 bg-white dark:bg-[#161615] rounded-lg shadow border border-gray-200 dark:border-gray-500">
                                <h2 class="font-semibold text-lg mb-2">🤝 4. Etika & Kebersamaan</h2>
                                <p class="text-gray-700 dark:text-[#b3b2ab]">Hormati sesama warga ronda, jangan baper kalau diingatkan.  
                                Ronda juga ajang kumpul + silaturahmi ✨</p>
                            </div>

                            <!-- 7 -->
                            <div class="p-5 bg-white dark:bg-[#161615] rounded-lg shadow border border-gray-200 dark:border-gray-500">
                                <h2 class="font-semibold text-lg mb-2">⚖️ 5. Denda</h2>
                                <p class="text-gray-700 dark:text-[#b3b2ab]">Warga yang tidak hadir akan kena sanksi sesuai keputusan bersama, misalnya <strong>denda atau konsumsi</strong>.</p>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-[#b3b2ab] space-y-1">
                                    <!-- <li><strong>Keliling lingkungan</strong> sesuai rute yang ditentukan.</li> -->
                                    <li>Kekurangan absensi ronda bisa diganti maksimal di bulan berikutnya.</li>
                                    <li>Penagihan denda dilakukan 2 bulan sekali, yaitu (Februari, April, Juni, Agustus, Oktober, Desember).</li>
                                    <li>Masing - masing warga bisa cek sendiri rekap & laporannya di menu <a href="{{ route('absensi.rekap-absensi') }}" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#00a9c3]">Rekap & Denda Ronda.</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Penutup -->
                        <div class="mt-4 p-5 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                            <h3 class="font-semibold text-lg text-gray-700 mb-2">🚀 Penutup</h3>
                            <p class="text-gray-700">Ronda bukan sekadar kewajiban, tapi bentuk <strong>kebersamaan kita menjaga lingkungan</strong>.  
                            Dengan ikut ronda, kita menciptakan suasana aman, nyaman, dan penuh kekeluargaan.</p>
                            <blockquote class="mt-3 italic text-yellow-800 font-medium">
                                “Lingkungan aman, hati pun tenang. Yuk, jaga bareng-bareng!”
                            </blockquote>
                        </div>
                    </div>
                    
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
    
    <script>
        lucide.createIcons();
        
    </script>
</html>
