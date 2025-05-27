<?php

namespace App\Http\Controllers\V0;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController {

    public function register(RegisterRequest $request) {
        $data = $request->validated();

        if(!empty($data['remember'])) {
            $this->setCookie($data);
        }

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => '0',
        ]);

        Auth::login($user);

        return redirect()->route('index');
    }

    public function login(LoginRequest $request) {
        $data = $request->validated();

        if(!empty($data['remember'])) {
            $this->setCookie($data);
        }

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect()->route('index');
        } else {
            return redirect()->route('login')->with('error_login', "Неверный логин или пароль");
        }
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('index');
    }

    public function setCookie($data) : void {
        Cookie::queue('email', $data['email'], 86000);
        Cookie::queue('password', $data['password'], 86000);
        Cookie::queue('remember', $data['remember'], 86000);
    }

}
