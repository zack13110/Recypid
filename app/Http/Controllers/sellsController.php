<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sell;

class sellsController extends Controller
{
    public function sells(Request $request)
    
        {   
            $sells = new sell();   
            /*echo '<pre>';
            print_r($sells->'');
            exit();*/
            print_r($request->input['type']);
            exit();
            $sells->id_user = '2';
            $sells->type = $request->input['type'];
            $sells->sub_type = $request->input['sub_type'];
            $sells->gender = $request->input['gender'];
            $sells->time = $request->input['time'];
            $sells->volume = $request->input['volume'];
            $sells->price = $request->input['price'];
            $sells->name = $request->input['name'];
            $sells->desc = $request->input['desc'];
            $sells->save();
        }
}
