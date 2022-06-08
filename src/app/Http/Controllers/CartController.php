<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        $unc = "unclear";
        $orders = DB::table('orders')
                     ->select('*')
                     ->where('users_id', Auth::user()->id)
                     ->where('status', $unc)
                     ->first();
        $orders_detail = DB::table('orders_detail')
                    ->where('orders_id', $orders->id)
                    ->get();

        $user = Auth::user();
        // dd($orders_detail);
        return view('cart.index', compact('orders_detail', 'user'));
    }

    public function store(Request $request){



    }


}
