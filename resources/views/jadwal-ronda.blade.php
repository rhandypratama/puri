<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Puri Kartika</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link crossorigin href="https://fonts.gstatic.com/" rel="preconnect" />
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
                        rgba(45, 14, 73, 1) 0%,
                        rgba(68, 26, 98, 0.3) 35%,
                        rgba(123, 54, 126, 0.4) 60%,
                        /* rgba(253, 117, 211, 0.25) 85%, */
                        rgba(253, 117, 211, 0.03) 100%
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
            <header class="bg-background-dark/50 backdrop-blur-sm sticky top-0 z-50 border-b border-neon-blue/10">
                <div class="container mx-auto px-4">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-2xl">home</span>
                            <h1 class="text-lg">Puri Kartika</h1>
                        </div>

                        <button id="menu-toggle" class="md:hidden p-2 transition-transform duration-300">
                            <span id="menu-icon" class="material-symbols-outlined text-2xl transition-all duration-300 ease-in-out">menu</span>
                        </button>

                        <nav id="nav-menu" class="hidden md:flex items-end text-lg gap-6 px-8 fixed md:static top-16 left-0 w-full md:w-auto bg-background-dark/90 backdrop-blur-sm md:bg-transparent border md:border-none border-neon-blue/20 md:pt-0 pt-4 pb-8 md:pb-0 flex-col md:flex-row text-center">
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.index') }}">Beranda</a>
                            <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.create') }}">Isi Absensi</a>
                            <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.log') }}">Daftar Hadir Ronda</a>
                            <a class="hover:text-neon-blue text-neon-blue" href="{{ route('absensi.jadwal-ronda') }}">Jadwal Ronda</a>
                            <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.rekap-absensi') }}">Rekap Ronda Tahunan</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.nominasi-absensi') }}">Rekap Ronda Bulanan</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('syarat-ketentuan') }}">Syarat dan Ketentuan Ronda</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('peraturan-kos') }}">Peraturan Kos & Kontrakan</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="https://docs.google.com/spreadsheets/d/1WfiJ8z-tIJrsINdoQoyiDzMmFUVX9kJ3Y3vLzqdN8No/edit?usp=sharing" target="_blank">Kas & Iuran Bulanan</a>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Main -->
            <main class="flex-grow container mx-auto px-4 py-4">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-10 mt-4 px-4">
                        <h2 class="text-2xl md:text-4xl font-normal">Jadwal Ronda Warga 🔥</h2>
                        <p class="mt-2 text-slate-300">Semua jadwal ronda udah tersusun rapi, cek giliran ronda kamu di sini! jangan sampai kelewat 😄</p>
                    </div>

                    <!-- Table -->
                    <div class="bg-background-dark neon-glow rounded-lg shadow-lg overflow-hidden m-2 mb-8">
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
                        <div class="overflow-x-auto max-h-[80vh]">
                            @foreach ($days as $eng => $hari)
                                <div class="flex items-center bg-neon-blue/20 activity-line">
                                    <h3 class="text-xl md:text-lg font-medium px-4 py-2">
                                        {{ $hari }}
                                    </h3>
                                </div>
                                @if(isset($wargas[$eng]))
                                    @foreach($wargas[$eng] as $warga)
                                        <div class="flex items-center px-8 my-3 text-slate-300">({{ $warga->blok }}) {{ $warga->nama }}</div>
                                    @endforeach
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            @endforeach
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