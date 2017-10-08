<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function sells(Request $request)

    {   
        print_r($request);
        exit();
        $type = $request->input['type'];
        $sub_type = $request->input['sub_type'];
        $gender = $request->input['gender'];
        $time = $request->input['time'];
        $volume = $request->input['volume'];
        $price = $request->input['price'];
        $name = $request->input['name'];
        $desc = $request->input['desc'];
        
    }
}
