<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests;
use DB;
use App;
use Session;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Obtiene el año por defecto
         $fecha = date("y-m-d"); 
         $aniodefecto =  date ("yy",(strtotime($fecha))); 
         

       if($request->user()->hasRole('administrador') || $request->user()->hasRole('jefe de almacen'))
       {

                $productos = \DB::table('productos')
                ->select('id' , 'titulo','detalle','fkcategoria','fkmarca','fkmedida')
                ->get(); 

                $categorias = App\Categoria::All();
                $marcas = App\Marca::All();
                $medidas = App\Medida::All();


            //NIVEL DESPACHO
           $cantidad_salidas_enero_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();  

            $salidas_enero_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_febrero_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            $salidas_febrero_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_marzo_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            $salidas_marzo_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_abril_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_abril_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $cantidad_salidas_mayo_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            $salidas_mayo_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 



            $cantidad_salidas_junio_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            $salidas_junio_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_julio_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            $salidas_julio_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_agosto_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_agosto_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_septiembre_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_septiembre_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            $cantidad_salidas_octubre_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_octubre_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_noviembre_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_noviembre_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_diciembre_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_diciembre_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            //FIN NIVEL DESPACHO



            //NIVEL CALIDAD
            $cantidad_salidas_enero_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            $salidas_enero_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_febrero_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_febrero_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_marzo_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_marzo_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_abril_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_abril_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_mayo_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_mayo_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_junio_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_junio_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_julio_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_julio_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_agosto_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_agosto_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_septiembre_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_septiembre_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_octubre_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            $salidas_octubre_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_noviembre_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_noviembre_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_diciembre_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            $salidas_diciembre_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            //FIN NIVEL CALIDAD




             //NIVEL INCIDENCIAS

            $cantidad_salidas_enero_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_enero_incidencia=0;
            $salidas_enero_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get(); 

            foreach($salidas_enero_incidencia_gets as $salidas_enero_incidencia_get)
            {
               $salidas_enero_incidencia++; 
            }



            $cantidad_salidas_febrero_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_febrero_incidencia=0;
            $salidas_febrero_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get(); 

            foreach($salidas_febrero_incidencia_gets as $salidas_febrero_incidencia_get)
            {
                 $salidas_febrero_incidencia++;
            }



            $cantidad_salidas_marzo_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_marzo_incidencia=0;
            $salidas_marzo_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get();  

            foreach($salidas_marzo_incidencia_gets as $salidas_marzo_incidencia_get)
            {
                 $salidas_marzo_incidencia++;
            }




            $cantidad_salidas_abril_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $salidas_abril_incidencia=0;
            $salidas_abril_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get();  

            foreach($salidas_abril_incidencia_gets as $salidas_abril_incidencia_get)
            {
                 $salidas_abril_incidencia++;
            }




            $cantidad_salidas_mayo_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_mayo_incidencia=0;
            $salidas_mayo_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get(); 

            foreach($salidas_mayo_incidencia_gets as $salidas_mayo_incidencia_get)
            {
                 $salidas_mayo_incidencia++;
            } 




            $cantidad_salidas_junio_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_junio_incidencia=0;
            $salidas_junio_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get(); 

            foreach($salidas_junio_incidencia_gets as $salidas_junio_incidencia_get)
            {
                 $salidas_junio_incidencia++;
            }




            $cantidad_salidas_julio_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_julio_incidencia=0;
            $salidas_julio_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get();  

            foreach($salidas_julio_incidencia_gets as $salidas_julio_incidencia_get)
            {
                 $salidas_julio_incidencia++;
            }




            $cantidad_salidas_agosto_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $salidas_agosto_incidencia=0;
            $salidas_agosto_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get(); 

            foreach($salidas_agosto_incidencia_gets as $salidas_agosto_incidencia_get)
            {
                 $salidas_agosto_incidencia++;
            }




            $cantidad_salidas_septiembre_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_septiembre_incidencia=0;
            $salidas_septiembre_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get();  


            foreach($salidas_septiembre_incidencia_gets as $salidas_septiembre_incidencia_get)
            {
                 $salidas_septiembre_incidencia++;
            }




            $cantidad_salidas_octubre_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_octubre_incidencia=0;
            $salidas_octubre_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get();  

            foreach($salidas_octubre_incidencia_gets as $salidas_octubre_incidencia_get)
            {
                 $salidas_octubre_incidencia++;
            }



            $cantidad_salidas_noviembre_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $salidas_noviembre_incidencia=0;
            $salidas_noviembre_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get(); 

            foreach($salidas_noviembre_incidencia_gets as $salidas_noviembre_incidencia_get)
            {
                 $salidas_noviembre_incidencia++;
            }



            $cantidad_salidas_diciembre_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $salidas_diciembre_incidencia=0;
            $salidas_diciembre_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $aniodefecto)
                ->get();  

            foreach($salidas_diciembre_incidencia_gets as $salidas_diciembre_incidencia_get)
            {
                 $salidas_diciembre_incidencia++;
            }

            //FIN NIVEL INCIDENCIAS
            



             //SALIDAS
            $cantidad_salidas_enero = \DB::table('salidas')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_salidas_febrero = \DB::table('salidas')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_marzo = \DB::table('salidas')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_abril = \DB::table('salidas')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_mayo = \DB::table('salidas')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_junio = \DB::table('salidas')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_julio = \DB::table('salidas')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_agosto = \DB::table('salidas')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_septiembre = \DB::table('salidas')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_salidas_octubre = \DB::table('salidas')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();  


            $cantidad_salidas_noviembre = \DB::table('salidas')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $cantidad_salidas_diciembre = \DB::table('salidas')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            //FIN SALIDAS



             //ENTRADAS
            $cantidad_entradas_enero = \DB::table('entradas')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 


            $cantidad_entradas_febrero = \DB::table('entradas')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_entradas_marzo = \DB::table('entradas')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_entradas_abril = \DB::table('entradas')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_entradas_mayo = \DB::table('entradas')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_entradas_junio = \DB::table('entradas')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_entradas_julio = \DB::table('entradas')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_entradas_agosto = \DB::table('entradas')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_entradas_septiembre = \DB::table('entradas')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();


            $cantidad_entradas_octubre = \DB::table('entradas')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();  


            $cantidad_entradas_noviembre = \DB::table('entradas')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count();

            $cantidad_entradas_diciembre = \DB::table('entradas')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $aniodefecto)
                ->count(); 

            //FIN ENTRADAS


             //COMPRAS
            $cantidad_compras_enero = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_febrero = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_marzo = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_abril = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_mayo = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_junio = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_julio = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_agosto = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_septiembre = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_octubre = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first(); 

            $cantidad_compras_noviembre = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first(); 

            $cantidad_compras_diciembre = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            //FIN COMPRAS



            //VENTAS
            $cantidad_ventas_enero = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_febrero = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_marzo = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_abril = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_mayo = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_junio = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_julio = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_agosto = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_septiembre = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_octubre = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_noviembre = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_diciembre = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $aniodefecto)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            //FIN VENTAS


            //Inventory Dolar Day

            $inventory_dolar_day = \DB::table("productos")
            ->join(\DB::raw("(
                select p.id as Productid,
/*ifnull((select precio_compra from audi_producto ap where p.id = ap.fkproducto order by ap.id desc limit 1,1),0) as precioActual,
ifnull((p.stock - ifnull((select dt.stock from detalle_entradas dt where dt.fkproducto = p.id order by p.id desc limit 1),0)),0) as stockActual,
ifnull((select precio_compra from audi_producto ap where p.id = ap.fkproducto order by ap.id desc limit 1),0) as precioNuevo,
ifnull((select dt.stock from detalle_entradas dt where dt.fkproducto = p.id order by p.id desc limit 1),0) as stockNuevo,
ifnull(p.stock,0) as stockTotal,*/
                ifnull(
                (
                    (
                      (
                        ifnull((select ap.precio_compra from audi_producto ap where ap.id = (select max(ap1.id)-1 from audi_producto ap1 where ap1.fkproducto = p.id)),0)
                        *ifnull((p.stock - (select de.stock from detalle_entradas de where de.id = (select max(de1.id) from detalle_entradas de1 where de1.fkproducto = p.id))),0)
                      )+
                      (
                        ifnull((select ap.precio_compra from audi_producto ap where ap.id = (select max(ap1.id) from audi_producto ap1 where ap1.fkproducto = p.id)),0)
                        *ifnull((select de.stock from detalle_entradas de where de.id = (select max(de1.id) from detalle_entradas de1 where de1.fkproducto = p.id)),0)
                         )
                    )/
                p.stock
                )
                ,0) as promedio
                
                from productos p
                 left join detalle_entradas de on p.id = de.fkproducto
                 group by p.id) t0"),"productos.id","=","t0.Productid")
            ->select(
                \DB::raw("ROUND(SUM(t0.promedio),2) as 'Costo_promedio_por_unidad'"),
                \DB::raw("ROUND(SUM(productos.stock),2) as 'Stock_Total'"),
                \DB::raw("round(ROUND(SUM(t0.promedio),2) * round(SUM(productos.stock),2),2) as 'Inventory_Sun_Day'")
            )->get();




             return view('auth.dashboard-administrador',compact('inventory_dolar_day','aniodefecto','fecha','productos','categorias','marcas','medidas','salidas_enero_despacho','salidas_febrero_despacho','salidas_marzo_despacho','salidas_abril_despacho','salidas_mayo_despacho','salidas_junio_despacho','salidas_julio_despacho','salidas_agosto_despacho','salidas_septiembre_despacho','salidas_octubre_despacho','salidas_noviembre_despacho','salidas_diciembre_despacho' ,'salidas_enero_calidad','salidas_febrero_calidad','salidas_marzo_calidad','salidas_abril_calidad','salidas_mayo_calidad','salidas_junio_calidad','salidas_julio_calidad','salidas_agosto_calidad','salidas_septiembre_calidad','salidas_octubre_calidad','salidas_noviembre_calidad','salidas_diciembre_calidad','salidas_enero_incidencia','salidas_febrero_incidencia','salidas_marzo_incidencia','salidas_abril_incidencia','salidas_mayo_incidencia','salidas_junio_incidencia','salidas_julio_incidencia','salidas_agosto_incidencia','salidas_septiembre_incidencia','salidas_octubre_incidencia','salidas_noviembre_incidencia','salidas_diciembre_incidencia','cantidad_salidas_enero_despacho','cantidad_salidas_febrero_despacho','cantidad_salidas_marzo_despacho','cantidad_salidas_abril_despacho','cantidad_salidas_mayo_despacho','cantidad_salidas_junio_despacho','cantidad_salidas_julio_despacho','cantidad_salidas_agosto_despacho','cantidad_salidas_septiembre_despacho','cantidad_salidas_octubre_despacho','cantidad_salidas_noviembre_despacho','cantidad_salidas_diciembre_despacho','cantidad_salidas_enero_calidad','cantidad_salidas_febrero_calidad','cantidad_salidas_marzo_calidad','cantidad_salidas_abril_calidad','cantidad_salidas_mayo_calidad','cantidad_salidas_junio_calidad','cantidad_salidas_julio_calidad','cantidad_salidas_agosto_calidad','cantidad_salidas_septiembre_calidad','cantidad_salidas_octubre_calidad','cantidad_salidas_noviembre_calidad','cantidad_salidas_diciembre_calidad','cantidad_salidas_enero_incidencia','cantidad_salidas_febrero_incidencia','cantidad_salidas_marzo_incidencia','cantidad_salidas_abril_incidencia','cantidad_salidas_mayo_incidencia','cantidad_salidas_junio_incidencia','cantidad_salidas_julio_incidencia','cantidad_salidas_agosto_incidencia','cantidad_salidas_septiembre_incidencia','cantidad_salidas_octubre_incidencia','cantidad_salidas_noviembre_incidencia','cantidad_salidas_diciembre_incidencia' ,'cantidad_salidas_enero','cantidad_salidas_febrero','cantidad_salidas_marzo','cantidad_salidas_abril','cantidad_salidas_mayo','cantidad_salidas_junio','cantidad_salidas_julio','cantidad_salidas_agosto','cantidad_salidas_septiembre','cantidad_salidas_octubre','cantidad_salidas_noviembre','cantidad_salidas_diciembre','cantidad_entradas_enero','cantidad_entradas_febrero','cantidad_entradas_marzo','cantidad_entradas_abril','cantidad_entradas_mayo','cantidad_entradas_junio','cantidad_entradas_julio','cantidad_entradas_agosto','cantidad_entradas_septiembre','cantidad_entradas_octubre','cantidad_entradas_noviembre','cantidad_entradas_diciembre' , 'cantidad_compras_enero','cantidad_compras_febrero','cantidad_compras_marzo','cantidad_compras_abril','cantidad_compras_mayo','cantidad_compras_junio','cantidad_compras_julio','cantidad_compras_agosto','cantidad_compras_septiembre','cantidad_compras_octubre','cantidad_compras_noviembre','cantidad_compras_diciembre'  , 'cantidad_ventas_enero','cantidad_ventas_febrero','cantidad_ventas_marzo','cantidad_ventas_abril','cantidad_ventas_mayo','cantidad_ventas_junio','cantidad_ventas_julio','cantidad_ventas_agosto','cantidad_ventas_septiembre','cantidad_ventas_octubre','cantidad_ventas_noviembre','cantidad_ventas_diciembre')); 


       
       }else if($request->user()->hasRole('almacenero'))
       {
            return redirect('productos');
            // return view('productos.listar'); 

       }else if($request->user()->hasRole('asistente de almacen'))
       {
            return redirect('entradas');
            // return view('entradas.listar'); 

       }

    }

    public function consultar_anio(Request $request,  $anioconsulta)
    {
        
       if($request->user()->hasRole('administrador') || $request->user()->hasRole('jefe de almacen'))
       {

                $productos = \DB::table('productos')
                ->select('id' , 'titulo','detalle','fkcategoria','fkmarca','fkmedida')
                ->get(); 

                $categorias = App\Categoria::All();
                $marcas = App\Marca::All();
                $medidas = App\Medida::All();


            //NIVEL DESPACHO
           $cantidad_salidas_enero_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();  

            $salidas_enero_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_febrero_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            $salidas_febrero_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_marzo_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            $salidas_marzo_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_abril_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_abril_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $cantidad_salidas_mayo_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            $salidas_mayo_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 



            $cantidad_salidas_junio_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            $salidas_junio_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_julio_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            $salidas_julio_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_agosto_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_agosto_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_septiembre_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_septiembre_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            $cantidad_salidas_octubre_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_octubre_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_noviembre_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_noviembre_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_diciembre_despacho = \DB::table('salidas')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_diciembre_despacho = \DB::table('salidas')
                ->where('fkestado',3)
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            //FIN NIVEL DESPACHO



            //NIVEL CALIDAD
            $cantidad_salidas_enero_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            $salidas_enero_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_febrero_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_febrero_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_marzo_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_marzo_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_abril_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_abril_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_mayo_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_mayo_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_junio_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_junio_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_julio_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_julio_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_agosto_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_agosto_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_septiembre_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_septiembre_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_octubre_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            $salidas_octubre_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_noviembre_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_noviembre_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_diciembre_calidad = \DB::table('salidas')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            $salidas_diciembre_calidad = \DB::table('salidas')
                ->where('generado','SI')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            //FIN NIVEL CALIDAD




             //NIVEL INCIDENCIAS

            $cantidad_salidas_enero_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_enero_incidencia=0;
            $salidas_enero_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get(); 

            foreach($salidas_enero_incidencia_gets as $salidas_enero_incidencia_get)
            {
               $salidas_enero_incidencia++; 
            }



            $cantidad_salidas_febrero_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_febrero_incidencia=0;
            $salidas_febrero_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get(); 

            foreach($salidas_febrero_incidencia_gets as $salidas_febrero_incidencia_get)
            {
                 $salidas_febrero_incidencia++;
            }



            $cantidad_salidas_marzo_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_marzo_incidencia=0;
            $salidas_marzo_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get();  

            foreach($salidas_marzo_incidencia_gets as $salidas_marzo_incidencia_get)
            {
                 $salidas_marzo_incidencia++;
            }




            $cantidad_salidas_abril_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $salidas_abril_incidencia=0;
            $salidas_abril_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get();  

            foreach($salidas_abril_incidencia_gets as $salidas_abril_incidencia_get)
            {
                 $salidas_abril_incidencia++;
            }




            $cantidad_salidas_mayo_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_mayo_incidencia=0;
            $salidas_mayo_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get(); 

            foreach($salidas_mayo_incidencia_gets as $salidas_mayo_incidencia_get)
            {
                 $salidas_mayo_incidencia++;
            } 




            $cantidad_salidas_junio_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_junio_incidencia=0;
            $salidas_junio_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get(); 

            foreach($salidas_junio_incidencia_gets as $salidas_junio_incidencia_get)
            {
                 $salidas_junio_incidencia++;
            }




            $cantidad_salidas_julio_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_julio_incidencia=0;
            $salidas_julio_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get();  

            foreach($salidas_julio_incidencia_gets as $salidas_julio_incidencia_get)
            {
                 $salidas_julio_incidencia++;
            }




            $cantidad_salidas_agosto_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $salidas_agosto_incidencia=0;
            $salidas_agosto_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get(); 

            foreach($salidas_agosto_incidencia_gets as $salidas_agosto_incidencia_get)
            {
                 $salidas_agosto_incidencia++;
            }




            $cantidad_salidas_septiembre_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_septiembre_incidencia=0;
            $salidas_septiembre_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get();  


            foreach($salidas_septiembre_incidencia_gets as $salidas_septiembre_incidencia_get)
            {
                 $salidas_septiembre_incidencia++;
            }




            $cantidad_salidas_octubre_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_octubre_incidencia=0;
            $salidas_octubre_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get();  

            foreach($salidas_octubre_incidencia_gets as $salidas_octubre_incidencia_get)
            {
                 $salidas_octubre_incidencia++;
            }



            $cantidad_salidas_noviembre_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $salidas_noviembre_incidencia=0;
            $salidas_noviembre_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get(); 

            foreach($salidas_noviembre_incidencia_gets as $salidas_noviembre_incidencia_get)
            {
                 $salidas_noviembre_incidencia++;
            }



            $cantidad_salidas_diciembre_incidencia = \DB::table('salidas')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $salidas_diciembre_incidencia=0;
            $salidas_diciembre_incidencia_gets = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->groupby('fksalida')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $anioconsulta)
                ->get();  

            foreach($salidas_diciembre_incidencia_gets as $salidas_diciembre_incidencia_get)
            {
                 $salidas_diciembre_incidencia++;
            }

            //FIN NIVEL INCIDENCIAS
            



             //SALIDAS
            $cantidad_salidas_enero = \DB::table('salidas')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_salidas_febrero = \DB::table('salidas')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_marzo = \DB::table('salidas')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_abril = \DB::table('salidas')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_mayo = \DB::table('salidas')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_junio = \DB::table('salidas')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_julio = \DB::table('salidas')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_agosto = \DB::table('salidas')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_septiembre = \DB::table('salidas')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_salidas_octubre = \DB::table('salidas')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();  


            $cantidad_salidas_noviembre = \DB::table('salidas')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $cantidad_salidas_diciembre = \DB::table('salidas')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            //FIN SALIDAS



             //ENTRADAS
            $cantidad_entradas_enero = \DB::table('entradas')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 


            $cantidad_entradas_febrero = \DB::table('entradas')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_entradas_marzo = \DB::table('entradas')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_entradas_abril = \DB::table('entradas')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_entradas_mayo = \DB::table('entradas')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_entradas_junio = \DB::table('entradas')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_entradas_julio = \DB::table('entradas')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_entradas_agosto = \DB::table('entradas')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_entradas_septiembre = \DB::table('entradas')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();


            $cantidad_entradas_octubre = \DB::table('entradas')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();  


            $cantidad_entradas_noviembre = \DB::table('entradas')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count();

            $cantidad_entradas_diciembre = \DB::table('entradas')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $anioconsulta)
                ->count(); 

            //FIN ENTRADAS


             //COMPRAS
            $cantidad_compras_enero = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_febrero = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_marzo = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_abril = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_mayo = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_junio = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_julio = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_agosto = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_septiembre = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            $cantidad_compras_octubre = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first(); 

            $cantidad_compras_noviembre = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first(); 

            $cantidad_compras_diciembre = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_compra) as total_compra'))
                ->first();

            //FIN COMPRAS



            //VENTAS
            $cantidad_ventas_enero = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '01')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_febrero = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '02')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_marzo = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '03')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_abril = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '04')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_mayo = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '05')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_junio = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '06')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_julio = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '07')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_agosto = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '08')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_septiembre = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '09')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_octubre = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '10')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_noviembre = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '11')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();

            $cantidad_ventas_diciembre = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fkentrada', '=', 'salidas.id')
                ->whereMonth('fecha', '=', '12')
                ->whereYear('fecha', '=', $anioconsulta)
                ->select( DB::raw('SUM(precio_venta) as total_venta'))
                ->first();


            //Inventory Dolar Day

            $inventory_dolar_day = \DB::table("productos")
            ->join(\DB::raw("(select 
                                        p.id as Productid,
                                           ifnull(
                                           (
                                               (
                                                 (
                                                   ifnull((select ap.precio_compra from audi_producto ap where ap.fkproducto = p.id order by ap.id desc limit 1,1),0)
                                                   *ifnull((p.stock - (select dt.stock from detalle_entradas dt where dt.fkproducto = p.id order by p.id desc limit 1)),0)
                                                 )+
                                                 (
                                                   ifnull((select ap.precio_compra from audi_producto ap where ap.fkproducto = p.id order by ap.id desc limit 1),0)
                                                   *ifnull((select dt.stock from detalle_entradas dt where dt.fkproducto = p.id order by p.id desc limit 1),0)
                                                    )
                                               )/
                                           p.stock
                                           )
                                           ,0) as promedio
                                           
                                           from productos p
                                            left join detalle_entradas de on p.id = de.fkproducto
                                            group by p.id) t0"),"productos.id","=","t0.Productid")
            ->select(
                \DB::raw("ROUND(SUM(t0.promedio),2) as 'Costo_promedio_por_unidad'"),
                \DB::raw("ROUND(SUM(productos.stock),2) as 'Stock_Total'"),
                \DB::raw("ROUND(SUM(t0.promedio) * SUM(productos.stock),2) as 'Inventory_Sun_Day'")
            )->get();



            //FIN VENTAS

             return view('auth.dashboard-administrador',compact('inventory_dolar_day','anioconsulta','productos','categorias','marcas','medidas','salidas_enero_despacho','salidas_febrero_despacho','salidas_marzo_despacho','salidas_abril_despacho','salidas_mayo_despacho','salidas_junio_despacho','salidas_julio_despacho','salidas_agosto_despacho','salidas_septiembre_despacho','salidas_octubre_despacho','salidas_noviembre_despacho','salidas_diciembre_despacho' ,'salidas_enero_calidad','salidas_febrero_calidad','salidas_marzo_calidad','salidas_abril_calidad','salidas_mayo_calidad','salidas_junio_calidad','salidas_julio_calidad','salidas_agosto_calidad','salidas_septiembre_calidad','salidas_octubre_calidad','salidas_noviembre_calidad','salidas_diciembre_calidad','salidas_enero_incidencia','salidas_febrero_incidencia','salidas_marzo_incidencia','salidas_abril_incidencia','salidas_mayo_incidencia','salidas_junio_incidencia','salidas_julio_incidencia','salidas_agosto_incidencia','salidas_septiembre_incidencia','salidas_octubre_incidencia','salidas_noviembre_incidencia','salidas_diciembre_incidencia','cantidad_salidas_enero_despacho','cantidad_salidas_febrero_despacho','cantidad_salidas_marzo_despacho','cantidad_salidas_abril_despacho','cantidad_salidas_mayo_despacho','cantidad_salidas_junio_despacho','cantidad_salidas_julio_despacho','cantidad_salidas_agosto_despacho','cantidad_salidas_septiembre_despacho','cantidad_salidas_octubre_despacho','cantidad_salidas_noviembre_despacho','cantidad_salidas_diciembre_despacho','cantidad_salidas_enero_calidad','cantidad_salidas_febrero_calidad','cantidad_salidas_marzo_calidad','cantidad_salidas_abril_calidad','cantidad_salidas_mayo_calidad','cantidad_salidas_junio_calidad','cantidad_salidas_julio_calidad','cantidad_salidas_agosto_calidad','cantidad_salidas_septiembre_calidad','cantidad_salidas_octubre_calidad','cantidad_salidas_noviembre_calidad','cantidad_salidas_diciembre_calidad','cantidad_salidas_enero_incidencia','cantidad_salidas_febrero_incidencia','cantidad_salidas_marzo_incidencia','cantidad_salidas_abril_incidencia','cantidad_salidas_mayo_incidencia','cantidad_salidas_junio_incidencia','cantidad_salidas_julio_incidencia','cantidad_salidas_agosto_incidencia','cantidad_salidas_septiembre_incidencia','cantidad_salidas_octubre_incidencia','cantidad_salidas_noviembre_incidencia','cantidad_salidas_diciembre_incidencia' ,'cantidad_salidas_enero','cantidad_salidas_febrero','cantidad_salidas_marzo','cantidad_salidas_abril','cantidad_salidas_mayo','cantidad_salidas_junio','cantidad_salidas_julio','cantidad_salidas_agosto','cantidad_salidas_septiembre','cantidad_salidas_octubre','cantidad_salidas_noviembre','cantidad_salidas_diciembre','cantidad_entradas_enero','cantidad_entradas_febrero','cantidad_entradas_marzo','cantidad_entradas_abril','cantidad_entradas_mayo','cantidad_entradas_junio','cantidad_entradas_julio','cantidad_entradas_agosto','cantidad_entradas_septiembre','cantidad_entradas_octubre','cantidad_entradas_noviembre','cantidad_entradas_diciembre' , 'cantidad_compras_enero','cantidad_compras_febrero','cantidad_compras_marzo','cantidad_compras_abril','cantidad_compras_mayo','cantidad_compras_junio','cantidad_compras_julio','cantidad_compras_agosto','cantidad_compras_septiembre','cantidad_compras_octubre','cantidad_compras_noviembre','cantidad_compras_diciembre'  , 'cantidad_ventas_enero','cantidad_ventas_febrero','cantidad_ventas_marzo','cantidad_ventas_abril','cantidad_ventas_mayo','cantidad_ventas_junio','cantidad_ventas_julio','cantidad_ventas_agosto','cantidad_ventas_septiembre','cantidad_ventas_octubre','cantidad_ventas_noviembre','cantidad_ventas_diciembre')); 


       
       }else if($request->user()->hasRole('almacenero'))
       {
            return redirect('productos');
            // return view('productos.listar'); 

       }else if($request->user()->hasRole('asistente de almacen'))
       {
            return redirect('entradas');
            // return view('entradas.listar'); 

         }
    }
          
}

