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
                                <h5>Lista de Trabajadores</h5>
                                <a href="#" onclick="abrir_popup('{{ url('trabajadores/create') }}')" class="btn btn-primary" data-toggle="modal" data-target="#popup" >
                                     <i class="feather feather-plus" style="font-size:15px;"></i> 
                                      Agregar Nuevo Trabajador
                              </a>
                            </div>

                         

                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": true}'>
                                    <thead>
                                        <tr>
                                            <th>Nombres</th>
                                            <th>DNI</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trabajadores as $item)
                                          <tr>
                                         
                                           <td style="color:black;padding-top:5px !important"><?php echo ucwords(strtolower(htmlentities($item->nombres))); ?></td>
                                            <td style="color:black;padding-top:5px !important">{{ $item->dni }}</td>
                                            <td style="color:black;padding-top:5px !important"><?php echo strtolower(htmlentities($item->email)); ?></td>
                                            <td style="color:black;padding-top:5px !important">{{ $item->rol }}</td>
                                         
                                           <td>
                                            <a href="#" onclick="abrir_popup('{{ URL::to('trabajadores/' . $item->id . '/edit') }}')" data-toggle="modal" data-target="#popup" class="btn btn-primary"  style="padding:5px" 
                                              ><i class="feather feather-settings" style="font-size:15px;"></i> 
                                            </a>
                                           </td>

                                           <td>
                                              <button class="btn btn-primary eliminar_trabajador"    data-id="{{ $item->id }}" style="padding:5px">
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