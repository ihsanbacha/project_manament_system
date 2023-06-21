<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Title Page-->
    <title>@yield('page_title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('back_end/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('back_end/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('back_end/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('back_end/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ url('back_end/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ url('back_end/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('back_end/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('back_end/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('back_end/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('back_end/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('back_end/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('back_end/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('back_end/vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ url('back_end/css/theme.css') }}" rel="stylesheet" media="all">

    <style>
        .form-container {
            height: 300px;
            /* Set the desired height */
            overflow-y: auto;
            /* Enable vertical scroll */
            padding: 20px;
        }

    </style>

</head>

<body class="animsition">

    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="{{ url('project_file') }}">
                            <h3 style="color: rgb(206, 211, 212);">CVE &nbsp; Project &nbsp; Repository</h3>

                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">

                            <li>
                                <a href="{{ url('trash') }}">
                                    <i class="fas fa-shopping-basket  @yield('trash_select')"></i>
                                    <span class="bot-line"></span>Trash</a>
                            </li>



                            <li class="has-sub">
                                <a href="{{ url('project_file') }}">
                                    <i class="fas fa-desktop @yield('project_file_select')"></i>
                                    <span class="bot-line"></span>Project File</a>

                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">


                        <div class="account-wrap">
                            <div class="account-item account-item--style2
                                clearfix js-item-menu">
                                @if (session('employe_image'))
                                <div class="image">
                                    <img src="{{ url('back_end/media/employes') }}/{{ session('employe_image') }}" alt="John Doe" />
                                </div>
                                @endif



                                <div class="content">
                                    @if (session('employe_name'))
                                    <p style="color: white">Welcome, {{ session('employe_name') }}</p>
                                    @endif
                                </div>
                                <div class="account-dropdown js-dropdown">

                                    <div class="account-dropdown__footer">
                                        <a href="{{ url('employe_logout') }}">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @section('container')
        @show
        <!-- END HEADER DESKTOP-->


        <!-- modal for varification -->
        {{-- <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
            data-backdrop="static" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <form id="delete_project_id">
                            @csrf
                            <p style="color: red" class="text text-center">
                                <input type="hidden" id="pro_id" name="p_id" value="">
                                ARE YOU SURE TO DELETE THIS PROJECT
                            </p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> --}}
        {{-- <button type="submit" class="btn btn-primary">Confirm</button> --}}
        {{-- <input class="btn btn-primary" type="submit" name="submit" id="submit" value="yes delete">
                    </div>
                    </form>
                </div>
            </div>
        </div> --}}

        {{-- model for add project --}}
        {{-- <div class="modal fade" id="add_project_Modal" tabindex="-1" role="dialog"
            aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">ADD PROJECT</h5>
                        <div id="msg"></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <form id="add_project_form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Project name</label>
                                <input type="text" class="form-control" name="project_name" value="" id="">
                                @error('project_name')
                                <div class="alert alert-danger">{{$message}}
    </div>
    @enderror
    <input type="hidden" class="form-control" name="project_id" value="" id="">
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <textarea class="form-control" name="project_description" id="" cols="15" rows="5">

                            </textarea>

    </div>

    <div class="form-group">

        <label for="">Project status</label>
        <select class="form-control" name="project_status" id="">
            <option value="">SELECT STATUS</option>
            <option selected value="completed">Completed</option>
            <option value="In progress">In progress</option>
        </select>
    </div>


    <div class="form-group">
        <label for="">Project Image</label>
        <input type="file" class="form-control" name="project_image" value="" id="">
    </div>
    <input type="submit" name="submit" class="form-control btn btn-primary" id="btn_submit">
    </form>
    </div>


    </div>
    </div>
    </div> --}}
    {{-- model update project end --}}

    {{-- model for update project --}}
    {{-- <div class="modal fade" id="update_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">UPDATE PROJECT</h5>
                        <div id="msg"></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <form id="update_project_form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Project name</label>
                                <input type="text" class="form-control" name="project_name" id="p_name">
                                <input type="text" class="form-control" name="pr_id" id="pr_id">

                                <div class="alert alert-danger errors"></div>

                                <input type="hidden" class="form-control" name="project_id" value="" id="p_id">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="project_description" id="p_desc" cols="15"
                                    rows="5">

                                </textarea>

                            </div>

                            <div class="form-group">

                                <label for="">Project status</label>
                                <select class="form-control" name="project_status" id="p_status">
                                    <option value="">SELECT STATUS</option>
                                    <option selected value="completed">Completed</option>
                                    <option value="In progress">In progress</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">Project Image</label>
                                <input type="file" class="form-control" name="project_image" value="p_image" id="">
                            </div>
                            <input type="submit" name="submit" class="form-control btn btn-primary" id="btn_submit">
                        </form>
                    </div>


                </div>
            </div>
        </div> --}}
    {{-- model update project end --}}



    {{-- ///////////////////////////////////////////////////////////// --}}
    {{-- advandce search model --}}

    <div class="modal fade" id="advance_search_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel"> ADVANCE SEARCH</h5>
                    <div id="msg"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>
                <div class="modal-body">

                    <form action="">
                        <div class="row">
                            <div class="col col-md-6">
                                <label for="">START DATE</label>
                                <input type="date" class="form-control" name="start_p_date">
                            </div>
                            <div class="col col-md-6">
                                <label for="">END DATE</label>
                                <input type="date" class="form-control" name="end_p_date">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary form-control">SEARCH</button>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <!-- modal for varification -->
    <div class="modal fade" id="pro_delete_modal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form method="post" action="{{ route('trash_project.data') }}">
                        @csrf
                        <p style="color: red" class="text text-center">
                            <input type="text" id="projs_id" name="pro_trash_id" value="">
                            <br>
                            ARE YOU SURE TO DELETE THIS PROJECT
                        </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{-- <button type="submit" class="btn btn-primary">Confirm</button> --}}
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="yes delete">
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- model for add project --}}
    <div class="modal fade" id="add_pro_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">ADD PROJECT</h5>
                    <div id="msg"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('add.project_data') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Project name</label>
                            <input type="text" class="form-control" name="project_name" value="" id="">
                            @error('project_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="hidden" class="form-control" name="project_id" value="" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="project_description" id="" cols="15" rows="5">

                         </textarea>

                        </div>

                        <div class="form-group">
                            <label for="">Project status</label>
                            <select class="form-control" name="project_status" id="">
                                <option value="">SELECT STATUS</option>
                                <option selected value="completed">Completed</option>
                                <option value="In progress">In progress</option>
                            </select>
                        </div>

                        <input type="submit" name="submit" class="form-control btn btn-primary" id="btn_submit">
                    </form>
                </div>


            </div>
        </div>
    </div>

    {{-- model for update project --}}
    <div class="modal fade" id="update_pro_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">UPDATE PROJECT</h5>
                    <div id="msg"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('add.project_data') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Project name</label>
                            <input type="text" class="form-control" name="project_name" id="p_name">

                            <input type="hidden" class="form-control" name="project_id" value="" id="proj_id">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="project_description" id="p_desc" cols="15" rows="5">

                              </textarea>

                        </div>

                        <div class="form-group">

                            <label for="">Project status</label>
                            <select class="form-control" name="project_status" id="p_status">
                                <option value="">SELECT STATUS</option>
                                <option selected value="completed">Completed</option>
                                <option value="In progress">In progress</option>
                            </select>
                        </div>
                        <input type="submit" name="submit" class="form-control btn btn-primary" id="btn_submit">
                    </form>
                </div>


            </div>
        </div>
    </div>

    {{-- model for view project --}}
    <div class="modal fade" id="view_pro_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">PROJECT DESCRIPTION</h5>
                    <div id="msg"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div id="project_descs"></div>

                </div>


            </div>
        </div>
    </div>
    {{-- model for folder add --}}
    <div class="modal fade" id="add_folder_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel"> ADD FOLDER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>

                <div class="modal-body">
                    <form id="add_folder_data_form">
                        @csrf
                        <label for="">NAME</label>
                        <input type="text" class="form-control" id="folder_name_value" name="folder_name_value" value="">
                        <div style="color: red" class="msg"></div>
                        <input type="hidden" class="form-control" id="projectID1" name="projectID1">
                        <input type="hidden" class="form-control" id="folder_tree_id2" name="folder_tree_id2">
                        <input type="hidden" class="form-control" id="folder_add_p_id3" name="folder_add_p_id3">
                        <br><br>
                        <button class="btn btn-primary form-control">SUBMIT</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- model for update folder --}}
    <div class="modal fade" id="update_folder_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">UPDATE FOLDER</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>


                <div class="modal-body">
                    <form id="update_folder_data_forms">
                        @csrf
                        <label for="">NAME</label>
                        <input type="text" class="form-control" id="update_folder_name_value" name="update_folder_name_value" value="">
                        <input type="hidden" class="form-control" id="update_id2" name="update_id2" value="">
                        <div style="color: red" class="msg"></div>

                        <br><br>
                        <button class="btn btn-primary form-control">SUBMIT</button>

                    </form>
                </div>


            </div>
        </div>
    </div>

    <!-- modal for delete folder varification -->
    <div class="modal fade" id="folders_delete_modal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form id=forder_trash_form>
                        @csrf
                        <p style="color: red" class="text text-center">
                            <input type="hidden" id="folder_trash_cat_id" name="folder_trash_cat_id" value="">
                            <input type="hidden" id="folder_trash_id" name="folder_trash_id" value="1">
                            ARE YOU SURE TO DELETE THIS FOLDER
                        </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{-- <button type="submit" class="btn btn-primary">Confirm</button> --}}
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="yes delete">
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- model for files add --}}
    <div class="modal fade" id="add_file_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel"> ADD FILE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>

                <div class="modal-body">
                    <form id="add_file_form">
                        @csrf

                        <label for="">NAME</label>
                        <input type="file" class="form-control" id="file_name" name="file_name[]" multiple>

                        <div style="color: red" class="msg"></div>
                        <input type="hidden" class="form-control" id="file_cat_id" name="file_cat_id">
                        <br><br>
                        <button class="btn btn-primary form-control">SUBMIT</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- model for files update --}}
    <div class="modal fade" id="update_file_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel"> UPDATE FILE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>

                <div class="modal-body">
                    <form id="update_file_form">
                        @csrf
                        <label for="">NAME</label>
                        <input type="file" class="form-control" id="update_file_name" name="update_file_name" value="">
                        <div style="color: red" class="msg"></div>
                        <input type="hidden" class="form-control" id="file_update_cat_id" name="file_update_cat_id">
                        <br><br>
                        <button class="btn btn-primary form-control">SUBMIT</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal for delete file varification -->
    <div class="modal fade" id="file_delete_modal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form id=file_trash_form>
                        @csrf
                        <p style="color: red" class="text text-center">
                            <input type="text" id="file_trash_id" name="file_trash_id" value="">
                            ARE YOU SURE TO DELETE THIS FILE
                        </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{-- <button type="submit" class="btn btn-primary">Confirm</button> --}}
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="yes delete">
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- trash folder delete varification --}}
    <div class="modal fade" id="trash_folder_delete_modal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form method="POST" action="{{ route('delete_trash.folder') }}">
                        @csrf
                        <p style="color: red" class="text text-center">
                            <label for="">project</label>
                            <input type="text" id="project_trash_ids" name="project_trash_ids[]" value="">
                            <label for="">folder</label>
                            <input type="text" id="folder_trash_ids" name="folder_trash_ids[]" value="">
                            <label for="">file</label>
                            <input type="text" id="files_trash_ids" name="files_trash_ids[]" value="">
                            <br>
                            ARE YOU SURE TO DELETE THIS DATA
                        </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{-- <button type="submit" class="btn btn-primary">Confirm</button> --}}
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="yes delete">
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- files  delete varification --}}
    <div class="modal fade" id="files_delete_modal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form id="selected_file_delete_form">
                        @csrf
                        <p style="color: red" class="text text-center">


                            <input type="text" id="files_delete_ids" name="files_delete_ids[]" value="">
                            <br>
                            ARE YOU SURE TO DELETE THIS FILES
                        </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{-- <button type="submit" class="btn btn-primary">Confirm</button> --}}
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="yes delete">
                </div>
                </form>
            </div>
        </div>
    </div>


    </div>



    {{-- SCRIPTING END --}}

    <!-- Jquery JS-->
    <script src="{{ url('back_end/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ url('back_end/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ url('back_end/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('back_end/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ url('back_end/vendor/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('back_end/vendor/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ url('back_end/vendor/vector-map/jquery.vmap.world.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ url('back_end/js/main.js') }}"></script>


    {{-- SCRIPTING --}}
    <script>
        // project show
        function my_pro_id(cat, pro_ids, my_pro_id) {
            jQuery('#load_btn').hide();
            jQuery('#file_btn').hide();
            $('#file_menue').hide();
            jQuery('#show_files').hide();
            jQuery('#project_ID').val(my_pro_id);
            var project_ID = my_pro_id;
            jQuery('#project_ID').val(my_pro_id);
            var project_id2 = jQuery('#project_ID').val();
            var project_id2_string = project_id2.toString();
            var cat_id = 0;

            // tree view
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , url: "{{ route('tree.view') }}"
                , type: 'GET'
                , data: {
                    project_ID: project_ID
                }
                , success: function(response) {
                    var html = response.html;
                    console.log(response.html);
                    $('#show_tree_view_data').html(html);
                }
                , error: function() {
                    alert('Failed to load tree view.');
                }
            });

            // ajax for folder 
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , type: 'GET'
                , url: "{{ route('show.folder_data') }}"
                , data: {
                    project_ID: project_ID
                }
                , success: function(response) {
                    var categories2 = response.results.categories2;
                    const cat_name = categories2.map(row => row.cat_name);
                    const string = cat_name.join(',');
                    var categories2 = response.results.categories2;
                    var html = '';
                    var html2 = '';

                    html2 =
                        `<button onclick="add_folder_data('${project_id2_string}','${cat_id}',['${string}'])" class="btn btn-success" style="margin-left: 174px;" data-toggle="modal" data-target="#add_folder_Modal"><i class="fa fa-plus"></i> ADD</button>`;

                    categories2.forEach(function(categories2_data) {
                        html += `
                    <div class="header__navbar col col-md-6">
                        <ul class="list-unstyled">
                            <li id="db_click" class="has-sub">
                                <i class="zmdi zmdi-more"></i>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="login.html" data-toggle="modal" data-target="#folders_delete_modal" onclick="folder_delete_id('${categories2_data.cat_id}',['${string}'],'${project_id2_string}','${cat_id}')">Delete</a>
                                    </li>
                                    <li>
                                        <a href="" data-toggle="modal" data-target="#update_folder_Modal" onclick="update_folder_data('${categories2_data.cat_name}','${categories2_data.cat_id}',['${string}'],'${project_id2_string}','${cat_id}')">Rename</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <button onclick="open_folder('${categories2_data.cat_id}')">
                            <div class="col col-md-2">
                                <i class="fas fa-folder-open" style="font-size: 40px;"></i><br>
                                ${categories2_data.cat_name}
                            </div>
                        </button>
                    </div>
                `;
                    });

                    var active = response.results.active;
                    active.forEach(item => {
                        $('.t_' + item.cat_id).css({
                            'color': ''
                        });
                    });

                    var myDiv = $('.t_' + cat_id);
                    myDiv.css({
                        'color': 'red'
                    });

                    // Set the HTML content to the desired element
                    $('#folder_table_data').html(html);
                    $('#add_folder_table').html(html2);
                }
            });

            $('#search_project').on('keyup', function() {
                pro_ids.forEach(element2 => {
                    jQuery('.t_' + element2).hide(element2);
                });
            });

            pro_ids.forEach(element2 => {
                jQuery('.t_' + element2).hide(element2);
            });

            jQuery('.t_' + my_pro_id).show(my_pro_id);
            jQuery('.add').show();
        }

        //         // parent cat
        function parent_cat(cat_id, parent_cat, mys_pro_id, active) {
            active.forEach(element => {
                const obj = element;
                const value = obj['cat_id'];
                $('.t_' + value).css({
                    'color': ''
                , });
            });
            jQuery('.remove_id').hide();
            jQuery('.' + mys_pro_id).hide(mys_pro_id);
            jQuery('.' + cat_id).hide(cat_id);
            jQuery('.' + parent_cat).hide(parent_cat);
            jQuery('.' + cat_id).show(cat_id);

            var myDiv = $('.t_' + cat_id);
            myDiv.css({
                'color': 'red'
            , });
        }

        // back button for folder 
        function back_folder(cat_id2, parent_cat2, mys_pro_id2, active) {

            jQuery('.remove_id').hide();
            jQuery('.' + parent_cat2).hide(parent_cat2);
            jQuery('.' + mys_pro_id2).hide(mys_pro_id2);
            jQuery('.' + cat_id2).hide(cat_id2);
            if (parent_cat2 == 0 & mys_pro_id2 == mys_pro_id2) {
                jQuery('.' + mys_pro_id2).show(mys_pro_id2);
            } else {
                jQuery('.' + parent_cat2).show(parent_cat2);
            }
            active.forEach(element => {
                const obj = element;
                const value = obj['cat_id'];
                $('.t_' + value).css({
                    'color': ''
                , });
            });
            var myDiv = $('.t_' + cat_id2);
            myDiv.css({
                'color': 'red'
            , });
        }

        function tree_cat(cat_id3, parent_cat3, project_id3, cat3) {
            console.log(cat3);
            cat3.forEach(element => {
                $('.t_' + element).css({
                    'color': ''
                , });
                jQuery('.' + element).hide(element);
            });

            jQuery('.remove_id').hide();
            jQuery('.' + project_id3).hide(project_id3);
            jQuery('.' + cat_id3).hide(cat_id3);
            jQuery('.' + parent_cat3).hide(parent_cat3);
            jQuery('.' + cat_id3).show(cat_id3);

            var myDiv = $('.t_' + cat_id3);
            myDiv.css({
                'color': 'red'
            , });

        }
        // show update data
        function show_project_data(p_name, p_desc, p_status, p_id) {
            jQuery('#p_name').val(p_name);
            jQuery('#p_desc').val(p_desc);
            jQuery('#text').text('how are you');
            jQuery('#p_status').val(p_status);
            jQuery('#proj_id').val(p_id);
        }
        // show desc view data
        function show_project_desc(p_desc) {

            jQuery('#project_descs').text(p_desc);

        }
        // show update data
        function delete_project_data(p_id, ) {

            jQuery('#projs_id').val(p_id);

        }
        $(document).ready(function() {
            $('#search_project').on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    type: "GET"
                    , url: "{{ route('search.project') }}"
                    , data: {
                        'search_project': value
                    }
                    , success: function(response) {
                        // for cat id
                        var cat_data = response.results.categories2;
                        var cat_ids = [];
                        var string = "";

                        cat_data.forEach(function(value) {
                            cat_ids.push(value.cat_id);
                        });

                        string = cat_ids.join(',');

                        // for project id
                        var projects2_data = response.results.projects2;
                        var projects2_ids = [];
                        var string2 = "";

                        projects2_data.forEach(function(value) {
                            projects2_ids.push(value.project_id);
                        });

                        string2 = projects2_ids.join(',');



                        var data = response.results.projects;
                        var html = "";

                        if (data.length > 0) {
                            data.forEach(function(project) {
                                html += `
                <div id="table_body">
                    <div class="row" style="background-color: rgb(240, 225, 140)">
                        <div class="col col-md-4">
                            <button onclick="my_pro_id(['${string}'],['${string2}'],${project.project_id})">
                                ${project.project_name}
                            </button>
                        </div>
                        <div class="col col-md-3">${project.project_status}</div>
                        <div class="col col-md-3">${project.date}</div>
                        <div class="col col-md-2">
                            <i class="zmdi zmdi-edit" data-toggle="modal" data-target="#update_pro_Modal" onclick="show_project_data('${project.project_name}','${project.project_description}','${project.project_status}',${project.project_id})"></i>
                            &nbsp;
                            <i class="zmdi zmdi-delete" data-toggle="modal" data-target="#pro_delete_modal" onclick="delete_project_data(${project.project_id})"></i>
                            <br>
                            <button data-toggle="modal" data-target="#view_pro_Modal" onclick="show_project_desc('${project.project_description}')">view</button>
                        </div>
                    </div>
                    <br>
                </div>`;
                            });
                        } else {
                            html += '<div>No project found</div>';
                        }

                        $('#table_body').html(html);
                    },



                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }

                });
            });
        });
        // sort by
        function sort_by() {

            var day_wise = jQuery("#sort_by_day").val();
            jQuery("#sort_day").val(day_wise);
            jQuery("#day_wise_filter").submit();
        }
        // sort by desc
        function sort_by_asc() {

            var desc_wise = jQuery("#sort_by_desc").val();
            jQuery("#sort_desc").val(desc_wise);
            jQuery("#desc_filter").submit();
        }
        // sort by status
        function sort_status() {
            var status_wise = jQuery("#sort_by_status").val();
            jQuery("#sort_project_status").val(status_wise);
            jQuery("#sort_by_project_status").submit();
        }
        // sort by date
        function filter_date(cat_ids, pro_ids) {
            cat_ids.forEach(element => {
                jQuery('.' + element).hide(element);
            });
            pro_idss.forEach(element2 => {
                jQuery('.t_' + element2).hide(element2);

            });
        }
        // paginat remove classes
        function paginate(cat_ids, pro_idss) {

            cat_ids.forEach(element => {
                jQuery('.' + element).hide(element);
            });
            pro_idss.forEach(element2 => {
                jQuery('.t_' + element2).hide(element2);

            });
        }
        // open folder and back
        function open_folder(cat_id) {
            jQuery('#folder_file_id').val(cat_id);
            jQuery('#file_cat_id').val(cat_id);
          
            // for open folder
            var project_id2 = jQuery('#project_ID').val();
            var project_id2_string = project_id2.toString();

            var cat_id = cat_id;
            if (cat_id > 0) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: "GET"
                    , url: "{{ route('show.folder_data') }}"
                    , data: {
                        cat_id: cat_id
                    }

                    , success: function(response) {
                        var categories2 = response.results.categories2;

                        const cat_name = categories2.map(row => row.cat_name);
                        const string = cat_name.join(',');

                        var categories2 = response.results.categories2;
                        var back = response.results.back;
                        var html = '';
                        var html2 = "";
                        var html3 = "";
                        back.forEach(function(categories2_data) {

                            html2 += ` 
                            <button class="au-btn
                            au-btn-icon
                            au-btn--green au-btn--small"onclick="open_folder('${categories2_data.parent_cat_id}')" >
                                    <i class="fa fa-arrow-circle-left"></i> Back
                                </button>`;

                            html3 += ` <button onclick="add_folder_data('${project_id2_string}','${categories2_data.cat_id}',['${string}'])" class="btn btn-success" style="margin-left: 174px;" data-toggle="modal"
                                    data-target="#add_folder_Modal">
                                    <i class="fa fa-plus"></i> ADD
                                </button>`;
                        });

                        categories2.forEach(function(categories2_data) {

                            html += `
                            <br><br><br>
                            <div class="header__navbar col col-md-6">
                                <ul class="list-unstyled">
                                <li id="db_click" class="has-sub">
                                    <i class="zmdi zmdi-more"></i>
                                    <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="login.html" data-toggle="modal" data-target="#folders_delete_modal" onclick="folder_delete_id('${categories2_data.cat_id}',['${string}'],'${project_id2_string}','${categories2_data.parent_cat_id}')">Delete</a>
                                    </li>
                                    <li>
                                        <a href="" data-toggle="modal" data-target="#update_folder_Modal"  onclick="update_folder_data('${categories2_data.cat_name}','${categories2_data.cat_id}',['${string}'],'${project_id2_string}','${categories2_data.parent_cat_id}')" >Rename</a>
                                    </li>
                                    </ul>
                                </li>
                                </ul>
                                <button onclick="open_folder('${categories2_data.cat_id}',)" >
                                <div class="col col-md-2">
                                <i class=" fas fa-folder-open" style="font-size: 40px;"></i><br><br><br>
                                ${categories2_data.cat_name}
                                </div>
                                </button>
                            </div>
                            <br><br><br>
                            `;
                        });

                        // Set the HTML content to the desired element
                        $('#folder_table_data').html(html);
                        $('#back').html(html2);
                        $('#add_folder_table').html(html3);

                        $('#file_btn').show();
                        $('#file_menue').show();
                        $('#show_files').show();
                        var active = response.results.active;

                        active.forEach(item => {
                            $('.t_' + item.cat_id).css({
                                'color': ''
                            });
                        });

                        var myDiv = $('.t_' + cat_id);
                        myDiv.css({
                            'color': 'red'
                        , });
                    }

                });
            } else {
                //  if folder parent come to  0 this time this code run
                var project_ID = jQuery('#project_ID').val();
                var project_id2_string = project_ID.toString();
                var cat_id = 0;

                // ajax
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: "GET"
                    , url: "{{ route('show.folder_data') }}"
                    , data: {
                        project_ID: project_ID
                    }
                    , success: function(response) {
                        var categories2 = response.results.categories2;
                        const cat_name = categories2.map(row => row.cat_name);
                        const string = cat_name.join(',');
                        var categories2 = response.results.categories2;
                        var html = '';
                        var html2 = '';

                        html2 = ` <button onclick="add_folder_data('${project_id2_string}','${cat_id}',['${string}'])" class="btn btn-success" style="margin-left: 174px;" data-toggle="modal"
                                    data-target="#add_folder_Modal">
                                    <i class="fa fa-plus"></i> ADD
                                </button>`;

                        categories2.forEach(function(categories2_data) {
                            html += `
                            <div class="header__navbar col col-md-6">
                                <ul class="list-unstyled">
                                <li id="db_click" class="has-sub">
                                    <i class="zmdi zmdi-more"></i>
                                    <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="login.html" data-toggle="modal" data-target="#folders_delete_modal" onclick="folder_delete_id('${categories2_data.cat_id}',['${string}'],'${project_id2_string}','${categories2_data.parent_cat_id}')">Delete</a>
                                    </li>
                                    <li>
                                        <a href="" data-toggle="modal" data-target="#update_folder_Modal"  onclick="update_folder_data('${categories2_data.cat_name}','${categories2_data.cat_id}',['${string}'],'${project_id2_string}','${categories2_data.parent_cat_id}')" >Rename</a>
                                    </li>
                                    </ul>
                                </li>
                                </ul>
                                <button onclick="open_folder('${categories2_data.cat_id}','${project_ID}')" >
                                <div class="col col-md-2">
                                <i class=" fas fa-folder-open" style="font-size: 40px;"></i><br>
                                ${categories2_data.cat_name}
                                </div>
                                </button>
                            </div>
                            `;
                        });

                        var active = response.results.active;

                        active.forEach(item => {
                            $('.t_' + item.cat_id).css({
                                'color': ''
                            });
                        });

                        var myDiv = $('.t_' + cat_id);
                        myDiv.css({
                            'color': 'red'
                        , });
                        // Set the HTML content to the desired element
                        $('#folder_table_data').html(html);
                        $('#add_folder_table').html(html2);
                        $('#file_btn').hide();
                        $('#file_menue').hide();
                        $('#show_files').hide();
                    }

                });

            }

            // show folder file

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                type: "GET"
                , url: "{{ route('show.folder_file') }}"
                , data: {
                    cat_id: cat_id
                }
                , success: function(response) {
                    console.log(response);
                    var files = response.results.files;
                    var html = "";
                    files.forEach(fileData => {
                        html += `
                       
                                       
                                        
                <div class="header__navbar col col-md-6">
                                        <label class="au-checkbox check" style="display:none">
                                            <input type="checkbox" name="checkbox_files_id[]" value="${fileData.file_id}">
                                            <span
                                                class="au-checkmark"></span>
                                        </label>
                                        <br>
                        <ul class="list-unstyled">
                            <li id="db_click" class="has-sub">
                                <i class="zmdi zmdi-more"></i>
                                <ul class="header3-sub-list list-unstyled" >
                                    <li>
                                        <a href="login.html" data-toggle="modal" data-target="#file_delete_modal" onclick="delete_file('${fileData.file_id}')">Delete</a>
                                    </li>
                                    <li>
                                        <a href="login.html" data-toggle="modal" data-target="#update_file_Modal" onclick="update_file('${fileData.file_name}','${fileData.file_id}')">Update File</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                <div class="col col-md-2"><i class="fas fa-copy" style="font-size: 40px;"></i><br>${fileData.file_name}</div>
            </div>`;
                    });
                    $('#show_files').html(html);
                }


            });

        }
        // set add folder data in add form
        function add_folder_data(pro_id, cat_id, test) {

            var id = jQuery('#test').val(test);

            jQuery('#projectID1').val(pro_id);
            jQuery('#folder_tree_id2').val('t_' + pro_id);
            jQuery('#folder_add_p_id3').val(cat_id);
            jQuery('#show_folder_ID').val(cat_id);
            jQuery('#show_folder_p_ID').val(pro_id);

            $('#folder_name_value').val('');
            $('#msg').html('');
        }

        // upadte folder
        function update_folder_data(cat_name, cat_id, test, pro_id, catP) {

            var id = jQuery('#test').val(test);
            jQuery('#update_folder_name_value').val(cat_name);
            jQuery('#update_id2').val(cat_id);
            jQuery('#show_folder_ID').val(catP);
            jQuery('#show_folder_p_ID').val(pro_id);

            $('#msg').html('');
        }
        // for folder loading
        $(document).ready(function() {
            // load tree view
            function load_tree_view() {
                var project_ID = jQuery('#project_ID').val();
                // tree view
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , url: "{{ route('tree.view') }}"
                    , type: 'GET'
                    , data: {
                        project_ID: project_ID
                    }
                    , success: function(response) {
                        var html = response.html;
                        console.log(response.html);
                        $('#show_tree_view_data').html(html);
                    }
                    , error: function() {
                        alert('Failed to load tree view.');
                    }
                });
            }

            // current folder show
            function load_folder_table() {

                var pro_id = jQuery('#show_folder_p_ID').val();
                var parent_cat_id = jQuery('#show_folder_ID').val();

                var project_id2 = jQuery('#project_ID').val();
                var project_id2_string = project_id2.toString();
                var cat_id = 0;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , type: 'GET'
                    , url: "{{ route('show.folder_data') }}"
                    , data: {
                        pro_id: pro_id
                        , parent_cat_id: parent_cat_id
                    }
                }).done(function(response) {
                    var categories2 = response.results.categories2;
                    // convert to string this array
                    const cat_name = categories2.map(row => row.cat_name);
                    const string = cat_name.join(',');

                    var categories2 = response.results.categories2;
                    var back = response.results.back;
                    var html = '';
                    var html2 = '';
                    var html3 = '';
                    // for back folder
                    back.forEach(function(cat_data) {
                        // for folder back
                        html2 += `<button class="au-btn au-btn-icon au-btn--green au-btn--small" onclick="open_folder('${cat_data.parent_cat_id}')">
                            <i class="fa fa-arrow-circle-left"></i> Back
                          </button>`;
                        // for folder add
                        html3 += `<button  class="btn btn-success" style="margin-left: 180px;" onclick="add_folder_data('${pro_id}', '${cat_data.cat_id}',['${string}'])" data-toggle="modal" data-target="#add_folder_Modal">
                            <i class="fa fa-plus"></i> ADD
                          </button>`;
                    });
                    if (back < 1) {

                        html2 = ` <button onclick="add_folder_data('${project_id2_string}','${cat_id}',['${string}'])" class="btn btn-success" 
                        id="load_btn" style="margin-left: 174px;" data-toggle="modal"
                                    data-target="#add_folder_Modal">
                                    <i class="fa fa-plus"></i> ADD
                                </button>`;
                    }
                    //   for show folder data
                    categories2.forEach(function(categories2_data) {

                        html += `
                    <div class="header__navbar col col-md-6">
                        <ul class="list-unstyled">
                            <li id="db_click" class="has-sub">
                                <i class="zmdi zmdi-more"></i>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="login.html" data-toggle="modal" data-target="#folders_delete_modal" onclick="folder_delete_id('${categories2_data.cat_id}',['${string}'],'${project_id2_string}','${categories2_data.parent_cat_id}')">Delete</a>
                                    </li>
                                    <li>
                                        <a href="" data-toggle="modal" data-target="#update_folder_Modal"  onclick="update_folder_data('${categories2_data.cat_name}','${categories2_data.cat_id}',['${string}'],'${project_id2_string}','${categories2_data.parent_cat_id}')" >Rename</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                        <button onclick="open_folder('${categories2_data.cat_id}')">
                            <div class="col col-md-2">
                                <i class="fas fa-folder-open" style="font-size: 40px;"></i><br>
                                ${categories2_data.cat_name}
                            </div>
                        </button>
                    </div>
                `;
                    });
                    var active = response.results.active;

                    active.forEach(item => {
                        $('.t_' + item.cat_id).css({
                            'color': ''
                        });
                    });

                    var myDiv = $('.t_' + cat_id);
                    myDiv.css({
                        'color': 'red'
                    , });

                    $('#back').show();
                    // Set the HTML content to the desired element
                    $('#folder_table_data').html(html);
                    $('#back').html(html2);
                    $('#add_folder_table').html(html3);

                });
            }
            // add folder
            $('#add_folder_data_form').submit(function(e) {
                e.preventDefault();
                //   for checking old folder name in array
                var projectID2 = $('#folder_name_value').val();
                var array = $('#test').val();
                var id2 = array.split(',');
                if (id2.includes(projectID2)) {
                    $('.msg').html('');
                    $('.msg').append('This folder name already exists.');

                } else {
                    alert('folder created');
                    $.ajax({
                        type: 'post'
                        , url: "{{ route('add.folders') }}"
                        , data: $('#add_folder_data_form').serialize()
                    }).done(function(response) {
                        load_folder_table();
                        load_tree_view();
                        $('.modal').modal('hide');
                        $('#folder_name_value').val('');
                        $('.msg').html('');
                    });
                }
            });

            // update folder
            $('#update_folder_data_forms').submit(function(e) {
                //   for checking old folder name in array
                var projectID2 = $('#update_folder_name_value').val();
                var array = $('#test').val();
                var id2 = array.split(',');
                if (id2.includes(projectID2)) {
                    $('.msg').html('');
                    $('.msg').append('This folder name already exists.');

                } else {
                    e.preventDefault();
                    $.ajax({
                        type: "post"
                        , url: "{{ route('update.folder1') }}"
                        , data: $('#update_folder_data_forms').serialize()
                        , success: function(response) {
                            load_folder_table();
                            load_tree_view();
                            $('.modal').modal('hide');
                            $('#update_folder_name_value').val('');
                            $('.msg').html('');
                        }
                    });
                }
            });
            // folder send to trash
            $('#forder_trash_form').submit(function(e) {

                e.preventDefault();
                $.ajax({
                    type: "post"
                    , url: "{{ route('update.trash') }}"
                    , data: $('#forder_trash_form').serialize()
                    , success: function(response) {
                        console.log(response);
                        load_folder_table();
                        load_tree_view();
                        $('.modal').modal('hide');

                    }
                });

            });
        });
        // file table load
        $(document).ready(function() {
            function load_file_table() {
                var cat_id = jQuery('#folder_file_id').val();
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
                        var files = response.results.files;
                        var html = "";
                        files.forEach(fileData => {
                            html += `
                        <div class="header__navbar col col-md-6">
                            <ul class="list-unstyled">
                                <li id="db_click" class="has-sub">
                                    <i class="zmdi zmdi-more"></i>
                                    <ul class="header3-sub-list list-unstyled">
                                        <li>
                                            <a href="login.html" data-toggle="modal" data-target="#file_delete_modal" onclick="delete_file('${fileData.file_id}')">Delete</a>
                                        </li>
                                        <li>
                                            <a href="login.html" data-toggle="modal" data-target="#update_file_Modal" onclick="update_file('${fileData.file_name}','${fileData.file_id}')">Update File</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="col col-md-2"><i class="fas fa-copy" style="font-size: 40px;"></i><br>${fileData.file_name}</div>
                        </div>`;
                        });
                        $('#show_files').html(html);
                    }

                });
            }

            //add file
            $('#add_file_form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(jQuery('#add_file_form')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: "post"
                    , url: "{{ route('add.files') }}"
                    , data: formData
                    , contentType: false
                    , processData: false
                    , success: function(response) {
                        console.log(response);
                        load_file_table();
                        $('.modal').modal('hide');

                    }


                });
            });


            //update file
            $('#update_file_form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(jQuery('#update_file_form')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: "post"
                    , url: "{{ route('update.files') }}"
                    , data: formData
                    , contentType: false
                    , processData: false
                    , success: function(response) {
                        console.log(response);
                        load_file_table();
                        $('.modal').modal('hide');

                    }


                });
            });

            // file send to trash
            $('#file_trash_form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(jQuery('#file_trash_form')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: "post"
                    , url: "{{ route('trash.file') }}"
                    , data: formData
                    , contentType: false
                    , processData: false
                    , success: function(response) {
                        console.log(response);
                        load_file_table();
                        $('.modal').modal('hide');

                    }


                });
            });
            // delete multiple file 
            $('#selected_file_delete_form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(jQuery('#selected_file_delete_form')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: "post"
                    , url: "{{ route('delete_multiple.file') }}"
                    , data: formData
                    , contentType: false
                    , processData: false
                    , success: function(response) {
                        console.log(response);
                        load_file_table();
                        $('.modal').modal('hide');

                    }


                });
            });
        });
        // show file data
        function update_file(file_name, cat_id) {

            // jQuery('#update_file_name').val(file_name);
            jQuery('#file_update_cat_id').val(cat_id);
        }
        // delete file
        function delete_file(cat_id) {
            jQuery('#file_trash_id').val(cat_id);
        }

        // delete folder data
        function folder_delete_id(cat_id, test, pro_id, catP) {

            var id = jQuery('#test').val(test);
            jQuery('#show_folder_ID').val(catP);
            jQuery('#show_folder_p_ID').val(pro_id);
            jQuery('#folder_trash_cat_id').val(cat_id);
        }
        // delete trash folder data
        function delete_trash_folder() {
            var selected_project_Ids = []; // Create an empty array to store selected IDs
            var selected_folder_Ids = []; // Create an empty array to store selected IDs
            var selected_file_Ids = []; // Create an empty array to store selected IDs

            // Loop through each checked checkbox for folders
            jQuery('input[name^="checkbox_p_ids"]:checked').each(function() {
                selected_project_Ids.push(jQuery(this).val()); // Add the value of the checked checkbox to the array
            });
            var concatenated_project_Ids = selected_project_Ids.join(
                ','); // Concatenate array elements with a comma separator

            // Loop through each checked checkbox for folders
            jQuery('input[name^="checkbox_ids"]:checked').each(function() {
                selected_folder_Ids.push(jQuery(this).val()); // Add the value of the checked checkbox to the array
            });
            var concatenated_folder_Ids = selected_folder_Ids.join(
                ','); // Concatenate array elements with a comma separator

            // Loop through each checked checkbox for files
            jQuery('input[name^="checkbox_f_ids"]:checked').each(function() {
                selected_file_Ids.push(jQuery(this).val()); // Add the value of the checked checkbox to the array
            });
            var concatenated_file_Ids = selected_file_Ids.join(','); // Concatenate array elements with a comma separator


            jQuery('#folder_trash_ids').val(concatenated_folder_Ids);
            jQuery('#files_trash_ids').val(concatenated_file_Ids);
            jQuery('#project_trash_ids').val(concatenated_project_Ids);

        }

        // restore folder data
        function restore_folder_data() {
            const selected_project_Ids = [];
            const selected_folder_Ids = [];
            const selected_file_Ids = [];
            // loop for project retore
            $('input[name^="checkbox_p_ids"]:checked').each(function() {
                selected_project_Ids.push($(this).prop('value'));
            });
            const concatenated_project_Ids = selected_project_Ids.join(',');

            // loop for folder retore
            $('input[name^="checkbox_ids"]:checked').each(function() {
                selected_folder_Ids.push($(this).prop('value'));
            });
            const concatenated_folder_Ids = selected_folder_Ids.join(',');

            // loop for file retore
            $('input[name^="checkbox_f_ids"]:checked').each(function() {
                selected_file_Ids.push($(this).prop('value'));
            });
            const concatenated_file_Ids = selected_file_Ids.join(',');

            $('#restore_trash_project').val(concatenated_project_Ids);
            $('#restore_trash_folders').val(concatenated_folder_Ids);
            $('#restore_trash_file').val(concatenated_file_Ids);


            $("#restore_folder_form").submit();
        }

        // file delete checked box
        function select_file() {

            jQuery('.check').show();
        }

        function selected_file_delete() {
            var selected_file_Ids = []; // Create an empty array to store selected IDs

            // Loop through each checked checkbox for files
            jQuery('input[name^="checkbox_files_id"]:checked').each(function() {
                selected_file_Ids.push(jQuery(this).val()); // Add the value of the checked checkbox to the array
            });

            var concatenated_file_Ids = selected_file_Ids.join(','); // Concatenate array elements with a comma separator
            jQuery('#files_delete_ids').val(concatenated_file_Ids);

        }

    </script>
</body>

</html>
<!-- end document-->
