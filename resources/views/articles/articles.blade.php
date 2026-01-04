<x-web-layout>

    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-8">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Artikel & Tutorial</h2>
            <div class="w-24 h-1.5 mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Tulisan edukatif untuk menambah wawasan siswa PPLG.</p>
        </div>

        {{-- FEATURED POST (Artikel Utama Besar) --}}
        @if ($featured)
            <div class="mb-16 relative rounded-3xl overflow-hidden shadow-2xl group cursor-pointer h-[400px]">
                <a href="{{ route('articles.show', $featured->slug) }}" class="absolute inset-0 z-10"></a>
                <img src="{{ Storage::url($featured->thumbnail) }}" alt="{{ $featured->title }}"
                    class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>

                <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full md:w-2/3">
                    <span
                        class="inline-block px-3 py-1 mb-4 text-xs font-bold tracking-wider text-white uppercase bg-sky-600 rounded-full">
                        {{ $featured->category->name }}
                    </span>
                    <h3
                        class="text-3xl md:text-4xl font-bold text-white mb-4 leading-tight group-hover:text-sky-300 transition">
                        {{ $featured->title }}
                    </h3>
                    <p class="text-gray-300 text-lg line-clamp-2 mb-6">
                        {{ Str::limit(strip_tags($featured->content), 150) }}
                    </p>

                    <div class="flex items-center gap-4 text-sm text-gray-400">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-gray-600 overflow-hidden">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($featured->user->name) }}&background=random"
                                    class="w-full h-full object-cover">
                            </div>
                            <span class="text-white font-medium">{{ $featured->user->name }}</span>
                        </div>
                        <span>•</span>
                        <span>{{ $featured->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        @endif

        {{-- MAIN CONTENT (Layout 2 Kolom) --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- KOLOM KIRI: Feed Artikel --}}
            <div class="lg:col-span-2 space-y-10">

                @forelse ($articles as $article)
                    <article class="flex flex-col md:flex-row gap-6 group">
                        {{-- Thumbnail --}}
                        <div class="w-full md:w-1/3 h-52 rounded-2xl overflow-hidden relative">
                            <img src="{{ Storage::url($article->thumbnail) }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                            <div class="absolute top-3 left-3">
                                <span
                                    class="px-3 py-1 text-[10px] font-bold uppercase bg-white/90 text-gray-800 rounded-md shadow-sm">
                                    {{ $article->category->name }}
                                </span>
                            </div>
                        </div>

                        {{-- Text --}}
                        <div class="w-full md:w-2/3 flex flex-col justify-center">
                            <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                                <span class="font-semibold text-sky-600">{{ $article->user->name }}</span>
                                <span>•</span>
                                <span>{{ $article->created_at->format('d M Y') }}</span>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-800 mb-3 group-hover:text-sky-600 transition leading-snug">
                                <a href="#">{{ $article->title }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-2 mb-4">
                                {{ Str::limit(strip_tags($article->content), 120) }}
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
                @empty
                    <div class="text-center py-10">
                        <p class="text-gray-500">Belum ada artikel lainnya.</p>
                    </div>
                @endforelse

                {{-- Pagination --}}
                <div class="pt-6">
                    {{ $articles->links() }}
                </div>

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
                            @foreach ($categories as $cat)
                                <a href="#"
                                    class="px-3 py-1 bg-sky-50 text-sky-600 text-sm font-medium rounded-lg hover:bg-sky-600 hover:text-white transition">
                                    {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</x-web-layout>
