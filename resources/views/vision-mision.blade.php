<x-web-layout>
    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-12 text-center">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Visi & Misi</h2>
            <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Arah dan tujuan kami dalam mencetak talenta digital.</p>
        </div>

        {{-- Container Visi Misi --}}
        <div class="grid md:grid-cols-2 gap-8 items-start">

            {{-- BAGIAN VISI (Kiri - Highlighted) --}}
            <div
                class="bg-gradient-to-br from-sky-900 to-sky-700 rounded-3xl p-8 md:p-12 text-white shadow-xl relative overflow-hidden group">
                {{-- Background Decoration --}}
                <div
                    class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all duration-500">
                </div>
                <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-sky-500/30 rounded-full blur-2xl"></div>

                {{-- Icon Quote --}}
                <div class="mb-6">
                    <svg class="w-12 h-12 text-sky-300 opacity-80" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M14.017 21L14.017 18C14.017 16.0547 15.1965 15.3339 15.9378 15.0298C16.8926 14.638 17.5815 13.9114 17.5815 12.8225V11.236C17.5815 10.1578 16.6974 9.27372 15.6192 9.27372H14.0041C12.9366 9.27372 12.0625 8.39961 12.0625 7.32135V4H19.5434V12.8331C19.5434 14.6547 18.5779 16.2734 16.9298 17.1528C16.2096 17.5372 15.751 18.2868 15.751 19.1044L15.751 21H14.017ZM5.0166 21L5.0166 18C5.0166 16.0547 6.19611 15.3339 6.93741 15.0298C7.89222 14.638 8.58114 13.9114 8.58114 12.8225V11.236C8.58114 10.1578 7.69707 9.27372 6.61884 9.27372H5.00373C3.93623 9.27372 3.06212 8.39961 3.06212 7.32135V4H10.543V12.8331C10.543 14.6547 9.57753 16.2734 7.92945 17.1528C7.20922 17.5372 6.75061 18.2868 6.75061 19.1044L6.75061 21H5.0166Z">
                        </path>
                    </svg>
                </div>

                <h3 class="text-2xl font-bold mb-4 tracking-wide text-sky-100 uppercase text-sm">Visi Kami</h3>

                {{-- ISI VISI (Ganti text ini) --}}
                <p class="text-2xl md:text-3xl font-serif font-medium leading-relaxed">
                    {{ $profile->vision }}
                </p>
            </div>

            {{-- BAGIAN MISI (Kanan - List) --}}
            <div class="bg-white rounded-3xl p-8 md:p-10 border border-gray-100 shadow-lg h-full">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                    <span class="w-2 h-8 bg-sky-600 rounded-full"></span>
                    Misi Kami
                </h3>

                <ul class="space-y-6">

                    @foreach ($profile->mision ?? [] as $item)
                        <li class="flex items-start gap-4 group">
                            <div
                                class="flex-shrink-0 w-8 h-8 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center group-hover:bg-sky-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600 leading-relaxed">
                                {{ $item['mision'] }}
                            </p>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>

    </div>
</x-web-layout>
