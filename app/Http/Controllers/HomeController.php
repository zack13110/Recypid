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
        /*----------------------  buy ---------------------------*/
        $db_buy = DB::table('buys')->where('id_user', $id_user)->get();
        $buyer = DB::table('users')->where( ['id'=> $id_user])->first();
        $buy =array();
        foreach ($db_buy as $b)
        {
            $type_x = $b->type;
            $sub_type_x = $b->sub_type;
            $gender_x = Auth::user()->gender;
            if($b->gender_trade == 'ทั้งหมด')
            {
                $data_seller = DB::table('sells')
                ->join('users', 'sells.id_user','=','users.id')
                ->where(['sells.type'=> $b->type,'sells.sub_type'=> $b->sub_type])
                ->where('sells.id_user', '<>', $b->id_user)
                ->whereIn('sells.gender_trade', [$buyer->gender,'ทั้งหมด'])
                ->select('users.*','sells.*')
                ->get();
                           // print_r($data_seller);
            }
            else
            {
                $data_seller = DB::table('sells')
                ->join('users', 'sells.id_user','=','users.id')
                ->where(['sells.type'=> $b->type,'sells.sub_type'=> $b->sub_type,'users.gender'=> $b->gender_trade])
                ->where('sells.id_user', '<>', $b->id_user)
                ->where('sells.gender_trade', '=', $buyer->gender)
                ->whereIn('sells.gender_trade', [$buyer->gender,'ทั้งหมด'])
                ->select('users.*','sells.*')
                ->get();
                            //print_r($data_seller);
                
            }
            
            $matching =array();
            if(count($data_seller->all()) != 0)
            {
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
                 //print_r($result.'</br>');
                   if($result < 50){
                    $morning_b = $b->morning;
                    $noon_b = $b->noon;
                    $afternoon_b = $b->afternoon;
                    $evening_b = $b->evening;
                    $night_b = $b->night;
                    $volume_b = $b->volume;
                    $price_b = $b->price;
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
                    //print_r('---'.$cal.'<br>');
                    //exit();
                    if($cal > 0.5){
                        
                        //echo '<pre>';
                        
                        //echo '</pre>';
                        $matching[] = array(
                            'id' => $x->id,
                            );
                        
                    }
                }
                $countmatching_= count($matching);
            }
        }
        else{
           $countmatching_= 0;
       }
       if($countmatching_==0)
       {
           $countmatching_ = '';
       }
       
       $buy[] = array(
        "id" => $b->id,
        "name" => $b->name_product,  
        "type" => $b->type,
        "sub_type" => $b->sub_type,
        "volume" => $b->volume,
        "price" => $b->price,
        "countmatching" => $countmatching_,
        "date" => $b->created_at,
        );    
   }
        // /*----------------------  buy end---------------------------*/
        // /*----------------------  sell ---------------------------*/
        // $db_sell = DB::table('sells')->where('id_user', $id_user)->get();
   $sell =array();
   $db_sell = DB::table('sells')->where('id_user', $id_user)->get();
   $seller = DB::table('users')->where( ['id'=> $id_user])->first();
   foreach ($db_sell as $b)
   {
       $type_x = $b->type;
       $sub_type_x = $b->sub_type;
       $gender_x = Auth::user()->gender;
       if($b->gender_trade == 'ทั้งหมด')
       {
           $data_buyer = DB::table('buys')
           ->join('users', 'buys.id_user','=','users.id')
           ->where(['buys.type'=> $b->type,'buys.sub_type'=> $b->sub_type])
           ->where('buys.id_user', '<>', $b->id_user)
           ->whereIn('buys.gender_trade', [$seller->gender,'ทั้งหมด'])
           ->select('users.*','buys.*')
           ->get();
                      // print_r($data_seller);
       }
       else
       {
           $data_buyer = DB::table('buys')
           ->join('users', 'buys.id_user','=','users.id')
           ->where(['buys.type'=> $b->type,'buys.sub_type'=> $b->sub_type,'users.gender'=> $b->gender_trade])
           ->where('buys.id_user', '<>', $b->id_user)
           ->where('buys.gender_trade', '=', $seller->gender)
           ->whereIn('buys.gender_trade', [$seller->gender,'ทั้งหมด'])
           ->select('users.*','buys.*')
           ->get();
                       //print_r($data_seller);
           
       }
       
       $matching =array();
       if(count($data_buyer->all()) != 0)
       {
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
               $morning_b = $b->morning;
               $noon_b = $b->noon;
               $afternoon_b = $b->afternoon;
               $evening_b = $b->evening;
               $night_b = $b->night;
               $volume_b = $b->volume;
               $price_b = $b->price;
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
               //print_r('---'.$cal.'<br>');
               //exit();
               if($cal > 0.5){
                   
                   //echo '<pre>';
                   
                   //echo '</pre>';
                   $matching[] = array(
                       'id' => $x->id,
                       );
                   
               }
           }
           $countmatching_= count($matching);
       }
   }
   else{
      $countmatching_= 0;
  }
  if($countmatching_==0)
  {
      $countmatching_ = '';
  }

  $sell[] = array(
   "id" => $b->id,
   "name" => $b->name_product,  
   "type" => $b->type,
   "sub_type" => $b->sub_type,
   "volume" => $b->volume,
   "price" => $b->price,
   "countmatching" => $countmatching_,
   "date" => $b->created_at,
   );    
}

        // foreach ($db_sell as $b){
        //     $sub_type_x = $b->type;
        //     $gender_x = $b->gender;
        //     $time_x = $b->time;
        //     $type_name_sel = DB::table('type_names')->where( ['id'=> $b->type])->get();
        //     $sub_type_name_sel = DB::table('sub_type_names')->where( ['type_id'=> $b->type,'sub_type_id'=> $b->sub_type])->get();
        //     foreach ($type_name_sel as $x){
        //         $type_name =$x->name;
        //     }
        //     foreach ($sub_type_name_sel as $y){
        //         $sub_type_name =$y->sub_type_name;
        //     }
        //     /*---นับจำนวนของผู้ซื้อที่ตรงกับ คนขาย--*/
        //     $ber_matching = DB::table('buys')->where( ['type'=> $b->type])->where('id_user','!=',$id_user)->get();/*หา id ที่มี type คล้าย*/
        //     $matching =array();
        //     if(count($ber_matching) != 0)
        //     {
        //         foreach ($ber_matching as $key_){
        //             $type_y = $key_->type;
        //             $sub_type_y = $key_->sub_type;
        //             $gender_y = $key_->gender;
        //             $time_y = $key_->time;
        //             /*calculate */
        //             $cal_xdoty = ($sub_type_x*$sub_type_y)+($gender_x*$gender_y)+($time_x*$time_y);
        //             $cal_xy = sqrt(pow($sub_type_x,2)+pow($gender_x,2)+pow($time_x,2)) * sqrt(pow($sub_type_y,2)+pow($gender_y,2)+pow($time_y,2));
        //             $cal = $cal_xdoty / $cal_xy;

        //             if($cal > 0.75){
        //                 $matching[] = $key_->id;
        //             }
        //         }
        //         $countmatching_= count($matching);
        //     }
        //     else{
        //         $countmatching_= 0;
        //     }
        //     $sell[] = array(
        //         "id" => $b->id,
        //         "name" => $b->name,  
        //         "type" => $type_name,
        //         "sub_type" => $sub_type_name,
        //         "volume" => $b->volume,
        //         "price" => $b->price,
        //         "date" => $b->created_at,
        //         "countmatching" => $countmatching_,
        //         "image" => "/bower_components/AdminLTE/dist/img/photo1.png",
        //     );    
        // }

        // /*----------------------  sell end ---------------------------*/
