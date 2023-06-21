<?php

namespace App\Http\Controllers\front_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\back_end\employes_model;
use Illuminate\Support\Facades\Hash;

class employe_login__controller extends Controller
{
    
   
    //
    public function employe_login(Request $request){
           
        $email = $request->post('email');
        $password = $request->post('password');
        $login = employes_model::where(['email' => $email])->first();

        if($login){
           if($login->status == 1){
             
            if(Hash::check($password, $login->password)){

                $request->session()->put('employe_login',true);
                $request->session()->put('employe_id',$login->employe_id);
                $request->session()->put('employe_name',$login->f_name);
                $request->session()->put('employe_image',$login->employe_image);
               
                return redirect('project_file');
            }
            return redirect('/')->with('msg', 'enter correct password');
           }
           return redirect('/')->with('msg', 'this user are block');
        }
       return redirect('/')->with('msg', 'please enter correct email');
       }
          
}
