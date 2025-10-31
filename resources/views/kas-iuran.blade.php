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
        <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
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
            .neon-glow-input {
                box-shadow: 0 0 0px #a78bfa, 0 0 0px #a78bfa, 0 0 0px #a78bfa, 0 0 40px #a78bfa, 0 0 60px #a78bfa;
            }
            .neon-glow-error {
                box-shadow: 0 0 0px red, 0 0 0px red, 0 0 0px red, 0 0 0px red, 0 0 25px red;
            }
            .neon-glow-success {
                box-shadow: 0 0 0px green, 0 0 0px green, 0 0 0px green, 0 0 0px green, 0 0 25px green;
            }
            .ts-control {
                background-color: #2d0e49 !important;
                box-shadow: none !important;
                outline: none !important;
                color: white !important;
                border: none !important;
                /* padding: 8px 12px !important; */
                /* border-radius: 1rem !important; */
                /* overflow: hidden !important; */
            }
            .ts-wrapper.multi.has-items .ts-control {
                padding: 12px !important;
            }
            .ts-dropdown {
                background-color: #2d0e49 !important;
                border: none !important;
                box-shadow: 0 0 10px #a78bfa !important;
            }
            .ts-dropdown, .ts-control, .ts-control input {
                font-family: 'Space Grotesk', sans-serif !important;
                font-size: .9rem !important;
                color: white !important;
            }
            .ts-wrapper.multi .ts-control > div {
                cursor: pointer;
                margin: 0 6px 6px 0;
                padding: 4px 10px;
                background: #f2f2f2e8;
                border-radius: 4px;
                /* color: #303030; */
                /* border: 0 solid #d0d0d0; */
            }

            .neon-circle {
                /* warna dasar ungu tua */
                background-color: #2d0e49;
                
                /* gradasi lembut — ungu di tengah, pink samar di pinggir */
                background-image:
                    radial-gradient(
                        circle at center,
                        rgba(45, 14, 73, 1) 20%,
                        rgba(68, 26, 98, 0.9) 55%,
                        rgba(123, 54, 126, 0.4) 80%,
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
            <header class="bg-background-dark/50 backdrop-blur-sm sticky top-0 z-50 border-b border-neon-blue/10">
                <div class="container mx-auto px-4">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-2xl">home</span>
                            <h1 class="text-lg"><a href="{{ route('absensi.index') }}">Puri Kartika</a></h1>
                        </div>

                        <button id="menu-toggle" class="md:hidden p-2 transition-transform duration-300">
                            <span id="menu-icon" class="material-symbols-outlined text-2xl transition-all duration-300 ease-in-out">menu</span>
                        </button>

                        <nav id="nav-menu" class="hidden md:flex items-end text-lg gap-6 px-8 fixed md:static top-16 left-0 w-full md:w-auto bg-background-dark/90 backdrop-blur-sm md:bg-transparent border md:border-none border-neon-blue/20 md:pt-0 pt-4 pb-8 md:pb-0 flex-col md:flex-row text-center">
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.index') }}">Beranda</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.create') }}">Isi Absensi Ronda</a>
                            <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.log') }}">Daftar Hadir Ronda</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.jadwal-ronda') }}">Jadwal Ronda</a>
                            <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.rekap-absensi') }}">Rekap Ronda Tahunan</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.nominasi-absensi') }}">Rekap Ronda Bulanan</a>
                            <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('syarat-ketentuan') }}">Syarat dan Ketentuan Ronda</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('peraturan-kos') }}">Peraturan Kos & Kontrakan</a>
                            <!-- <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="https://docs.google.com/spreadsheets/d/1WfiJ8z-tIJrsINdoQoyiDzMmFUVX9kJ3Y3vLzqdN8No/edit?usp=sharing" target="_blank">Kas & Iuran Bulanan</a> -->
                            <a class="hover:text-neon-blue text-neon-blue" href="{{ route('kas-iuran') }}">Kas & Iuran Bulanan</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('kritik-saran.index') }}">Kritik & Saran</a>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Main -->
            <main class="flex-grow container mx-auto px-4 py-4">
                <div class="max-w-4xl mx-auto">
                    <div class="mb-4 mt-4 px-2">
                        <h2 class="text-3xl md:text-4xl font-normal m-0">Kas & Iuran Bulanan</h2>
                        <p class="mt-2 mb-4 text-slate-400 md:text-base text-md font-normal m-0">Lingkungan nyaman dimulai dari kepedulian kita semua 💪
                            <span class="text-neon-green font-bold">Bantu jaga kebersamaan dengan rutin membayar iuran bulanan</span>.
                            Uang yang terkumpul akan digunakan untuk kepentingan bersama — dari kebutuhan pos ronda, musholla, penerangan jalan, kebersihan lingkungan, sampai dengan kegiatan bersama warga. 🌱 Mari jaga kas kita bersama!</p>
                        <a href="https://docs.google.com/spreadsheets/d/1WfiJ8z-tIJrsINdoQoyiDzMmFUVX9kJ3Y3vLzqdN8No/edit?usp=sharing" target="_blank" class="w-full px-5 py-3 rounded-md bg-sky-700 hover:bg-sky-500">Lihat Rekap Kas & Iuran Bulanan di sini</a>
                    </div>

                    <div class="mb-4 mt-10 px-2">
                        <h2 class="text-3xl md:text-4xl font-normal m-0">Cara Bayar</h2>
                        <p class="mt-2 text-slate-400 md:text-base text-md font-normal m-0">Bayarnya bisa langsung ke <span class="text-neon-green font-bold">koordinator masing-masing</span>, atau kalau mau cepat tinggal bayar via <span class="text-neon-green font-bold">QRIS atau Transfer Bank</span>.</p>
                    </div>

                    <!-- Accordion -->
                    <div class="space-y-3 px-2">
                        <!-- QRIS -->
                        <div class="rounded-md overflow-hidden">
                        <button 
                            onclick="document.getElementById('qris-panel').classList.toggle('hidden')"
                            class="w-full flex justify-between items-center align-middle px-5 py-3 text-left bg-sky-700 hover:bg-sky-500 transition">
                            <span class="font-semibold text-white">Bayar via QRIS</span>
                            <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="qris-panel" class="hidden bg-sky-600 px-5 py-4">
                            <p class="text-slate-200 text-sm mb-2">
                                Scan QRIS di bawah untuk melakukan pembayaran iuran bulanan dengan mudah 👇
                            </p>
                            <img src="{{ asset('qris.jpeg') }}" alt="QRIS Pembayaran" class="w-full rounded-md" />
                        </div>
                        </div>

                        <!-- Transfer Bank -->
                        <div class="rounded-md overflow-hidden">
                        <button 
                            onclick="document.getElementById('transfer-panel').classList.toggle('hidden')"
                            class="w-full flex justify-between items-center px-5 py-3 text-left bg-sky-700 hover:bg-sky-500 transition">
                            <span class="font-semibold text-white">Transfer Bank</span>
                            <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="transfer-panel" class="hidden bg-sky-600 px-5 py-4">
                            <ul class="text-slate-200 text-sm space-y-0">
                                <li><span class="font-semibold">Bank :</span> SUPERBANK</li>
                                <li><span class="font-semibold">No. Rek :</span> 000063943070</li>
                                <li><span class="font-semibold">a/n :</span> Rhandy</li>
                            </ul>
                            <p class="text-slate-200 text-xs mt-3">
                                Setelah transfer, silakan konfirmasi ke Whatsapp ya 🙏
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                
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