<?php

namespace App\Http\Controllers\front_end;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\back_end\project_model;
use App\Models\back_end\category_model;
use App\Models\back_end\file_model;
use Illuminate\Support\Facades\Validator;

class fornt_controller extends Controller
{

   // index
   public function index()
   {
      return view('front_end.index');
   }

   public function project_file(Request $request)
   {



      $results['url'] = Route::getFacadeRoot()->current()->uri();
      $search = "";
      if ($request->ajax()) {
         if ($request->search_project != "") {
            $search = $request->search_project;
         }


         $results['projects'] = DB::table('projects')
            ->where('project_name', 'like', '%' . $search . '%')
            ->where('project_switch', '=', 1)
            ->where('trash_id', '=', 0)
            ->take(7)->get();

         $results['categories2'] = DB::table('categories')
            ->get();
         $results['projects2'] = DB::table('projects')
            ->where('project_switch', '=', 1)
            ->where('trash_id', '=', 0)
            ->get();
         return response()->json(['results' => $results]);
      } else {
         $data = "";
         $query = DB::table('projects')
            ->where('project_switch', '=', 1)
            ->where('trash_id', '=', 0);
         $query = $query->take(7);
         // sort day
         if ($request->get('sort_day') !== null) {
            $data = $request->get('sort_day');
         }
         // sort desc
         if ($request->get('sort_desc') !== null) {
            $data = $request->get('sort_desc');
         }
         // sort by status
         if ($request->get('sort_project_status') !== null) {
            $data = $request->get('sort_project_status');
         }
         // sort between two date
         // Apply date range filtering
         $startPDate = $request->get('start_p_date');
         $endPDate = $request->get('end_p_date');

         if ($startPDate && $endPDate) {
            $query = $query->whereBetween('created_at', [$startPDate, $endPDate]);
         } else {
            switch ($data) {
               case 'today':
                  $query = $query->whereDate('created_at', Carbon::today());
                  break;
               case 'yesterday':
                  $query = $query->whereDate('created_at', Carbon::yesterday());
                  break;
               case 'this_week':
                  $query = $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                  break;
               case 'last_week':
                  $query = $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()]);
                  break;
               case 'this_month':
                  $query = $query->whereMonth('created_at', Carbon::now()->month);
                  break;
               case 'last_month':
                  $query = $query->whereMonth('created_at', Carbon::now()->submonth()->month);
                  break;
               case 'this_year':
                  $query = $query->whereYear('created_at', Carbon::now()->year);
                  break;
               case 'last_year':
                  $query = $query->whereYear('created_at', Carbon::now()->subYear()->year);
                  break;
               case 'Desc':
                  $query = $query->orderBy('project_id', 'desc');
                  break;
               case 'Asc':
                  $query = $query->orderBy('project_id', 'asc');
                  break;
               case 'complete':
                  $query = $query->where('project_status', '=', 'completed');
                  break;
               case 'In progress':
                  $query = $query->where('project_status', '=', 'In progress');
                  break;
            }
         }




         $query = $query->paginate(7);
         $results['projects'] = $query;
         $results['projectsCount'] =  $query->total();
         $results['categories'] = DB::table('categories')->get();
         //  $results['categories2'] = DB::table('categories')
         //  ->where('project_ids','=',$pro_ids)

