@extends('master.master')
@section('title', 'MR PERU - Historial de servicio')
@section('contentHeaderLeft')
    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Historial de servicio
        <span class="h-20px border-gray-300 border-start mx-4"></span>
    </h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="javascript:void()" class="text-muted text-hover-primary">Servicio</a>
        </li>
    </ul>
@endsection()
@section('contentHeaderRight')    
@endsection()
@section('contentModal')
<div class="modal fade" id="kt_modal_history"  tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h2>Detalle de Historial </h2>
                <button type="button"  class="btn btn-sm btn-icon btn-primary b-radius-50 cls_modal_close_history"  >
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 pt-15">
                <div class="row justify-content-md-center" id="spinner_reporte_list" >
                    <div class="col-12 fv-row ">
                        <span class="indicator-progress d-block text-center">
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </div>
                </div>
                <form class="form position-relative" novalidate="novalidate" id="kt_modal_reporte_list">
                    <div class="row g-9 mb-8">
                        <div class="col-md-12 col-sm-12 fv-row m-0">
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Datos de la empresa</div>
                            </div>
                            <div class="row">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Razón Social:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_empresa_nombre"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">RUC:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_ruc"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Dirección:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_empresa_direccion"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start d-none">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Teléfono:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_empresa_telefono"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Equipo</div>
                            </div>
                            <div class="row">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Compresor:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_marca">:</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Equipo modelo:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_modelo"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">N° Serie:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_nro_serie">.</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Tipo de Módulo :</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_modulo_tipo">.</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Máxima Presión (psi):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_presion"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Caudal (CFM):</div>
                                        </div>
                                        <div class="fv-row mx-5 ">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_caudal"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">RMP:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_rpm"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Horómetro:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_horometro"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Horas de Carga:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_horas_carga"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6 cls_secador"></div>
                            <div class="col-md-9 fv-row my-5 cls_secador">
                                <div class="fs-4 text-dark fw-bolder">Secador</div>
                            </div>
                            <div class="row cls_secador">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Modelo:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_modelo"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Nro. de Serie:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_nro_serie"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Pto. de rocío (°C):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_punto_rocio"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 "> Voltaje:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_voltaje_amp"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Amperaje:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_amperaje"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Protección:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_proteccion"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Limpieza:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_limpieza"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Tipo de refrig.:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_tipo_refrigeracion"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Nota:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_nota"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Mecánicos</div>
                            </div>
                            <div class="row">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-300px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Tipo de aceite usado:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_tipo_aceite_usado"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-300px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Aceite:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_aceite"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-300px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Estado del Separador:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_separador"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-300px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Estado de Fajas y Acoplamiento:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_fajas_acoplamiento"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-300px">
                                            <div class="fw-bold text-gray-600 fs-4 ">  Condiciones de Limpieza del Equipo:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_de_limpieza"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-300px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Filtro de Aceite:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_filtro_de_aceite"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-300px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Filtro de Aire:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_filtro_de_aire"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-300px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Limpieza química de los enfriadores:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 position-relative" id="id_resumen_limpieza_enfriadores">
                                                <!--div class="position-absolute w-100 h-100" ></div>
                                                <div class="form-check form-check-custom " id="id_chk_rle">
                                                    <input checked class="form-check-input me-3 " type="checkbox">
                                                </div-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-300px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Engrase del Motor:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_engrase_de_motor"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='separator separator-dashed my-5'></div>
                            <div class="form-check form-check-custom position-relative fw-bold mb-8">
                                <div class="position-absolute w-100 h-100" ></div>
                                <input class="form-check-input "  type="checkbox" id="id_resumen_kit_valvulas" />
                                <label class="form-check-label d-flex align-items-center fs-4 fw-bold" >
                                    <span >Kit de válvulas</span>
                                </label>
                            </div>
                            <div class="row g-9 mb-8 cls_kit_valvulas position-relative" style="display: none;" >
                                <div class="position-absolute w-100 h-100" ></div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_amision" />
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">Admisión</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_paradaaceite" />
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">Parada de Aceite</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_termostatica" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">Termostática</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_lineabarrido" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">Línea de Barrido</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_minimapresion" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">Mínima presión</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_trampagua" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">Trampa de agua</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_check" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">Check</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_solenoide" name=""/>
                                        <label class="form-check-label" for="id_kitvalvulas_solenoide">
                                            <div class="text-gray-600 fs-4">Solenoide</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_ventilacion" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">Ventilación</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_tresvias" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">3 Vías</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_regulacion_termostatica" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">Regulación termostática</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_valvulas" value=""  type="checkbox" id="id_resumen_kitvalvulas_purgador_auto_ewd" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">Purgador automático EWD</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="form-check form-check-custom position-relative fw-bold mb-8">
                                <div class="position-absolute w-100 h-100" ></div>
                                <input class="form-check-input "  type="checkbox" id="id_resumen_kit_filtro_linea" name=""/>
                                <label class="form-check-label d-flex align-items-center fs-4 fw-bold" >
                                    <span >Kit de filtros de Línea</span>
                                </label>
                            </div>
                            <div class="row g-9 mb-8 cls_kit_filtro_linea position-relative" style="display: none;">
                                <div class="position-absolute w-100 h-100" ></div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_filtro_linea" value=""  type="checkbox" id="id_resumen_kitfiltroslinea_dd" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">DD</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_filtro_linea" value=""  type="checkbox" id="id_resumen_kitfiltroslinea_pd" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">PD</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_filtro_linea" value=""  type="checkbox" id="id_resumen_kitfiltroslinea_pdp" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">PDP</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_filtro_linea" value=""  type="checkbox" id="id_resumen_kitfiltroslinea_qd" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">QD</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_filtro_linea" value=""  type="checkbox" id="id_resumen_kitfiltroslinea_qdt" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">QDT</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_filtro_linea" value=""  type="checkbox" id="id_resumen_kitfiltroslinea_ddp" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">DDP</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_resumen_kit_filtro_linea" value=""  type="checkbox" id="id_resumen_kitfiltroslinea_udplus" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4">UD+</div>
                                        </label>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Medición de Voltaje</div>
                            </div>
                            <div class="row my-5">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">UL1 - UL2 (Volts):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_voltaje_ul1l2">232</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">UL2 - UL3 (Volts):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_voltaje_ul2l3">23</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">UL1 - UL3 (Volts):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_voltaje_ul1l3">2</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Medición del Amperaje</div>
                            </div>
                            <div class="row ">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">L1 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_amperaje_l1">22</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">L2 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_amperaje_l2">2s3</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">L3 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_amperaje_l3">2</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Amperaje de Fase y Ventiladores</div>
                            </div>
                            <div class="row ">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">F1 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_amperaje_f1">232</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">F2 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_amperaje_f2">23</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">F3 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_amperaje_f3">2s</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Ventilador 1</div>
                            </div>
                            <div class="row ">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">L1 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_ventilador_01_l1"></div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">L2 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_ventilador_01_l2"></div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">L3 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_ventilador_01_l3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Ventilador 2</div>
                            </div>
                            <div class="row ">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">L1 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_ventilador_02_l1"></div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">L2 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_ventilador_02_l2"></div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">L3 (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_ventilador_02_l3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Termomagnético</div>
                            </div>
                            <div class="row ">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Termomagnético (Amps):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_thermomagnetico">232</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Línea a tierra (Volts):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_linea_a_tierra">23x</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Voltaje de control (Volts):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_voltaje_del_control"></div>
                                        </div>

                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Voltaje de módulo (Volts):</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_voltaje_del_modulo"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Motor Eléctrico I</div>
                            </div>
                            <div class="row ">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Marca:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_i_marca">232</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Vol:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_i_voltaje">23x</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Amp:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_i_amperaje">2s</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">FS:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_i_fs">2s</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">RPM:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_i_rpm">2s</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Motor Eléctrico II</div>
                            </div>
                            <div class="row ">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Marca:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_ii_marca">232</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Vol:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_ii_voltaje">23x</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Amp:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_ii_amperaje">2s</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">FS:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_ii_fs">2s</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">RPM:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_ii_rpm">2s</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Motor Eléctrico III</div>
                            </div>
                            <div class="row ">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Marca:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_iii_marca">232</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Vol:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_iii_voltaje">23x</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Amp:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_iii_amperaje">2s</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">FS:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_iii_fs">2s</div>
                                        </div>
                                        <div class="fv-row mx-5 w-150px">
                                            <div class="fw-bold text-gray-600 fs-4 ">RPM:</div>
                                        </div>
                                        <div class="fv-row  w-40px">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_iii_rpm">2s</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Vida de Servicios Programados</div>
                            </div>
                            <div class="row">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Vida de Aceite:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_vida_de_aceite"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Vida de fil. de aceite:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_vida_de_filtro_aceite"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Vida de fil. de aire:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_vida_de_filtro_aire"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Vida de separador:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_vida_de_separador"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Engrase de Motor</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_vida_de_engrase_motor"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Regulaciones Programadas</div>
                            </div>
                            <div class="row">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start" id="id_resumen_cab_regulaciones_presion_carga">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Presión de Carga (psi):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_presion_carga"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start" id="id_resumen_cab_regulaciones_de_descarga">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Presión de Descarga (psi):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_de_descarga"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Tiempo ү △:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_de_tiempo"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Nro. Arranques:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_nro_arranques"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Retardo de Carga (s):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_retardo_carga"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start" id="id_resumen_cab_regulaciones_pto_de_ajuste" >
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Punto de Ajuste VSD (Bar):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_pto_de_ajuste"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Temperaturas y Presiones</div>
                            </div>
                            <div class="row">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Temp. Elem. 1 (°C):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_elemento1"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Temp. Elem. 2 (°C):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_elemento2"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Temp. Aceite (°C):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_aceite"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Presión de Aceite (PSI):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_presion_de_aceite"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Presión Intermedia (PSI):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_presion_intermedia"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Temp. Ent, Elem. 2 (°C):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_ent_elemento2"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Temp. Sal. Aire (°C):</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_sal_aire"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="row">
                                <div class="col-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Diferencial de presión del filtro de aire:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_diferencial_presion_aire"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Diferencial de presión del separador:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_diferencial_presion_separador"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Temperatura ambiente:</div>
                                        </div>
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_ambiente"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row mb-5" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Descripción de trabajo:</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_descripcion_del_trabajo"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row mb-5" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Recomendaciones:</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_recomendaciones"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row mb-5" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Observaciones internas:</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_observaciones_internas"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>

                            <div class="row g-9 mb-8" id="kt_list_firmas" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <p class="img-bg mb-5 bold fw-bolder text-gray-800 fs-4">Confirmación del  </p>
                                    <img src="" alt="Cliente"  style="width: 100%;" >
                                    <p class="img-bg mb-5 bold fw-bolder text-gray-800 fs-4">Firmado por  </p>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="d-flex justify-content-center"> </div>
                            <div class="sele position-relative text-white p-3 mb-3" style="background: #f86c0a;" > 
                                <h1 class="fw-bold text-white m-0 fs-3 text-center "><p class="m-0 d-inline-block"> FOTOS INICIALES </p>  </h1>
                            </div>
                           
                            <div class="row g-9 mb-8" id="kt_list_inicial_img" >
                                
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="sele position-relative bg-primary text-white p-3 mb-3" style="background: #f86c0a;" > 
                                <h1 class="fw-bold text-white m-0 fs-3 text-center "><p class="m-0 d-inline-block"> FOTOS FINALES </p>  </h1>
                            </div>
                            <div class="row g-9 mb-8" id="kt_list_final_img" >
                                
                            </div>
                        </div>
                    </div>
                </form>
                <form class="form position-relative" novalidate="novalidate" id="kt_modal_secador_list">
                    <div class="row g-9 mb-8">
                        <div class="col-md-12 col-sm-12 fv-row m-0">
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Datos de la empresa</div>
                            </div>
                            <div class="row">
                                <div class="col-12 fv-row" >
                                    <table border="0" class="w-100">
                                        <tbody>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Razón Social:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_empresa_nombre">SODEXO SAC</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5">
                                                        <div class="fw-bold text-gray-600 fs-4 ">RUC:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_ruc">20549498985</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Dirección:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_empresa_direccion"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Equipo</div>
                            </div>
                            <div class="row">
                                <div class="col-12 fv-row" >
                                    <table border="0" class="w-100" >
                                        <tbody>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Secador Integrado:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_Equipo"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Equipo modelo:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_Modelo"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5">
                                                        <div class="fw-bold text-gray-600 fs-4 ">N° Serie:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_Serie"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Máxima Presión (psi):</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_PresMax"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Horómetro:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_horometro"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Placa:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_Placa"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Tipo de control:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_TipoControl"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Voltaje de control:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_VoltControl"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Motor Compresor:</span>
                            </label>
                            <div class="row g-9 mb-8 position-relative "  >
                                <div class="position-absolute w-100 h-100" ></div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_mc_cheq_presion_succion_descarga" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">checkeo de presiones de succion y descarga</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_mc_cheq_terminal_electrico" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">checkeo de terminales electrico</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_mc_cheq_valvulas_servicio" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">Verficación de válvulas de servicio</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_mc_cheq_posibles_fugas_gas_refrig" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">checkeo de posibles fugas de gas refrigerante</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_mc_cheq_cojinetes_amort_perno_arand" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">Chequeo cojinetes de amortiguación</div>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Unidad de Condensación:</span>
                            </label>
                            <div class="row g-9 mb-8 position-relative"  >
                                <div class="position-absolute w-100 h-100" ></div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_uc_limpieza_serpentin_condensacion" name=""/>
                                        <label class="form-check-label" >
                                            <div class="text-gray-600 fs-4 text-capitalize">limpieza deserpentin de condensacion</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_uc_verif_motor_ventil_rodam_empel" name=""/>
                                        <label class="form-check-label" >
                                            <div class="text-gray-600 fs-4 text-capitalize">verificacion del motor ventilador, rodamiento y empelentes</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="text-gray-600 fs-4">verificacion de control de presión:</span>
                                    </label>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-2">
                                            <div class="form-check form-check-custom">
                                                <input class="form-check-input me-3" type="checkbox" value="1" id="id_resumen_secador_uc_verif_control_presion_alta" name="">
                                                <label class="form-check-label" >
                                                    <div class="text-gray-600 fs-4">Alta</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="fv-row mx-2 w-150px">
                                            <div class="form-check form-check-custom ">
                                                <input class="form-check-input me-3 " type="checkbox" value="1" id="id_resumen_secador_uc_verif_control_presion_baja" name="">
                                                <label class="form-check-label" >
                                                    <div class="text-gray-600 fs-4">Baja</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Unidad de evaporación (Intercambiar de calor):</span>
                            </label>
                            <div class="row g-9 mb-8 position-relative"  >
                                <div class="position-absolute w-100 h-100" ></div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_ue_verif_aislamiento_termico" name=""/>
                                        <label class="form-check-label" >
                                            <div class="text-gray-600 fs-4 text-capitalize">verificacion de aislamiento termico</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_ue_verif_ingreso_salida_aire" name=""/>
                                        <label class="form-check-label" >
                                            <div class="text-gray-600 fs-4 text-capitalize">verificacion del ingreso y salida del aire comprimido</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_ue_verif_limpieza_trampa" name=""/>
                                        <label class="form-check-label">
                                            <div class="text-gray-600 fs-4 text-capitalize">verificacion y limpieza de la trampa de drenaje de consesado</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Gabinete y partes metálicas:</span>
                            </label>
                            <div class="row g-9 mb-8 position-relative "  >
                                <div class="position-absolute w-100 h-100" ></div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_gpm_limpieza_interior_exterior" name=""/>
                                        <label class="form-check-label" >
                                            <div class="text-gray-600 fs-4 text-capitalize">limpiexa interior y exteriormente</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_gpm_limpieza_pintado" name=""/>
                                        <label class="form-check-label" >
                                            <div class="text-gray-600 fs-4 text-capitalize">lijado, pintado aquellas partes que presentan signos de corrosion</div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span>CIRCUITO DE REFRIGERACION:</span>
                            </label>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Medición de Voltaje:</div>
                            </div>
                            <div class="row g-9 mb-8 ">
                                <div class="col-12 fv-row" >
                                    <table border="0" class="w-100" >
                                        <tbody>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Unidad cargada con gas Refrig.:</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_cr_und_gas_refrigerante_tipo"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" class="w-100" >
                                        <tbody>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Fase 1 (Volt.):</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_voltaje_fase1">SFG</div>
                                                </td>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Fase 2 (Volt.):</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_voltaje_fase2">SFDSF</div>
                                                </td>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Fase 3 (Volt.):</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_voltaje_fase3">SFS</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Medición de Amperaje de Arranque:</div>
                            </div>
                            <div class="row g-9 mb-8 ">
                                <div class="col-12 fv-row" >
                                    <table border="0" class="w-100" >
                                        <tbody>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">L1 (Amps):</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_amperaje_arranque_l1">SFG</div>
                                                </td>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">L2 (Amps):</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_amperaje_arranque_l2">SFG</div>
                                                </td>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">L2 (Amps):</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_amperaje_arranque_l3">SFG</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Medición de Amperaje de Trabajo:</div>
                            </div>
                            <div class="row g-9 mb-8 ">
                                <div class="col-12 fv-row" >
                                    <table border="0" class="w-100" >
                                        <tbody>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">L1 (Amps):</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_amperaje_trabajo_l1">SFG</div>
                                                </td>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">L2 (Amps):</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_amperaje_trabajo_l2">SFG</div>
                                                </td>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">L2 (Amps):</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_amperaje_trabajo_l3">SFG</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Medición de presiones de gas Refrig.:</div>
                            </div>
                            <div class="row g-9 mb-8 ">
                                <div class="col-12 fv-row" >
                                    <table border="0" class="w-100" >
                                        <tbody>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Reposo:</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_pres_gasrefri_reposo">SFG</div>
                                                </td>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">PSI Alta:</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_pres_gasrefri_reposo_psialta">SFG</div>
                                                </td>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">PSI Baja:</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_pres_gasrefri_reposo_psibaja">SFG</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Medición de presiones de gas Refrig.:</div>
                            </div>
                            <div class="row g-9 mb-8 ">
                                <div class="col-12 fv-row" >
                                    <table border="0" class="w-100" >
                                        <tbody>
                                            <tr>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Trabajo:</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_pres_gasrefri_trabajo">SFG</div>
                                                </td>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">PSI Alta:</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_pres_gasrefri_trabajo_psialta">SFG</div>
                                                </td>
                                                <td class="w-200px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">PSI Baja:</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_med_pres_gasrefri_trabajo_psibaja">SFG</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="col-md-9 fv-row my-5">
                                <div class="fs-4 text-dark fw-bolder">Regulación de punto de rocio:</div>
                            </div>
                            <div class="row g-9 mb-8 position-relative ">
                                <div class="position-absolute w-100 h-100" ></div>
                                <div class="col-12  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_cr_reg_valvula_expansion" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">Relgulación de la válvula de expansión Termostática </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 fv-row" >
                                    <table border="0" class="w-100" >
                                        <tbody>
                                            <tr>
                                                <td class="w-100px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Reposo:</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_reg_pto_rocio_reposo">SFG</div>
                                                </td>
                                                <td class="w-100px" >
                                                    <div class="fv-row mx-5 ">
                                                        <div class="fw-bold text-gray-600 fs-4 ">Operación:</div>
                                                    </div>
                                                </td>
                                                <td class="w-100px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_cr_reg_pto_rocio_operacion">SFG</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Verficación de tablero eléctrico del equipo:</span>
                            </label>
                        
                            <div class="row g-9 mb-8 position-relative"  >
                                <div class="position-absolute w-100 h-100" ></div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_vtee_contactor_termag" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">Contactor termomagnético</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_vtee_pulsador_arran_parada" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">Pulsador de arranque y parada</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_vtee_luz_piloto" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">Luz Piloto</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_vtee_rele_protector_sobrecarga" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">Rele protector de sobrecarga</div>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_vtee_control_temperatura" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">Control de Temperatura</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="id_resumen_secador_vtee_otros" name=""/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600 fs-4 text-capitalize">Otros</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="separator separator-dashed my-6"></div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Descripción de trabajo:</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-5 mt-5">
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_desctrab"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Recomendaciones:</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start  mb-5 mt-5">
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_observac"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-5 w-200px">
                                            <div class="fw-bold text-gray-600 fs-4 ">Observaciones internas:</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start  mb-5 mt-5">
                                        <div class="fv-row mx-5">
                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_observaciones_internas"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-6"></div>

                            <div class="row g-9 mb-8" id="kt_secador_list_firmas" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <p class="img-bg mb-5 bold fw-bolder text-gray-800 fs-4">Confirmación del  </p>
                                    <img src="" alt="Cliente"  style="width: 100%;" >
                                    <p class="img-bg mb-5 bold fw-bolder text-gray-800 fs-4">Firmado por  </p>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="d-flex justify-content-center"> </div>
                            <div class="sele position-relative text-white p-3 mb-3" style="background: #f86c0a;" > 
                                <h1 class="fw-bold text-white m-0 fs-3 text-center "><p class="m-0 d-inline-block"> FOTOS INICIALES </p>  </h1>
                            </div>
                           
                            <div class="row g-9 mb-8" id="kt_secador_list_inicial_img" >
                                
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="sele position-relative bg-primary text-white p-3 mb-3" style="background: #f86c0a;" > 
                                <h1 class="fw-bold text-white m-0 fs-3 text-center "><p class="m-0 d-inline-block"> FOTOS FINALES </p>  </h1>
                            </div>
                            <div class="row g-9 mb-8" id="kt_secador_list_final_img" >
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="kt_modal_see_images"  tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered mw-600px">
        <div class="modal-content rounded">
            <div class="modal-body scroll-y position-relative p-0">
                <button type="button" id="btn_close_see_images" class="btn btn-sm btn-icon btn-primary b-radius-50 position-absolute" style="top: 15px;right: 15px;" >
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </button>
                <img id="kt_show_images" class="w-100" src="" alt="user">
            </div>
        </div>
    </div>
