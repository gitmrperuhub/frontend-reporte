<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\Recurso;
use App\Models\Recursos_detalle;
use App\Http\Controllers\FunctionController;
use Symfony\Component\HttpFoundation\Response;

class WebPages extends Controller
{
    public function Login(){
        return view('authentication.login');
    }
    public function Home(){
        return FunctionController::view('pages.index');
    }
    public function Profile(){
        $param = array("dni"=> session()->get("Codigo"));
        $FunctionController =FunctionController::ApiRest('/api/servicio/ot-by-tecnico',$param ,'POST');
        $Total =0;
        $Nuevo =0;
        $Pendiente =0;
        $Completado =0;
        $tasaExito =0;
        if ($FunctionController){
            if (count($FunctionController["data"])>0){
                foreach ($FunctionController["data"] as $val){
                    $Total++;
                    $REPORTE_ESTADO = $val["REPORTE_ESTADO"];
                    if ($REPORTE_ESTADO==="NUEVO"){
                        $Nuevo++;
                    }
                    if ($REPORTE_ESTADO==="PENDIENTE"){
                        $Pendiente++;
                    }
                    if ($REPORTE_ESTADO==="COMPLETADO"){
                        $Completado++;
                    }
                }
                $tasaExito =($Completado / $Total) * 100;
            }
        }
        $datos = [
            "Total"=>$Total,
            "Nuevo"=>$Nuevo,
            "Pendientes"=>$Pendiente,
            "Completados"=>$Completado,
            "tasaExito"=>$tasaExito 
        ];
        return FunctionController::view('pages.users.profile',  $datos);

    }
    public function Configuar(){
        $userArray = User::where('state','=',1)->get();
        $confi = route('configuar');// pregunta esta varible si es igual al que tra el tabl de permisos 
        return view('pages.users.config', ['userArray' => $userArray, "configuar"=>$confi]);
    }
    public function RecordarContrasena(){
        $datos=[];
        return view('authentication.recordarcontrasena')->with('compact', $datos);
    }
    public function sinPermiso(){
        return view('permisos');
    }
    public function CambiarContrasena($token){
        $param = array(
            "token_url"=> $token
        );
        $data =FunctionController::ApiRestWithOutToken('/api/listar-pass-reset-by-token',$param ,'POST');
        $urlAbsolute ='' ;
        $estadoApiRest=false;
        if ($data){
            $estadoApiRest=true;
        }
        $datos=[
            "token"=>$token,
            "data"=>$data,
            "estadoApiRest"=>$estadoApiRest
        ];
        return view('authentication.cambiarcontrasena')->with('compact', $datos);
    }
}
