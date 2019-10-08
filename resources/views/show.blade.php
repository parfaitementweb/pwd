@extends('layouts.master')

@section('content')
    <div>
        <h1 class="text-xl mb-3">Here is your password</h1>

        <div class="mb-6 bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
            <p class="m-0 p-0">It will only be shown one time. Copy it to a safe place.</p>
        </div>

        <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{route('reveal', ['uuid' => $uuid])}}">Show me the password</a>

    </div>
@endsection
