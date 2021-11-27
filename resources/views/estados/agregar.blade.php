@extends('layouts.popup')

@section('content')

<script type="text/javascript">
  function soloLetras(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = [8, 37, 39, 46];
  
      tecla_especial = false
      for(var i in especiales) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
  
      if(letras.indexOf(tecla) == -1 && !tecla_especial)
          return false;
  }


  function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return (key >= 48 && key <= 57)
}

</script>
  <main class="main-wrapper clearfix" style="margin-left:0px">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">AGREGAR NUEVO ESTADO</h6>
                </div>
              
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                               
                                <form action="" method="post" name="agregar_estado" id="agregar_estado"   enctype="multipart/form-data">

                                 

                                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l0">Estado</label>
                                        <div class="col-md-9">

                                            <input class="form-control" id="estado" name="estado"  placeholder="Estado" type="text" onkeypress="return soloLetras(event)">
                                        </div>
                                    </div>
                                 
                                    <div class="form-actions">
                                        <div class="form-group row">
                                            <div class="col-md-9 ml-md-auto btn-list">
                                                <button class="btn btn-primary btn-rounded guardar_estado" type="submit">Agregar</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                   
                   
                   
                   
                </div>
                <!-- /.row -->
            </div>
            <!-- /.widget-list -->
        </main>
        <!-- /.main-wrapper -->
@endsection
