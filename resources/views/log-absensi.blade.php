<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <style>
            .fc-daygrid-day.selected-date {
                background-color: #96fbff1a !important; /* kuning soft */
                border: 2px solid #68cddc !important; /* orange border */
            }
        </style>
        
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
                        <span class="font-normal pe-4" onclick="window.location='{{ route('absensi.index') }}'"><i data-lucide="arrow-left"></i></span>
                        <h1 class="font-bold text-lg">Daftar Hadir Ronda</h1>
                    </div>

                    <div class="max-w-6xl mx-auto p-0">
                        <!-- Calendar -->
                        <div id="calendar"></div>

                        <!-- Spinner -->
                        <div id="loading" class="hidden flex items-center justify-center my-4">
                            <div class="w-6 h-6 border-4 border-black border-t-transparent rounded-full animate-spin"></div>
                            <span class="ml-2 text-gray-600 text-sm">Sedang memuat data ...</span>
                        </div>

                        <!-- Detail Absensi -->
                        <div id="absensiDetail" class="mt-6">
                            <h2 class="mb-2 font-medium"><span id="selectedDate"></span></h2>
                            <!-- <ul id="absensiList" class="list-disc list-inside text-gray-700"></ul> -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left border border-gray-300 rounded-md">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="px-2 py-1 border border-gray-300">Blok</th>
                                            <th class="px-2 py-1 border border-gray-300">Nama</th>
                                            <th class="px-2 py-1 border border-gray-300">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="absensiList">
                                        <tr>
                                            <td colspan="3" class="px-2 py-2 text-center border border-gray-300">
                                                Pilih tanggal pada kalender untuk melihat detail absensi
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
    <!-- FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

    <script>
        lucide.createIcons();
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            let selectedCell = null;
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dateClick: function(info) {
                    // fetch(`/absensi/by-date/${info.dateStr}`)
                    //     .then(res => res.json())
                    //     .then(data => {
                    //         let list = document.getElementById('absensiList');
                    //         list.innerHTML = '';

                    //         document.getElementById('selectedDate').textContent = `(${info.dateStr})`;

                    //         if (data.length === 0) {
                    //             list.innerHTML = '<li class="list-none text-red-500">Tidak ada absensi ronda di tanggal ini</li>';
                    //         } else {
                    //             data.forEach(absensi => {
                    //                 absensi.warga.forEach(nama => {
                    //                     let li = document.createElement('li');
                    //                     li.textContent = nama;
                    //                     list.appendChild(li);
                    //                 });
                    //             });
                    //         }

                    //         document.getElementById('absensiDetail').classList.remove('hidden');
                    //     })
                    //     .catch(err => console.error(err));


                    // Hapus highlight sebelumnya
                    if (selectedCell) {
                        selectedCell.classList.remove('selected-date');
                    }

                    // Tambah highlight di cell baru
                    selectedCell = info.dayEl;
                    selectedCell.classList.add('selected-date');
                    const date = info.dateStr;
                    
                    const loading = document.getElementById('loading');
                    // tampilkan spinner
                    loading.classList.remove('hidden');

                    fetch(`/absensi/by-date/${date}`)
                        .then(response => response.json())
                        .then(data => {
                            // sembunyikan spinner
                            loading.classList.add('hidden');

                            const options = { weekday: 'long', day: '2-digit', month: '2-digit', year: 'numeric' };
                            const formattedDate = new Intl.DateTimeFormat('id-ID', options).format(new Date(date));

                            let count = 0;
                            data.forEach(absensi => count += absensi.warga.length);

                            document.getElementById('selectedDate').textContent = `${formattedDate} (${count} Orang)`;

                            const tbody = document.getElementById('absensiList');
                            tbody.innerHTML = '';

                            if (count > 0) {
                                data.forEach(absensi => {
                                    absensi.warga.forEach(warga => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td class="px-2 py-1 border border-gray-300">${warga.blok}</td>
                                            <td class="px-2 py-1 border border-gray-300">${warga.nama}</td>
                                            <td class="px-2 py-1 border border-gray-300">${absensi.keterangan ?? '-'}</td>
                                        `;
                                        tbody.appendChild(tr);
                                    });
                                });
                            } else {
                                tbody.innerHTML = `
                                    <tr>
                                        <td colspan="3" class="px-3 py-2 text-center border border-gray-300 text-red-500">
                                            Tidak ada absensi ronda di tanggal ini
                                        </td>
                                    </tr>
                                `;
                            }
                        });
                }
            });

            calendar.render();
        });
    </script>
</html>
