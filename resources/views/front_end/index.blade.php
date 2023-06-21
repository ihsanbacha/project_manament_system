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
    <title>LOGIN</title>

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
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                           <h1> EMPLOYE LOGIN </h1>
                        </div>
                        <div class="login-form">
                            <form action="{{Route('employe.login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                              
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                <div class="social-login-content">
                        
                                </div>
                            </form>
                            <div class="register-link">
                               

                            @if(session('msg'))
                                <div class="alert alert-danger">
                                  {{session('msg')}}
                                </div>
                            
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
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