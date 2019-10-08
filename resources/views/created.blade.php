@extends('layouts.master')

@section('content')
    <div class="w-1/2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Password Created
        </label>
        <div class="flex">
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="url" value="{{$url}}"/>
            <button type="submit" id="copy" class="ml-3 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Copy
            </button>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        function copy() {
            var copyText = document.querySelector("#url");
            copyText.select();
            document.execCommand("copy");
        }
        document.querySelector("#copy").addEventListener("click", copy);
    </script>
@endsection
