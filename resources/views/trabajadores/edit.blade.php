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
 <form action="" method="post" name="actualizar_trabajador" id="actualizar_trabajador"   enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                 <div class="form-group row">
                                    <div class="col-md-12">
                                        <h5 class="box-title mr-b-0" style="padding-bottom:10px;float:left">ACTUALIZAR TRABAJADOR</h5>

                                         <button class="btn btn-primary actualizar_trabajador" style="float:right" type="submit">Actualizar</button>
                                    </div>
                                </div>
                               
                                    
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="fkusuario" value="{{ $trabajador->fkusuario }}">
                                    <input type="hidden" name="id" value="{{ $trabajador->id }}">
                                    

                                    <div class="form-group row" style="margin-bottom:5px">
                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Nombres</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="nombres" name="nombres" value="{{ $trabajador->nombres }}" type="text" onkeypress="return soloLetras(event)">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">DNI</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="dni" name="dni" value="{{ $trabajador->dni }}" type="text" maxlength="8" onkeypress="return soloNumeros(event)">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group row" style="margin-bottom:5px">
                                         <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Dirección</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="direccion" name="direccion" value="{{ $trabajador->direccion }}" type="text" >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                             <label class="col-md-12 col-form-label" for="l0">Celular</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="celular" name="celular" value="{{ $trabajador->celular }}" type="text" >
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group row" style="margin-bottom:5px">
                                         
                                        
                                         <div class="col-md-6">
                                              <label class="col-md-12 col-form-label" for="l0">Rol</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="rol" name="rol">
                                                    <option value="administrador" @if($roles->name=="administrador") selected @endif >Administrador</option>
                                                    <option value="jefe de almacen" @if($roles->name=="jefe de almacen") selected @endif>Jefe de Almacén</option>
                                                    <option value="almacenero" @if($roles->name=="almacenero") selected @endif>Almacenero</option>
                                                    <option value="asistente de almacen" @if($roles->name=="asistente de almacen") selected @endif>Asistente de Almacen</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Email</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="email" name="email" value="{{ $user->email }}" type="text" >
                                            </div>
                                        </div>

                                         
                                    </div>



                                

                                    <div class="form-group row" style="margin-bottom:5px">
                                         <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Clave</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="clave" name="clave" value="{{ $trabajador->clave }}"  type="password">
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
            </form>
               </div>



@endsection