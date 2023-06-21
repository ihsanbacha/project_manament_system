@extends('back_end.layout');

@section('page_title','Project')
@section('project_select','active')
@section('container')
    <div class="page-container">

        <div class="main-content">
            <div class="section__content section__content--p30">

                <button class="btn btn-primary float-right mr-4 "><a href="{{ url('manage_project') }}">
                        <h3>Add New Project</h3>
                    </a></button>
                <div class="container-fluid">
                    <h1> Project </h1>

                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                @if(session('msg'))      
                               <div class="alert alert-success">{{session('msg')}}</div>  
                                @endif
                                <table class="content-table table table-borderless table-data3 table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project name</th>
                                            <th>Description</th>
                                            <th>status</th>
                                            <th>delete</th>
                                            <th>update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $c = 1;
                                        @endphp
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $c++ }}</td>
                                                <td>{{ $row->project_name }}</td>
                                                <td>  {{substr($row->project_description, 1, 100,) }} &nbsp; ...........</td>
                                               
                                                @if ($row->project_switch == 1)
                                                    <td><a href="project_status/0/{{ $row->project_id }}"
                                                            class="btn btn-success">active</a></td>
                                                @elseif($row->project_switch == 0)
                                                    <td><a href="project_status/1/{{ $row->project_id }}"
                                                            class="btn btn-warning">Deactive</a></td>
                                                @endif

                                                <td><a href="delete_project/{{ $row->project_id }}"
                                                        class="btn btn-danger">delete</a></td>
                                                <td><a href="manage_project/{{ $row->project_id }}"
                                                        class="btn btn-primary">update</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
