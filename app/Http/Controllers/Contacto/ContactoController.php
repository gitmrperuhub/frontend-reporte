<?php

namespace App\Http\Controllers\Contacto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\FunctionController;
use Illuminate\Support\Facades\Validator;
class ContactoController extends Controller
{
    public function emailByRuc(Request $request){
        $param = array("ruc"=>  $request->ruc);
        $FunctionController =FunctionController::ApiRest('/api/contacto/contacto-email-by-ruc',$param ,'POST');
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
