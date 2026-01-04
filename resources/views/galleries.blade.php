<x-web-layout>
    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-12 text-center">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Galeri Kegiatan</h2>
            <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Dokumentasi aktivitas seru di jurusan PPLG</p>
        </div>

        {{-- Masonry Layout --}}
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 space-y-4">

            {{-- Loop Dummy Data --}}
            @foreach ($galleries as $item)
                <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer">

                    {{-- FIX: Menggunakan Picsum Photos --}}
                    {{-- Format: https://picsum.photos/lebar/tinggi?random=angka --}}
                    <img src="{{ Storage::url($item->image) }}" alt="Kegiatan PPLG"
                        class="w-full h-auto object-cover transform group-hover:scale-110 transition duration-700">

                    {{-- Overlay Gelap saat Hover --}}
                    <div
                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">

                        {{-- Caption muncul dari bawah --}}
                        <div class="p-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <span
                                class="text-sky-300 text-xs font-bold uppercase tracking-wider">{{ $item->created_at->format('d M Y') }}</span>
                            <h4 class="text-white font-bold text-lg mt-1">
                                {{ $item->caption ?? 'Diunggah oleh ' . $item->user->name }}</h4>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</x-web-layout>
