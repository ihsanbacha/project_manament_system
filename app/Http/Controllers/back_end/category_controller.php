<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\back_end\category_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class category_controller extends Controller
{
     // categorytable
     public function category_table()
     {
         $data = category_model::all();
         return view('back_end.category', compact('data'));
     }
     //manage_category
     public function manage_category($id = '')
     {
         if ($id > 0) {
             $arr = category_model::where(['cat_id' => $id])->get();
             $row['cat_id'] = $arr['0']->cat_id;
             $row['cat_name'] = $arr['0']->cat_name;
             $row['parent_cat_id'] = $arr['0']->parent_cat_id;
             $row['is_home'] = $arr['0']->is_home;
             $row['cat_image'] = $arr['0']->cat_image;
         } else {
             $row['cat_id'] = '';
             $row['cat_name'] = '';
             $row['cat_image'] = '';
             $row['is_home'] = '';
             $row['parent_cat_id'] ='';
         }
         $row['cat'] = DB::table('categories')->where(['status' => 1])->get();
         return view('back_end.manage_category', $row);
     }
 
     // save category
     public function save_category(Request $request)
     {
 
         $id = $request->post('cat_id');
         if ($id > 0) {
             $row = category_model::find($id);
             $msg = 'data updated succesfuly';
         } else {
             $request->validate([
                 'cat_name' => 'required|unique:categories'
             ],[
                'cat_name.unique'=>"This folder name already exist",
                'cat_name.required'=>" Folder name are required"
             ]);

             $row = new category_model;
             $msg = 'data inserted succesfuly';
         }
       
         $row->cat_name = $request->post('cat_name');
         if (empty($request->parent_cat_id) ){
            $row->parent_cat_id=0;
        } else {
            $row->parent_cat_id = $request->post('parent_cat_id');
        }
         $row->is_home = $request->post('is_home');
         $row->save();
         return redirect('category')->with('msg', $msg);
     }
     // delete category
     public function delete_category($cat_id)
     {
        // prx($cat_id);
 
         $row = category_model::find($cat_id);
         $row->delete();
         return redirect('category')->with('msg', 'data deleted');
     }
     // review_status 
     public function cat_status($cat_status, $cat_id)
     {
         $row = category_model::find($cat_id);
         $row->status = $cat_status;
         $row->save();
         if ($cat_status == 1) {
             return redirect('category')->with('msg', 'status Active');
         } else {
             return redirect('category')->with('msg', 'status Deactive');
         }
     }
}
