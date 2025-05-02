<?php

namespace App\Http\Controllers\Empleado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\FunctionController;
class EmpleadoController extends Controller
{
    public function getByCategory(Request $request){
        $param = array(
            "programacionid"=>$request->programacionid,
        );
        $FunctionController =FunctionController::ApiRest('/api/empleado/get-by-category',$param ,'POST');
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
