


<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/demo/favicon.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SUPPORT MEDICAL</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600|Roboto:400" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/material-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/monosocialiconsfont.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/feather.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/perfect-scrollbar.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="{{ url('public/js/modernizr.min.js') }}"></script>
</head>

<body class="body-bg-full profile-page" style="background-image: url({{ url('public/images/error-page.jpg') }})">
    <div id="wrapper" class="row wrapper">
        <div class="container-min-full-height d-flex justify-content-center align-items-center">
            <div class="login-center">
                <div class="navbar-header text-center">
                    <a href="index.html">
                        <img alt="" src="{{ url('public/images/logo.png') }}" style="width:200px">
                    </a>
                </div>
                <!-- /.navbar-header -->
                <form method="POST" action="{{ url('/login') }}">

                     {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="example-email" style="color:#6b717e">Email</label>
                        <input type="email" placeholder="email" class="form-control form-control-line" name="email" id="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="example-password" style="color:#6b717e">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="password" class="form-control form-control-line">
                       
                         @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-lg btn-color-scheme text-uppercase fs-12 fw-600" type="submit">Ingresar</button>
                    </div>
                    
                    <!--<div class="form-group no-gutters mb-0">
                        <div class="col-md-12 d-flex">
                            <a href="{{ url('/password/reset') }}" id="to-recover" class="my-auto pb-2 text-right" style="color:#6b717e"><i class="material-icons mr-2 fs-18">lock</i> Recuperar Clave</a>
                        </div>
                    </div>-->

                    <!-- /.form-group -->
                </form>
                <!-- /.form-material -->
               
              
            </div>
            <!-- /.login-center -->
        </div>
        <!-- /.d-flex -->
    </div>
    <!-- /.body-container -->
    <!-- Scripts -->
    <script type="text/javascript" src="{{ url('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/material-design.js') }}"></script>
</body>

</html>





                  
                  
