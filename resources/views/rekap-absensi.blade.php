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
                
                <div class="text-[13px] leading-[20px] flex-1 p-4 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] lg:shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                    <div class="flex items-center mb-4 md:w-full">
                        <span class="font-normal pe-4" onclick="window.location='{{ url('/') }}'"><i data-lucide="arrow-left"></i></span>
                        <h1 class="font-bold text-lg">Rekap Ronda Tahun {{ $year }}</h1>
                    </div>

                    <div class="overflow-x-auto relative">
                        <table class="min-w-full table-auto rounded-md overflow-hidden border border-gray-300">
                            <thead class="bg-black text-white">
                                <tr>
                                    <th class="sticky left-0 z-30 bg-black px-2 py-1 border border-gray-300 whitespace-nowrap">Blok</th>
                                    <th class="px-2 py-1 border border-gray-300 text-start whitespace-nowrap">Nama Warga</th>
                                    <th class="px-2 py-1 border border-gray-300 text-start">Jadwal</th>
                                    @for ($month = 1; $month <= 12; $month++)
                                        <th class="px-2 py-1 border border-gray-300 whitespace-nowrap">{{ \Carbon\Carbon::create()->month($month)->translatedFormat('M') }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Mapping English -> Indonesia
                                    $days = [
                                        '' => '',
                                        'sunday'    => 'Minggu',
                                        'monday'    => 'Senin',
                                        'tuesday'   => 'Selasa',
                                        'wednesday' => 'Rabu',
                                        'thursday'  => 'Kamis',
                                        'friday'    => 'Jumat',
                                        'saturday'  => 'Sabtu',
                                    ];
                                @endphp
                                @foreach ($rekap as $row)
                                    <tr>
                                        <td class="sticky left-0 z-20 text-center items-center py-1 border border-gray-400 bg-gray-50 align-top whitespace-nowrap">{{ $row['blok'] }}</td>
                                        <td class="px-2 py-1 border border-gray-400 bg-gray-50 align-top whitespace-nowrap">{{ $row['nama'] }}</td>
                                        <td class="px-2 py-1 border border-gray-400 bg-gray-50 align-top whitespace-nowrap">{{  $days[$row['jadwal']] }}</td>
                                        @foreach ($row['bulan'] as $data)
                                            <td class="text-center py-1 border border-gray-400 {{ $data['S'] < 0 ? 'bg-red-100 text-red-700' : 'bg-gray-50' }} align-top whitespace-nowrap">W: {{ $data['W'] }}<br> H: {{ $data['H'] }}<br> S: {{ $data['S'] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
