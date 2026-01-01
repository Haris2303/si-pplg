<x-web-layout>
    {{-- DATA DUMMY --}}
    @php
        $articles = [
            [
                'title' => 'Cara Install Laravel 11 di Windows Menggunakan Laragon',
                'category' => 'Tutorial',
                'author' => 'Pak Budi',
                'date' => '2 Hari yang lalu',
                'desc' =>
                    'Panduan lengkap setup environment development PHP modern tanpa ribet menggunakan Laragon versi terbaru.',
            ],
            [
                'title' => 'Mengenal Perbedaan UI dan UX untuk Pemula',
                'category' => 'Desain',
                'author' => 'Bu Siti',
                'date' => '5 Hari yang lalu',
                'desc' =>
                    'Sering tertukar? Mari kita bahas fundamental desain antarmuka dan pengalaman pengguna dalam pembuatan aplikasi.',
            ],
            [
                'title' => 'Kenapa Harus Belajar Flutter di Tahun 2024?',
                'category' => 'Opini',
                'author' => 'Rudi (Alumni)',
                'date' => '1 Minggu yang lalu',
                'desc' =>
                    'Analisis tren pasar kerja mobile developer dan mengapa Flutter menjadi framework cross-platform paling diminati.',
            ],
            [
                'title' => 'Tips Presentasi Project Akhir agar Lulus dengan Nilai A',
                'category' => 'Tips',
                'author' => 'Kaprodi',
                'date' => '2 Minggu yang lalu',
                'desc' =>
                    'Jangan hanya jago ngoding, kamu juga harus jago ngomong. Berikut strategi public speaking untuk programmer.',
            ],
        ];
    @endphp

    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-8">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Artikel & Tutorial</h2>
            <div class="w-24 h-1.5 mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Tulisan edukatif untuk menambah wawasan siswa PPLG.</p>
        </div>

        {{-- FEATURED POST (Artikel Utama Besar) --}}
        <div class="mb-16 relative rounded-3xl overflow-hidden shadow-2xl group cursor-pointer h-[400px]">
            <img src="https://picsum.photos/1200/600?tech" alt="Featured"
                class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>

            <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full md:w-2/3">
                <span
                    class="inline-block px-3 py-1 mb-4 text-xs font-bold tracking-wider text-white uppercase bg-sky-600 rounded-full">
                    Fresh Topic
                </span>
                <h3
                    class="text-3xl md:text-4xl font-bold text-white mb-4 leading-tight group-hover:text-sky-300 transition">
                    Roadmap Menjadi Fullstack Developer di Era AI
                </h3>
                <p class="text-gray-300 text-lg line-clamp-2 mb-6">
                    Apakah coding akan digantikan AI? Temukan jawabannya dan strategi belajar yang tepat agar tidak
                    tergerus zaman.
                </p>

                <div class="flex items-center gap-4 text-sm text-gray-400">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-gray-600 overflow-hidden">
                            <img src="https://picsum.photos/100/100?man" class="w-full h-full object-cover">
                        </div>
                        <span class="text-white font-medium">Admin PPLG</span>
                    </div>
                    <span>•</span>
                    <span>10 Menit baca</span>
                </div>
            </div>
        </div>

        {{-- MAIN CONTENT (Layout 2 Kolom) --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- KOLOM KIRI: Feed Artikel --}}
            <div class="lg:col-span-2 space-y-10">

                @foreach ($articles as $index => $item)
                    <article class="flex flex-col md:flex-row gap-6 group">
                        {{-- Thumbnail --}}
                        <div class="w-full md:w-1/3 h-52 rounded-2xl overflow-hidden relative">
                            <img src="https://picsum.photos/400/300?random={{ $index }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                            <div class="absolute top-3 left-3">
                                <span
                                    class="px-3 py-1 text-[10px] font-bold uppercase bg-white/90 text-gray-800 rounded-md shadow-sm">
                                    {{ $item['category'] }}
                                </span>
                            </div>
                        </div>

                        {{-- Text --}}
                        <div class="w-full md:w-2/3 flex flex-col justify-center">
                            <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                                <span class="font-semibold text-sky-600">{{ $item['author'] }}</span>
                                <span>•</span>
                                <span>{{ $item['date'] }}</span>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-800 mb-3 group-hover:text-sky-600 transition leading-snug">
                                <a href="#">{{ $item['title'] }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-2 mb-4">
                                {{ $item['desc'] }}
                            </p>
                            <a href="#"
                                class="text-sm font-semibold text-sky-600 hover:text-sky-800 inline-flex items-center gap-1">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                    <hr class="border-gray-100">
                @endforeach

                {{-- Pagination Placeholder --}}
                <div class="pt-6">
                    <button
                        class="w-full py-3 border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition">
                        Muat Lebih Banyak Artikel
                    </button>
                </div>

            </div>

            {{-- KOLOM KANAN: Sidebar (Sticky) --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-8">

                    {{-- Widget Search --}}
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h4 class="font-bold text-gray-800 mb-4">Cari Artikel</h4>
                        <div class="relative">
                            <input type="text" placeholder="Kata kunci..."
                                class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-sky-200 focus:border-sky-500 transition outline-none">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>

                    {{-- Widget Kategori --}}
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h4 class="font-bold text-gray-800 mb-4">Kategori Populer</h4>
                        <div class="flex flex-wrap gap-2">
                            <a href="#"
                                class="px-3 py-1 bg-sky-50 text-sky-600 text-sm font-medium rounded-lg hover:bg-sky-600 hover:text-white transition">Laravel
                                (12)</a>
                            <a href="#"
                                class="px-3 py-1 bg-gray-50 text-gray-600 text-sm font-medium rounded-lg hover:bg-gray-200 transition">Android
                                (8)</a>
                            <a href="#"
                                class="px-3 py-1 bg-gray-50 text-gray-600 text-sm font-medium rounded-lg hover:bg-gray-200 transition">Desain
                                (5)</a>
                            <a href="#"
                                class="px-3 py-1 bg-gray-50 text-gray-600 text-sm font-medium rounded-lg hover:bg-gray-200 transition">Karir
                                (3)</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</x-web-layout>
