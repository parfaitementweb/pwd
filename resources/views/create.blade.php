@extends('layouts.master')

@section('content')
    <div class="w-1/3">
        <h1 class="text-xl mb-6 text-gray-500">Enter the password to share</h1>

        <form action="{{route('update')}}" method="POST" class="block">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border {{ $errors->has('pwd') ? 'border-red-500' : '' }} rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" type="password" name="pwd" required="required" autocomplete="off">
                @if($errors->has('pwd'))
                    <p class="text-red-500 text-xs italic">Please choose a password.</p>
                @endif
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Create
            </button>
        </form>
    </div>
@endsection