</div>
@push('styles')
<style>
    .spiner-top-center{
        top: 53%;
        right: 17%;
    }
</style>
@endpush

@endsection()
@section('content')
    <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">
            
        </div>
    </div>

    <div class="card mb-5 mb-xl-8 py-8">
        <div class="card-body py-3" >
            <div class="row g-9" >
                <div class="col-md-3 col-sm-4 fv-row position-relative" >
                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                        <span class="required">Cliente</span>
                    </label>
                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="false" id="id_cliente" name="id_cliente" data-kt-select2="true" data-placeholder="Seleccione cliente"  data-allow-clear="false">
                        <option value="0">Seleccione cliente</option>
                    </select>
                    <span class="spinner-border spinner-border-sm align-middle ms-2 position-absolute spiner-top-center" id="id_spinner_cliente" style="display: none;"></span></span>
                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                </div>
                <div class="col-md-3 col-sm-4 fv-row position-relative" >
                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                        <span class="required">Local</span> 
                    </label>
                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="false" id="id_cliente_local" name="id_cliente_local" data-kt-select2="true" data-placeholder="Seleccione local"  data-allow-clear="false">
                        <option value="0">Seleccione local</option>
                    </select>
                    <span class="spinner-border spinner-border-sm align-middle ms-2 position-absolute spiner-top-center" id="id_spinner_cliente_local" style="display: none;"></span></span>
                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                </div>
                <div class="col-md-3 col-sm-4 fv-row position-relative" >
                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                        <span class="required">Equipo</span> 
                    </label>
                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="false" id="id_equipo" name="id_equipo" data-kt-select2="true" data-placeholder="Seleccione equipo"  data-allow-clear="false">
                        <option value="0">Seleccione equipo</option>
                    </select>
                    <span class="spinner-border spinner-border-sm align-middle ms-2 position-absolute spiner-top-center" id="id_spinner_id_equipo" style="display: none;"></span></span>
                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                </div>
                <div class="col-md-3 col-sm-4 fv-row" >
                    <button type="button" class="btn btn- btn-dark mt-8" id="btn_searching" >
                        <span class="svg-icon svg-icon-3 ms-1 me-0 indicator-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <span class="indicator-label">Buscar</span>
                        <span class="indicator-progress">Espere por favor...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div> 
            </div>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table id="table_producto" class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                    <thead class="">
                        <tr class="fw-bolder text-muted">
                            <th class="">
                            </th>
                            <th class="min-w-120px text-dark">Nro.  Reporte </th>
                            <th class="min-w-120px text-dark">Nro. OT</th>
                            <th class="min-w-120px text-dark">Tipo</th>
                            <th class="min-w-150px text-dark">Fecha de servicio</th>
                            <th class="min-w-100px text-dark">Horómetros (horas)</th>
                            <th class="min-w-120px text-dark">Técnico</th>
                            <th class="text-dark">Opciones</th>
                            <th class="text-dark">Reenviar</th>
                            <th class="text-dark">descargar</th>
                        </tr>
                    </thead>
                    <tbody class="fw-6 fw-bold text-gray-600 fs-4">
                    </tbody>
                </table>
                <div id="pagination_link"></div>
            </div>
        </div>
    </div>