         $results['files'] = DB::table('files')->get();
         return view('front_end.project_file', $results);
      }
   }

   public function add_project_data(Request $request)
   {

      $project_name = $request->project_name;
      $project_description = $request->project_description;
      $project_status = $request->project_status;
      $project_id = $request->project_id;
      $date = date("Y-m-d");
      if ($project_id != "") {
         DB::table('projects')->where('project_id', $project_id)->update([
            'project_name' => $project_name,
            'project_description' => $project_description,
            'project_status' => $project_status,
            'date' => $date,
         ]);

         $msg = 'project updated successfully';
      } else {
         // validate
         $request->validate([
            'project_name' => 'required|unique:projects'
         ]);
         $data2 = new project_model;
         $data2->project_name = $project_name;
         $data2->project_description = $project_description;
         $data2->project_status = $project_status;
         $data2->date = $date;
         $data2->save();
         $msg = 'project added successfully';
      }
      return back()->with('msg', $msg);
   }

   public function delete_project_data(Request $request)
   {
      $project_id = $request->p_id;

      if ($project_id != "") {
         DB::table('projects')->where('project_id', $project_id)->delete();
      }
      return back()->with('msg', 'Project Deleted Successfully');
   }

   public function show_folder_data(Request $request)
   {
      $project_id = $request->project_ID;
      $cat_id = $request->cat_id;
      $parent_cat_id = $request->parent_cat_id;
      $pro_id = $request->pro_id;
      // show tree view
      $results2 = DB::table('categories')
         ->where('status', '=', 1)
         ->where('trash_id', '=', 0)
         ->get();

      // load folders if click on project
      if ($project_id != "") {
         $results['categories2'] = DB::table('categories')
            ->where('project_ids', '=', $project_id)
            ->where('parent_cat_id', '=', 0)
            ->where('status', '=', 1)
            ->where('trash_id', '=', 0)
            ->get();
         // active tree view
         $results['active'] = DB::table('categories')
            ->get();
         // show tree view
         $results['treeview'] = DB::table('categories')
            ->where('status', '=', 1)
            ->where('trash_id', '=', 0)
            ->get();
         return response()->json(['results' => $results, 'results2' => $results2]);
      }
      // load folder forward and  back 
      if ($cat_id != "") {
         // open folder
         $results['categories2'] = DB::table('categories')
            ->where('parent_cat_id', '=', $cat_id)
            ->where('status', '=', 1)
            ->where('trash_id', '=', 0)
            ->get();
         // back

         $results['back'] = DB::table('categories')
            ->where('cat_id', '=', $cat_id)
            ->where('status', '=', 1)
            ->where('trash_id', '=', 0)
            ->get();

         $results['active'] = DB::table('categories')
            ->get();
         return response()->json(['results' => $results]);
      }

      // load current folder
      if ($parent_cat_id !== "" && $pro_id !== "") {
         $results['categories2'] = DB::table('categories')
            ->where('project_ids', '=', $pro_id)
            ->where('parent_cat_id', '=', $parent_cat_id)
            ->where('status', '=', 1)
            ->where('trash_id', '=', 0)
            ->get();
         // back

         $results['back'] = DB::table('categories')
            ->where('cat_id', '=', $parent_cat_id)
            ->where('project_ids', '=', $pro_id)
            ->where('status', '=', 1)
            ->where('trash_id', '=', 0)
            ->get();
         $results['active'] = DB::table('categories')
            ->get();
         return response()->json(['results' => $results]);
      }
   }
   // add folder
   public function add__folder(Request $request)
   {

      $data = new category_model();
      $data->cat_name = $request->folder_name_value;
      $data->project_ids = $request->projectID1;
      $data->project_tree_id = $request->folder_tree_id2;
      $data->parent_cat_id = $request->folder_add_p_id3;
      $data->save();
   }
   public function update__folder(Request $request)
   {

      if ($request->update_id2 != "") {
         $category = category_model::where('cat_id', $request->update_id2)->first();
         if ($category) {
            $category->cat_name = $request->update_folder_name_value;
            $category->save();
         }
      }

      return response()->json(['result' => 'data updated']);
   }

   // show folder file
   public function show_folder_file(Request $request)
   {
      $cat_id = $request->cat_id;
      if ($cat_id != "") {
         $results['files'] = DB::table('files')
            ->where('cat_id', '=', $cat_id)
            ->where('file_status', '=', 1)
            ->where('trash', '=', 0)
            ->get();
         return response()->json(['results' => $results]);
      }
   }

   // add file
   public function add__files(Request $request)
   {
      if ($request->file_cat_id != "") {
         $files = $request->file('file_name');

         foreach ($files as $file) {
            $row = new file_model();

            if ($file) {
               $rand = rand(1, 99);
               // save and move the new file
               $ext = $file->getClientOriginalExtension();
               $file_new_name = $rand . time() . '.' . $ext;
               $file->move('back_end/media/files', $file_new_name);

               $row->file_name = $file_new_name;
            }

            $row->cat_id = $request->file_cat_id;
            $row->save();
         }

         return response()->json(['msg' => 'Files updated successfully']);
      }
   }

   // update file
   public function update__file(Request $request)
   {
      if ($request->file_update_cat_id != "") {
         $row = file_model::find($request->file_update_cat_id);

         if ($request->hasFile('update_file_name')) {
            // delete old file
            $old_file = 'back_end/media/files/' . $row->file_name;
            if (File::exists($old_file)) {
               File::delete($old_file);
            }
            $rand = rand(1, 99);
            // save and move the new file
            $file = $request->file('update_file_name');
            $ext = $file->getClientOriginalExtension();
            $file_new_name = $rand . time() . '.' . $ext;
            $file->move('back_end/media/files', $file_new_name);

            $row->file_name = $file_new_name;
         }

         $row->save();
         return response()->json(['msg' => 'File updated successfully']);
      }
   }

   // trash folder 
   public function update__folder_trash(Request $request)
   {

      if ($request->folder_trash_cat_id != "") {
         $row = category_model::find($request->folder_trash_cat_id);
         $row->trash_id = 1;
         $row->save();
         return response()->json(['msg' => 'Folder updated successfully']);
      }
   }
   // trash folder 
   public function update_file_trash(Request $request)
   {

      if ($request->file_trash_id != "") {
         $row = file_model::find($request->file_trash_id);
         $row->trash = 1;
         $row->save();
         return response()->json(['msg' => 'File updated successfully']);
      }
   }

   // trash
   public function trash(Request $request)
   {
      // projects
      $results['projects'] = DB::table('projects')
         ->where('project_switch', '=', 1)
         ->where('trash_id', '=', 1)
         ->get();
      // folders
      $results['folders'] = DB::table('categories')
         ->where('status', '=', 1)
         ->where('trash_id', '=', 1)
         ->get();
      // files
      $results['files'] = DB::table('files')
         ->where('file_status', '=', 1)
         ->where('trash', '=', 1)
         ->get();
      return view('front_end.trash', $results);
   }

   // retore trash folders
   public function restore_trash_folder(Request $request)
   {
      $projectIds = explode(',', $request->restore_trash_project[0]);
      $folderIds = explode(',', $request->restore_trash_folder[0]);
      $file_Ids = explode(',', $request->restore_trash_file[0]);
      // project restore
      if ($projectIds != "") {
         project_model::whereIn('project_id', $projectIds)
            ->update(['trash_id' => 0]);
      }
      // folder restore
      if ($folderIds != "") {
         category_model::whereIn('cat_id', $folderIds)
            ->update(['trash_id' => 0]);
      }
      // file restore
      if ($folderIds != "") {
         file_model::whereIn('file_id', $file_Ids)
            ->update(['trash' => 0]);
      }

      return back()->with('msg', 'The data were retore successfully.');
   }

   // delete trash folders
   public function delete_trash_folder(Request $request)
   {
      $projectIds = explode(',', $request->project_trash_ids[0]);
      $folderIds = explode(',', $request->folder_trash_ids[0]);
      $filesIds = explode(',', $request->files_trash_ids[0]);
      // project 
      if ($projectIds != "") {
         project_model::whereIn('project_id', $projectIds)->delete();
      }
      // folder 
      if ($folderIds != "") {
         category_model::whereIn('cat_id', $folderIds)->delete();
      }
      // file
      if ($filesIds != "") {
         file_model::whereIn('file_id', $filesIds)->delete();
      }

      return back()->with('msg', 'The data were deleted successfully.');
   }
   // delete trash folders
   public function delete_multiple_file(Request $request)
   {

      $filesIds = explode(',', $request->files_delete_ids[0]);

      // file
      if ($filesIds != "") {
         file_model::whereIn('file_id', $filesIds)->delete();
      }

      return response()->json(['msg' => 'files deleted']);
   }
   // delete trash project
   public function trash_project_data(Request $request)
   {
      $project_id = $request->pro_trash_id;
      if ($project_id != "") {
         project_model::where('project_id', $project_id)
            ->update(['trash_id' => 1]);
      }

      return back()->with('msg', 'The data were deleted successfully.');
   }
   // tree view file
   public function tree_view(Request $request)
   {
      $tree_id = $request->project_ID;
      if ($tree_id != "") {
         $result = DB::table('categories')
            ->where('status', 1)
            ->where('trash_id', 0)
            ->where('project_tree_id', 't_' . $tree_id)
            ->get();

         $html = buildTreeView($result);

         return response()->json(['html' => $html]);
      }
   }
}
