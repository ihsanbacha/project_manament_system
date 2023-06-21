<?php

use App\Http\Controllers\back_end\user_controller;
use App\Http\Controllers\back_end\category_controller;
use App\Http\Controllers\back_end\employe_controller;
use App\Http\Controllers\back_end\admin_controller;
use App\Http\Controllers\back_end\project_controller;
use App\Http\Controllers\front_end\fornt_controller;
use App\Http\Controllers\front_end\employe_login__controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('child_categories');
});

// index routes
Route::get('/', [fornt_controller::class, 'index']);
Route::post('employe_login', [employe_login__controller::class, 'employe_login'])->name('employe.login');

// middleware
Route::group(['middleware' => 'employe_auth'], function () {
    // logout
    Route::get('employe_logout', function () {
        session()->forget('employe_login');
        session()->forget('employe_id');
        session()->forget('employe_name');
        return redirect('/');
    });

Route::match(['post','get'],'project_file', [fornt_controller::class, 'project_file'])->name('search.project');
Route::post('add_project_data', [fornt_controller::class, 'add_project_data'])->name('add.project_data');
Route::post('trash_project_data', [fornt_controller::class, 'trash_project_data'])->name('trash_project.data');

// folder routes
Route::get('show_folder_data', [fornt_controller::class, 'show_folder_data'])->name('show.folder_data');
Route::get('/tree-view', [fornt_controller::class, 'tree_view'])->name('tree.view');
Route::post('add__folder', [fornt_controller::class, 'add__folder'])->name('add.folders');
Route::post('update__folder', [fornt_controller::class, 'update__folder'])->name('update.folder1');
Route::post('update__folder_trash', [fornt_controller::class, 'update__folder_trash'])->name('update.trash');
Route::post('delete__folder', [fornt_controller::class, 'delete__folder'])->name('deletefolder');

Route::get('show_folder_file', [fornt_controller::class, 'show_folder_file'])->name('show.folder_file');
Route::post('add__files', [fornt_controller::class, 'add__files'])->name('add.files');
Route::post('update__file', [fornt_controller::class, 'update__file'])->name('update.files');
Route::post('update_file_trash', [fornt_controller::class, 'update_file_trash'])->name('trash.file');

Route::get('trash', [fornt_controller::class, 'trash']);
Route::post('delete_trash_folder', [fornt_controller::class, 'delete_trash_folder'])->name('delete_trash.folder');
Route::post('restore_trash_folder', [fornt_controller::class, 'restore_trash_folder'])->name('restore_trash_.folder');
Route::post('delete_multiple_file', [fornt_controller::class, 'delete_multiple_file'])->name('delete_multiple.file');
});



////////////////////////////////////////////////////////////////////////////
// user routes
Route::get('admin', [admin_controller::class, 'admin']);
Route::post('admin_auth', [admin_controller::class, 'admin_auth'])->name('admin.admin');
// admin panel middleware
Route::group(['middleware' => 'admin_auth'], function () {

     // logout
     Route::get('logout', function () {
        session()->forget('admin_login');
        session()->forget('user_id');
        return redirect('admin');
    });

    Route::get('user', [user_controller::class, 'user_table']);
    Route::get('manage_user', [user_controller::class, 'manage_user']);
    Route::get('manage_user/{id}', [user_controller::class, 'manage_user']);
    Route::post('manage_user', [user_controller::class, 'save_user'])->name('save.user');
    Route::get('delete/{id}', [user_controller::class, 'delete_user']);
    Route::get('status/{status}/{id}', [user_controller::class, 'status']);

    Route::get('employes', [employe_controller::class, 'employe_table']);
    Route::get('manage_employe', [employe_controller::class, 'manage_employe']);
    Route::get('manage_employe/{employe_id}', [employe_controller::class, 'manage_employe']);
    Route::post('manage_employe', [employe_controller::class, 'save_employe'])->name('save.employe');
    Route::get('delete/{employe_id}', [employe_controller::class, 'delete_employe']);
    Route::get('employe_status/{employe_status}/{employe_id}', [employe_controller::class, 'employe_status']);

    // category routes
    Route::get('category', [category_controller::class, 'category_table']);
    Route::get('manage_category', [category_controller::class, 'manage_category']);
    Route::get('manage_category/{cat_id}', [category_controller::class, 'manage_category']);
    Route::post('manage_category', [category_controller::class, 'save_category'])->name('cat.save');
    Route::get('delete_category/{cat_id}', [category_controller::class, 'delete_category']);
    Route::get('cat_status/{cat_status}/{cat_id}', [category_controller::class, 'cat_status']);

    // project routes
    Route::get('project', [project_controller::class, 'project_table']);
    Route::get('manage_project', [project_controller::class, 'manage_project']);
    Route::get('manage_project/{project_id}', [project_controller::class, 'manage_project']);
    Route::post('manage_project', [project_controller::class, 'save_project'])->name('project.save');
    Route::get('delete_project/{project_id}', [project_controller::class, 'delete_project']);
    Route::get('project_status/{project_status}/{project_id}', [project_controller::class, 'project_status']);

});
 