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
            <main class="flex max-w-full w-full flex-col-reverse lg:max-w-3xl lg:flex-row">
                
                <div class="text-[16px] leading-[20px] flex-1 p-4 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] lg:shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                    <div class="flex items-center mb-4 md:w-full">
                        <span class="font-normal pe-4" onclick="window.location='{{ route('absensi.index') }}'"><i data-lucide="arrow-left"></i></span>
                        <h1 class="font-bold text-lg">Peraturan</h1>
                    </div>

                    <div class="max-w-3xl mx-auto px-0 py-6">
                        
                        <!-- Deskripsi pembuka -->
                        <p class="text-gray-600 dark:text-[#b3b2ab] text-center mb-4">
                            Halo teman-teman penghuni kos atau kontrakan, demi kenyamanan bersama, yuk sama-sama ikuti aturan ini:
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
                                <h2 class="font-semibold text-lg mb-2">🛡️ Peraturan untuk warga kos atau kontrakan</h2>
                                <!-- <h2 class="font-semibold text-lg mb-2">⏰ 1. Jadwal & Waktu Ronda</h2> -->
                                <ol class="list-decimal pl-6 text-gray-700 dark:text-[#b3b2ab] space-y-1">
                                    <li>Jaga ketertiban, kenyamanan, dan kebersihan kos/kontrakan bareng-bareng.</li>
                                    <li>Jangan bawa atau simpan barang terlarang ya (narkoba, senjata tajam, barang ilegal, dll) 🚫.</li>
                                    <li>Hindari kegiatan yang melanggar hukum atau norma kesopanan.</li>
                                    <li>Tamu boleh berkunjung sampai jam 23.00 WIB.</li>
                                    <li>Dihimbau untuk <strong>tidak keluar masuk komplek perumahan lewat dari jam 23.00 WIB</strong>.</li>
                                    <li>Tamu lawan jenis hanya boleh sampai ruang tamu, nggak boleh masuk kamar.</li>
                                    <li>Tidak boleh menginapkan teman lawan jenis yang belum menikah, <strong>dalam kondisi apapun</strong>. Kalau aturan ini dilanggar, konsekuensinya bisa langsung diminta keluar tanpa pengembalian uang sewa.</li>
                                    <li>Jaga nama baik kos/kontrakan dan lingkungan sekitar ya.</li>
                                    <li>Setiap penghuni bertanggung jawab menjaga kebersihan area sekitar.</li>
                                    <li>Buang sampah di tempat sampah yang sudah disediakan.</li>
                                    <li>Jangan bikin berisik (musik keras, teriak-teriak, knalpot brong, dll), apalagi di jam istirahat siang dan malam.</li>
                                    <li>Penghuni kos atau kontrakan <strong>wajib membayar iuran bulanan</strong>. 📌</li>
                                </ol>
                            </div>

                            <div class="p-5 bg-white dark:bg-[#161615] rounded-lg shadow border border-gray-200 dark:border-gray-500">
                                <h2 class="font-semibold text-lg mb-2">⚖️ Kalau ada pelanggaran, sanksinya bisa berupa:</h2>
                                <ol class="list-decimal pl-6 text-gray-700 dark:text-[#b3b2ab] space-y-1">
                                    <li>Peringatan (lisan atau tertulis)</li>
                                    <li>Denda sesuai jenis pelanggaran</li>
                                    <li>Pemutusan kontrak/sewa sepihak oleh pemilik kos/kontrakan</li>
                                    <li>Dikeluarkan dari kos/kontrakan tanpa pengembalian uang sewa (untuk pelanggaran berat seperti narkoba, miras, atau menginapkan lawan jenis)</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Penutup -->
                        <div class="mt-4 p-5 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                            <p class="text-gray-700">Aturan ini dibuat supaya suasana kos/kontrakan di lingkungan kita tetap aman, nyaman, dan enak ditinggali bareng-bareng. Yuk kita sama-sama saling menghargai 😊</p>
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
