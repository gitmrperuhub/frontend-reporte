<?php

namespace App\Http\Controllers\Servicio;



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
use CURLFile;
use Illuminate\Support\Facades\Route;
//use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class ServicioController extends Controller
{
    public function IniciarServicio($opcion){
        $compact=[
            "opcion"=>$opcion
        ];
        return FunctionController::view('pages.servicio.iniciar',$compact);
    }
    public function TerminarServicio(){
        return FunctionController::view('pages.servicio.terminar');
    }
    public function HistorialServicio(){
        return FunctionController::view('pages.servicio.historial');
    }
    public function ServiciosNoConcluidos($opcion){
        $compact=[
            "opcion"=>$opcion
        ];
        return FunctionController::view('pages.servicio.servicionoconcluido',$compact);
    }
    public function uploadImage(Request $request){
        //$param = array("files"=> $request->file("files"));

        $param = array( 'files'=> $request->file("files"));

        //$param = array();
        $FunctionController =FunctionController::apiRestFile('/servicio/request-file',$param ,'POST');
        if ($FunctionController){
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
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function deleteFile(Request $request){
        $param = array(
            "nombre_archivo"=> $request->nombre_archivo,
            "id"=> $request->id,
            "estado_ver_reporte"=> $request->estado_ver_reporte,
            "estado"=> $request->estado,
        );
        $FunctionController =FunctionController::ApiRest('/api/servicio/delete-file',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "icon"=>'success',
                "status"=>true,
                "data"=>$FunctionController,
                "message"=>"El archivo se eliminó correctamente."
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function otByTecnico(Request $request){
        $param = array(
            "dni"=> session()->get("Codigo"),
            "opcion"=> $request->opcion
        );
        $FunctionController =FunctionController::ApiRest('/api/servicio/ot-by-tecnico',$param ,'POST');
        if ($FunctionController){
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
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function servicioByProgramacionId(Request $request){
        $param = array("programacionid"=> $request->programacionid);
        $FunctionController =FunctionController::ApiRest('/api/servicio/servicio-by-programacion-id',$param ,'POST');
        if ($FunctionController){
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
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function datatoDataURL(Request $request){
        $param = array(
            "imagen"=> $request->imagen,
            "opt"=> $request->opt
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/firma-digital',$param ,'POST');
        if ($FunctionController){
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
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function checkVerReporteFoto(Request $request){
        $param = array(
            "id"=> $request->id,
            "estado_ver_reporte"=> $request->estado_ver_reporte,
            "estado"=> $request->estado,
        );
        $FunctionController =FunctionController::ApiRest('/api/servicio/check-ver-reporte-foto',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "icon"=>'success',
                "status"=>true,
                "data"=>$FunctionController,
                "message"=>"El archivo se eliminó correctamente."
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }

    public function servicioByProgramacionIdSecadores(Request $request){
        $param = array("programacionid"=> $request->programacionid);
        $FunctionController =FunctionController::ApiRest('/api/servicio/servicio-by-programacion-id-secadores',$param ,'POST');
        if ($FunctionController){
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
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    
}
