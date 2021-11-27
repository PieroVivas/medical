<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests;
use DB;
use App;
use Session;
use Redirect;

class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = \DB::table('proveedores')
                ->select('id' , 'ruc','razon','direccion','telefono1','telefono2','contacto','fktipo')
                ->get(); 

        $tipos = App\Tipo::All();

        return view('proveedores.listar',compact('proveedores','tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $tipos = App\Tipo::All();

        return view('proveedores.crear',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Proveedor = new App\Proveedore();
        $Proveedor->ruc = $request->ruc;
        $Proveedor->razon = $request->razon;
        $Proveedor->direccion = $request->direccion;
        $Proveedor->telefono1 = $request->telefono1;
        $Proveedor->telefono2 = $request->telefono2;
        $Proveedor->contacto = $request->contacto;
        $Proveedor->fktipo = $request->tipo;
        $Proveedor->correo = $request->correo;
         
        $Proveedor->save();
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
        $proveedor = App\Proveedore::find($id);
         
          $tipos = App\Tipo::All();

        return View('proveedores.edit', compact('proveedor','tipos'));
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
           
            $proveedorUpdate = App\Proveedore::find($request->id);
            $proveedorUpdate->ruc = $request->ruc;
            $proveedorUpdate->razon = $request->razon;
            $proveedorUpdate->direccion = $request->direccion;
            $proveedorUpdate->telefono1 = $request->telefono1;
            $proveedorUpdate->telefono2 = $request->telefono2;
            $proveedorUpdate->contacto = $request->contacto;
            $proveedorUpdate->fktipo = $request->fktipo;
             $proveedorUpdate->correo = $request->correo;
            $proveedorUpdate->save();
           
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


    public function eliminar_proveedor(Request $request)
    {
        if(isset($request->id)) 
        {
            $proveedor = App\Proveedore::find($request->id);
            $proveedor->delete();
        }
    }
}
