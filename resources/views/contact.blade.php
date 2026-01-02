<x-web-layout>
    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-12 text-center">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Hubungi Kami</h2>
            <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Punya pertanyaan seputar PPLG? Kami siap membantu.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-start">

            {{-- KOLOM KIRI: INFO KONTAK & SOSMED --}}
            <div class="space-y-8">

                {{-- Intro Text --}}
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Tetap Terhubung</h3>
                    <p class="text-gray-600 leading-relaxed text-justify">
                        Jangan ragu untuk menghubungi kami jika Anda membutuhkan informasi lebih lanjut mengenai
                        pendaftaran, kurikulum, atau kerjasama industri (PKL/Magang).
                    </p>
                </div>

                {{-- Contact Items --}}
                <div class="space-y-4">
                    {{-- Alamat --}}
                    <div
                        class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm border border-gray-100 hover:border-sky-200 transition">
                        <div
                            class="w-10 h-10 rounded-full bg-sky-100 flex items-center justify-center text-sky-600 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Alamat Sekolah</h4>
                            <p class="text-gray-500 text-sm mt-1">{{ $profile->address }}</p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div
                        class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-sm border border-gray-100 hover:border-sky-200 transition">
                        <div
                            class="w-10 h-10 rounded-full bg-sky-100 flex items-center justify-center text-sky-600 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Email Jurusan</h4>
                            <p class="text-gray-500 text-sm mt-1">{{ $profile->email }}</p>
                        </div>
                    </div>

                    {{-- WhatsApp --}}
                    <div
                        class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-sm border border-gray-100 hover:border-sky-200 transition">
                        <div
                            class="w-10 h-10 rounded-full bg-sky-100 flex items-center justify-center text-sky-600 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">WhatsApp Admin</h4>
                            <p class="text-gray-500 text-sm mt-1">+62 {{ $profile->phone }}</p>
                        </div>
                    </div>
                </div>

                {{-- Social Media Links --}}
                <div class="pt-6">
                    <h4 class="font-bold text-gray-800 mb-4">Ikuti Kami</h4>
                    <div class="flex gap-4">
                        @if (isset($profile->social_media) && is_array($profile->social_media))
                            @foreach ($profile->social_media as $platform => $url)
                                <a href="{{ $url }}" target="_blank"
                                    class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-sky-600 hover:text-white transition duration-300">
                                    @php $platformName = strtolower($platform); @endphp
                                    @if ($platformName == 'instagram')
                                        {{-- Instagram Icon --}}
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                        </svg>
                                    @elseif ($platformName == 'youtube')
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                                        </svg>
                                    @elseif ($platformName == 'tiktok')
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.65-1.62-1.12-8.84 8.12 1.12 19.3-8.1 14.62-3.8-1.93-6.42-6.15-5.91-10.42.34-2.88 1.84-5.5 4.14-7.24 3.02-2.3 7.37-2.19 10.32.22.13-.09.26-.18.39-.27V.02zm-2.73 14.7c-2.03.02-3.96 1.14-4.97 2.91-1.02 1.77-.96 4.01.16 5.73 1.13 1.73 3.17 2.74 5.23 2.58 2.06-.16 3.96-1.47 4.82-3.34.86-1.87.69-4.13-.43-5.83-1.1-1.68-3.04-2.72-5.07-2.67-.18 0-.37.01-.55.03v-4.63c-1.37 1.12-2.32 2.72-2.69 4.46-.37 1.74-.08 3.56.81 5.11.89 1.55 2.45 2.63 4.22 2.92 1.77.29 3.62-.26 4.98-1.49V9.82c-.88.66-1.92 1.05-3.02 1.12-1.1.07-2.19-.24-3.1-.89-.91-.65-1.57-1.56-1.88-2.61-.31-1.05-.22-2.18.25-3.17.47-1 1.34-1.78 2.39-2.15 1.05-.37 2.2-.28 3.19.25.99.53 1.74 1.43 2.08 2.48.34 1.05.24 2.19-.28 3.16z" />
                                        </svg>
                                    @else
                                        <span class="font-bold uppercase text-sm">{{ substr($platform, 0, 1) }}</span>
                                    @endif
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: FORM PESAN --}}
            <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 relative overflow-hidden">
                {{-- Background Decoration --}}
                <div class="absolute top-0 right-0 w-32 h-32 bg-sky-100 rounded-bl-full opacity-50 -mr-8 -mt-8"></div>

                <h3 class="text-2xl font-bold text-gray-800 mb-6 relative z-10">Kirim Pesan</h3>

                <form action="#" method="POST" class="space-y-5 relative z-10">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text"
                            class="w-full rounded-lg border-gray-300 focus:border-sky-500 focus:ring focus:ring-sky-200 transition shadow-sm"
                            placeholder="Contoh: Budi Santoso">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email"
                            class="w-full rounded-lg border-gray-300 focus:border-sky-500 focus:ring focus:ring-sky-200 transition shadow-sm"
                            placeholder="email@contoh.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                        <select
                            class="w-full rounded-lg border-gray-300 focus:border-sky-500 focus:ring focus:ring-sky-200 transition shadow-sm">
                            <option>Informasi PPDB</option>
                            <option>Kerjasama Industri (PKL)</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                        <textarea rows="4"
                            class="w-full rounded-lg border-gray-300 focus:border-sky-500 focus:ring focus:ring-sky-200 transition shadow-sm"
                            placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>

                    <button type="submit"
                        class="w-full py-3 px-4 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-lg transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Kirim Pesan
                    </button>
                </form>
            </div>

        </div>

        {{-- MAPS SECTION --}}
        <div class="mt-20">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Lokasi Kami</h3>
            <div class="w-full h-96 bg-gray-200 rounded-3xl overflow-hidden shadow-lg border border-gray-100">
                {{-- GOOGLE MAPS EMBED CODE --}}
                {{-- Cara ganti: Buka Google Maps > Cari Sekolah > Share > Embed a map > Copy HTML > Paste di sini --}}
                {!! $profile->maps_embed !!}
            </div>
        </div>

    </div>
</x-web-layout>
