<?php

namespace App\Http\Controllers;

use Request;
use App\buy;

class buyController extends Controller
{
    public function buy(Request $data)
    
        { 
            buy::create(Request::all());
            return 'oK';
        }
}
