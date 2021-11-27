@extends('layouts.admin')

@section('content')
<div class="row" style="margin-top:20px"> 
                <div class="col-xl-12"> 


                    
                </div> 
            </div>


           <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">

                            <div class="widget-heading clearfix">
                                <h5>Lista de Salidas</h5>
                               
                            </div>


                            <div class="widget-body clearfix">
                               
                                <form action="" method="post" name="agregar_salida" id="agregar_salida"   enctype="multipart/form-data">

                                 

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                   
                                    <div class="form-group row">

                                        <div class="col-md-3">
                                            <label class="col-md-12 col-form-label" for="l0">N° de Documento</label>
                                            <div class="col-md-12">

                                                <input class="form-control" id="numero" name="numero"  value="OSL-000{{ $cantidad_salidas*1+1 }}" type="text">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <label class="col-md-12 col-form-label" for="l0">Clientes</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="cliente" name="cliente">
                                                    <option value="">Seleccione</option>
                                                    @foreach($clientes as $cliente)
                                                    <option value="{{$cliente->id}}">{{$cliente->nombres}} {{$cliente->apellidos}} - {{$cliente->razon}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="col-md-12 col-form-label" for="l0">Fecha</label>
                                            <div class="col-md-12">

                                                <input class="form-control" id="fecha" name="fecha"  type="date">
                                            </div>
                                        </div>



                                         <div class="col-md-3">
                                            <button class="btn btn-primary btn-rounded guardar_salida" type="submit" style="margin-top:40px">Registrar Salida</button>
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


            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>Lista</h5>
                            </div>

                           

                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">

                             

                                <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": true}'>
                                    <thead>
                                        <tr>
                                            <th>Número de Documento</th>
                                            <th>Cliente</th>
                                            <th>Fecha de Salida</th>
                                            <th>Estado</th>
                                            <th>Generado Sin Problema</th>
                                             <th>Tiempo en Registrar</th>
                                            <th>Editar</th>
                                          <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($salidas as $item)
                                        <tr>
                                            <td style="color:black;vertical-align:middle;">{{$item->numero}}</td>
                                            <td style="color:black;vertical-align:middle;">
                                                @foreach($clientes as $cliente)
                                                    @if($cliente->id==$item->fkcliente)
                                                        {{$cliente->nombres}} {{$cliente->apellidos}} - {{$cliente->razon}}
                                                    @endif
                                                @endforeach
                                                
                                            </td>

                                             <td style="color:black;vertical-align:middle;"><?php echo date("d/m/y",strtotime($item->fecha)); ?></td>

                                             <td style="color:black;vertical-align:middle;">
                                                @foreach($estados as $estado)
                                                    @if($estado->id==$item->fkestado)
                                                        {{$estado->estado}} 
                                                    @endif
                                                @endforeach
                                                
                                            </td>

                                            <td style="color:black;vertical-align:middle;">{{$item->generado}}</td>

                                              <td style="color:black;vertical-align:middle">{{$item->tiempo}} Segundos</td>

                                            <td>
                                            <a href="{{ URL::to('salidas/' . $item->id . '/edit') }}"  class="btn btn-small btn-info" 
                                              >EDITAR 
                                            </a>
                                           </td>
                                           
                                          <td>
                                             <button class="btn btn-small btn-info eliminar_salida"    data-id="{{ $item->id }}" >
                                                ELIMINAR 
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
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.widget-list -->
      
@endsection
