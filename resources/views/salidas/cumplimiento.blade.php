@extends('layouts.admin')

@section('content')
 
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">REPORTE DE NIVEL DE DESPACHOS CUMPLIDOS</h6>
                    
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
                                                  <form action="" method="post" name="reporte_cumplimiento" id="reporte_cumplimiento"  class="form-horizontal row-border"  enctype="multipart/form-data">
                                             
                                                        <div class="form-body">
                                                          
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                               
                                                               <div class="row">
                                                                <div class="col-md-6">
                                                                  <div class="form-group">
                                                                    <label for="estado">Fecha inicial</label>
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
                                                              <button type="submit" class="btn btn-success reporte_cumplimiento">
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
                                              <td align="center"><b>REPORTE DE NIVEL DE DESPACHOS CUMPLIDOS</b>
                                              </td>
                                              </tr>
                                              </table>

                                                  <table width="100%" style="border:solid 1px #CCC;width:99%">
                                                     <tr>
                                                              <th style="text-align:left;font-size: 12px">FECHA</th>
                                                             
                                                              <th style="text-align:left;font-size: 12px">NÚMERO DE DESPACHOS CUMPLIDOS A TIEMPO</th>
                                                              
                                                              <th style="text-align:left;font-size: 12px">TOTAL DE DESPACHOS REQUERIDOS</th>
                                                              <th style="text-align:left;font-size: 12px">NIVEL DE DESPACHO CUMPLIDO</th>
                                                             
                                                           
                                                     </tr>
                                                     <tbody>
                                                      
                                                       @foreach($salidas as $item)

                                                       <?php
                                                       $cantidad_total=0;
                                                       $cantidad_total_estados=0;
                                                       ?>
                                                        <tr>

                                                            <td style="text-align:left;font-size: 12px">
                                                                <?php echo date("d/m/y",strtotime($item->fecha)); ?>
                                                            </td>
                                                           
                                                            <td style="text-align:left;font-size: 12px">
                                                                 @foreach($salidas_generales as $salida_general)
                                                                    @if($salida_general->fecha == $item->fecha)
                                                                        @if($salida_general->fkestado == 3)
                                                                           <?php $cantidad_total_estados++; ?>
                                                                        @endif
                                                                    @endif
                                                                  @endforeach
                                                                <?php echo $cantidad_total_estados; ?>
                                                            </td>

                                                            <td style="text-align:left;font-size: 12px">
                                                                @foreach($salidas_generales as $salida_general)
                                                                    @if($salida_general->fecha == $item->fecha)
                                                                       <?php $cantidad_total++; ?>
                                                                    @endif
                                                                @endforeach
                                                                <?php echo $cantidad_total; ?>
                                                            </td>

                                                            <td style="text-align:left;font-size: 12px">
                                                                 <?php echo $cantidad_total_estados/$cantidad_total*100; ?> %
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
