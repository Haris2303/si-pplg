<x-web-layout>
    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-12 text-center">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Latar Belakang</h2>
            <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">
                Mengenal lebih dalam sejarah dan tujuan berdirinya kompetensi keahlian PPLG.
            </p>
        </div>

        {{-- Content Section (Split Layout) --}}
        <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-16">

            {{-- Bagian Gambar (Visual) --}}
            <div class="w-full md:w-1/2 relative group">
                {{-- Decorative Element (Background Blob) --}}
                <div
                    class="absolute -top-4 -left-4 w-full h-full bg-sky-100 rounded-2xl -z-10 group-hover:bg-sky-200 transition-colors duration-300">
                </div>

                {{-- Main Image --}}
                <div class="relative rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                    <img src="https://picsum.photos/1200/600?computer,code" alt="Ilustrasi PPLG"
                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">

                    {{-- Floating Badge (Optional) --}}
                    <div
                        class="absolute bottom-4 right-4 bg-white/90 backdrop-blur px-4 py-2 rounded-lg shadow-sm border border-gray-200">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></span>
                            <span class="text-sm font-semibold text-gray-700">Sejak 2010</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian Teks --}}
            <div class="w-full md:w-1/2">
                <article class="prose prose-sky lg:prose-lg text-gray-600 leading-relaxed text-justify">
                    <p class="mb-6">
                        <span class="text-4xl font-serif text-sky-800 float-left mr-2 mt-[-10px] opacity-80">L</span>
                        orem ipsum dolor sit amet consectetur adipisicing elit. Recusandae ad sit amet vero harum, eum
                        exercitationem repellendus molestiae quisquam nemo, tempora ducimus aperiam deleniti
                        consequatur, dolore
                        optio molestias non fugit.
                    </p>
                    <p class="mb-6">
                        Velit cum atque nulla vel debitis. Quisquam minima aut a consequatur, ipsam assumenda porro eos
                        ullam tempora provident,
                        placeat perspiciatis eveniet quo. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aspernatur,
                        voluptatum.
                    </p>
                </article>

                {{-- Feature Points (Poin Penting) --}}
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-center gap-3 p-3 bg-sky-50 rounded-lg border border-sky-100">
                        <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="font-medium text-gray-700">Kurikulum Industri</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-sky-50 rounded-lg border border-sky-100">
                        <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="font-medium text-gray-700">Fasilitas Modern</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-sky-50 rounded-lg border border-sky-100">
                        <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="font-medium text-gray-700">Sertifikasi BNSP</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-web-layout>
