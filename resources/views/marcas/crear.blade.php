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

<div class="widget-list">
 <form action="" method="post" name="agregar_marca" id="agregar_marca"   enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <h5 class="box-title mr-b-0" style="padding-bottom:10px;float:left">REGISTRAR NUEVA MARCA</h5>
                                   </div>
                                </div>
                               
                                    
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group row" style="margin-bottom:5px">
                                        <div class="col-md-12">
                                            <label class="col-md-12 col-form-label" for="l0">Título de la Marca</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="marca" name="marca" placeholder="Título de la Marca" type="text" onkeypress="return soloLetras(event)">
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="padding-top:20px">
                                            <button class="btn btn-primary guardar_marca" style="float:left" type="submit">Guardar</button>
                                        </div>

                                    </div>

       
                                  
                                
                               
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                 </div>
                 </form>
               </div>


@endsection