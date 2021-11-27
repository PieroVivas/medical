
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/demo/favicon.png">
    <link rel="stylesheet" href="{{ url('css/pace.css') }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LOGO</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600|Roboto:400" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/material-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/monosocialiconsfont.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/feather.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/perfect-scrollbar.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/dropzone.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="{{ url('public/js/modernizr.min.js') }}"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="{{ url('public/js/pace.min.js') }}"></script>
</head>


<body class="header-dark sidebar-light sidebar-expand">
    <div id="wrapper" class="wrapper">
        <div class="content-wrapper">
        	<main class="main-wrapper clearfix" style="padding:10px">
        	@yield('content')
        	</main>
        <!-- /.main-wrappper -->
        </div>
    </div>
    <!--/ #wrapper -->



    <!-- Scripts -->
    <script src="{{ url('public/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/js/popper.min.js') }}"></script>
    <script src="{{ url('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('public/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ url('public/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('public/js/dropzone.min.js') }}"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/annotations.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    
    <script src="{{ url('public/js/theme.js') }}"></script>
    <script src="{{ url('public/js/custom.js') }}"></script>


   <script type="text/javascript">
        
            function mayus(e) {
                e.value = e.value.toUpperCase();
            }

           


          $(".guardar_trabajador").click(function (e) {
                e.preventDefault();

             var nombres = document.agregar_trabajador.elements['nombres'];
             var dni = document.agregar_trabajador.elements['dni'];
             var direccion = document.agregar_trabajador.elements['direccion'];
             var email = document.agregar_trabajador.elements['email'];
            var rol = document.agregar_trabajador.elements['rol'];
             var clave = document.agregar_trabajador.elements['clave'];
     
              if(nombres.value == "")
              {
                    alert("Ingrese Nombres");
                    nombres.focus();
                    return false;
              }

              if(dni.value == "")
              {
                    alert("Ingrese DNI");
                    dni.focus();
                    return false;
              }

              if(direccion.value == "")
              {
                    alert("Ingrese Dirección");
                    direccion.focus();
                    return false;
              }


            

              if(rol.value == "")
              {
                    alert("Seleccione Rol de Personal");
                    rol.focus();
                    return false;
              }

              if(email.value == "")
              {
                    alert("Ingrese Email");
                    email.focus();
                    return false;
              }

              if(clave.value == "")
              {
                    alert("Ingrese Clave");
                    clave.focus();
                    return false;
              }
              
               $.ajax({
                   url: '{{ url('agregar_trabajador') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_trabajador")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                       window.parent.location.reload();
                   }
                });

             });



          $(".actualizar_trabajador").click(function (e) {
                e.preventDefault();

              var nombres = document.actualizar_trabajador.elements['nombres'];
             var dni = document.actualizar_trabajador.elements['dni'];
             var direccion = document.actualizar_trabajador.elements['direccion'];
             var email = document.actualizar_trabajador.elements['email'];
           
             var rol = document.actualizar_trabajador.elements['rol'];
             var clave = document.actualizar_trabajador.elements['clave'];
     
              if(nombres.value == "")
              {
                    alert("Ingrese Nombres");
                    nombres.focus();
                    return false;
              }

              if(dni.value == "")
              {
                    alert("Ingrese DNI");
                    dni.focus();
                    return false;
              }

              if(direccion.value == "")
              {
                    alert("Ingrese Dirección");
                    direccion.focus();
                    return false;
              }


            

              if(rol.value == "")
              {
                    alert("Seleccione Rol de Personal");
                    rol.focus();
                    return false;
              }

              if(email.value == "")
              {
                    alert("Ingrese Email");
                    email.focus();
                    return false;
              }

            

             
             

               $.ajax({
                   url: '{{ url('editar_trabajador') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_trabajador")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });










          $(".guardar_categoria").click(function (e) {
                e.preventDefault();

             var categoria = document.agregar_categoria.elements['categoria'];
     
              if(categoria.value == "")
              {
                    alert("Ingrese Título de la Categoría");
                    categoria.focus();
                    return false;
              }

           
              
               $.ajax({
                   url: '{{ url('agregar_categoria') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_categoria")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                       window.parent.location.reload();
                   }
                });

             });



         $(".actualizar_categoria").click(function (e) {
                e.preventDefault();

               var categoria = document.actualizar_categoria.elements['categoria'];
     
              if(categoria.value == "")
              {
                    alert("Ingrese Título de la Categoría");
                    categoria.focus();
                    return false;
              }

               $.ajax({
                   url: '{{ url('editar_categoria') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_categoria")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });





         $(".guardar_marca").click(function (e) {
                e.preventDefault();

             var marca = document.agregar_marca.elements['marca'];
     
              if(marca.value == "")
              {
                    alert("Ingrese Título de la Marca");
                    marca.focus();
                    return false;
              }

           
              
               $.ajax({
                   url: '{{ url('agregar_marca') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_marca")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                       window.parent.location.reload();
                   }
                });

             });



         $(".actualizar_marca").click(function (e) {
                e.preventDefault();

               var marca = document.actualizar_marca.elements['marca'];
     
              if(marca.value == "")
              {
                    alert("Ingrese Título de la Marca");
                    marca.focus();
                    return false;
              }

               $.ajax({
                   url: '{{ url('editar_marca') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_marca")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });




         $(".guardar_medida").click(function (e) {
                e.preventDefault();

             var medida = document.agregar_medida.elements['medida'];
     
              if(medida.value == "")
              {
                    alert("Ingrese Título de Unidad de Medida");
                    medida.focus();
                    return false;
              }

           
              
               $.ajax({
                   url: '{{ url('agregar_medida') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_medida")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                       window.parent.location.reload();
                   }
                });

             });



         $(".actualizar_medida").click(function (e) {
                e.preventDefault();

                var medida = document.actualizar_medida.elements['medida'];
     
              if(medida.value == "")
              {
                    alert("Ingrese Título de Unidad de Medida");
                    medida.focus();
                    return false;
              }

               $.ajax({
                   url: '{{ url('editar_medida') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_medida")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });







          $(".guardar_tipo").click(function (e) {
                e.preventDefault();

             var tipo = document.agregar_tipo.elements['tipo'];
     
              if(tipo.value == "")
              {
                    alert("Ingrese Tipo de Proveedor");
                    tipo.focus();
                    return false;
              }

           
              
               $.ajax({
                   url: '{{ url('agregar_tipo') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_tipo")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                       window.parent.location.reload();  
                   }
                });

             });



          $(".actualizar_tipo").click(function (e) {
                e.preventDefault();

              var tipo = document.actualizar_tipo.elements['tipo'];
     
              if(tipo.value == "")
              {
                    alert("Ingrese Tipo de Proveedor");
                    tipo.focus();
                    return false;
              }

               $.ajax({
                   url: '{{ url('editar_tipo') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_tipo")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });




          $(".guardar_proveedor").click(function (e) {
                e.preventDefault();

             var ruc = document.agregar_proveedor.elements['ruc'];
             var razon = document.agregar_proveedor.elements['razon'];
             var direccion = document.agregar_proveedor.elements['direccion'];
             var tipo = document.agregar_proveedor.elements['tipo'];

     
              if(ruc.value == "")
              {
                    alert("Ingrese RUC del Proveedor");
                    ruc.focus();
                    return false;
              }


              if(razon.value == "")
              {
                    alert("Ingrese Razón Social del Proveedor");
                    razon.focus();
                    return false;
              }

              if(direccion.value == "")
              {
                    alert("Ingrese Dirección del Proveedor");
                    direccion.focus();
                    return false;
              }


              if(tipo.value == "")
              {
                    alert("Seleccione Tipo del Proveedor");
                    tipo.focus();
                    return false;
              }

           
              
               $.ajax({
                   url: '{{ url('agregar_proveedor') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_proveedor")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                       window.parent.location.reload();  
                   }
                });

             });



          $(".actualizar_proveedor").click(function (e) {
                e.preventDefault();

              var ruc = document.actualizar_proveedor.elements['ruc'];
             var razon = document.actualizar_proveedor.elements['razon'];
             var direccion = document.actualizar_proveedor.elements['direccion'];
             var tipo = document.actualizar_proveedor.elements['tipo'];

     
              if(ruc.value == "")
              {
                    alert("Ingrese RUC del Proveedor");
                    ruc.focus();
                    return false;
              }


              if(razon.value == "")
              {
                    alert("Ingrese Razón Social del Proveedor");
                    razon.focus();
                    return false;
              }

              if(direccion.value == "")
              {
                    alert("Ingrese Dirección del Proveedor");
                    direccion.focus();
                    return false;
              }


              if(tipo.value == "")
              {
                    alert("Seleccione Tipo del Proveedor");
                    tipo.focus();
                    return false;
              }
              
               $.ajax({
                   url: '{{ url('editar_proveedor') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_proveedor")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });



          
          $(".guardar_producto").click(function (e) {
                e.preventDefault();

             var titulo = document.agregar_producto.elements['titulo'];
             var detalle = document.agregar_producto.elements['detalle'];
             var categoria = document.agregar_producto.elements['categoria'];
             var marca = document.agregar_producto.elements['marca'];
             var medida = document.agregar_producto.elements['medida'];

     
              if(titulo.value == "")
              {
                    alert("Ingrese Título del producto");
                    titulo.focus();
                    return false;
              }


              if(detalle.value == "")
              {
                    alert("Ingrese Detalle del producto");
                    detalle.focus();
                    return false;
              }

              if(categoria.value == "")
              {
                    alert("Seleccione Categoría del Producto");
                    categoria.focus();
                    return false;
              }


              if(marca.value == "")
              {
                    alert("Seleccione Marca del Producto");
                    marca.focus();
                    return false;
              }


              if(medida.value == "")
              {
                    alert("Seleccione Medida del Producto");
                    medida.focus();
                    return false;
              }

           
              
               $.ajax({
                   url: '{{ url('agregar_producto') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_producto")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                       window.parent.location.reload();  
                   }
                });

             });


          
          $(".actualizar_producto").click(function (e) {
                e.preventDefault();

             var titulo = document.actualizar_producto.elements['titulo'];
             var detalle = document.actualizar_producto.elements['detalle'];
             var categoria = document.actualizar_producto.elements['categoria'];
             var marca = document.actualizar_producto.elements['marca'];
             var medida = document.actualizar_producto.elements['medida'];

     
              if(titulo.value == "")
              {
                    alert("Ingrese Título del producto");
                    titulo.focus();
                    return false;
              }


              if(detalle.value == "")
              {
                    alert("Ingrese Detalle del producto");
                    detalle.focus();
                    return false;
              }

              if(categoria.value == "")
              {
                    alert("Seleccione Categoría del Producto");
                    categoria.focus();
                    return false;
              }


              if(marca.value == "")
              {
                    alert("Seleccione Marca del Producto");
                    marca.focus();
                    return false;
              }


              if(medida.value == "")
              {
                    alert("Seleccione Medida del Producto");
                    medida.focus();
                    return false;
              }
              
               $.ajax({
                   url: '{{ url('editar_producto') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_producto")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });





          $(".guardar_cliente").click(function (e) {
                e.preventDefault();

             var nombres = document.agregar_cliente.elements['nombres'];
             var apellidos = document.agregar_cliente.elements['apellidos'];
             var direccion = document.agregar_cliente.elements['direccion'];
             var dni = document.agregar_cliente.elements['dni'];
             var telefono = document.agregar_cliente.elements['telefono'];

     
              if(nombres.value == "")
              {
                    alert("Ingrese Nombres");
                    nombres.focus();
                    return false;
              }


              if(apellidos.value == "")
              {
                    alert("Ingrese Apellidos");
                    apellidos.focus();
                    return false;
              }

              if(dni.value == "")
              {
                    alert("Ingrese DNI");
                    dni.focus();
                    return false;
              }

              if(direccion.value == "")
              {
                    alert("Ingrese Dirección");
                    direccion.focus();
                    return false;
              }


              

           
              
               $.ajax({
                   url: '{{ url('agregar_cliente') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_cliente")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                       window.parent.location.reload();  
                   }
                });

             });



          $(".actualizar_cliente").click(function (e) {
                e.preventDefault();

              var nombres = document.actualizar_cliente.elements['nombres'];
             var apellidos = document.actualizar_cliente.elements['apellidos'];
             var direccion = document.actualizar_cliente.elements['direccion'];
             var dni = document.actualizar_cliente.elements['dni'];
             var telefono = document.actualizar_cliente.elements['telefono'];

     
              if(nombres.value == "")
              {
                    alert("Ingrese Nombres");
                    nombres.focus();
                    return false;
              }


              if(apellidos.value == "")
              {
                    alert("Ingrese Apellidos");
                    apellidos.focus();
                    return false;
              }

              if(dni.value == "")
              {
                    alert("Ingrese DNI");
                    dni.focus();
                    return false;
              }

              if(direccion.value == "")
              {
                    alert("Ingrese Dirección");
                    direccion.focus();
                    return false;
              }

              
               $.ajax({
                   url: '{{ url('editar_cliente') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_cliente")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });


           $(".agregar_detalle_entrada").click(function (e) {
                e.preventDefault();

              var cantidad = document.agregar_detalle_entrada.elements['cantidad'];
              var precio_compra = document.agregar_detalle_entrada.elements['precio_compra'];
              var precio_venta = document.agregar_detalle_entrada.elements['precio_venta'];
              var fecha_vencimiento = document.agregar_detalle_entrada.elements['fecha_vencimiento'];
     
              if(cantidad.value == "")
              {
                    alert("Ingrese Cantidad");
                    cantidad.focus();
                    return false;
              }

             

              if(precio_venta.value == "")
              {
                    alert("Ingrese Precio de Venta");
                    precio_venta.focus();
                    return false;
              }


              if(precio_compra.value == "")
              {
                    alert("Ingrese Precio de Compra");
                    precio_compra.focus();
                    return false;
              }


         


               $.ajax({
                   url: '{{ url('agregar_detalle_entrada') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_detalle_entrada")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                        //guardarAuditoria();
                       console.log("shit - charles was here");
                       window.parent.location.reload();  
                   }
                });

         });

      //    function guardarAuditoria(){
      //                   console.log("Entrando a auditoria");
      //                   $.ajax({
      //                   url: '{{ url('auditoria') }}',
      //                   method: "POST",
      //                   /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
      //                   data: new FormData(document.getElementById("box_auditoria")),
      //                   cache: false,
      //                   contentType: false,
      //                   processData: false,
      //                   success: function(data)
      //                   {
      //                         console.log("auditoria correct");
      //                         window.parent.location.reload();  
      //                   },
      //                   error: function(e){
      //                         console.log(e);
      //                   }
      //                   });
      //    }




            $(".guardar_estado").click(function (e) {
                e.preventDefault();

             var estado = document.agregar_estado.elements['estado'];
     
              if(estado.value == "")
              {
                    alert("Ingrese Estado");
                    estado.focus();
                    return false;
              }

              
               $.ajax({
                   url: '{{ url('agregar_estado') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}', nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_estado")),
                   cache: false,
                   contentType: false,
                   processData: false,
                  success: function(data)
                   {  
                       window.parent.location.reload();
                   }
                });

             });



            $(".actualizar_estado").click(function (e) {
                e.preventDefault();

                var estado = document.actualizar_estado.elements['estado'];
     
              if(estado.value == "")
              {
                    alert("Ingrese Estado");
                    estado.focus();
                    return false;
              }

               $.ajax({
                   url: '{{ url('editar_estado') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("actualizar_estado")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });




            
          $(".agregar_detalle_salida").click(function (e) {
                e.preventDefault();

              var cantidad = document.agregar_detalle_salida.elements['cantidad'];
              var stock = document.agregar_detalle_salida.elements['stock'];
     
              if(cantidad.value == "")
              {
                    alert("Ingrese Cantidad");
                    cantidad.focus();
                    return false;
              }

              if(parseInt(cantidad.value) > parseInt(stock.value))
              {
                    alert("Ingrese una cantidad menor al Stock");
                    cantidad.focus();
                    return false;
              }



               $.ajax({
                   url: '{{ url('agregar_detalle_salida') }}',
                   method: "post",
                  /* data: {_token: '{{ csrf_token() }}',id:id.value , nombre:nombre.value, descripcion: descripcion.value},*/
                   data: new FormData(document.getElementById("agregar_detalle_salida")),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(data)
                   {
                       window.parent.location.reload();  
                   }
                });

         });

           
   
    </script>


</body>

</html>