<x-web-layout>
    {{-- DATA DUMMY --}}
    @php
        $gurus = [
            ['nama' => 'Budi Santoso, S.Kom', 'mapel' => 'Pemrograman Web', 'foto' => 'man'],
            ['nama' => 'Siti Aminah, M.Pd', 'mapel' => 'Basis Data', 'foto' => 'woman'],
            ['nama' => 'Rudi Hermawan, S.T', 'mapel' => 'Jaringan Dasar', 'foto' => 'man'],
            ['nama' => 'Dewi Lestari, S.Kom', 'mapel' => 'Desain Grafis', 'foto' => 'woman'],
            ['nama' => 'Eko Prasetyo, S.Kom', 'mapel' => 'PBO (Java)', 'foto' => 'man'],
            ['nama' => 'Fitri Handayani, S.Pd', 'mapel' => 'PKK / Kewirausahaan', 'foto' => 'woman'],
            ['nama' => 'Agus Setiawan, S.T', 'mapel' => 'Sistem IoT', 'foto' => 'man'],
            ['nama' => 'Rina Wati, S.Kom', 'mapel' => 'Game Development', 'foto' => 'woman'],
        ];
    @endphp

    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-12 text-center">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Daftar Guru & Staff</h2>
            <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Pengajar profesional di kompetensi keahlian PPLG</p>

            {{-- Search Bar --}}
            <div class="mt-8 max-w-md mx-auto relative">
                <input type="text" placeholder="Cari nama guru..."
                    class="w-full pl-10 pr-4 py-3 rounded-full border border-gray-200 focus:border-sky-500 focus:ring focus:ring-sky-200 transition shadow-sm outline-none">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        {{-- Grid Container --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach ($gurus as $index => $guru)
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
                            <img src="https://source.unsplash.com/random/200x200?portrait,{{ $guru['foto'] }}&sig={{ $index }}"
                                alt="{{ $guru['nama'] }}"
                                class="w-full h-full rounded-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                    </div>

                    {{-- Info Guru --}}
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-sky-600 transition">
                            {{ $guru['nama'] }}</h3>

                        {{-- Badge Mapel (Pengganti Tombol) --}}
                        <span
                            class="inline-block px-3 py-1 bg-sky-50 text-sky-600 text-xs font-semibold rounded-full border border-sky-100">
                            {{ $guru['mapel'] }}
                        </span>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-web-layout>
