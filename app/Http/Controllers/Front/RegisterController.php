<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('front.register.show');
    }

    public function store(RegisterRequest $request)
    {
        $data = [
            'email' => $request->txtEmail,
            'password' => Hash::make($request->txtPassword),
            'name' => $request->txtEmail,
            'level' => 1
        ];

        $user = User::create($data);

        auth()->login($user);

        return redirect()->to('/');
    }
}
