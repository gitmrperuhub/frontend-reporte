<?php

namespace App\Http\Controllers\Equipo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\FunctionController;
use Illuminate\Support\Facades\Validator;
class EquipoController extends Controller
{
    public function listarEquipoByRucByLocal(Request $request){
        $param = array(
            "ruc"=> $request->ruc,
            "codigo_locales"=> $request->codigo_locales
        );
        $FunctionController =FunctionController::ApiRest('/api/equipo/listar-equipo-by-ruc-by-local',$param ,'POST');
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
