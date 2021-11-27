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
                                <h5>Lista de Tipos de Proveedores</h5>
                                <a href="#" onclick="abrir_popup('{{ url('tipos/create') }}')" class="btn btn-primary" data-toggle="modal" data-target="#popup" >
                                     <i class="feather feather-plus" style="font-size:15px;"></i> 
                                      Agregar Nuevo Tipo de Proveedor
                              </a>
                            </div>

                         


                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": true}'>
                                    <thead>
                                        <tr>
                                            <th>Tipo de Proveedor</th>
                                         
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tipos as $item)
                                          <tr>
                                         
                                           <td style="color:black;padding-top:5px !important"><?php echo $item->tipo; ?></td>

                                      
                                          
                                           <td>
                                            <a href="#" onclick="abrir_popup('{{ URL::to('tipos/' . $item->id . '/edit') }}')" data-toggle="modal" data-target="#popup" class="btn btn-primary" style="padding:5px"  
                                              ><i class="feather feather-settings" style="font-size:15px;"></i> 
                                            </a>
                                           </td>

                                           <td>
                                              <button class="btn btn-primary eliminar_tipo"    data-id="{{ $item->id }}"  style="padding:5px">
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
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.widget-list -->


@endsection