krsort($buy);
krsort($sell);
// $notify_data = DB::table('notify')
//                 ->where('id_user_A', $id_user)
//                 ->orwhere('id_user_B', $id_user)
//                 ->get();
// if(!empty($notify_data)){
// foreach($notify_data as $a){
//     $id_notify = $a->id;
//     if($a->id_user_A == $id_user){
//         $id_owner = $a->id_user_A;
//         $id_trader = $a->id_user_B;
//         $db_owner = DB::table('users')->where( ['id'=> $id_owner])->first();
//         $db_trader = DB::table('users')->where( ['id'=> $id_trader])->first();
//         $name_owner  =$db_owner->name;
//         $name_trader  =$db_trader->name;
//     }
//     else if ($a->id_user_B == $id_user){
//         $id_owner = $a->id_user_B;
//         $id_trader = $a->id_user_A;
//         $db_owner = DB::table('users')->where( ['id'=> $id_owner])->first();
//         $db_trader = DB::table('users')->where( ['id'=> $id_trader])->first();
//         $name_owner  =$db_owner->name;
//         $name_trader  =$db_trader->name;
//     }
//     $notify[] = array(
//         'id_notify'=> $id_notify,
//         'name_owner' => $name_owner,
//         'name_trader' => $name_trader,
//     );
// }
// }
return view('home',['db_sell'=> $sell, 'db_buy' => $buy, 'id_user' => $id_user]);
}

public function test2(Request $request)
{
    $request->validate([
        'name' => 'required|unique:posts|max:255',
        'type' => 'required',
        ]);
    
        // The blog post is valid, store in database...
}
public function test()
{
    return view('test');
}

}