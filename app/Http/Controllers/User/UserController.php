<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FunctionController;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
//use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
class UserController extends Controller
{

    public function login(Request $request){
        $param = array('email' => $request->email,'password' => $request->password);
        \Log::info('Intentando login con: ' . $request->email);
        $FunctionController =FunctionController::ApiRestWithOutToken('/api/login',$param ,'POST');
        \Log::info('Respuesta de API: ' . json_encode($FunctionController));
        $APP_URL_MR = config('app.app_name_mr_peru');
        \Log::info('URL de API: ' . $APP_URL_MR);
        $urlAbsolute =$APP_URL_MR.'/api/login' ;

        if ($FunctionController){
            if ($FunctionController["status"]){
                session()->put("Nombre",$FunctionController["data"]["USERREPORT_NAME"]);
                session()->put("Email",$FunctionController["data"]["USERREPORT_EMAIL"]);
                session()->put("Codigo",$FunctionController["data"]["USERREPORT_CODIGO"]);
                session()->put("Tipo",$FunctionController["data"]["USERREPORT_TYPE"]);
                session()->put("Token",$FunctionController["token"]);
            }
            return response()->json([
                "icon"=>'success',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "icon"=>'error',
                "status"=>false,
                "data"=>$FunctionController,
                "message"=>$urlAbsolute
            ], Response::HTTP_RESERVED);
        }
    }
    public function getUsers(){
        $data =DB::table('users')
        ->select("*")
        ->OrderBy('id', 'asc')
        ->limit(10)
        ->get();
        $user =  User::all();
        $Productos =  Producto::all();
        return json_encode($Productos);
    }
    function getUser(Request $request){
        $param = array(
            "tipo_table"=>$request->tipo_table
        );
        $FunctionController =FunctionController::ApiRestWithToken('/api/user/getUser',$param ,'POST');
        return response()->json([
            "message"=>"exitos",
            // "user"=>Auth::user(),
            "data"=>$FunctionController,
            "param1"=> $param
        ], Response::HTTP_OK);
    }
    function getModuels(){
        return response()->json([
            "message"=>"exitos",
            "Module"=>Module::all()
        ], Response::HTTP_OK);
    }
    public function logIn2(){
        $credentials = request()->only("email", 'password');
        if(Auth::attempt($credentials)){
            request()->session()->regenerate();
            return 'si';
        }
        return 'No';
    }

    public function logout(){
        $cookie= Cookie::forget('cookie_token');
        return response(["message"=>'cerrado'], Response::HTTP_OK)->withCookie( $cookie);
    }
    public function SignOut(Request $request){
        Auth::logout();

        $param = array(
            "email"=>session()->get("Email")
        );

        $param = array(
            "opcion"=> $request->opcion,
            "usuario_login"=> $request->usuario_login,
            "programacionid"=> $request->programacionid,
            "numot"=> $request->numot
        );
        $paramar = array(
            "opcion"=> 'LIBERAR',
            "usuario_login"=> session()->get("Email"),
            "programacionid"=> '',
            "numot"=> ''
        );
        $datosReporte =FunctionController::ApiRest('/api/reporte/actualizar-programacion-user',$paramar ,'POST');
        $FunctionController =FunctionController::ApiRest('/api/logout',$param ,'POST');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function getPassword(Request $request){
        $hash=password_hash($request->password, PASSWORD_DEFAULT);
        return response()->json([
            "message"=>"contraseña creado",
            "encrypt"=>$hash
        ], Response::HTTP_OK);
    }
    public function validPassword(Request $request){
        echo env('APP_URL').'<br> edwin';
        $hash=$request->hash;
        $pass=$request->password;
        if (password_verify( $pass, $hash)){
            return response()->json([
                "message"=>"contraseña válida",
                "encrypt"=>$pass
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                "message"=>"contraseña no válida",
                "encrypt"=>$pass
            ], Response::HTTP_OK);
        }
    }
    public function RecordarContrasena(Request $request){
        $rules=[
            'email' =>  ['required', 'email']
        ];
        $validacion = Validator::make($request->all(),$rules);
        if ($validacion->fails()){
            return response()->json([
                "type"=>'empty',
                "icon"=>'error',
                "status"=>false,
                "data"=>$validacion->errors(),
                'message'=>'Verifique los datos ingresados y/o ingrese todo los datos por favor.'
            ], Response::HTTP_OK);
        }

        $param = array(
            "email"=> $request->email
        );
        $FunctionController =FunctionController::ApiRestWithOutToken('/api/recordar-contrasena',$param ,'POST');
        $APP_URL_MR = config('app.app_name_mr_peru');
        $urlAbsolute =$APP_URL_MR.'/api/recordar-contrasena' ;
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'success',
                "status"=>true,
                "data"=>$FunctionController,
                "message"=>'Exitoso'
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false,
                "data"=>$FunctionController,
                "message"=>$urlAbsolute
            ], Response::HTTP_RESERVED);
        }
    }

    public function ResetContrasena(Request $request){
        $hash=password_hash($request->password_confirm, PASSWORD_DEFAULT);
        if ($request->password_cambiar!==$request->password_confirm){
            return response()->json([
                "type"=>'empty',
                "icon"=>'error',
                "status"=>false,
                "data"=>array(),
                'message'=>'La contraseña deben ser iguales.'
            ], Response::HTTP_OK);
        }
        $rules=[
            'password_cambiar' =>  ['required', 'between:8,15'],
            'password_confirm' =>  ['required', 'between:8,15'],
            'email_cambiar' =>  ['required'],
            'token_2' =>  ['required'],
        ];
        $validacion = Validator::make($request->all(),$rules);
        if ($validacion->fails()){
            return response()->json([
                "type"=>'empty',
                "icon"=>'error',
                "status"=>false,
                "data"=>$validacion->errors(),
                'message'=>'Verifique los datos ingresados y/o ingrese todo los datos por favor.'
            ], Response::HTTP_OK);
        }

        $param = array(
            "email_cambiar"=>$request->email_cambiar,
            "password_confirm"=>$hash,
            "token_2"=>$request->token_2,
        );
        $FunctionController =FunctionController::ApiRestWithOutToken('/api/reset-contrasena',$param ,'POST');
        $APP_URL_MR = config('app.app_name_mr_peru');
        $urlAbsolute ='';
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'success',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false,
                "data"=>$FunctionController,
                "message"=>$urlAbsolute
            ], Response::HTTP_RESERVED);
        }
    }
}
