<?php
$url= $_SERVER["REQUEST_URI"];
$paginar = explode("/", $url);
$pagina=$paginar[2];

if($pagina=="mapa")
{
    $menu_abierto="sidebar-collapse";
   
}else
{
    $menu_abierto="sidebar-expand";
    //$menu_abierto="sidebar-collapse";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/demo/favicon.png">
    <link rel="stylesheet" href="{{ url('public/css/pace.css') }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SUPPORT MEDICAL</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600|Roboto:400" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/material-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/monosocialiconsfont.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/feather.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/perfect-scrollbar.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ url('public/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/sweetalert2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/daterangepicker.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ url('public/css/style.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{ url('public/css/dropzone.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ url('public/css/dropzone.min.css') }}">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="{{ url('public/js/modernizr.min.js') }}"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="{{ url('public/js/pace.min.js') }}"></script>




</head>

<body class="header-dark sidebar-light <?php echo $menu_abierto; ?>">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <nav class="navbar">
            <!-- Logo Area -->
            <div class="navbar-header">
                <a href="{{ url('dashboard-administrador') }}" class="navbar-brand" style="background-color:white">
                  <img class="logo-expand" alt="" src="{{ url('public/images/logo.png') }}" style="width:100px">
                    <img class="logo-collapse" alt="" src="{{ url('public/images/logo.png') }}" style="width:150px">
                    <!-- <p>BonVue</p> -->
                </a>
            </div>

    
            <!-- /.navbar-header -->
            <!-- Left Menu & Sidebar Toggle -->
            <ul class="nav navbar-nav">
                <li class="sidebar-toggle"><a href="javascript:void(0)" class="ripple"><i class="feather feather-menu list-icon fs-20"></i></a>
                </li>
            </ul>
            <!-- /.navbar-left -->
            <!-- Search Form -->
           
          

           <!--<a href="{{ url('') }}" class="btn btn-primary dropdown-toggle ripple" style="border-radius:0px" >
                <img src="{{ url('public/images/icono_directora.png') }}" style="width:30px"> &nbsp;Rendimiento de Directoras
            </a>-->

            <div class="spacer"></div>
            <div class="btn-list dropdown d-none d-md-flex mr-4 mr-0-rtl ml-4-rtl">
        
           @if(@Auth::user()->hasRole('administrador') || @Auth::user()->hasRole('jefe de almacen'))
                <a href="{{ url('dashboard-administrador') }}" class="btn btn-primary dropdown-toggle ripple" >
                   <i class="list-icon feather feather-file"></i>  &nbsp; DASHBOARD
                </a>
            @endif
              

            </div>
       
            <!-- /.btn-list -->
            <!-- User Image with Dropdown -->
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown"><span class="avatar thumb-xs2"><img src="{{ url('public/images/user.png') }}" class="rounded-circle" alt=""> <i class="feather feather-chevron-down list-icon"></i></span></a>
                    <div
                    class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY">
                        <div class="card">
                           
                            <ul class="list-unstyled card-body">
                               
                                <li>
                                    <a href="{{ url('/logout') }}" > <i class="feather feather-power align-middle"></i>&nbsp; <span><span class="align-middle">Cerrar Sesión</span></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
    </div>
    </li>
    </ul>
    <!-- /.navbar-right -->
    <!-- 
    <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">
        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown"><i class="feather feather-hash list-icon"></i></a>
            <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
                <div class="card">
                    <header class="card-header d-flex align-items-center mb-0"><a href="javascript:void(0);"><i class="feather feather-bell color-color-scheme" aria-hidden="true"></i></a>  <span class="heading-font-family flex-1 text-center fw-400">Notificationes</span>  <a href="javascript:void(0);"><i class="feather feather-settings color-content"></i></a>
                    </header>
                    <ul class="card-body list-unstyled dropdown-list-group">
                        <li>test
                        </li>
                      
                    </ul>
                    
                </div>
              
            </div>
           
        </li>
       
        <li class="dropdown"><a href="#" class="dropdown-toggle ripple" data-toggle="dropdown"><i class="feather feather-settings list-icon"></i></a>
            <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
                <div class="card">
                    <header class="card-header d-flex justify-content-between mb-0"><a href="javascript:void(0);"><i class="feather feather-bell color-color-scheme" aria-hidden="true"></i></a>  <span class="heading-font-family flex-1 text-center fw-400">Notificationes</span>  <a href="javascript:void(0);"><i class="feather feather-settings color-content"></i></a>
                    </header>
                    <ul class="card-body list-unstyled dropdown-list-group">
                        <li>test</li>
                    </ul>
                </div>
              
            </div>
          
        </li>
       
        <li><a href="javascript:void(0);" class="right-sidebar-toggle active ripple ml-3 ml-0-rtl"><i class="feather feather-grid list-icon"></i></a>
        </li>
    </ul>
     -->
    </nav>
    <!-- /.navbar -->
    <div class="content-wrapper">
        <!-- SIDEBAR -->
        <aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
            <!-- User Details -->
            <div class="side-user">
                <div class="col-sm-12 text-center p-0 clearfix">
                    <div class="d-inline-block pos-relative mr-b-10">
                        <figure class="thumb-sm mr-b-0 user--online">
                            <img src="{{ url('public/images/user.png') }}" class="rounded-circle" alt="">
                        </figure><a href="#" class="text-muted side-user-link"><i class="feather feather-settings list-icon"></i></a>
                    </div>
                    <!-- /.d-inline-block -->
                    <div class="lh-14 mr-t-5"><a href="#" class="hide-menu mt-3 mb-0 side-user-heading fw-500">{{ auth()->user()->name }}</a>
                       
                    </div>
                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.side-user -->

            <?php
          
            $menu_activo_1="";
            $menu_activo_2="";
            $menu_activo_3="";
            $menu_activo_4="";
            $menu_activo_5="";
            $menu_activo_6="";
            $menu_activo_7="";

            if($pagina=="roles" || $pagina=="trabajadores"  )
            {
                $menu_activo_1="active";
            }
           
           if($pagina=="categorias" || $pagina=="medidas"  || $pagina=="marcas" || $pagina=="productos"  )
            {
                $menu_activo_2="active";
            }


            if($pagina=="tipos" || $pagina=="proveedores"  )
            {
                $menu_activo_3="active";
            }


            if($pagina=="clientes" )
            {
                $menu_activo_4="active";
            }


            if($pagina=="ingresos" )
            {
                $menu_activo_5="active";
            }


            if($pagina=="estados" || $pagina=="salidas" )
            {
                $menu_activo_6="active";
            }


            if($pagina=="indicador_cumplimiento" || $pagina=="indicador_empleado" )
            {
                $menu_activo_7="active";
            }

            ?>


            <!-- Sidebar Menu -->
            <nav class="sidebar-nav">
                <ul class="nav in side-menu">

                    @if(@Auth::user()->hasRole('administrador'))
                    <li class="current-page menu-item-has-children <?php echo $menu_activo_1; ?> ">
                        <a href="javascript:void(0);">
                            <i class="list-icon feather feather-command"></i> 
                            <span class="hide-menu">Mantenimiento</span>
                        </a>
                        <ul class="list-unstyled sub-menu">
                            <li>
                                <a href="{{ url('roles') }}">Roles </a>
                            </li>
                            <li>
                                <a href="{{ url('trabajadores') }}">Trabajadores</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    
                    @if(@Auth::user()->hasRole('administrador') || @Auth::user()->hasRole('jefe de almacen') || @Auth::user()->hasRole('almacenero'))
                    <li class="menu-item-has-children <?php echo $menu_activo_2; ?>"  >
                        <a href="javascript:void(0);">
                            <i class="list-icon feather feather-eye"></i> 
                            <span class="hide-menu">Productos</span>
                        </a>
                        <ul class="list-unstyled sub-menu">
                            <li>
                                <a href="{{ url('categorias') }}">Categorías</a>
                            </li>
                            <li>
                                <a href="{{ url('medidas') }}">Unidades de Medida</a>
                            </li>
                            <li>
                                <a href="{{ url('marcas') }}">Marcas</a>
                            </li>
                            <li>
                                <a href="{{ url('productos') }}"><b>Productos</b></a>
                            </li>
                        </ul>
                    </li>
                   
                    <li class="menu-item-has-children <?php echo $menu_activo_3; ?>">
                        <a href="javascript:void(0);">
                            <i class="list-icon feather feather-file"></i> <span class="hide-menu">Proveedores</span>
                        </a>
                        <ul class="list-unstyled sub-menu">
                            <li>
                                <a href="{{ url('tipos') }}">Tipos</a>
                            </li>
                            <li>
                                <a href="{{ url('proveedores') }}">Proveedores</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                     @if(@Auth::user()->hasRole('administrador') || @Auth::user()->hasRole('jefe de almacen'))
                    <li class="menu-item-has-children <?php echo $menu_activo_4; ?>">
                        <a href="javascript:void(0);">
                            <i class="list-icon feather feather-file"></i> <span class="hide-menu">Clientes</span>
                        </a>
                        <ul class="list-unstyled sub-menu">
                            <li>
                                <a href="{{ url('clientes') }}">Clientes</a>
                            </li>
                        </ul>
                    </li>
                    @endif


                    <li class="menu-item-has-children <?php echo $menu_activo_5; ?>">
                        <a href="javascript:void(0);">
                            <i class="list-icon feather feather-file"></i> <span class="hide-menu">Orden de Ingresos {{ auth()->user()->rol }}</span>
                        </a>
                        <ul class="list-unstyled sub-menu">
                            <li>
                                <a href="{{ url('entradas') }}">Ingresos</a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children <?php echo $menu_activo_6; ?>">
                        <a href="javascript:void(0);">
                            <i class="list-icon feather feather-file"></i> <span class="hide-menu">Orden de Salida</span>
                        </a>
                        <ul class="list-unstyled sub-menu">
                            <li>
                                <a href="{{ url('estados') }}">Estados</a>
                            </li>
                            <li>
                                <a href="{{ url('salidas') }}">Salidas</a>
                            </li>
                        </ul>
                    </li>

                       @if(@Auth::user()->hasRole('administrador') || @Auth::user()->hasRole('jefe de almacen'))
                     <li class="menu-item-has-children <?php echo $menu_activo_7; ?>">
                        <a href="javascript:void(0);">
                            <i class="list-icon feather feather-file"></i> <span class="hide-menu">Indicadores</span>
                        </a>
                        <ul class="list-unstyled sub-menu">
                            <li>
                                <a href="{{ url('indicador_cumplimiento/2020-01-01/2020-12-30') }}">Nivel de Despacho</a>
                            </li>
                            <li>
                                <a href="{{ url('indicador_empleado/2020-01-01/2020-12-30') }}">Despacho por Empleado</a>
                            </li>
                            <li>
                                <a href="{{ url('indicador_calidad/2020-01-01/2020-12-30') }}">Calidad de Pedidos</a>
                            </li>
                            <li>
                                <a href="{{ url('indicador_ingreso/2020-01-01/2020-12-30') }}">Tiempo de Ingreso</a>
                            </li>
                            <li>
                                <a href="{{ url('indicador_salida/2020-01-01/2020-12-30') }}">Tiempo de Salida</a>
                            </li>
                            <li>
                                <a href="{{ url('indicador_volumen/2020-01-01/2020-12-30') }}">Volumen de Compra</a>
                            </li>
                            <li>
                                <a href="{{ url('indicador_incidencia/2020-01-01/2020-12-30') }}">Tasa de Incidencias</a>
                            </li>
                        </ul>
                    </li>


                    
                    <li>
                        <a href="{{ url('inventario') }}">
                            <i class="list-icon feather feather-file"></i>Reporte Inventario
                        </a>
                    </li>

                     <li>
                        <a href="{{ url('reporte_producto/2020-01-01/2020-12-30/0') }}">
                            <i class="list-icon feather feather-file"></i>Reporte Producto
                        </a>
                    </li>

                     <li>
                        <a href="{{ url('reporte_categoria/2020-01-01/2020-12-30/0') }}">
                            <i class="list-icon feather feather-file"></i>Reporte Categoría
                        </a>
                    </li>
                    @endif

                 
                 
                  
                </ul>
                <!-- /.side-menu -->
            </nav>
            <!-- /.sidebar-nav -->
           
        </aside>
        <!-- /.site-sidebar -->


       <?php
       if($pagina=="mapa")
       {
       ?>
            <main class="main-wrapper clearfix" style="padding:0px">  
                @yield('content')
            </main>
       <?php 
       }else
       {
       ?>
            <main class="main-wrapper clearfix">  
                @yield('content')
            </main>
       <?php
       }
       ?>
        
        <!-- /.main-wrappper -->




       
        <!-- RIGHT SIDEBAR -->
        <aside class="right-sidebar scrollbar-enabled suppress-x">
            <div class="sidebar-chat" data-plugin="chat-sidebar">
                <div class="sidebar-chat-info">
                    <h6 class="fs-16">Información</h6>
                    
                </div>
               
            </div>
            <!-- /.sidebar-chat -->
        </aside>
       
    </div>
    <!-- /.content-wrapper -->
    <!-- FOOTER -->
    <footer class="footer"><span class="heading-font-family">Copyright @ 2020</span>
    </footer>
    </div>
    <!--/ #wrapper -->



    <!--Modal-->
    <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-body"></div>
                     <div class="modal-footer" style="padding:10px">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                      </div>
                </div>
          </div>
    </div>
    <!--/FIN Modal-->  




    <!-- Scripts -->
    <script src="{{ url('public/js/jquery.min.js') }}"></script>
      <script src="{{ url('public/js/ex-dropzone.min.js') }}"></script>
    <script src="{{ url('public/js/popper.min.js') }}"></script>
    <script src="{{ url('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('public/js/perfect-scrollbar.jquery.js') }}"></script>

    <script src="{{ url('public/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('public/js/jquery.toast.min.js') }}"></script>
    <script src="{{ url('public/js/sweetalert2.min.js') }}"></script>
    <script src="{{ url('public/js/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ url('public/js/daterangepicker.min.js') }}"></script>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/annotations.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script src="{{ url('public/js/theme.js') }}"></script>
    <script src="{{ url('public/js/custom.js') }}"></script>




     <script type="text/javascript">


         //MULTIPLES IMAGENES
      Dropzone.options.dpzRemoveThumb={paramName:"file", renameFile: function (file) {
        var extension = file.name.substring(file.name.lastIndexOf("."));
        var newName = new Date().getTime() + extension;
    return newName;
}, maxFilesize:1,addRemoveLinks:!0,dictRemoveFile:"Eliminar",acceptedFiles:"image/*",removedfile: function(file) {
    var name = file.upload.filename;        
    $.ajax({
        url: '{{ url('eliminar_imagen_dropzone') }}',
        method: "DELETE",
        data: {_token: '{{ csrf_token() }}', imagen:name}
    });

var _ref;
return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
              }}

    //FIN MULTIPLES IMAGENES


            function mayus(e) {
                e.value = e.value.toUpperCase();
            }

            
            function abrir_popup(link_popup)
            {

              agregar_popup(link_popup);
             // $('#popup').addClass('show');
            }


            function abrir_popup_interno()
            {   
                $('#modal_interno').addClass('show');   
            }


            function agregar_popup(link_popup) 
            {
                $('#popup .modal-body').html('<iframe src='+link_popup+' frameborder="0" scrolling="yes" id="myFrame" width="100%" height="450" ></iframe>');
            }


             $(".eliminar_trabajador").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_trabajador') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });





            
            $(".eliminar_categoria").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_categoria') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            }); 



            $(".eliminar_marca").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_marca') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            }); 


             $(".eliminar_medida").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_medida') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            }); 



              $(".eliminar_tipo").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_tipo') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            }); 



              $(".eliminar_proveedor").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_proveedor') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            }); 



        $(".eliminar_producto").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_producto') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            }); 



        $(".eliminar_cliente").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_cliente') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            }); 




            $(".guardar_entrada").click(function (e) {
                e.preventDefault();

             var numero = document.agregar_entrada.elements['numero'];
             var proveedor = document.agregar_entrada.elements['proveedor'];
             var fecha = document.agregar_entrada.elements['fecha'];
     
              if(numero.value == "")
              {
                    alert("Ingrese N° de Documento");
                    numero.focus();
                    return false;
              }

              if(proveedor.value == "")
              {
                    alert("Seleccione Proveedor");
                    proveedor.focus();
                    return false;
              }

              if(fecha.value == "")
              {
                    alert("Ingrese Fecha");
                    fecha.focus();
                    return false;
              }

           

              
               $.ajax({
                   url: '{{ url('agregar_entrada') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_entrada")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                         window.location.assign("{{ url('entradas') }}/"+data+"/edit");
                   }
                });

             });



               $(".actualizar_entrada").click(function (e) {
                e.preventDefault();

             var numero = document.actualizar_entrada.elements['numero'];
             var proveedor = document.actualizar_entrada.elements['proveedor'];
             var fecha = document.actualizar_entrada.elements['fecha'];
     
              if(numero.value == "")
              {
                    alert("Ingrese N° de Documento");
                    numero.focus();
                    return false;
              }

              if(proveedor.value == "")
              {
                    alert("Seleccione Proveedor");
                    proveedor.focus();
                    return false;
              }

              if(fecha.value == "")
              {
                    alert("Ingrese Fecha");
                    fecha.focus();
                    return false;
              }


               $.ajax({
                   url: '{{ url('editar_entrada') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_entrada")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });




              $(".eliminar_entrada").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_entrada') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), cantidad: ele.attr("data-cantidad")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });


               $(".eliminar_detalle_entrada").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_detalle_entrada') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), id_producto: ele.attr("data-role"), cantidad: ele.attr("data-cantidad")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });




                 $(".eliminar_estado").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_estado') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), cantidad: ele.attr("data-cantidad")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });




              $(".guardar_salida").click(function (e) {
                e.preventDefault();

             var numero = document.agregar_salida.elements['numero'];
             var cliente = document.agregar_salida.elements['cliente'];
             var fecha = document.agregar_salida.elements['fecha'];
     
              if(numero.value == "")
              {
                    alert("Ingrese N° de Documento");
                    numero.focus();
                    return false;
              }

              if(cliente.value == "")
              {
                    alert("Seleccione Cliente");
                    cliente.focus();
                    return false;
              }

              if(fecha.value == "")
              {
                    alert("Ingrese Fecha");
                    fecha.focus();
                    return false;
              }

           

              
               $.ajax({
                   url: '{{ url('agregar_salida') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_salida")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                         window.location.assign("{{ url('salidas') }}/"+data+"/edit");
                   }
                });

             });



            $(".eliminar_salida").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_salida') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), cantidad: ele.attr("data-cantidad")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });




             $(".actualizar_salida").click(function (e) {
                e.preventDefault();

             var numero = document.actualizar_salida.elements['numero'];
             var cliente = document.actualizar_salida.elements['cliente'];
             var fecha = document.actualizar_salida.elements['fecha'];
             var estado = document.actualizar_salida.elements['estado'];
     
              if(numero.value == "")
              {
                    alert("Ingrese N° de Documento");
                    numero.focus();
                    return false;
              }

              if(cliente.value == "")
              {
                    alert("Seleccione Cliente");
                    cliente.focus();
                    return false;
              }

              if(estado.value == "")
              {
                    alert("Seleccione Estado");
                    estado.focus();
                    return false;
              }

              if(fecha.value == "")
              {
                    alert("Ingrese Fecha");
                    fecha.focus();
                    return false;
              }


               $.ajax({
                   url: '{{ url('editar_salida') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_salida")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });



                $(".eliminar_detalle_salida").click(function (e) {
                e.preventDefault();
     
                var ele = $(this);
     
                if(confirm("Desea Eliminar")) {
                    $.ajax({
                        url: '{{ url('eliminar_detalle_salida') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), id_producto: ele.attr("data-producto") , id_entrada: ele.attr("data-entrada"), cantidad: ele.attr("data-cantidad")}, 
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });


                
          $(".reporte_cumplimiento").click(function (e) {
                e.preventDefault();

             var fecha_inicial = document.reporte_cumplimiento.elements['fecha_inicial'];
             var fecha_final = document.reporte_cumplimiento.elements['fecha_final'];
     
              if(fecha_inicial.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    fecha_inicial.focus();
                    return false;
              }

              if(fecha_final.value == "")
              {
                     alert("Ingrese Fecha Final");
                    fecha_final.focus();
                    return false;
              }

              window.location.assign("{{ url('indicador_cumplimiento') }}/"+fecha_inicial.value+"/"+fecha_final.value);
                   
         
         });


          $(".anio_consultar").click(function (e) {
                e.preventDefault();

             var anioconsulta = document.anio_consultar.elements['anioconsulta'];
     
              if(anioconsulta.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    anioconsulta.focus();
                    return false;
                }
              
              window.location.assign("{{ url('dashboard-administrador') }}/"+anioconsulta.value);
                   
         
         });





          $(".reporte_calidad").click(function (e) {
                e.preventDefault();

             var fecha_inicial = document.reporte_calidad.elements['fecha_inicial'];
             var fecha_final = document.reporte_calidad.elements['fecha_final'];
     
              if(fecha_inicial.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    fecha_inicial.focus();
                    return false;
              }

              if(fecha_final.value == "")
              {
                     alert("Ingrese Fecha Final");
                    fecha_final.focus();
                    return false;
              }

              window.location.assign("{{ url('indicador_calidad') }}/"+fecha_inicial.value+"/"+fecha_final.value);
                   
         
         });




          $(".reporte_ingreso").click(function (e) {
                e.preventDefault();

             var fecha_inicial = document.reporte_ingreso.elements['fecha_inicial'];
             var fecha_final = document.reporte_ingreso.elements['fecha_final'];
     
              if(fecha_inicial.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    fecha_inicial.focus();
                    return false;
              }

              if(fecha_final.value == "")
              {
                     alert("Ingrese Fecha Final");
                    fecha_final.focus();
                    return false;
              }

              window.location.assign("{{ url('indicador_ingreso') }}/"+fecha_inicial.value+"/"+fecha_final.value);
                   
         
         });




          $(".reporte_salida").click(function (e) {
                e.preventDefault();

             var fecha_inicial = document.reporte_salida.elements['fecha_inicial'];
             var fecha_final = document.reporte_salida.elements['fecha_final'];
     
              if(fecha_inicial.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    fecha_inicial.focus();
                    return false;
              }

              if(fecha_final.value == "")
              {
                     alert("Ingrese Fecha Final");
                    fecha_final.focus();
                    return false;
              }

              window.location.assign("{{ url('indicador_salida') }}/"+fecha_inicial.value+"/"+fecha_final.value);
                   
         
         });





           $(".reporte_volumen").click(function (e) {
                e.preventDefault();

             var fecha_inicial = document.reporte_volumen.elements['fecha_inicial'];
             var fecha_final = document.reporte_volumen.elements['fecha_final'];
     
              if(fecha_inicial.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    fecha_inicial.focus();
                    return false;
              }

              if(fecha_final.value == "")
              {
                     alert("Ingrese Fecha Final");
                    fecha_final.focus();
                    return false;
              }

              window.location.assign("{{ url('indicador_volumen') }}/"+fecha_inicial.value+"/"+fecha_final.value);
                   
         
         });





        $(".reporte_incidencia").click(function (e) {
                e.preventDefault();

             var fecha_inicial = document.reporte_incidencia.elements['fecha_inicial'];
             var fecha_final = document.reporte_incidencia.elements['fecha_final'];
     
              if(fecha_inicial.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    fecha_inicial.focus();
                    return false;
              }

              if(fecha_final.value == "")
              {
                     alert("Ingrese Fecha Final");
                    fecha_final.focus();
                    return false;
              }

              window.location.assign("{{ url('indicador_incidencia') }}/"+fecha_inicial.value+"/"+fecha_final.value);
                   
         });



        $(".reporte_producto").click(function (e) {
                e.preventDefault();

             var fecha_inicial = document.reporte_producto.elements['fecha_inicial'];
             var fecha_final = document.reporte_producto.elements['fecha_final'];
             var producto = document.reporte_producto.elements['producto'];
     
              if(fecha_inicial.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    fecha_inicial.focus();
                    return false;
              }

              if(fecha_final.value == "")
              {
                     alert("Ingrese Fecha Final");
                    fecha_final.focus();
                    return false;
              }

              window.location.assign("{{ url('reporte_producto') }}/"+fecha_inicial.value+"/"+fecha_final.value+"/"+producto.value);
                   
         });




        $(".exportar_producto").click(function (e) {
                e.preventDefault();

             var fecha_inicial = document.reporte_producto.elements['fecha_inicial'];
             var fecha_final = document.reporte_producto.elements['fecha_final'];
             var producto = document.reporte_producto.elements['producto'];
     
              if(fecha_inicial.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    fecha_inicial.focus();
                    return false;
              }

              if(fecha_final.value == "")
              {
                     alert("Ingrese Fecha Final");
                    fecha_final.focus();
                    return false;
              }

              window.location.assign("{{ url('exportar_producto.php?fecha_inicial=') }}"+fecha_inicial.value+"&fecha_final="+fecha_final.value+"&id_producto="+producto.value);
                   
         });



        $(".reporte_categoria").click(function (e) {
                e.preventDefault();

             var fecha_inicial = document.reporte_categoria.elements['fecha_inicial'];
             var fecha_final = document.reporte_categoria.elements['fecha_final'];
             var categoria = document.reporte_categoria.elements['categoria'];
     
              if(fecha_inicial.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    fecha_inicial.focus();
                    return false;
              }

              if(fecha_final.value == "")
              {
                     alert("Ingrese Fecha Final");
                    fecha_final.focus();
                    return false;
              }

              window.location.assign("{{ url('reporte_categoria') }}/"+fecha_inicial.value+"/"+fecha_final.value+"/"+categoria.value);
                   
         });



        $(".exportar_categoria").click(function (e) {
                e.preventDefault();

             var fecha_inicial = document.reporte_categoria.elements['fecha_inicial'];
             var fecha_final = document.reporte_categoria.elements['fecha_final'];
             var categoria = document.reporte_categoria.elements['categoria'];
     
              if(fecha_inicial.value == "")
              {
                    alert("Ingrese Fecha Inicial");
                    fecha_inicial.focus();
                    return false;
              }

              if(fecha_final.value == "")
              {
                     alert("Ingrese Fecha Final");
                    fecha_final.focus();
                    return false;
              }

              window.location.assign("{{ url('exportar_categoria.php?fecha_inicial=') }}"+fecha_inicial.value+"&fecha_final="+fecha_final.value+"&id_categoria="+categoria.value);
                   
         });



       


           
    </script>


</body>

</html>