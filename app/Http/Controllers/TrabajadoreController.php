<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests;
use DB;
use App;
use Session;
use Redirect;

class TrabajadoreController extends Controller
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
       

        $trabajadores = \DB::table('trabajadores')
                ->join('role_user', 'trabajadores.fkusuario', '=', 'role_user.user_id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->join('users', 'role_user.user_id', '=', 'users.id')
                ->select('trabajadores.id','nombres', 'dni' , 'email' , 'roles.name as rol')
                ->get();

        return view('trabajadores/listar',compact('trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajadores.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verificar_email = App\User::where('email',$request->email)->first();

        if ($verificar_email)
        {
            Session::flash('existe','Email ya existe');
            
        }else
        {
       

        $user =  App\User::create([
            'name' => $request->nombres,
            'email' => $request->email,
            'password' => bcrypt($request->clave),
        ]);


        $user->roles()->attach(App\Role::where('name', $request->rol)->first());

        $Trabajador = new App\Trabajadore();
        $Trabajador->nombres = $request->nombres;
        $Trabajador->dni = $request->dni;
        $Trabajador->direccion = $request->direccion;
        $Trabajador->celular = $request->celular;
        $Trabajador->fkusuario = $user->id;

        $usuarios = [
           'nombre' => $request->nombres,
           'email' => $request->email,
           'clave' => $request->clave
         ];
         
        $Trabajador->save();
        Session::flash('creado','Creado');
        }
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
        $trabajador = App\Trabajadore::find($id);
        $user = App\User::find($trabajador->fkusuario);

        $rol_id = \DB::table('role_user')->where('user_id',$trabajador->fkusuario)->value('role_id');
       
        $roles = App\Role::find($rol_id);

        return View('trabajadores.edit', compact('trabajador','user','roles'));
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
        if($request->id) 
        {
           
            $trabajadorUpdate = App\Trabajadore::find($request->id);
            $trabajadorUpdate->nombres = $request->nombres;
            $trabajadorUpdate->dni = $request->dni;
            $trabajadorUpdate->direccion = $request->direccion;
            $trabajadorUpdate->celular = $request->celular;
            $trabajadorUpdate->clave = $request->clave;
            $trabajadorUpdate->save();
           
            
            $UserUpdate = App\User::find($request->fkusuario);
            $UserUpdate->email = $request->email;
            $UserUpdate->password = bcrypt($request->clave);

            $rol = \DB::table('role_user')->where('user_id',$request->fkusuario)->delete();
            
            $UserUpdate->roles()->attach(App\Role::where('name', $request->rol)->first());
            $UserUpdate->save();

            
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


    public function eliminar_trabajador(Request $request)
    {
        if($request->id) 
        {
            $trabajador = App\Trabajadore::find($request->id);
            $user = App\User::find($trabajador->fkusuario);

          //  $rol = App\Role_user::where('user_id',$institucion->fkusuario);
           // $rol = App\Role_user::find($rol_buscar->id);

            $rol = \DB::table('role_user')->where('user_id',$trabajador->fkusuario)->delete();

            //$rol->delete();
            $user->delete();
            $trabajador->delete();
            session()->flash('eliminado', 'ELIMINADO');
        }
    }


    public function roles()
    {
        
        $roles = App\Role::all();
        return view('trabajadores/roles',compact('roles'));
    }
}
