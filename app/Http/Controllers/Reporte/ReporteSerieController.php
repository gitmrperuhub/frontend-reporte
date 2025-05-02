<?php

namespace App\Http\Controllers\Reporte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\FunctionController;
use Illuminate\Support\Facades\Validator;
class ReporteSerieController extends Controller
{
    public function registro(Request $request){
        $rules1=[];
        if ($request->id_obl!="0"){
            $rules1=[
                'id_tecnico_02' =>  ['required'],
            ];
        }
        $rules2=[
            'reporte_orden_trabajo' =>  ['required'],
            'empresa_nombre' =>  ['required'],
            'ruc' =>  ['required'],
            'empresa_direccion' =>  ['required'],
            'id_tecnico_01' =>  ['required'],
            'tipo_servicio_desc' =>  ['required'],
            'reporte_fecha_servicio' =>  ['required']
        ];
        $rules3=[];
        $rules4=[];
        $vsd_00_20rpm = 0;
        $vsd_20_40rpm = 0;
        $vsd_40_60rpm = 0;
        $vsd_60_80rpm = 0;
        $vsd_80_100rpm = 0;
        $rules = array_merge($rules1,$rules2, $rules3, $rules4);  
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
        //$reporte_fecha_servicio = explode("-", $request->reporte_fecha_servicio);// 2004-05-30 // PARA SQL DE MI LOCAL
        //$reporte_fecha_servicio = $reporte_fecha_servicio[0].'-'.$reporte_fecha_servicio[2].'-'.$reporte_fecha_servicio[1];// 2004-30-05 PARA SQL DE MI LOCAL
        //$reporte_fecha_servicio = $request->reporte_fecha_servicio;// 2004-05-30 // PARA SQL DE PRODUCCION
        $reporte_fecha_servicio = $request->reporte_fecha_servicio;// 2004-05-30 // PARA SQL DE PRODUCCION
        $param = array(
            "reporte_fecha_servicio"=>$reporte_fecha_servicio,
            "reporte_orden_trabajo"=>$request->reporte_orden_trabajo,
            "nombre_tecnico_responsable_01"=>$request->nombre_tecnico_responsable_01,
            "id_tecnico_01"=>$request->id_tecnico_01,
            "nombre_tecnico_responsable_02"=>$request->nombre_tecnico_responsable_02,
            "id_tecnico_02"=>$request->id_tecnico_02,
            "empresa_nombre"=>$request->empresa_nombre,
            "ruc"=>$request->ruc,
            "empresa_direccion"=>$request->empresa_direccion,
            "alquilado"=>'',
            "alquilado_a_empresa_nombre"=>'',
            "alquilado_a_empresa_ruc"=>'',
            "equipo_id"=>$request->equipo_id,
            "equipo_marca"=>$request->equipo_marca,
            "equipo_referencia"=>$request->equipo_referencia,
            "equipo_modelo"=>$request->equipo_modelo,
            "equipo_nro_serie"=>$request->equipo_nro_serie,
            "equipo_modulo_tipo"=>$request->equipo_modulo_tipo,
            "equipo_presion"=>$request->equipo_presion,
            "equipo_caudal"=>$request->equipo_caudal,
            "equipo_rpm"=>$request->equipo_rpm,
            "equipo_horometro"=>$request->equipo_horometro,
            "tipo_servicio_desc"=>$request->tipo_servicio_desc,
            "tipo_servicio_arranque_inicial"=>$request->tipo_servicio_arranque_inicial,
            "tipo_servicio_mantenimiento"=>$request->tipo_servicio_mantenimiento,
            "tipo_servicio_evaluacion"=>$request->tipo_servicio_evaluacion,
            "tipo_servicio_reparacion"=>$request->tipo_servicio_reparacion,
            "tipo_servicio_asesoria"=>$request->tipo_servicio_asesoria,
            "tipo_servicio_overhaul"=>$request->tipo_servicio_overhaul,
            "tipo_servicio_alquiler"=>$request->tipo_servicio_alquiler,
            "secador_modelo"=>$request->secador_modelo,
            "secador_nro_serie"=>$request->secador_nro_serie,
            "secador_punto_rocio"=>$request->secador_punto_rocio,
            "secador_voltaje_amp"=>$request->secador_voltaje_amp,
            "secador_proteccion"=>$request->secador_proteccion,
            "secador_limpieza"=>$request->secador_limpieza,
            "secador_tipo_refrigeracion"=>$request->secador_tipo_refrigeracion,
            "secador_nota"=>$request->secador_nota,
            "vsd_00_20rpm"=>$vsd_00_20rpm,
            "vsd_20_40rpm"=>$vsd_20_40rpm,
            "vsd_40_60rpm"=>$vsd_40_60rpm,
            "vsd_60_80rpm"=>$vsd_60_80rpm,
            "vsd_80_100rpm"=>$vsd_80_100rpm,
            "programacionid"=>$request->programacionid,
            "vsd_medida_rpm"=>$request->vsd_medida_rpm,
            "imagesDatos"=>$request->imagesDatos,
            "tipo_servicio_cotizacion"=>$request->tipo_servicio_cotizacion,
            "local_nombre"=>$request->local_nombre,
            "proximo_servicio"=>$request->proximo_servicio,
            "secador_amperaje"=>$request->secador_amperaje
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/registro',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function actualizarReporteInicial(Request $request){

        $rules1=[];
        if ($request->id_obl!="0"){
            $rules1=[
                'id_tecnico_02' =>  ['required'],
            ];
        }
        $rules2=[
            'reporte_numero' =>  ['required'],
            'reporte_orden_trabajo' =>  ['required'],
            'empresa_nombre' =>  ['required'],
            'ruc' =>  ['required'],
            'empresa_direccion' =>  ['required'],
           /*
            'tipo_servicio_desc' =>  ['required'],
            'equipo_id' =>  ['required'],
            'equipo_marca' =>  ['required'],
            'equipo_referencia' =>  ['required'],
            'equipo_modelo' =>  ['required'],
            'equipo_nro_serie' =>  ['required'],
            'equipo_modulo_tipo' =>  ['required'],
            'equipo_presion' =>  ['required'],
            'equipo_caudal' =>  ['required'],
            'equipo_rpm' =>  ['required'],
            'equipo_horometro' =>  ['required'],
            */
        ];
        $rules3=[];
        $rules4=[];
        if ($request->id_secador_obl!="0"){
            /*$rules3=[
                'secador_modelo' =>  ['required'],
                'secador_nro_serie' =>  ['required'],
                'secador_punto_rocio' =>  ['required'],
                'secador_voltaje_amp' =>  ['required'],
                'secador_amperaje' =>  ['required'],
                'secador_proteccion' =>  ['required'],
                'secador_limpieza' =>  ['required'],
                'secador_tipo_refrigeracion' =>  ['required'],
                'secador_nota' =>  ['required']
            ];
            */
        }
        $vsd_00_20rpm = 0;
        $vsd_20_40rpm = 0;
        $vsd_40_60rpm = 0;
        $vsd_60_80rpm = 0;
        $vsd_80_100rpm = 0;
        if ($request->vsd_medida_rpm!=""){
            /*$rules4=[
                'vsd_00_20rpm' =>  ['required','numeric'],
                'vsd_20_40rpm' =>  ['required','numeric'],
                'vsd_40_60rpm' =>  ['required','numeric'],
                'vsd_60_80rpm' =>  ['required','numeric'],
                'vsd_80_100rpm' => ['required','numeric']
            ];
            $vsd_00_20rpm = $request->vsd_00_20rpm;
            $vsd_20_40rpm = $request->vsd_20_40rpm;
            $vsd_40_60rpm = $request->vsd_40_60rpm;
            $vsd_60_80rpm = $request->vsd_60_80rpm;
            $vsd_80_100rpm = $request->vsd_80_100rpm;
            */
        }
        $rules = array_merge($rules1,$rules2, $rules3, $rules4);
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
            "reporte_numero"=>$request->reporte_numero,
            "reporte_orden_trabajo"=>$request->reporte_orden_trabajo,
            "nombre_tecnico_responsable_02"=>$request->nombre_tecnico_responsable_02,
            "id_tecnico_02"=>$request->id_tecnico_02,
            "id_tecnico_01"=>session()->get("Codigo"),
            "empresa_nombre"=>$request->empresa_nombre,
            "ruc"=>$request->ruc,
            "empresa_direccion"=>$request->empresa_direccion,
            //"empresa_telefono"=>$request->empresa_telefono,
            //"empresa_email"=>$request->empresa_email,
            "alquilado"=>'',
            "alquilado_a_empresa_nombre"=>'',
            "alquilado_a_empresa_ruc"=>'',
            "equipo_id"=>$request->equipo_id,
            "equipo_marca"=>$request->equipo_marca,
            "equipo_referencia"=>$request->equipo_referencia,
            "equipo_modelo"=>$request->equipo_modelo,
            "equipo_nro_serie"=>$request->equipo_nro_serie,
            "equipo_modulo_tipo"=>$request->equipo_modulo_tipo,
            "equipo_presion"=>$request->equipo_presion,
            "equipo_caudal"=>$request->equipo_caudal,
            "equipo_rpm"=>$request->equipo_rpm,
            "equipo_horometro"=>$request->equipo_horometro,
            "tipo_servicio_desc"=>$request->tipo_servicio_desc,
            "tipo_servicio_arranque_inicial"=>$request->tipo_servicio_arranque_inicial,
            "tipo_servicio_mantenimiento"=>$request->tipo_servicio_mantenimiento,
            "tipo_servicio_evaluacion"=>$request->tipo_servicio_evaluacion,
            "tipo_servicio_reparacion"=>$request->tipo_servicio_reparacion,
            "tipo_servicio_asesoria"=>$request->tipo_servicio_asesoria,
            "tipo_servicio_overhaul"=>$request->tipo_servicio_overhaul,
            "tipo_servicio_alquiler"=>$request->tipo_servicio_alquiler,
            "secador_modelo"=>$request->secador_modelo,
            "secador_nro_serie"=>$request->secador_nro_serie,
            "secador_punto_rocio"=>$request->secador_punto_rocio,
            "secador_voltaje_amp"=>$request->secador_voltaje_amp,
            "secador_proteccion"=>$request->secador_proteccion,
            "secador_limpieza"=>$request->secador_limpieza,
            "secador_tipo_refrigeracion"=>$request->secador_tipo_refrigeracion,
            "secador_nota"=>$request->secador_nota,
            "imagesInicialDatos"=>$request->imagesInicialDatos,
            "imagesInicialNuevoDatos"=>$request->imagesInicialNuevoDatos,
            "vsd_medida_rpm"=>$request->vsd_medida_rpm,
            "vsd_00_20rpm"=>$vsd_00_20rpm,
            "vsd_20_40rpm"=>$vsd_20_40rpm,
            "vsd_40_60rpm"=>$vsd_40_60rpm,
            "vsd_60_80rpm"=>$vsd_60_80rpm,
            "vsd_80_100rpm"=>$vsd_80_100rpm,
            "tipo_servicio_cotizacion"=>$request->tipo_servicio_cotizacion,
            "local_nombre"=>$request->local_nombre,
            "proximo_servicio"=>$request->proximo_servicio,
            "secador_amperaje"=>$request->secador_amperaje
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/actualizar-inicial',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function listarArchivoByReporte(Request $request){
        $param = array(
            "reporte_numero"=> $request->reporte_numero,
            "tipo_registro"=> $request->tipo_registro,
            "programacionid"=> $request->programacionid,
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/listar-archivo-by-reporte',$param ,'POST');
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
    public function listarReporteByNumero(Request $request){
        $param = array(
            "reporte_numero"=> $request->reporte_numero,
            "reporte_serie"=> $request->reporte_serie
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/listar-reporte-by-numero',$param ,'POST');
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
    public function actualizarReporteFinal(Request $request){
        $rules1=[];
        if ($request->id_obl!="0"){
            $rules1=[
                'id_tecnico_02' =>  ['required'],
            ];
        }
        $rules2=[            
            'reporte_numero' =>  ['required'],
            'reporte_orden_trabajo' =>  ['required'],
            'empresa_nombre' =>  ['required'],
            'ruc' =>  ['required'],
            "reporte_fecha_servicio"=>["required"],
            'empresa_direccion' =>  ['required'],
            'tipo_servicio_desc' =>  ['required'],
            'equipo_id' =>  ['required'],
            'equipo_marca' =>  ['required'],
            'equipo_referencia' =>  ['required'],
            'equipo_modelo' =>  ['required'],
            'equipo_nro_serie' =>  ['required'],
            'equipo_modulo_tipo' =>  ['required'],
            'equipo_presion' =>  ['required'],
            'equipo_caudal' =>  ['required'],
            'equipo_rpm' =>  ['required'],
            'equipo_horometro' =>  ['required',"numeric"],
            'verificacion_tipo_aceite_usado' =>  ['required'],
            'verificacion_estado_aceite' =>  ['required'],
            'verificacion_estado_separador' =>  ['required'],
            'verificacion_estado_fajas_acoplamiento' =>  ['required'],
            'verificacion_estado_de_limpieza' =>  ['required'],
            'verificacion_estado_filtro_de_aceite' =>  ['required'],
            'verificacion_estado_filtro_de_aire' =>  ['required'],
            'medicion_voltaje_ul1l2' =>  ['required']  ,
            "medicion_voltaje_ul2l3"=> ['required'] ,
            "medicion_amperaje_l1"=> ['required'],
            "medicion_amperaje_l2"=> ['required'],
            "thermomagnetico"=>['required'],
            "linea_a_tierra"=>['required'],
            "voltaje_de_control"=>['required'],
            "voltaje_del_modulo"=>['required'],
            "motor_electrico_i_marca"=>['required'],
            "motor_electrico_i_voltaje"=>['required'],
            "motor_electrico_i_amperaje"=>['required'],
            "motor_electrico_i_fs"=>['required'],
            "motor_electrico_i_rpm"=>['required'],
            "vida_de_aceite"=>['required'],
            "vida_de_filtro_aceite"=>['required'],
            "vida_de_filtro_aire"=>['required'] ,
            "vida_de_separador"=>['required'],
            "regulaciones_de_tiempo"=>['required'] ,
            "regulaciones_nro_arranques"=>['required'] ,
            "temperatura_elemento1"=>['required'] ,
            /*"temperatura_aceite"=>['required'],
            "presion_de_aceite"=>['required'],
            "presion_intermedia"=>['required'] ,
            "temperatura_sal_aire"=>['required'],
            */
            "descripcion_del_trabajo"=>['required'],
            "nombre_jefe_encargado"=>['required']
        ];
        $rules3=[];
        if ($request->vsd_medida_rpm==""){
            $rules3=[
                "regulaciones_presion_carga"=>['required'],
                "regulaciones_de_descarga"=>['required'],
            ];
        }else{
            $rules3=[
                "regulaciones_pto_de_ajuste"=>['required'],
            ];
        }
        $rules4=[];
        $rules5=[];
        if ($request->id_secador_obl!="0"){
            $rules4=[
                'secador_modelo' =>  ['required'],
                'secador_nro_serie' =>  ['required'],
                'secador_punto_rocio' =>  ['required'],
                'secador_voltaje_amp' =>  ['required'],
                'secador_amperaje' =>  ['required'],
                'secador_proteccion' =>  ['required'],
                'secador_limpieza' =>  ['required'],
                'secador_tipo_refrigeracion' =>  ['required'],
                'secador_nota' =>  ['required']
            ];
        }
        $vsd_00_20rpm = 0;
        $vsd_20_40rpm = 0;
        $vsd_40_60rpm = 0;
        $vsd_60_80rpm = 0;
        $vsd_80_100rpm = 0;
        if ($request->vsd_medida_rpm!=""){
            $rules5=[
                'vsd_00_20rpm' =>  ['required','numeric'],
                'vsd_20_40rpm' =>  ['required','numeric'],
                'vsd_40_60rpm' =>  ['required','numeric'],
                'vsd_60_80rpm' =>  ['required','numeric'],
                'vsd_80_100rpm' => ['required','numeric']
            ];
            $vsd_00_20rpm = $request->vsd_00_20rpm;
            $vsd_20_40rpm = $request->vsd_20_40rpm;
            $vsd_40_60rpm = $request->vsd_40_60rpm;
            $vsd_60_80rpm = $request->vsd_60_80rpm;
            $vsd_80_100rpm = $request->vsd_80_100rpm;
        }
        $rules6=[];
        if ($request->kitvalvulas_cambio==="X"){ 
            if ( $request->name_kit_valvulas==0){
                $rules6=[
                    'name_kit_valvulas' =>  ['required']
                ];
            }   
        }
        $rules7=[];
        if ($request->kitfiltroslinea_cambio==="X"){ 
            if ( $request->name_kit_filtro_linea==0){
                $rules7=[
                    'name_kit_filtro_linea' =>  ['required']
                ];
            }   
        }

        $rules = array_merge($rules1,$rules2,$rules3,$rules4,$rules5,$rules6, $rules7); 
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
            "reporte_numero"=>$request->reporte_numero,
            "programacionid"=>$request->programacionid,
            "reporte_fecha_servicio"=>$request->reporte_fecha_servicio,
            "reporte_orden_trabajo"=>$request->reporte_orden_trabajo,
            "nombre_tecnico_responsable_02"=>$request->nombre_tecnico_responsable_02,
            "id_tecnico_02"=>$request->id_tecnico_02,
            "id_tecnico_01"=>session()->get("Codigo"),
            "empresa_nombre"=>$request->empresa_nombre,
            "ruc"=>$request->ruc,
            "empresa_direccion"=>$request->empresa_direccion,
            "alquilado"=>'',
            "alquilado_a_empresa_nombre"=>'',
            "alquilado_a_empresa_ruc"=>'',
            "equipo_id"=>$request->equipo_id,
            "equipo_marca"=>$request->equipo_marca,
            "equipo_referencia"=>$request->equipo_referencia,
            "equipo_modelo"=>$request->equipo_modelo,
            "equipo_nro_serie"=>$request->equipo_nro_serie,
            "equipo_modulo_tipo"=>$request->equipo_modulo_tipo,
            "equipo_presion"=>$request->equipo_presion,
            "equipo_caudal"=>$request->equipo_caudal,
            "equipo_rpm"=>$request->equipo_rpm,
            "equipo_horometro"=>$request->equipo_horometro,
            "tipo_servicio_desc"=>$request->tipo_servicio_desc,
            "tipo_servicio_arranque_inicial"=>$request->tipo_servicio_arranque_inicial,
            "tipo_servicio_mantenimiento"=>$request->tipo_servicio_mantenimiento,
            "tipo_servicio_evaluacion"=>$request->tipo_servicio_evaluacion,
            "tipo_servicio_reparacion"=>$request->tipo_servicio_reparacion,
            "tipo_servicio_asesoria"=>$request->tipo_servicio_asesoria,
            "tipo_servicio_overhaul"=>$request->tipo_servicio_overhaul,
            "tipo_servicio_alquiler"=>$request->tipo_servicio_alquiler,
            "secador_modelo"=>$request->secador_modelo,
            "secador_nro_serie"=>$request->secador_nro_serie,
            "secador_punto_rocio"=>$request->secador_punto_rocio,
            "secador_voltaje_amp"=>$request->secador_voltaje_amp,
            "secador_proteccion"=>$request->secador_proteccion,
            "secador_limpieza"=>$request->secador_limpieza,
            "secador_tipo_refrigeracion"=>$request->secador_tipo_refrigeracion,
            "secador_nota"=>$request->secador_nota,
            "imagesInicialDatos"=>$request->imagesInicialDatos,
            "imagesInicialNuevoDatos"=>$request->imagesInicialNuevoDatos,
            "verificacion_tipo_aceite_usado"=>$request->verificacion_tipo_aceite_usado,
            "verificacion_estado_aceite"=>$request->verificacion_estado_aceite ,
            "verificacion_estado_filtro_de_aire"=>$request->verificacion_estado_filtro_de_aire ,
            "verificacion_estado_fajas_acoplamiento"=>$request->verificacion_estado_fajas_acoplamiento ,
            "verificacion_estado_filtro_de_aceite"=>$request->verificacion_estado_filtro_de_aceite ,
            "verificacion_estado_separador"=>$request->verificacion_estado_separador ,
            "verificacion_estado_de_limpieza"=>$request->verificacion_estado_de_limpieza ,
            "limpieza_enfriadores"=>$request->limpieza_enfriadores ,
            "engrase_de_motor"=>$request->engrase_de_motor ,
            "medicion_voltaje_ul1l2"=>$request->medicion_voltaje_ul1l2 ,
            "medicion_voltaje_ul2l3"=>$request->medicion_voltaje_ul2l3 ,
            "medicion_voltaje_ul1l3"=>$request->medicion_voltaje_ul1l3 ,
            "medicion_amperaje_l1"=>$request->medicion_amperaje_l1 ,
            "medicion_amperaje_l2"=>$request->medicion_amperaje_l2 ,
            "medicion_amperaje_l3"=>$request->medicion_amperaje_l3 ,
            "medicion_amperaje_f1"=>$request->medicion_amperaje_f1 ,
            "medicion_amperaje_f2"=>$request->medicion_amperaje_f2 ,
            "medicion_amperaje_f3"=>$request->medicion_amperaje_f3 ,
            "thermomagnetico"=>$request->thermomagnetico ,
            "linea_a_tierra"=>$request->linea_a_tierra ,
            "voltaje_del_modulo"=>$request->voltaje_del_modulo ,
            "voltaje_de_control"=>$request->voltaje_de_control ,
            "motor_electrico_i_marca"=>$request->motor_electrico_i_marca ,
            "motor_electrico_i_voltaje"=>$request->motor_electrico_i_voltaje ,
            "motor_electrico_i_amperaje"=>$request->motor_electrico_i_amperaje ,
            "motor_electrico_i_fs"=>$request->motor_electrico_i_fs ,
            "motor_electrico_i_rpm"=>$request->motor_electrico_i_rpm ,
            "motor_electrico_ii_marca"=>$request->motor_electrico_ii_marca ,
            "motor_electrico_ii_voltaje"=>$request->motor_electrico_ii_voltaje ,
            "motor_electrico_ii_amperaje"=>$request->motor_electrico_ii_amperaje ,
            "motor_electrico_ii_fs"=>$request->motor_electrico_ii_fs ,
            "motor_electrico_ii_rpm"=>$request->motor_electrico_ii_rpm ,
            "motor_electrico_iii_marca"=>$request->motor_electrico_iii_marca ,
            "motor_electrico_iii_voltaje"=>$request->motor_electrico_iii_voltaje ,
            "motor_electrico_iii_amperaje"=>$request->motor_electrico_iii_amperaje ,
            "motor_electrico_iii_fs"=>$request->motor_electrico_iii_fs ,
            "motor_electrico_iii_rpm"=>$request->motor_electrico_iii_rpm ,
            "vida_de_aceite"=>$request->vida_de_aceite ,
            "vida_de_filtro_aceite"=>$request->vida_de_filtro_aceite ,
            "vida_de_filtro_aire"=>$request->vida_de_filtro_aire ,
            "vida_de_separador"=>$request->vida_de_separador ,
            "vida_de_engrase_motor"=>$request->vida_de_engrase_motor ,
            "regulaciones_presion_carga"=>$request->regulaciones_presion_carga ,
            "regulaciones_de_descarga"=>$request->regulaciones_de_descarga ,
            "regulaciones_de_tiempo"=>$request->regulaciones_de_tiempo ,
            "regulaciones_nro_arranques"=>$request->regulaciones_nro_arranques ,
            "regulaciones_retardo_carga"=>$request->regulaciones_retardo_carga ,
            "regulaciones_pto_de_ajuste"=>$request->regulaciones_pto_de_ajuste ,
            "temperatura_elemento1"=>$request->temperatura_elemento1 ,
            "temperatura_elemento2"=>$request->temperatura_elemento2 ,
            "temperatura_aceite"=>$request->temperatura_aceite ,
            "presion_de_aceite"=>$request->presion_de_aceite ,
            "presion_intermedia"=>$request->presion_intermedia ,
            "temperatura_ent_elemento2"=>$request->temperatura_ent_elemento2 ,
            "temperatura_sal_aire"=>$request->temperatura_sal_aire ,
            "descripcion_del_trabajo"=>$request->descripcion_del_trabajo ,
            "recomendaciones"=>$request->recomendaciones ,
            "observaciones_internas"=>$request->observaciones_internas ,
            "diferencial_presion_aire"=>$request->diferencial_presion_aire ,
            "diferencial_presion_separador"=>$request->diferencial_presion_separador ,
            "horas_de_viaje"=>$request->horas_de_viaje ,
            "horas_extras"=>$request->horas_extras,
            "nombre_jefe_encargado"=>$request->nombre_jefe_encargado ,
            "horas_de_trabajo"=>$request->horas_de_trabajo ,
            "copia"=>$request->copia ,
            "temperatura_ambiente"=>$request->temperatura_ambiente,
            "vsd_medida_rpm"=>$request->vsd_medida_rpm,
            "vsd_00_20rpm"=>$vsd_00_20rpm ,
            "vsd_20_40rpm"=>$vsd_20_40rpm ,
            "vsd_40_60rpm"=>$vsd_40_60rpm ,
            "vsd_60_80rpm"=>$vsd_60_80rpm ,
            "vsd_80_100rpm"=>$vsd_80_100rpm,
            "imagesFinalNuevoDatos"=>$request->imagesFinalNuevoDatos,
            "pushFinalEditarImages"=>$request->pushFinalEditarImages,
            "imagesFirma"=>$request->imagesFirma,
            "dataEmailContact"=>$request->dataEmailContact,
            "tipo_servicio_cotizacion"=>$request->tipo_servicio_cotizacion,
            "local_nombre"=>$request->local_nombre,
            "proximo_servicio"=>$request->proximo_servicio,
            "secador_amperaje"=>$request->secador_amperaje,
            "kitvalvulas_cambio"=>$request->kitvalvulas_cambio,
            "kitvalvulas_amision"=>$request->kitvalvulas_amision,
            "kitvalvulas_termostatica"=>$request->kitvalvulas_termostatica,
            "kitvalvulas_minimapresion"=>$request->kitvalvulas_minimapresion,
            "kitvalvulas_check"=>$request->kitvalvulas_check,
            "kitvalvulas_paradaaceite"=>$request->kitvalvulas_paradaaceite,
            "kitvalvulas_lineabarrido"=>$request->kitvalvulas_lineabarrido,
            "kitvalvulas_trampagua"=>$request->kitvalvulas_trampagua,
            "kitvalvulas_solenoide"=>$request->kitvalvulas_solenoide,
            "kitvalvulas_ventilacion"=>$request->kitvalvulas_ventilacion,
            "kitvalvulas_tresvias"=>$request->kitvalvulas_tresvias,
            "kitvalvulas_regulacion_termostatica"=>$request->kitvalvulas_regulacion_termostatica,
            "kitvalvulas_purgador_auto_ewd"=>$request->kitvalvulas_purgador_auto_ewd,
            "kitfiltroslinea_cambio"=>$request->kitfiltroslinea_cambio,
            "kitfiltroslinea_dd"=>$request->kitfiltroslinea_dd,
            "kitfiltroslinea_qd"=>$request->kitfiltroslinea_qd,
            "kitfiltroslinea_ddp"=>$request->kitfiltroslinea_ddp,
            "kitfiltroslinea_pd"=>$request->kitfiltroslinea_pd,
            "kitfiltroslinea_qdt"=>$request->kitfiltroslinea_qdt,
            "kitfiltroslinea_udplus"=>$request->kitfiltroslinea_udplus,
            "kitfiltroslinea_pdp"=>$request->kitfiltroslinea_pdp,
            "medicion_ventilador_01_l1"=>$request->medicion_ventilador_01_l1,
            "medicion_ventilador_01_l2"=>$request->medicion_ventilador_01_l2,
            "medicion_ventilador_01_l3"=>$request->medicion_ventilador_01_l3,
            "medicion_ventilador_02_l1"=>$request->medicion_ventilador_02_l1,
            "medicion_ventilador_02_l2"=>$request->medicion_ventilador_02_l2,
            "medicion_ventilador_02_l3"=>$request->medicion_ventilador_02_l3,
            "id_tecnico_firma"=>session()->get("Codigo"),
            "nombre_tecnico_firma"=>session()->get("Nombre"),
            "arrayGuiaRem"=>$request->arrayGuiaRem,
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/actualizar-final',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    
    public function listarReporteByRucByEquipo(Request $request){
        $param = array(
            "ruc"=> $request->ruc,
            "local_codigo"=> $request->local_codigo,
            "equipo_id"=> $request->equipo_id,
        );
        //$from =  $request->from;
        /*$param = array(
            "ruc"=> '20414766308',
            "local_codigo"=> 0,
            "equipo_id"=> 1488,
        );
        */
        $datosReporte =FunctionController::ApiRest('/api/reporte/listar-reporte-by-ruc-by-equipo',$param ,'POST');
        if ($datosReporte){
            $data = $datosReporte["data"];
            $arrayDatos=array();
            $IdCounter=0;
            foreach($data as $val){
                $IdCounter++;
                $badgeColor = 'success';
                $html="";
                $class = 'cls_'.$val["REPORTE_NUMERO"].'_'.$val["REPORTE_SERIE"];
                $arrayDatos[]=array(
                    "IdCounter"=>$IdCounter,
                    "REPORTE_NUMERO"=>$val["REPORTE_SERIE"].'-'.$val["REPORTE_NUMERO"],
                    "REPORTE_ORDEN_TRABAJO"=>$val["REPORTE_ORDEN_TRABAJO"] ,
                    "TIPO_SERVICIO_DESC"=>$val["TIPO_SERVICIO_DESC"],
                    "REPORTE_FECHA_SERVICIO"=>$val["REPORTE_FECHA_SERVICIO"] ,
                    "EQUIPO_HOROMETRO"=>$val["EQUIPO_HOROMETRO"],
                    "NOMBRE_TECNICO_FIRMA"=>$val["NOMBRE_TECNICO_FIRMA"],
                    "html"=>'<button data-tipo_equipo="'.$val["TIPO_EQUIPO"].'" data-reporte_numero='.$val["REPORTE_NUMERO"].' data-reporte_serie='.$val["REPORTE_SERIE"].' type="button" class="btn btn-sm btn-primary btn_ver_detalle_reporte">
                        <span class="indicator-label">Ver Detalle</span>
                        <span class="indicator-progress">Espere por favor...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>',
                    "btnreenviar"=>'<button data-tipo_equipo="'.$val["TIPO_EQUIPO"].'" data-reporte_numero='.$val["REPORTE_NUMERO"].' data-reporte_serie='.$val["REPORTE_SERIE"].' data-class='. $class.' type="button" class="btn btn-sm btn-dark btn_reenviar_correo '. $class.'">
                        <span class="indicator-label">Reenviar</span>
                        <span class="indicator-progress">Espere por favor...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>',
                    "btndescargar"=>'<a href="#" data-archivo="'.$val["REPORTE_ARCHIVO_PDF"].'"  data-class='. $class.' type="button" class="btn btn-sm btn-success btn_descargar '. $class.'">
                        <span class="indicator-label">Descargar</span>
                        <span class="indicator-progress">Espere por favor...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </a>',
                );
            }
            return response()->json([
                "icon"=>'success',
                "status"=>true,
                "data"=>$arrayDatos,
                "message"=>"correcto"
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "icon"=>'error',
                "status"=>false, 
                "data"=>$datosReporte,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }

    public function listarTipoTable(Request $request){
        $param = array(
            "tipo_table"=> $request->tipo_table
        );
        $datosReporte =FunctionController::ApiRest('/api/reporte/listar-tipo-table',$param ,'POST');
        if ($datosReporte){
            return response()->json([
                "icon"=>'success',
                "status"=>true,
                "data"=>$datosReporte,
                "message"=>"Correcto"
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "icon"=>'error',
                "status"=>false, 
                "data"=>$datosReporte,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function actualizarProgramacionUser(Request $request){
        $param = array(
            "opcion"=> $request->opcion,
            "usuario_login"=> $request->usuario_login,
            "programacionid"=> $request->programacionid,
            "numot"=> $request->numot
        );
        $datosReporte =FunctionController::ApiRest('/api/reporte/actualizar-programacion-user',$param ,'POST');
        if ($datosReporte){
            return response()->json([
                "icon"=>'success',
                "status"=>true,
                "data"=>$datosReporte,
                "message"=>"Correcto"
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "icon"=>'error',
                "status"=>false, 
                "data"=>$datosReporte,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }

    public function GetBloqueo(Request $request){
        $param = array(
            "programacionid"=> $request->programacionid,
            "numot"=> $request->numot,
            "usuariologin"=> $request->usuariologin
        );
        $datosReporte =FunctionController::ApiRest('/api/reporte/get-bloqueo',$param ,'POST');
        if ($datosReporte){
            return response()->json([
                "icon"=>'success',
                "status"=>true,
                "data"=>$datosReporte,
                "message"=>"Correcto edw"
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "icon"=>'error',
                "status"=>false, 
                "data"=>$datosReporte,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }

    public function listarArchivoByReporteHistorialDetalle(Request $request){
        $param = array(
            "reporte_numero"=> $request->reporte_numero,
            "programacionid"=> $request->programacionid
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/listar-archivo-by-reporte-historial-detalle',$param ,'POST');
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
    public function validarPaso2(Request $request){
        $rules1=[];
        if ($request->id_obl!="0"){
            $rules1=[
                'id_tecnico_02' =>  ['required'],
            ];
        }
        
        $rules2=[
            'reporte_numero' =>  ['required'],
            'reporte_orden_trabajo' =>  ['required'],
            'empresa_nombre' =>  ['required'],
            'ruc' =>  ['required'],
            'empresa_direccion' =>  ['required'],
            //'empresa_telefono' =>  ['required'],
            //'empresa_email' =>  ['required', 'email'],
            'id_tecnico_01' =>  ['required'],
            'tipo_servicio_desc' =>  ['required'],
            //'reporte_fecha_servicio' =>  ['required'],
            'equipo_id' =>  ['required'],
            'equipo_marca' =>  ['required'],
            'equipo_referencia' =>  ['required'],
            'equipo_modelo' =>  ['required'],
            'equipo_nro_serie' =>  ['required'],
            'equipo_modulo_tipo' =>  ['required'],
            'equipo_presion' =>  ['required'],
            'equipo_caudal' =>  ['required'],
            'equipo_rpm' =>  ['required'],
            'equipo_horometro' =>  ['required',"numeric"],
            //'programacionid' =>  ['required'],
            
        ];
        $rules3=[];
        $rules4=[];
        if ($request->id_secador_obl!="0"){
            $rules3=[
                'secador_modelo' =>  ['required'],
                'secador_nro_serie' =>  ['required'],
                'secador_punto_rocio' =>  ['required'],
                'secador_voltaje_amp' =>  ['required'],
                'secador_amperaje' =>  ['required'],
                'secador_proteccion' =>  ['required'],
                'secador_limpieza' =>  ['required'],
                'secador_tipo_refrigeracion' =>  ['required'],
                'secador_nota' =>  ['required']
            ];
        }
        if ($request->vsd_medida_rpm!=""){
            $rules4=[
                'vsd_00_20rpm' =>  ['required','numeric'],
                'vsd_20_40rpm' =>  ['required','numeric'],
                'vsd_40_60rpm' =>  ['required','numeric'],
                'vsd_60_80rpm' =>  ['required','numeric'],
                'vsd_80_100rpm' => ['required','numeric']
            ];
        }
        $rules = array_merge($rules1,$rules2, $rules3, $rules4);  
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
        return response()->json([
            "type"=>'full',
            "icon"=>'succes',
            "status"=>true,
            "data"=>$validacion,
            'message'=>'Correctamente'
        ], Response::HTTP_OK);
    }

    public function actualizarReportePaso2(Request $request){
        $rules1=[];
        if ($request->id_obl!="0"){
            $rules1=[
                'id_tecnico_02' =>  ['required'],
            ];
        }
        $rules2=[            
            'reporte_numero' =>  ['required'],
            'reporte_orden_trabajo' =>  ['required'],
            'empresa_nombre' =>  ['required'],
            "reporte_fecha_servicio"=>["required"],
            'ruc' =>  ['required'],
            'empresa_direccion' =>  ['required'],
            'id_tecnico_01' =>  ['required'],
            'tipo_servicio_desc' =>  ['required'],
            'equipo_id' =>  ['required'],
            'equipo_marca' =>  ['required'],
            'equipo_referencia' =>  ['required'],
            'equipo_modelo' =>  ['required'],
            'equipo_nro_serie' =>  ['required'],
            'equipo_modulo_tipo' =>  ['required'],
            'equipo_presion' =>  ['required'],
            'equipo_caudal' =>  ['required'],
            'equipo_rpm' =>  ['required'],
            'equipo_horometro' =>  ['required',"numeric"],
            //'horometro' =>  ['required'],
        ];
        $rules3=[];
        /*if ($request->vsd_medida_rpm==""){
            $rules3=[
                "regulaciones_presion_carga"=>['required'],
                "regulaciones_de_descarga"=>['required'],
            ];
        }else{
            $rules3=[
                "regulaciones_pto_de_ajuste"=>['required'],
            ];
        }*/
        $rules4=[];
        $rules5=[];
        if ($request->id_secador_obl!="0"){
            $rules4=[
                'secador_modelo' =>  ['required'],
                'secador_nro_serie' =>  ['required'],
                'secador_punto_rocio' =>  ['required'],
                'secador_voltaje_amp' =>  ['required'],
                'secador_amperaje' =>  ['required'],
                'secador_proteccion' =>  ['required'],
                'secador_limpieza' =>  ['required'],
                'secador_tipo_refrigeracion' =>  ['required'],
                'secador_nota' =>  ['required']
            ];
        }
        $vsd_00_20rpm = 0;
        $vsd_20_40rpm = 0;
        $vsd_40_60rpm = 0;
        $vsd_60_80rpm = 0;
        $vsd_80_100rpm = 0;
        if ($request->vsd_medida_rpm!=""){
            $rules5=[
                'vsd_00_20rpm' =>  ['required','numeric'],
                'vsd_20_40rpm' =>  ['required','numeric'],
                'vsd_40_60rpm' =>  ['required','numeric'],
                'vsd_60_80rpm' =>  ['required','numeric'],
                'vsd_80_100rpm' => ['required','numeric']
            ];
            $vsd_00_20rpm = $request->vsd_00_20rpm;
            $vsd_20_40rpm = $request->vsd_20_40rpm;
            $vsd_40_60rpm = $request->vsd_40_60rpm;
            $vsd_60_80rpm = $request->vsd_60_80rpm;
            $vsd_80_100rpm = $request->vsd_80_100rpm;
        }
        $rules6=[];
        $rules7=[];
        /*if ($request->kitvalvulas_cambio==="X"){ 
            if ( $request->name_kit_valvulas==0){
                $rules6=[
                    'name_kit_valvulas' =>  ['required']
                ];
            }   
        }
       
        if ($request->kitfiltroslinea_cambio==="X"){ 
            if ( $request->name_kit_filtro_linea==0){
                $rules7=[
                    'name_kit_filtro_linea' =>  ['required']
                ];
            }   
        }*/

        $rules = array_merge($rules1,$rules2,$rules3,$rules4,$rules5,$rules6, $rules7); 
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
            "reporte_numero"=>$request->reporte_numero,
            "reporte_fecha_servicio"=>$request->reporte_fecha_servicio,
            "reporte_orden_trabajo"=>$request->reporte_orden_trabajo,
            "nombre_tecnico_responsable_02"=>$request->nombre_tecnico_responsable_02,
            "id_tecnico_02"=>$request->id_tecnico_02,
            //"id_tecnico_01"=>session()->get("Codigo"),
            "empresa_nombre"=>$request->empresa_nombre,
            "ruc"=>$request->ruc,
            "empresa_direccion"=>$request->empresa_direccion,
            "equipo_id"=>$request->equipo_id,
            "equipo_marca"=>$request->equipo_marca,
            "equipo_referencia"=>$request->equipo_referencia,
            "equipo_modelo"=>$request->equipo_modelo,
            "equipo_nro_serie"=>$request->equipo_nro_serie,
            "equipo_modulo_tipo"=>$request->equipo_modulo_tipo,
            "equipo_presion"=>$request->equipo_presion,
            "equipo_caudal"=>$request->equipo_caudal,
            "equipo_rpm"=>$request->equipo_rpm,
            "equipo_horometro"=>$request->equipo_horometro,
            "tipo_servicio_desc"=>$request->tipo_servicio_desc,
            "tipo_servicio_arranque_inicial"=>$request->tipo_servicio_arranque_inicial,
            "tipo_servicio_mantenimiento"=>$request->tipo_servicio_mantenimiento,
            "tipo_servicio_evaluacion"=>$request->tipo_servicio_evaluacion,
            "tipo_servicio_reparacion"=>$request->tipo_servicio_reparacion,
            "tipo_servicio_asesoria"=>$request->tipo_servicio_asesoria,
            "tipo_servicio_overhaul"=>$request->tipo_servicio_overhaul,
            "tipo_servicio_alquiler"=>$request->tipo_servicio_alquiler,
            "secador_modelo"=>$request->secador_modelo,
            "secador_nro_serie"=>$request->secador_nro_serie,
            "secador_punto_rocio"=>$request->secador_punto_rocio,
            "secador_voltaje_amp"=>$request->secador_voltaje_amp,
            "secador_proteccion"=>$request->secador_proteccion,
            "secador_limpieza"=>$request->secador_limpieza,
            "secador_tipo_refrigeracion"=>$request->secador_tipo_refrigeracion,
            "secador_nota"=>$request->secador_nota,
            "vsd_medida_rpm"=>$request->vsd_medida_rpm,
            "vsd_00_20rpm"=>$vsd_00_20rpm ,
            "vsd_20_40rpm"=>$vsd_20_40rpm ,
            "vsd_40_60rpm"=>$vsd_40_60rpm ,
            "vsd_60_80rpm"=>$vsd_60_80rpm ,
            "vsd_80_100rpm"=>$vsd_80_100rpm ,      
            "secador_amperaje"=>$request->secador_amperaje,
            "horas_carga"=>$request->horas_carga,
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/actualizar-reporte-paso2',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function validacionpas03(Request $request){
        
        $rules1=[            
            'verificacion_tipo_aceite_usado' =>  ['required'],
            'verificacion_estado_aceite' =>  ['required'],
            'verificacion_estado_separador' =>  ['required'],
            'verificacion_estado_fajas_acoplamiento' =>  ['required'],
            'verificacion_estado_de_limpieza' =>  ['required'],
            'verificacion_estado_filtro_de_aceite' =>  ['required'],
            'verificacion_estado_filtro_de_aire' =>  ['required'],
            
            'medicion_voltaje_ul1l2' =>  ['required']  ,
            "medicion_voltaje_ul2l3"=> ['required'] ,
            //"medicion_voltaje_ul1l3"=> ['required'],
            "medicion_amperaje_l1"=> ['required'],
            "medicion_amperaje_l2"=> ['required'],
            //"medicion_amperaje_l3"=> ['required'] ,
            //"medicion_amperaje_f1"=> ['required'] ,
            //"medicion_amperaje_f2"=> ['required'],
            //"medicion_amperaje_f3"=> ['required'],
            "thermomagnetico"=>['required'],
            "linea_a_tierra"=>['required'],
            "voltaje_de_control"=>['required'],
            "voltaje_del_modulo"=>['required'],
            "motor_electrico_i_marca"=>['required'],
            "motor_electrico_i_voltaje"=>['required'],
            "motor_electrico_i_amperaje"=>['required'],
            "motor_electrico_i_fs"=>['required'],
            "motor_electrico_i_rpm"=>['required'],
            "vida_de_aceite"=>['required'],
            "vida_de_filtro_aceite"=>['required'],
            "vida_de_filtro_aire"=>['required'] ,
            "vida_de_separador"=>['required'],
            "regulaciones_de_tiempo"=>['required'] ,
            "regulaciones_nro_arranques"=>['required'] ,
            "temperatura_elemento1"=>['required'] ,

            /*
            "temperatura_aceite"=>['required'],
            "presion_de_aceite"=>['required'],
            "presion_intermedia"=>['required'] ,
            "temperatura_sal_aire"=>['required'],*/
            
        ];
        $rules2=[];
        if ($request->vsd_medida_rpm==""){
            $rules2=[
                "regulaciones_presion_carga"=>['required'],
                "regulaciones_de_descarga"=>['required'],
            ];
        }else{
            $rules2=[
                "regulaciones_pto_de_ajuste"=>['required'],
            ];
        }
        $rules3=[];
        if ($request->kitvalvulas_cambio==="X"){ 
            if ( $request->name_kit_valvulas==0){
                $rules3=[
                    'name_kit_valvulas' =>  ['required']
                ];
            }   
        }
        $rules4=[];
        if ($request->kitfiltroslinea_cambio==="X"){ 
            if ( $request->name_kit_filtro_linea==0){
                $rules4=[
                    'name_kit_filtro_linea' =>  ['required']
                ];
            }   
        }
        $rules = array_merge($rules1,$rules2,$rules3,$rules4); 
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
        return response()->json([
            "type"=>'full',
            "icon"=>'succes',
            "status"=>true,
            "data"=>$validacion,
            'message'=>'Correctamente'
        ], Response::HTTP_OK);
    }
    public function actualizarReportePaso3(Request $request){
        $rules1=[   
            'reporte_numero' =>  ['required'],
            'verificacion_tipo_aceite_usado' =>  ['required'],
            'verificacion_estado_aceite' =>  ['required'],
            'verificacion_estado_separador' =>  ['required'],
            'verificacion_estado_fajas_acoplamiento' =>  ['required'],
            'verificacion_estado_de_limpieza' =>  ['required'],
            'verificacion_estado_filtro_de_aceite' =>  ['required'],
            'verificacion_estado_filtro_de_aire' =>  ['required'],
            'medicion_voltaje_ul1l2' =>  ['required']  ,
            "medicion_voltaje_ul2l3"=> ['required'] ,
            "medicion_amperaje_l1"=> ['required'],
            "medicion_amperaje_l2"=> ['required'],
            "thermomagnetico"=>['required'],
            "linea_a_tierra"=>['required'],
            "voltaje_de_control"=>['required'],
            "voltaje_del_modulo"=>['required'],
            "motor_electrico_i_marca"=>['required'],
            "motor_electrico_i_voltaje"=>['required'],
            "motor_electrico_i_amperaje"=>['required'],
            "motor_electrico_i_fs"=>['required'],
            "motor_electrico_i_rpm"=>['required'],
            "vida_de_aceite"=>['required'],
            "vida_de_filtro_aceite"=>['required'],
            "vida_de_filtro_aire"=>['required'] ,
            "vida_de_separador"=>['required'],
            "regulaciones_de_tiempo"=>['required'] ,
            "regulaciones_nro_arranques"=>['required'] ,
            "temperatura_elemento1"=>['required'] ,
            /*
            "temperatura_aceite"=>['required'],
            "presion_de_aceite"=>['required'],
            "presion_intermedia"=>['required'] ,
            "temperatura_sal_aire"=>['required'],*/
            
        ];
        $rules2=[];
        if ($request->vsd_medida_rpm==""){
            $rules2=[
                "regulaciones_presion_carga"=>['required'],
                "regulaciones_de_descarga"=>['required'],
            ];
        }else{
            $rules2=[
                "regulaciones_pto_de_ajuste"=>['required'],
            ];
        }
        $rules3=[];
        if ($request->kitvalvulas_cambio==="X"){ 
            if ( $request->name_kit_valvulas==0){
                $rules3=[
                    'name_kit_valvulas' =>  ['required']
                ];
            }   
        }
        $rules4=[];
        if ($request->kitfiltroslinea_cambio==="X"){ 
            if ( $request->name_kit_filtro_linea==0){
                $rules4=[
                    'name_kit_filtro_linea' =>  ['required']
                ];
            }   
        }
        $rules = array_merge($rules1,$rules2,$rules3,$rules4); 
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
            "reporte_numero"=>$request->reporte_numero,
            "verificacion_tipo_aceite_usado"=>$request->verificacion_tipo_aceite_usado,
            "verificacion_estado_aceite"=>$request->verificacion_estado_aceite ,
            "verificacion_estado_filtro_de_aire"=>$request->verificacion_estado_filtro_de_aire ,
            "verificacion_estado_fajas_acoplamiento"=>$request->verificacion_estado_fajas_acoplamiento ,
            "verificacion_estado_filtro_de_aceite"=>$request->verificacion_estado_filtro_de_aceite ,
            "verificacion_estado_separador"=>$request->verificacion_estado_separador ,
            "verificacion_estado_de_limpieza"=>$request->verificacion_estado_de_limpieza ,
            "limpieza_enfriadores"=>$request->limpieza_enfriadores ,
            "engrase_de_motor"=>$request->engrase_de_motor ,
            "medicion_voltaje_ul1l2"=>$request->medicion_voltaje_ul1l2 ,
            "medicion_voltaje_ul2l3"=>$request->medicion_voltaje_ul2l3 ,
            "medicion_voltaje_ul1l3"=>$request->medicion_voltaje_ul1l3 ,
            "medicion_amperaje_l1"=>$request->medicion_amperaje_l1 ,
            "medicion_amperaje_l2"=>$request->medicion_amperaje_l2 ,
            "medicion_amperaje_l3"=>$request->medicion_amperaje_l3 ,
            "medicion_amperaje_f1"=>$request->medicion_amperaje_f1 ,
            "medicion_amperaje_f2"=>$request->medicion_amperaje_f2 ,
            "medicion_amperaje_f3"=>$request->medicion_amperaje_f3 ,
            "thermomagnetico"=>$request->thermomagnetico ,
            "linea_a_tierra"=>$request->linea_a_tierra ,
            "voltaje_del_modulo"=>$request->voltaje_del_modulo ,
            "voltaje_de_control"=>$request->voltaje_de_control ,
            "motor_electrico_i_marca"=>$request->motor_electrico_i_marca ,
            "motor_electrico_i_voltaje"=>$request->motor_electrico_i_voltaje ,
            "motor_electrico_i_amperaje"=>$request->motor_electrico_i_amperaje ,
            "motor_electrico_i_fs"=>$request->motor_electrico_i_fs ,
            "motor_electrico_i_rpm"=>$request->motor_electrico_i_rpm ,
            "motor_electrico_ii_marca"=>$request->motor_electrico_ii_marca ,
            "motor_electrico_ii_voltaje"=>$request->motor_electrico_ii_voltaje ,
            "motor_electrico_ii_amperaje"=>$request->motor_electrico_ii_amperaje ,
            "motor_electrico_ii_fs"=>$request->motor_electrico_ii_fs ,
            "motor_electrico_ii_rpm"=>$request->motor_electrico_ii_rpm ,
            "motor_electrico_iii_marca"=>$request->motor_electrico_iii_marca ,
            "motor_electrico_iii_voltaje"=>$request->motor_electrico_iii_voltaje ,
            "motor_electrico_iii_amperaje"=>$request->motor_electrico_iii_amperaje ,
            "motor_electrico_iii_fs"=>$request->motor_electrico_iii_fs ,
            "motor_electrico_iii_rpm"=>$request->motor_electrico_iii_rpm ,
            "vida_de_aceite"=>$request->vida_de_aceite ,
            "vida_de_filtro_aceite"=>$request->vida_de_filtro_aceite ,
            "vida_de_filtro_aire"=>$request->vida_de_filtro_aire ,
            "vida_de_separador"=>$request->vida_de_separador ,
            "vida_de_engrase_motor"=>$request->vida_de_engrase_motor ,
            "regulaciones_presion_carga"=>$request->regulaciones_presion_carga ,
            "regulaciones_de_descarga"=>$request->regulaciones_de_descarga ,
            "regulaciones_de_tiempo"=>$request->regulaciones_de_tiempo ,
            "regulaciones_nro_arranques"=>$request->regulaciones_nro_arranques ,
            "regulaciones_retardo_carga"=>$request->regulaciones_retardo_carga ,
            "regulaciones_pto_de_ajuste"=>$request->regulaciones_pto_de_ajuste ,
            "temperatura_elemento1"=>$request->temperatura_elemento1 ,
            "temperatura_elemento2"=>$request->temperatura_elemento2 ,
            "temperatura_aceite"=>$request->temperatura_aceite ,
            "presion_de_aceite"=>$request->presion_de_aceite ,
            "presion_intermedia"=>$request->presion_intermedia ,
            "temperatura_ent_elemento2"=>$request->temperatura_ent_elemento2 ,
            "temperatura_sal_aire"=>$request->temperatura_sal_aire ,
            "diferencial_presion_aire"=>$request->diferencial_presion_aire ,
            "diferencial_presion_separador"=>$request->diferencial_presion_separador ,
            "temperatura_ambiente"=>$request->temperatura_ambiente,
            "kitvalvulas_cambio"=>$request->kitvalvulas_cambio,
            "kitvalvulas_amision"=>$request->kitvalvulas_amision,
            "kitvalvulas_termostatica"=>$request->kitvalvulas_termostatica,
            "kitvalvulas_minimapresion"=>$request->kitvalvulas_minimapresion,
            "kitvalvulas_check"=>$request->kitvalvulas_check,
            "kitvalvulas_paradaaceite"=>$request->kitvalvulas_paradaaceite,
            "kitvalvulas_lineabarrido"=>$request->kitvalvulas_lineabarrido,
            "kitvalvulas_trampagua"=>$request->kitvalvulas_trampagua,
            "kitvalvulas_solenoide"=>$request->kitvalvulas_solenoide,
            "kitvalvulas_ventilacion"=>$request->kitvalvulas_ventilacion,
            "kitvalvulas_tresvias"=>$request->kitvalvulas_tresvias,
            "kitvalvulas_regulacion_termostatica"=>$request->kitvalvulas_regulacion_termostatica,
            "kitvalvulas_purgador_auto_ewd"=>$request->kitvalvulas_purgador_auto_ewd,
            "kitfiltroslinea_cambio"=>$request->kitfiltroslinea_cambio,
            "kitfiltroslinea_dd"=>$request->kitfiltroslinea_dd,
            "kitfiltroslinea_qd"=>$request->kitfiltroslinea_qd,
            "kitfiltroslinea_ddp"=>$request->kitfiltroslinea_ddp,
            "kitfiltroslinea_pd"=>$request->kitfiltroslinea_pd,
            "kitfiltroslinea_qdt"=>$request->kitfiltroslinea_qdt,
            "kitfiltroslinea_udplus"=>$request->kitfiltroslinea_udplus,
            "kitfiltroslinea_pdp"=>$request->kitfiltroslinea_pdp,
            "medicion_ventilador_01_l1"=>$request->medicion_ventilador_01_l1,
            "medicion_ventilador_01_l2"=>$request->medicion_ventilador_01_l2,
            "medicion_ventilador_01_l3"=>$request->medicion_ventilador_01_l3,
            "medicion_ventilador_02_l1"=>$request->medicion_ventilador_02_l1,
            "medicion_ventilador_02_l2"=>$request->medicion_ventilador_02_l2,
            "medicion_ventilador_02_l3"=>$request->medicion_ventilador_02_l3,
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/actualizar-reporte-paso3',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function guardarFotosFinalesPaso4(Request $request){
        $rules1=[            
            'reporte_numero' =>  ['required'],
            'id_tecnico_01' =>  ['required']
        ];
        $rules = array_merge($rules1); 
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
            "reporte_numero"=>$request->reporte_numero,
            "id_tecnico_01"=>$request->id_tecnico_01 ,
            "pushFinalImages"=>$request->pushFinalImages,
            "imagesNuevoDatos"=>$request->imagesNuevoDatos,
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/guardar-fotos-finales-paso4',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function actualizarReportePaso5(Request $request){
        $rules1=[   
            'reporte_numero' =>  ['required'],
            'descripcion_del_trabajo' =>  ['required']
        ];
        $rules = array_merge($rules1); 
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
            "reporte_numero"=>$request->reporte_numero,
            "descripcion_del_trabajo"=>$request->descripcion_del_trabajo,
            "recomendaciones"=>$request->recomendaciones,
            "observaciones_internas"=>$request->observaciones_internas,
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/guardar-fotos-finales-paso5',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController,
                "datos"=>[
                    "descripcion_del_trabajo"=>nl2br($request->descripcion_del_trabajo),
                    "recomendaciones"=>nl2br($request->recomendaciones),
                    "observaciones_internas"=>nl2br($request->observaciones_internas)
                ]
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    } 
    public function guardarSaliRegresarReportePaso2(Request $request){
        $vsd_00_20rpm =$request->vsd_00_20rpm ==""?0: $request->vsd_00_20rpm;
        $vsd_20_40rpm =$request->vsd_20_40rpm==""?0: $request->vsd_20_40rpm;
        $vsd_40_60rpm =$request->vsd_40_60rpm==""?0: $request->vsd_40_60rpm;
        $vsd_60_80rpm =$request->vsd_60_80rpm==""?0: $request->vsd_60_80rpm;
        $vsd_80_100rpm =$request->vsd_80_100rpm==""?0: $request->vsd_80_100rpm;
        $param = array(
            "reporte_numero"=>$request->reporte_numero,
            "reporte_fecha_servicio"=>$request->reporte_fecha_servicio,
            "reporte_orden_trabajo"=>$request->reporte_orden_trabajo,
            "nombre_tecnico_responsable_02"=>$request->nombre_tecnico_responsable_02,
            "id_tecnico_02"=>$request->id_tecnico_02,
            "empresa_nombre"=>$request->empresa_nombre,
            "ruc"=>$request->ruc,
            "empresa_direccion"=>$request->empresa_direccion,
            "equipo_id"=>$request->equipo_id,
            "equipo_marca"=>$request->equipo_marca,
            "equipo_referencia"=>$request->equipo_referencia,
            "equipo_modelo"=>$request->equipo_modelo,
            "equipo_nro_serie"=>$request->equipo_nro_serie,
            "equipo_modulo_tipo"=>$request->equipo_modulo_tipo,
            "equipo_presion"=>$request->equipo_presion,
            "equipo_caudal"=>$request->equipo_caudal,
            "equipo_rpm"=>$request->equipo_rpm,
            "equipo_horometro"=>$request->equipo_horometro,
            "tipo_servicio_desc"=>$request->tipo_servicio_desc,
            "tipo_servicio_arranque_inicial"=>$request->tipo_servicio_arranque_inicial,
            "tipo_servicio_mantenimiento"=>$request->tipo_servicio_mantenimiento,
            "tipo_servicio_evaluacion"=>$request->tipo_servicio_evaluacion,
            "tipo_servicio_reparacion"=>$request->tipo_servicio_reparacion,
            "tipo_servicio_asesoria"=>$request->tipo_servicio_asesoria,
            "tipo_servicio_overhaul"=>$request->tipo_servicio_overhaul,
            "tipo_servicio_alquiler"=>$request->tipo_servicio_alquiler,
            "secador_modelo"=>$request->secador_modelo,
            "secador_nro_serie"=>$request->secador_nro_serie,
            "secador_punto_rocio"=>$request->secador_punto_rocio,
            "secador_voltaje_amp"=>$request->secador_voltaje_amp,
            "secador_proteccion"=>$request->secador_proteccion,
            "secador_limpieza"=>$request->secador_limpieza,
            "secador_tipo_refrigeracion"=>$request->secador_tipo_refrigeracion,
            "secador_nota"=>$request->secador_nota,
            "vsd_medida_rpm"=>$request->vsd_medida_rpm,
            "vsd_00_20rpm"=>$vsd_00_20rpm ,
            "vsd_20_40rpm"=>$vsd_20_40rpm ,
            "vsd_40_60rpm"=>$vsd_40_60rpm ,
            "vsd_60_80rpm"=>$vsd_60_80rpm ,
            "vsd_80_100rpm"=>$vsd_80_100rpm ,      
            "secador_amperaje"=>$request->secador_amperaje,
            "horas_carga"=>$request->horas_carga
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/actualizar-reporte-paso2',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function guardarSaliRegresarReportePaso3(Request $request){
        $param = array(
            "reporte_numero"=>$request->reporte_numero,
            "verificacion_tipo_aceite_usado"=>$request->verificacion_tipo_aceite_usado,
            "verificacion_estado_aceite"=>$request->verificacion_estado_aceite ,
            "verificacion_estado_filtro_de_aire"=>$request->verificacion_estado_filtro_de_aire ,
            "verificacion_estado_fajas_acoplamiento"=>$request->verificacion_estado_fajas_acoplamiento ,
            "verificacion_estado_filtro_de_aceite"=>$request->verificacion_estado_filtro_de_aceite ,
            "verificacion_estado_separador"=>$request->verificacion_estado_separador ,
            "verificacion_estado_de_limpieza"=>$request->verificacion_estado_de_limpieza ,
            "limpieza_enfriadores"=>$request->limpieza_enfriadores ,
            "engrase_de_motor"=>$request->engrase_de_motor ,
            "medicion_voltaje_ul1l2"=>$request->medicion_voltaje_ul1l2 ,
            "medicion_voltaje_ul2l3"=>$request->medicion_voltaje_ul2l3 ,
            "medicion_voltaje_ul1l3"=>$request->medicion_voltaje_ul1l3 ,
            "medicion_amperaje_l1"=>$request->medicion_amperaje_l1 ,
            "medicion_amperaje_l2"=>$request->medicion_amperaje_l2 ,
            "medicion_amperaje_l3"=>$request->medicion_amperaje_l3 ,
            "medicion_amperaje_f1"=>$request->medicion_amperaje_f1 ,
            "medicion_amperaje_f2"=>$request->medicion_amperaje_f2 ,
            "medicion_amperaje_f3"=>$request->medicion_amperaje_f3 ,
            "thermomagnetico"=>$request->thermomagnetico ,
            "linea_a_tierra"=>$request->linea_a_tierra ,
            "voltaje_del_modulo"=>$request->voltaje_del_modulo ,
            "voltaje_de_control"=>$request->voltaje_de_control ,
            "motor_electrico_i_marca"=>$request->motor_electrico_i_marca ,
            "motor_electrico_i_voltaje"=>$request->motor_electrico_i_voltaje ,
            "motor_electrico_i_amperaje"=>$request->motor_electrico_i_amperaje ,
            "motor_electrico_i_fs"=>$request->motor_electrico_i_fs ,
            "motor_electrico_i_rpm"=>$request->motor_electrico_i_rpm ,
            "motor_electrico_ii_marca"=>$request->motor_electrico_ii_marca ,
            "motor_electrico_ii_voltaje"=>$request->motor_electrico_ii_voltaje ,
            "motor_electrico_ii_amperaje"=>$request->motor_electrico_ii_amperaje ,
            "motor_electrico_ii_fs"=>$request->motor_electrico_ii_fs ,
            "motor_electrico_ii_rpm"=>$request->motor_electrico_ii_rpm ,
            "motor_electrico_iii_marca"=>$request->motor_electrico_iii_marca ,
            "motor_electrico_iii_voltaje"=>$request->motor_electrico_iii_voltaje ,
            "motor_electrico_iii_amperaje"=>$request->motor_electrico_iii_amperaje ,
            "motor_electrico_iii_fs"=>$request->motor_electrico_iii_fs ,
            "motor_electrico_iii_rpm"=>$request->motor_electrico_iii_rpm ,
            "vida_de_aceite"=>$request->vida_de_aceite ,
            "vida_de_filtro_aceite"=>$request->vida_de_filtro_aceite ,
            "vida_de_filtro_aire"=>$request->vida_de_filtro_aire ,
            "vida_de_separador"=>$request->vida_de_separador ,
            "vida_de_engrase_motor"=>$request->vida_de_engrase_motor ,
            "regulaciones_presion_carga"=>$request->regulaciones_presion_carga ,
            "regulaciones_de_descarga"=>$request->regulaciones_de_descarga ,
            "regulaciones_de_tiempo"=>$request->regulaciones_de_tiempo ,
            "regulaciones_nro_arranques"=>$request->regulaciones_nro_arranques ,
            "regulaciones_retardo_carga"=>$request->regulaciones_retardo_carga ,
            "regulaciones_pto_de_ajuste"=>$request->regulaciones_pto_de_ajuste ,
            "temperatura_elemento1"=>$request->temperatura_elemento1 ,
            "temperatura_elemento2"=>$request->temperatura_elemento2 ,
            "temperatura_aceite"=>$request->temperatura_aceite ,
            "presion_de_aceite"=>$request->presion_de_aceite ,
            "presion_intermedia"=>$request->presion_intermedia ,
            "temperatura_ent_elemento2"=>$request->temperatura_ent_elemento2 ,
            "temperatura_sal_aire"=>$request->temperatura_sal_aire ,
            "diferencial_presion_aire"=>$request->diferencial_presion_aire ,
            "diferencial_presion_separador"=>$request->diferencial_presion_separador ,
            "temperatura_ambiente"=>$request->temperatura_ambiente,
            "kitvalvulas_cambio"=>$request->kitvalvulas_cambio,
            "kitvalvulas_amision"=>$request->kitvalvulas_amision,
            "kitvalvulas_termostatica"=>$request->kitvalvulas_termostatica,
            "kitvalvulas_minimapresion"=>$request->kitvalvulas_minimapresion,
            "kitvalvulas_check"=>$request->kitvalvulas_check,
            "kitvalvulas_paradaaceite"=>$request->kitvalvulas_paradaaceite,
            "kitvalvulas_lineabarrido"=>$request->kitvalvulas_lineabarrido,
            "kitvalvulas_trampagua"=>$request->kitvalvulas_trampagua,
            "kitvalvulas_solenoide"=>$request->kitvalvulas_solenoide,
            "kitvalvulas_ventilacion"=>$request->kitvalvulas_ventilacion,
            "kitvalvulas_tresvias"=>$request->kitvalvulas_tresvias,
            "kitvalvulas_regulacion_termostatica"=>$request->kitvalvulas_regulacion_termostatica,
            "kitvalvulas_purgador_auto_ewd"=>$request->kitvalvulas_purgador_auto_ewd,
            "kitfiltroslinea_cambio"=>$request->kitfiltroslinea_cambio,
            "kitfiltroslinea_dd"=>$request->kitfiltroslinea_dd,
            "kitfiltroslinea_qd"=>$request->kitfiltroslinea_qd,
            "kitfiltroslinea_ddp"=>$request->kitfiltroslinea_ddp,
            "kitfiltroslinea_pd"=>$request->kitfiltroslinea_pd,
            "kitfiltroslinea_qdt"=>$request->kitfiltroslinea_qdt,
            "kitfiltroslinea_udplus"=>$request->kitfiltroslinea_udplus,
            "kitfiltroslinea_pdp"=>$request->kitfiltroslinea_pdp,
            "medicion_ventilador_01_l1"=>$request->medicion_ventilador_01_l1,
            "medicion_ventilador_01_l2"=>$request->medicion_ventilador_01_l2,
            "medicion_ventilador_01_l3"=>$request->medicion_ventilador_01_l3,
            "medicion_ventilador_02_l1"=>$request->medicion_ventilador_02_l1,
            "medicion_ventilador_02_l2"=>$request->medicion_ventilador_02_l2,
            "medicion_ventilador_02_l3"=>$request->medicion_ventilador_02_l3,
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/actualizar-reporte-paso3',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function guardarSaliRegresarReportePaso5(Request $request){
        $param = array(
            "reporte_numero"=>$request->reporte_numero,
            "descripcion_del_trabajo"=>$request->descripcion_del_trabajo,
            "recomendaciones"=>$request->recomendaciones,
            "observaciones_internas"=>$request->observaciones_internas,
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/guardar-fotos-finales-paso5',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController,
                "datos"=>[
                    "descripcion_del_trabajo"=>nl2br($request->descripcion_del_trabajo),
                    "recomendaciones"=>nl2br($request->recomendaciones),
                    "observaciones_internas"=>nl2br($request->observaciones_internas)
                ]
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function registroInicial(Request $request){
        $rules1=[];
        if ($request->id_obl!="0"){
            $rules1=[
                //'id_tecnico_02' =>  ['required'],
            ];
        }
        $rules2=[
           /*'reporte_orden_trabajo' =>  ['required'],
            'empresa_nombre' =>  ['required'],
            'ruc' =>  ['required'],
            'empresa_direccion' =>  ['required'],
            'id_tecnico_01' =>  ['required'],
            'tipo_servicio_desc' =>  ['required'],
            'reporte_fecha_servicio' =>  ['required']*/
        ];
        $rules3=[];
        $rules4=[];
        $vsd_00_20rpm = 0;
        $vsd_20_40rpm = 0;
        $vsd_40_60rpm = 0;
        $vsd_60_80rpm = 0;
        $vsd_80_100rpm = 0;
        $rules = array_merge($rules1,$rules2, $rules3, $rules4);  
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
        //$reporte_fecha_servicio = explode("-", $request->reporte_fecha_servicio);// 2004-05-30 // PARA SQL DE MI LOCAL
        //$reporte_fecha_servicio = $reporte_fecha_servicio[0].'-'.$reporte_fecha_servicio[2].'-'.$reporte_fecha_servicio[1];// 2004-30-05 PARA SQL DE MI LOCAL
        //$reporte_fecha_servicio = $request->reporte_fecha_servicio;// 2004-05-30 // PARA SQL DE PRODUCCION
        $reporte_fecha_servicio = $request->reporte_fecha_servicio;// 2004-05-30 // PARA SQL DE PRODUCCION
        $param = array(
            "reporte_fecha_servicio"=>$reporte_fecha_servicio,
            "reporte_orden_trabajo"=>$request->reporte_orden_trabajo,
            "nombre_tecnico_responsable_01"=>$request->nombre_tecnico_responsable_01,
            "id_tecnico_01"=>$request->id_tecnico_01,
            "nombre_tecnico_responsable_02"=>$request->nombre_tecnico_responsable_02,
            "id_tecnico_02"=>$request->id_tecnico_02,
            "empresa_nombre"=>$request->empresa_nombre,
            "ruc"=>$request->ruc,
            "empresa_direccion"=>$request->empresa_direccion,
            "alquilado"=>'',
            "alquilado_a_empresa_nombre"=>'',
            "alquilado_a_empresa_ruc"=>'',
            "equipo_id"=>$request->equipo_id,
            "equipo_marca"=>$request->equipo_marca,
            "equipo_referencia"=>$request->equipo_referencia,
            "equipo_modelo"=>$request->equipo_modelo,
            "equipo_nro_serie"=>$request->equipo_nro_serie,
            "equipo_modulo_tipo"=>$request->equipo_modulo_tipo,
            "equipo_presion"=>$request->equipo_presion,
            "equipo_caudal"=>$request->equipo_caudal,
            "equipo_rpm"=>$request->equipo_rpm,
            "equipo_horometro"=>$request->equipo_horometro,
            "tipo_servicio_desc"=>$request->tipo_servicio_desc,
            "tipo_servicio_arranque_inicial"=>$request->tipo_servicio_arranque_inicial,
            "tipo_servicio_mantenimiento"=>$request->tipo_servicio_mantenimiento,
            "tipo_servicio_evaluacion"=>$request->tipo_servicio_evaluacion,
            "tipo_servicio_reparacion"=>$request->tipo_servicio_reparacion,
            "tipo_servicio_asesoria"=>$request->tipo_servicio_asesoria,
            "tipo_servicio_overhaul"=>$request->tipo_servicio_overhaul,
            "tipo_servicio_alquiler"=>$request->tipo_servicio_alquiler,
            "secador_modelo"=>$request->secador_modelo,
            "secador_nro_serie"=>$request->secador_nro_serie,
            "secador_punto_rocio"=>$request->secador_punto_rocio,
            "secador_voltaje_amp"=>$request->secador_voltaje_amp,
            "secador_proteccion"=>$request->secador_proteccion,
            "secador_limpieza"=>$request->secador_limpieza,
            "secador_tipo_refrigeracion"=>$request->secador_tipo_refrigeracion,
            "secador_nota"=>$request->secador_nota,
            "vsd_00_20rpm"=>$vsd_00_20rpm,
            "vsd_20_40rpm"=>$vsd_20_40rpm,
            "vsd_40_60rpm"=>$vsd_40_60rpm,
            "vsd_60_80rpm"=>$vsd_60_80rpm,
            "vsd_80_100rpm"=>$vsd_80_100rpm,
            "programacionid"=>$request->programacionid,
            "vsd_medida_rpm"=>$request->vsd_medida_rpm,
            "imagesDatos"=>$request->imagesDatos,
            "tipo_servicio_cotizacion"=>$request->tipo_servicio_cotizacion,
            "local_nombre"=>$request->local_nombre,
            "proximo_servicio"=>$request->proximo_servicio,
            "secador_amperaje"=>$request->secador_amperaje
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/registro',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }

    public function updateReporteArchivo(Request $request){
        $param = array (
            "programacionid"=>$request->programacionid
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/update-reporte-archivo',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function reenviarMailPdf(Request $request){
        $param = array (
            "reporte_numero"=>$request->reporte_numero
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/reenviar-mail-pdf',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "type"=>'full',
                "icon"=>'error',
                "status"=>false, 
                "data"=>$FunctionController,
                "message"=>"Lo sentimos, el servicio no responde"
            ], Response::HTTP_RESERVED);
        }
    }
    public function getGuiaDetalleByOt(Request $request){
        $param = array (
            "orden_trabajo"=>$request->orden_trabajo//11912
        );
        $FunctionController =FunctionController::ApiRest('/api/reporte/get-guia-detalle-by-ot',$param ,'POST');
        if ($FunctionController){
            $arrayData =array();
            foreach ($FunctionController["data"] as $val){
                $arrayData[] =array(
                    "NUMGUIA"=>$val["NUMGUIA"],
                    "SERIEGUIACAB"=>$val["SERIEGUIACAB"],
                    "DOC_REF_COTIZACION"=>$val["DOC_REF_COTIZACION"],
                    "DOC_REF_OT"=>$val["DOC_REF_OT"],
                    "NUMGUIA_SERIEGUIACAB"=>$val["NUMGUIA"].'_'.$val["SERIEGUIACAB"],
                );
            }
            $arrayDataUnique = array_unique($arrayData, SORT_REGULAR);
            $arraUnique1 ='';
            $counter=0;
            foreach ($arrayDataUnique as $val1) {
                $counter++;
                $data_href ='kt_customer_view_payment_method_'.$counter;
                $arraUnique =array();
                //$arraUnique1.=$val1["NUMGUIA_SERIEGUIACAB"].'<br>';
                $arraUnique1.='<div class="py-0" data-kt-customer-payment-method="row">
                                <div class="py-3 d-flex flex-stack flex-wrap">
                                    <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#'. $data_href.'" role="button" aria-expanded="false" aria-controls="'. $data_href.'">
                                        <div class="me-3 rotate-90">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="me-3">
                                            <div class="d-flex align-items-center"> 
                                                <div class="text-gray-800 fw-bolder fs-4">GR- '.$val1["SERIEGUIACAB"].' - '.$val1["NUMGUIA"].' </div>
                                            </div>
                                            <div class="text-muted fs-4">'.$val1["DOC_REF_COTIZACION"].'</div> 
                                        </div>
                                    </div>
                                    <div class="d-flex my-3 ms-9">
                                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="tooltip" title="Activar" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <div class="form-check form-check-custom  fw-bold ">
                                                <input class="form-check-input chk_guia_remision" data-ot="'.$val1["DOC_REF_OT"].'" data-numguia="'.$val1["NUMGUIA"].'" data-numserie="'.$val1["SERIEGUIACAB"].'" type="checkbox" id="" name=""/>
                                                <label class="form-check-label d-flex align-items-center fs-5 fw-bold" for="">
                                                </label>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div id="'. $data_href.'" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                    <div class="d-flex flex-wrap py-5">
                                        <div class="table-responsive">
                                            <table id="table_producto" class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                                <thead class="">
                                                    <tr class="fw-bolder text-muted">
                                                        <th class="min-w- p-3 text-dark">ITEM </th>
                                                        <th class="min-w- p-3 text-dark">CANT</th>
                                                        <th class="min-w- p-3 text-dark">° DE PARTE</th>
                                                        <th class="min-w- p-3 text-dark">DESCRIPCIÓN</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-6 fw-bold text-gray-600 fs-4">
                                                ';
                foreach ($FunctionController["data"] as $val2){
                    $NUMGUIA_SERIEGUIACAB =$val2["NUMGUIA"].'_'.$val2["SERIEGUIACAB"];
                    if ($val1["NUMGUIA_SERIEGUIACAB"] === $NUMGUIA_SERIEGUIACAB) {
                        $arraUnique1.='<tr>
                            <td class="p-3" >'.$val2["ITEM"].'</td>
                            <td class="p-3">'.$val2["CANTIDAD"].'</td>
                            <td class="p-3">'.$val2["NUM_PARTE"].'</td>
                            <td class="p-3">'.$val2["DESCRIPCION"].'</td>
                        </tr>';
                        
                    }
                }
                $arraUnique1.='</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-dashed"></div>';
            }
            return response()->json([
                "icon"=>'succes',
                "status"=>true,
                "data"=>$arraUnique1,
                "data1"=>$FunctionController,
                "message"=>"Se listo correctamente"
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
    public function fileDownloads(Request $request){
        $param = array (
            
        );
        $FunctionController =FunctionController::ApiRest('/api/file-downloads/'.$request->filename,$param ,'GET');
        
    }
}
