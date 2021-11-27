<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests;
use DB;
use App;
use Session;
use Redirect;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = \DB::table('productos')
                ->select('id' , 'titulo','detalle','fkcategoria','fkmarca','fkmedida','stock')
                ->get(); 

        $categorias = App\Categoria::All();
        $marcas = App\Marca::All();
        $medidas = App\Medida::All();

        return view('productos.listar',compact('productos','categorias','marcas','medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = App\Categoria::All();
        $marcas = App\Marca::All();
        $medidas = App\Medida::All();

         return view('productos.crear',compact('categorias','marcas','medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Producto = new App\Producto();
        $Producto->titulo = $request->titulo;
        $Producto->detalle = $request->detalle;
        $Producto->fkcategoria = $request->categoria;
        $Producto->fkmarca = $request->marca;
        $Producto->fkmedida = $request->medida;
         
        $Producto->save();
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
        $producto = App\Producto::find($id);
         
        $categorias = App\Categoria::All();
        $marcas = App\Marca::All();
        $medidas = App\Medida::All();

        return View('productos.edit', compact('producto','categorias','marcas','medidas'));
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
        if(isset($request->id)) 
        {
           
            $productoUpdate = App\Producto::find($request->id);
            $productoUpdate->titulo = $request->titulo;
            $productoUpdate->detalle = $request->detalle;
            $productoUpdate->fkcategoria = $request->categoria;
            $productoUpdate->fkmarca = $request->marca;
            $productoUpdate->fkmedida = $request->medida;
            $productoUpdate->save();
           
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


    public function eliminar_producto(Request $request)
    {
        if(isset($request->id)) 
        {
            $producto = App\Producto::find($request->id);
            $producto->delete();
        }
    }
}
