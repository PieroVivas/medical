<?php

namespace App\Http\Controllers\Auth;
use App\Role;
use App\Trabajadore;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard-administrador';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
       $user->roles()->attach(Role::where('name', 'usuarios')->first());

        $Trabajador = new Trabajadore();
        $Trabajador->nombres = $data['name'];
        $Trabajador->apikey = md5($user->id.$data['email'].time());
        $Trabajador->clave = $data['password'];
        $Trabajador->fkusuario = $user->id;


       /* //ENVIAR EMAIL
        $usuarios = [
            'nombre' => $data['name'],
            'email' => $data['email']
        ];

        $email=$data['email'];
        \Mail::send('auth.emails.creacion_usuario', $usuarios, function($msg) use ($email)
        {
            $msg->from('hola@tuwebya.com.pe', 'Adminisrador TuWebYa');
            $msg->to($email)->subject('Notificación de Acceso a TuWebYa');
        });*/

        $Trabajador->save();


       return $user;
    }
}