@endsection()
@push('script')
<script>
    $(document).ready(async function (){
        
        $('#kt_modal_history').modal({ backdrop: 'static', keyboard: false });
        //$("#kt_modal_history").modal("show");
        $("#fecha_venc_alerta, #fecha_venc").flatpickr({
            // enableTime: true,
            dateFormat: "Y-m-d",
            minDate: "today",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],         
                }, 
                months: {
                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                },
            },
        });
        $(document).on("click", "#btn_close_see_images", async function(event){
            $('#kt_modal_see_images').modal("hide");
        });
        $(document).on("click", ".ki_images_select .image-input .image-input-wrapper, .ki_images_final_select .image-input .image-input-wrapper", async function(event){
            $("#kt_modal_see_images").modal("show"); 
            var dataImage =$(this).data("image");
            $("#kt_show_images").attr("src", dataImage)
        });
        $(document).on("click", "#kt_btn_new_producto", function(){
            if (validateFormProducto("#kt_modal_create_producto_form")){
                return;
            }
            Swal.fire({
                buttonsStyling:!1,
                showDenyButton: true,
                //title: '¿Estas seguro que desea guardar el producto?',
                text: "¿Estas seguro que desea guardar el producto?",
                icon: 'question',
                confirmButtonText: 'Confirmar',
                denyButtonText: 'Cancelar',
                reverseButtons: true,
                customClass:{
                    confirmButton:"btn btn-dark-degradate border-radius-30",
                    denyButton:"btn btn-light-degradate border-radius-30",
                }
            }).then((function(result){
                if(!result.isDenied){

                }
            }));
            
        });
        $('select').select2({
            language: {
                noResults: function (params) {
                return "No se encontraron resultados";
                }
            }
        });
        $(document).on("click", ".cls_modal_close_history", function(){
            $("#kt_modal_history").modal("hide");
        });
        function loadTableProductos(ruc,local_codigo,equipo_id ) {
            //beforeSendBtnLoad("btn_searching");
            var json_data_venta = {
                "ruc": ruc,
                "local_codigo": local_codigo,
                "equipo_id": equipo_id,
                "_token": $("input[name='_token']").val(),
            }
            /*lista con datatables*/
            var table = $('#table_producto').DataTable({
                "destroy": true,
                //"responsive": true,
                "deferRender": true,
                "autoWidth": false,
                "dom": 'lfrtip',
                searching: false,
                ordering:  true,
                "bPaginate": true,
                "language": {
                    "url": "{{asset('assets/plugins/custom/datatables/es_es.json')}}"
                },
                "ajax": {
                    "url": APP_URL+"/reporte/listar-reporte-by-ruc-by-equipo",
                    "dataType": "json",
                    "data": json_data_venta,
                    "dataSrc": "data",
                    "type": "post",
                },
                "columns": [
                    {data: null},
                    {data: 'REPORTE_NUMERO'},
                    {data: 'REPORTE_ORDEN_TRABAJO'},
                    { data: 'TIPO_SERVICIO_DESC'},
                    { data: 'REPORTE_FECHA_SERVICIO'},
                    { data: 'EQUIPO_HOROMETRO'},
                    { data: 'NOMBRE_TECNICO_FIRMA'},
                    { data: 'html'},
                    { data: 'btnreenviar'},
                    { data: 'btndescargar'}
                ],
                "columnDefs": [{
                    "targets": 0,
                    "data": null,
                    "searchable": false,
                    "orderable": false,
                    "render": function (data, type, row, meta) {
                        $('.dataTables_filter input').removeClass('form-control-sm').addClass('form-control-lg');
                        return `<a>${data.IdCounter}</a>`; 
                    }
                }],
            }).on('order.dt search.dt', function () {
                KTMenu.createInstances();
            }).on('length.dt page.dt', function () {
                setInterval(function () {
                    KTMenu.createInstances();
                }, 500)
            }).draw();
        }
        
        //INICIO MR PERU
        async function listarCliente(){
            $("#id_spinner_cliente").show();
            $("#id_cliente").prop("disabled", true);
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            const response = await fetch(`${APP_URL}/cliente/listar-cliente-by-tecnico`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                const rest = await response.json();
                const status1 = rest.status;                
                if (status1){
                    $("#id_spinner_cliente").hide();
                    $("#id_cliente").prop("disabled", false);
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        const datos = rest.data.data;
                        const id_cliente =  $("#id_cliente")
                        $htmlSelect= ``;
                        $htmlSelect+= `<option value="0">Seleccione cliente</option>`;
                        var counterEmail = 0;
                        $.each( datos, function( key, value ) {
                            counterEmail++;
                            $htmlSelect+= `<option value="${value["RUC"]}">${value["Razon"]}</option>`;
                        });
                        id_cliente.html($htmlSelect);
                    }else{
                        Toast.fire({
                            icon: icon1,
                            title:message1
                        }); 
                    }
                }else{
                    Toast.fire({
                        icon: icon,
                        title:message
                    });
                }  
            }).catch((error) => {
                console.log(error)
            });
        }
        async function listarClienteLocales(ruc){
            $("#id_spinner_cliente_local").show();
            $("#id_cliente_local").prop("disabled", true);
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('ruc', ruc);
            const response = await fetch(`${APP_URL}/cliente/listar-cliente-locales-by-ruc`, {
                method: 'POST',
                body: data 
            }).then(async (response)=> {
                $("#id_spinner_cliente_local").hide();
                $("#id_cliente_local").prop("disabled", false);
                const rest = await response.json();
                const status1 = rest.status;                
                if (status1){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        const datos = rest.data.data;
                        const id_cliente_local =  $("#id_cliente_local")
                        $htmlSelect= ``;
                        $htmlSelect+= `<option value="0">Seleccione local</option>`;
                        //$("#spiner-lits-ot").hide();
                        var counterEmail = 0;
                        $.each( datos, function( key, value ) {
                            counterEmail++;
                            $htmlSelect+= `<option data-ruc="${value["RUC"]}" value="${value["LOCAL_CODIGO"]}">${value["LOCAL_NOMBRE"]}</option>`;
                        });
                        id_cliente_local.html($htmlSelect);
                    }else{
                        Toast.fire({
                            icon: icon1,
                            title:message1
                        }); 
                    }
                }else{
                    Toast.fire({
                        icon: icon,
                        title:message
                    });
                }  
            }).catch((error) => {
                console.log(error)
            });
        }
        async function listarEquipo(ruc, codigo_locales){
            $("#id_spinner_id_equipo").show();
            $("#id_equipo").prop("disabled", true);
            const id_equipo =  $("#id_equipo");
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('ruc', ruc);
            data.append('codigo_locales', codigo_locales);
            const response = await fetch(`${APP_URL}/equipo/listar-equipo-by-ruc-by-local`, {
                method: 'POST',
                body: data 
            }).then(async (response)=> {
                $("#id_spinner_id_equipo").hide();
                $("#id_equipo").prop("disabled", false);
                const rest = await response.json();
                const status1 = rest.status;                
                if (status1){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        const datos = rest.data.data;
                        $htmlSelect= ``;
                        $htmlSelect+= `<option value="0">Seleccione equipo</option>`;
                        //$("#spiner-lits-ot").hide();
                        var counterEmail = 0;
                        $.each( datos, function( key, value ) {
                            counterEmail++;
                            $htmlSelect+= `<option value="${value["Equipo_Id"]}">${value["Equipo"]} - ${value["Modelo"]} - ${value["Serie"]}</option>`;
                        });
                        id_equipo.html($htmlSelect);
                        
                    }else{
                        Toast.fire({
                            icon: icon1,
                            title:message1
                        }); 
                    }
                }else{
                    Toast.fire({
                        icon:"error",
                        title:message
                    });
                }                 
            }).catch((error) => {
                console.log(error)
            });
        }
        configFiltrosComboboxes();
        async function configFiltrosComboboxes(){
            const id_clienteCombo = $('#id_cliente');
            const id_cliente_localCombo = $('#id_cliente_local');
            const id_equipoCombo = $('#id_equipo');
            const clienteList = await listarCliente();
            id_clienteCombo.change(async (event, cliente_locales, equipo) => {
                id_cliente_localCombo.html('');
                id_equipoCombo.html('');
                const value = event.target.value;
                const clienteLocales = await listarClienteLocales(value);
                id_cliente_localCombo.val(cliente_locales);
                id_cliente_localCombo.trigger('change', equipo);
            });
            id_cliente_localCombo.change(async (event, equipo) => {
                id_equipoCombo.html('<option value="">Seleccione equipo</option>');
                const value = event.target.value;
                if (value){
                    const ruc = event.target.options[event.target.selectedIndex].getAttribute("data-ruc");
                    const equipos = await listarEquipo(ruc, value);
                    id_equipoCombo.val(equipo);
                }
            });
        }
        $(document).on("click", "#btn_searching", async function (){
            const ruc = $('#id_cliente').val()
            const id_cliente_local = $('#id_cliente_local').val();
            const id_equipo = $('#id_equipo').val();
            loadTableProductos(ruc, 0, id_equipo);
        })
       
        
        $(document).on("click", ".btn_ver_detalle_reporte", function(){
            const reporte_numero = $(this).data("reporte_numero");
            const reporte_serie = $(this).data("reporte_serie");
            const tipo_equipos = $(this).data("tipo_equipo");
            $("#kt_modal_history").modal("show");
            if (tipo_equipos==="C"){
                getReporteByNumero(reporte_numero,reporte_serie);
            }else{
                getSecadorByNumero(reporte_numero,reporte_serie);
            }
           
        });   
        async function getReporteByNumero(numero_reporte, reporte_serie){
            $("#spinner_reporte_list").show();  
            $("#kt_modal_reporte_list").hide(); 
            $("#kt_modal_secador_list").hide(); 
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('reporte_numero', numero_reporte);
            data.append('reporte_serie', reporte_serie);
            const response = await fetch(`${APP_URL}/reporte/listar-reporte-by-numero`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                $("#spinner_reporte_list").hide();  
                $("#kt_modal_reporte_list").show(); 
                const rest = await response.json();
                const status1 = rest.status;                
                if (status1){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        const datos = rest.data.data;
                        var htmlContenImg='';
                        var NOMBRE_JEFE_ENCARGADO='';
                        var NOMBRE_TECNICO_FIRMA='';
                        var PROGRAMACIONID='';
                        $.each( datos, function( key, value ){
                            $("#dni_teccnico").text(value["ID_TECNICO_02"]);
                            var REPORTE_SERIE = value["REPORTE_SERIE"];
                            NOMBRE_JEFE_ENCARGADO = value["NOMBRE_JEFE_ENCARGADO"];
                            NOMBRE_TECNICO_FIRMA = value["NOMBRE_TECNICO_FIRMA"];
                            PROGRAMACIONID = value["PROGRAMACIONID"];
                            TIPO_SERVICIO_DESC = value["TIPO_SERVICIO_DESC"];
                            ALQUILADO = value["ALQUILADO"];
                            ALQUILADO_A_EMPRESA_NOMBRE = value["ALQUILADO_A_EMPRESA_NOMBRE"];
                            ALQUILADO_A_EMPRESA_RUC = value["ALQUILADO_A_EMPRESA_RUC"];
                            ALQUILADO_A_EMPRESA_DIRECCION = value["ALQUILADO_A_EMPRESA_DIRECCION"];
                            $("#id_resumen_service_fecha").text(value["REPORTE_FECHA_SERVICIO"]);
                            $("#id_resumen_service_ot").text(value["REPORTE_ORDEN_TRABAJO"]);
                            $("#id_resumen_servicio_tenico2").text(value["ID_TECNICO_02"]).trigger('change.select2');
                            $("#id_resumen_empresa_nombre").text(ALQUILADO==0?value["EMPRESA_NOMBRE"]:ALQUILADO_A_EMPRESA_NOMBRE);
                            $("#id_resumen_ruc").text(ALQUILADO==0?value["RUC"]:ALQUILADO_A_EMPRESA_RUC);
                            $("#id_resumen_empresa_direccion").text(ALQUILADO==0?value["EMPRESA_DIRECCION"]:ALQUILADO_A_EMPRESA_DIRECCION);
                            $("#id_resumen_empresa_telefono").text(value["EMPRESA_TELEFONO"]);
                            $("#service_email_cliente").text(value["EMPRESA_EMAIL"]);
                            $("#service_equipo_id").text(value["EQUIPO_ID"]);
                            $("#id_resumen_equipo_marca").text(value["EQUIPO_MARCA"]);
                            $("#id_resumen_equipo_modelo").text(value["EQUIPO_MODELO"]);
                            $("#id_resumen_equipo_nro_serie").text(value["EQUIPO_NRO_SERIE"]);
                            $("#id_resumen_equipo_modulo_tipo").text(value["EQUIPO_MODULO_TIPO"]);
                            $("#id_resumen_equipo_presion").text(value["EQUIPO_PRESION"]);
                            $("#id_resumen_equipo_caudal").text(value["EQUIPO_CAUDAL"]);
                            $("#id_resumen_equipo_rpm").text(value["EQUIPO_RPM"]);
                            $("#id_resumen_equipo_horometro").text(value["EQUIPO_HOROMETRO"]);
                            $("#id_resumen_horas_carga").text(value["HORAS_CARGA"]);
                            $("#service_tipo_service").text(value["TIPO_SERVICIO_DESC"]);
                            $("#id_resumen_secador_modelo").text(value["SECADOR_MODELO"]);
                            $("#id_resumen_secador_nro_serie").text(value["SECADOR_NRO_SERIE"]);
                            $("#id_resumen_secador_punto_rocio").text(value["SECADOR_PUNTO_ROCIO"]);
                            $("#id_resumen_secador_voltaje_amp").text(value["SECADOR_VOLTAJE_AMP"]);
                            $("#id_resumen_secador_amperaje").text(value["SECADOR_AMPERAJE"]);
                            $("#id_resumen_secador_proteccion").text(value["SECADOR_PROTECCION"]);
                            $("#id_resumen_secador_limpieza").text(value["SECADOR_LIMPIEZA"]);
                            $("#id_resumen_secador_tipo_refrigeracion").text(value["SECADOR_TIPO_REFRIGERACION"]);
                            $("#id_resumen_secador_nota").text(value["SECADOR_NOTA"]);
                            $("#id_resumen_verificacion_tipo_aceite_usado").text(value["VERIFICACION_TIPO_ACEITE_USADO"]);
                            $("#id_resumen_verificacion_estado_aceite").text(value["VERIFICACION_ESTADO_ACEITE"]);
                            $("#id_resumen_verificacion_estado_separador").text(value["VERIFICACION_ESTADO_SEPARADOR"]);
                            $("#id_resumen_verificacion_estado_fajas_acoplamiento").text(value["VERIFICACION_ESTADO_FAJAS_ACOPLAMIENTO"]);
                            $("#id_resumen_verificacion_estado_de_limpieza").text(value["VERIFICACION_ESTADO_DE_LIMPIEZA"]);
                            $("#id_resumen_verificacion_estado_filtro_de_aceite").text(value["VERIFICACION_ESTADO_FILTRO_DE_ACEITE"]);
                            $("#id_resumen_verificacion_estado_filtro_de_aire").text(value["VERIFICACION_ESTADO_FILTRO_DE_AIRE"]);
                            $("#id_resumen_medicion_voltaje_ul1l2").text(value["MEDICION_VOLTAJE_UL1L2"]);
                            $("#id_resumen_medicion_voltaje_ul2l3").text(value["MEDICION_VOLTAJE_UL2L3"]);
                            $("#id_resumen_medicion_voltaje_ul1l3").text(value["MEDICION_VOLTAJE_UL1L3"]);
                            $("#id_resumen_medicion_amperaje_l1").text(value["MEDICION_AMPERAJE_L1"]);
                            $("#id_resumen_medicion_amperaje_l2").text(value["MEDICION_AMPERAJE_L2"]);
                            $("#id_resumen_medicion_amperaje_l3").text(value["MEDICION_AMPERAJE_L3"]);
                            $("#id_resumen_medicion_amperaje_f1").text(value["MEDICION_AMPERAJE_F1"]);
                            $("#id_resumen_medicion_amperaje_f2").text(value["MEDICION_AMPERAJE_F2"]);
                            $("#id_resumen_medicion_amperaje_f3").text(value["MEDICION_AMPERAJE_F3"]);
                            $("#id_resumen_medicion_ventilador_01_l1").text(value["MEDICION_VENTILADOR_01_L1"]);
                            $("#id_resumen_medicion_ventilador_01_l2").text(value["MEDICION_VENTILADOR_01_L2"]);
                            $("#id_resumen_medicion_ventilador_01_l3").text(value["MEDICION_VENTILADOR_01_L3"]);
                            $("#id_resumen_medicion_ventilador_02_l1").text(value["MEDICION_VENTILADOR_02_L1"]);
                            $("#id_resumen_medicion_ventilador_02_l2").text(value["MEDICION_VENTILADOR_02_L2"]);
                            $("#id_resumen_medicion_ventilador_02_l3").text(value["MEDICION_VENTILADOR_02_L3"]);
                            $("#id_resumen_thermomagnetico").text(value["THERMOMAGNETICO"]);
                            $("#id_resumen_linea_a_tierra").text(value["LINEA_A_TIERRA"]);
                            $("#id_resumen_voltaje_del_control").text(value["VOLTAJE_DE_CONTROL"]);
                            $("#id_resumen_voltaje_del_modulo").text(value["VOLTAJE_DEL_MODULO"]);
                            $("#id_resumen_motor_electrico_i_marca").text(value["MOTOR_ELECTRICO_I_MARCA"]);
                            $("#id_resumen_motor_electrico_i_voltaje").text(value["MOTOR_ELECTRICO_I_VOLTAJE"]);
                            $("#id_resumen_motor_electrico_i_amperaje").text(value["MOTOR_ELECTRICO_I_AMPERAJE"]);
                            $("#id_resumen_motor_electrico_i_fs").text(value["MOTOR_ELECTRICO_I_FS"]);
                            $("#id_resumen_motor_electrico_i_rpm").text(value["MOTOR_ELECTRICO_I_RPM"]);
                            $("#id_resumen_motor_electrico_ii_marca").text(value["MOTOR_ELECTRICO_II_MARCA"]);
                            $("#id_resumen_motor_electrico_ii_voltaje").text(value["MOTOR_ELECTRICO_II_VOLTAJE"]);
                            $("#id_resumen_motor_electrico_ii_amperaje").text(value["MOTOR_ELECTRICO_II_AMPERAJE"]);
                            $("#id_resumen_motor_electrico_ii_fs").text(value["MOTOR_ELECTRICO_II_FS"]);
                            $("#id_resumen_motor_electrico_ii_rpm").text(value["MOTOR_ELECTRICO_II_RPM"]);
                            $("#id_resumen_motor_electrico_iii_marca").text(value["MOTOR_ELECTRICO_III_MARCA"]);
                            $("#id_resumen_motor_electrico_iii_voltaje").text(value["MOTOR_ELECTRICO_III_VOLTAJE"]);
                            $("#id_resumen_motor_electrico_iii_amperaje").text(value["MOTOR_ELECTRICO_III_AMPERAJE"]);
                            $("#id_resumen_motor_electrico_iii_fs").text(value["MOTOR_ELECTRICO_III_FS"]);
                            $("#id_resumen_motor_electrico_iii_rpm").text(value["MOTOR_ELECTRICO_III_RPM"]);
                            $("#id_resumen_vida_de_aceite").text(value["VIDA_DE_ACEITE"]);
                            $("#id_resumen_vida_de_filtro_aceite").text(value["VIDA_DE_FILTRO_ACEITE"]);
                            $("#id_resumen_vida_de_filtro_aire").text(value["VIDA_DE_FILTRO_AIRE"]);
                            $("#id_resumen_vida_de_separador").text(value["VIDA_DE_SEPARADOR"]);
                            $("#id_resumen_vida_de_engrase_motor").text(value["VIDA_DE_ENGRASE_MOTOR"]);
                            $("#id_resumen_regulaciones_presion_carga").text(value["REGULACIONES_PRESION_CARGA"]);
                            $("#id_resumen_regulaciones_de_descarga").text(value["REGULACIONES_DE_DESCARGA"]);
                            $("#id_resumen_regulaciones_de_tiempo").text(value["REGULACIONES_DE_TIEMPO"]);
                            $("#id_resumen_regulaciones_nro_arranques").text(value["REGULACIONES_NRO_ARRANQUES"]);
                            $("#id_resumen_regulaciones_retardo_carga").text(value["REGULACIONES_RETARDO_CARGA"]);
                            $("#id_resumen_regulaciones_pto_de_ajuste").text(value["REGULACIONES_PTO_DE_AJUSTE"]);
                            $("#id_resumen_temperatura_elemento1").text(value["TEMPERATURA_ELEMENTO1"]);
                            $("#id_resumen_temperatura_elemento2").text(value["TEMPERATURA_ELEMENTO2"]);
                            $("#id_resumen_temperatura_aceite").text(value["TEMPERATURA_ACEITE"]);
                            $("#id_resumen_presion_de_aceite").text(value["PRESION_DE_ACEITE"]);
                            $("#id_resumen_presion_intermedia").text(value["PRESION_INTERMEDIA"]);
                            $("#id_resumen_temperatura_ent_elemento2").text(value["TEMPERATURA_ENT_ELEMENTO2"]);
                            $("#id_resumen_temperatura_sal_aire").text(value["TEMPERATURA_SAL_AIRE"]);
                            value["LIMPIEZA_ENFRIADORES"]==="X"?$("#id_resumen_limpieza_enfriadores").text('SE REALIZÓ'):$("#id_resumen_limpieza_enfriadores").text('')
                            $("#id_resumen_engrase_de_motor").text(value["ENGRASE_DE_MOTOR"]);
                            $("#id_resumen_diferencial_presion_aire").text(value["DIFERENCIAL_PRESION_AIRE"]);
                            $("#id_resumen_diferencial_presion_separador").text(value["DIFERENCIAL_PRESION_SEPARADOR"]);
                            $("#id_resumen_temperatura_ambiente").text(value["TEMPERATURA_AMBIENTE"]);
                            $("#id_resumen_descripcion_del_trabajo").html(value["DESCRIPCION_DEL_TRABAJO2"]);
                            $("#id_resumen_recomendaciones").html(value["RECOMENDACIONES2"]);
                            $("#id_resumen_observaciones_internas").html(value["OBSERVACIONES_INTERNAS2"]);
                            var VSD_MEDIDA_RPM = value["VSD_MEDIDA_RPM"];
                            if (VSD_MEDIDA_RPM==0){
                                $("#id_resumen_cab_regulaciones_presion_carga, #id_resumen_cab_regulaciones_de_descarga").show();
                                $("#id_resumen_cab_regulaciones_pto_de_ajuste").hide();
                                $("#id_resumen_cab_regulaciones_presion_carga, #id_resumen_cab_regulaciones_de_descarga").addClass("d-flex");
                                $("#id_resumen_cab_regulaciones_pto_de_ajuste").removeClass("d-flex");
                            }else{
                                $("#id_resumen_cab_regulaciones_presion_carga, #id_resumen_cab_regulaciones_de_descarga").hide();  
                                $("#id_resumen_cab_regulaciones_pto_de_ajuste").show();
                                $("#id_resumen_cab_regulaciones_presion_carga, #id_resumen_cab_regulaciones_de_descarga").removeClass("d-flex");
                                $("#id_resumen_cab_regulaciones_pto_de_ajuste").addClass('d-flex');
                            }

                            $(".cls_kit_valvulas").hide();
                            $(".cls_kit_filtro_linea").hide();
                            $("#id_resumen_kit_valvulas").prop("checked", false);  
                            $("#id_resumen_kit_filtro_linea").prop("checked", false);
                            if (value["KITVALVULAS_CAMBIO"]==="X"){
                                $(".cls_kit_valvulas").show(); 
                                $("#id_resumen_kit_valvulas").prop("checked", true);                        
                            }
                            if (value["KITFILTROSLINEA_CAMBIO"]==="X"){
                                $(".cls_kit_filtro_linea").show();
                                $("#id_resumen_kit_filtro_linea").prop("checked", true);
                            }

                            //$("#id_kit_valvulas").is(":checked")? $("#id_resumen_kit_valvulas").prop("checked", true): $("#id_resumen_kit_valvulas").prop("checked", false);
                            value["KITVALVULAS_AMISION"]==="X"? $("#id_resumen_kitvalvulas_amision").prop("checked", true): $("#id_resumen_kitvalvulas_amision").prop("checked", false);
                            value["KITVALVULAS_TERMOSTATICA"]==="X"? $("#id_resumen_kitvalvulas_termostatica").prop("checked", true): $("#id_resumen_kitvalvulas_termostatica").prop("checked", false);
                            value["KITVALVULAS_MINIMAPRESION"]==="X"? $("#id_resumen_kitvalvulas_minimapresion").prop("checked", true): $("#id_resumen_kitvalvulas_minimapresion").prop("checked", false);
                            value["KITVALVULAS_CHECK"]==="X"? $("#id_resumen_kitvalvulas_check").prop("checked", true): $("#id_resumen_kitvalvulas_check").prop("checked", false);
                            value["KITVALVULAS_PARADAACEITE"]==="X"? $("#id_resumen_kitvalvulas_paradaaceite").prop("checked", true): $("#id_resumen_kitvalvulas_paradaaceite").prop("checked", false);
                            value["KITVALVULAS_LINEABARRIDO"]==="X"? $("#id_resumen_kitvalvulas_lineabarrido").prop("checked", true): $("#id_resumen_kitvalvulas_lineabarrido").prop("checked", false);
                            value["KITVALVULAS_TRAMPAGUA"]==="X"? $("#id_resumen_kitvalvulas_trampagua").prop("checked", true): $("#id_resumen_kitvalvulas_trampagua").prop("checked", false);
                            value["KITVALVULAS_SOLENOIDE"]==="X"? $("#id_resumen_kitvalvulas_solenoide").prop("checked", true): $("#id_resumen_kitvalvulas_solenoide").prop("checked", false);  
                            value["KITVALVULAS_VENTILACION"]==="X"? $("#id_resumen_kitvalvulas_ventilacion").prop("checked", true): $("#id_resumen_kitvalvulas_ventilacion").prop("checked", false);  
                            value["KITVALVULAS_TRESVIAS"]==="X"? $("#id_resumen_kitvalvulas_tresvias").prop("checked", true): $("#id_resumen_kitvalvulas_tresvias").prop("checked", false);  
                            value["KITVALVULAS_REGULACION_TERMOSTATICA"]==="X"? $("#id_resumen_kitvalvulas_regulacion_termostatica").prop("checked", true): $("#id_resumen_kitvalvulas_regulacion_termostatica").prop("checked", false);  
                            value["KITVALVULAS_PURGADOR_AUTO_EWD"]==="X"? $("#id_resumen_kitvalvulas_purgador_auto_ewd").prop("checked", true): $("#id_resumen_kitvalvulas_purgador_auto_ewd").prop("checked", false);         
                            //$("#id_kit_filtro_linea").is(":checked")? $("#id_resumen_kit_filtro_linea").prop("checked", true): $("#id_resumen_kit_filtro_linea").prop("checked", false);
                            value["KITFILTROSLINEA_DD"]==="X"? $("#id_resumen_kitfiltroslinea_dd").prop("checked", true): $("#id_resumen_kitfiltroslinea_dd").prop("checked", false);
                            value["KITFILTROSLINEA_QD"]==="X"? $("#id_resumen_kitfiltroslinea_qd").prop("checked", true): $("#id_resumen_kitfiltroslinea_qd").prop("checked", false);
                            value["KITFILTROSLINEA_DDP"]==="X"? $("#id_resumen_kitfiltroslinea_ddp").prop("checked", true): $("#id_resumen_kitfiltroslinea_ddp").prop("checked", false);
                            value["KITFILTROSLINEA_PD"]==="X"? $("#id_resumen_kitfiltroslinea_pd").prop("checked", true): $("#id_resumen_kitfiltroslinea_pd").prop("checked", false);
                            value["KITFILTROSLINEA_QDT"]==="X"? $("#id_resumen_kitfiltroslinea_qdt").prop("checked", true): $("#id_resumen_kitfiltroslinea_qdt").prop("checked", false);
                            value["KITFILTROSLINEA_UDPLUS"]==="X"? $("#id_resumen_kitfiltroslinea_udplus").prop("checked", true): $("#id_resumen_kitfiltroslinea_udplus").prop("checked", false);
                            value["KITFILTROSLINEA_PDP"]==="X"? $("#id_resumen_kitfiltroslinea_pdp").prop("checked", true): $("#id_resumen_kitfiltroslinea_pdp").prop("checked", false);

                            validateSecador(value["EQUIPO_MODELO"]);                                                                           
                        });                  
                        await getArchivoByNumeroReporte(numero_reporte,NOMBRE_JEFE_ENCARGADO,NOMBRE_TECNICO_FIRMA, PROGRAMACIONID);
                    }else{
                        if (icon1=="error"){
                            Toast.fire({
                                icon: icon1,
                                title:message1
                            });
                        }
                    }
                }else{
                    Toast.fire({
                        icon: icon,
                        title:message
                    });
                }  
            }).catch((error) => {
                console.log(error)
            });
        }
        async function getSecadorByNumero(numero_reporte, reporte_serie){
            $("#spinner_reporte_list").show();  
            $("#kt_modal_reporte_list").hide(); 
            $("#kt_modal_secador_list").hide(); 
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('reporte_numero', numero_reporte);
            data.append('reporte_serie', reporte_serie);
            const response = await fetch(`${APP_URL}/secador/listar-secador-by-numero`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                $("#spinner_reporte_list").hide();  
                $("#kt_modal_secador_list").show(); 
                const rest = await response.json();
                const status1 = rest.status;                
                if (status1){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        const datos = rest.data.data;
                        var htmlContenImg='';
                        var NOMBRE_JEFE_ENCARGADO='';
                        var NOMBRE_TECNICO_FIRMA='';
                        var PROGRAMACIONID='';
                        $.each( datos, function( key, value ){
                                                        
                            PROGRAMACIONID = value["PROGRAMACIONID"];
                            NOMBRE_TECNICO_FIRMA=value["FIRMA"];
                            NOMBRE_JEFE_ENCARGADO=value["NOMBRE_JEFE_ENCARGADO"];
                            const NUMOT = value["NumOT"];
                            const RUC = value["RUC"];
                            const RAZON_SOCIAL = value["Razon"];
                            const TIPO_SERVICIO = value["TipoServicio"];
                            const EQUIPO_ID = value["Equipo_Id"];
                            const DESCRIPCION_TRABAJO = value["NumOT"];
                            const EMPRESA_DIRECCION = value["EMPRESA_DIRECCION"];
                            const EQUIPO = value["Equipo"];
                            const MODELO = value["Modelo"];
                            const SERIE = value["Serie"];
                            const REFERENCIA = value["EQUIPO_REFERENCIA"];
                            const TIPO_SERVICIO_COTIZACION = value["TIPO_SERVICIO_COTIZACION"];
                            const LOCAL_NOMBRE = value["LOCAL_NOMBRE"];
                            $("#id_resumen_secador_NumOT").text(NUMOT);
                            $("#id_resumen_secador_empresa_nombre").text(RAZON_SOCIAL);
                            $("#id_resumen_secador_ruc").text(RUC);
                            $("#id_resumen_secador_empresa_direccion").text(EMPRESA_DIRECCION);
                            $("#id_resumen_secador_TipoServicio").text(TIPO_SERVICIO);
                            $("#id_resumen_secador_equipo_referencia").text(REFERENCIA);
                            $("#id_resumen_secador_Modelo").text(MODELO);
                            $("#id_resumen_secador_Serie").text(SERIE);
                            $("#id_resumen_secador_local_nombre").text(LOCAL_NOMBRE);    
                            $("#id_resumen_secador_Equipo_Id").text(EQUIPO_ID);
                            $("#id_resumen_secador_Equipo").text(EQUIPO);
                            $("#id_resumen_secador_tipo_servicio_cotizacion").text(TIPO_SERVICIO_COTIZACION);
                            $("#id_resumen_service_secador_local_nombre").text(LOCAL_NOMBRE);
                            $("#id_resumen_id_secador_last_horometro").text("Obs. Último horómetro  "+value["LAST_HOROMETRO"]);
                            $("#id_resumen_secador_Horometro").text(value["Horometro"]);
                            $("#id_resumen_secador_PresMax").text(value["PresMax"]);
                            $("#id_resumen_secador_Placa").text(value["Placa"]);
                            $("#id_resumen_secador_TipoControl").text(value["TipoControl"]);
                            $("#id_resumen_secador_VoltControl").text(value["VoltControl"]);
                            value["MC_CHEQ_PRESION_SUCCION_DESCARGA"]==1? $("#id_resumen_secador_mc_cheq_presion_succion_descarga").prop("checked", true): $("#id_resumen_secador_mc_cheq_presion_succion_descarga").prop("checked", false);
                            value["MC_CHEQ_TERMINAL_ELECTRICO"]==1? $("#id_resumen_secador_mc_cheq_terminal_electrico").prop("checked", true): $("#id_resumen_secador_mc_cheq_terminal_electrico").prop("checked", false);
                            value["MC_CHEQ_VALVULAS_SERVICIO"]==1? $("#id_resumen_secador_mc_cheq_valvulas_servicio").prop("checked", true): $("#id_resumen_secador_mc_cheq_valvulas_servicio").prop("checked", false);
                            value["MC_CHEQ_POSIBLES_FUGAS_GAS_REFRIG"]==1? $("#id_resumen_secador_mc_cheq_posibles_fugas_gas_refrig").prop("checked", true): $("#id_resumen_secador_mc_cheq_posibles_fugas_gas_refrig").prop("checked", false);
                            value["MC_CHEQ_COJINETES_AMORT_PERNO_ARAND"]==1? $("#id_resumen_secador_mc_cheq_cojinetes_amort_perno_arand").prop("checked", true): $("#id_resumen_secador_mc_cheq_cojinetes_amort_perno_arand").prop("checked", false);
                            value["UC_LIMPIEZA_SERPENTIN_CONDENSACION"]==1? $("#id_resumen_secador_uc_limpieza_serpentin_condensacion").prop("checked", true): $("#id_resumen_secador_uc_limpieza_serpentin_condensacion").prop("checked", false);
                            value["UC_VERIF_MOTOR_VENTIL_RODAM_EMPEL"]==1? $("#id_resumen_secador_uc_verif_motor_ventil_rodam_empel").prop("checked", true): $("#id_resumen_secador_uc_verif_motor_ventil_rodam_empel").prop("checked", false);
                            value["UC_VERIF_CONTROL_PRESION_ALTA"]==1? $("#id_resumen_secador_uc_verif_control_presion_alta").prop("checked", true): $("#id_resumen_secador_uc_verif_control_presion_alta").prop("checked", false);
                            value["UC_VERIF_CONTROL_PRESION_BAJA"]==1? $("#id_resumen_secador_uc_verif_control_presion_baja").prop("checked", true): $("#id_resumen_secador_uc_verif_control_presion_baja").prop("checked", false);
                            value["UE_VERIF_AISLAMIENTO_TERMICO"]==1? $("#id_resumen_secador_ue_verif_aislamiento_termico").prop("checked", true): $("#id_resumen_secador_ue_verif_aislamiento_termico").prop("checked", false);
                            value["UE_VERIF_INGRESO_SALIDA_AIRE"]==1? $("#id_resumen_secador_ue_verif_ingreso_salida_aire").prop("checked", true): $("#id_resumen_secador_ue_verif_ingreso_salida_aire").prop("checked", false);
                            value["UE_VERIF_LIMPIEZA_TRAMPA"]==1? $("#id_resumen_secador_ue_verif_limpieza_trampa").prop("checked", true): $("#id_resumen_secador_ue_verif_limpieza_trampa").prop("checked", false);
                            value["GPM_LIMPIEZA_INTERIOR_EXTERIOR"]==1? $("#id_resumen_secador_gpm_limpieza_interior_exterior").prop("checked", true): $("#id_resumen_secador_gpm_limpieza_interior_exterior").prop("checked", false);
                            value["GPM_LIMPIEZA_PINTADO"]==1? $("#id_resumen_secador_gpm_limpieza_pintado").prop("checked", true): $("#id_resumen_secador_gpm_limpieza_pintado").prop("checked", false);
                            $("#id_resumen_cr_und_gas_refrigerante_tipo").text(value["CR_UND_GAS_REFRIGERANTE_TIPO"]);
                            $("#id_resumen_secador_cr_med_voltaje_fase1").text(value["CR_MED_VOLTAJE_FASE1"]);
                            $("#id_resumen_secador_cr_med_voltaje_fase2").text(value["CR_MED_VOLTAJE_FASE2"]);
                            $("#id_resumen_secador_cr_med_voltaje_fase3").text(value["CR_MED_VOLTAJE_FASE3"]);
                            $("#id_resumen_secador_cr_med_amperaje_arranque_l1").text(value["CR_MED_AMPERAJE_ARRANQUE_L1"]);
                            $("#id_resumen_secador_cr_med_amperaje_arranque_l2").text(value["CR_MED_AMPERAJE_ARRANQUE_L2"]);
                            $("#id_resumen_secador_cr_med_amperaje_arranque_l3").text(value["CR_MED_AMPERAJE_ARRANQUE_L3"]);
                            $("#id_resumen_secador_cr_med_amperaje_trabajo_l1").text(value["CR_MED_AMPERAJE_TRABAJO_L1"]);
                            $("#id_resumen_secador_cr_med_amperaje_trabajo_l2").text(value["CR_MED_AMPERAJE_TRABAJO_L2"]);
                            $("#id_resumen_secador_cr_med_amperaje_trabajo_l3").text(value["CR_MED_AMPERAJE_TRABAJO_L3"]);
                            $("#id_resumen_secador_cr_med_pres_gasrefri_reposo").text(value["CR_MED_PRES_GASREFRI_REPOSO"]);
                            $("#id_resumen_secador_cr_med_pres_gasrefri_reposo_psialta").text(value["CR_MED_PRES_GASREFRI_REPOSO_PSIALTA"]);
                            $("#id_resumen_secador_cr_med_pres_gasrefri_reposo_psibaja").text(value["CR_MED_PRES_GASREFRI_REPOSO_PSIBAJA"]);
                            $("#id_resumen_secador_cr_med_pres_gasrefri_trabajo").text(value["CR_MED_PRES_GASREFRI_TRABAJO"]);
                            $("#id_resumen_secador_cr_med_pres_gasrefri_trabajo_psialta").text(value["CR_MED_PRES_GASREFRI_TRABAJO_PSIALTA"]);
                            $("#id_resumen_secador_cr_med_pres_gasrefri_trabajo_psibaja").text(value["CR_MED_PRES_GASREFRI_TRABAJO_PSIBAJA"]);

                            value["CR_REG_VALVULA_EXPANSION"]==1? $("#id_resumen_secador_cr_reg_valvula_expansion").prop("checked", true): $("#id_resumen_secador_cr_reg_valvula_expansion").prop("checked", false);
                            $("#id_resumen_secador_cr_reg_pto_rocio_reposo").text(value["CR_REG_PTO_ROCIO_REPOSO"]);
                            $("#id_resumen_secador_cr_reg_pto_rocio_operacion").text(value["CR_REG_PTO_ROCIO_OPERACION"]);
                            value["VTEE_CONTACTOR_TERMAG"]==1? $("#id_resumen_secador_vtee_contactor_termag").prop("checked", true): $("#id_resumen_secador_vtee_contactor_termag").prop("checked", false);
                            value["VTEE_PULSADOR_ARRAN_PARADA"]==1? $("#id_resumen_secador_vtee_pulsador_arran_parada").prop("checked", true): $("#id_resumen_secador_vtee_pulsador_arran_parada").prop("checked", false);
                            value["VTEE_LUZ_PILOTO"]==1? $("#id_resumen_secador_vtee_luz_piloto").prop("checked", true): $("#id_resumen_secador_vtee_luz_piloto").prop("checked", false);
                            value["VTEE_RELE_PROTECTOR_SOBRECARGA"]==1? $("#id_resumen_secador_vtee_rele_protector_sobrecarga").prop("checked", true): $("#id_resumen_secador_vtee_rele_protector_sobrecarga").prop("checked", false);
                            value["VTEE_CONTROL_TEMPERATURA"]==1? $("#id_resumen_secador_vtee_control_temperatura").prop("checked", true): $("#id_resumen_secador_vtee_control_temperatura").prop("checked", false);
                            value["VTEE_OTROS"]==1? $("#id_resumen_secador_vtee_otros").prop("checked", true): $("#id_resumen_secador_vtee_otros").prop("checked", false);
                            $("#id_resumen_secador_observaciones_internas").text(value["OBSERVACIONES_INTERNAS"]);
                            $("#id_resumen_secador_desctrab").text(value["DESCTRAB"]);
                            $("#id_resumen_secador_observac").text(value["OBSERVAC"]);
                        });                  
                        await getArchivoByNumeroReporte(numero_reporte,NOMBRE_JEFE_ENCARGADO,NOMBRE_TECNICO_FIRMA, PROGRAMACIONID);
                    }else{
                        if (icon1=="error"){
                            Toast.fire({
                                icon: icon1,
                                title:message1
                            });
                        }
                    }
                }else{
                    Toast.fire({
                        icon: icon,
                        title:message
                    });
                }  
            }).catch((error) => {
                console.log(error)
            });
        }

        function validateSecador($val){
            var upperval = $val.toUpperCase();
            var valIndexOf = upperval.indexOf('FF');
            if (valIndexOf!==-1){
                $(".cls_secador").show();
                $("#id_secador_obl").val(1);
            }else{
                $(".cls_secador").hide();
                $("#id_secador_obl").val(0);
            }
        }

        async function getArchivoByNumeroReporte(numero_reporte,NOMBRE_JEFE_ENCARGADO,NOMBRE_TECNICO_FIRMA, programacionid){
            $("#kt_list_inicial_img, #kt_list_final_img").html('');
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('reporte_numero', numero_reporte);
            data.append('programacionid', programacionid);
            const response = await fetch(`${APP_URL}/reporte/listar-archivo-by-reporte-historial-detalle`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                const rest = await response.json();
                const status1 = rest.status;                
                if (status1){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        const datos = rest.data.data;
                        var htmlContenIniImg='';
                        var htmlContenFinImg='';
                        var htmlContenFirmaImg='';
                        var APP_URL_IMG_BK = APP_URL_BK.replace('index.php', '');
                        var rowCOunt =0;
                        $.each( datos, function( key, value ) {
                            var TIPO_REGISTRO= value["TIPO_REGISTRO"];
                            var NOMBRE_ORIGINAL= value["NOMBRE_ORIGINAL"];
                            
                            if (NOMBRE_ORIGINAL==='canvan'){
                                rowCOunt++;
                                if (rowCOunt<=2){
                                    htmlContenFirmaImg+=`<div class="col-md-6 col-sm-6  fv-row" >
                                        <p class="img-bg mb-5 bold fw-bolder text-gray-800 fs-4">Confirmación del ${TIPO_REGISTRO==="firma_customer" ? 'Cliente':'Técnico de servicio'} </p>
                                        <img class="select-dash " src="${APP_URL_IMG_BK}${value["RUTAL_RELATIVA"]}" alt="Cliente" style="width: 100%;">
                                        <p class="img-bg mt-5 bold fw-bolder text-gray-800 fs-4">Firmado por ${TIPO_REGISTRO==="firma_customer" ? NOMBRE_JEFE_ENCARGADO:NOMBRE_TECNICO_FIRMA}</p>
                                    </div>`;
                                }
                            }
                            if (TIPO_REGISTRO==='inicio'){
                                htmlContenIniImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_images_select cls_editar">
                                            <div class="position-absolute cls_check_photo "  > 
                                                <i class="bi bi-check2 fs-2x"></i>
                                            </div>
                                            <div  class="btn btn-outline btn-outline-dashed btn-outline-default w-100 active p-0 image-input" >
                                                <div data-image="${APP_URL_IMG_BK}${value["RUTAL_RELATIVA"]}" class="image-input-wrapper w-100 h-120px background-size-cover" style="border-radius: 0.475rem 0.475rem 0 0;background-image: url(${APP_URL_IMG_BK}${value["RUTAL_RELATIVA"]})" ></div> 
                                            </div>
                                        </div>`;
                            }
                            if (TIPO_REGISTRO==='final'){
                                htmlContenFinImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_images_select cls_editar">
                                            <div class="position-absolute cls_check_photo "  > 
                                                <i class="bi bi-check2 fs-2x"></i>
                                            </div>
                                            <div  class="btn btn-outline btn-outline-dashed btn-outline-default w-100 active p-0 image-input" >
                                                <div data-image="${APP_URL_IMG_BK}${value["RUTAL_RELATIVA"]}" class="image-input-wrapper w-100 h-120px background-size-cover" style="border-radius: 0.475rem 0.475rem 0 0;background-image: url(${APP_URL_IMG_BK}${value["RUTAL_RELATIVA"]})" ></div> 
                                            </div>
                                        </div>`;
                            }
                                                        
                        });
                        $("#kt_list_firmas").html(htmlContenFirmaImg);
                        $("#kt_list_inicial_img").html(htmlContenIniImg);
                        $("#kt_list_final_img").html(htmlContenFinImg);

                        $("#kt_secador_list_firmas").html(htmlContenFirmaImg);
                        $("#kt_secador_list_inicial_img").html(htmlContenIniImg);
                        $("#kt_secador_list_final_img").html(htmlContenFinImg);
                       
                    }else{
                        Toast.fire({
                            icon: icon1,
                            title:message1
                        });
                    }
                }else{
                    Toast.fire({
                        icon: icon,
                        title:message
                    });
                }  
            }).catch((error) => {
                console.log(error)
            });
        }

        $(document).on("click", ".btn_reenviar_correo ", async function (){
            
            var dataCls = $(this).data("class");
            var reporte_numero = $(this).data("reporte_numero");
            var tipo_equipo = $(this).data("tipo_equipo");

            Swal.fire({
            buttonsStyling:!1,
            showDenyButton: true,
            text: "¿Estas seguro que desea reenviar el correo?",
            icon: 'question',
            confirmButtonText: 'Confirmar',
            denyButtonText: 'Cancelar',
            reverseButtons: true,
            customClass:{
                confirmButton:"btn btn-dark-degradate ",
                denyButton:"btn btn-light-degradate ",
            }
            }).then((function(result){
                if(result.value){
                    if (tipo_equipo=="C"){
                        reenviarMailPdfReporte(reporte_numero,dataCls);
                    }else if (tipo_equipo=="S"){
                        reenviarMailPdfSecador(reporte_numero,dataCls);
                    }
                }
            }));
           
        })
        async function reenviarMailPdfReporte(reporte_numero, dataCls){
            beforeSendBtnLoad("."+dataCls);
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append("reporte_numero",reporte_numero);
            const response = await fetch(`${APP_URL}/reporte/reenviar-mail-pdf`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                beforeSendBtnLoad("."+dataCls, false);
                const rest = await response.json();
                const datos = rest.data;
                const type = rest.type;
                const status = rest.status;
                const icon = rest.icon;
                const message = rest.message;
                console.log(rest)
                if (status){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        Toast.fire({
                            icon: icon1,
                            title:message1
                        });                  
                    }else{
                        Toast.fire({
                            icon: icon1,
                            title:message1
                        }); 
                    }
                }else{
                    Toast.fire({
                        icon: icon,
                        title:message
                    });
                }                
            }).catch((error) => {
                console.log(error)
            });
        }
        async function reenviarMailPdfSecador(NumReporte, dataCls){
            beforeSendBtnLoad("."+dataCls);
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append("NumReporte",NumReporte);
            const response = await fetch(`${APP_URL}/secador/reenviar-mail-pdf`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                beforeSendBtnLoad("."+dataCls, false);
                const rest = await response.json();
                const datos = rest.data;
                const type = rest.type;
                const status = rest.status;
                const icon = rest.icon;
                const message = rest.message;
                console.log(rest)
                if (status){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        Toast.fire({
                            icon: icon1,
                            title:message1
                        });                  
                    }else{
                        Toast.fire({
                            icon: icon1,
                            title:message1
                        }); 
                    }
                }else{
                    Toast.fire({
                        icon: icon,
                        title:message
                    });
                }                
            }).catch((error) => {
                console.log(error)
            });
        }

        $(document).on("click", ".btn_descargar", async function(event){
            var filename = $(this).attr("data-archivo");
            if (filename ==null || filename==''){
                Swal.fire({
                    buttonsStyling:!1,
                    showDenyButton: false,
                    text: "Este reporte no tiene pdf generado.",
                    icon: 'warning',
                    confirmButtonText: 'Cancelar',
                    //denyButtonText: 'Cancelar',
                    reverseButtons: true,
                    timer:2000,
                    customClass:{
                        confirmButton:"btn btn-dark-degradate ",
                        //denyButton:"btn btn-light-degradate ",
                    }
                }).then((function(result){
                    if (result.isConfirmed) {
                        
                    }
                }));
                return;
            }
            event.preventDefault(); // Evita que el enlace haga 
            //event.preventDefault(); // Evita que el enlace haga una navegación
            //var filename = 'R004_529_20250315114455_12235.pdf'; // Reemplaza con el nombre del archivo
            // Construye la URL de descarga file-downloads
            
            var url = APP_URL_BK+"/api/file-downloads/"+filename;
            //var url = APP_URL+"/file-downloads/"+filename;
            //var url = `${APP_URL}/file-downloads/${filename}`;
            // Crea un enlace temporal
            var a = document.createElement('a');
            a.href = url;
            a.download = filename; // Define el nombre de archivo para el navegador
            // Simula un clic en el enlace para iniciar la descarga
            a.click();
            // Elimina el enlace temporal (opcional)
            a.remove();
        });
    })
</script>
@endpush