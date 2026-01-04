<x-web-layout>

    {{-- Background Header Kecil (Opsional, untuk memisahkan navbar dengan konten) --}}
    <div class="h-20 bg-gray-50"></div>

    <div class="max-w-screen-xl px-4 mx-auto py-12">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-full">

                {{-- Kategori & Tanggal --}}
                <div class="flex items-center gap-4 mb-4">
                    <span
                        class="px-3 py-1 bg-sky-100 text-sky-600 text-xs font-bold rounded-full uppercase tracking-wider">
                        {{ $article->category->name }}
                    </span>
                    <span class="text-gray-400 text-sm flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ $article->created_at->format('d M Y') }}
                    </span>
                </div>

                {{-- Judul Besar --}}
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-6">
                    {{ $article->title }}
                </h1>

                {{-- Author Info --}}
                <div class="flex items-center gap-3 mb-8 pb-8 border-b border-gray-100">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($article->user->name) }}&background=random"
                        alt="{{ $article->user->name }}" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-bold text-gray-800">{{ $article->user->name }}</p>
                        <p class="text-xs text-gray-500">Penulis</p>
                    </div>
                </div>

                {{-- Featured Image --}}
                <div class="rounded-2xl overflow-hidden mb-10 shadow-lg">
                    <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}"
                        class="w-full h-auto object-cover">
                    <p class="text-center text-gray-400 text-xs mt-2 italic">Ilustrasi: {{ $article->title }}</p>
                </div>

                {{-- ISI KONTEN (ARTICLE BODY) --}}
                {{-- Class 'prose' ini ajaib, dia otomatis men-styling h2, p, ul, ol, blockquote --}}
                <article class="prose prose-lg prose-sky max-w-none text-gray-700">
                    {!! $article->content !!}
                </article>

                {{-- Share Buttons --}}
                <div class="mt-8 flex items-center gap-4">
                    <span class="text-sm font-bold text-gray-800">Bagikan:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"
                        class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385h-3.047v-3.47h3.047v-2.641c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953h-1.513c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385c5.737-.9 10.125-5.864 10.125-11.854z" />
                        </svg>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}"
                        target="_blank"
                        class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600 transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.988-1.459l-6.005 1.666zm5.232-6.241h.001l.494.305c1.235.753 2.664 1.156 4.125 1.156 4.636 0 8.406-3.774 8.409-8.409.002-4.635-3.768-8.409-8.404-8.409-4.64 0-8.409 3.774-8.407 8.409-.001 1.571.432 3.013 1.249 4.269l.325.513-1.03 3.766 3.839-1.001z" />
                        </svg>
                    </a>
                </div>

            </div>

        </div>

    </div>
</x-web-layout>
