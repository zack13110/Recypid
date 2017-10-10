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
<<<<<<< HEAD
        $db_sell = DB::table('sells')->where('id_user', '$id_user')->get();
        $db_buy = DB::table('buys')->where('id_user', '$id_user')->get();
        
        return view('home',['db_sell'=> $db_sell, 'db_buy' => $db_buy]);
=======
        
        $db_sell = DB::table('sells')->where('id_user', $id_user)->get();
        $db_buy = DB::table('buys')->where('id_user', $id_user)->get();
        $buy =array();
        foreach ($db_buy as $b){
            $type_name_sel = DB::table('type_names')->where( ['id'=> $b->type])->get();
            $sub_type_name_sel = DB::table('sub_type_names')->where( ['type_id'=> $b->type,'sub_type_id'=> $b->sub_type])->get();
            foreach ($type_name_sel as $x){
                $type_name =$x->name;
            }
            foreach ($sub_type_name_sel as $y){
                $sub_type_name =$y->sub_type_name;
            }
            $buy[] = array(
                "id" => $b->id,
                "name" => $b->name,  
                "type" => $type_name,
                "sub_type" => $sub_type_name,
                "volume" => $b->volume,
                "price" => $b->price,
                "date" => $b->created_at,
                "image" => "/bower_components/AdminLTE/dist/img/photo1.png",
            );    
        }
        return view('home',['db_sell'=> $db_sell, 'db_buy' => $buy, 'id_user' => $id_user]);
>>>>>>> 422a3dfa89e75eae7026414e5964f38d6c46472e
    }
}
