<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\Get;

class ApiController extends Controller
{
    public function index()
    {

    }

    public function my_tweet(){
        $call = new Get;
        return view('TweetList', ['tweet' => $call->my_tweet()]);
    }

}
