<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\back_end\project_model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class project_controller extends Controller
{
    // projecttable
    public function project_table()
    {
        $data = project_model::all();
        return view('back_end.project', compact('data'));
    }
    //manage_project
    public function manage_project($id = '')
    {
        if ($id > 0) {
            $arr = project_model::where(['project_id' => $id])->get();
            $row['project_id'] = $arr['0']->project_id;
            $row['project_name'] = $arr['0']->project_name;
            $row['project_description'] = $arr['0']->project_description;
            $row['project_status'] = $arr['0']->project_status;
            $row['project_image'] = $arr['0']->project_image;
        } else {
            $row['project_id'] = '';
            $row['project_name'] = '';
            $row['project_description'] = '';
            $row['project_status'] = '';
            $row['project_image'] = '';
        }
        $row['project'] = DB::table('projects')->where(['project_switch' => 1])->get();
        return view('back_end.manage_project', $row);
    }

    // save project
    public function save_project(Request $request)
    {

        $id = $request->post('project_id');
        if ($id > 0) {
            $row = project_model::find($id);
            $msg = 'project data updated succesfuly';
        } else {
            $request->validate([
                'project_description' => 'required|unique:projects'
            ]);

            $row = new project_model;
            $msg = 'project data inserted succesfuly';
        }
      
        $row->project_name = $request->post('project_name');
        $row->project_description = $request->post('project_description');
        $row->project_status = $request->post('project_status');
          // image code
          if ($request->hasFile('project_image')) {
            // delete old image
            $old_image = 'back_end/media/project/' . $row->project_image;
            if (File::exists($old_image)) {
                File::delete($old_image);
            }
            // save and move image to forlder
            $file = $request->file('project_image');
            $ext = $file->getClientOriginalExtension();
            $image_new_name = time() . '.' . $ext;
            $file->move('back_end/media/project', $image_new_name);
            $row->project_image = $image_new_name;
        }
        $row->save();
        return redirect('project')->with('msg', $msg);
    }
    // delete project
    public function delete_project($project_id)
    {

        $row = project_model::find($project_id);
        $row->delete();
        return redirect('project')->with('msg', 'data deleted');
    }
    // review_status 
    public function project_status($project_status, $project_id)
    {
        $row = project_model::find($project_id);
        $row->project_switch = $project_status;
        $row->save();
        if ($project_status == 1) {
            return redirect('project')->with('msg', 'status Active');
        } else {
            return redirect('project')->with('msg', 'status Deactive');
        }
    }
}
