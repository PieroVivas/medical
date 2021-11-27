@extends('layouts.admin')

@section('content')
 
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">REPORTE DE GANANCIA CONSOLIDADO</h6>
                    
                </div>
           </div>


           <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                               
                              <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                
            

                                          <div class="card-body">
                                                <div class="px-3">
                                                  <form action="" method="post" name="reporte_ganancia_consolidado" class="form-horizontal row-border"  enctype="multipart/form-data">
                                             
                                                        <div class="form-body">
                                                          
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                               
                                                               <div class="row">
                                                                <div class="col-md-6">
                                                                  <div class="form-group">
                                                                    <label for="estado">Fecha Inicio</label>
                                                                   <input type="date" name="fecha_inicial" id="fecha_inicial" class="form-control" value="{{ $fecha_inicial }}"   />
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                  <div class="form-group">
                                                                    <label for="estado">Fecha Final</label>
                                                                    <input type="date" name="fecha_final" id="fecha_final" class="form-control" value="{{ $fecha_final }}"   />
                                                                  </div>
                                                                </div>
                                                              </div>

                                                            <div class="form-actions">
                                                              <button type="submit" class="btn btn-success" id="reporte_ganancia_consolidado">
                                                                <i class="icon-note"></i> BUSCAR
                                                              </button>
                                                              <a href="javascript:imprSelec('guia')" class="btn btn-success" >IMPRIMIR REPORTE</a> 
                                                            </div>

                                                        </div>
                                                </form>

                                                </div>        
                                            </div>


                                            <div class="card-body collapse show">
                                             <div class="card-block card-dashboard">

                                             <div id="guia" style="background-color:#FFF; padding:0px;">
                                              <span style="font-family:Arial, Helvetica, sans-serif; font-size:13px" >

                                              <table width="100%" >
                                              <tr>
                                              <td align="center"><img src="{{ url('public/images/logo.png') }}" width="100"></td>
                                              </tr>
                                              </table>

                                              <table width="100%" >
                                              <tr>
                                              <td align="center"><b>REPORTE DE GANANCIA POR PRODUCTO FILTRADO POR MES Y AÑO</b>
                                              </td>
                                              </tr>
                                              </table>

                                                  <table width="100%" style="border:solid 1px #CCC;width:99%">
                                                     <tr>
                                                              <th style="text-align:left;font-size: 12px">GANANCIA</th>
                                                              <th style="text-align:left;font-size: 12px">MES</th>
                                                              <th style="text-align:left;font-size: 12px">AÑO</th>
                                                             
                                                           
                                                     </tr>
                                                     <tbody>
                                                      
                                                       @foreach($results as $item)
                                                        <tr>

                                                            <td style="text-align:left;font-size: 12px">
                                                                {{$item->Ganancia}}
                                                            </td>

                                                            <td style="text-align:left;font-size: 12px">
                                                                {{$item->Mes}}
                                                            </td>

                                                            <td style="text-align:left;font-size: 12px">
                                                                {{$item->Anio}}
                                                            </td>
                                                            
                                                        </tr>
                                                        @endforeach
                                                      </tbody>
                                                  </table>
                                              </span>
                                              </div>

                                               </div>
                                              </div>
                                              </div>
                                             </div>
                                              </div>



                                            <script type="text/javascript">
                                            function imprSelec(muestra)
                                            {var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
                                            </script>




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
