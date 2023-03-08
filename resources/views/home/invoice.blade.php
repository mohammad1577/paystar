@extends('master')

@section('content')
<div class="flex min-h-screen justify-center items-center">
    @if($status === 1)
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>Payment operation was successfully</p>
            <p>Your order id is : {{$order->id}}</p>
            <p>Your product amount was : {{$order->price}}</p>
            <p>Your pay Ref id : {{$order->ref_id}}</p>
            <p>Your pay Transaction id : {{$order->t_id}}</p>
        </div>
    @else
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 max-w-md" role="alert">
            <p class="font-bold">Error</p>
            <p>The error message is : {{ $message }}</p>
            
            <a href="{{ route("dashboard") }}" class="px-2 py-1 hover:text-white transform transition-all duration-300 ease-in-out hover:bg-red-900 bg-transparent ring-2 ring-red-900 text-red-700 font-semibold rounded-md mt-2" type="submit">Back to home</a>
        </div>
    @endif
    {{-- {{dd($response)}} --}}
</div>
@endsection