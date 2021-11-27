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
 <form action="" method="post" name="agregar_detalle_entrada" id="agregar_detalle_entrada"   enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                 <div class="form-group row">
                                    <div class="col-md-12">
                                        <h5 class="box-title mr-b-0" style="padding-bottom:10px;float:left">
                                        PRODUCTO SELECCIONADO: {{ $producto->titulo }}
                                        </h5>
                                    </div>
                                </div>
                               
                                    
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                    <input type="hidden" name="id_entrada" value="{{ $entrada->id }}">
                                    

                                    <div class="form-group row" style="margin-bottom:5px">
                                        
                                        <div class="col-md-4">
                                            <label class="col-md-12 col-form-label" for="l0">Producto</label>
                                            <div class="col-md-12">
                                                <input class="form-control"   type="text" value="{{ $producto->titulo }}">
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-4">
                                            <label class="col-md-12 col-form-label" for="l0">Marca</label>
                                            <div class="col-md-12">
                                                <input class="form-control"   type="text" value="{{ $producto->marca }}">
                                            </div>
                                        </div>      

                                        <div class="col-md-4">
                                            <label class="col-md-12 col-form-label" for="l0">Medida</label>
                                            <div class="col-md-12">
                                                <input class="form-control"   type="text" value="{{ $producto->medida }}">
                                            </div>
                                        </div> 


                                        <div class="col-md-4">
                                            <label class="col-md-12 col-form-label" for="l0">Stock</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="cantidad" name="cantidad"  type="text" onkeypress="return soloNumeros(event)">
                                            </div>
                                        </div>


                                      

                                        <div class="col-md-4">
                                            <label class="col-md-12 col-form-label" for="l0">Precio de Venta</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="precio_venta" name="precio_venta"  type="text">
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <label class="col-md-12 col-form-label" for="l0">Precio de Compra</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="precio_compra" name="precio_compra"  type="text">
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <label class="col-md-12 col-form-label" for="l0">Fecha de Vencimiento/Fecha de Vigencia</label>
                                            <div class="col-md-12">
                                                <input class="form-control" id="fecha_vencimiento" name="fecha_vencimiento"  type="date">
                                            </div>
                                        </div>


                                        <div class="col-md-12" style="padding-top:20px">
                                            <button class="btn btn-primary agregar_detalle_entrada" style="float:left" type="submit">AGREGAR AL DETALLE DEL INGRESO</button>
                                        </div>


                                    </div>


                                  
                                  
                                  
                                </form>

                                <!-- <form id="box_auditoria" style="display:none;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                    <div class="col-md-4">
                                                                <label class="col-md-12 col-form-label" for="l0">Precio de Compra</label>
                                                                <div class="col-md-12">
                                                                    <input class="form-control" id="precio_compra_2" name="precio_compra"  type="text">
                                                                </div>
                                    </div>
                                    <script>
                                        let precioAuditoria = document.getElementById('precio_compra_2');
                                        let precioNormal = document.getElementById('precio_compra');

                                        function llenarValor(){
                                            precioAuditoria.value = precioNormal.value;
                                            console.log(precioAuditoria.value);
                                        }
                                    </script>
                                </form> -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                 </div>
            </form>
               </div>



@endsection