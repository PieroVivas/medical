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
 <form action="" method="post" name="agregar_producto" id="agregar_producto"   enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <h5 class="box-title mr-b-0" style="padding-bottom:10px;float:left">REGISTRAR NUEVO PRODUCTO</h5>
                                   </div>
                                </div>
                               
                                    
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group row" style="margin-bottom:5px">
                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Título</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="titulo" name="titulo" placeholder="Título" type="text">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Detalle</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="detalle" name="detalle" placeholder="Detalle" type="text">
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Categoría</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="categoria" name="categoria">
                                                    <option value="">Seleccione</option>
                                                     @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}" >{{ $categoria->categoria }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Marca</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="marca" name="marca">
                                                    <option value="">Seleccione</option>
                                                     @foreach ($marcas as $marca)
                                                    <option value="{{ $marca->id }}" >{{ $marca->marca }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Unidad de Medida</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="medida" name="medida">
                                                    <option value="">Seleccione</option>
                                                     @foreach ($medidas as $medida)
                                                    <option value="{{ $medida->id }}" >{{ $medida->medida }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-12" style="padding-top:20px">
                                            <button class="btn btn-primary guardar_producto" style="float:left" type="submit">Guardar</button>
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