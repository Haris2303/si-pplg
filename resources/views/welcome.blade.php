<x-web-layout>

    <div class="flex flex-wrap pt-14 h-160">
        <div class="w-full content">

            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @if ($profile && $profile->hero_slides)
                        @foreach ($profile->hero_slides as $slide)
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($slide['image']) }}" alt="Banner PPLG"
                                    class="w-full img-slide object-cover h-full">
                            </div>
                        @endforeach
                    @else
                        {{-- Default jika belum ada data --}}
                        <div class="swiper-slide bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">Belum ada banner</span>
                        </div>
                    @endif
                </div>

                <!-- navigation buttons -->
                <div class="swiper-button-prev bg-none rounded-full w-8 h-8 sm:w-10 sm:h-10 text-gray-400"></div>
                <div class="swiper-button-next bg-none rounded-full w-8 h-8 sm:w-10 sm:h-10 text-gray-400"></div>
            </div>
            <!-- end slider -->

        </div>
    </div>


    {{-- Moto --}}
    <div class="max-w-7xl px-4 mx-auto relative z-1">
        <div
            class="flex sm:flex-row flex-col justify-center lg:gap-20 md:gap-10 gap-5 -mt-20 transition-all duration-500">
            @if ($profile && $profile->motos)
                @foreach ($profile->motos as $moto)
                    <div
                        class="md:w-1/4 w-full sm:h-60 md:h-72 h-32 shadow-lg shadow-gray-800 rounded-sm relative overflow-hidden group">
                        <img src="{{ Storage::url($moto['image']) }}" alt="{{ $moto['title'] }}"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="w-full h-full text-white bg-black z-10 absolute top-0 opacity-80 flex flex-col justify-evenly items-center gap-5 p-5">
                            <h3 class="font-bold md:text-2xl text-md text-center">{{ $moto['title'] }}</h3>
                            <p class="lg:text-lg text-sm text-center line-clamp-4">{{ $moto['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="isolate max-w-7xl px-4 mx-auto relative">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff7c7c] to-[#6495ff] opacity-30 sm:left-[calc(100%-40rem)] sm:w-288.75"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        {{-- Penjelasan Website PPLG --}}
        <div class="md:w-3/5 mt-32 text-center mx-auto">
            <h2 class="text-3xl font-semibold mb-5">{{ $profile->welcome_title ?? 'Website PPLG' }}</h2>
            <p class="text-lg">
                {{ $profile->welcome_description ?? 'Selamat datang di website resmi kompetensi keahlian PPLG.' }}</p>
        </div>

        {{-- Tentang Kompetensi --}}
        <div class="mt-40 mx-auto relative">
            <div class="sm:w-80 py-3 px-10 bg-sky-700 -top-8 left-2 absolute">
                <h2 class="text-white text-2xl">Tentang Kompetensi</h2>
            </div>
            <div class="bg-sky-900 md:pl-14 px-5 py-10 rounded-md shadow-lg shadow-gray-700">
                <div
                    class="sm:w-72 w-full sm:h-80 h-60 lg:float-end float-start mr-5 lg:-mt-28 rounded-tl-[3.5rem] rounded-md overflow-hidden shadow-md shadow-sky-900 lg:ml-10">
                    @if ($profile && $profile->about_image)
                        <img src="{{ Storage::url($profile->about_image) }}" alt="Kaprodi PPLG"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-500">No Image</div>
                    @endif
                </div>
                <div class="lg:w-3/4 w-full text-white leading-8 prose prose-invert max-w-none">{!! $profile->about_description ?? '<p>Deskripsi belum diisi.</p>' !!}
                </div>
            </div>
        </div>


        {{-- Berita Terkini --}}
        <div class="mt-32">

            <div class="pt-24 pb-12 text-center">
                <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Berita Terkini</h2>
                <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
                <p class="mt-4 text-gray-500">Kabar terbaru dari jurusan PPLG</p>
            </div>

            <div class="flex flex-wrap justify-center mt-16 gap-10">
                @foreach ($news as $new)
                    <div
                        class="w-full sm:w-[45%] lg:w-[30%] group flex flex-col bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-in-out overflow-hidden">

                        {{-- Image Placeholder --}}
                        <div class="relative overflow-hidden h-56 w-full bg-gray-200">
                            {{-- Ganti src dengan gambar asli nanti --}}
                            <img src="{{ Storage::url($new->thumbnail) }}" alt="{{ $new->title }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">

                            <div
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-sky-700 shadow-sm">
                                {{ $new->created_at->format('d M Y') }}
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="flex flex-col flex-grow p-6">
                            <h3
                                class="text-xl font-bold text-gray-800 mb-3 group-hover:text-sky-600 transition-colors line-clamp-2">
                                {{ $new->title }}
                            </h3>

                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4 flex-grow">
                                {!! Str::limit(strip_tags($new->content), 100) !!}
                            </p>

                            <div class="pt-4 mt-auto border-t border-gray-100">
                                <a href="{{ route('articles.show', $new->slug) }}"
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

            <div class="flex justify-center mt-10">
                <a href="/news" class="px-10 py-2 bg-sky-600 text-white text-center rounded-sm">Lihat Semua</a>
            </div>
        </div>


        {{-- Blog --}}
        <div class="flex lg:flex-row flex-col gap-5 mt-32 justify-center pb-20">
            <div class="w-full lg:w-3/4 mx-auto">
                <h3 class="text-lg mb-3 font-bold border-l-4 border-sky-600 pl-3">Video Profil</h3>
                <div class="w-full aspect-video bg-gray-100 rounded-lg overflow-hidden shadow-lg">
                    @if ($profile && $profile->video_url)
                        <iframe width="100%" height="100%" src="{{ $profile->video_url }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            Video belum tersedia
                        </div>
                    @endif
                </div>
            </div>

            {{-- Sidebar Artikel (Opsional, sudah ada di atas tapi kalau mau tetap ada) --}}
            <div class="lg:w-1/4">
                <h3 class="text-lg mb-3 font-bold border-l-4 border-sky-600 pl-3">Artikel Pilihan</h3>
                <div class="flex flex-col gap-4">
                    @foreach ($articles as $article)
                        <div class="flex gap-3 items-start">
                            <div class="w-24 h-16 flex-shrink-0 bg-gray-200 rounded overflow-hidden">
                                <img src="{{ Storage::url($article->thumbnail) }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800 line-clamp-2 leading-tight">
                                    <a href="{{ route('articles.show', $article->slug) }}"
                                        class="hover:text-sky-600">{{ $article->title }}</a>
                                </h4>
                                <span class="text-xs text-gray-500">{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>


    <script type="module">
        import Swiper from "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js";

        const swiper = new Swiper(".swiper", {
            loop: true,
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    </script>

</x-web-layout>
