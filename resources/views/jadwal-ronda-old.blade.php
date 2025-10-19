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
            <main class="flex lg:max-w-6xl max-w-full w-full flex-col-reverse lg:flex-row">
                
                <div class="text-[13px] leading-[20px] flex-1 p-4 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] lg:shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                    <div class="flex items-center mb-4 md:w-full">
                        <span class="font-normal pe-4" onclick="window.location='{{ route('absensi.index') }}'"><i data-lucide="arrow-left"></i></span>
                        <h1 class="font-bold text-lg">Jadwal Ronda Warga</h1>
                        <!-- <span id="realtime-clock1" class="font-normal ps-2">23d3</span> -->
                    </div>

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
                    <div class="overflow-x-auto">
                        <table class="min-w-full rounded-md overflow-hidden border border-gray-300">
                            <thead class="bg-black dark:bg-[#303738] text-white">
                                <tr>
                                    @foreach ($days as $hari)
                                        <th class="px-2 py-1 border border-gray-300 whitespace-nowrap">{{ $hari }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($days as $eng => $indo)
                                        <td class="px-4 py-2 border border-gray-300 bg-gray-50 dark:text-black align-top whitespace-nowrap">
                                            @if(isset($wargas[$eng]))
                                                @foreach($wargas[$eng] as $warga)
                                                    <div>({{ $warga->blok }}) {{ $warga->nama }}</div>
                                                @endforeach
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
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
