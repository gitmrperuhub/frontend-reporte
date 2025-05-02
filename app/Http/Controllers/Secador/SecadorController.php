<?php

namespace App\Http\Controllers\Secador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\FunctionController;
use Illuminate\Support\Facades\Validator;
class SecadorController extends Controller
{
    public function registro(Request $request){
        $rules1=[];
        /*if ($request->secador_id_obl!="0"){
            $rules1=[
                'secador_id_tecnico_02' =>  ['required'],
            ];
        }
        $rules2=[
            'secador_reporte_orden_trabajo' =>  ['required'],
            'secador_empresa_nombre' =>  ['required'],
            'secador_ruc' =>  ['required'],
            'secador_empresa_direccion' =>  ['required'],
            'secador_id_tecnico_01' =>  ['required'],
            'secador_tipo_servicio_desc' =>  ['required'],
            'secador_reporte_fecha_servicio' =>  ['required']
        ];       
        $rules = array_merge($rules1,$rules2);  
        $validacion = Validator::make($request->all(),$rules);
        if ($validacion->fails()){
            return response()->json([
                "type"=>'empty',
                "icon"=>'error',
                "status"=>false,
                "data"=>$validacion->errors(),
                'message'=>'Verifique los datos ingresados y/o ingrese todo los datos por favor.'
            ], Response::HTTP_OK);
        }*/
        $secador_FechServicio = $request->secador_FechServicio;// 2004-05-30 // PARA SQL DE PRODUCCION
        $param = array(
            "secador_empresa_nombre"=>$request->secador_empresa_nombre,
            "secador_ruc"=>$request->secador_ruc,
            "secador_empresa_direccion"=>$request->secador_empresa_direccion,
            "secador_local_nombre"=>$request->secador_local_nombre,
            "secador_TipoServicio"=>$request->secador_TipoServicio,
            "secador_FechServicio"=> $secador_FechServicio,
            "secador_ProxServicio"=>$request->secador_ProxServicio,
            "secador_Equipo_Id"=>$request->secador_Equipo_Id,
            "secador_Equipo"=>$request->secador_Equipo,
            "secador_Modelo"=>$request->secador_Modelo,
            "secador_Serie"=>$request->secador_Serie,
            "secador_Tecnico1_Nombre"=>$request->secador_Tecnico1_Nombre,
            "secador_Tecnico1_DNI"=>$request->secador_Tecnico1_DNI,
            "secador_Tecnico2_Nombre"=>$request->secador_Tecnico2_Nombre,
            "secador_Tecnico2_DNI"=>$request->secador_Tecnico2_DNI,
            "secador_PresMax"=>$request->secador_PresMax,
            "secador_Placa"=>$request->secador_Placa,
            "secador_TipoControl"=>$request->secador_TipoControl,
            "secador_VoltControl"=>$request->secador_VoltControl,
            "secador_NumOT"=>$request->secador_NumOT,
            "secador_programacionid"=>$request->secador_programacionid,

        );
        $FunctionController =FunctionController::ApiRest('/api/secador/registro',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                'sss'=> $param ,
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
    public function actualizarReportePaso2(Request $request){
        $rules1=[];
        if ($request->secador_id_obl!="0"){
            $rules1=[
                'secador_Tecnico2_DNI' =>  ['required'],
            ];
        }
        $rules2=[            
            'secador_NumReporte' =>  ['required'],
            'secador_empresa_nombre' =>  ['required'],
            'secador_ruc' =>  ['required'],            
            'secador_FechServicio' =>  ['required'],
            //'secador_ProxServicio' =>  ['required'],
            'secador_Equipo_Id' =>  ['required'],
            'secador_Equipo' =>  ['required'],
            'secador_Modelo' =>  ['required'],
            'secador_Serie' =>  ['required'],
            'secador_Hora_Inicio' =>  ['required'],
            'secador_Hora_Fin' =>  ['required'],
            'secador_Horometro' =>  ['required', "numeric"],
            'secador_TipoServicio' =>  ['required'],
            'secador_PresMax' =>  ['required'],
            'secador_Placa' =>  ['required'],
            'secador_TipoControl' =>  ['required'],
            'secador_VoltControl' =>  ['required'],
            'secador_equipo_referencia' =>  ['required'],
            'secador_cr_und_gas_refrigerante' =>  ['required'],
            'secador_cr_med_voltaje_fase1' =>  ['required'],
            'secador_cr_med_voltaje_fase2' =>  ['required'],
            'secador_cr_med_voltaje_fase3' =>  ['required'],
            'secador_cr_med_amperaje_arranque_l1' =>  ['required'],
            'secador_cr_med_amperaje_arranque_l2' =>  ['required'],
            'secador_cr_med_amperaje_arranque_l3' =>  ['required'],
            'secador_cr_med_amperaje_trabajo_l1' =>  ['required'],
            'secador_cr_med_amperaje_trabajo_l2' =>  ['required'],
            'secador_cr_med_amperaje_trabajo_l3' =>  ['required'],
            'secador_cr_med_pres_gasrefri_reposo' =>  ['required'],
            'secador_cr_med_pres_gasrefri_reposo_psialta' =>  ['required'],
            'secador_cr_med_pres_gasrefri_reposo_psibaja' =>  ['required'],
            'secador_cr_med_pres_gasrefri_trabajo' =>  ['required'],
            'secador_cr_med_pres_gasrefri_trabajo_psialta' =>  ['required'],
            'secador_cr_med_pres_gasrefri_trabajo_psibaja' =>  ['required'],
            'secador_cr_reg_pto_rocio_reposo' =>  ['required'],
            'secador_cr_reg_pto_rocio_operacion' =>  ['required'],
            'secador_desctrab' =>  ['required']
        ];        
        $rules = array_merge($rules1, $rules2); 
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
            "secador_NumReporte"=>$request->secador_NumReporte,
            "secador_FechServicio"=>$request->secador_FechServicio,
            "secador_ProxServicio"=>$request->secador_ProxServicio,
            "secador_Equipo_Id"=>$request->secador_Equipo_Id,
            "secador_Equipo"=>$request->secador_Equipo,
            "secador_Modelo"=>$request->secador_Modelo,
            "secador_Serie"=>$request->secador_Serie,
            "secador_Hora_Inicio"=>$request->secador_Hora_Inicio,
            "secador_Hora_Fin"=>$request->secador_Hora_Fin,
            "secador_Horometro"=>$request->secador_Horometro,
            "secador_Tecnico2_Nombre"=>$request->secador_Tecnico2_Nombre,
            "secador_Tecnico2_DNI"=>$request->secador_Tecnico2_DNI,
            "secador_TipoServicio"=>$request->secador_TipoServicio,
            "secador_PresMax"=>$request->secador_PresMax,
            "secador_Placa"=>$request->secador_Placa,
            "secador_TipoControl"=>$request->secador_TipoControl,
            "secador_VoltControl"=>$request->secador_VoltControl,
            "secador_equipo_referencia"=>$request->secador_equipo_referencia,
            "secador_mc_cheq_presion_succion_descarga"=>$request->secador_mc_cheq_presion_succion_descarga,
            "secador_mc_cheq_terminal_electrico"=>$request->secador_mc_cheq_terminal_electrico,
            "secador_mc_cheq_valvulas_servicio"=>$request->secador_mc_cheq_valvulas_servicio,
            "secador_mc_cheq_posibles_fugas_gas_refrig"=>$request->secador_mc_cheq_posibles_fugas_gas_refrig,
            "secador_mc_cheq_cojinetes_amort_perno_arand"=>$request->secador_mc_cheq_cojinetes_amort_perno_arand,
            "secador_uc_limpieza_serpentin_condensacion"=>$request->secador_uc_limpieza_serpentin_condensacion,
            "secador_uc_verif_motor_ventil_rodam_empel"=>$request->secador_uc_verif_motor_ventil_rodam_empel,
            "secador_uc_verif_control_presion_alta"=>$request->secador_uc_verif_control_presion_alta,
            "secador_uc_verif_control_presion_baja"=>$request->secador_uc_verif_control_presion_baja,
            "secador_ue_verif_aislamiento_termico"=>$request->secador_ue_verif_aislamiento_termico,
            "secador_ue_verif_ingreso_salida_aire"=>$request->secador_ue_verif_ingreso_salida_aire,
            "secador_ue_verif_limpieza_trampa"=>$request->secador_ue_verif_limpieza_trampa,
            "secador_gpm_limpieza_interior_exterior"=>$request->secador_gpm_limpieza_interior_exterior,
            "secador_gpm_limpieza_pintado"=>$request->secador_gpm_limpieza_pintado,
            "secador_cr_und_gas_refrigerante"=>$request->secador_cr_und_gas_refrigerante,
            "secador_cr_med_voltaje_fase1"=>$request->secador_cr_med_voltaje_fase1,
            "secador_cr_med_voltaje_fase2"=>$request->secador_cr_med_voltaje_fase2,
            "secador_cr_med_voltaje_fase3"=>$request->secador_cr_med_voltaje_fase3,
            "secador_cr_med_amperaje_arranque_l1"=>$request->secador_cr_med_amperaje_arranque_l1,
            "secador_cr_med_amperaje_arranque_l2"=>$request->secador_cr_med_amperaje_arranque_l2,
            "secador_cr_med_amperaje_arranque_l3"=>$request->secador_cr_med_amperaje_arranque_l3,
            "secador_cr_med_amperaje_trabajo_l1"=>$request->secador_cr_med_amperaje_trabajo_l1,
            "secador_cr_med_amperaje_trabajo_l2"=>$request->secador_cr_med_amperaje_trabajo_l2,
            "secador_cr_med_amperaje_trabajo_l3"=>$request->secador_cr_med_amperaje_trabajo_l3,
            "secador_cr_med_pres_gasrefri_reposo"=>$request->secador_cr_med_pres_gasrefri_reposo,
            "secador_cr_med_pres_gasrefri_reposo_psialta"=>$request->secador_cr_med_pres_gasrefri_reposo_psialta,
            "secador_cr_med_pres_gasrefri_reposo_psibaja"=>$request->secador_cr_med_pres_gasrefri_reposo_psibaja,
            "secador_cr_med_pres_gasrefri_trabajo"=>$request->secador_cr_med_pres_gasrefri_trabajo,
            "secador_cr_med_pres_gasrefri_trabajo_psialta"=>$request->secador_cr_med_pres_gasrefri_trabajo_psialta,
            "secador_cr_med_pres_gasrefri_trabajo_psibaja"=>$request->secador_cr_med_pres_gasrefri_trabajo_psibaja, 
            "secador_cr_reg_valvula_expansion"=>$request->secador_cr_reg_valvula_expansion, 
            "secador_cr_reg_pto_rocio_reposo"=>$request->secador_cr_reg_pto_rocio_reposo, 
            "secador_cr_reg_pto_rocio_operacion"=>$request->secador_cr_reg_pto_rocio_operacion, 
            "secador_vtee_contactor_termag"=>$request->secador_vtee_contactor_termag, 
            "secador_vtee_pulsador_arran_parada"=>$request->secador_vtee_pulsador_arran_parada, 
            "secador_vtee_luz_piloto"=>$request->secador_vtee_luz_piloto, 
            "secador_vtee_rele_protector_sobrecarga"=>$request->secador_vtee_rele_protector_sobrecarga, 
            "secador_vtee_control_temperatura"=>$request->secador_vtee_control_temperatura, 
            "secador_vtee_otros"=>$request->secador_vtee_otros,
            "secador_desctrab"=>$request->secador_desctrab,
            "secador_observac"=>$request->secador_observac,
            "secador_observaciones_internas"=>$request->secador_observaciones_internas,
            "secador_tipo_servicio_cotizacion"=>$request->secador_tipo_servicio_cotizacion
        );
        $FunctionController =FunctionController::ApiRest('/api/secador/actualizar-reporte-paso2',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController,
                "datos"=>[
                    "secador_desctrab"=>nl2br($request->secador_desctrab),
                    "secador_observac"=>nl2br($request->secador_observac),
                    "secador_observaciones_internas"=>nl2br($request->secador_observaciones_internas)
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
        
        $param = array(
            "secador_NumReporte"=>$request->secador_NumReporte,
            "secador_FechServicio"=>$request->secador_FechServicio,
            "secador_ProxServicio"=>$request->secador_ProxServicio,
            "secador_Equipo_Id"=>$request->secador_Equipo_Id,
            "secador_Equipo"=>$request->secador_Equipo,
            "secador_Modelo"=>$request->secador_Modelo,
            "secador_Serie"=>$request->secador_Serie,
            "secador_Hora_Inicio"=>$request->secador_Hora_Inicio,
            "secador_Hora_Fin"=>$request->secador_Hora_Fin,
            "secador_Horometro"=>$request->secador_Horometro,
            "secador_Tecnico2_Nombre"=>$request->secador_Tecnico2_Nombre,
            "secador_Tecnico2_DNI"=>$request->secador_Tecnico2_DNI,
            "secador_TipoServicio"=>$request->secador_TipoServicio,
            "secador_PresMax"=>$request->secador_PresMax,
            "secador_Placa"=>$request->secador_Placa,
            "secador_TipoControl"=>$request->secador_TipoControl,
            "secador_VoltControl"=>$request->secador_VoltControl,
            "secador_equipo_referencia"=>$request->secador_equipo_referencia,
            "secador_mc_cheq_presion_succion_descarga"=>$request->secador_mc_cheq_presion_succion_descarga,
            "secador_mc_cheq_terminal_electrico"=>$request->secador_mc_cheq_terminal_electrico,
            "secador_mc_cheq_valvulas_servicio"=>$request->secador_mc_cheq_valvulas_servicio,
            "secador_mc_cheq_posibles_fugas_gas_refrig"=>$request->secador_mc_cheq_posibles_fugas_gas_refrig,
            "secador_mc_cheq_cojinetes_amort_perno_arand"=>$request->secador_mc_cheq_cojinetes_amort_perno_arand,
            "secador_uc_limpieza_serpentin_condensacion"=>$request->secador_uc_limpieza_serpentin_condensacion,
            "secador_uc_verif_motor_ventil_rodam_empel"=>$request->secador_uc_verif_motor_ventil_rodam_empel,
            "secador_uc_verif_control_presion_alta"=>$request->secador_uc_verif_control_presion_alta,
            "secador_uc_verif_control_presion_baja"=>$request->secador_uc_verif_control_presion_baja,
            "secador_ue_verif_aislamiento_termico"=>$request->secador_ue_verif_aislamiento_termico,
            "secador_ue_verif_ingreso_salida_aire"=>$request->secador_ue_verif_ingreso_salida_aire,
            "secador_ue_verif_limpieza_trampa"=>$request->secador_ue_verif_limpieza_trampa,
            "secador_gpm_limpieza_interior_exterior"=>$request->secador_gpm_limpieza_interior_exterior,
            "secador_gpm_limpieza_pintado"=>$request->secador_gpm_limpieza_pintado,
            "secador_cr_und_gas_refrigerante"=>$request->secador_cr_und_gas_refrigerante,
            "secador_cr_med_voltaje_fase1"=>$request->secador_cr_med_voltaje_fase1,
            "secador_cr_med_voltaje_fase2"=>$request->secador_cr_med_voltaje_fase2,
            "secador_cr_med_voltaje_fase3"=>$request->secador_cr_med_voltaje_fase3,
            "secador_cr_med_amperaje_arranque_l1"=>$request->secador_cr_med_amperaje_arranque_l1,
            "secador_cr_med_amperaje_arranque_l2"=>$request->secador_cr_med_amperaje_arranque_l2,
            "secador_cr_med_amperaje_arranque_l3"=>$request->secador_cr_med_amperaje_arranque_l3,
            "secador_cr_med_amperaje_trabajo_l1"=>$request->secador_cr_med_amperaje_trabajo_l1,
            "secador_cr_med_amperaje_trabajo_l2"=>$request->secador_cr_med_amperaje_trabajo_l2,
            "secador_cr_med_amperaje_trabajo_l3"=>$request->secador_cr_med_amperaje_trabajo_l3,
            "secador_cr_med_pres_gasrefri_reposo"=>$request->secador_cr_med_pres_gasrefri_reposo,
            "secador_cr_med_pres_gasrefri_reposo_psialta"=>$request->secador_cr_med_pres_gasrefri_reposo_psialta,
            "secador_cr_med_pres_gasrefri_reposo_psibaja"=>$request->secador_cr_med_pres_gasrefri_reposo_psibaja,
            "secador_cr_med_pres_gasrefri_trabajo"=>$request->secador_cr_med_pres_gasrefri_trabajo,
            "secador_cr_med_pres_gasrefri_trabajo_psialta"=>$request->secador_cr_med_pres_gasrefri_trabajo_psialta,
            "secador_cr_med_pres_gasrefri_trabajo_psibaja"=>$request->secador_cr_med_pres_gasrefri_trabajo_psibaja, 
            "secador_cr_reg_valvula_expansion"=>$request->secador_cr_reg_valvula_expansion, 
            "secador_cr_reg_pto_rocio_reposo"=>$request->secador_cr_reg_pto_rocio_reposo, 
            "secador_cr_reg_pto_rocio_operacion"=>$request->secador_cr_reg_pto_rocio_operacion, 
            "secador_vtee_contactor_termag"=>$request->secador_vtee_contactor_termag, 
            "secador_vtee_pulsador_arran_parada"=>$request->secador_vtee_pulsador_arran_parada, 
            "secador_vtee_luz_piloto"=>$request->secador_vtee_luz_piloto, 
            "secador_vtee_rele_protector_sobrecarga"=>$request->secador_vtee_rele_protector_sobrecarga, 
            "secador_vtee_control_temperatura"=>$request->secador_vtee_control_temperatura, 
            "secador_vtee_otros"=>$request->secador_vtee_otros,
            "secador_desctrab"=>$request->secador_desctrab,
            "secador_observac"=>$request->secador_observac,
            "secador_observaciones_internas"=>$request->secador_observaciones_internas,
            "secador_tipo_servicio_cotizacion"=>$request->secador_tipo_servicio_cotizacion
        );
        $FunctionController =FunctionController::ApiRest('/api/secador/actualizar-reporte-paso2',$param ,'POST');
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

    public function actualizarFinalSecador(Request $request){
        $rules1=[            
            'secador_NumReporte' =>  ['required'],
            'secador_nombre_jefe_encargado' =>  ['required'],
            'secador_Equipo_Id' =>  ['required'],
            'secador_TipoServicio' =>  ['required'],
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
            "secador_NumReporte"=>$request->secador_NumReporte,
            "secador_nombre_jefe_encargado"=>$request->secador_nombre_jefe_encargado,
            "programacionid"=>$request->programacionid,
            "secador_NumOT"=>$request->secador_NumOT,
            "secador_firma"=>session()->get("Nombre"),
            "imagesFirma"=>$request->imagesFirma,
            "dataEmailContact"=>$request->dataEmailContact,
            "secador_firma_dni"=>session()->get("Codigo"),
            "secador_Equipo_Id"=>$request->secador_Equipo_Id,
            "secador_TipoServicio"=>$request->secador_TipoServicio,
            "arrayGuiaRem"=>$request->arrayGuiaRem,
        );
        $FunctionController =FunctionController::ApiRest('/api/secador/actualizar-final-secador',$param ,'POST');
        if ($FunctionController){
            return response()->json([
                "type"=>'full',
                "icon"=>'succes',
                "status"=>true,
                "data"=>$FunctionController,
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

    public function listarSecadorByNumero(Request $request){
    
        $param = array(
            "reporte_numero"=> $request->reporte_numero,
            "reporte_serie"=> $request->reporte_serie
        );
        $FunctionController =FunctionController::ApiRest('/api/secador/listar-secador-by-numero',$param ,'POST');
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
    public function reenviarMailPdf(Request $request){
        $param = array (
            "NumReporte"=>$request->NumReporte
        );
        $FunctionController =FunctionController::ApiRest('/api/secador/reenviar-mail-pdf',$param ,'POST');
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
}
