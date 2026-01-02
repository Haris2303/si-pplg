<x-web-layout>
    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section (Konsisten dengan halaman lain) --}}
        <div class="pt-24 pb-12 text-center">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Struktur Kepemimpinan</h2>
            <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Bagan Struktur Organisasi PPLG</p>
        </div>

        {{-- Image Container --}}
        <div class="max-w-5xl mx-auto">
            {{-- Frame Putih & Shadow agar gambar terlihat 'pop-up' --}}
            <div
                class="bg-white p-2 md:p-4 rounded-3xl shadow-xl border border-gray-100 hover:shadow-2xl transition-shadow duration-300">

                {{-- Gambar --}}
                @if ($profile->structure_image)
                    <img src="{{ Storage::url($profile->structure_image) }}" alt="Struktur Organisasi PPLG"
                        class="w-full h-auto rounded-2xl object-contain bg-gray-50">
                @else
                    <p class="text-gray-500 text-center">Gambar struktur belum diupload:(</p>
                @endif

            </div>

            {{-- Caption Kecil --}}
            <p class="text-center text-gray-400 mt-6 text-sm italic">
                *Klik kanan dan "Open Image in New Tab" untuk melihat resolusi penuh.
            </p>
        </div>

    </div>
</x-web-layout>
