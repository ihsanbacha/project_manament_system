@extends('front_end.layout');

@section('page_title','Home')
@section('project_file_select','active_menu')
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
                            @php
                            $string="";
                            $cat_ids=[];
                            foreach ($categories as $value) {

                            $cat_ids[]=$value->cat_id;
                            }
                            $string=implode(',',$cat_ids);
                            $pro_id_string="";
                            $pro_ids=[];
                            foreach ($projects as $value2) {

                            $pro_ids[]=$value2->project_id;
                            }
                            $string=implode(',',$cat_ids);
                            $pro_id_string=implode(',',$pro_ids);
                            @endphp
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
                                <li class="list-inline-item">Dashboard</li>
                            </ul>
                        </div>
                        {{-- search project --}}
                        <form class="au-form-icon--sm" action="">

                        </form>
                        {{-- search project --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->

    <!-- WELCOME-->
    <div class="row">

        <div class="col col-md-2" style="margin-left: 25px;">
            <label for="start_date">Sort by Date</label>
            <form action="" id="day_wise_filter_data">
                @csrf
                <select class="form-control" name="sort_by_day" id="sort_by_day" onchange="sort_by([{{$string}}],[{{$pro_id_string}}])">
                    <option value="">Select</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="this_week">This Week</option>
                    <option value="last_week">Last Week</option>
                    <option value="this_month">This Month</option>
                    <option value="last_month">Last Month</option>
                    <option value="this_year">This Year</option>
                    <option value="last_year">Last Year</option>
                </select>
            </form>
        </div>
        <div class="col col-md-2">
            <label for="start_date">Sort By Order</label>
            <form action="">
                <select class="form-control" name="sort_by_desc" id="sort_by_desc" onchange="sort_by_asc([{{$string}}],[{{$pro_id_string}}])">
                    <option value="">Select</option>
                    <option value="Asc">Ascending</option>
                    <option value="Desc">Descending</option>
                </select>
            </form>
        </div>
        <div class="col col-md-2">
            <label for="start_date">Sort By Project</label>
            <form action="">
                <select class="form-control" name="sort_by_status" id="sort_by_status" onchange="sort_status()">
                    <option value="">Select</option>
                    <option value="complete" {{ request()->input('sort_project_status') == 'complete' ? 'selected' : '' }}>Complete</option>
                    <option value="in_progress" {{ request()->input('sort_by_status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                </select>
                </select>
            </form>
        </div>


        <div class="col col-md-2" style="margin-left: 35px;">
            <label for="start_date">&nbsp;</label>
            <div class="col col-md-2"> <button class="btn btn-success" data-toggle="modal" data-target="#advance_search_Modal">
                    <i class="fa fa-search"></i> ADVANCE SEARCH </button></div>
        </div>
        <div class="col col-md-2" style="margin-left: 35px; ">
            <label for="start_date">&nbsp;</label>
            <div class="col col-md-2"> <button class="btn btn-success">
                    <i class="fa fa-filter"></i> <a href="{{ url('project_file') }}" style="color: white">RESET
                        FILTER</a></button>
            </div>
        </div>

    </div>
    <section class="welcome p-t-10">
        <div class="container">





        </div>
    </section>
    <div class="row">
        {{-- 1 --}}
        <div class="col col-md-2">
            <div class="container" style="    margin-left: -6px;
            width: 124%;">
                <div class="login-wrap">
                    <div style="background-color: greenyellow">
                        <h3 class="text-center">QUICK ACCESS</h3>
                    </div>
                    <div class="login-content">

                        <div id="show_tree_view_data" class="login-form form-container" style="height: 110%;">
                            <!-- Output the navigation menu -->
                            {{-- @php
                            $result = DB::table('categories')
                            ->where('status', '=', 1)
                            ->where('trash_id', '=', 0)
                            ->get();

                            $html = buildTreeView($result);

                            @endphp  --}}
                            {{-- {!!buildTreeView($result)!!}  --}}

                        </div>
                        {{-- <script>
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                                , type: "GET"
                                , url: "{{ route('show.folder_file') }}"
                        , data: {
                        cat_id: cat_id
                        }
                        , success: function(response) {
                        console.log(response);
                        var results = response.results.results;
                        var html = "";
                        results.forEach(result => {
                        html += `
                        {!!buildTreeView($result)!!}
                        `;
                        });
                        $('#show_tree_view_data').html(html);
                        }

                        });

                        </script> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- 1 end --}}
        {{-- 1 --}}
        <div class="col col-md-4">
            <div class="container">

                <div class="login-wrap">
                    <div style="background-color: greenyellow">
                        <h3 class="text-center">PROJECTS</h3>
                    </div>
                    <div class="login-content">

                        @if(session('msg'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            {{session('msg')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        {{-- <div class="alert alert-success show_msg"></div> --}}
                        @endif
                        @error('project_name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="row">
                            <div class="col col-md-2"> <button class="btn btn-success" data-toggle="modal" data-target="#add_pro_Modal">
                                    <i class="fa fa-plus"></i> ADD </button></div>

                            <div class="col col-md-2"></div>
                            <div class="col col-md-8"><input class="au-input--w290
                                au-input--style2" type="search" id="search_project" name="search_project" placeholder="Search project here "></div>
                        </div>

                        <br><br>

                        <div class="login-form " style="height: 100%;">

                            <div class="row">
                                <div class="col col-md-4" style="margin-left: 20px;">name</div>
                                <div class="col col-md-4">status</div>
                                <div class="col col-md-3">date</div>

                            </div>
                            <br>

                            <div id="table_body">
                                @foreach($projects as $projects_data)
                                <div class="row" style="background-color:rgb(240, 225, 140)">
                                    <div class="col col-md-4"><button onclick="my_pro_id([{{$string}}],[{{$pro_id_string}}],{{$projects_data->project_id}})">{{$projects_data->project_name}}</button>
                                    </div>
                                    <div class="col col-md-3">{{$projects_data->project_status}}</div>
                                    <div class="col col-md-3">{{$projects_data->date}}</div>
                                    <div class="col col-md-2">
                                        <i class="zmdi
                                zmdi-edit" data-toggle="modal" data-target="#update_pro_Modal" onclick="show_project_data('{{$projects_data->project_name}}','{{$projects_data->project_description}}','{{$projects_data->project_status}}','{{$projects_data->project_id}}')"></i>
                                        &nbsp;
                                        <i class="zmdi
                                zmdi-delete" data-toggle="modal" data-target="#pro_delete_modal" onclick="delete_project_data('{{$projects_data->project_id}}')"></i>
                                        <br>
                                        <button data-toggle="modal" data-target="#view_pro_Modal" onclick="show_project_desc('{{$projects_data->project_description}}')">view</button>
                                    </div>
                                </div>
                                <br>
                                @endforeach

                                <button onclick="paginate([{{$string}}],[{{$pro_id_string}}],)">
                                    <div class="pagination">   
                                        {{-- || isset($_GET['sort_desc']) || isset($_GET['sort_day']) --}}
                                        @if(isset($_GET['sort_project_status']))
                                        {{ $projects->appends(['sort_project_status' => $_GET['sort_project_status']])->links('pagination::bootstrap-4') }} &nbsp; &nbsp; &nbsp;&nbsp;
                                        {{-- {{ $projects->appends(['sort_desc' => $_GET['sort_desc']])->links('pagination::bootstrap-4') }} &nbsp; &nbsp; &nbsp;&nbsp;
                                        {{ $projects->appends(['sort_day' => $_GET['sort_day']])->links('pagination::bootstrap-4') }} &nbsp; &nbsp; &nbsp;&nbsp; --}}
                                        @else
                                        {{ $projects->links('pagination::bootstrap-4') }} &nbsp; &nbsp; &nbsp;&nbsp;
                                        @endif

                                        &nbsp; &nbsp;<p>Total projects: {{ $projectsCount }}</p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- 1 end --}}


        {{-- this my view --}}
        <div class="col col-md-3">

            <div class="container" style=" margin-left: -46px; width: 113%;">
                <div class="login-wrap">
                    <div style="background-color: greenyellow">
                        <h3 class="text-center">FOLDER</h3>
                    </div>
                    <div class="login-content">
                        <div id="back">

                        </div>
                        <div id="add_folder_table">

                        </div>

                        <br><br>
                        <div class="login-form " style="height: 100%;">
                            <div class="row" id="folder_table_data">

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- 1 end --}}
        {{-- 1 --}}
        <div class="col col-md-3">
            <div class="container" style=" margin-left: -49px; width: 116%;">
                <div class="login-wrap">
                    <div style="background-color: greenyellow">
                        <h3 class="text-center">FILES</h3>
                    </div>
                    <div class="login-content">
                        {{-- list  --}}
                        <div class="header__navbar col col-md-6" style=" margin-left: -61px; margin-top: -23px;">
                            <ul id="file_menue" class="list-unstyled" style="display: none">
                                <li id="db_click" class="has-sub">
                                    <h3>...</h3>
                                    <ul class="header3-sub-list list-unstyled">
                                        <li>
                                            <a href="login.html" data-toggle="modal" data-target="#" onclick="select_file()">SELECT</a>
                                        </li>
                                        <li>
                                            <a href="login.html" data-toggle="modal" data-target="#files_delete_modal" onclick="selected_file_delete()">DELETE FILES</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        {{-- end list --}}
                        <button id="file_btn" class="btn btn-success" style="margin-left: 180px; display:none" data-toggle="modal" data-target="#add_file_Modal">
                            <i class="fa fa-plus"></i> ADD</button>
                        <br><br>

                        <div class="login-form form-container" style="height: 100%; padding-left: 0px;">
                            <div class="row" id="show_files" style="display: none">


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- 1 end --}}



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
    
    <form id="day_wise_filter">
        @csrf
        <input type="hidden" id="sort_day" name="sort_day" value="">
    </form>

    <form id="desc_filter">
        @csrf
        <input type="hidden" id="sort_desc" name="sort_desc" value="">
    </form>

    <form id="sort_by_project_status" method="GET">
        @csrf
        <input type="hidden" id="sort_project_status" name="sort_project_status" value="">
    </form>

    <form id="folder_data_form">
        @csrf
        <input type="hidden" id="project_ID" name="project_ID" value="">
        <input type="hidden" id="url" name="url" value="{{$url}}">
    </form>

    <form id="">
        @csrf
        <input type="hidden" id="show_folder_ID" name="show_folder_ID" value="">
        <input type="hidden" name="test[]" id="test" value="">
        <input type="hidden" id="show_folder_p_ID" name="show_folder_p_ID" value="">
    </form>

    <form id="">
        @csrf
        <input type="hidden" id="folder_file_id" name="folder_file_id" value="">
    </form>


    @endsection
