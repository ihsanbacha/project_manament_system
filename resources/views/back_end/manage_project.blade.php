@extends('back_end.layout');
@section('page_title','Project form')
@section('project_select','active')
@section('container')
        <!-- END MENU SIDEBAR-->
         <div class="page-container">
 
            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <div class="container-fluid ">
                       <h1>MANAGE PROJECT</h1>
                       <div class="row m-t-30">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center"> PROJECT </div>
                                <div class="card-body">
                                    <form action="{{Route('project.save')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Project name</label>
                                            <input type="text" class="form-control" name="project_name" value="{{$project_name}}" id="">
                                            @error('project_name')
                                              <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                            <input type="hidden" class="form-control" name="project_id" value="{{$project_id}}" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea class="form-control" name="project_description" id="" cols="30" rows="10">
                                                 {{$project_description}}
                                            </textarea>
                                            @error('project_description')
                                              <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                          
                                            <label for="">Project status</label>
                                            <select class="form-control" name="project_status" id="">
                                                <option value="">SELECT STATUS</option>
                                               
                                               @if($project_status == 'completed')
                                               <option selected value="completed">Completed</option>
                                               <option  value="In progress">In progress</option>
                                               @else
                                               <option selected value="In progress">In progress</option>
                                               <option  value="completed">Completed</option>
                                               @endif
                                              
                                              
                                            </select>
                                        </div>
                                     

                                        <div class="form-group">
                                            <label for="">Project Image</label>
                                            <input type="file" class="form-control" name="project_image" value="{{$project_image}}" id="">
                                        </div>
                                     
                                        <div class="form-group">
                                            
                                            <input type="submit" name="submit" class="form-control btn btn-primary" id="">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                       </div>
                        <div class="row">
                            <div class="col-md-12">
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
                
         </div>

         @endsection  
