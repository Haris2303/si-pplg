<footer class="bg-gray-900 absolute w-full">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="#" class="flex items-center">
                    <img src="/img/logo-pplg.png" class="h-8 me-3" alt="PPLG Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">PPLG</span>
                </a>
                <p class="text-white md:w-[30rem] mt-5">
                    {{ Str::limit(strip_tags($profile->about_description), 250) }}</p>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase text-white">Resources</h2>
                    <ul class="text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="https://flowbite.com/" class="hover:underline">Flowbite</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                        </li>
                        <li>
                            <a href="https://laravel.com/" class="hover:underline">Laravel</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase text-white">Follow us</h2>
                    <ul class="text-gray-400 font-medium">
                        @if (isset($profile->social_media))
                            @foreach ($profile->social_media as $platform => $url)
                                <li class="mb-4">
                                    <a href="{{ $url }}" target="_blank"
                                        class="hover:text-white transition flex items-center">
                                        {{ $platform }}
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li><span class="text-gray-600">Belum ada sosmed</span></li>
                        @endif
                    </ul>
                </div>
                {{-- KONTAK (Dinamis dari Kontak) --}}
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase text-white">Kontak</h2>
                    <ul class="text-gray-400 font-medium text-sm space-y-3">
                        @if (isset($profile->email))
                            <li class="flex gap-2 mb-5">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>{{ $profile->email }}</span>
                            </li>
                        @endif
                        @if (isset($profile->phone))
                            <li class="flex gap-2 mb-4">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                <span>+62 {{ $profile->phone }}</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 sm:text-center">
                © {{ date('Y') }} <a href="/" class="hover:underline">PPLG™</a>. All Rights Reserved.
            </span>
        </div>
    </div>
</footer>
