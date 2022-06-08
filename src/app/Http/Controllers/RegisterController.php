<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'a_id' => 'required',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email:dns|unique:account',
            'password' => 'required|min:6|max:255',
            'a_alamat' => 'required'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        // $query = "nextval('ACCOUNT_SEQ') as nxt";
        // $validated['a_id'] = User::selectRaw($query)->value('nxt');
        // $apa = `nextval('ACCOUNT_SEQ')`;
        // $validated = $request->merge(['a_id' => $apa]);
        
        // $validated['role'] = 'customer';
        // dd($validated);

        // if (($user = User::create($validated))){
        // $ini_itu = DB::insert('insert into ACCOUNT (a_id, username, email, password, a_alamat)
        // values (?, ?, ?, ?, ?)', ['a_id' => $validated['a_id'], 'username' => $validated['username'], 'email' => $validated['email'], 'password' => $validated['password'], 'a_alamat' => $validated['a_alamat']]);

        if (($user = User::create($validated))){
        // if ($ini_itu){
            // dd($user);
            if ($request->get('remember'))
            {
                // auth()->login($ini_itu, true);
                auth()->login($user, true);
            }else 
            {
                // auth()->login($ini_itu);
                auth()->login($user);
            }
            
            return redirect('/login')->with('loginError', 'Login failed!');
        }

        return redirect('/register')->with('failed', 'Register failed!');
    }
}
