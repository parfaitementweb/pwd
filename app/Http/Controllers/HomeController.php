<?php

namespace App\Http\Controllers;

use App\Password;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        return view('welcome');
    }

    public function show(Request $request, string $uuid)
    {
        $password = Password::findByUuidOrFail($uuid);

        return view('show', ['uuid' => $password->uuid]);
    }

    public function reveal(Request $request, string $uuid)
    {
        $password = Password::findByUuidOrFail($uuid);
        $pwd = decrypt($password->pwd);

        $password->delete();

        return view('reveal', ['pwd' => $pwd]);
    }

    public function create(Request $request)
    {
        return view('create');
    }

    public function update(Request $request)
    {
        $request->validate([
            'pwd' => 'required|string'
        ]);

        $password = new Password();
        $password->pwd = encrypt($request->input('pwd'));
        $password->save();

        return redirect(route('created', ['uuid' => $password->uuid]));
    }

    public function created(Request $request, string $uuid)
    {
        return view('created', ['url' => route('show', ['uuid' => $uuid])]);
    }
}
