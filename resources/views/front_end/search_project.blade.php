@extends('front_end.layout');

@section('page_title','Project')
@section('project_front_select','active_menu')
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

    <!-- END STATISTIC CHART-->
 
    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">PROJECTS</h3><div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light
                            rs-select2--md">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_all_modal">
                               DELETE
                              </button>
                            </div>
                            <div>
                        <form action="" method="POST">
                            <div class="row" style="margin-left: 150px;">  
                                   <div class="col col-md-5"> FROM Date : &nbsp; <input  class="form-control" name="from_date" id="from_date" type="date">
                                    </div>
                                    <div class="col col-md-5"> &nbsp;Date To : <input  class="form-control" name="date_to" id="date_to" type="date"></div>
                                    <div class="col col-md-2"> &nbsp;<button class="btn btn-primary" type="button">Search</button></div>
                            </div>
                        </form>
                        </div>
                           
                        </div>
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon
                            au-btn--green au-btn--small" data-toggle="modal" data-target="#add_project_Modal">
                                <i class="zmdi zmdi-plus"></i>add
                                project</button>

                        </div>
                    </div>

                    <form action="{{route('delete.all')}}" method="POST">
                        @csrf
                        <!-- modal for varification -->
                        <div class="modal fade" id="delete_all_modal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">

                                    <div class="modal-body">

                                        <p style="color: red" class="text text-center">
                                            <input type="hidden" id="p_id" name="p_id">
                                            ARE YOU SURE TO DELETE THIS PROJECTs
                                        </p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        {{-- <button type="submit" class="btn btn-primary">Confirm</button> --}}
                                        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="yes delete">
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        

                        <div class="table-responsive
                        table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>
                                            #s.no
                                        </th>
                                        <th>name</th>
                                        <th>status</th>
                                        <th>date</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $value)
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                
                                                <input type="checkbox" name="" value="">
                                                
                                                <span
                                                    class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>{{$value->project_name}}</td>
                                    
                                       
                                        <td class="status--process">{{$value->project_status}}</td>
                                        <td>{{$value->created_at}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span
                                                class="status--process"></span>
                                       
                                            <div
                                                class="table-data-feature">
                                              
                                                <button  type="button" data-toggle="modal" data-target="#update_Modal" onclick= "update_project('` + (data.data[index]['project_id']) + `','` + (data.data[index]['project_name']) + `','` + (data.data[index]['project_description']) + `','` + (data.data[index]['project_status']) + `','` + (data.data[index]['project_image']) + `',)" class="item"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Edit">
                                                    <i class="zmdi
                                                    zmdi-edit"></i>
                                                    
                                                </button>
                                               
                                                <button type="button"  id="" value="` + (data.data[index]['project_id']) + `" class="item delete_project"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Delete">
                                                    <i class="zmdi
                                                    zmdi-delete"></i>
                                                    
                                                </button>
                                             
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </form>
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