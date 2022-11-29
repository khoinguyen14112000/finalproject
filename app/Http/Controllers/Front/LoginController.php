<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì
            return redirect('/');
        } else {
            return view('front.login.show');
        }

    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'level' => 1
        ];
        if (Auth::attempt($login)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    /**
     * action logout
     * @return RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
