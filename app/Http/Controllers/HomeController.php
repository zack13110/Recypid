<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $db_sell = DB::table('sells')->where('id_user', '$id_user')->get();
        $db_buy = DB::table('buys')->where('id_user', '$id_user')->get();
        
        return view('home',['db_sell'=> $db_sell, 'db_buy' => $db_buy]);
    }
}
