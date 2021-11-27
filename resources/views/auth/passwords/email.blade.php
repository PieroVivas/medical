<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/demo/favicon.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>American Tasaciones</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600|Roboto:400" rel="stylesheet" type="text/css">
    <link href="{{ url('css/material-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/monosocialiconsfont.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/feather.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/perfect-scrollbar.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="{{ url('js/modernizr.min.js') }}"></script>
</head>

<body class="body-bg-full profile-page" style="background-image: url({{ url('images/error-page.jpg') }})">
    <div id="wrapper" class="wrapper">
        <div class="row container-min-full-height align-items-center">
            <div class="col-10 ml-sm-auto col-sm-6 col-md-4 ml-md-auto login-center login-center-mini mx-auto">
                <div class="navbar-header text-center mb-3">
                    <a href="index.html">
                        <img alt="" src="{{ url('images/logo.png') }}" style="width:250px">
                    </a>
                </div>

                 @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <!-- /.navbar-header -->
                <form  method="POST" action="{{ url('/password/email') }}">

                     {{ csrf_field() }}


                    <p class="text-center text-muted">Ingrese su dirección de correo electrónico y le enviaremos un correo electrónico con instrucciones para restablecer su contraseña.</p>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} no-gutters">
                         <label for="example-email">Email</label>
                        <input type="email" placeholder="email" class="form-control form-control-line" name="email" id="email" value="{{ old('email') }}">
                      

                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif


                    </div>
                    <div class="form-group ">
                        <button class="btn btn-block btn-lg btn-color-scheme text-uppercase fs-12 fw-600" type="submit">Enviar</button>
                    </div>
                </form>
                <!-- /.form-material -->
                <footer class="col-sm-12 text-center">
                    <hr>
                    <p>Regresar al <a href="{{ url('login') }}" class="text-primary m-l-5"><b>Login</b></a>
                    </p>
                </footer>
            </div>
            <!-- /.login-right -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.body-container -->
    <!-- Scripts -->
    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/material-design.js') }}"></script>
</body>

</html>




