@extends('layouts.admin')

@section('content')

<?php
function dias_transcurridos($fecha_i,$fecha_f)
{
    $dias  = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
    $dias   = abs($dias); $dias = floor($dias);     
    return $dias;
}
?>



            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">REPORTE DE INVENTARIO</h6>
                    
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
                                                        <div class="form-body">
                                                            <div class="form-actions">
                                                             
                                                              <a href="javascript:imprSelec('guia')" class="btn btn-success" >IMPRIMIR REPORTE</a>
                                                               <a href="exportar_inventario.php" class="btn btn-success exportar_inventario" >EXPORTAR EXCEL</a>  
                                                            </div>
                                                        </div>
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
                                              <td align="center"><b>REPORTE DE INVENTARIO</b>
                                              </td>
                                              </tr>
                                              </table>

                                                  <table width="100%" style="border:solid 1px #CCC;width:99%">
                                                     <tr>
                                                              <th style="text-align:left;font-size: 12px">Producto</th>
                                                              <th style="text-align:left;font-size: 12px">Marca</th>
                                                              <th style="text-align:left;font-size: 12px">Categoría</th>
                                                              <th style="text-align:left;font-size: 12px">Medida</th>
                                                              <th style="text-align:left;font-size: 12px">Stock</th>
                                                              <th style="text-align:left;font-size: 12px">Costo Promedio por Unidad</th>
                                                              <th style="text-align:left;font-size: 12px">Costo Promedio total</th>
                                                             
                                                           
                                                     </tr>
                                                     <tbody>
                                                      
                                                       @foreach($productos as $item)

                                                      
                                                        <tr>

                                                            <td style="text-align:left;font-size: 12px">
                                                               {{$item->titulo}}
                                                            </td>
                                                           
                                                            <td style="text-align:left;font-size: 12px">
                                                                {{$item->marca}}
                                                            </td>

                                                            <td style="text-align:left;font-size: 12px">
                                                                {{$item->categoria}}
                                                            </td>

                                                            <td style="text-align:left;font-size: 12px">
                                                                {{$item->medida}}
                                                            </td>

                                                            <td style="text-align:left;font-size: 12px">
                                                                {{$item->stock}}
                                                            </td>

                                                            <td style="text-align:left;font-size: 12px">
                                                                S/.{{$item->promedio == null ? 0 : $item->promedio}}
                                                            </td>

                                                            <td style="text-align:left;font-size: 12px">
                                                               
                                                                S/. {{$item->promedio == null ? 0 : round(floatval($item->promedio)*floatval($item->stock),2)}}
                                                                
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
