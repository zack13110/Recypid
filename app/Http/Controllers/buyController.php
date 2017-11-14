<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\buy;

class buyController extends Controller
{
    public function buy(Request $data)
    
    {
        //--------------------validation---------------//
        $name = $data->input('name');
        $sub_type = $data->input('sub_type');
        $price = $data->input('price');
        if($name == "" || $sub_type == "" || $price == ""||$volume = ""){
        $error = "--------------------------";
            return redirect()->back()->with('error'. $error);
        }
        else{
        //$items = $data->all();
        //$a = buy::create($items);
        
        $id_user = $data->input('id_user');
        $type = $data->input('type');
        $sub_type = $data->input('sub_type');
        $gender = $data->input('gender');
        $time_duration = $data->input('time');
        if($time_duration == 'เช้า'){
            $morning = 10;
            $noon = 0;
            $afternoon=0;
            $evening =0;
            $night = 0;
        }
        else if ($time_duration == 'กลางวัน') 
        {
            $morning = 0;
            $noon = 10;
            $afternoon=0;
            $evening =0;
            $night = 0;
        }
        else if ($time_duration == 'บ่าย') 
        {
            $morning = 0;
            $noon = 0;
            $afternoon=10;
            $evening =0;
            $night = 0;
        }
        else if ($time_duration == 'เย็น') 
        {
            $morning = 0;
            $noon = 0;
            $afternoon=0;
            $evening =10;
            $night = 0;
        }
        else if ($time_duration == 'กลางคืน') 
        {
            $morning = 0;
            $noon = 0;
            $afternoon=0;
            $evening =0;
            $night = 10;
        }
        $volume = $data->input('volume');
        $price = $data->input('price');
        $image = 'default';
        $name = $data->input('name');
        $desc = $data->input('desc');
        $additem = DB::table('buys')
        ->insert(array(
            'id_user'      => $id_user,
            'type' => $type,
            'sub_type'     => $sub_type,
            'gender'      => $gender,
            'morning'=> $morning,
            'noon' => $noon,
            'afternoon' => $afternoon,
            'evening' =>  $evening,
            'night' => $night,
            'volume' => $volume,
            'price' => $price,
            'image' => $image,
            'name' => $name,
            'desc' => $desc,
            'created_at' => new \DateTime(),
            'updated_at' =>  new \DateTime()
        ));

        $id_buying = $additem->id;


        return redirect()->action(
            'buyController@show', ['id' => $id_buying]
        );
    }
        //--------------------validation---------------//
    }
    public function show($id){
    $data_buyer = DB::table('buys')->where( ['id'=> $id])->get();
   
    //echo '<pre>';
    //print_r($data_buyer);
    foreach ($data_buyer as $key){
        
        //$id_user =  $key->id_user;
        $id_user_x =  $key->id_user;
        $name_product = $key->name;
        $type_x = $key->type;
        $desc_x = $key->desc;
        $sub_type_x = $key->sub_type;
        $gender_sel_owner = DB::table('gender_names')->where( ['id_gender'=> $key->gender])->get();
        $time_sel_owner = DB::table('time_names')->where( ['id'=> $key->time])->get();
        $type_name_sel_owner = DB::table('type_names')->where( ['id'=> $key->type])->get();
        $sub_type_name_sel_owner = DB::table('sub_type_names')->where( ['type_id'=> $key->type,'sub_type_id'=> $key->sub_type])->get();
        foreach ($type_name_sel_owner as $x)
        {
            $type_name_owner =$x->name;
        }
        foreach ($sub_type_name_sel_owner as $y)
        {
            $sub_type_name_owner =$y->sub_type_name;
        }
        foreach ($time_sel_owner as $z)
        {
            $time_x_name =$z->name;
        }
        foreach ($gender_sel_owner as $w)
        {
            $gender_x_name =$w->name;
        }
        // print_r($gender_x);
        // exit();
        $gender_x = $key->gender;
        $price_x = $key->price;
        $volume_x= $key->volume;
        $time_x = $key->time;
        $data_seller_matching = DB::table('sells')->where( ['type'=> $type_x])->where('id_user','!=',$id_user_x)->get();
        //echo '<pre>';
        //print_r($data_seller_matching);
        
        $matching =array();
        if(count($data_seller_matching) != 0){
        foreach ($data_seller_matching as $key_){
            $type_y = $key_->type;
            $sub_type_y = $key_->sub_type;
            $gender_y = $key_->gender;
            $time_y = $key_->time;
            //echo '<pre>';
            //print_r($data_seller_matching);
            /*calculate */
            
            $cal_xdoty = ($sub_type_x*$sub_type_y)+($gender_x*$gender_y)+($time_x*$time_y);
            $cal_xy = sqrt(pow($sub_type_x,2)+pow($gender_x,2)+pow($time_x,2)) * sqrt(pow($sub_type_y,2)+pow($gender_y,2)+pow($time_y,2));
            $cal = $cal_xdoty / $cal_xy;
            
            if($cal > 0.75){
                $matching[] = $key_->id;
                //echo $key_->id.'-'.$cal;exit();
            }
         }
         
        }
        $sell = array();
        if(count($data_seller_matching) != 0){
        //print_r($matching);
        foreach ($matching as $key){
            $id_sell=$key;
            $sell_selection = DB::table('sells')->where( ['id'=> $id_sell])->get();
            //print($sell_selection);
            //exit();
            foreach($sell_selection as $key_sell){
                $gender_sel_owner = DB::table('gender_names')->where( ['id_gender'=> $key_sell->gender])->get();
                $time_sel_owner = DB::table('time_names')->where( ['id'=> $key_sell->time])->get();
                $type_name_sel = DB::table('type_names')->where( ['id'=> $key_sell->type])->get();
                $sub_type_name_sel = DB::table('sub_type_names')->where( ['type_id'=> $key_sell->type,'sub_type_id'=> $key_sell->sub_type])->get();
                foreach ($type_name_sel as $x){
                    $type_name =$x->name;
                }
                foreach ($sub_type_name_sel as $y){
                    $sub_type_name =$y->sub_type_name;
                }
                foreach ($time_sel_owner as $z)
                {
                    $time_y_name =$z->name;
                }
                foreach ($gender_sel_owner as $w)
                {
                    $gender_y_name =$w->name;
                }
                $seller = DB::table('users')->where( ['id'=> $key_sell->id_user])->get();
                foreach($seller as $x){
                    $name_seller = $x->name;
                    $tel_seller=$x->tel;
                }
                $sell[] = array(
                    "id" => $key_sell->id,
                    "name_product" => $key_sell->name, 
                    "desc" => $key_sell->desc,   
                    "name_seller" =>$name_seller,
                    "tel_seller" => $tel_seller,
                    "type" => $type_name,
                    "gender" => $gender_y_name,
                    "time" => $time_y_name,
                    "sub_type" => $sub_type_name,
                    "volume" => $key_sell->volume,
                    "price" => $key_sell->price,
                    "date" => $key_sell->created_at,
                    "image" => "/bower_components/AdminLTE/dist/img/photo1.png",
                );    
            }
        }
        //print_r($sell);
        //exit();
        rsort($sell);
    }
        $owner = DB::table('users')->where( ['id'=> $id_user_x])->get();
        foreach($owner as $x){
            $name_owner = $x->name;
            $tel_owner=$x->tel;
        }
        $data_own=array(
            'name' => $name_owner,
            'name_product'=>$name_product,
            'tel' =>$tel_owner,
            'type' => $type_name_owner,
            'sub_type' =>$sub_type_name_owner,
            'desc' => $desc_x,
            'gender' =>$gender_x_name,
            'price' =>$price_x,
            'volume'=>$volume_x,
            'time' => $time_x_name,
        );
        
        return view('post_view',['db_sell'=> $sell, 'data_owner' => $data_own]);
     }
    }
}