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
            @foreach ($articles as $article)
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
            @endforeach

        </div>

        {{-- PAGINATION DUMMY (TAMPILAN SAJA) --}}
        {{-- Nanti kalau database sudah ada, hapus div ini dan ganti jadi {{ $berita->links() }} --}}
        <div class="mt-16 flex justify-center">
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <a href="#"
                    class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="#" aria-current="page"
                    class="relative z-10 inline-flex items-center bg-sky-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">1</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">3</a>

                <a href="#"
                    class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>

    </div>
</x-web-layout>
