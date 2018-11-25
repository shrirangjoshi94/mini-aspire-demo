<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;

class TestController extends Controller
{
    public function test()
    {
        
         $user = auth()->user();
         print_r($user);exit;
        
//        $user =  DB::table('users')->get();
        $user = DB::table('users')->where('email',"abcd@gmail.com")->first();
        print_r($user);exit;
    }
}
