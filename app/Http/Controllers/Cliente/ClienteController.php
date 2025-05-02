<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\FunctionController;
use Illuminate\Support\Facades\Validator;
class ClienteController extends Controller
{
    public function listarClienteByTecnico(Request $request){
        $param = array("dni"=> session()->get("Codigo"));
        $FunctionController =FunctionController::ApiRest('/api/cliente/listar-cliente-by-tecnico',$param ,'POST');
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
    public function listarClienteLocalesByRuc(Request $request){
        $param = array("ruc"=>$request->ruc );
        $FunctionController =FunctionController::ApiRest('/api/cliente/listar-cliente-locales-by-ruc',$param ,'POST');
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
