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
        <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
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
                <div class="text-[14px] leading-[20px] flex-1 p-4 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] lg:shadow-[inset_0px_0px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                    <div class="flex justify-between items-center mb-6 md:w-full">
                        <div class="flex items-center">
                            <span class="font-normal pe-4" onclick="window.location='{{ route('absensi.index') }}'"><i data-lucide="arrow-left"></i></span>
                            <h1 class="font-bold text-lg">Absensi Ronda Manual</h1>
                        </div>
                        <span id="realtime-clock-manual" class="font-normal text-[13px]"></span>
                    </div>
                    @if(session('success'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg border border-green-300">
                            {!! session('success') !!}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg border border-red-300">
                            <ul class="list-none ps-1">
                                @foreach ($errors->all() as $error)
                                    <li>{!! nl2br(e($error)) !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('absensi.store.manual') }}" method="POST" class="space-y-3 mt-10">
                        @csrf
                        <input type="date" name="tgl_absensi" class="w-full rounded-sm border border-gray-300 dark:border-[#444] bg-white dark:bg-[#2A2A2A] text-black dark:text-white p-2">
                        <div>
                            <select id="warga" name="warga_ids[]" multiple placeholder="Ketik blok atau nama warga ..." class="w-full dark:border-[#444] bg-white dark:bg-[#2A2A2A] text-black dark:text-white p-0 @error('warga_ids') border-red-500 @enderror">
                                @foreach($wargas as $w)
                                    <option value="{{ $w->id }}" {{ (collect(old('warga_ids'))->contains($w->id)) ? 'selected' : '' }}>
                                        ({{ $w->blok }}) {{ $w->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <textarea name="keterangan" rows="2" placeholder="Keterangan (opsional)" class="w-full rounded-sm border border-gray-300 dark:border-[#444] bg-white dark:bg-[#2A2A2A] text-black dark:text-white p-2">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="flex justify-end items-center my-6">
                            <!-- <a href="{{ url('/') }}" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white px-5 py-1.5 bg-[#ffffff] rounded-sm border border-[#8b8b8b] text-sm leading-normal me-2">
                                Back
                            </a> -->
                            <button type="submit" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                                Submit
                            </button>
                        </div>
                    </form>
                    
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>

    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        lucide.createIcons();
        document.addEventListener("DOMContentLoaded", function () {
            let ts = new TomSelect("#warga", {
                plugins: ['remove_button'],
                // persist: true,
                maxItems: null,
                create: false,
                closeAfterSelect: true,
            });

            // Ambil value lama dari Blade (old input)
            @if(old('warga_ids'))
                ts.setValue(@json(old('warga_ids')));
            @endif
        });
    </script>
</html>
