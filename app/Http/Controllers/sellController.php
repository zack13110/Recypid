<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\sell;
class sellController extends Controller
{
    public function sell(Request $data)
    
        {   
        //--------------------validation---------------//            
        $name = $data->input('name');
        $sub_type = $data->input('sub_type');
        $price = $data->input('price');
        $volume = $data->input('volume');
        if($name == "" || $sub_type == "" || $price == "" ||$volume = ""){
            $error = "--------------------------";
                return redirect()->back()->with('error'. $error);
            }
            else
            $items = $data->all();
            $a = sell::create($items);
            $id_selling = $a->id;
            return redirect()->action(
                'sellController@show', ['id' => $id_selling]
            );
        //--------------------validation---------------//            
        }
        public function show($id){
            $data_seller = DB::table('sells')->where( ['id'=> $id])->get();
           
            // echo '<pre>';
            // print_r($data_seller);
            foreach ($data_seller as $key)
            {
                
                $id_user_x =  $key->id_user;
                $name_product = $key->name;
                $type_x = $key->type;
                $desc_x = $key->desc;
                $sub_type_x = $key->sub_type;
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
                $gender_x = $key->gender;
                $price_x = $key->price;
                $volume_x= $key->volume;
                $time_x = $key->time;
                $data_buyer_matching = DB::table('buys')->where( ['type'=> $type_x])->where('id_user','!=',$id_user_x)->get();/*หา id ที่มี type คล้าย*/
                //print_r($data_buyer_matching );
                //exit();
                $matching =array();
                if(count($data_buyer_matching) != 0){
                foreach ($data_buyer_matching as $key_){
                    $type_y = $key_->type;
                    $sub_type_y = $key_->sub_type;
                    $gender_y = $key_->gender;
                    $time_y = $key_->time;
                    // echo '<pre>';
                    // print_r($data_buyer_matching);
                    /*calculate */
                    $cal_xdoty = ($sub_type_x*$sub_type_y)+($gender_x*$gender_y)+($time_x*$time_y);
                    $cal_xy = sqrt(pow($sub_type_x,2)+pow($gender_x,2)+pow($time_x,2)) * sqrt(pow($sub_type_y,2)+pow($gender_y,2)+pow($time_y,2));
                    $cal = $cal_xdoty / $cal_xy;
                    
                    if($cal > 0.85){
                        $matching[] = $key_->id;
                        print_r($key_->id);
                    }
                    // echo($cal_xdoty); 
                    // echo '<br>';
                    // echo($cal_xy);
                    // echo '<br>';
                    // echo($cal);
                }
             }
            }
            $buy = array();
            if(count($data_buyer_matching) != 0){
            foreach ($matching as $key){
                $id_buy=$key;
                $buy_selection = DB::table('buys')->where( ['id'=> $id_buy])->get();
               //print($buy_selection);
                //exit();
                foreach($buy_selection as $key_buy){
                    $type_name_sel = DB::table('type_names')->where( ['id'=> $key_buy->type])->get();
                    $sub_type_name_sel = DB::table('sub_type_names')->where( ['type_id'=> $key_buy->type,'sub_type_id'=> $key_buy->sub_type])->get();
                    foreach ($type_name_sel as $x){
                        $type_name =$x->name;
                    }
                    foreach ($sub_type_name_sel as $y){
                        $sub_type_name =$y->sub_type_name;
                    }
                    $buyer = DB::table('users')->where( ['id'=> $key_buy->id_user])->get();
                    foreach($buyer as $x){
                        $name_buyer = $x->name;
                        $tel_buyer=$x->tel;
                    }
                    $buy[] = array(
                        "id" => $key_buy->id,
                        "name_product" => $key_buy->name,  
                        "name_buyer" =>$name_buyer,
                        "tel_buyer" => $tel_buyer,
                        "type" => $type_name,
                        "sub_type" => $sub_type_name,
                        "volume" => $key_buy->volume,
                        "price" => $key_buy->price,
                        "date" => $key_buy->created_at,
                        "image" => "/bower_components/AdminLTE/dist/img/photo1.png",
                    );    
                }
            }
            //print_r($buy);
            //exit();
            rsort($buy);
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
                'gender' =>$gender_x,
                'price' =>$price_x,
                'volume'=>$volume_x,
                'time' => $time_x,
            );
            
            return view('post_view',['db_buy'=> $buy, 'data_owner' => $data_own]);
        }
    }