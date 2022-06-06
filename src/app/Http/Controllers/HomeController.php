<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $account = Home::where('a_id', 2)->get();
        // $products = Home::where('categories_id', 20)->get();
        // dd($products);
        // return view('homes.index', compact('products'));
        return view('homes.index', compact('account'));
    }
}
