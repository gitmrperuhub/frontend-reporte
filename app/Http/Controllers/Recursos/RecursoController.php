<?php

namespace App\Http\Controllers\Recursos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;   
use App\Models\User;
use App\Models\Producto;
use App\Models\Recurso;
use App\Models\Recursos_detalle;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
class RecursoController extends Controller
{
    public function getProductoById(Request $request){
        //$Producto = Producto::where('id',$request->id)->first();
        $Recurso = Recursos_detalle::all();
        if ($Recurso){
            return response()->json([
                "response"=>'success',
                "icono"=>'success',
                "data"=>$Recurso, 
                "message"=>"Datos de busqueda correcto."
            ], 200);
        }
        return response()->json([
            "response"=>'error',
            "icono"=>'error',
            "data"=>$Recurso, 
            "message"=>"No existe data, vuelva a intentarlo por favor."
        ], 200);
    }
}
