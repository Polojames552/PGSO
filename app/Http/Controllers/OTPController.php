<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use DB;
class OTPController extends Controller
{
     public function index(){
        return view ('register');
     }
     public function OTPValidate(Request $request){
        if($request->input('email')){
            $email = $request->input('email');
            $data = DB::table('users')
            ->where('email', $email)
            ->count();

            if($data > 0 ){
                echo 'not_unique';
            }else{
                echo 'unique';
            }
        }
    }
    
}
