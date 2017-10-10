<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use DB;
use App\sell;

class sellController extends Controller
{
    public function sell(Request $data)
    
        {   
            $a = sell::create(Request::all());
            $id_selling = $a->id;
            return redirect()->action(
                'sellController@show', ['id' => $id_selling]
            );
        }
    public function show($id){

        $data_seller = DB::table('sells')->where( ['id'=> $id])->get();
       
        echo '<pre>';
        print_r($data_seller);
        foreach ($data_seller as $key){
            
            //$id_user =  $key->id_user;
            $type_x = $key->type;
            $sub_type_x = $key->sub_type;
            $gender_x = $key->gender;
            $time_x = $key->time;

            $data_buyer_matching = DB::table('buys')->where( ['type'=> $type_x])->get();
            foreach ($data_buyer_matching as $key_){
                $type_y = $key_->type;
                $sub_type_y = $key_->sub_type;
                $gender_y = $key_->gender;
                $time_y = $key_->time;
                echo '<pre>';
                print_r($data_buyer_matching);
                /*calculate */
                $cal_xdoty = ($sub_type_x*$sub_type_y)+($gender_x*$gender_y)+($time_x*$time_y);
                $cal_xy = sqrt(pow($sub_type_x,2)+pow($gender_x,2)+pow($time_x,2)) * sqrt(pow($sub_type_y,2)+pow($gender_y,2)+pow($time_y,2));
                $cal = $cal_xdoty / $cal_xy;
                
                echo($cal_xdoty); 
                echo '<br>';
                echo($cal_xy);
                echo '<br>';
                echo($cal);

            }
        }
        exit();
        return view('post_view');
    }
}
