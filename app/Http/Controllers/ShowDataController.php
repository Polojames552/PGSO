<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ShowDataController extends Controller
{
      function AIP_show(){
        $user = DB::table('users')->get();
        return view('pages.AIP',['user'=>$user]);
    }
    function Assets_show(){
      $user = DB::table('users')->get();
      return view('pages.Assets',['user'=>$user]);
  }
    
}
