<x-web-layout>
    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-12 text-center">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Berita</h2>
            <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Kabar terbaru dari jurusan PPLG</p>
        </div>

        {{-- Container Berita --}}
        <div class="flex flex-wrap justify-center gap-8">

            {{-- DATA DUMMY: Kita loop angka 1 sampai 6 untuk contoh --}}
            @forelse ($articles as $article)
                <div
                    class="w-full sm:w-[45%] lg:w-[30%] group flex flex-col bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-in-out overflow-hidden">

                    {{-- Image Placeholder --}}
                    <div class="relative overflow-hidden h-56 w-full bg-gray-200">
                        {{-- Ganti src dengan gambar asli nanti --}}
                        <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">

                        <div
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-sky-700 shadow-sm">
                            {{ $article->created_at->format('d M Y') }}
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="flex flex-col flex-grow p-6">
                        <h3
                            class="text-xl font-bold text-gray-800 mb-3 group-hover:text-sky-600 transition-colors line-clamp-2">
                            {{ $article->title }}
                        </h3>

                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4 flex-grow">
                            {!! Str::limit(strip_tags($article->content), 100) !!}
                        </p>

                        <div class="pt-4 mt-auto border-t border-gray-100">
                            <a href="{{ route('articles.show', $article->slug) }}"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-sky-600 hover:text-sky-800 transition-colors">
                                Telusuri
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                {{-- TAMPILAN JIKA BELUM ADA BERITA --}}
                <div class="text-center py-20 w-full">
                    <p class="text-gray-500 text-lg">Belum ada berita yang diterbitkan.</p>
                </div>
            @endforelse

        </div>

        {{-- PAGINATION OTOMATIS --}}
        <div class="mt-16">
            {{ $articles->links() }}
        </div>

    </div>
</x-web-layout>
