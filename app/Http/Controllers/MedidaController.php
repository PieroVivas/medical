<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests;
use DB;
use App;
use Session;
use Redirect;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidas = \DB::table('medidas')
                ->select('id' , 'medida')
                ->get(); 

        return view('medidas.listar',compact('medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medidas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Medidas = new App\Medida();
        $Medidas->medida = $request->medida;
         
        $Medidas->save();
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
        $medida = App\Medida::find($id);
       
        return View('medidas.edit', compact('medida'));
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
           
            $medidaUpdate = App\Medida::find($request->id);
            $medidaUpdate->medida = $request->medida;
            $medidaUpdate->save();
           
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


    public function eliminar_medida(Request $request)
    {
        if(isset($request->id)) 
        {
            $medidas = App\Medida::find($request->id);
            $medidas->delete();
        }
    }



   

}
