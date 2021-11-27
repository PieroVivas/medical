<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests;

use App;
use Session;
use Redirect;

class EntradaController extends Controller
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
      
        $entradas = App\Entrada::all();

        $proveedores = App\Proveedore::all();

         $cantidad_entradas = \DB::table('entradas')->count();

        return view('entradas.listar',compact('entradas','proveedores','cantidad_entradas'));
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
        $entradaNueva= new App\Entrada;
        $entradaNueva->numero = $request->numero;
        $entradaNueva->fkproveedor = $request->proveedor;
        $entradaNueva->fecha = $request->fecha;
        $entradaNueva->hora_entrada = date("H:i:s");

        $entradaNueva->save();

        return $entradaNueva->id;
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
         $entrada = App\Entrada::find($id);

         $proveedores = App\Proveedore::all();
         $productos = App\Producto::all();
         $marcas = App\Marca::all();
         $medidas = App\Medida::all();

         $entradas = \DB::table('detalle_entradas')
                ->join('productos', 'detalle_entradas.fkproducto', '=', 'productos.id')
                ->join('marcas', 'productos.fkmarca', '=', 'marcas.id')
                ->join('medidas', 'productos.fkmedida', '=', 'medidas.id')
                ->select('detalle_entradas.id as id','productos.id as id_producto','marca','medida','detalle_entradas.cantidad as cantidad','titulo','precio_venta','precio_compra','fecha_vencimiento')
                ->where('fkentrada',$id)
                ->get();


        // show the edit form and pass the nerd
        return View('entradas.edit', compact('entrada','proveedores', 'productos','marcas','medidas','entradas'));
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
       
        $entradaUpdate= App\Entrada::find($request->id);
        $entradaUpdate->numero = $request->numero;
        $entradaUpdate->fkproveedor = $request->proveedor;
        $entradaUpdate->fecha = $request->fecha;

        $entradaUpdate->save();
      
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


    public function eliminar_entrada(Request $request)
    {
        if(isset($request->id)) 
        {
            $entrada = App\Entrada::find($request->id);
            $entrada->delete();
        }
    }



    public function entrada($id_producto,$id_entrada)
    {
        $entrada = App\Entrada::find($id_entrada);
    
        $producto = \DB::table('productos')
                ->join('medidas', 'productos.fkmedida', '=', 'medidas.id')
                ->join('marcas', 'productos.fkmarca', '=', 'marcas.id')
                ->select('productos.id as id','marca','medida','titulo')
                ->where('productos.id',$id_producto)
                ->first();

        $marcas = App\Marca::all();
         $medidas = App\Medida::all();
      

        return View('entradas.detalle', compact('entrada','producto','medidas','marcas'));
    }


    public function agregar_detalle_entrada(Request $request)
    {
        $DetalleEntrada = new App\DetalleEntrada();
      
        $DetalleEntrada->cantidad = $request->cantidad;

        $DetalleEntrada->fkproducto = $request->id_producto;
        $DetalleEntrada->fkentrada = $request->id_entrada;
        $DetalleEntrada->precio_venta = $request->precio_venta;
        $DetalleEntrada->precio_compra = $request->precio_compra;
        $DetalleEntrada->fecha_vencimiento = $request->fecha_vencimiento;
        $DetalleEntrada->stock = $request->cantidad;
        $DetalleEntrada->precio_compra_withoutIGV = (floatVal($request->precio_compra)/1.18);
        $DetalleEntrada->save();

        $producto = App\Producto::find($request->id_producto);
        $cantidad_final= $producto->stock*1 + $request->cantidad;
        $producto->stock = $cantidad_final;
        $producto->save();


        $entrada = App\Entrada::find($request->id_entrada);
        $fecha_registro= date("d-m-y",strtotime($entrada->created_at));
        $fecha_hoy=date("d-m-y");

        if($fecha_registro==$fecha_hoy)
        {
                $hora_entrada  = $entrada->hora_entrada;
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

            $entrada->hora_salida = $hora_salida;    
            $entrada->tiempo = $total_salida_segundos*1 - $total_entrada_segundos*1;
            $entrada->save();
        }

        $this->auditoria($request);
            
    }

    function auditoria(Request $request){
        
        $auditoria = new App\AudiProducto();
        $auditoria->fkproducto = $request->id_producto;
        $auditoria->precio_compra = (floatVal($request->precio_compra)/1.18);
        //$auditoria->fecha = date('d-m-y');
        $auditoria->save();

        //return response()->json("ok");

        // AudiProducto::create([
        //     "fkproducto" => 20,
        //     "precio_compra" => 10
        // ]);
    }



    public function eliminar_detalle_entrada(Request $request)
    {
        if(isset($request->id)) 
        {
            $DetalleEntrada = App\DetalleEntrada::find($request->id);
            $DetalleEntrada->delete();

            $producto = App\Producto::find($request->id_producto);
            $cantidad_final= $producto->stock*1 - $request->cantidad;
            $producto->stock = $cantidad_final;
            $producto->save();
        }
    }



}
