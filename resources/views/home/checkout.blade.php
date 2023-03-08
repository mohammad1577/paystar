@extends('master')

@section('content')
<div class="flex min-h-screen justify-center items-center">
    @if($response["status"] === 1)
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>The message is : {{ $response["message"] }}</p>
            <p>Your product amount to pay is : {{$response["data"]["payment_amount"]}}</p>
            <form action="{{ env('PAYSTAR_API_PAYMENT_URL', "https://core.paystar.ir/api/pardakht/payment/") }}">
                <input type="hidden" name="token" value="{{ $response["data"]["token"] }}">
                <button class="px-2 py-1 hover:text-white transform transition-all duration-300 ease-in-out hover:bg-green-900 bg-transparent ring-2 ring-green-900 text-green-700 font-semibold rounded-md mt-2" type="submit">Pay amount</button>
            </form>
        </div>
    @else
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 max-w-md" role="alert">
            <p class="font-bold">Error</p>
            <p>The error message is : {{ $response["message"] }}</p>
                <a href="{{ route("dashboard") }}" class="px-2 py-1 hover:text-white transform transition-all duration-300 ease-in-out hover:bg-red-900 bg-transparent ring-2 ring-red-900 text-red-700 font-semibold rounded-md mt-2" type="submit">Back to home</a>
        </div>
    @endif
    {{-- {{dd($response)}} --}}
</div>
@endsection