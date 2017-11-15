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
        $gender_trade = $data->input('gender_trade');
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
            'gender_trade'      => $gender_trade,
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

        $id_buying = DB::table('buys')->latest()->first();

        $id_buying = $id_buying->id;
        return redirect()->action(
            'buyController@show', ['id' => $id_buying]
        );
    }
        //--------------------validation---------------//
    }
    public function show($id){
        echo '<pre>';
        $data_buy = DB::table('buys')->where( ['id'=> $id])->first();
        $buyer = DB::table('users')->where( ['id'=> $data_buy->id_user])->first();
        print_r($buyer);
        print_r($data_buy);
        //exit();
        if($data_buy->gender_trade == 'ทั้งหมด')
        {
            $data_seller = DB::table('sells')
                        ->join('users', 'sells.id_user','=','users.id')
                        ->where(['sells.type'=> $data_buy->type,'sells.sub_type'=> $data_buy->sub_type])
                        ->select('sells.*','users.*')
                        ->get();
                        //print_r($data_seller);
        }
        else
        {
            $data_seller = DB::table('sells')
                        ->join('users', 'sells.id_user','=','users.id')
                        ->where(['sells.type'=> $data_buy->type,'sells.sub_type'=> $data_buy->sub_type,'users.gender'=> $data_buy->gender_trade])
                        ->select('sells.*','users.*')
                        ->get();
                        //print_r($data_seller);
                        
        }
        print_r($data_seller);
        //exit();
         foreach ($data_seller as $x){
             //calculate distance around area
             $lati_own =  $buyer->latitude;
             $long_own =  $buyer->longitude;
             $lati_des = $x->latitude;
             $long_des = $x->longitude;
             $theta = $long_own - $long_des;
             $dist = sin(deg2rad($lati_own)) * sin(deg2rad($lati_des)) +  cos(deg2rad($lati_own)) * cos(deg2rad($lati_des)) * cos(deg2rad($theta));
             $dist = acos($dist);
             $dist = rad2deg($dist);
             $miles = $dist * 60 * 1.1515;
             $result = $miles * 1.609344;
             print_r($result.'</br>');
             if($result < 50){
                $morning_b = $data_buy->morning;
                $noon_b = $data_buy->noon;
                $afternoon_b = $data_buy->afternoon;
                $evening_b = $data_buy->evening;
                $night_b = $data_buy->night;
                $volume_b = $data_buy->volume;
                $price_b = $data_buy->price;
                $rating_b = $buyer->rating;
                
                $morning_s = $x->morning;
                $noon_s = $x->noon;
                $afternoon_s = $x->afternoon;
                $evening_s = $x->evening;
                $night_s = $x->night;
                $volume_s = $x->volume;
                $price_s = $x->price;
                $rating_s = $x->rating;

                //print_r($morning_b);
                /*calculate */
                $cal_bdots = ( $morning_b* $morning_s)+($noon_b*$noon_s)+($afternoon_b*$afternoon_s)+($evening_b*$evening_s)+($night_b*$night_s)+($volume_b*$volume_s)+($price_b*$price_s)+($rating_b*$rating_s);
                $cal_bs = sqrt(pow($morning_b,2)+pow($noon_b,2)+pow($afternoon_b,2)+pow($evening_b,2)+pow($night_b,2)+pow($volume_b,2)+pow($price_b,2)+pow($rating_b,2)) * sqrt(pow($morning_s,2)+pow($noon_s,2)+pow($afternoon_s,2)+pow($evening_s,2)+pow($night_s,2)+pow($volume_s,2)+pow($price_s,2)+pow($rating_s,2));
                $cal = $cal_bdots / $cal_bs;
    
                print_r($cal);
                if($cal > 0){
                    $sell[] = array(
                        'id' => $x->id,
                        'id_user' => $x->id_user,
                        'type' => $x->type,
                        'sub_type' => $x->sub_type,
                        'gender_trade' => $x->gender_trade,
                        'volume' => $x->volume,
                        'price' => $x->price,
                        'image' => $x->image,
                        'name_product' => $x->name_product,
                        'desc' => $x->desc,
                        'date' => $x->created_at,
                        'updated_at' => $x->updated_at,
                        'tel_buyer' => $x->tel,
                        'name_buyer' => $x->name,
                        'gender' => $x->gender,
                        'latitude' => $x->latitude,
                        'longitude' => $x->longitude,
                        'avatar'=> $x->avatar,
                        'rating' => $x->rating
                    );
                    print_r($sell);
                }
             }
             
         }
         $data_own = array(
            'name' => $buyer->name,
            'name_product'=>$data_buy->name_product,
            'tel' =>$buyer->tel,
            'type' => $data_buy->type,
            'sub_type' =>$data_buy->sub_type,
            'desc' => $data_buy->desc,
            'gender' =>$buyer->gender,
            'price' =>$data_buy->price,
            'volume'=>$data_buy->volume,
            'time' => $data_buy->created_at,
            'latitude' => $buyer->latitude,
            'longitude' => $buyer->longitude,
            'avatar'=> $buyer->avatar,
            'rating' => $buyer->rating
         );
        
        //exit();
    
        return view('post_view',['db_sell'=> $sell, 'data_owner' => $data_own]);
     
    }
}