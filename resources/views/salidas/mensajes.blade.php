@extends('layouts.popup')

@section('content')

<div class="widget-list">
               <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                 <div class="form-group row">
                                    <div class="col-md-12">
                                        <h5 class="box-title mr-b-0" style="padding-bottom:10px;float:left">
                                       NÚMERO DE SALIDA : {{ $salida->numero }}
                                        </h5>
                                    </div>
                                </div>
                               
                                    
                                  <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": false}'>
                                    <thead>
                                        <tr>
                                            <th style="width:100px">Estado</th>
                                            <th style="width:100px">Fecha</th>
                                            <th >Mensaje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mensajes as $item)
                                          <tr>
                                         <td style="color:black;padding-top:5px !important"><?php echo $item->estado; ?></td>
                                           <td style="color:black;padding-top:5px !important"><?php echo date("d/m/y",strtotime($item->created_at)); ?></td>
                                            <td style="color:black;padding-top:5px !important"><?php echo $item->detalle; ?></td>
                                         
                                           
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
          
               </div>



@endsection