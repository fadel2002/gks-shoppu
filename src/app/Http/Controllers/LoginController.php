<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials))
        {

            if ($request->get('remember'))
            {
                $user = Auth::getProvider()->retrieveByCredentials($credentials);
                auth()->login($user, true);
            }
            
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerate();
        
        return redirect('/login');
    }
}
