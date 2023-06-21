<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\back_end\user_model;
use Illuminate\Support\Facades\Hash;

class admin_controller extends Controller
{
    public function admin(){
         return view('back_end.admin');
    }

//     // check login system session
//     public function login(){
//     if(session('user_id')) {
//         return redirect('user');
//     } else {
//         return view('back_end.admin');
//     }

// }
       // admin auth
    public function admin_auth(Request $request){
           
        $email = $request->post('email');
        $password = $request->post('password');
        $login = user_model::where(['email' => $email])->first();

        if($login){
           if($login->status == 1){
             
            if(Hash::check($password, $login->password)){

                $request->session()->put('admin_login',true);
                $request->session()->put('user_id',$login->user_id);
                $request->session()->put('user_image',$login->user_image);
                $request->session()->put('user_name',$login->f_name);
               
                return redirect('user');
            }
            return redirect('admin')->with('msg', 'enter correct password');
           }
           return redirect('admin')->with('msg', 'this user are block');
        }
       return redirect('admin')->with('msg', 'please enter correct email');
       }
          
}
