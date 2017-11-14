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
        $gender = $data->input('gender_trade');
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
            'gender_trade'      => $gender,
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
        if($data_buy->gender_trade == 'ทั้งหมด')
        {
            $data_seller = DB::table('sells')
                        ->join('users', 'sells.id_user','=','users.id')
                        ->where(['sells.type'=> $data_buy->type,['sells.sub_type'=> $data_buy->sub_type]])
                        ->select('sells.*','users.*')
                        ->get();
        }
        else
        {
            $data_seller = DB::table('sells')
                        ->join('users', 'sells.id_user','=','users.id')
                        ->where(['users.gender'=> $data_buy->gender_trade])
                        ->select('sells.*','users.*')
                        ->get();
        }
        print_r($data_seller);
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
             //print_r($result.'\n');
             if($result < 50){
                $data_buy->morning;
                $data_buy->noon;
                $data_buy->afternoon;
                $data_buy->evening;
                $data_buy->volume;
                $data_buy->price;
                $buyer->rating;
                // $db_sell = array(
                //     'id' => $x->id,
                //     'id_user' => 4,
                //     'type' => เศษลวด,
                //     'sub_type' => ลวด,
                //     'gender_trade' => ชาย,
                //     'morning' => 0,
                //     'noon' => 10,
                //     'afternoon' => 0,
                //     'evening' => 0,
                //     'night' => 0,
                //     'volume' => ,
                //     'price' => 1,
                //     'image' => fdsfsda,
                //     'name' => user4,
                //     'desc' => gfdsgfdsgf,
                //);
             }
             
         }
        
        exit();
    
        return view('post_view',['db_sell'=> $sell, 'data_owner' => $data_own]);
     
    }
}