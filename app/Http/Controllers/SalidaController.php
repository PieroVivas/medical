<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests;

use App;
use Session;
use Redirect;

class SalidaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidas = App\Salida::all();
        $clientes = App\Cliente::all();
        $estados = App\Estado::all();

        $cantidad_salidas = \DB::table('salidas')->count();

        return view('salidas.listar',compact('salidas','clientes','estados','cantidad_salidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salidaNueva= new App\Salida;
        $salidaNueva->numero = $request->numero;
        $salidaNueva->fkcliente = $request->cliente;
        $salidaNueva->fecha = $request->fecha;
        $salidaNueva->hora_entrada = date("H:i:s");

        $salidaNueva->save();

        return $salidaNueva->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $salida = App\Salida::find($id);

         $clientes = App\Cliente::all();

         $estados = App\Estado::all();
        
         $productos = \DB::table('detalle_entradas')
                ->join('productos', 'detalle_entradas.fkproducto', '=', 'productos.id')
                ->join('marcas', 'productos.fkmarca', '=', 'marcas.id')
                ->join('medidas', 'productos.fkmedida', '=', 'medidas.id')
                ->select('detalle_entradas.id as id','productos.id as id_producto','marca','medida','detalle_entradas.cantidad as cantidad','titulo','detalle_entradas.precio_venta','detalle_entradas.precio_compra','fecha_vencimiento','detalle_entradas.stock as stock')
                ->get();


         $salidas = \DB::table('detalle_salidas')
                ->join('detalle_entradas', 'detalle_salidas.fkentrada', '=', 'detalle_entradas.id')
                ->join('productos', 'detalle_entradas.fkproducto', '=', 'productos.id')
                ->join('marcas', 'productos.fkmarca', '=', 'marcas.id')
                 ->join('medidas', 'productos.fkmedida', '=', 'medidas.id')
                ->select('detalle_salidas.id as id','productos.id as id_producto','marca','medida','detalle_salidas.cantidad as cantidad','titulo','detalle_entradas.precio_venta','detalle_entradas.precio_compra','fecha_vencimiento','detalle_entradas.id as id_entrada')
                ->where('detalle_salidas.fksalida',$id)
                ->get();


        $mensajes = \DB::table('mensajes')
                ->select('id')
                ->where('fksalida',$id)
                ->count();

        // show the edit form and pass the nerd
        return View('salidas.edit', compact('salida','clientes', 'productos','salidas','estados','mensajes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    {
       
        $salidaUpdate= App\Salida::find($request->id);
        $salidaUpdate->numero = $request->numero;
        $salidaUpdate->fkcliente = $request->cliente;
        $salidaUpdate->fecha = $request->fecha;
        $salidaUpdate->fkestado = $request->estado;
        $salidaUpdate->generado = $request->generado;
        $salidaUpdate->save();

        if($request->detalle!="") 
        {
            $Mensaje= new App\Mensaje;
            $Mensaje->fksalida = $request->id;
            $Mensaje->detalle = $request->detalle;
            $Mensaje->fkestado = $request->estado;
            $Mensaje->save();
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


     public function eliminar_salida(Request $request)
    {
        if(isset($request->id)) 
        {
            $salida = App\Salida::find($request->id);
            $salida->delete();
        }
    }



    public function salida($id_producto,$id_salida)
    {
        $salida = App\Salida::find($id_salida);
    
        $producto = \DB::table('detalle_entradas')
                ->join('productos', 'detalle_entradas.fkproducto', '=', 'productos.id')
                ->join('marcas', 'productos.fkmarca', '=', 'marcas.id')
                ->join('medidas', 'productos.fkmedida', '=', 'medidas.id')
                ->select('detalle_entradas.id as id','productos.id as id_producto','marca','medida','detalle_entradas.cantidad as cantidad','titulo','precio_compra','precio_venta','fecha_vencimiento','detalle_entradas.stock as stock')
                ->where('detalle_entradas.id',$id_producto)
                ->first();

         $marcas = App\Marca::all();
         $medidas = App\Medida::all();


        return View('salidas.detalle', compact('salida','producto','medidas','marcas'));
    }



    public function agregar_detalle_salida(Request $request)
    {
        $DetalleSalida = new App\DetalleSalida();
        $DetalleSalida->cantidad = $request->cantidad;

        $DetalleSalida->fkproducto = $request->id_producto;
        $DetalleSalida->fkentrada = $request->id_entrada;
        $DetalleSalida->fksalida = $request->id_salida;
        $DetalleSalida->precio_compra = $request->precio_compra;
        $DetalleSalida->precio_venta = $request->precio_venta;
        $DetalleSalida->save();

        $entrada = App\DetalleEntrada::find($request->id_entrada);
        $cantidad_final_entrada= $entrada->stock*1 - $request->cantidad;
        $entrada->stock = $cantidad_final_entrada;
        $entrada->save();

        $producto = App\Producto::find($request->id_producto);
        $cantidad_final= $producto->stock*1 - $request->cantidad;
        $producto->stock = $cantidad_final;
        $producto->save();


        $salida = App\Salida::find($request->id_salida);
        $fecha_registro= date("d-m-y",strtotime($salida->created_at));
        $fecha_hoy=date("d-m-y");


        if($fecha_registro==$fecha_hoy)
        {
                $hora_entrada  = $salida->hora_entrada;
                $porciones_hora_entrada = explode(":", $hora_entrada);
                $horas_entrada = $porciones_hora_entrada[0]; 
                $minutos_entrada =$porciones_hora_entrada[1];
                $segundos_entrada =$porciones_hora_entrada[2];

                $total_entrada_segundos=$horas_entrada*3600 + $minutos_entrada*60 + $segundos_entrada;


                $hora_salida  = date("H:i:s");
                $porciones_hora_salida = explode(":", $hora_salida);
                $horas_salida = $porciones_hora_salida[0]; 
                $minutos_salida =$porciones_hora_salida[1];
                $segundos_salida =$porciones_hora_salida[2];

                $total_salida_segundos=$horas_salida*3600 + $minutos_salida*60 + $segundos_salida;

            $salida->hora_salida = $hora_salida;    
            $salida->tiempo = $total_salida_segundos*1 - $total_entrada_segundos*1;
            $salida->save();
        }


    }


     public function eliminar_detalle_salida(Request $request)
    {
        if(isset($request->id)) 
        {
            $DetalleSalida = App\DetalleSalida::find($request->id);
            $DetalleSalida->delete();

            $producto = App\Producto::find($request->id_producto);
            $cantidad_final= $producto->stock*1 + $request->cantidad;
            $producto->stock = $cantidad_final;
            $producto->save();

            $entrada = App\DetalleEntrada::find($request->id_entrada);
            $cantidad_final_entrada= $entrada->stock*1 + $request->cantidad;
            $entrada->stock = $cantidad_final_entrada;
            $entrada->save();


        }
    }



    public function indicador_cumplimiento($fecha_inicial,$fecha_final)
    {
        //ORM
        $salidas = \DB::table('salidas')
                ->join('estados', 'salidas.fkestado', '=', 'estados.id')
                ->select('salidas.id as id','fecha','fkestado','estado')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->groupby('fecha')
                ->get();

        $salidas_generales = \DB::table('salidas')
                ->join('estados', 'salidas.fkestado', '=', 'estados.id')
                ->select('salidas.id as id','fecha','fkestado','estado')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->get();

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;

        return view('salidas.cumplimiento',compact('salidas','salidas_generales','fecha_inicial','fecha_final'));
    }

    public function indicador_ganancia($fecha_inicial,$fecha_final)
    {
        //ORM
        // $salidas = \DB::table('salidas')
        //         ->join('estados', 'salidas.fkestado', '=', 'estados.id')
        //         ->select('salidas.id as id','fecha','fkestado','estado')
        //         ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
        //         ->groupby('fecha')
        //         ->get();

        // $salidas_generales = \DB::table('salidas')
        //         ->join('estados', 'salidas.fkestado', '=', 'estados.id')
        //         ->select('salidas.id as id','fecha','fkestado','estado')
        //         ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
        //         ->get();
        $results = \DB::select(\DB::raw("call obtenerGananciaPorProducto('$fecha_inicial','$fecha_final')"));

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;


        return view('salidas.reporte_ganancia',compact('results','fecha_inicial','fecha_final'));
    }

    public function indicador_ganancia_consolidado($fecha_inicial,$fecha_final)
    {
        //ORM
        // $salidas = \DB::table('salidas')
        //         ->join('estados', 'salidas.fkestado', '=', 'estados.id')
        //         ->select('salidas.id as id','fecha','fkestado','estado')
        //         ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
        //         ->groupby('fecha')
        //         ->get();

        // $salidas_generales = \DB::table('salidas')
        //         ->join('estados', 'salidas.fkestado', '=', 'estados.id')
        //         ->select('salidas.id as id','fecha','fkestado','estado')
        //         ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
        //         ->get();
        $results = \DB::select(\DB::raw("call obtenerGananciaPorProductoConsolidado('$fecha_inicial','$fecha_final')"));

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;


        return view('salidas.reporte_ganancia_consolidado',compact('results','fecha_inicial','fecha_final'));
    }


    public function indicador_empleado($fecha_inicial,$fecha_final)
    {

        $salidas = \DB::table('salidas')
                ->join('estados', 'salidas.fkestado', '=', 'estados.id')
                ->select('salidas.id as id','fecha','fkestado','estado')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->groupby('fecha')
                ->get();

        $salidas_generales = \DB::table('salidas')
                ->join('estados', 'salidas.fkestado', '=', 'estados.id')
                ->select('salidas.id as id','fecha','fkestado','estado')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->get();

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;

        return view('salidas.empleado',compact('salidas','salidas_generales','fecha_inicial','fecha_final'));
    }


  
     public function indicador_calidad($fecha_inicial,$fecha_final)
    {

        $salidas = \DB::table('salidas')
                ->join('estados', 'salidas.fkestado', '=', 'estados.id')
                ->select('salidas.id as id','fecha','fkestado','estado','generado')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->groupby('fecha')
                ->get();

        $salidas_generales = \DB::table('salidas')
                ->join('estados', 'salidas.fkestado', '=', 'estados.id')
                ->select('salidas.id as id','fecha','fkestado','estado','generado')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->get();

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;

        return view('salidas.calidad',compact('salidas','salidas_generales','fecha_inicial','fecha_final'));
    }



    public function indicador_ingreso($fecha_inicial,$fecha_final)
    {

        $ingresos = \DB::table('entradas')
                ->select('id','fecha','hora_entrada','hora_salida','tiempo','numero')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->orderby('fecha','asc')
                ->get();

       

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;

        return view('salidas.ingreso',compact('ingresos','fecha_inicial','fecha_final'));
    }



    public function indicador_salida($fecha_inicial,$fecha_final)
    {

        $salidas = \DB::table('salidas')
                ->select('id','fecha','hora_entrada','hora_salida','tiempo','numero')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->orderby('fecha','asc')
                ->get();

       

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;

        return view('salidas.salida',compact('salidas','fecha_inicial','fecha_final'));
    }



   


    public function indicador_volumen($fecha_inicial,$fecha_final)
    {

        $salidas = \DB::table('salidas')
                ->join('estados', 'salidas.fkestado', '=', 'estados.id')
                ->select('salidas.id as id','fecha','fkestado','estado','generado')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->groupby('fecha')
                ->get();

        $salidas_generales = \DB::table('detalle_salidas')
                ->join('salidas', 'detalle_salidas.fksalida', '=', 'salidas.id')
                ->join('estados', 'salidas.fkestado', '=', 'estados.id')
                ->select('salidas.id as id','fecha','fkestado','estado','generado','cantidad','precio_compra','precio_venta')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->get();

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;

        return view('salidas.volumen',compact('salidas','salidas_generales','fecha_inicial','fecha_final'));
    }



    public function indicador_incidencia($fecha_inicial,$fecha_final)
    {

        $salidas = \DB::table('salidas')
                ->join('estados', 'salidas.fkestado', '=', 'estados.id')
                ->select('salidas.id as id','fecha','fkestado','estado','generado')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->groupby('fecha')
                ->get();

        $salidas_generales = \DB::table('salidas')
                ->join('estados', 'salidas.fkestado', '=', 'estados.id')
                ->select('salidas.id as id','fecha','fkestado','estado','generado')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->get();

        $salidas_mensajes = \DB::table('mensajes')
                ->join('salidas', 'mensajes.fksalida', '=', 'salidas.id')
                ->select('salidas.id as id','fecha')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->groupby('fksalida')
                ->get();

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;

        return view('salidas.incidencia',compact('salidas','salidas_generales','fecha_inicial','fecha_final','salidas_mensajes'));
    }



   public function mensajes($id_salida)
    {
        $salida = App\Salida::find($id_salida);
    
        $mensajes = \DB::table('mensajes')
                ->join('estados', 'mensajes.fkestado', '=', 'estados.id')
                ->select('mensajes.id as id','detalle','estado','mensajes.created_at')
                ->where('fksalida',$id_salida)
                ->orderby('mensajes.created_at','desc')
                ->get();

    
        return View('salidas.mensajes', compact('salida','mensajes'));
    }



    public function inventario()
    {
        //  $productos = \DB::table('productos')
        //         ->join('marcas', 'productos.fkmarca', '=', 'marcas.id')
        //         ->join('categorias', 'productos.fkcategoria', '=', 'categorias.id')
        //         ->join('medidas', 'productos.fkmedida', '=', 'medidas.id')
        //         ->leftJoin('detalle_entradas','productos.id','=','detalle_entradas.fkproducto')
        //         ->groupBy('productos.id')
        //         ->select('productos.id as id','marcas.marca','categorias.categoria','productos.titulo','medidas.medida','productos.stock','detalle_entradas.precio_venta',\DB::raw('sum(detalle_entradas.precio_compra) as sumatoria'),\DB::raw('sum(detalle_entradas.precio_compra)/productos.stock as promedio'))
        //        ->get();

        $productos = \DB::table('productos')
                ->join('marcas', 'productos.fkmarca', '=', 'marcas.id')
                ->join('categorias', 'productos.fkcategoria', '=', 'categorias.id')
                ->join('medidas', 'productos.fkmedida', '=', 'medidas.id')
                ->join(\DB::raw('(select p.id as Productid,
                ifnull((select ap.precio_compra from audi_producto ap where p.id = ap.fkproducto order by ap.id desc limit 1,1),0) as precioActual,
                (p.stock - ifnull((select dt.stock from detalle_entradas dt where dt.fkproducto = p.id order by p.id desc limit 1),0)) as stockActual,
                ifnull((select ap.precio_compra from audi_producto ap where p.id = ap.fkproducto order by ap.id desc limit 1),0) as precioNuevo,
                ifnull((select dt.stock from detalle_entradas dt where dt.fkproducto = p.id order by p.id desc limit 1),0) as stockNuevo,
                ifnull(p.stock,0) as stockTotal,
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
                                                group by p.id) t0'),'productos.id','=','t0.Productid')
                //->groupBy('productos.id')
                ->select('productos.id as id',
                'marcas.marca',
                'categorias.categoria',
                'productos.titulo',
                'medidas.medida',
                'productos.stock',
                //'detalle_entradas.precio_venta',
                \DB::raw("round(t0.promedio,2) as promedio")
                )
               ->get();
 

        return view('salidas.inventario',compact('productos'));
    }


    public function indicador2(){
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
            \DB::raw("ROUND(SUM(t0.promedio) * SUM(productos.stock),2) as 'Inventory Sun Day'")
        )->get();

        return response($inventory_dolar_day[0]->Stock_Total);
    }



    public function reporte_producto($fecha_inicial,$fecha_final,$id_producto)
    {
        if($id_producto=="0")
        {
            $productos = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->join('productos', 'detalle_entradas.fkproducto', '=', 'productos.id')
                ->join('proveedores', 'entradas.fkproveedor', '=', 'proveedores.id')
                ->select('titulo','fecha','precio_compra','precio_venta','razon')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->orderby('fecha','asc')
                ->get();
        }else
        {
            $productos = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->join('productos', 'detalle_entradas.fkproducto', '=', 'productos.id')
                ->join('proveedores', 'entradas.fkproveedor', '=', 'proveedores.id')
                ->select('titulo','fecha','precio_compra','precio_venta','razon')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->orderby('fecha','asc')
                ->where('productos.id',$id_producto)
                ->get();
        }
        

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;


        $productos_listar = \DB::table('productos')
                ->select('productos.id as id','titulo')
                ->get();

        return view('salidas.reporte_producto',compact('productos','fecha_inicial','fecha_final','productos_listar','id_producto'));
    }




    public function reporte_categoria($fecha_inicial,$fecha_final,$id_categoria)
    {
        if($id_categoria=="0")
        {
            $productos = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->join('productos', 'detalle_entradas.fkproducto', '=', 'productos.id')
                ->join('categorias', 'productos.fkcategoria', '=', 'categorias.id')
                ->select('titulo','fecha','precio_compra','precio_venta','categoria','detalle_entradas.stock')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->orderby('fecha','asc')
                ->get();
        }else
        {
             $productos = \DB::table('detalle_entradas')
                ->join('entradas', 'detalle_entradas.fkentrada', '=', 'entradas.id')
                ->join('productos', 'detalle_entradas.fkproducto', '=', 'productos.id')
                ->join('categorias', 'productos.fkcategoria', '=', 'categorias.id')
                ->select('titulo','fecha','precio_compra','precio_venta','categoria','detalle_entradas.stock')
                ->whereBetween('fecha', [$fecha_inicial, $fecha_final])
                ->orderby('fecha','asc')
                ->where('productos.fkcategoria',$id_categoria)
                ->get();
        }
        

        $fecha_inicial=$fecha_inicial;
        $fecha_final=$fecha_final;


        $categorias = \DB::table('categorias')
                ->select('categorias.id as id','categoria')
                ->get();

        return view('salidas.reporte_categoria',compact('productos','fecha_inicial','fecha_final','categorias','id_categoria'));
    }



   




}
