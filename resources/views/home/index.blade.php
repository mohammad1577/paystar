@extends('master')

@section('content')
<div class="flex min-h-screen justify-center items-center">
    @if(auth()->user()->orders()->where("status", "new")->count() > 0)
    <h1>please finish your last order to buy another</h1>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="https://v1.tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">This is static product 1</div>
                <p class="text-gray-700 text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <form action="{{ route("order") }}" method="POST">
                    @csrf
                    <input type="hidden" name="price" value="5000">
                    <button class="py-1 px-3 text-sm font-semibold text-white bg-green-400 hover:bg-green-600 rounded-md transform transition-all duration-300 ease-in-out" type="submit">Buy product</button>
                </form>
            </div>
        </div>
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="https://v1.tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">This is static product 2</div>
                <p class="text-gray-700 text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <form action="{{ route("order") }}" method="POST">
                    @csrf
                    <input type="hidden" name="price" value="5000">
                    <button class="py-1 px-3 text-sm font-semibold text-white bg-green-400 hover:bg-green-600 rounded-md transform transition-all duration-300 ease-in-out" type="submit">Buy product</button>
                </form>
            </div>
        </div>
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="https://v1.tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">This is static product 2</div>
                <p class="text-gray-700 text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <form action="{{ route("order") }}" method="POST">
                    @csrf
                    <input type="hidden" name="price" value="5000">
                    <button class="py-1 px-3 text-sm font-semibold text-white bg-green-400 hover:bg-green-600 rounded-md transform transition-all duration-300 ease-in-out" type="submit">Buy product</button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection