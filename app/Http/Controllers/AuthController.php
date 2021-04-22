<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'captcha' => 'required|captcha',
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login')->with('success', 'Вы успешно зарегистрировались.');

    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ],($request->get('remember_me')=='on' ? true : false))) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            }
            if (Auth::user()->status) {
                return redirect()->back()->withErrors('Вы были забанены.');
            }
            else {
                return redirect()->home();
            }
        }
        return redirect()->back()->withErrors('Неправельный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
