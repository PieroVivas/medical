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
 <form action="" method="post" name="actualizar_cliente" id="actualizar_cliente"   enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                 <div class="form-group row">
                                    <div class="col-md-12">
                                        <h5 class="box-title mr-b-0" style="padding-bottom:10px;float:left">ACTUALIZAR CLIENTE</h5>

                                         
                                    </div>
                                </div>
                               
                                    
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $cliente->id }}">
                                    

                                    <div class="form-group row" style="margin-bottom:5px">
                                     
                                     


                                       <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Nombres</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="nombres" name="nombres" value="{{ $cliente->nombres }}" type="text" onkeypress="return soloLetras(event)">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Apellidos</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="apellidos" name="apellidos" value="{{ $cliente->apellidos }}" type="text" onkeypress="return soloLetras(event)">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">DNI</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="dni" name="dni" value="{{ $cliente->dni }}" type="text" maxlength="8" onkeypress="return soloNumeros(event)">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Razón Social</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="razon" name="razon" value="{{ $cliente->razon }}" type="text">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">RUC</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="ruc" name="ruc" value="{{ $cliente->ruc }}" type="text" maxlength="11" onkeypress="return soloNumeros(event)">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Dirección</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="direccion" name="direccion" value="{{ $cliente->direccion }}" type="text">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Teléfono</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono }}" type="text">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Correo</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="correo" name="correo" value="{{ $cliente->correo }}" type="text">
                                            </div>
                                        </div>
                                        

                                  


                                        <div class="col-md-12" style="padding-top:20px">
                                            <button class="btn btn-primary actualizar_cliente" style="float:left" type="submit">Actualizar</button>
                                        </div>


                                    </div>


                                  
                                  
                                  
                                </form>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                 </div>
            </form>
               </div>



@endsection