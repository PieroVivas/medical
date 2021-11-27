<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests;
use DB;
use App;
use Session;
use Redirect;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = \DB::table('clientes')
                ->select('id' , 'ruc','razon','direccion','nombres','apellidos','dni','telefono','correo')
                ->get(); 

      
        return view('clientes.listar',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('clientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Cliente = new App\Cliente();
        $Cliente->nombres = $request->nombres;
        $Cliente->apellidos = $request->apellidos;
        $Cliente->dni = $request->dni;
        $Cliente->razon = $request->razon;
        $Cliente->ruc = $request->ruc;
        $Cliente->direccion = $request->direccion;
        $Cliente->telefono = $request->telefono;
        $Cliente->correo = $request->correo;
         
        $Cliente->save();
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
        $cliente = App\Cliente::find($id);
     
        return View('clientes.edit', compact('cliente'));
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
           
            $clienteUpdate = App\Cliente::find($request->id);
            $clienteUpdate->nombres = $request->nombres;
            $clienteUpdate->apellidos = $request->apellidos;
            $clienteUpdate->dni = $request->dni;
            $clienteUpdate->razon = $request->razon;
            $clienteUpdate->ruc = $request->ruc;
            $clienteUpdate->direccion = $request->direccion;
            $clienteUpdate->telefono = $request->telefono;
            $clienteUpdate->correo = $request->correo;
            $clienteUpdate->save();
           
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


    public function eliminar_cliente(Request $request)
    {
        if(isset($request->id)) 
        {
            $cliente = App\Cliente::find($request->id);
            $cliente->delete();
        }
    }
}
