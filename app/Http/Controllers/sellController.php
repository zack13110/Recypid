<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use App\sell;
use Validator;
use App\Http\Controllers\Controller;


class sellController extends Controller
{
    public function sell(Request $data)
    {
            sell::create(Request::all());
            return 'oK';
    }
  
}
