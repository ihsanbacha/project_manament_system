@extends('front_end.layout');

@section('page_title','Trash')
@section('trash_select','active_menu')
@section('container')

 <!-- PAGE CONTENT-->
  <div class="page-content--bgf7">
    <!-- BREADCRUMB-->
    <section class="au-breadcrumb2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are
                                here:</span>
                            <ul class="list-unstyled list-inline
                                au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="#">Home</a>
                                </li>
                                <li class="list-inline-item
                                    seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">@yield('page_title')</li>
                            </ul>
                        </div>
                        <form class="au-form-icon--sm" action=""
                            method="post">
                            <input class="au-input--w300
                                au-input--style2" type="text"
                                placeholder="Search for datas &amp;
                                reports...">
                            <button class="au-btn--submit2"
                                type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                     
                    </div>
                </div>
            </div>
        </div>
        <hr class="line-seprate">
    </section>
    <!-- END BREADCRUMB-->
     {{-- project section  --}}
     <section class="p-t-20">
      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col col-md-8"></div>
                        <div class="col col-md-4">
                            <button data-toggle="modal"
                                data-target="#confirm_Modal" class="au-btn
                                au-btn-icon
                                au-btn--green au-btn--small" onclick="restore_folder_data()">
                                <i class="zmdi zmdi-plus"></i> RESTORE
                                DATA</button>
        
                                
                                <button data-toggle="modal"
                                data-target="#trash_folder_delete_modal" class="btn btn-danger" onclick="delete_trash_folder()">
                                <i class="zmdi zmdi-minus"></i> DELETE
                                DATA</button>
                        </div>
                        
        
                    </div>
                   @if(count($projects)>0)
                   <h3 class="title-5 m-b-35">PROJECTS</h3>
                   @endif
                    
                    @if(session('msg'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        {{session('msg')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div> 
                    @endif
                
                    <br><br>
                    @if(count($projects)>0)
                   
                  
                    <div class="table-responsive
                        table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>
                                       SELECT
                                    </th>
                                    <th>projec name</th>
                                    <th>date</th>
                                  
                                   
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($projects as $project)
                                <tr class="tr-shadow">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox" name="checkbox_p_ids[]" value="{{ $project->project_id }}">
                                            <span
                                                class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{$project->project_name}}</td>
                                    
                                    <td>{{$project->created_at}}</td>
                                  
                              
                                    
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                     
                    @endif
                </div>
            </div>
        </div>
    </section>
    <br><br>
    {{-- folder section --}}
   
    <section class="p-t-20">
        <div class="container">
            @if(count($folders) > 0)
            <h3 class="title-5 m-b-35">FOLDERS</h3>
             @endif
            <br><br>
            <div class="row">
                @if(count($folders) > 0)
                    @foreach($folders as $folder)
                        <div class="header__navbar col col-md-2">
                            <div>
                                <label class="au-checkbox">
                                    <input type="checkbox" name="checkbox_ids[]" value="{{ $folder->cat_id }}">
                                    <span class="au-checkmark"></span>
                                </label>
                                <br>
                                <div class="col col-md-2">
                                    <i class="fas fa-folder-open" style="font-size: 100px;"></i><br>
                                    {{ $folder->cat_name }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                 
            </div>
            @else          
            @endif
        </div>
    </section>
  
    <br><br>
    {{-- file section --}}
    <section class="p-t-20">
        <div class="container">
            @if(count($files)>0)
            <h3 class="title-5 m-b-35">FILES</h3>
             @endif
            <div class="row">
                @if(count($files)>0)
                @foreach($files as $file)
                <div class="header__navbar col col-md-2">

                    {{-- <ul class="list-unstyled">
                        <li id="db_click" class="has-sub">

                            <i class="zmdi zmdi-more"></i>

                            <ul class="header3-sub-list
                                list-unstyled">
                                <li>
                                    <a href="login.html"
                                        data-toggle="modal"
                                        data-target="#confirm_Modal">Delete</a>
                                </li>
                                <li>
                                    <a href="login.html"
                                        data-toggle="modal"
                                        data-target="#confirm_Modal">Rename</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                     --}}
                       <div>
                        <label class="au-checkbox">
                            <input type="checkbox" name="checkbox_f_ids[]" value="{{ $file->file_id }}">
                            <span
                                class="au-checkmark"></span>
                        </label>

                            <br>
                        <div class="col col-md-2"><i class="fas
                            fa-copy" style="font-size:
                            100px;"></i><br>{{$file->file_name}} {{ $file->file_id }}</div>
                       </div>
                    
                  
                </div>
                @endforeach
                @else
                    
                @endif
            </div>
        </div>
    </section>
    <!-- DATA TABLE-->
  
    <!-- END DATA TABLE-->

    <!-- COPYRIGHT-->
    <section class="p-t-60 p-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END COPYRIGHT-->

</div>
{{-- restore form --}}
<form action="{{route('restore_trash_.folder')}}" method="POST" id="restore_folder_form" >
    @csrf
    <input type="hidden" name="restore_trash_project[]" id="restore_trash_project">
    <input type="hidden" name="restore_trash_folder[]" id="restore_trash_folders">
    <input type="hidden" name="restore_trash_file[]" id="restore_trash_file">
</form>
@endsection