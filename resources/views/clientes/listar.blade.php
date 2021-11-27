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
                                <h5>Lista de Clientes</h5>
                                <a href="#" onclick="abrir_popup('{{ url('clientes/create') }}')" class="btn btn-primary" data-toggle="modal" data-target="#popup" >
                                     <i class="feather feather-plus" style="font-size:15px;"></i> 
                                      Agregar Nuevo Cliente
                              </a>
                            </div>

                         


                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": true}'>
                                    <thead>
                                        <tr>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>DNI</th>
                                            <th>Razón Social</th>
                                            <th>RUC</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                         
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientes as $item)
                                          <tr>
                                         
                                           <td style="color:black;padding-top:5px !important"><?php echo $item->nombres; ?></td>
                                           <td style="color:black;padding-top:5px !important"><?php echo $item->apellidos; ?></td>
                                           <td style="color:black;padding-top:5px !important"><?php echo $item->dni; ?></td>
                                           <td style="color:black;padding-top:5px !important"><?php echo $item->razon; ?></td>
                                           <td style="color:black;padding-top:5px !important"><?php echo $item->ruc; ?></td>
                                            <td style="color:black;padding-top:5px !important"><?php echo $item->direccion; ?></td>

                                             <td style="color:black;padding-top:5px !important"><?php echo $item->telefono; ?></td>
                                              <td style="color:black;padding-top:5px !important"><?php echo $item->correo; ?></td>
                                          
                                           <td>
                                            <a href="#" onclick="abrir_popup('{{ URL::to('clientes/' . $item->id . '/edit') }}')" data-toggle="modal" data-target="#popup" class="btn btn-primary" style="padding:5px"  
                                              ><i class="feather feather-settings" style="font-size:15px;"></i> 
                                            </a>
                                           </td>

                                           <td>
                                              <button class="btn btn-primary eliminar_cliente"    data-id="{{ $item->id }}"  style="padding:5px">
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