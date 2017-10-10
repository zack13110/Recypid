<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use App\buy;
use Illuminate\Support\Facades\Validator;


class buyController extends Controller
{
    public function buy(Request $data)
    
    {   
        $a = buy::create(Request::all());
        $id_buying = $a->id;
        return redirect()->action(
            'buyController@show', ['id' => $id_buying]
        );
    }
    public function show($id){

    $data_buyer = DB::table('buys')->where( ['id'=> $id])->get();
   
    echo '<pre>';
    print_r($data_buyer);
    foreach ($data_buyer as $key){
        
        //$id_user =  $key->id_user;
        $type_x = $key->type;
        $sub_type_x = $key->sub_type;
        $gender_x = $key->gender;
        $time_x = $key->time;

        $data_seller_matching = DB::table('sells')->where( ['type'=> $type_x])->get();
        foreach ($data_seller_matching as $key_){
            $type_y = $key_->type;
            $sub_type_y = $key_->sub_type;
            $gender_y = $key_->gender;
            $time_y = $key_->time;
            echo '<pre>';
            print_r($data_seller_matching);
            /*calculate */
            $cal_xdoty = ($sub_type_x*$sub_type_y)+($gender_x*$gender_y)+($time_x*$time_y);
            $cal_xy = sqrt(pow($sub_type_x,2)+pow($gender_x,2)+pow($time_x,2)) * sqrt(pow($sub_type_y,2)+pow($gender_y,2)+pow($time_y,2));
            $cal = $cal_xdoty / $cal_xy;
            
            if($cal > 0.85){
                $matching[] = $key_->id;
            }
            }
         }
         foreach ($matching as $key){
            $id_sell=$key;
            $sell_selection = DB::table('sells')->where( ['id'=> $id_sell])->get();
            foreach($buy_selection as $key_buy){
                $type_name_sel = DB::table('type_names')->where( ['id'=> $key_sell->type])->get();
                $sub_type_name_sel = DB::table('sub_type_names')->where( ['type_id'=> $key_sell->type,'sub_type_id'=> $key_sell->sub_type])->get();
                foreach ($type_name_sel as $x){
                    $type_name =$x->name;
                }
                foreach ($sub_type_name_sel as $y){
                    $sub_type_name =$y->sub_type_name;
                }
                $sell[] = array(
                    "id" => $key_sell->id,
                    "name" => $key_sell->name,  
                    "type" => $type_name,
                    "sub_type" => $sub_type_name,
                    "volume" => $key_sell->volume,
                    "price" => $key_sell->price,
                    "date" => $key_sell->created_at,
                    "image" => "/bower_components/AdminLTE/dist/img/photo1.png",
                );    
            }
        }
        echo "<pre>";
        rsort($sell);
        print_r($sell);
        exit();
        return view('post_view',['db_sell'=> $sell]);
         
    }
}   