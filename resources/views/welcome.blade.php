@extends('layouts.master')

@section('content')
    <div class="text-center">
        <h1 class="text-6xl text-gray-700">Password Sharer</h1>
        <a href="{{ route('create') }}" class="mt-3 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
            Share a password
        </a>
    </div>
@endsection
