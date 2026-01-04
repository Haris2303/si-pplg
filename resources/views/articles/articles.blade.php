<x-web-layout>

    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-8">
            @if (isset($currentCategory))
                <span class="text-sky-600 font-bold tracking-wider uppercase text-sm">Kategori</span>
                <h2 class="text-4xl font-bold text-gray-800 tracking-tight mt-2">{{ $currentCategory->name }}</h2>
                <p class="mt-4 text-gray-500">Menampilkan semua artikel dalam kategori ini.</p>
                <a href="{{ route('articles.article') }}" class="text-sky-600 hover:underline text-sm mt-2 inline-block">←
                    Kembali ke semua artikel</a>
            @elseif ($search)
                <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Pencarian: "{{ $search }}"</h2>
                <p class="mt-4 text-gray-500">Menampilkan hasil pencarian untuk kata kunci tersebut.</p>
                <a href="{{ route('articles.article') }}"
                    class="text-sky-600 hover:underline text-sm mt-2 inline-block">←
                    Kembali ke semua artikel</a>
            @else
                <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Artikel & Tutorial</h2>
                <div class="w-24 h-1.5 mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
                <p class="mt-4 text-gray-500">Tulisan edukatif untuk menambah wawasan siswa PPLG.</p>
            @endif
        </div>

        {{-- FEATURED POST (Artikel Utama Besar) --}}
        @if ($featured && !$search && !isset($currentCategory))
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
            <div class="lg:col-span-2">

                {{-- Container Artikel (Dikasih ID biar bisa diakses JS) --}}
                <div id="article-container" class="space-y-5">
                    @include('articles.partials.item', ['articles' => $articles])
                </div>

                {{-- Pesan Kosong (Jika dari awal tidak ada data) --}}
                @if ($articles->count() == 0)
                    <div class="text-center py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Tidak ada artikel ditemukan</h3>
                        {{-- ... (kode reset button abang yang lama) ... --}}
                    </div>
                @endif

                {{-- Tombol Load More --}}
                @if ($articles->hasMorePages())
                    <div class="text-center" id="load-more-wrapper">
                        <button id="btn-load-more" data-next-url="{{ $articles->nextPageUrl() }}"
                            class="cursor-pointer w-full py-3 border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition flex justify-center items-center gap-2">
                            <span>Muat Lebih Banyak Artikel</span>
                            {{-- Spinner Loading (Hidden by default) --}}
                            <svg id="loading-spinner" class="animate-spin h-5 w-5 text-gray-500 hidden"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </button>
                    </div>
                @endif

            </div>

            {{-- KOLOM KANAN: Sidebar (Sticky) --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-8">

                    {{-- Widget Search --}}
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h4 class="font-bold text-gray-800 mb-4">Cari Artikel</h4>
                        <form action="{{ route('articles.article') }}" method="GET">
                            <div class="relative">
                                <input type="text" name="search" value="{{ $search }}"
                                    placeholder="Kata kunci..."
                                    class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-sky-200 focus:border-sky-500 transition outline-none">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <button type="submit" class="hidden"></button>
                        </form>
                    </div>

                    {{-- Widget Kategori --}}
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h4 class="font-bold text-gray-800 mb-4">Kategori</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($categories as $cat)
                                @php
                                    $isActive = isset($currentCategory) && $currentCategory->id === $cat->id;
                                @endphp
                                <a href="{{ route('articles.category', $cat->slug) }}"
                                    class="px-3 py-1 bg-sky-50 text-sky-600 text-sm font-medium rounded-lg hover:bg-sky-600 hover:text-white transition
                                    {{ $isActive ? 'bg-sky-600 text-white shadow-md' : 'bg-sky-50 text-sky-600 hover:bg-sky-600 hover:text-white' }}">
                                    {{ $cat->name }}
                                    <span
                                        class="text-xs ml-1
                                    {{-- Warna angka juga menyesuaikan --}}
                                    {{ $isActive ? 'text-sky-200' : 'text-sky-400 group-hover:text-white' }}">
                                        ({{ $cat->articles_count }})
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    {{-- SCRIPT JAVASCRIPT UNTUK LAZY LOAD --}}
    @push('scripts')
        {{-- Pastikan di layout utama ada @stack('scripts') sebelum </body> --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const btnLoadMore = document.getElementById('btn-load-more');
                const container = document.getElementById('article-container');
                const spinner = document.getElementById('loading-spinner');
                const wrapper = document.getElementById('load-more-wrapper');

                if (btnLoadMore) {
                    btnLoadMore.addEventListener('click', function() {
                        // 1. Ambil URL halaman berikutnya
                        let nextUrl = this.getAttribute('data-next-url');

                        // 2. Ubah tampilan tombol jadi Loading
                        this.setAttribute('disabled', 'disabled');
                        this.querySelector('span').innerText = 'Sedang memuat...';
                        spinner.classList.remove('hidden');

                        // 3. Fetch Data pakai AJAX
                        fetch(nextUrl, {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest' // Tanda ini request AJAX Laravel
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                // 4. Tempelkan HTML baru ke bawah container
                                // insertAdjacentHTML tidak merusak event listener elemen sebelumnya
                                container.insertAdjacentHTML('beforeend',
                                    '<hr class="border-gray-100">' + data.html);

                                // 5. Update URL tombol untuk halaman berikutnya
                                if (data.nextPageUrl) {
                                    btnLoadMore.setAttribute('data-next-url', data.nextPageUrl);
                                    // Reset tombol
                                    btnLoadMore.removeAttribute('disabled');
                                    btnLoadMore.querySelector('span').innerText =
                                        'Muat Lebih Banyak Artikel';
                                    spinner.classList.add('hidden');
                                } else {
                                    // Kalau sudah halaman terakhir, hilangkan tombol
                                    wrapper.remove();
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                btnLoadMore.removeAttribute('disabled');
                                btnLoadMore.querySelector('span').innerText = 'Gagal memuat, coba lagi';
                            });
                    });
                }
            });
        </script>
    @endpush
</x-web-layout>
