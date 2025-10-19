<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Puri Kartika</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link crossorigin href="https://fonts.gstatic.com/" rel="preconnect" />
        <!-- <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700;900&display=swap" rel="stylesheet"/> -->
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                extend: {
                    colors: {
                        primary: "#00E0FF",
                            "background-light": "#f7f7f7",
                            // "background-dark": "#092854",
                            "background-dark": "#2d0e49",
                        neon: {
                            blue: "#00E0FF",
                            purple: "#FF00E0",
                            green: "#00FF7F",
                            red: "#fd75d3",
                            primary: "#a199c5",
                        },
                    },
                    fontFamily: {
                        // display: "Be Vietnam Pro",
                        display: "Space Grotesk"
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                        lg: "1rem",
                        xl: "1.5rem",
                        full: "9999px",
                    },
                },
                },
            };
        </script>
        <style type="text/tailwindcss">
            @keyframes neon-pulse-blue {
                0%, 100% {
                box-shadow: 0 0 5px var(--tw-colors-neon-blue),
                    0 0 10px var(--tw-colors-neon-blue),
                    0 0 20px var(--tw-colors-neon-blue);
                }
                50% {
                box-shadow: 0 0 10px var(--tw-colors-neon-blue),
                    0 0 20px var(--tw-colors-neon-blue),
                    0 0 40px var(--tw-colors-neon-blue);
                }
            }

            @keyframes neon-pulse-green {
                0%, 100% {
                box-shadow: 0 0 5px var(--tw-colors-neon-green),
                    0 0 10px var(--tw-colors-neon-green),
                    0 0 20px var(--tw-colors-neon-green);
                }
                50% {
                box-shadow: 0 0 10px var(--tw-colors-neon-green),
                    0 0 20px var(--tw-colors-neon-green),
                    0 0 40px var(--tw-colors-neon-green);
                }
            }

            @keyframes neon-pulse-purple {
                0%, 100% {
                box-shadow: 0 0 5px var(--tw-colors-neon-purple),
                    0 0 10px var(--tw-colors-neon-purple),
                    0 0 20px var(--tw-colors-neon-purple);
                }
                50% {
                box-shadow: 0 0 10px var(--tw-colors-neon-purple),
                    0 0 20px var(--tw-colors-neon-purple),
                    0 0 40px var(--tw-colors-neon-purple);
                }
            }

            @keyframes activity-pulse {
                0% { background-position: -200% 0; }
                100% { background-position: 200% 0; }
            }

            .neon-glow-blue {
                animation: neon-pulse-blue 2s infinite alternate;
            }
            .neon-glow-green {
                animation: neon-pulse-green 2s infinite alternate;
            }
            .neon-glow-purple {
                animation: neon-pulse-purple 2s infinite alternate;
            }

            .activity-line {
                background: linear-gradient(
                    90deg,
                    transparent 0%,
                    rgba(0, 224, 255, 0.2) 20%,
                    transparent 50%,
                    rgba(0, 224, 255, 0.2) 80%,
                    transparent 100%
                );
                background-size: 200% 100%;
                animation: activity-pulse 7s linear infinite;
                opacity: 0;
                transition: opacity 0.5s ease-in-out;
            }
            .activity-line.active {
                opacity: 1;
            }
            .neon-glow {
                box-shadow: 0 0 0px #a78bfa, 0 0 5px #a78bfa, 0 0 15px #a78bfa, 0 0 20px #a78bfa, 0 0 25px #a78bfa;
            }
            .neon-circle {
                /* warna dasar ungu tua */
                background-color: #2d0e49;
                
                /* gradasi lembut — ungu di tengah, pink samar di pinggir */
                background-image:
                    radial-gradient(
                        circle at center,
                        rgba(45, 14, 73, 1) 5%,
                        rgba(68, 26, 98, 0.9) 35%,
                        /* rgba(123, 54, 126, 0.6) 60%, */
                        /* rgba(253, 117, 211, 0.25) 85%, */
                        rgba(253, 117, 211, 0.1) 100%
                    );

                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;

                /* lembutkan cahaya */
                box-shadow:
                    0 0 10px rgba(253, 117, 211, 0.1),
                    0 0 25px rgba(45, 14, 73, 0.25);

                transition: transform 0.6s ease, box-shadow 0.6s ease;
            }
        </style>
    </head>

    <body class="neon-circle text-white font-display">
        <div class="flex flex-col min-h-screen">
            <!-- Header -->
            <header class="bg-background-dark/50 backdrop-blur-sm sticky top-0 z-20 border-b border-neon-blue/10">
                <div class="container mx-auto px-4">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center gap-2 text-white">
                        <span class="material-symbols-outlined text-neon-red text-2xl">home</span>
                        <h1 class="text-lg">Puri Kartika</h1>
                    </div>

                    <button id="menu-toggle" class="md:hidden p-2 transition-transform duration-300">
                        <span id="menu-icon" class="material-symbols-outlined text-3xl transition-all duration-300 ease-in-out">menu</span>
                    </button>

                    <!-- Menu Mobile -->
                    <!-- <div id="mobileMenu"
                        class="hidden sm:hidden flex-col bg-background-dark/60 backdrop-blur-sm border-t border-neon-blue/10 text-right text-slate-200 px-6 py-3 space-y-2">
                        <a href="{{ route('absensi.index') }}" class="block hover:text-neon-blue transition">Dashboard</a>
                        <a href="{{ route('absensi.create') }}" class="block hover:text-neon-blue transition">Absensi</a>
                        <a href="{{ route('absensi.rekap-absensi') }}" class="block hover:text-neon-blue transition">Laporan</a>
                    </div> -->

                    <nav id="nav-menu" class="hidden md:flex items-end gap-6 px-8 fixed md:static top-16 left-0 w-full md:w-auto bg-background-dark/90 backdrop-blur-sm md:bg-transparent border md:border-none border-neon-blue/20 md:pt-0 pt-4 pb-8 md:pb-0 flex-col md:flex-row text-center">
                        <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.index') }}">Beranda</a>
                        <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.create') }}">Isi Absensi</a>
                        <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.log') }}">Daftar Hadir Ronda</a>
                        <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.jadwal-ronda') }}">Jadwal Ronda</a>
                        <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.rekap-absensi') }}">Rekap Ronda Tahunan</a>
                        <a class="block md:hidden text-neon-blue" href="{{ route('absensi.nominasi-absensi') }}">Rekap Ronda Bulanan</a>
                        <a class="text-slate-400 hover:text-neon-blue transition-colors" href="#">Syarat dan Ketentuan Ronda</a>
                        <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="#">Peraturan Kos & Kontrakan</a>
                        <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="#">Kas & Iuran Bulanan</a>
                    </nav>
                </div>
                </div>
            </header>

            <!-- Filter Bulan & Tahun -->
            <section class="bg-background-dark/60 backdrop-blur-sm border-b border-neon-blue/10">
                <div class="container mx-auto px-8 py-4">
                    <form action="{{ route('absensi.nominasi-absensi') }}" method="GET"
                        class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 text-sm">

                        <!-- Bungkus Bulan & Tahun agar sejajar di mobile -->
                        <div class="flex w-full sm:w-auto flex-wrap justify-between sm:justify-start gap-2">
                            <!-- Bulan -->
                            <div class="flex items-center gap-2">
                                <label for="month" class="text-slate-300 text-left">Bulan</label>
                                <select name="month" id="month"
                                    class="w-32 sm:w-40 bg-background-dark border border-neon-blue/20 rounded-md px-3 py-2 text-white 
                                        focus:border-neon-blue focus:ring focus:ring-neon-blue/30 transition-all appearance-none">
                                    @foreach (range(1, 12) as $m)
                                        <option 
                                            value="{{ $m }}" 
                                            {{ $m == request('month', now()->month) ? 'selected' : '' }}
                                            class="bg-background-dark text-white hover:bg-neon-blue/30">
                                            {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tahun -->
                            <div class="flex items-center gap-2">
                                <label for="year" class="text-slate-300 text-left">Tahun</label>
                                <select name="year" id="year"
                                    class="w-24 bg-background-dark border border-neon-blue/20 rounded-md px-3 py-2 text-white focus:border-neon-blue focus:ring focus:ring-neon-blue/30 transition-all">
                                    @foreach (range(now()->year - 2, now()->year) as $y)
                                        <option value="{{ $y }}" {{ $y == request('year', now()->year) ? 'selected' : '' }}>
                                            {{ $y }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <button type="submit"
                            class="w-full sm:w-auto bg-neon-blue/20 hover:bg-neon-blue/30 text-neon-blue font-medium
                                px-4 py-2 rounded-md border border-neon-blue/40 transition-all text-center">
                            Tampilkan
                        </button>
                    </form>
                </div>
            </section>

            <!-- Main -->
            <main class="flex-grow container mx-auto px-4 py-8">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-10 px-6">
                        <h2 class="text-2xl md:text-4xl font-light">Nominasi sang penjaga malam 🔥</h2>
                        <!-- <p class="mt-2 text-slate-400 text-sm md:text-base">Monitoring key personnel and real-time activity stream.</p> -->
                    </div>

                    @foreach ($top4->slice(0, 1) as $row)
                    <!-- Top 3 cards -->
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-6 sm:gap-8 mb-12">
                        <!-- 2 -->
                        <div class="flex flex-col items-center w-2/3 sm:w-1/4">
                            <div class="relative p-1 rounded-full bg-gradient-to-br from-transparent to-neon-purple/50 neon-glow-purple">
                                <span class="material-symbols-outlined absolute -top-6 right-0 text-4xl text-neon-green" style="transform: rotate(20deg)">emoji_events</span>
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5njRygcaBVQdOeVrXi-5RilkgYxMGL97wRKKt3AKQyxHkDcuJDXhpLFSJkFr07RWNY5iakZB5s_9TL_tyg-dBVlXywkWbtBiQSf3N_Qd_VEWzooBZ6EsuEtu-JjrNce60Uj5J6r0jQzuv7u7JLicn5QREj66NPlQa1xe_Ym9JysnKWahR-Voe-88tewvJgmeR9J1_PkUCxQiVd7O6aQgYBXcTE2Hug8ASPp-YT6i5BO5WIM6BYlRaBmARiOhW_7ZNEUsKDujPi_-O"
                                alt="Ahmad Fadil"
                                class="w-20 h-20 rounded-full border-4 border-background-dark object-cover"/>
                                <!-- <div
                                class="absolute -top-2 -right-2 bg-neon-purple text-background-dark rounded-full w-7 h-7 flex items-center justify-center font-bold text-sm border-2 border-background-dark"
                                >
                                2
                                </div> -->
                            </div>
                            <h3 class="mt-3 font-normal text-base">({{ $row->blok }}) {{ $row->nama }}</h3>
                            <p class="text-neon-blue font-light text-sm">Total Kehadiran : {{ $row->total_hadir }}</p>
                        </div>
                    </div>
                    @endforeach

                        <!-- 1 -->
                        <!-- <div class="flex flex-col items-center w-2/3 sm:w-1/3">
                        <div
                            class="relative p-2 rounded-full bg-gradient-to-br from-transparent to-neon-blue/50 neon-glow-blue"
                        >
                            <span
                            class="material-symbols-outlined absolute -top-6 text-4xl text-neon-blue"
                            style="transform: rotate(20deg)"
                            >
                            emoji_events
                            </span>
                            <img
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5njRygcaBVQdOeVrXi-5RilkgYxMGL97wRKKt3AKQyxHkDcuJDXhpLFSJkFr07RWNY5iakZB5s_9TL_tyg-dBVlXywkWbtBiQSf3N_Qd_VEWzooBZ6EsuEtu-JjrNce60Uj5J6r0jQzuv7u7JLicn5QREj66NPlQa1xe_Ym9JysnKWahR-Voe-88tewvJgmeR9J1_PkUCxQiVd7O6aQgYBXcTE2Hug8ASPp-YT6i5BO5WIM6BYlRaBmARiOhW_7ZNEUsKDujPi_-O"
                            alt="Budi Santoso"
                            class="w-28 h-28 sm:w-32 sm:h-32 rounded-full border-4 border-background-dark object-cover shadow-lg"
                            />
                            <div
                            class="absolute -top-2 -right-2 bg-neon-blue text-background-dark rounded-full w-8 h-8 flex items-center justify-center font-bold text-base border-2 border-background-dark"
                            >
                            1
                            </div>
                        </div>
                        <h3 class="mt-3 font-bold text-xl text-white">Budi Santoso</h3>
                        <p class="text-neon-blue font-bold text-base">Skor: 100</p>
                        </div> -->

                        <!-- 3 -->
                        <!-- <div class="flex flex-col items-center w-2/3 sm:w-1/4">
                        <div
                            class="relative p-1 rounded-full bg-gradient-to-br from-transparent to-neon-green/50 neon-glow-green"
                        >
                            <img
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCwMm3Bl6Ba04LRegmgb8Vm6BzhbXIde1eF6tY01EW6Qq5OxV2javjrV1tw2NW0Ji9Gy6aoZDaiNgC2cIGdsY3_GnI9X7BdjXpOwe0lhFW5rnlmyeyszZFLi3u8HHi1dvWHDNq_w9r9S4afKb2sfdfA4jCH45OiG82wgaxGONktLKJ4Ti_Ao8WlTKeiJ-C8-ApA51c1rX4fKp_Qr1M2k1m7Q3te1rhWOp2e_GdSd3ombhbf_mykjF8b7naYdLYBZXMOLUScBnK8Njek"
                            alt="Joko Susilo"
                            class="w-20 h-20 rounded-full border-4 border-background-dark object-cover"
                            />
                            <div
                            class="absolute -top-2 -right-2 bg-neon-green text-background-dark rounded-full w-7 h-7 flex items-center justify-center font-bold text-sm border-2 border-background-dark"
                            >
                            3
                            </div>
                        </div>
                        <h3 class="mt-3 font-bold text-base text-white">Joko Susilo</h3>
                        <p class="text-neon-green font-semibold text-sm">Skor: 90</p>
                        </div> -->
                    <!-- </div> -->

                    <!-- Table -->
                    <div class="bg-background-dark neon-glow rounded-lg shadow-lg overflow-hidden m-4">
                        <div class="justify-between flex items-center border-b border-neon-blue/20">
                            <h3 class="text-md md:text-lg font-normal text-neon-primary p-4">
                                Capaian kehadiran tertinggi
                            </h3>
                            <span class="material-symbols-outlined text-xl text-neon-green p-4">arrow_upward</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-slate-400">
                                <tbody>
                                    @if ($top4->isNotEmpty())
                                    @foreach ($top4->slice(1, 2) as $row)
                                    <tr class="border-b border-neon-blue/10 hover:bg-neon-green/5 transition-colors activity-line">
                                        <td class="px-4 py-3 text-white">
                                            <div class="flex flex-col sm:flex-row sm:justify-between md:justify-start md:gap-10">
                                                <span class="font-medium text-sm">{{ $row->blok }}</span>
                                                <span class="text-slate-300">{{ $row->nama }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-right text-neon-blue">H : {{ $row->total_hadir }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="px-4 py-4 text-neon-primary">
                                                Tidak ada data absensi bulan dan tahun yang dipilih
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            
                        </div>
                    </div>


                    <!-- Table -->
                    <div class="bg-background-dark neon-glow rounded-lg shadow-lg overflow-hidden mx-4 my-10">
                        <div class="justify-between flex items-center border-b border-neon-blue/20">
                            <h3 class="text-md md:text-lg font-normal text-neon-primary p-4">
                                Capaian kehadiran terendah
                            </h3>
                            <span class="material-symbols-outlined text-xl text-neon-red p-4">arrow_downward</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-slate-400">
                                <tbody>
                                    @foreach ($hadirKurang as $row)
                                    <tr class="border-b border-neon-blue/10 hover:bg-neon-red/5 transition-colors activity-line">
                                        <td class="px-4 py-3 text-white">
                                            <div class="flex flex-col sm:flex-row sm:justify-between md:justify-start md:gap-10">
                                                <span class="font-medium text-sm">{{ $row->blok }}</span>
                                                <span class="text-slate-300">{{ $row->nama }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-right text-neon-red">W : {{ $row->total_kewajiban }}</td>
                                        <td class="px-4 py-3 text-right text-neon-red">H : {{ $row->total_hadir }}</td>
                                        <td class="px-4 py-3 text-right text-neon-red">S : {{ $row->selisih }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </main>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const activityRows = document.querySelectorAll(".activity-line");
                activityRows.forEach((row, index) => {
                    setTimeout(() => {
                        row.classList.add("active");
                    }, index * 100);
                });

                const toggleBtn = document.getElementById('menu-toggle')
                const icon = document.getElementById('menu-icon')
                const nav = document.getElementById("nav-menu")

                toggleBtn.addEventListener('click', () => {
                    nav.classList.toggle("hidden")
                    nav.classList.toggle("flex")

                    // Tambahkan animasi scale untuk efek "klik"
                    icon.classList.add('scale-75')
                    setTimeout(() => icon.classList.remove('scale-75'), 150)

                    // Toggle antara "menu" dan "close"
                    if (icon.textContent.trim() === 'menu') {
                        icon.textContent = 'close'
                    } else {
                        icon.textContent = 'menu'
                    }
                })
            });
        </script>
    </body>
</html>