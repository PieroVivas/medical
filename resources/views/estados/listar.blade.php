@extends('layouts.admin')

@section('content')
<div class="row" style="margin-top:20px"> 
                <div class="col-xl-12"> 


                    
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

                            <div class="widget-heading clearfix">
                                <h5>Estados de Salida de Productos</h5>
                                <a href="#" onclick="abrir_popup('{{ url('estados/create') }}')" class="btn btn-primary" data-toggle="modal" data-target="#popup" >
                                     <i class="feather feather-plus" style="font-size:15px;"></i> 
                                      Agregar Nuevo Estado
                              </a>
                            </div>

                           

                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">

                             

                                <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": false}'>
                                    <thead>
                                        <tr>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($estados as $item)
                                        <tr>
                                            <td style="color:black;vertical-align:middle;">{{$item->estado}}</td>
                                           
                                            <td>
                                            <a href="#" onclick="abrir_popup('{{ URL::to('estados/' . $item->id . '/edit') }}')" data-toggle="modal" data-target="#popup" class="btn btn-small btn-info" 
                                              >EDITAR 
                                            </a>
                                           </td>
                                           
                                            <td>
                                             <button class="btn btn-small btn-info eliminar_estado"    data-id="{{ $item->id }}" >
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
