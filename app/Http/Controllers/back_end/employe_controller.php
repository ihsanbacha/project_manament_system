<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\back_end\employes_model;

class employe_controller extends Controller
{
   // employe table
   public function  employe_table()
   {
       $data = employes_model::all();
       return view('back_end.employes', compact('data'));
   }
//    //manage employe
   public function manage_employe($employe_id = '')
   {
       if ($employe_id> 0) {
           $arr = employes_model::where(['employe_id' => $employe_id])->get();
           $row['employe_id'] = $arr['0']->employe_id;
           $row['f_name'] = $arr['0']->f_name;
           $row['l_name'] = $arr['0']->l_name;
           $row['email'] = $arr['0']->email;
           $row['password'] = $arr['0']->password;
           $row['employe_image'] = $arr['0']->employe_image;
       } else {
           $row['employe_id'] = '';
           $row['f_name'] = '';
           $row['l_name'] = '';
           $row['email'] = '';
           $row['password'] = '';
           $row['employe_image'] = '';
       }
       return view('back_end.manage_employe', $row);
   }

   // save employe
   public function save_employe(Request $request)
   {

       $id = $request->post('employe_id');
       $password = $request->post('password');
       $old_password = $request->post('old_password');

       if ($id > 0) {
           $row = employes_model::find($id);
           $msg = 'data updated succesfuly';
       } else {
           $request->validate([
               'f_name' => 'required|unique:employes',
               'l_name' => 'required|unique:employes'
           ]);
           $row = new employes_model;
           $msg = 'data inserted succesfuly';
       }
       // image code
       if ($request->hasFile('employe_image')) {
           // delete old image
           $old_image = 'back_end/media/employes/' . $row->employe_image;
           if (File::exists($old_image)) {
               File::delete($old_image);
           }
           // save and move image to folder
           $file = $request->file('employe_image');
           $ext = $file->getClientOriginalExtension();
           $image_new_name = time() . '.' . $ext;
           $file->move('back_end/media/employes', $image_new_name);
           $row->employe_image = $image_new_name;
       }
       // password 
       if (empty($password)) {
           $row->password = $old_password;
       } else {
           $row->password = Hash::make($password);
       }
       $row->f_name = $request->post('f_name');
       $row->l_name = $request->post('l_name');
       $row->email = $request->post('email');

       $row->save();

       return redirect('employes')->with('msg', $msg);
   }
   // delete employe
   public function delete_employe($employe_id)
   {
    
       $row = employes_model::find($employe_id);
       $old_image = 'back_end/media/employes' . $row->employe_image;
       if (File::exists($old_image)) {
           File::delete($old_image);
       }
       $row->delete();
       return redirect('employes')->with('msg', 'data deleted');
   }
   // status active
   public function employe_status($employe_status, $employe_id)
   {
       $row = employes_model::find($employe_id);
       $row->status = $employe_status;
       $row->save();
       if ($employe_status == 1) {
           return redirect('employes')->with('msg', 'status Active');
       } else {
           return redirect('employes')->with('msg', 'status Deactive');
       }
   }
}
