<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests;
use DB;
use App;
use Session;
use Redirect;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = \DB::table('categorias')
                ->select('id' , 'categoria')
                ->get(); 

        return view('categorias.listar',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Categorias = new App\Categoria();
        $Categorias->categoria = $request->categoria;
         
        $Categorias->save();
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
        $categoria = App\Categoria::find($id);
       
        return View('categorias.edit', compact('categoria'));
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
           
            $categoriaUpdate = App\Categoria::find($request->id);
            $categoriaUpdate->categoria = $request->categoria;
            $categoriaUpdate->save();
           
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


    public function eliminar_categoria(Request $request)
    {
        if(isset($request->id)) 
        {
            $categorias = App\Categoria::find($request->id);
            $categorias->delete();
        }
    }





}
