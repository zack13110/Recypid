<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB; 

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function deal(Request $data){
        $data_ = $data->all();
        $additem = DB::table('notify')
        ->insert(array(
            'id_user_A' => $data->id_user_own,
            'id_product_A' => $data->id_product_own,
            'type_product_A' => $data->type_own,
            'id_user_B' => $data->id_user_trader,
            'id_product_B' => $data->id_product_trader,
            'type_product_B' => $data->type_trader,
            'created_at' => new \DateTime(),
            'updated_at' =>  new \DateTime()
         ));
        //exit();
        return view('home');
    }
    public function senddatauser($id){
        $id = 1;
        return redirect('/user/'.$id);
    }
}
