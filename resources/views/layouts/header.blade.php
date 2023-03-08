<header class="fixed inset-x-0 top-0 h-12 bg-gray-700 text-white px-3">
    <div class="flex justify-between items-center h-full">
        <div>{{ config('app.name', 'PayStar') }}</div>
        <div class="flex gap-7 items-center justify-between">
            @auth
                <a class="hover:bg-gray-500 transform transition-all duration-300 ease-in-out px-2 py-1 rounded-md" href="{{ route('checkout') }}">Checkout</a>
                <a class="hover:bg-red-400 transform transition-all duration-300 ease-in-out px-2 py-1 rounded-md" href="{{ route('logout') }}">Logout</a>
            @endauth
            @guest
                <a class="hover:bg-gray-500 transform transition-all duration-300 ease-in-out px-2 py-1 rounded-md" href="{{ route('loginView') }}">Login</a>
                <a class="hover:bg-gray-500 transform transition-all duration-300 ease-in-out px-2 py-1 rounded-md" href="{{ route('registerView') }}">Register</a>
            @endguest
        </div>
    </div>
</header>