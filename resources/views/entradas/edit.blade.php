@extends('layouts.admin')

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

<div class="row" style="margin-top:20px"> 
                <div class="col-xl-12"> 


                </div> 
            </div>


            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">EDITAR INGRESO</h6>

                     <a href="{{ url('/entradas') }}" class="btn btn-small btn-info" style="float:right;margin-top:10px">LISTA DE INGRESOS </a>


                </div>


                
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <div class="row">
                   

                    <div class="col-md-7 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>REGISTRO DE INGRESOS DE PRODUCTOS</h5>
                            </div>
                            <div class="widget-body clearfix">
                               
                               <form action="" method="post" name="actualizar_entrada" id="actualizar_entrada"   enctype="multipart/form-data">

                                 
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $entrada->id }}">

                           
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label class="col-md-12 col-form-label" for="l0">N° de Documento</label>
                                            <div class="col-md-12">

                                                <input class="form-control" id="numero" name="numero"  value="{{ $entrada->numero }}" type="text">
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <label class="col-md-12 col-form-label" for="l0">Proveedores</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="proveedor" name="proveedor">
                                                    @foreach($proveedores as $proveedor)
                                                    <option value="{{$proveedor->id}}" @if($proveedor->id==$entrada->fkproveedor) selected @endif>{{$proveedor->razon}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="col-md-12 col-form-label" for="l0">´Fecha</label>
                                            <div class="col-md-12">

                                                <input class="form-control" id="fecha" name="fecha" value="{{ $entrada->fecha }}"  type="date">
                                            </div>
                                        </div>


                                        <div class="col-md-12" style="padding-top:20px">
                                            <button class="btn btn-primary btn-rounded actualizar_entrada" type="submit">Actualizar</button>
                                        </div>
                                    </div>
                                 
                                   
                                </form>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->




                        <div class="widget-bg" style="margin-top:20px">
                            <div class="widget-heading clearfix">
                                <h5>DETALLE DE INGRESO DE PRODUCTOS</h5>
                            </div>
                            <div class="widget-body clearfix">
                               
                                    <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": true}'>
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                           <!-- <th>Marca</th>-->
                                            <th>Medida</th>
                                            <th>Cantidad</th>
                                            <th>Precio Venta</th>
                                            <th>Precio Compra</th>
                                           <!-- <th>Fecha Vencimiento</th>-->
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($entradas as $item)
                                          <tr>
                                         <td style="color:black;padding-top:5px !important"><?php echo $item->titulo; ?></td>
                                           <!--<td style="color:black;padding-top:5px !important"><?php echo $item->marca; ?></td>-->
                                            <td style="color:black;padding-top:5px !important"><?php echo $item->medida; ?></td>
                                          <td style="color:black;padding-top:5px !important"><?php echo $item->cantidad; ?></td>
                                          <td style="color:black;padding-top:5px !important">S/. <?php echo $item->precio_venta; ?></td>
                                          <td style="color:black;padding-top:5px !important">S/. <?php echo $item->precio_compra; ?></td>
                                         <!--  <td style="color:black;padding-top:5px !important"><?php echo date("d/m/y",strtotime($item->fecha_vencimiento)); ?></td>
                                            -->
                                           <td>   <button class="btn btn-primary eliminar_detalle_entrada"  data-id="{{ $item->id }}" data-role="{{ $item->id_producto }}"  data-cantidad="{{ $item->cantidad }}" style="padding:5px">
                                                <i class="feather feather-trash" style="font-size:15px;"></i> 
                                              </button>

                                          </td>
                                           
                                          </tr>
                                          @endforeach 
                                    </tbody>
                                    </table>
                              
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>







                    <div class="col-md-5 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>PRODUCTOS</h5>
                            </div>
                            <div class="widget-body clearfix">
                               
                                 <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": true}'>
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Marca</th>
                                            <th>Medida</th>
                                            <th>Seleccionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productos as $item)
                                        <tr>
                                            <td>{{$item->titulo}}</td>
                                            <td>
                                                @foreach($marcas as $marca)
                                                    @if($marca->id==$item->fkmarca)
                                                        {{$marca->marca}}
                                                    @endif
                                                @endforeach
                                                
                                            </td>
                                            <td>
                                                 @foreach($medidas as $medida)
                                                    @if($medida->id==$item->fkmedida)
                                                        {{$medida->medida}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                            <a href="#" onclick="abrir_popup('{{ URL::to('entradas/productos/'.$item->id.'/'.$entrada->id) }}')" data-toggle="modal" data-target="#popup" class="btn btn-small btn-info" 
                                              >AGREGAR 
                                            </a>
                                           </td>
                                            
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                   
                                </table>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                   
                   
                   
                   
                </div>
                <!-- /.row -->
            </div>
            <!-- /.widget-list -->
   
@endsection
