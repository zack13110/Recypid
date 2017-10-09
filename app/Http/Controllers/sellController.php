<?php

namespace App\Http\Controllers;

use Request;
use App\sell;
use Auth;

class sellController extends Controller
{
    public function sell(Request $data)
    
        {   
            sell::create(Request::all());
            return 'oK';
        }
}
