<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

        <!-- Styles / Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-0 lg:p-0 items-center lg:justify-center min-h-screen flex-col">
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-full w-full flex-col-reverse lg:max-w-full lg:flex-row">
                
                <!-- INFORMASI KAS -->
                <div class="text-[16px] leading-[20px] flex-1 p-6 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_1px_0px_0px_rgba(26,26,0,0.16)] lg:shadow-[inset_-1px_0px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-none rounded-br-none lg:rounded-tl-none lg:rounded-br-none">
                    <h1 class="mb-1 font-bold text-lg">Informasi Kas dan Iuran Bulanan Warga</h1>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">🌱 Mari jaga kas kita bersama! Iuran ini dipakai untuk kebersihan lingkungan, penerangan jalan, kegiatan bersama, dll.</p>
                    <ul class="flex flex-col mb-4 lg:mb-6">
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                <a href="https://docs.google.com/spreadsheets/d/1WfiJ8z-tIJrsINdoQoyiDzMmFUVX9kJ3Y3vLzqdN8No/edit?usp=sharing" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#00a9c3]">
                                    <span>Buku Kas & Iuran Bulanan Warga</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:bottom-1/2 before:top-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Baca
                                <a href="{{ route('peraturan-kos') }}" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#00a9c3]">
                                    <span>Peraturan Kos dan Kontrakan</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- INFORMASI RONDA -->
                <div class="text-[16px] leading-[20px] flex-1 p-6 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_1px_0px_0px_rgba(26,26,0,0.16)] lg:shadow-[inset_-1px_0px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                    <h1 class="mb-1 font-bold text-lg">Informasi Ronda Warga</h1>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">🌙✨ Saatnya ronda! Yuk, kita jaga lingkungan tetap aman dan nyaman bersama-sama. 💪 Kita kuat karena kita kompak!</p>
                    <ul class="flex flex-col lg:mb-6">
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Lihat
                                <a href="{{ route('absensi.jadwal-ronda') }}" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#00a9c3] ml-1">
                                    <span>Jadwal Ronda</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Lihat
                                <a href="{{ route('absensi.log') }}" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#00a9c3] ml-1">
                                    <span>Daftar Hadir Ronda</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:bottom-1/2 before:top-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Lihat
                                <a href="{{ route('absensi.rekap-absensi') }}" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#00a9c3] ml-1">
                                    <span>Rekap dan Denda Ronda</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:bottom-1/2 before:top-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Baca <a href="{{ route('syarat-ketentuan') }}" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#00a9c3] ml-1">
                                    <span>Syarat dan Ketentuan Ronda</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- ABSENSI -->
                <div class="text-[16px] leading-[20px] flex-1 p-6 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] lg:shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                    @php
                        // Mapping English -> Indonesia
                        $days = [
                            'sunday'    => 'Minggu',
                            'monday'    => 'Senin',
                            'tuesday'   => 'Selasa',
                            'wednesday' => 'Rabu',
                            'thursday'  => 'Kamis',
                            'friday'    => 'Jumat',
                            'saturday'  => 'Sabtu',
                        ];
                    @endphp
                    <div class="flex mb-6 items-center justify-between">
                        <h1 class="font-bold text-lg">Riwayat Absensi Ronda</h1>
                    </div>

                    @foreach ($absensi as $tanggal => $items)
                        <p class="text-[15px] font-semibold dark:text-[#A1A09A] mt-4">
                            📅 {{ $days[strtolower(\Carbon\Carbon::parse($tanggal)->translatedFormat('l'))] ?? '-' }}, {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d/m/Y') }}
                        </p>
                        <div class="border border-[#68cddc] dark:border-[#3E3E3A] rounded-md py-2 px-4 my-2 bg-[#96fbff1a] dark:bg-[#96fbff6b]">
                            @if ($items->isEmpty())
                                <p class="text-[15px] px-2 py-1">🙈 Belum ada absensi ronda di tanggal ini. Jangan lupa absen ya! demi keamanan kita bersama.</p>
                            @else
                                <ul class="flex flex-col">
                                    @foreach ($items as $row)
                                        <li class="list-disc px-1 ms-6 text-[14px] dark:text-[#d7d7d4]">({{ $row->blok }}) {{ $row->nama }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach

                    <a href="{{ route('absensi.create') }}" class="dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal mt-2 inline-block">
                        Isi Absensi Ronda
                    </a>
                </div>
            </main>
        </div>
    </body>
    <script>
    </script>
</html>