<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function showRegister ()
    {
        return view('auth.register');
    }

    public function showLogin ()
    {
        return view('auth.login');
    
    }

        public function register (Request $request)
    {
        $validated = $request->validate([
            'username' => 'required | string | max:255',
            'email' => 'required | email | unique:users',
            'password' => 'required | string | min:6 | confirmed',
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('show.login');
    }

    public function login (Request $request)
    {
        $validated = $request->validate([
            'username' => 'required | string | max:255',
            'password' => 'required | string',
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('central.index');
        }

        throw ValidationException::withMessages([
            'credentials' => 'incorrect login credentials'
        ]);


    
    }

    public function logout (Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    
    }
}
