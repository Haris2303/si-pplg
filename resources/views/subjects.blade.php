<x-web-layout>
    {{-- DATA DUMMY MATA PELAJARAN --}}
    @php
        $clusters = [
            [
                'title' => 'Dasar Pengembangan Perangkat Lunak',
                'icon' => 'code', // logic identifier
                'desc' => 'Fondasi logika pemrograman, algoritma, dan pengenalan perangkat keras.',
                'subjects' => [
                    'Sistem Komputer & IoT Dasar',
                    'Logika & Algoritma Pemrograman',
                    'Dasar-dasar HTML & CSS',
                    'Pengenalan Version Control (Git)',
                ],
                'color' => 'bg-emerald-100 text-emerald-600',
            ],
            [
                'title' => 'Web Development',
                'icon' => 'globe',
                'desc' => 'Membangun aplikasi berbasis website yang dinamis dan responsif.',
                'subjects' => [
                    'Frontend: JavaScript & Tailwind CSS',
                    'Backend: PHP Native & Laravel',
                    'Database Management (MySQL)',
                    'Rest API Development',
                ],
                'color' => 'bg-sky-100 text-sky-600',
            ],
            [
                'title' => 'Mobile Development',
                'icon' => 'mobile',
                'desc' => 'Pembuatan aplikasi smartphone berbasis Android dan iOS.',
                'subjects' => [
                    'Pemrograman Java (OOP)',
                    'Android Studio / Kotlin',
                    'Flutter / React Native',
                    'Mobile UI/UX Design',
                ],
                'color' => 'bg-orange-100 text-orange-600',
            ],
            [
                'title' => 'Produk Kreatif & Kewirausahaan',
                'icon' => 'business',
                'desc' => 'Mempersiapkan siswa membangun startup dan bisnis digital.',
                'subjects' => [
                    'Perencanaan Bisnis Digital',
                    'Hak Kekayaan Intelektual (HAKI)',
                    'Digital Marketing & SEO',
                    'Manajemen Proyek (Scrum/Agile)',
                ],
                'color' => 'bg-purple-100 text-purple-600',
            ],
        ];
    @endphp

    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-12 text-center">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Kurikulum & Mata Pelajaran</h2>
            <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Materi komprehensif untuk mencetak developer masa depan</p>
        </div>

        {{-- Grid Container --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            @foreach ($clusters as $cluster)
                <div
                    class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">

                    {{-- Background Decoration Icon (Faded) --}}
                    <div
                        class="absolute -right-6 -top-6 opacity-5 transform rotate-12 group-hover:scale-110 group-hover:rotate-6 transition duration-500">
                        <svg class="w-48 h-48 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                            {{-- Simple conditional icon rendering --}}
                            @if ($cluster['icon'] == 'code')
                                <path
                                    d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" />
                            @elseif($cluster['icon'] == 'globe')
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
                            @elseif($cluster['icon'] == 'mobile')
                                <path
                                    d="M17 1.01L7 1c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-1.99-2-1.99zM17 19H7V5h10v14z" />
                            @else
                                <path
                                    d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z" />
                            @endif
                        </svg>
                    </div>

                    {{-- Header Icon & Title --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-14 h-14 rounded-2xl {{ $cluster['color'] }} flex items-center justify-center text-2xl shadow-sm">
                            {{-- Icon displayed --}}
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                @if ($cluster['icon'] == 'code')
                                    <path
                                        d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" />
                                @elseif($cluster['icon'] == 'globe')
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
                                @elseif($cluster['icon'] == 'mobile')
                                    <path
                                        d="M17 1.01L7 1c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-1.99-2-1.99zM17 19H7V5h10v14z" />
                                @else
                                    <path
                                        d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z" />
                                @endif
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">{{ $cluster['title'] }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $cluster['desc'] }}</p>
                        </div>
                    </div>

                    {{-- List Mata Pelajaran --}}
                    <div class="space-y-3 relative z-10">
                        @foreach ($cluster['subjects'] as $subject)
                            <div
                                class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-white hover:shadow-md transition duration-200 border border-transparent hover:border-gray-100">
                                <div
                                    class="w-5 h-5 rounded-full {{ str_replace('bg-', 'text-', str_replace('text-', 'bg-', $cluster['color'])) }} flex items-center justify-center text-xs font-bold">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium text-sm">{{ $subject }}</span>
                            </div>
                        @endforeach
                    </div>

                </div>
            @endforeach

        </div>

        {{-- Footer Note --}}
        <div class="mt-12 text-center">
            <p class="text-gray-400 text-sm">
                * Kurikulum dapat berubah menyesuaikan kebutuhan industri (Link & Match).
            </p>
        </div>

    </div>
</x-web-layout>
