<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\sell;

class sellController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sell(Request $data)
    
        {
        //print_r($data->all());
        //exit();
        //--------------------validation---------------//            
        $name = $data->input('name_product');
        $sub_type = $data->input('sub_type');
        $price = $data->input('price');
        //print_r($name);
        //exit();
        if($name == "" || $sub_type == "" || $price == "" ||$volume = ""){
            $error = "--------------------------";
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
                $additem = DB::table('sells')
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
                
                $id_selling = DB::table('sells')->latest()->first();
        
                $id_selling = $id_selling->id;
                //print_r($id_selling);
                //exit();
                return redirect()->action(
                    'sellController@show', ['id' => $id_selling]
                );
            }
                //--------------------validation---------------//
            }
            public function show($id){
                //echo '<pre>';
                $buy_location= array();
                $data_sell = DB::table('sells')->where( ['id'=> $id])->first();
                $seller = DB::table('users')->where( ['id'=> $data_sell->id_user])->first();
                $buy = array();
                $location = array();
                $location_end = array();
                //print_r($buyer);
                //print_r($data_buy);
                //exit();
        
                if($data_sell->gender_trade == 'ทั้งหมด')
                {
                    $data_buyer = DB::table('buys')
                                ->join('users', 'buys.id_user','=','users.id')
                                ->where(['buys.type'=> $data_sell->type,'buys.sub_type'=> $data_sell->sub_type])
                                ->where('buys.id_user', '<>', $data_sell->id_user)
                                ->whereIn('buys.gender_trade', [$seller->gender,'ทั้งหมด'])
                                ->select('users.*','buys.*')
                                ->get();
                               // print_r($data_seller);
                }
                else
                {
                    $data_buyer = DB::table('buys')
                                ->join('users', 'buys.id_user','=','users.id')
                                ->where(['buys.type'=> $data_sell->type,'buys.sub_type'=> $data_sell->sub_type,'users.gender'=> $data_sell->gender_trade])
                                ->where('buys.id_user', '<>', $data_sell->id_user)
                                ->where('buys.gender_trade', '=', $seller->gender)
                                ->whereIn('buys.gender_trade', [$seller->gender,'ทั้งหมด'])
                                ->select('users.*','buys.*')
                                ->get();
                                //print_r($data_seller);
                                
                }
                //print_r($data_seller);
                //exit();
                $location[0]= array(
                    '0'=> $seller->latitude,
                    '1'=> $seller->longitude,
                    '2'=> $seller->name
                );
                 foreach ($data_buyer as $x){
                     //calculate distance around area
                     $lati_own =  $seller->latitude;
                     $long_own =  $seller->longitude;
                     $lati_des = $x->latitude;
                     $long_des = $x->longitude;
                     $theta = $long_own - $long_des;
                     $dist = sin(deg2rad($lati_own)) * sin(deg2rad($lati_des)) +  cos(deg2rad($lati_own)) * cos(deg2rad($lati_des)) * cos(deg2rad($theta));
                     $dist = acos($dist);
                     $dist = rad2deg($dist);
                     $miles = $dist * 60 * 1.1515;
                     $result = $miles * 1.609344;
                     //print_r($result.'</br>');
                     if($result < 50){
                        $morning_b = $data_sell->morning;
                        $noon_b = $data_sell->noon;
                        $afternoon_b = $data_sell->afternoon;
                        $evening_b = $data_sell->evening;
                        $night_b = $data_sell->night;
                        $volume_b = $data_sell->volume;
                        $price_b = $data_sell->price;
                        $rating_b = $seller->rating;
                        
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
                        //print_r('---'.$cal.'<br>');
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
                        if($cal > 0.5){
                            $buy[] = array(
                                'id' => $x->id,
                                'id_user' => $x->id_user,
                                'type' => $x->type,
                                'sub_type' => $x->sub_type,
                                'gender_trade' => $x->gender_trade,
                                'volume' => $x->volume,
                                'price' => $x->price,
                                'duration_name' => $duration_name,
                                'image' => $x->image,
                                'name_product' => $x->name_product,
                                'desc' => $x->desc,
                                'time' => $x->created_at,
                                'updated_at' => $x->updated_at,
                                'tel_buyer' => $x->tel,
                                'name_buyer' => $x->name,
                                'gender' => $x->gender,
                                'latitude' => $x->latitude,
                                'longitude' => $x->longitude,
                                'avatar'=> $x->avatar,
                                'rating' => $x->rating,
                                'cal'=> $cal
                            );
                            $location[] = array( $x->latitude,$x->longitude,$x->name);
                            $location_end[] = array($x->latitude,$x->longitude);
                            //print_r($buy_location);
                            //exit();
                        }
                     }
                     
                 }
                 //foreach($buy as $key => $val){
                    //echo $val['id'];
                    //echo ' = '.$val['cal'].'</br>';
                 //}
                if(!empty($buy)){
                foreach ($buy as $key => $row) {
                    $cal_[$key]  = $row['cal'];
                    //print_r($cal_[$key]);
                    //exit();
                }
                array_multisort($cal_, SORT_DESC, $buy);
                }
                //print_r('------------------ Result ---------------'.'<br>');
                //print_r($sell);
                //foreach($buy as $aa){
                   //echo $aa['id'].'</br>';
                //}
                 //print_r($sell);
                 //exit();
                 $data_own = array(
                    'id_user'=> $seller->id,
                    'id_product'=>$data_sell->id,
                    'name' => $seller->name,
                    'name_product'=>$data_sell->name_product,
                    'tel' =>$seller->tel,
                    'type' => $data_sell->type,
                    'sub_type' =>$data_sell->sub_type,
                    'desc' => $data_sell->desc,
                    'gender' =>$seller->gender,
                    'price' =>$data_sell->price,
                    'volume'=>$data_sell->volume,
                    'time' => $data_sell->created_at,
                    'latitude' => $seller->latitude,
                    'longitude' => $seller->longitude,
                    'avatar'=> $seller->avatar,
                    'rating' => $seller->rating,
                    'image' => $data_sell->image,
                 );
            return view('post_view',['db_buy'=> $buy, 'data_owner' => $data_own,'location'=>$location,'location_end'=>$location_end]);
        }
    }
