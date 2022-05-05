<nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand">Agenda Vacina</a>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/admin/dashboard/index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            @endauth
        </div>
    @endif
</nav>
