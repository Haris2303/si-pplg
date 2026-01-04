<x-web-layout>
    <div class="max-w-screen-xl px-4 mx-auto pb-20">

        {{-- Header Section --}}
        <div class="pt-24 pb-12 text-center">
            <h2 class="text-4xl font-bold text-gray-800 tracking-tight">Kurikulum & Mata Pelajaran</h2>
            <div class="w-24 h-1.5 mx-auto mt-4 bg-gradient-to-r from-sky-600 to-sky-400 rounded-full"></div>
            <p class="mt-4 text-gray-500">Materi komprehensif untuk mencetak developer masa depan</p>
        </div>

        {{-- Grid Container --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            @foreach ($subjects as $subject)
                <div
                    class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">

                    {{-- Background Decoration Icon (Faded) --}}
                    <div class="absolute -right-6 -top-6 opacity-5 transform rotate-12 group-hover:scale-110 group-hover:rotate-6 transition duration-500"
                        style="color: {{ $subject->color }}">
                        <img src="{{ Storage::url($subject->icon) }}" alt="icon"
                            class="w-48 h-48 grayscale opacity-50">
                    </div>

                    {{-- Header Icon & Title --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-18 h-16 rounded-2xl flex items-center justify-center text-2xl shadow-sm"
                            style="background-color: {{ $subject->color }}20; color: {{ $subject->color }}">

                            {{-- Icon Image dari Database --}}
                            <img src="{{ Storage::url($subject->icon) }}" alt="icon image"
                                class="w-8 h-8 object-contain">
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">{{ $subject->title }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $subject->description }}</p>
                        </div>
                    </div>

                    {{-- List Mata Pelajaran --}}
                    <div class="space-y-3 relative z-10">
                        @foreach ($subject->subjects as $item)
                            <div
                                class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-white hover:shadow-md transition duration-200 border border-transparent hover:border-gray-100">
                                <div
                                    class="w-5 h-5 rounded-full {{ str_replace('bg-', 'text-', str_replace('text-', 'bg-', $subject->color)) }} flex items-center justify-center text-xs font-bold">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium text-sm">{{ $item['name'] }}</span>
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
