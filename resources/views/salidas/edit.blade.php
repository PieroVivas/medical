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
                    <h6 class="page-title-heading mr-0 mr-r-5">EDITAR SALIDA</h6>

                     <a href="{{ url('/salidas') }}" class="btn btn-small btn-info" style="float:right;margin-top:10px">LISTA DE SALIDAS </a>


                </div>


                
            </div>


            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <div class="row">
                   

                    <div class="col-md-6 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>REGISTRO DE SALIDA DE PRODUCTOS</h5>
                            </div>
                            <div class="widget-body clearfix">
                               
                               <form action="" method="post" name="actualizar_salida" id="actualizar_salida"   enctype="multipart/form-data">

                                 
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $salida->id }}">

                           
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">N° de Documento</label>
                                            <div class="col-md-12">

                                                <input class="form-control" id="numero" name="numero"  value="{{ $salida->numero }}" type="text">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Clientes</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="cliente" name="cliente">
                                                    @foreach($clientes as $cliente)
                                                    <option value="{{$cliente->id}}" @if($cliente->id==$salida->fkcliente) selected @endif>{{$cliente->nombres}} {{$cliente->apellidos}} - {{$cliente->razon}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Estados</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="estado" name="estado">
                                                     <option value="" @if($salida->fkestado==0) selected @endif>Seleccione Estado</option>
                                                    @foreach($estados as $estado)
                                                    <option value="{{$estado->id}}" @if($estado->id==$salida->fkestado) selected @endif>{{$estado->estado}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                      

                                        <div class="col-md-6">
                                            <label class="col-md-12 col-form-label" for="l0">Fecha</label>
                                            <div class="col-md-12">

                                                <input class="form-control" id="fecha" name="fecha" value="{{ $salida->fecha }}"  type="date">
                                            </div>
                                        </div>


                                        <div class="col-md-12" style="padding-top:10px">
                                            <label >
                                                <input  id="generado" name="generado"  type="checkbox" value="SI"  @if($salida->generado=="SI") checked @endif >
                                                Pedido Generado sin problema
                                            </label>
                                        </div>


                                        <div class="col-md-12">
                                            <label class="col-md-12 col-form-label" for="l0">
                                                Observación <a href="#" onclick="abrir_popup('{{ URL::to('mensajes/'.$salida->id) }}')" data-toggle="modal" data-target="#popup"  style="float:right;"><u>Historial de Mensajes</u> ({{ $mensajes }})</a>
                                            </label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" id="detalle" name="detalle" style="height:70px"></textarea>
                                               
                                            </div>
                                        </div>



                                        <div class="col-md-12" style="padding-top:20px">
                                            <button class="btn btn-primary btn-rounded actualizar_salida" type="submit">Actualizar</button>
                                        </div>
                                    </div>
                                 
                                   
                                </form>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->




                     <div class="widget-bg" style="margin-top:20px">
                            <div class="widget-heading clearfix">
                                <h5>DETALLE DE SALIDAS DE PRODUCTOS</h5>
                            </div>
                            <div class="widget-body clearfix">
                               
                                    <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": true}'>
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Marca</th>
                                            <th>Unidad de Medida</th>
                                            <th>Cantidad</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($salidas as $item)
                                          <tr>
                                         <td style="color:black;padding-top:5px !important"><?php echo $item->titulo; ?></td>
                                           <td style="color:black;padding-top:5px !important"><?php echo $item->marca; ?></td>
                                            <td style="color:black;padding-top:5px !important"><?php echo $item->medida; ?></td>
                                          <td style="color:black;padding-top:5px !important"><?php echo $item->cantidad; ?></td>
                                            <td>
                                              <button class="btn btn-primary eliminar_detalle_salida"  data-id="{{ $item->id }}" data-producto="{{ $item->id_producto }}"  data-cantidad="{{ $item->cantidad }}" data-entrada="{{ $item->id_entrada }}" style="padding:5px">
                                                <i class="feather feather-trash" style="font-size:15px;"></i> 
                                              </button>

                                          </td>
                                           
                                          </tr>
                                          @endforeach 
                                    </tbody>
                                    </table>
                              
                            </div>
                        </div>

                    </div>







                    <div class="col-md-6 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>PRODUCTOS</h5>
                            </div>
                            <div class="widget-body clearfix">
                               
                                 <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": true}'>
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Unidad de Medida</th>
                                            <th>Marca</th>
                                            <th>Cantidad</th>
                                            <th>Fecha de vecimiento/Fecha de Vigencia</th>
                                            <th>Seleccionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productos as $item)
                                        <tr>
                                          <td style="color:black;padding-top:5px !important;vertical-align:middle;"><?php echo $item->titulo; ?></td>
                                         
                                          <td style="color:black;padding-top:5px !important;vertical-align:middle;"><?php echo $item->medida; ?></td>
                                          <td style="color:black;padding-top:5px !important;vertical-align:middle;"><?php echo $item->marca; ?></td>
                                          <td style="color:black;padding-top:5px !important;vertical-align:middle;"><?php echo $item->stock; ?></td>
                                           <td style="color:black;padding-top:5px !important">
                                            <?php 
                                            if($item->fecha_vencimiento!="0000-00-00")
                                            {
                                               echo date("d/m/y",strtotime($item->fecha_vencimiento)); 
                                            }
                                            ?>
                                                
                                            </td>
                                              <td>  
                                            <a href="#" onclick="abrir_popup('{{ URL::to('salidas/productos/'.$item->id.'/'.$salida->id) }}')" data-toggle="modal" data-target="#popup" class="btn btn-small btn-info" 
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
