<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use App\buy;
use Illuminate\Support\Facades\Validator;


class buyController extends Controller
{
    public function buy(Request $data)
    {
            buy::create(Request::all());
            return 'ok';
    }


}
