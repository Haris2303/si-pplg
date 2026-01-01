<x-web-layout>

    {{-- Background Header Kecil (Opsional, untuk memisahkan navbar dengan konten) --}}
    <div class="h-20 bg-gray-50"></div>

    <div class="max-w-screen-xl px-4 mx-auto py-12">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-full">

                {{-- Kategori & Tanggal --}}
                <div class="flex items-center gap-4 mb-4">
                    <span
                        class="px-3 py-1 bg-sky-100 text-sky-600 text-xs font-bold rounded-full uppercase tracking-wider">
                        Teknologi
                    </span>
                    <span class="text-gray-400 text-sm flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        12 Desember 2023
                    </span>
                </div>

                {{-- Judul Besar --}}
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-6">
                    Cara Install Laravel 11 dengan Mudah di Windows Menggunakan Laragon
                </h1>

                {{-- Author Info --}}
                <div class="flex items-center gap-3 mb-8 pb-8 border-b border-gray-100">
                    <img src="https://picsum.photos/100/100?man" alt="Author"
                        class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-bold text-gray-800">Pak Budi Santoso</p>
                        <p class="text-xs text-gray-500">Guru Produktif PPLG</p>
                    </div>
                </div>

                {{-- Featured Image --}}
                <div class="rounded-2xl overflow-hidden mb-10 shadow-lg">
                    <img src="https://picsum.photos/800/450?tech" alt="Cover" class="w-full h-auto object-cover">
                    <p class="text-center text-gray-400 text-xs mt-2 italic">Ilustrasi: Environment Development PHP</p>
                </div>

                {{-- ISI KONTEN (ARTICLE BODY) --}}
                {{-- Class 'prose' ini ajaib, dia otomatis men-styling h2, p, ul, ol, blockquote --}}
                <article class="prose prose-lg prose-sky max-w-none text-gray-700">
                    <p class="lead">
                        Laravel adalah framework PHP yang paling populer saat ini. Sebelum mulai ngoding, kita perlu
                        menyiapkan environment-nya terlebih dahulu.
                    </p>

                    <h2>Kenapa Menggunakan Laragon?</h2>
                    <p>
                        Laragon adalah local server yang sangat ringan, portable, dan cepat. Berbeda dengan XAMPP,
                        Laragon sudah menyediakan fitur <strong>Pretty URL</strong> (misal: <code>project.test</code>)
                        dan isolasi versi PHP yang mudah.
                    </p>

                    <blockquote>
                        "Pemilihan tools yang tepat akan meningkatkan produktivitas developer hingga 50%."
                    </blockquote>

                    <h3>Langkah-langkah Instalasi:</h3>
                    <ul>
                        <li>Download Laragon Full Version dari situs resminya.</li>
                        <li>Install seperti biasa (Next, Next, Finish).</li>
                        <li>Buka Terminal Laragon, lalu ketik perintah instalasi Laravel.</li>
                    </ul>

                    <pre><code class="language-bash">composer create-project laravel/laravel nama-project</code></pre>

                    <p>
                        Setelah selesai, jangan lupa jalankan <code>php artisan migrate</code> untuk membuat tabel
                        database.
                    </p>
                </article>

                {{-- Tags --}}
                <div class="mt-10 pt-8 border-t border-gray-100">
                    <h4 class="text-sm font-bold text-gray-800 mb-3">Tags:</h4>
                    <div class="flex flex-wrap gap-2">
                        <a href="#"
                            class="px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-lg hover:bg-gray-200 transition">#Laravel</a>
                        <a href="#"
                            class="px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-lg hover:bg-gray-200 transition">#Tutorial</a>
                        <a href="#"
                            class="px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-lg hover:bg-gray-200 transition">#PPLG</a>
                    </div>
                </div>

                {{-- Share Buttons --}}
                <div class="mt-8 flex items-center gap-4">
                    <span class="text-sm font-bold text-gray-800">Bagikan:</span>
                    <button
                        class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition"><svg
                            class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg></button>
                    <button
                        class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600 transition"><svg
                            class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.988-1.459l-6.005 1.666zm5.232-6.241h.001l.494.305c1.235.753 2.664 1.156 4.125 1.156 4.636 0 8.406-3.774 8.409-8.409.002-4.635-3.768-8.409-8.404-8.409-4.64 0-8.409 3.774-8.407 8.409-.001 1.571.432 3.013 1.249 4.269l.325.513-1.03 3.766 3.839-1.001z" />
                        </svg></button>
                </div>

            </div>

        </div>

    </div>
</x-web-layout>
