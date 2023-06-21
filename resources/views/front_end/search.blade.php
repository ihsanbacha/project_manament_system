@extends('front_end.layout');

@section('page_title','Search')
@section('search_select','active_menu')
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

    <!-- END WELCOME-->

    <!-- STATISTIC-->

    <!-- END STATISTIC-->

    <!-- STATISTIC CHART-->

    <!-- END STATISTIC CHART-->
    <section class="p-t-20">
        <div class="container">
            <h3 class="title-5 m-b-35">FOLDERS</h3>
            <div class="row">
                <div class="col col-md-10"></div>
                <div class="col col-md-2">
                    <button data-toggle="modal"
                        data-target="#confirm_Modal" class="au-btn
                        au-btn-icon
                        au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Add
                        Folder</button>
                </div>

            </div>
            <div class="row">
                <div class="header__navbar col col-md-2">

                    <ul class="list-unstyled">
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
                    <div class="col col-md-2"><i class="fas
                            fa-folder-open" style="font-size:
                            100px;"></i><br> FOLDER</div>
                </div>


            </div>
        </div>
    </section>
    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">FILES</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light
                                rs-select2--md">
                                <select class="js-select2"
                                    name="property">
                                    <option selected="selected">All
                                        Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light
                                rs-select2--sm">
                                <select class="js-select2"
                                    name="time">
                                    <option selected="selected">Today</option>
                                    <option value="">3 Days</option>
                                    <option value="">1 Week</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>
                        <div class="table-data__tool-right">
                            <button  class="au-btn au-btn-icon
                                au-btn--green au-btn--small"  data-toggle="modal"
                                data-target="#confirm_Modal">
                                <i class="zmdi zmdi-plus"></i>add
                                item</button>
                            <div class="rs-select2--dark
                                rs-select2--sm rs-select2--dark2">
                                <select class="js-select2"
                                    name="type">
                                    <option selected="selected">Export</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive
                        table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span
                                                class="au-checkmark"></span>
                                        </label>
                                    </th>
                                    <th>name</th>
                                    <th>date</th>
                                    <th>status</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product_data as $row)
                                <tr class="tr-shadow">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span
                                                class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{$row->project_name}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>
                                        <span
                                            class="status--process">{{$row->project_status}}</span>
                                    </td>
                                    <td>
                                      
                                    </td>
                                    <td class="desc"></td>
                                    
                                    
                                    <td></td>
                                    <td>
                                        <div
                                            class="table-data-feature">
                                            <button class="item"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Download">
                                                <i class="zmdi
                                                    zmdi-download"></i>
                                            </button>
                                            <button  data-toggle="modal"
                                            data-target="#confirm_Modal" class="item"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Edit">
                                                <i class="zmdi
                                                    zmdi-edit"></i>
                                            </button>
                                            <button  data-toggle="modal"
                                            data-target="#confirm_Modal" class="item"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Delete">
                                                <i class="zmdi
                                                    zmdi-delete"></i>
                                            </button>
                                          
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="spacer"></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

@endsection