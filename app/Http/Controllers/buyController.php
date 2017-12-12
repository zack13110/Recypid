<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\buy;

class buyController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function delete(Request $data)
    {
        $id = $data->input('id_product');
        DB::table('buys')->where('id', '=', $id)->delete();
        return redirect('home');
    }

    public function buy(Request $data)
    {
        
        //--------------------validation---------------//
        $name = $data->input('name_product');
        $sub_type = $data->input('sub_type');
        $price = $data->input('price');
        //sprint_r($data->all());
        //exit();
        if($name == "" || $sub_type == "" || $price == ""||$volume = ""){
        $error = "-------------";
            return redirect()->back()->with('error'. $error);
            exit();
        }
        else{
        //$items = $data->all();
        //$a = buy::create($items);
        //exit();
        $id_user = $data->input('id_user');
        $type = $data->input('type');
        $sub_type = $data->input('sub_type');
        $gender_trade = $data->input('gender_trade');
        $time_duration = $data->input('time');
        if($time_duration == 'เช้า'){
            $morning = 3;
            $noon = 1;
            $afternoon=0;
            $evening =0;
            $night = 0;
        }
        else if ($time_duration == 'กลางวัน') 
        {
            $morning = 1;
            $noon = 3;
            $afternoon=1;
            $evening =0;
            $night = 0;
        }
        else if ($time_duration == 'บ่าย') 
        {
            $morning = 0;
            $noon = 1;
            $afternoon=3;
            $evening =1;
            $night = 0;
        }
        else if ($time_duration == 'เย็น') 
        {
            $morning = 0;
            $noon = 0;
            $afternoon=1;
            $evening =3;
            $night = 1;
        }
        else if ($time_duration == 'กลางคืน') 
        {
            $morning = 0;
            $noon = 0;
            $afternoon=0;
            $evening =1;
            $night = 3;
        }
        $volume = $data->input('volume');
        $price = $data->input('price');
        $image = 'default';
        $img = $data->file('image');
        if(!empty($img)){
        
        $getImgName = $img->getClientOriginalName();
        $imgType = pathinfo($getImgName, PATHINFO_EXTENSION);
        $getCTime = new \DateTime();
        $imgName = $getCTime->format('YmdHis');
        $path = 'images';
        $img->move($path,$imgName.'.'.$imgType);
        $image = $imgName.'.'.$imgType;
            
        }
        $name_product = $data->input('name_product');
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
            'name_product' => $name_product,
            'desc' => $desc,
            'created_at' => new \DateTime(),
            'updated_at' =>  new \DateTime()
        ));

        $id_buying = DB::table('buys')->latest()->first();

        $id_buying = $id_buying->id;
        //print_r($id_buying);
        //exit();
        return redirect()->action(
            'buyController@show', ['id' => $id_buying]
        );
    }
        //--------------------validation---------------//
    }
    public function show($id){
        //echo '<pre>';
        $sell_location= array();
        $data_buy = DB::table('buys')->where( ['id'=> $id])->first();
        $buyer = DB::table('users')->where( ['id'=> $data_buy->id_user])->first();
        $sell = array();
        $location = array();
        $location_end = array();
        
        //print_r($buyer);
        //print_r('---------------Buy Announce---------------'.'<br>');
        //print_r($data_buy);
        //print_r('<br>');
        //exit();

        if($data_buy->gender_trade == 'ทั้งหมด')
        {
            $data_seller = DB::table('sells')
                        ->join('users', 'sells.id_user','=','users.id')
                        ->where(['sells.type'=> $data_buy->type,'sells.sub_type'=> $data_buy->sub_type])
                        ->where('sells.id_user', '<>', $data_buy->id_user)
                        ->whereIn('sells.gender_trade', [$buyer->gender,'ทั้งหมด'])
                        ->select('users.*','sells.*')
                        ->get();
                       // print_r($data_seller);
        }
        else
        {
            $data_seller = DB::table('sells')
                        ->join('users', 'sells.id_user','=','users.id')
                        ->where(['sells.type'=> $data_buy->type,'sells.sub_type'=> $data_buy->sub_type,'users.gender'=> $data_buy->gender_trade])
                        ->where('sells.id_user', '<>', $data_buy->id_user)
                        ->where('sells.gender_trade', '=', $buyer->gender)
                        ->whereIn('sells.gender_trade', [$buyer->gender,'ทั้งหมด'])
                        ->select('users.*','sells.*')
                        ->get();
                        
                        //print_r($data_seller);
                        
        }
        $location[0]= array(
            '0'=> $buyer->latitude,
            '1'=> $buyer->longitude,
            '2'=> $buyer->name
        );
        //print_r('--------------- Result After filter ---------------'.'<br>');
        //print_r($data_seller);
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
             //print_r('--------- Result After Filter --------- '.$result.'</br>');
             if($result < 50){
                $morning_b = $data_buy->morning;
                $noon_b = $data_buy->noon;
                $afternoon_b = $data_buy->afternoon;
                $evening_b = $data_buy->evening;
                $night_b = $data_buy->night;
                $volume_b = $data_buy->volume;
                $price_b = $data_buy->price;
                $rating_b = $buyer->rating;
                $id = $x->id;
                $morning_s = $x->morning;
                $noon_s = $x->noon;
                $afternoon_s = $x->afternoon;
                $evening_s = $x->evening;
                $night_s = $x->night;
                $volume_s = $x->volume;
                $price_s = $x->price;
                $rating_s = $x->rating;
                //print_r($id);
                //print_r('<br>');
                //print_r($morning_b);
                /*calculate */
                if($x->morning == 3){
                    $duration_name = 'เช้า';
                }else if($x->noon == 3){
                    $duration_name = 'กลางวัน';
                }else if($x->afternoon == 3){
                    $duration_name = 'บ่าย';
                }else if($x->evening == 3){
                    $duration_name = 'เย็น';
                }else if($x->night == 3){
                    $duration_name = 'กลางคืน';
                }
                $cal_bdots = ( $morning_b* $morning_s)+($noon_b*$noon_s)+($afternoon_b*$afternoon_s)+($evening_b*$evening_s)+($night_b*$night_s)+($volume_b*$volume_s)+($price_b*$price_s)+($rating_b*$rating_s);
                $cal_bs = sqrt(pow($morning_b,2)+pow($noon_b,2)+pow($afternoon_b,2)+pow($evening_b,2)+pow($night_b,2)+pow($volume_b,2)+pow($price_b,2)+pow($rating_b,2)) * sqrt(pow($morning_s,2)+pow($noon_s,2)+pow($afternoon_s,2)+pow($evening_s,2)+pow($night_s,2)+pow($volume_s,2)+pow($price_s,2)+pow($rating_s,2));
                $cal = $cal_bdots / $cal_bs;
                //exit();
                if($cal > 0.5){
                    
                    //echo '<pre>';
                    
                    //echo '</pre>';
                    $sell[] = array(
                        'id' => $x->id,
                        'id_user' => $x->id_user,
                        'type' => $x->type,
                        'sub_type' => $x->sub_type,
                        'gender_trade' => $x->gender_trade,
                        'volume' => $x->volume,
                        'duration_name'=> $duration_name,
                        'price' => $x->price,
                        'image' => $x->image,
                        'name_product' => $x->name_product,
                        'desc' => $x->desc,
                        'time' => $x->created_at,
                        'updated_at' => $x->updated_at,
                        'tel_seller' => $x->tel,
                        'name_seller' => $x->name,
                        'gender' => $x->gender,
                        'latitude' => $x->latitude,
                        'longitude' => $x->longitude,
                        'avatar'=> $x->avatar,
                        'rating' => $x->rating,
                        'cal'=> $cal
                    );
                    $location[] = array( $x->latitude,$x->longitude,$x->name);
                    $location_end[] = array($x->latitude,$x->longitude);
                    
                }
             }
             
         }
         //print_r('--------------------- Result Form calculate ------------------'.'<br>');
         //print_r($sell);
         //foreach($sell as $key => $val){
            //echo $val['id'];
            //echo ' = '.$val['cal'].'</br>';
         //}
         //exit();
         //print_r($id_sl);
         //exit();
         if(!empty($sell)){
         foreach ($sell as $key => $row) {
            $cal_[$key]  = $row['cal'];
            //print_r($cal_[$key]);
            //exit();
        }
        array_multisort($cal_, SORT_DESC, $sell);
    }
         //print_r('------------------ Result ---------------'.'<br>');
         //print_r($sell);
        // foreach($sell as $aa){
            //echo $aa['id'].'</br>';
        //}
         //exit();
         $data_own = array(
            'id_user'=> $buyer->id,
            'id_product'=>$data_buy->id,
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
            'rating' => $buyer->rating,
            'image' => $data_buy->image
         );
        
    
        return view('post_view',['db_sell'=> $sell, 'data_owner' => $data_own,'location'=>$location,'location_end'=>$location_end]);
     
    }
    public function update(Request $data)
    {
        $id_product= $data->input('id_product');
        $name = $data->input('name_product');
        $sub_type = $data->input('sub_type');
        $price = $data->input('price');

        if($name == "" || $sub_type == "" || $price == "" ||$volume = ""){
            $error = "---------------";
                return redirect()->back()->with('error'. $error);
                
            }
            else
            {
                $id_user = $data->input('id_user');
                $type = $data->input('type');
                $sub_type = $data->input('sub_type');
                $gender_trade = $data->input('gender_trade');
                $time_duration = $data->input('time');
                if($time_duration == 'เช้า'){
                    $morning = 3;
                    $noon = 1;
                    $afternoon=0;
                    $evening =0;
                    $night = 0;
                }
                else if ($time_duration == 'กลางวัน') 
                {
                    $morning = 1;
                    $noon = 3;
                    $afternoon=1;
                    $evening =0;
                    $night = 0;
                }
                else if ($time_duration == 'บ่าย') 
                {
                    $morning = 0;
                    $noon = 1;
                    $afternoon=3;
                    $evening =1;
                    $night = 0;
                }
                else if ($time_duration == 'เย็น') 
                {
                    $morning = 0;
                    $noon = 0;
                    $afternoon=1;
                    $evening =3;
                    $night = 1;
                }
                else if ($time_duration == 'กลางคืน') 
                {
                    $morning = 0;
                    $noon = 0;
                    $afternoon=0;
                    $evening =1;
                    $night = 3;
                }
                $volume = $data->input('volume');
                $price = $data->input('price');
                $image = 'default';
                $img = $data->file('image');
                if(!empty($img)){
                
                $getImgName = $img->getClientOriginalName();
                $imgType = pathinfo($getImgName, PATHINFO_EXTENSION);
                $getCTime = new \DateTime();
                $imgName = $getCTime->format('YmdHis');
                $path = 'images';
                $img->move($path,$imgName.'.'.$imgType);
                $image = $imgName.'.'.$imgType;
                    
                }
                $name_product = $data->input('name_product');
                $desc = $data->input('desc');
                $additem = DB::table('buys')
                ->where(['id'=>$id_product])
                ->update(array(
                    'type' => $type,
                    'sub_type'=> $sub_type,
                    'gender_trade'      => $gender_trade,
                    'morning'=> $morning,
                    'noon' => $noon,
                    'afternoon' => $afternoon,
                    'evening' =>  $evening,
                    'night' => $night,
                    'volume' => $volume,
                    'price' => $price,
                    'image' => $image,
                    'name_product' => $name_product,
                    'desc' => $desc,
                    'updated_at' =>  new \DateTime()
                ));

                //exit();
                return redirect()->action(
                    'buyController@show', ['id' => $id_product]
                );
    }
    }
}