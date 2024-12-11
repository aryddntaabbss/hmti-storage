<nav class="bg-white dark:bg-gray-800 shadow-md">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <!-- Kiri: Logo atau link lainnya -->
            <div class="flex-1 flex items-center sm:items-stretch sm:justify-start">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-800 dark:text-white flex items-center">
                    <img src="{{ asset('asset/img/logo.png') }}" alt="Logo HMTI" class="h-5 mr-2" />
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <!-- Kanan: Navigasi atau tombol lain -->
            <div class="flex items-center sm:ml-6">
                <button id="mode-toggle"
                    class="dark:text-gray-800 text-white bg-blue-500 dark:bg-white px-1 py-1 rounded-full text-sm font-medium hover:bg-blue-600 hover:text-white dark:hover:bg-gray-200 dark:hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m6.364 3.636l1.414-1.414M18 12h2m-3.636 6.364l1.414 1.414M12 18v2m-6.364-3.636l-1.414 1.414M6 12H4m3.636-6.364l-1.414-1.414">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>