<x-web-layout>

    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-12 text-center">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Daftar Guru & Staff</h2>
            <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Pengajar profesional di kompetensi keahlian PPLG</p>

            {{-- Search Bar --}}
            <div class="mt-8 max-w-md mx-auto relative">
                <form action="{{ route('teachers') }}" method="GET">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama guru..."
                        class="w-full pl-10 pr-4 py-3 rounded-full border border-gray-200 focus:border-sky-500 focus:ring focus:ring-sky-200 transition shadow-sm outline-none"
                        autocomplete="off">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </form>
            </div>
        </div>

        {{-- Grid Container --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @forelse ($teachers as $teacher)
                <div
                    class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                    {{-- Banner --}}
                    <div class="h-24 bg-gradient-to-r from-sky-400 to-indigo-500 relative">
                        <div class="absolute inset-0 opacity-20"
                            style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 8px 8px;">
                        </div>
                    </div>

                    {{-- Foto Profil --}}
                    <div class="flex justify-center -mt-12 relative z-10">
                        <div class="w-24 h-24 p-1 bg-white rounded-full shadow-md">
                            <img src="{{ Storage::url($teacher->image) }}" alt="{{ $teacher->name }}"
                                class="w-full h-full rounded-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                    </div>

                    {{-- Info Guru --}}
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-sky-600 transition">
                            {{ $teacher->name }}</h3>

                        {{-- Badge Mapel (Pengganti Tombol) --}}
                        <span
                            class="inline-block px-3 py-1 bg-sky-50 text-sky-600 text-xs font-semibold rounded-full border border-sky-100">
                            {{ $teacher->subject }}
                        </span>

                        <div
                            class="mt-4 flex justify-center gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            @foreach ($teacher->social_media ?? [] as $platform => $link)
                                <a href="{{ $link }}" target="_blank" class="text-gray-400 hover:text-sky-600">
                                    <span class="text-xs">{{ $platform }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                {{-- Tampilan Jika Data Kosong / Tidak Ditemukan --}}
                <div class="col-span-full text-center py-12">
                    <div class="inline-block p-4 rounded-full bg-gray-50 mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Guru tidak ditemukan</h3>
                    @if ($search)
                        <p class="text-gray-500 mt-1">Coba cari dengan kata kunci lain.</p>
                        <a href="{{ route('teachers') }}"
                            class="text-sky-600 hover:underline mt-2 inline-block text-sm">Reset Pencarian</a>
                    @else
                        <p class="text-gray-500 mt-1">Belum ada data guru yang ditambahkan.</p>
                    @endif
                </div>
            @endforelse

        </div>
    </div>
</x-web-layout>
