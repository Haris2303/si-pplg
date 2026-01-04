@forelse ($articles as $article)
    <article class="flex flex-col md:flex-row gap-6 group">
        {{-- Thumbnail --}}
        <div class="w-full md:w-1/3 h-52 rounded-2xl overflow-hidden relative">
            <img src="{{ Storage::url($article->thumbnail) }}"
                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
            <div class="absolute top-3 left-3">
                <span class="px-3 py-1 text-[10px] font-bold uppercase bg-white/90 text-gray-800 rounded-md shadow-sm">
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
            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-sky-600 transition leading-snug">
                <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
            </h3>
            <p class="text-gray-600 text-sm leading-relaxed line-clamp-2 mb-4">
                {{ Str::limit(strip_tags($article->content), 120) }}
            </p>
            <a href="#"
                class="text-sm font-semibold text-sky-600 hover:text-sky-800 inline-flex items-center gap-1">
                Baca Selengkapnya
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                    </path>
                </svg>
            </a>
        </div>
    </article>
    <hr class="border-gray-100">
@empty
    <div class="text-center py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Tidak ada artikel ditemukan</h3>
        {{-- Tombol reset berbeda tergantung konteks --}}
        @if (isset($currentCategory))
            <p class="text-gray-500 mt-1">Belum ada artikel di kategori
                <strong>{{ $currentCategory->name }}</strong>.
            </p>
        @elseif($search)
            <p class="text-gray-500 mt-1">Coba gunakan kata kunci yang berbeda.</p>
        @endif
        <a href="{{ route('articles.article') }}" class="text-sky-600 hover:underline text-sm mt-4 inline-block">Lihat
            Semua Artikel</a>
    </div>
@endforelse
