   <div class="container">
       <div class="login-wrap">
           <div style="background-color: greenyellow">
               <h3 class="text-center">FILES</h3>
           </div>
           <div class="login-content">
               <button class="btn btn-success" style="margin-left: 180px;">
                   <i class="fa fa-plus"></i> ADD</button>
               <br><br>
               <div class="login-form" style="height: 100%;">
                   <div class="row">
                       @foreach($categories2 as $categories2_data)
                       <div class="header__navbar col col-md-6">

                           <ul class="list-unstyled">
                               <li id="db_click" class="has-sub">

                                   <i class="zmdi zmdi-more"></i>

                                   <ul class="header3-sub-list
                                              list-unstyled">
                                       <li>
                                           <a href="login.html" data-toggle="modal" data-target="#confirm_Modal">Delete</a>
                                       </li>
                                       <li>
                                           <a href="login.html" data-toggle="modal" data-target="#confirm_Modal">Rename</a>
                                       </li>

                                   </ul>
                               </li>
                           </ul>
                           <div class="col col-md-2"><i class="fas
                                   fa-folder-open" style="font-size:
                                   40px;"></i><br>{{$categories2_data->cat_name}}</div>
                       </div>
                       @endforeach
                   </div>

               </div>
           </div>
       </div>
   </div>
