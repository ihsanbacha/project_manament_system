<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('page_title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{url('back_end/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('back_end/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{url('back_end/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/vector-map/jqvmap.min.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('back_end/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">

    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    {{-- <img src="{{url('back_end/images/icon/logo-white.png')}}" alt="Cool Admin" /> --}}
                   <h4 style="color: white" class="text text-center">PROJECT MANAGMENT <br>
                       Admin Panel
                   </h4>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{url('back_end/images/icon/avatar-big-01.jpg')}}" alt="John Doe" />
                    </div>
                    <h4 class="name">bacha</h4>
                    <a href="{{url('logout')}}">Sign out</a>
                </div>
                <!-- nave bar -->
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('user_select')">
                            <a class="js-arrow" href="{{url('user')}}">
                            <i class="fas fa-user"></i>Admin
                            </a>
                        </li>
                        <li class="@yield('employes_select')">
                            <a class="js-arrow" href="{{url('employes')}}">
                            <i class="fas fa-users"></i>Employes
                            </a>
                        </li>
                        <br>
                        <li class="@yield('project_select')">
                            <a class="js-arrow" href="{{url('project')}}">
                            <i class="fas fa-tachometer-alt"></i>Project
                            </a>
                        </li>
                        <li class="@yield('category_select')">
                            <a class="js-arrow" href="{{url('category')}}">
                            <i class="fas fa-folder"></i>Folders
                            </a>
                        </li>
                       
                    </ul>
                </nav>
                <!-- nave bar end  -->
               
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        @section('container')
        @show

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </header>
          
        </div>
    </div>

    

       <!-- Jquery JS-->
       <script src="{{url('back_end/vendor/jquery-3.2.1.min.js')}}"></script>
       <!-- Bootstrap JS-->
       <script src="{{url('back_end/vendor/bootstrap-4.1/popper.min.js')}}"></script>
       <script src="{{url('back_end/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
       <!-- Vendor JS       -->
       <script src="{{url('back_end/vendor/slick/slick.min.js')}}">
       </script>
       <script src="{{url('back_end/vendor/wow/wow.min.js')}}"></script>
       <script src="{{url('back_end/vendor/animsition/animsition.min.js')}}"></script>
       <script src="{{url('back_end/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
       </script>
       <script src="{{url('back_end/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
       <script src="{{url('back_end/vendor/counter-up/jquery.counterup.min.js')}}">
       </script>
       <script src="{{url('back_end/vendor/circle-progress/circle-progress.min.js')}}"></script>
       <script src="{{url('back_end/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
       <script src="{{url('back_end/vendor/chartjs/Chart.bundle.min.js')}}"></script>
       <script src="{{url('back_end/vendor/select2/select2.min.js')}}">
       </script>
       <script src="{{url('back_end/vendor/vector-map/jquery.vmap.js')}}"></script>
       <script src="{{url('back_end/vendor/vector-map/jquery.vmap.min.js')}}"></script>
       <script src="{{url('back_end/vendor/vector-map/jquery.vmap.sampledata.js')}}"></script>
       <script src="{{url('back_end/vendor/vector-map/jquery.vmap.world.js')}}"></script>
   
       <!-- Main JS-->
       <script src="{{url('back_end/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->