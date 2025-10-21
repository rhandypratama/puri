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
                box-shadow: 0 0 10px #a78bfa, 0 0 10px #a78bfa, 0 0 0px #a78bfa, 0 0 0px #a78bfa, 0 0 10px #a78bfa;
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
        </style>
    </head>

    <body class="bg-background-dark text-white font-display">
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
                            <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.create') }}">Isi Absensi Ronda</a>
                            <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.log') }}">Daftar Hadir Ronda</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.jadwal-ronda') }}">Jadwal Ronda</a>
                            <a class="text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.rekap-absensi') }}">Rekap Ronda Tahunan</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="{{ route('absensi.nominasi-absensi') }}">Rekap Ronda Bulanan</a>
                            <a class="text-slate-400 hover:text-neon-blue transition-colors" href="#">Syarat dan Ketentuan Ronda</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="#">Peraturan Kos & Kontrakan</a>
                            <a class="block md:hidden text-slate-400 hover:text-neon-blue transition-colors" href="#">Kas & Iuran Bulanan</a>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Main -->
            <main class="flex-grow container mx-auto px-4 py-4">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-10 px-8">
                        <h2 class="text-2xl md:text-4xl font-light">Absensi ronda manual 🔥</h2>
                        <!-- <p class="mt-2 text-slate-400 text-sm md:text-base">Monitoring key personnel and real-time activity stream.</p> -->
                    </div>

                    @if(session('success'))
                        <div class="p-2 mb-4 mx-2 text-green-100 bg-green-600 rounded-md neon-glow-success">
                            {!! session('success') !!}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="p-2 mb-4 mx-2 text-red-100 bg-red-600 rounded-md neon-glow-error">
                            <ul class="list-none ps-1">
                                @foreach ($errors->all() as $error)
                                    <li>{!! nl2br(e($error)) !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('absensi.store.manual') }}" method="POST" class="mt-10">
                        @csrf
                        <span class="font-semibold px-2 my-2">Tanggal absensi</span>
                        <div class="bg-background-dark neon-glow-input rounded-md mx-2 my-4 overflow-hidden">
                            <input type="date" name="tgl_absensi" required class="w-full px-3 bg-background-dark text-white border-none" />
                        </div>
                        <div class="neon-glow-input mx-2 my-6">
                            <select id="warga" name="warga_ids[]" multiple placeholder="Ketik blok atau nama warga ..." class="w-full">
                                @foreach($wargas as $w)
                                    <option value="{{ $w->id }}" {{ (collect(old('warga_ids'))->contains($w->id)) ? 'selected' : '' }}>
                                        ({{ $w->blok }}) {{ $w->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="bg-background-dark neon-glow-input rounded-md mx-2 my-4 overflow-hidden">
                            <textarea name="keterangan" rows="2" placeholder="Keterangan (opsional)" class="w-full bg-background-dark text-white border-none focus:border-none">{{ old('keterangan') }}</textarea>
                        </div>
                        @error('keterangan')
                            <div class="text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="flex justify-end items-center my-10 px-2">
                            <button type="submit"
                                class="sm:w-auto bg-neon-blue/20 hover:bg-neon-blue/30 text-neon-blue font-medium
                                    px-4 py-2 rounded-md border border-neon-blue/40 transition-all text-center">
                                Submit
                            </button>
                        </div>
                    </form>
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

                let ts = new TomSelect("#warga", {
                    plugins: ['remove_button'],
                    // persist: true,
                    maxItems: null,
                    create: false,
                    closeAfterSelect: true,
                });
            });
        </script>
    </body>
</html>