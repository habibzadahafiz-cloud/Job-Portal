<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class textcontroller extends Controller
{
    //
    public function text(){
        $arr = ['moslim','najeeb','khan','mansoor','moqeem'];
        return view("test", compact("arr"));
    }
}
