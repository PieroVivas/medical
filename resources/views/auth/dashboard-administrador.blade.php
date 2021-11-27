@extends('layouts.admin')

@section('content')

<div class="row" style="margin-top:20px"> 
                

                <div class="col-xl-3"> 
                      <div class="card  banner" style="background-image: linear-gradient(to right, rgb(0 0 0 / 80%) 0%, rgb(0 0 0  / 60%)), url({{ url('public/images/bg.png') }});background-size: cover;position: relative; overflow: hidden;margin-bottom:20px;"> 

                        <div class="card-body" style="padding:5px"> 
                          <div class="row"> 
                           
                            <div class="col-xl-12 col-lg-12 text-center"> 
                              <img src="{{ url('public/images/user_2.png') }}" alt="img" style="width:75px" > 
                            </div> 
                            
                            <div class="col-xl-12 col-lg-12 pl-lg-0"> 
                              <div class="row"> 
                                
                                <div class="col-xl-12 col-lg-6"> 
                                  <div class=" text-white" style="text-align:center;"> 
                                    <h3 class="font-weight-semibold" style="margin-top:6px">Bienvenido, {{ auth()->user()->name }}</h3> 
                                  </div> 
                                </div> 

                                
                              </div> 
                            </div> 
                          </div> 
                        </div> 
                      </div>
                </div> 


                /<div class="col-xl-3"> 
                        <div class="widget-holder widget-full-height widget-no-padding widget-flex col-md-12">
                                          <div class="widget-bg bg-facebook color-white radius-5" style="background-color:white !important;box-shadow: 0 4px 25px 0 rgba(0,0,0,.1);">
                                              <div class="widget-body">
                                                  <div class="facebook-widget flex-1" style="min-height:auto">
                                                      <div class="status-container">
                                                            <div class="user-info">
                                                                  
                                                                  <div class="user-name-group">

                                                                    <h5 class="user-name" style="color:black !important;font-size:20px">
                                                                        <i class="feather feather-grid"></i>
                                                                        Rotación de Inventario
                                                                    </h5>

                                                                    <a href="{{ url('indicador_cumplimiento/2020-01-01/2020-12-30') }}" class="btn btn-white mb-xl-0" id="skip" style="background-color:#6b717e;border:solid 0px;width:100%;text-align:center;display:block">Ver Indicador</b></a>
                                                                  </div>

                                                            </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              
                                          </div>
                                          
                                      </div>
                </div> 







                <div class="col-xl-3"> 
                        <div class="widget-holder widget-full-height widget-no-padding widget-flex col-md-12">
                                          <div class="widget-bg bg-facebook color-white radius-5" style="background-color:white !important;box-shadow: 0 4px 25px 0 rgba(0,0,0,.1);">
                                              <div class="widget-body">
                                                  <div class="facebook-widget flex-1" style="min-height:auto">
                                                      <div class="status-container">
                                                            <div class="user-info">
                                                                  
                                                                  <div class="user-name-group">

                                                                    <h5 class="user-name" style="color:black !important;font-size:20px">
                                                                        <i class="feather feather-grid"></i>
                                                                       Ganancia de Inventario por Mes y/o Año
                                                                    </h5>

                                                                    <a href="{{ url('indicador_ganancia/2020-01-01/2020-12-30') }}" class="btn btn-white mb-xl-0" id="skip" style="background-color:#6b717e;border:solid 0px;width:100%;text-align:center;display:block">Ver Indicador</b></a>
                                                                  </div>

                                                            </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              
                                          </div>
                                         
                                      </div>
                </div>

              <div class="col-xl-2.5"> 
                        <div class="widget-holder widget-full-height widget-no-padding widget-flex col-md-16">
                                          <div class="widget-bg bg-facebook color-white radius-5" style="background-color:white !important;box-shadow: 0 4px 25px 0 rgba(0,0,0,.1);">
                                              <div class="widget-body">
                                                  <div class="facebook-widget flex-1" style="min-height:auto">
                                                      <div class="status-container">
                                                            <div class="user-info">
                                                                  
                                                                  <div class="user-name-group">

                                                                    <!-- Redirigir a una ruta especifica cuando aprietas el boton, "name" es para saber a que metodo te estas dirigiendo -->
                                                                    <form action="" method="post" name="anio_consultar" id="anio_consultar" class="form-horizontal row-border"  enctype="multipart/form-data">

                                                                    <!-- Creación del combox "name" va hacer el valor que optendra se los valores -->
                                                                    <select class="form-control" name="anioconsulta" id="anioconsulta" style="width: 200px">
                                                                      <script>
                                                                          function cargar_years() {
                                                                              var years = [];
                                                                              for (var i = 2018; i <= 2028; i++) {
                                                                                  years.push(i);
                                                                              }
                                                                              //console.log(years);
                                                                              var year = String(window.location).substr(-4);
                                                                              for (var i in years) {
                                                                                  document.getElementById("anioconsulta").innerHTML += `<option id='option${String(years[i])}' value='${String(years[i])}'>${String(years[i])}</option>`;
                                                                              }
                                                                              var option = document.getElementById(`option${year}`);
                                                                              option.setAttribute("selected", true);
                                                                          }
                                                                          cargar_years();
                                                                      </script>

                                                                    <option value="">consultar año</option>
                                                                    </select>
                                                                  </br>


                                                                    <button type="submit" class="btn btn-success anio_consultar" style="background-color:#6b717e;border:solid 0px;width:100%;text-align:center;display:block">Consultar Año Reporte</b></button>
                                                                  </form>
                                                                  </div>

                                                            </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- /.widget-body -->
                                          </div>
                                          <!-- /.widget-bg -->
                                      </div>
                </div>


                <!--<div class="col-xl-12"> 
                        <div class="widget-holder widget-full-height widget-no-padding widget-flex col-md-12">
                                          <div class="widget-bg bg-facebook color-white radius-5" style="background-color:white !important;box-shadow: 0 4px 25px 0 rgba(0,0,0,.1);">
                                              <div class="widget-body">
                                                  <div class="facebook-widget flex-1" style="min-height:auto">
                                                      <div class="status-container">
                                                            <div class="user-info">
                                                                  
                                                                  <div class="user-name-group">

                                                                    <h5 class="user-name" style="color:black !important;font-size:20px">
                                                                        <i class="feather feather-grid"></i>
                                                                       Inventory Dolar Day
                                                                    </h5>

                                                                    <ul>
                                                                          <li class="charles-display">Valor Productos por Inventario <br>{{ $inventory_dolar_day[0]->Costo_promedio_por_unidad}}</li>

                                                                          <li class="charles-display">Stock de todas las unidades <br>{{ $inventory_dolar_day[0]->Stock_Total }}</li>

                                                                          <li class="charles-display">Inventory Sol Day <br> S/. {{ $inventory_dolar_day[0]->Inventory_Sun_Day }}</li>

                                                                         
                                                                    </ul>
                                                                  </div>

                                                            </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              
                                          </div>
                                          
                                      </div>
                </div>-->


                <div class="col-xl-3"> 
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                          google.charts.load("current", {packages:["corechart"]});
                          google.charts.setOnLoadCallback(drawChart1);
                          function drawChart1() 
                          {
                            var data = google.visualization.arrayToDataTable([
                              ['Task', 'Hours per Day'],

                              <?php
                              foreach($categorias as $categoria)
                              {
                              
                                 $contador_categoria=0;
                                  foreach ($productos as $item)
                                  {
                                     if($categoria->id==$item->fkcategoria)
                                     {
                                         $contador_categoria++;
                                     }
                                  }

                                ?>
                                 ['<?php echo $categoria->categoria ?>',<?php echo $contador_categoria; ?>],
                                <?php
                              }
                              ?>

                            ]);

                            var options = {
                              title: 'CATEGORÍAS DE PRODUCTOS',
                              is3D: true,
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('categorias'));
                            chart.draw(data, options);
                          }
                        </script>

                        <div id="categorias" style="width: 100%; height:300px;"></div>
                </div>


                

                <div class="col-xl-3"> 
                        <script type="text/javascript">
                          google.charts.load("current", {packages:["corechart"]});
                          google.charts.setOnLoadCallback(drawChart2);
                          function drawChart2() {
                            var data = google.visualization.arrayToDataTable([
                              ['Task', 'Hours per Day'],

                              <?php
                              foreach($marcas as $marca)
                              {
                              
                                 $contador_marca=0;
                                  foreach ($productos as $item)
                                  {
                                     if($marca->id==$item->fkmarca)
                                     {
                                         $contador_marca++;
                                     }
                                  }

                                ?>
                                 ['<?php echo $marca->marca ?>',<?php echo $contador_marca; ?>],
                                <?php
                              }
                              ?>

                            ]);

                            var options = {
                              title: 'MARCAS DE PRODUCTOS',
                              is3D: true,
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('marcas'));
                            chart.draw(data, options);
                          }
                        </script>

                        <div id="marcas" style="width: 100%; height:300px;"></div>
                </div>


               <?php
                if($cantidad_salidas_enero_despacho==0){$cantidad_salidas_enero_despacho=1;}
                if($cantidad_salidas_febrero_despacho==0){$cantidad_salidas_febrero_despacho=1;}
                if($cantidad_salidas_marzo_despacho==0){$cantidad_salidas_marzo_despacho=1;}
                if($cantidad_salidas_abril_despacho==0){$cantidad_salidas_abril_despacho=1;}
                if($cantidad_salidas_mayo_despacho==0){$cantidad_salidas_mayo_despacho=1;}
                if($cantidad_salidas_junio_despacho==0){$cantidad_salidas_junio_despacho=1;}
                if($cantidad_salidas_julio_despacho==0){$cantidad_salidas_julio_despacho=1;}
                if($cantidad_salidas_agosto_despacho==0){$cantidad_salidas_agosto_despacho=1;}
                if($cantidad_salidas_septiembre_despacho==0){$cantidad_salidas_septiembre_despacho=1;}
                if($cantidad_salidas_octubre_despacho==0){$cantidad_salidas_octubre_despacho=1;}
                if($cantidad_salidas_noviembre_despacho==0){$cantidad_salidas_noviembre_despacho=1;}
                if($cantidad_salidas_diciembre_despacho==0){$cantidad_salidas_diciembre_despacho=1;}
                ?>

             

                 <div class="col-xl-6" style="margin-top:10px"> 
                       <script type="text/javascript">
                          google.charts.load("current", {packages:['corechart']});
                          google.charts.setOnLoadCallback(drawChart4);
                          function drawChart4() {
                            var data = google.visualization.arrayToDataTable([
                              ["Element", "%", { role: "style" } ],
                              ["Enero", <?php echo $salidas_enero_despacho/$cantidad_salidas_enero_despacho*100; ?>, "#b87333"],
                              ["Febrero", <?php echo $salidas_febrero_despacho/$cantidad_salidas_febrero_despacho*100; ?>, "silver"],
                              ["Marzo", <?php echo $salidas_marzo_despacho/$cantidad_salidas_marzo_despacho*100; ?>, "gold"],
                              ["Abril", <?php echo $salidas_abril_despacho/$cantidad_salidas_abril_despacho*100; ?>, "color: #e5e4e2"],
                              ["Mayo", <?php echo $salidas_mayo_despacho/$cantidad_salidas_mayo_despacho*100; ?>, "color:blue"],
                              ["Junio", <?php echo $salidas_junio_despacho/$cantidad_salidas_junio_despacho*100; ?>, "color: #F0F0F0"],
                              ["Julio", <?php echo $salidas_julio_despacho/$cantidad_salidas_julio_despacho*100; ?>, "color:green"],
                              ["Agosto", <?php echo $salidas_agosto_despacho/$cantidad_salidas_agosto_despacho*100; ?>, "color: #ff0000"],
                              ["Septiembre", <?php echo $salidas_septiembre_despacho/$cantidad_salidas_septiembre_despacho*100; ?>, "color:orange"],
                              ["Octubre", <?php echo $salidas_octubre_despacho/$cantidad_salidas_octubre_despacho*100; ?>, "color: #767676"],
                              ["Noviembre", <?php echo $salidas_noviembre_despacho/$cantidad_salidas_noviembre_despacho*100; ?>, "color: #85e4e2"],
                              ["Diciembre", <?php echo $salidas_diciembre_despacho/$cantidad_salidas_diciembre_despacho*100; ?>, "color: #000000"]
                            ]);

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                             { calc: "stringify",
                                               sourceColumn: 1,
                                               type: "string",
                                               role: "annotation" },
                                             2]);

                            var options = {
                              title: "NIVEL DE DESPACHOS CUMPLIDOS POR MESES",
                              bar: {groupWidth: "95%"},
                              legend: { position: "none" },
                            };
                            var chart = new google.visualization.LineChart(document.getElementById("despacho"));
                            chart.draw(view, options);
                        }
                        </script>
                        <div id="despacho" style="width: 100%; height:300px;"></div>
                </div>


                <?php
                if($cantidad_salidas_enero_calidad==0){$cantidad_salidas_enero_calidad=1;}
                if($cantidad_salidas_febrero_calidad==0){$cantidad_salidas_febrero_calidad=1;}
                if($cantidad_salidas_marzo_calidad==0){$cantidad_salidas_marzo_calidad=1;}
                if($cantidad_salidas_abril_calidad==0){$cantidad_salidas_abril_calidad=1;}
                if($cantidad_salidas_mayo_calidad==0){$cantidad_salidas_mayo_calidad=1;}
                if($cantidad_salidas_junio_calidad==0){$cantidad_salidas_junio_calidad=1;}
                if($cantidad_salidas_julio_calidad==0){$cantidad_salidas_julio_calidad=1;}
                if($cantidad_salidas_agosto_calidad==0){$cantidad_salidas_agosto_calidad=1;}
                if($cantidad_salidas_septiembre_calidad==0){$cantidad_salidas_septiembre_calidad=1;}
                if($cantidad_salidas_octubre_calidad==0){$cantidad_salidas_octubre_calidad=1;}
                if($cantidad_salidas_noviembre_calidad==0){$cantidad_salidas_noviembre_calidad=1;}
                if($cantidad_salidas_diciembre_calidad==0){$cantidad_salidas_diciembre_calidad=1;}
                ?>

                <div class="col-xl-6" style="margin-top:10px"> 
                       <script type="text/javascript">
                          google.charts.load("current", {packages:['corechart']});
                          google.charts.setOnLoadCallback(drawChart5);
                          function drawChart5() {
                            var data = google.visualization.arrayToDataTable([
                              ["Element", "%", { role: "style" } ],
                              ["Enero", <?php echo $salidas_enero_calidad/$cantidad_salidas_enero_calidad*100; ?>, "#b87333"],
                              ["Febrero", <?php echo $salidas_febrero_calidad/$cantidad_salidas_febrero_calidad*100; ?>, "silver"],
                              ["Marzo", <?php echo $salidas_marzo_calidad/$cantidad_salidas_marzo_calidad*100; ?>, "gold"],
                              ["Abril", <?php echo $salidas_abril_calidad/$cantidad_salidas_abril_calidad*100; ?>, "color: #e5e4e2"],
                              ["Mayo", <?php echo $salidas_mayo_calidad/$cantidad_salidas_mayo_calidad*100; ?>, "color:blue"],
                              ["Junio", <?php echo $salidas_junio_calidad/$cantidad_salidas_junio_calidad*100; ?>, "color: #F0F0F0"],
                              ["Julio", <?php echo $salidas_julio_calidad/$cantidad_salidas_julio_calidad*100; ?>, "color:green"],
                              ["Agosto", <?php echo $salidas_agosto_calidad/$cantidad_salidas_agosto_calidad*100; ?>, "color: #ff0000"],
                              ["Septiembre", <?php echo $salidas_septiembre_calidad/$cantidad_salidas_septiembre_calidad*100; ?>, "color:orange"],
                              ["Octubre", <?php echo $salidas_octubre_calidad/$cantidad_salidas_octubre_calidad*100; ?>, "color: #767676"],
                              ["Noviembre", <?php echo $salidas_noviembre_calidad/$cantidad_salidas_noviembre_calidad*100; ?>, "color: #85e4e2"],
                              ["Diciembre", <?php echo $salidas_diciembre_calidad/$cantidad_salidas_diciembre_calidad*100; ?>, "color: #000000"]
                            ]);

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                             { calc: "stringify",
                                               sourceColumn: 1,
                                               type: "string",
                                               role: "annotation" },
                                             2]);

                            var options = {
                              title: "CALIDAD DE PEDIDOS GENERADOS POR MESES",
                              bar: {groupWidth: "95%"},
                              legend: { position: "none" },
                            };
                            var chart = new google.visualization.LineChart(document.getElementById("calidad"));
                            chart.draw(view, options);
                        }
                        </script>
                        <div id="calidad" style="width: 100%; height:300px;"></div>
                </div>





                <?php
                if($cantidad_salidas_enero_incidencia==0){$cantidad_salidas_enero_incidencia=1;}
                if($cantidad_salidas_febrero_incidencia==0){$cantidad_salidas_febrero_incidencia=1;}
                if($cantidad_salidas_marzo_incidencia==0){$cantidad_salidas_marzo_incidencia=1;}
                if($cantidad_salidas_abril_incidencia==0){$cantidad_salidas_abril_incidencia=1;}
                if($cantidad_salidas_mayo_incidencia==0){$cantidad_salidas_mayo_incidencia=1;}
                if($cantidad_salidas_junio_incidencia==0){$cantidad_salidas_junio_incidencia=1;}
                if($cantidad_salidas_julio_incidencia==0){$cantidad_salidas_julio_incidencia=1;}
                if($cantidad_salidas_agosto_incidencia==0){$cantidad_salidas_agosto_incidencia=1;}
                if($cantidad_salidas_septiembre_incidencia==0){$cantidad_salidas_septiembre_incidencia=1;}
                if($cantidad_salidas_octubre_incidencia==0){$cantidad_salidas_octubre_incidencia=1;}
                if($cantidad_salidas_noviembre_incidencia==0){$cantidad_salidas_noviembre_incidencia=1;}
                if($cantidad_salidas_diciembre_incidencia==0){$cantidad_salidas_diciembre_incidencia=1;}
                ?>

                <div class="col-xl-6" style="margin-top:10px"> 
                       <script type="text/javascript">
                          google.charts.load("current", {packages:['corechart']});
                          google.charts.setOnLoadCallback(drawChart6);
                          function drawChart6() {
                            var data = google.visualization.arrayToDataTable([
                              ["Element", "%", { role: "style" } ],
                              ["Enero", <?php echo $salidas_enero_incidencia/$cantidad_salidas_enero_incidencia*100; ?>, "#b87333"],
                              ["Febrero", <?php echo $salidas_febrero_incidencia/$cantidad_salidas_febrero_incidencia*100; ?>, "silver"],
                              ["Marzo", <?php echo $salidas_marzo_incidencia/$cantidad_salidas_marzo_incidencia*100; ?>, "gold"],
                              ["Abril", <?php echo $salidas_abril_incidencia/$cantidad_salidas_abril_incidencia*100; ?>, "color: #e5e4e2"],
                              ["Mayo", <?php echo $salidas_mayo_incidencia/$cantidad_salidas_mayo_incidencia*100; ?>, "color:blue"],
                              ["Junio", <?php echo $salidas_junio_incidencia/$cantidad_salidas_junio_incidencia*100; ?>, "color: #F0F0F0"],
                              ["Julio", <?php echo $salidas_julio_incidencia/$cantidad_salidas_julio_incidencia*100; ?>, "color:green"],
                              ["Agosto", <?php echo $salidas_agosto_incidencia/$cantidad_salidas_agosto_incidencia*100; ?>, "color: #ff0000"],
                              ["Septiembre", <?php echo $salidas_septiembre_incidencia/$cantidad_salidas_septiembre_incidencia*100; ?>, "color:orange"],
                              ["Octubre", <?php echo $salidas_octubre_incidencia/$cantidad_salidas_octubre_incidencia*100; ?>, "color: #767676"],
                              ["Noviembre", <?php echo $salidas_noviembre_incidencia/$cantidad_salidas_noviembre_incidencia*100; ?>, "color: #85e4e2"],
                              ["Diciembre", <?php echo $salidas_diciembre_incidencia/$cantidad_salidas_diciembre_incidencia*100; ?>, "color: #000000"]
                            ]);

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                             { calc: "stringify",
                                               sourceColumn: 1,
                                               type: "string",
                                               role: "annotation" },
                                             2]);

                            var options = {
                              title: "TASA DE INCIDENCIAS POR MESES",
                              bar: {groupWidth: "95%"},
                              legend: { position: "none" },
                            };
                            var chart = new google.visualization.LineChart(document.getElementById("incidencias"));
                            chart.draw(view, options);
                        }
                        </script>
                        <div id="incidencias" style="width: 100%; height:300px;"></div>
                </div>





             

                <div class="col-xl-6" style="margin-top:10px"> 
                       <script type="text/javascript">
                          google.charts.load("current", {packages:['corechart']});
                          google.charts.setOnLoadCallback(drawChart7);
                          function drawChart7() {
                            var data = google.visualization.arrayToDataTable([
                              ["Element", "", { role: "style" } ],
                              ["Enero", <?php echo $cantidad_salidas_enero; ?>, "#b87333"],
                              ["Febrero", <?php echo $cantidad_salidas_febrero; ?>, "silver"],
                              ["Marzo", <?php echo $cantidad_salidas_marzo; ?>, "gold"],
                              ["Abril", <?php echo $cantidad_salidas_abril; ?>, "color: #e5e4e2"],
                              ["Mayo", <?php echo $cantidad_salidas_mayo; ?>, "color:blue"],
                              ["Junio", <?php echo $cantidad_salidas_junio; ?>, "color: #F0F0F0"],
                              ["Julio", <?php echo $cantidad_salidas_julio; ?>, "color:green"],
                              ["Agosto", <?php echo $cantidad_salidas_agosto; ?>, "color: #ff0000"],
                              ["Septiembre", <?php echo $cantidad_salidas_septiembre; ?>, "color:orange"],
                              ["Octubre", <?php echo $cantidad_salidas_octubre; ?>, "color: #767676"],
                              ["Noviembre", <?php echo $cantidad_salidas_noviembre; ?>, "color: #85e4e2"],
                              ["Diciembre", <?php echo $cantidad_salidas_diciembre; ?>, "color: #000000"]
                            ]);

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                             { calc: "stringify",
                                               sourceColumn: 1,
                                               type: "string",
                                               role: "annotation" },
                                             2]);

                            var options = {
                              title: "CANTIDAD DE SALIDAS POR MESES",
                              bar: {groupWidth: "95%"},
                              legend: { position: "none" },
                            };
                            var chart = new google.visualization.AreaChart(document.getElementById("cantidad_salidas"));
                            chart.draw(view, options);
                        }
                        </script>
                        <div id="cantidad_salidas" style="width: 100%; height:300px;"></div>
                </div>




                 <div class="col-xl-6" style="margin-top:10px"> 
                       <script type="text/javascript">
                          google.charts.load("current", {packages:['corechart']});
                          google.charts.setOnLoadCallback(drawChart8);
                          function drawChart8() {
                            var data = google.visualization.arrayToDataTable([
                              ["Element", "", { role: "style" } ],
                              ["Enero", <?php echo $cantidad_entradas_enero; ?>, "#b87333"],
                              ["Febrero", <?php echo $cantidad_entradas_febrero; ?>, "silver"],
                              ["Marzo", <?php echo $cantidad_entradas_marzo; ?>, "gold"],
                              ["Abril", <?php echo $cantidad_entradas_abril; ?>, "color: #e5e4e2"],
                              ["Mayo", <?php echo $cantidad_entradas_mayo; ?>, "color:blue"],
                              ["Junio", <?php echo $cantidad_entradas_junio; ?>, "color: #F0F0F0"],
                              ["Julio", <?php echo $cantidad_entradas_julio; ?>, "color:green"],
                              ["Agosto", <?php echo $cantidad_entradas_agosto; ?>, "color: #ff0000"],
                              ["Septiembre", <?php echo $cantidad_entradas_septiembre; ?>, "color:orange"],
                              ["Octubre", <?php echo $cantidad_entradas_octubre; ?>, "color: #767676"],
                              ["Noviembre", <?php echo $cantidad_entradas_noviembre; ?>, "color: #85e4e2"],
                              ["Diciembre", <?php echo $cantidad_entradas_diciembre; ?>, "color: #000000"]
                            ]);

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                             { calc: "stringify",
                                               sourceColumn: 1,
                                               type: "string",
                                               role: "annotation" },
                                             2]);

                            var options = {
                              title: "CANTIDAD DE ENTRADAS POR MESES",
                              bar: {groupWidth: "95%"},
                              legend: { position: "none" },
                            };
                            var chart = new google.visualization.AreaChart(document.getElementById("cantidad_entradas"));
                            chart.draw(view, options);
                        }
                        </script>
                        <div id="cantidad_entradas" style="width: 100%; height:300px;"></div>
                </div>



              



                 <div class="col-xl-6" style="margin-top:10px"> 
                       <script type="text/javascript">
                          google.charts.load("current", {packages:['corechart']});
                          google.charts.setOnLoadCallback(drawChart9);
                          function drawChart9() {
                            var data = google.visualization.arrayToDataTable([
                              ["Element", "", { role: "style" } ],
                              ["Enero", <?php echo intval($cantidad_compras_enero->total_compra); ?>, "#b87333"],
                              ["Febrero", <?php echo intval($cantidad_compras_febrero->total_compra); ?>, "silver"],
                              ["Marzo", <?php echo intval($cantidad_compras_marzo->total_compra); ?>, "gold"],
                              ["Abril", <?php echo intval($cantidad_compras_abril->total_compra); ?>, "color: #e5e4e2"],
                              ["Mayo", <?php echo intval($cantidad_compras_mayo->total_compra); ?>, "color:blue"],
                              ["Junio", <?php echo intval($cantidad_compras_junio->total_compra); ?>, "color: #F0F0F0"],
                              ["Julio", <?php echo intval($cantidad_compras_julio->total_compra); ?>, "color:green"],
                              ["Agosto", <?php echo intval($cantidad_compras_agosto->total_compra); ?>, "color: #ff0000"],
                              ["Septiembre", <?php echo intval($cantidad_compras_septiembre->total_compra); ?>, "color:orange"],
                              ["Octubre", <?php echo intval($cantidad_compras_octubre->total_compra); ?>, "color: #767676"],
                              ["Noviembre", <?php echo intval($cantidad_compras_noviembre->total_compra); ?>, "color: #85e4e2"],
                              ["Diciembre", <?php echo intval($cantidad_compras_diciembre->total_compra); ?>, "color: #000000"]
                            ]);

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                             { calc: "stringify",
                                               sourceColumn: 1,
                                               type: "string",
                                               role: "annotation" },
                                             2]);

                            var options = {
                              title: "REPORTE GRÁFICO DE COMPRAS POR MESES",
                              bar: {groupWidth: "95%"},
                              legend: { position: "none" },
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById("soles_entradas"));
                            chart.draw(view, options);
                        }
                        </script>
                        <div id="soles_entradas" style="width: 100%; height:300px;"></div>
                </div>





                <div class="col-xl-6" style="margin-top:10px"> 
                       <script type="text/javascript">
                          google.charts.load("current", {packages:['corechart']});
                          google.charts.setOnLoadCallback(drawChart10);
                          function drawChart10() {
                            var data = google.visualization.arrayToDataTable([
                              ["Element", "", { role: "style" } ],
                              ["Enero", <?php echo intval($cantidad_ventas_enero->total_venta); ?>, "#b87333"],
                              ["Febrero", <?php echo intval($cantidad_ventas_febrero->total_venta); ?>, "silver"],
                              ["Marzo", <?php echo intval($cantidad_ventas_marzo->total_venta); ?>, "gold"],
                              ["Abril", <?php echo intval($cantidad_ventas_abril->total_venta); ?>, "color: #e5e4e2"],
                              ["Mayo", <?php echo intval($cantidad_ventas_mayo->total_venta); ?>, "color:blue"],
                              ["Junio", <?php echo intval($cantidad_ventas_junio->total_venta); ?>, "color: #F0F0F0"],
                              ["Julio", <?php echo intval($cantidad_ventas_julio->total_venta); ?>, "color:green"],
                              ["Agosto", <?php echo intval($cantidad_ventas_agosto->total_venta); ?>, "color: #ff0000"],
                              ["Septiembre", <?php echo intval($cantidad_ventas_septiembre->total_venta); ?>, "color:orange"],
                              ["Octubre", <?php echo intval($cantidad_ventas_octubre->total_venta); ?>, "color: #767676"],
                              ["Noviembre", <?php echo intval($cantidad_ventas_noviembre->total_venta); ?>, "color: #85e4e2"],
                              ["Diciembre", <?php echo intval($cantidad_ventas_diciembre->total_venta); ?>, "color: #000000"]
                            ]);

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                             { calc: "stringify",
                                               sourceColumn: 1,
                                               type: "string",
                                               role: "annotation" },
                                             2]);

                            var options = {
                              title: "REPORTE GRÁFICO DE VENTAS POR MESES",
                              bar: {groupWidth: "95%"},
                              legend: { position: "none" },
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById("soles_ventas"));
                            chart.draw(view, options);
                        }
                        </script>
                        <div id="soles_ventas" style="width: 100%; height:300px;"></div>
                </div>





            </div>
      
     


@endsection