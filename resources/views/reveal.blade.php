@extends('layouts.master')

@section('content')
    <div>
        <h1 class="text-xl mb-3">Here is your password</h1>

        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold text-2xl">{{ $pwd }}</p>
        </div>

        <p class="text-gray-500 text-xs mt-3">The password has been deleted from our servers. <br>This is the last time it will be displayed.</p>

    </div>
@endsection
