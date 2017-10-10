<?php

namespace App\Http\Controllers;

use Request;
use Auth;
<<<<<<< HEAD
use App\sell;
use Validator;
use App\Http\Controllers\Controller;

=======
use DB;
>>>>>>> acdcfe085a7648309cfd23b53976b54786efebb1

class sellController extends Controller
{
    public function sell(Request $data)
<<<<<<< HEAD
    {
            sell::create(Request::all());
            return 'oK';
=======
    
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

            $data_buyer_matching = DB::table('buys')->where( ['type'=> $type])->get();
            foreach ($data_buyer_matching as $key_){
                $type_y = $key_->type;
                $sub_type_y = $key_->sub_type;
                $gender_y = $key_->gender;
                $time_y = $key_->time;

                /*calculate */
            }
        }
        exit();
        return view('post_view');
>>>>>>> acdcfe085a7648309cfd23b53976b54786efebb1
    }
}
