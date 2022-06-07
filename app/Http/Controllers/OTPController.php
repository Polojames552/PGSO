<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use DB;
class OTPController extends Controller
{
      public function index(){
         return view ('auth.passwords.register');
      }
     public function check(Request $request){
        if($request->get('email')){
            $email = $request->get('email');
            $data = DB::table('users')
            ->where('email', $email)
            ->count();

            if($data == 0 ){
                echo 'unique';
            }else{
                echo 'Not_unique';
            }
        }
    }
    
}
