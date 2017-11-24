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
            'confirm_A'=> '0',
            'confirm_B'=> '0',
            'created_at' => new \DateTime(),
            'updated_at' =>  new \DateTime()
         ));
        //exit();
        return redirect('home');
    }
    public function senddatauser($id){
        $notify = DB::table('notify')->where( ['id'=> $id])->first();
        $id_user = Auth::user()->id;
        $comment = array();
        $data_sent_user = array();
        if($id_user == $notify->id_user_A)
        {
            $send_id_user = $notify->id_user_B;
        }
        else if($id_user == $notify->id_user_B)
        {
            $send_id_user = $notify->id_user_A;
        }
        $data = $notify;
        $data_sent_user = DB::table('users')->where( ['id'=> $send_id_user])->first();
        $comment = DB::table('comments')->where( ['id_main_user'=> $send_id_user])
                    ->join('users', 'comments.id_commenter','=','users.id')
                    ->select('comments.*','users.name','users.sub_name','users.name','users.avatar')
                    ->orderBy('created_at', 'desc')->get();

        return view('comment_view',['data_sent_user'=> $data_sent_user,'comment'=> $comment,'data'=> $data, 'send_id_user'=>$send_id_user]);
    }
    public function commentpost(Request $request){
        $id_notify = $request->input('id_notify');
        $rating = $request->input('rating');
        $comment = $request->input('comment');
        $id_commenter = $request->input('id_commenter');
        $id_user_commened = $request->input('id_user_commened');
        $confirm_auth = DB::table('notify')
        ->where(['id'=> $id_notify])
        ->first();
        if($confirm_auth->id_user_A == $id_commenter){
            $confirm_auth = DB::table('notify')
            ->where(['id'=> $id_notify])
            ->update(array('confirm_A' => 1));
        }else{
            $confirm_auth = DB::table('notify')
            ->where(['id'=> $id_notify])
            ->update(array('confirm_B' => 1));
        }
        $addcomment = DB::table('comments')
        ->insert(array(
            'id_main_user' => $id_user_commened,
            'id_commenter' => $id_commenter,
            'rating' => $rating,
            'comment' => $comment,
            'created_at' => new \DateTime(),
            'updated_at' =>  new \DateTime()
         ));
        //exit();
        return redirect("notify/".$id_notify);
    }
}
