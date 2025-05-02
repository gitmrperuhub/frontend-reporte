@extends('master.master')
@section('title', 'MR PERU - REPORTES')
@section('contentHeaderLeft')
    @php
        date_default_timezone_set('America/Lima');
    @endphp
    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">
        @if ($compact["opcion"]==="start-service")
            Servicios 
            <input type="hidden" id="id_tipo_ot" disabled readonly value="SI" >
        @else
            Servicios Programados No Concluidos
            <input type="hidden" id="id_tipo_ot" disabled readonly value="NO" >
        @endif
        <input type="hidden" id="programcion_id_correo" name="programcion_id_correo" value="{{session()->get("Email")}}" >
        <input type="hidden" id="programcion_id_temporal" name="programcion_id_temporal"  >
        <input type="hidden" id="programcion_id_numot_tmporal" name="programcion_id_numot_tmporal"  >
        <input type="hidden" id="id_programacionid" name="id_programacionid"  >
        <span class="h-20px border-gray-300 border-start mx-4"></span>
    </h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-5 my-1" id="kt_seguimiento_menu" style="display: none;" >
        <li class="breadcrumb-item text-muted">
            <a href="javascript:void()" id="tipo_ser_cotizaciono" class="text-dark fw-bolder text-hover-primary"> </a>
        </li>
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <li class="breadcrumb-item text-muted">
            <a href="javascript:void()" id="cliente-seguimiento" class="text-primary fw-bolder text-hover-primary"> </a>
        </li>
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <li class="breadcrumb-item text-muted">
            <p class="m-0 mx-1 text-primary" >OT -  </p>
            <a href="javascript:void()" id="ot-seguimiento" class="text-dark fw-bolder text-hover-primary"> </a>
        </li>
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <li class="breadcrumb-item text-muted">
            <p class="m-0 mx-1 text-primary" >Modelo: </p>
            <a href="javascript:void()" id="modelo-seguimiento" class="text-dark fw-bolder text-hover-primary"> </a>
        </li>
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <li class="breadcrumb-item text-muted">
            <p class="m-0 mx-1 text-primary" >Serie: </p>
            <a href="javascript:void()" id="serie-seguimiento" class="text-dark fw-bolder text-hover-primary"> </a>
        </li>
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <li class="breadcrumb-item text-muted">
            <p class="m-0 mx-1 text-primary" >Referencia: </p>
            <a href="javascript:void()" id="referencia-seguimiento" class="text-dark fw-bolder text-hover-primary"> </a>
        </li>
    </ul>
@endsection()
@section('contentHeaderRight')
@endsection()
@section('contentModal')
<div class="modal fade" id="kt_modal_create_productos"  tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered mw-700px">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h2>Aceptar los terminos y condiciones</h2>
                <button type="button"  class="btn btn-sm btn-icon btn-primary b-radius-50 cls_modal_close_condition"  >
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pb-15 pt-15">
                <form class="form position-relative" novalidate="novalidate" id="kt_modal_create_producto_form">
                    <div class="mask-content position-absolute"></div>
                    <div class="row" >
                        <div class="col-xl-12 col-md-12 col-sm-12 mb-8 form_validate" >
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Conozco la evaluación del riesgo e instrucciones de seguridad para el trabajo y los acato ?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Conozco el contenido del permiso de trabajo (requerido por la cía o por el cliente) ylo acato?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Considero que el método de trabajo previsto es seguro?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Mi equipo de proteccion no tiene defectos ylos usaré de manera correcta ?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿He probado e inspeccionado las herramienta yes seguro su uso?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Cuento con suficiente iluminación yel lugar de trabajo está limpio ?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Conozco las salidas de emergencia/rutas de escape mas cercana y puntos de reunión?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Ubico el extintor mas cercano y los puntos de reunion?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿He consultado con otros cuyo trabajo se vea impactado por mi intervención o viceversa?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Conozco sobre riesgos químicos e instrucciones de seguridad relacionadas ylas acataré?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Conozco las fuentes de energia peligrosa y acataré el procedimiento de bloqueo?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Conozco las instrucciones de trabajo de altura y las acataré?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Conozco las instrucciones para el manejo de materiales y las acataré?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Conozco las instrucciones de espacios confinados ylos acataré?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 " name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-5">¿Considero que todas las medidas de seguridad han sido tomadas en mi area de trabajo?</span>
                                </div>
                                <div class="fv-row  each_chk ms-5">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                <div class="text-center">
                    <button type="reset" class="btn btn-light me-3 cls_modal_close_condition fs-4">
                        Cancelar
                    </button>

                    <button type="button" id="kt_modal_accept_condition" class="btn btn-primary fs-4">
                        <span class="indicator-label">
                            Aceptar
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
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

<div class="modal fade" id="kt_modal_firma_cliente"  tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered mw-600px">
        <div class="modal-content rounded">
            <div class="modal-body scroll-y position-relative p-0">
                <div class="body" >
                    <div id="signature-pad"  class="signature-pad">
                      <div class="signature-pad--body">
                        <canvas id="canvanIdData" ></canvas>
                      </div>
                      <div class="signature-pad--footer">
                        <div class="signature-pad--actions d-flex justify-content-end">
                          <div class="column d-flex flex-stack pt-10">
                            <button type="button" class="button btn btn-sm btn-primary clear fs-4" data-action="clear">Limpiar</button>
                            <button type="button" class="button btn btn-sm btn-primary fs-4 btn-close-signature" >Cerrar</button>
                            <button type="button" class="button btn btn-sm btn-primary fs-4" id="IdSavedatatoDataURL" >
                                <span class="indicator-label"> Guardar</span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                          </div>
                          <div class="d-none" >
                            <div class="column">
                                <button type="button" class="button" data-action="change-background-color">Change background color</button>
                                <button type="button" class="button" data-action="change-color">Change color</button>
                                <button type="button" class="button" data-action="change-width">Change width</button>
                                <button type="button" class="button" data-action="undo">Undo</button>
                              </div>
                              <div class="column">
                                <button type="button" class="button save" data-action="save-png">Save as PNG</button>
                                <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
                                <button type="button" class="button save" data-action="save-svg">Save as SVG</button>
                                <button type="button" class="button save" data-action="save-svg-with-background">Save as SVG with background</button>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_contacto_correo"  tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered mw-600px">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h2>Contactos de Cliente</h2>
                <button type="button" class="btn btn-sm btn-icon btn-primary b-radius-50 modal_close_correo_contact "  >
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pb-10 pt-10">
                <div class="mask-content position-absolute"></div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 form_validate">
                        <div class="d-flex justify-content-between ">
                            <div class="fv-row  w-100">
                                <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                    <span class="">Nuevo contacto</span>
                                </label>
                                <input type="text" placeholder="Nombre y apellido" class="form-control form-control-sm fw-bold fs-4 text-gray-600 w-100" id="add_name_contact" name="add_name_contact" >
                                <input type="hidden" placeholder="Correo y electronico" class="my-2 form-control form-control-sm fw-bold fs-4 d-block w-100 fs-4" id="add_email_contact" name="add_email_contact"  >
                            </div>
                            <div class="fv-row  each_chk d-none">
                                <div class="form-check form-check-custom">
                                    <input class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox" id="add_chk_contact" name="add_chk_contact"/>
                                    <label class="form-check-label" for="add_chk_contact">
                                        <div class="text-gray-600"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-end  my-2  " >
                            <button type="button" class="btn btn-sm btn-primary fs-4" id="id_save_add_email">Agregar</button>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-2"></div>
                <div class="row" style="height: 300px;overflow: auto;" id="scroll_correo_cnt" >
                    <div class="col-xl-12 col-md-12 col-sm-12 form_validate" id="kt_listar_correo_contacto" >
                    </div>
                </div>
                <div class="text-center">
                    <button type="reset" id="" class="btn btn-light me-3 modal_close_correo_contact fs-4">
                        Cancelar
                    </button>

                    <button type="button" class="btn btn-primary fs-4"  id="modal_select_correc_contact" >
                        <span class="indicator-label">
                            Aceptar
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </div>  
        </div>
    </div>
</div>
<div class="modal fade" id="kt_modal_jefe_contacto" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered mw-600px">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h2>Contactos de Cliente</h2>
                <button type="button" class="btn btn-sm btn-icon btn-primary b-radius-50 modal_close_jefe_contact "  >
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pb-10 pt-10">
                <div class="mask-content position-absolute"></div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 form_validate">
                        <div class="d-flex justify-content-between">
                            <div class="fv-row w-100">
                                <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                    <span class="">Nuevo contacto</span>
                                </label>
                                <input type="text" placeholder="Nombre y apellido"  class="form-control form-control-sm fw-bold fs-4 d-block w-100 fs-4" id="add_jefe_contact" name="add_jefe_contact"  >
                                <input type="hidden" placeholder="Correo y electronico" class="my-2 form-control form-control-sm fw-bold fs-4 d-block w-100 fs-4" id="add_email_jefe_contact" name="add_email_jefe_contact"  >
                            </div>
                        </div>
                        <div class="text-end  my-2  " >
                            <button type="button" class="btn btn-sm btn-primary fs-4" id="id_save_add_jefe_contact">Agregar</button>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-2"></div>
                <div class="row" style="height: 300px;overflow: auto;" id="scroll_jefe_cnt" >
                    <div class="col-xl-12 col-md-12 col-sm-12 form_validate" id="kt_listar_jefe_contact" >
                    </div>
                </div>
                <div class="text-center">
                    <button type="reset" id="" class="btn btn-light me-3  fs-4 modal_close_jefe_contact">
                        Cancelar
                    </button>
                    <button type="button" class="btn btn-primary fs-4 "  id="modal_select_jefe_contact" >
                        <span class="indicator-label">
                            Aceptar
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="kt_modal_see_horometro"  tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h2>Horómetro (horas)</h2>
                <button type="button" class="btn btn-sm btn-icon btn-primary b-radius-50  cls_modal_horometros"  >
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pb-10 pt-10">
                <div class="mask-content position-absolute"></div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">  
                        <input type="number" id="id_input_horometro"  class="form-control form-control-bg fs-4 form-control-sm">
                    </div>
                </div>
                <div class="text-center mt-10">
                    <button type="reset" class="btn btn-light me-3  fs-4 cls_modal_horometros ">
                        Cancelar
                    </button>
                    <button type="button" class="btn btn-primary fs-4 "  id="kt_add_horometro" >
                        <span class="indicator-label">
                            Aceptar
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
@section('content')
    <input type="hidden" id="user_sesion" name="user_sesion" value="{{ session()->get("Codigo")  }}" >
    <input type="hidden" id="inicio_contador_imag" name="inicio_contador_imag" value="0" >
    <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">
            
        </div>
    </div>
    <div class="card mb-5 mb-xl-8">
        <div class="card-body py-3" id="kt_modal_create_compresor">
            <div class="stepper stepper-links d-flex flex-column" >
                <!--begin::Nav-->
                <div class="stepper-nav justify-content-between py-2">
                    <!--begin::Step 1-->
                    <div class="stepper-item me-5 me-md-15 current cls_step_ot" data-kt-stepper-element="nav" id="page_content_0" >
                        <div class="stepper-title">Orden de Trabajo</div>
                    </div>
                    <div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_content_1">
                        <h3 class="stepper-title">Paso 1</h3>
                    </div>
                    <div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_content_2">
                        <h3 class="stepper-title">Paso 2</h3>
                    </div>

                    <div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_content_3">
                        <h3 class="stepper-title">Paso 3</h3>
                    </div>
                    <div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_content_4">
                        <h3 class="stepper-title">Paso 4</h3>
                    </div>
                    <div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_content_5">
                        <h3 class="stepper-title">Paso 5</h3>
                    </div>
                    <div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_content_6">
                        <h3 class="stepper-title">Paso final</h3>
                    </div>
                </div>
                <!--end::Nav-->
                <!--begin::Form-->
                <form class="" novalidate="novalidate" id="kt_modal_create_campaign_stepper_form">
                    <div class="current" data-kt-stepper-element="content" id="page_0"  >
                        <div class="w-100" id="kt_form_input_page_0">
                            <input type="hidden" id="idreportenumero" name="idreportenumero" >
                            <div class="fv-row mb-10 "></div>
                            <div class="row justify-content-md-center" id="spiner-lits-ot" >
                                <div class="col-md-2 fv-row " >
                                    <span class="indicator-progress d-block text-center">
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="row g-9 mb-8 d-flex justify-content-center" id="kt_list_ot">
                            </div>
                          
                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_1">
                        <div class="w-100" id="kt_form_input_page_1">
                            <div class="fv-row mb-10 "></div>
                            <div class="row g-9 mb-8" id="kt_list_images" >                     
                                <div class="col-md-3 col-sm-4 fv-row px-8 pt-3" id="IdUploadImg" > 
                                    <input type="file" class="d-none filenameonchage" id="subirImg" accept=".png, .jpg, .jpeg" >
                                    <label for="subirImg" class="btn btn-outline btn-outline-dashed btn-outline-default w-100 h-155px p-0 image-input" >
                                        <div class="image-input image-input-empty image-input-outline w-100 h-150px" data-kt-image-input="true" style="background-image: url({{asset('assets/media/svg/files/blank-image.svg')}})">
                                            <!--div class="image-input-wrapper w-100 h-135px "></div-->
                                            <div class="row justify-content-md-center" id="spiner-upload-images" style="display: none;    margin-top: 50%;">
                                                <div class="col-12 fv-row ">
                                                    <span class="indicator-progress d-block text-center" >
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                    </label>
                                </div>
                            </div>
                            <div class="row g-9 mb-8 d-none" id="kt_delete_archivos_guardados" >

                            </div>
                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_2" >
                        <div class="w-100" id="kt_form_input_page_2" >
                            <div class="fv-row mb-10 "></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Datos de cliente</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">OT</span>
                                    </label>
                                    <input type="text" id="service_ot" name="reporte_orden_trabajo" disabled class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Reporte Serie</span>
                                    </label>
                                    <input type="text" id="service_report_number" name="service_report_number" value="004" disabled class="form-control form-control-bg fs-4 form-control-sm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Razón Social</span>
                                    </label>
                                    <input type="text" id="service_razon_social" name="empresa_nombre" disabled class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required"> RUC</span>
                                    </label>
                                    <input type="text" id="service_ruc" name="ruc" disabled class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Local</span>
                                    </label>
                                    <input type="text" id="service_local_nombre"  disabled name="local_nombre" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-12 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Dirección</span>
                                    </label>
                                    <input type="text" id="service_direccion" name="empresa_direccion" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row d-none" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required"> Teléfono</span>
                                    </label>
                                    <input type="number" id="service_tel_cliente" name="empresa_telefono" class="form-control form-control-bg fs-4 form-control-sm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row d-none" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Email</span>
                                    </label>
                                    <input type="email" id="service_email_cliente" name="empresa_email" class="form-control form-control-bg fs-4 form-control-sm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                           
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Servicio</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Seleccione Técnico 1</span>
                                    </label>
                                   
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="servicio_tenico1" name="id_tecnico_01" data-kt-select2="true" data-placeholder="Seleccionar técnico"  data-allow-clear="false">
                                        <option selected value="{{ session()->get("Codigo")  }}">{{ session()->get("Nombre")  }}</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required cls_required_tec_2">Seleccione Técnico 2</span> 
                                    </label>
                                    <input type="hidden" value="0" id="id_obl" name="id_obl">
                                    <input type="hidden" value="" id="dni_teccnico" name="dni_teccnico">
                                    <select disabled class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="servicio_tenico2" name="id_tecnico_02" data-kt-select2="true" data-placeholder="Seleccione técnico"  data-allow-clear="false">
                                        <option value="">Seleccione técnico</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Tipo de Servicio</span>
                                    </label>
                                    <input type="text" disabled id="service_tipo_service" name="tipo_servicio_desc" class="form-control form-control-bg fs-4 form-control-sm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row d-none " >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Tipo de Servicio Cotización</span>
                                    </label>
                                    <input type="text" id="service_tipo_servicio_cotizacion" name="tipo_servicio_cotizacion" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Fecha de servicio</span>
                                    </label>
                                    @if ($compact["opcion"]==="start-service")
                                        <input type="text" disabled id="service_show_fecha1" name="service_show_fecha1" value="{{date("d-m-Y")}}"  class="form-control form-control-bg fs-4 form-control-sm">
                                        <input type="text" disabled id="service_fecha"      name="service_fecha"      value="{{date("Y-m-d")}}" class="form-control form-control-bg fs-4 form-control-sm d-none" >
                                    @else
                                        <input type="text" disabled id="service_show_fecha2" name="service_show_fecha2" class="form-control form-control-bg fs-4 form-control-sm" >
                                        <select id="service_fecha" name="reporte_fecha_servicio"  class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" data-kt-select2="true" data-placeholder="Seleccione fecha de servicio"  data-allow-clear="false">
                                            <option value="0">Seleccione fecha de servicio</option>
                                        </select>
                                    @endif
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Equipo</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Compresor</span>
                                    </label>
                                    <input type="hidden" id="service_equipo_id"  name="equipo_id" >
                                    <input type="text" disabled id="service_equipo_marca"  name="equipo_marca"  class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" > 
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Equipo Referencia</span>
                                    </label>
                                    <input type="text" disabled id="service_equipo_referencia" name="equipo_referencia" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Equipo modelo</span>
                                    </label>
                                    <input type="text" disabled id="service_equipo_modelo" name="equipo_modelo" class="form-control form-control-bg fs-4 form-control-sm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">N° Serie</span>
                                    </label>
                                    <input type="text" disabled id="service_equipo_serie" name="equipo_nro_serie" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Tipo de Módulo</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="service_equipo_modelo_tipo" name="equipo_modulo_tipo" data-kt-select2="true" data-placeholder="Seleccione Tipo de Módulo"  data-allow-clear="false">
                                        <option value="0">Seleccione Tipo de Módulo</option>
                                    </select>
                                    <!--input type="text" id="service_equipo_modelo_tipo" name="equipo_modulo_tipo" class="form-control form-control-bg fs-4 form-control-sm" -->
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Máxima Presión (psi)</span> 
                                    </label>
                                    <input type="text" id="service_equipo_presion" name="equipo_presion" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Caudal (CFM)</span>
                                    </label>
                                    <input type="text" id="service_equipo_caudal" name="equipo_caudal" class="form-control form-control-bg fs-4 form-control-sm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">RPM</span>
                                    </label>
                                    <input type="text" id="service_equipo_rpm" name="equipo_rpm" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row d-none" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Horómetro (horas)</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2"  id="id_select_horometro" name="id_select_horometro">
                                        <option value="0">Seleccionar</option>
                                        <option value="0" data-opt="1">INGRESAR HORÓMETRO</option>
                                        <option selected value="MALOGRADO" data-opt="0">MALOGRADO</option>
                                        <option value="APAGADO" data-opt="0">APAGADO</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row">
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Horómetro (horas)</span>
                                    </label>
                                    <input type="number" id="service_equipo_horometro" name="equipo_horometro" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Horas de Carga</span>
                                    </label>
                                    <input type="number" id="service_horas_carga" name="horas_carga" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-12 fv-row">
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="" id="id_last_horometro" >Obs. Último horómetro </span>
                                    </label>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="form-check form-check-custom  fw-bold mb-8">
                                <input class="form-check-input "  type="checkbox" id="id_tecnologia_vsd" name=""/>
                                <label class="form-check-label d-flex align-items-center fs-5 fw-bold" for="id_tecnologia_vsd">
                                    <span >Tecnología VSD</span>
                                </label>
                            </div>
                            <div class="row g-9 mb-8 cls_tecnologia_vsd" style="display: none;" >
                                <div class="col-12col-sm-4 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-2">
                                            <div class="form-check form-check-custom">
                                                <input class="form-check-input me-3 " checked value="%" type="radio" id="id_Tecnologis_vsd_porc" name="id_Tecnologis_vsd"/>
                                                <label class="form-check-label" for="id_Tecnologis_vsd_porc">
                                                    <div class="text-gray-600">Uso en %</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="fv-row mx-2 w-150px">
                                            <div class="form-check form-check-custom ">
                                                <input class="form-check-input me-3 " value="H"  type="radio" id="id_Tecnologis_vsd_horas" name="id_Tecnologis_vsd"/>
                                                <label class="form-check-label" for="id_Tecnologis_vsd_horas">
                                                    <div class="text-gray-600">Uso en horas</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">VSD 00-20 % rpm <span class="tipo_tec_vsd" >(h)</span> </span>
                                    </label>
                                    <input type="text" maxlength="4" data-number='true' id="vsd_00_20rpm" name="vsd_00_20rpm" class="form-control form-control-bg fs-4 form-control-sm cls_por"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">VSD 20-40 % rpm <span class="tipo_tec_vsd" >(h)</span></span>
                                    </label>
                                    <input type="text" maxlength="4" data-number='true' id="vsd_20_40rpm" name="vsd_20_40rpm" class="form-control form-control-bg fs-4 form-control-sm cls_por"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">VSD 40-60 % rpm <span class="tipo_tec_vsd" >(h)</span></span>
                                    </label>
                                    <input type="text" maxlength="4" data-number='true' id="vsd_40_60rpm" name="vsd_40_60rpm" class="form-control form-control-bg fs-4 form-control-sm cls_por"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">VSD 60-80 % rpm <span class="tipo_tec_vsd" >(h)</span></span>
                                    </label>
                                    <input type="text" maxlength="4" data-number='true' id="vsd_60_80rpm" name="vsd_60_80rpm" class="form-control form-control-bg fs-4 form-control-sm cls_por"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">VSD 80-100 % rpm <span class="tipo_tec_vsd" >(h)</span></span>
                                    </label>
                                    <input type="text" maxlength="4" data-number='true' id="vsd_80_100rpm" name="vsd_80_100rpm" class="form-control form-control-bg fs-4 form-control-sm cls_por " >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5 cls_secador'></div>
                            <label class=" fs-5 fw-bold mb-8 cls_secador">
                                <span >Secador Incorporado</span>
                            </label>
                            <div class="row g-9 mb-8 cls_secador " style="display: none;" >
                                <input type="hidden" value="0" id="id_secador_obl">
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Modelo</span>
                                    </label>
                                    <input type="text" id="service_secador_modelo" name="secador_modelo" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Nro. de Serie</span>
                                    </label>
                                    <input type="text" id="service_secador_nro_serie" name="secador_nro_serie" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Pto. de rocío (°C)</span>
                                    </label>
                                    <input type="text" id="service_secador_punto_rocio" name="secador_punto_rocio" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Voltaje</span>
                                    </label>
                                    <input type="text" id="service_secador_voltaje_amp" name="secador_voltaje_amp" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Amperaje</span>
                                    </label>
                                    <input type="text" id="service_secador_amperaje" name="secador_amperaje" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Protección</span>
                                    </label>
                                    <input type="text" id="service_secador_proteccion" name="secador_proteccion" class="form-control form-control-bg fs-4 form-control-sm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Limpieza</span>
                                    </label>
                                    <input type="text" id="service_secador_limpieza" name="secador_limpieza" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Tipo de refrig.</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="service_secador_tipo_refrigeracion" name="secador_tipo_refrigeracion" data-kt-select2="true" data-placeholder="Seleccione Tipo de refrig."  data-allow-clear="false">
                                        <option value="0">Seleccione Tipo de refrig.</option>
                                    </select>
                                    <!--input type="text" id="service_secador_tipo_refrigeracion" name="secador_tipo_refrigeracion" class="form-control form-control-bg fs-4 form-control-sm"-->
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-12  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Nota</span>
                                    </label>
                                    <textarea type="text" id="service_secador_nota" name="secador_nota" class="form-control form-control-bg fs-4 form-control-sm"  ></textarea>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>

                            <div  class="d-flex flex-stack pt-10" >
                                <div class="me-2"></div>
                                <div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_3">
                        <div class="w-100" id="kt_form_input_page_3" >
                            <div class="fv-row mb-10 "></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Mecánicos</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Tipo de aceite usado</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="verificacion_tipo_aceite_usado" name="verificacion_tipo_aceite_usado" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione tipo de aceite usado</option>
                                        <option value="NDURANCE"> NDURANCE </option>
                                        <option value="SYNTHETIC RS ULTRA">SYNTHETIC RS ULTRA</option>
                                        <option value="SYNTHETIC RS EXTEND DUTY">SYNTHETIC RS EXTEND DUTY</option>
                                        <option value="TELLUS 46">TELLUS 46</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Aceite</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="verificacion_estado_aceite" name="verificacion_estado_aceite" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Aceite</option>
                                        <option value="NUEVO">NUEVO</option>
                                        <option value="OPERATIVO">OPERATIVO</option>
                                        <option value="SE CAMBIÓ">SE CAMBIÓ</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Filtro de Aceite</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="verificacion_estado_filtro_de_aceite" name="verificacion_estado_filtro_de_aceite" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Aceite</option>
                                        <option value="NUEVO">NUEVO</option>
                                        <option value="OPERATIVO">OPERATIVO</option>
                                        <option value="SE CAMBIÓ">SE CAMBIÓ</option>
                                        <option value="SE COMPLETÓ">SE COMPLETÓ</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Filtro de Aire</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="verificacion_estado_filtro_de_aire" name="verificacion_estado_filtro_de_aire" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Aceite</option>
                                        <option value="NUEVO">NUEVO</option>
                                        <option value="OPERATIVO">OPERATIVO</option>
                                        <option value="SE CAMBIÓ">SE CAMBIÓ</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Estado del Separador</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="verificacion_estado_separador" name="verificacion_estado_separador" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Estado del Separador</option>
                                        <option value="NUEVO">NUEVO</option>
                                        <option value="OPERATIVO">OPERATIVO</option>
                                        <option value="SE CAMBIÓ">SE CAMBIÓ</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Estado de Fajas y Acoplamiento</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="verificacion_estado_fajas_acoplamiento" name="verificacion_estado_fajas_acoplamiento" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione estado de fajas</option>
                                        <option value="NUEVO">NUEVO</option>
                                        <option value="OPERATIVO">OPERATIVO</option>
                                        <option value="SE CAMBIÓ">SE CAMBIÓ</option>
                                        <option value="N/T">N/T</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Condiciones de Limpieza del Equipo</span>
                                    </label>
                                    <!--textarea type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="verificacion_estado_de_limpieza" name="verificacion_estado_de_limpieza"  ></textarea-->
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="verificacion_estado_de_limpieza" name="verificacion_estado_de_limpieza" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Condiciones de Limpieza del equipo</option>
                                        <option value="BUENO">BUENO</option>
                                        <option value="REGULAR">REGULAR</option>
                                        <option value="MALO">MALO</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Limpieza química de los enfriadores</span>
                                    </label>
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-2">
                                            <div class="form-check form-check-custom">
                                                <input class="form-check-input me-3" type="radio" value="SI" id="id_limp_enf_si" name="check_limpieza_enfriadores"/>
                                                <label class="form-check-label" for="">
                                                    <div class="text-gray-600">SI</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="fv-row mx-2 w-150px">
                                            <div class="form-check form-check-custom ">
                                                <input class="form-check-input me-3 " checked type="radio" value="NO" id="id_limp_enf_no" name="check_limpieza_enfriadores"/>
                                                <label class="form-check-label" for="">
                                                    <div class="text-gray-600">NO</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-custom d-none">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_limpieza_enfriadores" name="limpieza_enfriadores"/>
                                        <label class="form-check-label" for="id_limpieza_enfriadores">
                                            <div class="text-gray-600 fs-4">Limpieza química de los enfriadores</div>
                                        </label>
                                    </div>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Engrase del Motor</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="engrase_de_motor" name="engrase_de_motor" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione engrase del motor</option>
                                        <option value="NO SE CAMBIÓ">NO SE CAMBIÓ</option>
                                        <option value="SE CAMBIÓ">SE CAMBIÓ</option>
                                        <option value="N/T">N/T</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="form-check form-check-custom  fw-bold mb-8">
                                <input class="form-check-input "  type="checkbox" id="id_kit_valvulas" name="kitvalvulas_cambio"/>
                                <label class="form-check-label d-flex align-items-center fs-4 fw-bold" for="id_kit_valvulas">
                                    <span >Kit de válvulas</span>
                                </label>
                            </div>
                            <div class="row g-9 mb-8 cls_kit_valvulas" style="display: none;" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_amision" name="kitvalvulas_amision"/>
                                        <label class="form-check-label" for="id_kitvalvulas_amision">
                                            <div class="text-gray-600 fs-4">Admisión</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_paradaaceite" name="kitvalvulas_paradaaceite"/>
                                        <label class="form-check-label" for="id_kitvalvulas_paradaaceite">
                                            <div class="text-gray-600 fs-4">Parada de Aceite</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_termostatica" name="kitvalvulas_termostatica"/>
                                        <label class="form-check-label" for="id_kitvalvulas_termostatica">
                                            <div class="text-gray-600 fs-4">Termostática</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_lineabarrido" name="kitvalvulas_lineabarrido"/>
                                        <label class="form-check-label" for="id_kitvalvulas_lineabarrido">
                                            <div class="text-gray-600 fs-4">Línea de Barrido</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_minimapresion" name="kitvalvulas_minimapresion"/>
                                        <label class="form-check-label" for="id_kitvalvulas_minimapresion">
                                            <div class="text-gray-600 fs-4">Mínima presión</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_trampagua" name="kitvalvulas_trampagua"/>
                                        <label class="form-check-label" for="id_kitvalvulas_trampagua">
                                            <div class="text-gray-600 fs-4">Trampa de agua</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_check" name="kitvalvulas_check"/>
                                        <label class="form-check-label" for="id_kitvalvulas_check">
                                            <div class="text-gray-600 fs-4">Check</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_solenoide" name="kitvalvulas_solenoide"/>
                                        <label class="form-check-label" for="id_kitvalvulas_solenoide">
                                            <div class="text-gray-600 fs-4">Solenoide</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_ventilacion" name="kitvalvulas_ventilacion"/>
                                        <label class="form-check-label" for="id_kitvalvulas_ventilacion">
                                            <div class="text-gray-600 fs-4">Ventilación</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_tresvias" name="kitvalvulas_tresvias"/>
                                        <label class="form-check-label" for="id_kitvalvulas_tresvias">
                                            <div class="text-gray-600 fs-4">3 Vías</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_regulacion_termostatica" name="kitvalvulas_regulacion_termostatica"/>
                                        <label class="form-check-label" for="id_kitvalvulas_regulacion_termostatica">
                                            <div class="text-gray-600 fs-4">Regulación termostática</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_valvulas" value=""  type="checkbox" id="id_kitvalvulas_purgador_auto_ewd" name="kitvalvulas_purgador_auto_ewd"/>
                                        <label class="form-check-label" for="id_kitvalvulas_purgador_auto_ewd">
                                            <div class="text-gray-600 fs-4">Purgador automático EWD</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12" >
                                    <input type="hidden" id="name_kit_valvulas" name="name_kit_valvulas" disabled class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="form-check form-check-custom  fw-bold mb-8">
                                <input class="form-check-input "  type="checkbox" id="id_kit_filtro_linea" name=""/>
                                <label class="form-check-label d-flex align-items-center fs-4 fw-bold" for="id_kit_filtro_linea">
                                    <span >Kit de filtros de Línea</span>
                                </label>
                            </div>
                            <div class="row g-9 mb-8 cls_kit_filtro_linea" style="display: none;">
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_filtro_linea" value=""  type="checkbox" id="id_kitfiltroslinea_dd" name="kitfiltroslinea_dd"/>
                                        <label class="form-check-label" for="id_kitfiltroslinea_dd">
                                            <div class="text-gray-600 fs-4">DD</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_filtro_linea" value=""  type="checkbox" id="id_kitfiltroslinea_pd" name="kitfiltroslinea_pd"/>
                                        <label class="form-check-label" for="id_kitfiltroslinea_pd">
                                            <div class="text-gray-600 fs-4">PD</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_filtro_linea" value=""  type="checkbox" id="id_kitfiltroslinea_pdp" name="kitfiltroslinea_pdp"/>
                                        <label class="form-check-label" for="id_kitfiltroslinea_pdp">
                                            <div class="text-gray-600 fs-4">PDP</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_filtro_linea" value=""  type="checkbox" id="id_kitfiltroslinea_qd" name="kitfiltroslinea_qd"/>
                                        <label class="form-check-label" for="id_kitfiltroslinea_qd">
                                            <div class="text-gray-600 fs-4">QD</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_filtro_linea" value=""  type="checkbox" id="id_kitfiltroslinea_qdt" name="kitfiltroslinea_qdt"/>
                                        <label class="form-check-label" for="id_kitfiltroslinea_qdt">
                                            <div class="text-gray-600 fs-4">QDT</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_filtro_linea" value=""  type="checkbox" id="id_kitfiltroslinea_ddp" name="kitfiltroslinea_ddp"/>
                                        <label class="form-check-label" for="id_kitfiltroslinea_ddp">
                                            <div class="text-gray-600 fs-4">DDP</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 each_kit_filtro_linea" value=""  type="checkbox" id="id_kitfiltroslinea_udplus" name="kitfiltroslinea_udplus"/>
                                        <label class="form-check-label" for="id_kitfiltroslinea_udplus">
                                            <div class="text-gray-600 fs-4">UD+</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12"  >
                                    <input type="hidden" id="name_kit_filtro_linea" name="name_kit_filtro_linea" disabled class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>

                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span > Medición de Voltaje</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">UL1 - UL2 (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_voltaje_ul1l2" name="medicion_voltaje_ul1l2"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">UL2 - UL3 (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_voltaje_ul2l3" name="medicion_voltaje_ul2l3" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class=""> UL1 - UL3 (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_voltaje_ul1l3" name="medicion_voltaje_ul1l3"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Medición del Amperaje</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required"> L1 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_amperaje_l1" name="medicion_amperaje_l1"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">L2 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_amperaje_l2" name="medicion_amperaje_l2" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">L3 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_amperaje_l3" name="medicion_amperaje_l3"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Amperaje de Fase y Ventiladores</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">F1 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_amperaje_f1" name="medicion_amperaje_f1"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">F2 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_amperaje_f2" name="medicion_amperaje_f2"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">F3 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_amperaje_f3" name="medicion_amperaje_f3"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Ventilador 1</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">L1 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_ventilador_01_l1" name="medicion_ventilador_01_l1"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">L2 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_ventilador_01_l2" name="medicion_ventilador_01_l2"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">L3 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_ventilador_01_l3" name="medicion_ventilador_01_l3"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Ventilador 2</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class=""> L1 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_ventilador_02_l1" name="medicion_ventilador_02_l1"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">L2 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_ventilador_02_l2" name="medicion_ventilador_02_l2"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">L3 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="medicion_ventilador_02_l3" name="medicion_ventilador_02_l3"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Termomagnético</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Termomagnético (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="thermomagnetico" name="thermomagnetico"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Línea a tierra (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="linea_a_tierra" name="linea_a_tierra"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Voltaje de control (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="voltaje_de_control" name="voltaje_de_control"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Voltaje de módulo (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="voltaje_del_modulo" name="voltaje_del_modulo"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Motor Eléctrico I</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Marca</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_i_marca" name="motor_electrico_i_marca"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Voltaje</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_i_voltaje" name="motor_electrico_i_voltaje"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Amp</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_i_amperaje" name="motor_electrico_i_amperaje"   >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Fs</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_i_fs" name="motor_electrico_i_fs"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">RPM</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_i_rpm" name="motor_electrico_i_rpm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Motor Eléctrico II</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Marca</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_ii_marca" name="motor_electrico_ii_marca"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Voltaje</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_ii_voltaje" name="motor_electrico_ii_voltaje" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Amp</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_ii_amperaje" name="motor_electrico_ii_amperaje"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Fs</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_ii_fs" name="motor_electrico_ii_fs" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">RPM</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_ii_rpm" name="motor_electrico_ii_rpm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Motor Eléctrico III</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Marca</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_iii_marca" name="motor_electrico_iii_marca"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Voltaje</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_iii_voltaje" name="motor_electrico_iii_voltaje"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Amp</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_iii_amperaje" name="motor_electrico_iii_amperaje"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Fs</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_iii_fs" name="motor_electrico_iii_fs" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">RPM</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="motor_electrico_iii_rpm" name="motor_electrico_iii_rpm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Vida de Servicios Programados</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Vida de Aceite</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" id="vida_de_aceite" name="vida_de_aceite" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Vida  de Aceite</option>
                                        <option value="1000 HORAS">1000 HORAS</option>
                                        <option value="2000 HORAS">2000 HORAS</option>
                                        <option value="4000 HORAS">4000 HORAS</option>
                                        <option value="8000 HORAS">8000 HORAS</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Vida de fil. de aceite</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" id="vida_de_filtro_aceite" name="vida_de_filtro_aceite" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Vida  de Aceite</option>
                                        <option value="1000 HORAS">1000 HORAS</option>
                                        <option value="2000 HORAS">2000 HORAS</option>
                                        <option value="4000 HORAS">4000 HORAS</option>
                                        <option value="8000 HORAS">8000 HORAS</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Vida de fil. de aire</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" id="vida_de_filtro_aire" name="vida_de_filtro_aire" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Vida  de Aceite</option>
                                        <option value="1000 HORAS">1000 HORAS</option>
                                        <option value="2000 HORAS">2000 HORAS</option>
                                        <option value="4000 HORAS">4000 HORAS</option>
                                        <option value="8000 HORAS">8000 HORAS</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Vida de separador</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" id="vida_de_separador" name="vida_de_separador" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Vida  de Aceite</option>
                                        <option value="1000 HORAS">1000 HORAS</option>
                                        <option value="2000 HORAS">2000 HORAS</option>
                                        <option value="4000 HORAS">4000 HORAS</option>
                                        <option value="8000 HORAS">8000 HORAS</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Engrase de Motor</span>
                                    </label>
                                    <!--input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="vida_de_engrase_motor" name="vida_de_engrase_motor"-->
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" id="vida_de_engrase_motor" name="vida_de_engrase_motor" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Engrase de Motor</option>
                                        <option value="4000 HORAS">4000 HORAS</option>
                                        <option value="6000 HORAS">6000 HORAS</option>
                                        <option value="8000 HORAS">8000 HORAS</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Regulaciones Programadas</span>
                            </label>
                            <div class="row g-9 mb-8" id="regulaciones_programadas">    
                                <div class="col-md-3 col-sm-4  fv-row" id="id_required_regulaciones_presion_carga" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required" id="" >Presión de Carga (psi)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="regulaciones_presion_carga" name="regulaciones_presion_carga"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" id="id_required_regulaciones_de_descarga" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required"  >Presión de Descarga (psi)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="regulaciones_de_descarga" name="regulaciones_de_descarga"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" id="id_required_regulaciones_de_tiempo">
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required" >Tiempo ү △</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="regulaciones_de_tiempo" name="regulaciones_de_tiempo"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" id="id_required_regulaciones_nro_arranques">
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required" >Nro. Arranques</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="regulaciones_nro_arranques" name="regulaciones_nro_arranques"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" id="id_required_regulaciones_retardo_carga">
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="" >Retardo de Carga (s)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="regulaciones_retardo_carga" name="regulaciones_retardo_carga"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" id="id_required_regulaciones_pto_de_ajuste" style="display: none;">
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Punto de Ajuste VSD (Bar)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="regulaciones_pto_de_ajuste" name="regulaciones_pto_de_ajuste"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Temperaturas y Presiones</span>
                            </label>
                            <div class="row g-9 mb-8" id="temperaturas_y_presiones">
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Temp. Elem. 1 (°C)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="temperatura_elemento1" name="temperatura_elemento1" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Temp. Elem. 2 (°C)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="temperatura_elemento2" name="temperatura_elemento2"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Temp. Aceite (°C)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="temperatura_aceite" name="temperatura_aceite" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Presión de Aceite (PSI)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="presion_de_aceite" name="presion_de_aceite" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Presión Intermedia (PSI)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="presion_intermedia" name="presion_intermedia">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Temp. Ent, Elem. 2 (°C)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="temperatura_ent_elemento2" name="temperatura_ent_elemento2" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Temp. Sal. Aire (°C)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="temperatura_sal_aire" name="temperatura_sal_aire"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-4 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Diferencial de presión del filtro de aire</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="diferencial_presion_aire" name="diferencial_presion_aire">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-4 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Diferencial de presión del separador</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="diferencial_presion_separador" name="diferencial_presion_separador">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-4 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Temperatura ambiente</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="temperatura_ambiente" name="temperatura_ambiente">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_4" >
                        <div class="w-100" id="kt_form_input_page_4">
                            <div class="fv-row mb-10 "></div>
                            <div class="row g-9 mb-8" id="kt_list_final_images" >
                                <div class="col-md-3 col-sm-4 fv-row px-8 pt-3" id="IdUploadFinalImg" > 
                                    <input type="file" class="d-none filenameonFinalchage" id="subirFinalImg" accept=".png, .jpg, .jpeg" >
                                    <label for="subirFinalImg" class="btn btn-outline btn-outline-dashed btn-outline-default w-100 h-155px p-0 image-input" >
                                        <div class="image-input image-input-empty image-input-outline w-100 h-150px" data-kt-image-input="true" style="background-image: url({{asset('assets/media/svg/files/blank-image.svg')}})">
                                            <!--div class="image-input-wrapper w-100 h-135px "></div-->
                                            <div class="row justify-content-md-center" id="spiner_upload_final_images" style="display: none;    margin-top: 50%;">
                                                <div class="col-12 fv-row ">
                                                    <span class="indicator-progress d-block text-center" >
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_5" >
                        <div class="w-100" id="kt_form_input_page_5">
                            <div class="fv-row mb-10 "></div>
                            <div class="row g-9 mb-8" >
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Descripción de trabajo:</span>
                                    </label>
                                    <textarea type="text"  class="form-control h-300px form-control-bg fs-4 form-control-sm" id="descripcion_del_trabajo" name="descripcion_del_trabajo"  ></textarea>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Recomendaciones:</span>
                                    </label>
                                    <textarea type="text"  class="form-control h-300px form-control-bg fs-4 form-control-sm" id="recomendaciones" name="recomendaciones"  ></textarea>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Observaciones internas:</span>
                                    </label>
                                    <textarea type="text" class="form-control text-danger text-uppercase h-200px form-control-bg fs-4 form-control-sm" id="observaciones_internas" name="observaciones_internas"  ></textarea>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class="row g-9 mb-8 d-none" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Horas de viaje</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="horas_de_viaje" name="horas_de_viaje"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3  col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Horas extras</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" id="horas_extras" name="horas_extras"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_6" >
                        <div class="w-100" id="kt_form_input_page_6">
                            <div class="fv-row mb-10 "></div>
                            <div class="row g-9 mb-8">
                                <div class="col-md-12 col-sm-12 fv-row p-0">
                                    <div class="separator separator-dashed my-6"></div>
                                    <div class="col-md-9 fv-row my-5">
                                        <div class="fs-4 text-dark fw-bolder">Datos de la empresa</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 fv-row" >
                                            <table border="0" class="w-100" >
                                                <tbody>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Razón Social:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_empresa_nombre">SODEXO SAC</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5">
                                                                <div class="fw-bold text-gray-600 fs-4 ">RUC:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_ruc"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Dirección:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_empresa_direccion"></div>
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
                                                                <div class="fw-bold text-gray-600 fs-4 ">Compresor:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_marca"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Equipo modelo:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_modelo"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">N° Serie:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_nro_serie"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Tipo de Módulo:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_modulo_tipo"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Máxima Presión (psi):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_presion"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Caudal (CFM):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_caudal"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">RMP:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_rpm"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Horómetro:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_equipo_horometro"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Horas de Carga:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_horas_carga"></div>
                                                        </td>
                                                    </tr>
                                                <tbody>
                                            <table>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-6 cls_secador"></div>
                                    <div class="col-md-9 fv-row my-5 cls_secador">
                                        <div class="fs-4 text-dark fw-bolder">Secador</div>
                                    </div>
                                    <div class="row cls_secador">
                                        <div class="col-12 fv-row" >
                                            <table border="0" class="w-100" >
                                                <tbody>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Modelo:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_modelo"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Nro. de Serie:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_nro_serie"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Pto. de rocío (°C):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_punto_rocio"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 "> Voltaje:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_voltaje_amp"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Amperaje:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_amperaje"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Protección:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_proteccion"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Limpieza:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_limpieza"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Tipo de refrig.:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_tipo_refrigeracion"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-200px" >
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Nota:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_secador_nota"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-6"></div>
                                    <div class="col-md-9 fv-row my-5">
                                        <div class="fs-4 text-dark fw-bolder">Mecánicos</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 fv-row" >
                                            <table border="0" class="w-100" >
                                                <tbody>
                                                    <tr>
                                                        <td class="w-300px" > 
                                                            <div class="fv-row mx-5 ">
                                                            <div class="fw-bold text-gray-600 fs-4 ">Tipo de aceite usado:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_tipo_aceite_usado"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-300px" > 
                                                            <div class="fv-row mx-5 ">
                                                            <div class="fw-bold text-gray-600 fs-4 ">Aceite:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_aceite"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-300px" > 
                                                            <div class="fv-row mx-5 ">
                                                            <div class="fw-bold text-gray-600 fs-4 ">Estado del Separador:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_separador"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-300px" > 
                                                            <div class="fv-row mx-5 ">
                                                            <div class="fw-bold text-gray-600 fs-4 ">Estado de Fajas y Acoplamiento:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_fajas_acoplamiento"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-300px" > 
                                                            <div class="fv-row mx-5 ">
                                                            <div class="fw-bold text-gray-600 fs-4 ">  Condiciones de Limpieza del Equipo:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_de_limpieza"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-300px" > 
                                                            <div class="fv-row mx-5 ">
                                                            <div class="fw-bold text-gray-600 fs-4 ">Filtro de Aceite:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_filtro_de_aceite"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-300px" > 
                                                            <div class="fv-row mx-5 ">
                                                            <div class="fw-bold text-gray-600 fs-4 ">Filtro de Aire:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_verificacion_estado_filtro_de_aire"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-300px" > 
                                                            <div class="fv-row mx-5 ">
                                                            <div class="fw-bold text-gray-600 fs-4 ">Limpieza química de los enfriadores:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 position-relative" id="id_resumen_limpieza_enfriadores">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-300px" > 
                                                            <div class="fv-row mx-5 ">
                                                            <div class="fw-bold text-gray-600 fs-4 ">Engrase del Motor:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_engrase_de_motor"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                                    <div class="text-gray-600 fs-4">Regulaciones termostática</div>
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
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">UL1 - UL2 (Volts):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_voltaje_ul1l2">232</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">UL2 - UL3 (Volts):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_voltaje_ul2l3">23</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
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
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">L1 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_amperaje_l1">22</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">L2 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_amperaje_l2">2s3</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
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
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">F1 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_amperaje_f1">232</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">F2 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_amperaje_f2">23</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
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
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">L1 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_ventilador_01_l1"></div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">L2 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_ventilador_01_l2"></div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
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
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">L1 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_ventilador_02_l1"></div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">L2 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_medicion_ventilador_02_l2"></div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
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
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Termomagnético (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_thermomagnetico">232</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Línea a tierra (Volts):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_linea_a_tierra">23x</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Voltaje de control (Volts):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_voltaje_del_control">2s</div>
                                                </div>

                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Voltaje de módulo (Volts):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_voltaje_del_modulo">2s</div>
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
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Marca:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_i_marca">232</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Vol:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_i_voltaje">23x</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Amp:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_i_amperaje">2s</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">FS:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_i_fs">2s</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
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
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Marca:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_ii_marca">232</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Vol:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_ii_voltaje">23x</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Amp:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_ii_amperaje">2s</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">FS:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_ii_fs">2s</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
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
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Marca:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_iii_marca">232</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Vol:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_iii_voltaje">23x</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Amp:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_iii_amperaje">2s</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">FS:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_motor_electrico_iii_fs">2s</div>
                                                </div>
                                                <div class="fv-row mx-2 w-150px">
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
                                            <table border="0" class="w-100" >
                                                <tbody>
                                                    <tr>
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Vida de Aceite:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_vida_de_aceite"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Vida de fil. de aceite:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_vida_de_filtro_aceite"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Vida de fil. de aire:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_vida_de_filtro_aire"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Vida de separador:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_vida_de_separador"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Engrase de Motor:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_vida_de_engrase_motor"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-6"></div>
                                    <div class="col-md-9 fv-row my-5">
                                        <div class="fs-4 text-dark fw-bolder">Regulaciones Programadas</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 fv-row" >
                                            <table border="0" class="w-100" >
                                                <tbody>
                                                    <tr id="id_resumen_cab_regulaciones_presion_carga">
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Presión de Carga (psi):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_presion_carga"></div>
                                                        </td>
                                                    </tr>
                                                    <tr id="id_resumen_cab_regulaciones_de_descarga">
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Presión de Descarga (psi):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_de_descarga"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Tiempo ү △:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_de_tiempo"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Nro. Arranques:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_nro_arranques"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Retardo de Carga (s):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_retardo_carga"></div>
                                                        </td>
                                                    </tr>
                                                    <tr id="id_resumen_cab_regulaciones_pto_de_ajuste" >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Punto de Ajuste VSD (Bar):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_regulaciones_pto_de_ajuste"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-6"></div>
                                    <div class="col-md-9 fv-row my-5">
                                        <div class="fs-4 text-dark fw-bolder">Temperaturas y Presiones</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 fv-row" >
                                            <table border="0" class="w-100" >
                                                <tbody>
                                                    <tr >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Temp. Elem. 1 (°C):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_elemento1"></div>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Temp. Elem. 2 (°C):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_elemento2"></div>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Temp. Aceite (°C):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_aceite"></div>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Presión de Aceite (PSI):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_presion_de_aceite"></div>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Presión Intermedia (PSI):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_presion_intermedia"></div>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Temp. Ent, Elem. 2 (°C):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_ent_elemento2"></div>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Temp. Sal. Aire (°C):</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_sal_aire"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-6"></div>
                                    <div class="row">
                                        <div class="col-12 fv-row" >
                                            <table border="0" class="w-100" >
                                                <tbody>
                                                    <tr >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Diferencial de presión del filtro de aire:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_diferencial_presion_aire"></div>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Diferencial de presión del separador:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_diferencial_presion_separador"></div>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="w-250px" > 
                                                            <div class="fv-row mx-5 ">
                                                                <div class="fw-bold text-gray-600 fs-4 ">Temperatura ambiente:</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_temperatura_ambiente"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_descripcion_del_trabajo"></div>
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
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_recomendaciones"></div>
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
                                                    <div class="fw-bolder text-gray-800 fs-4 " id="id_resumen_observaciones_internas"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12  fv-row" >
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-5 w-200px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Guia de Remisión</div>
                                                </div>
                                            </div>
                                            <div id="cnt_contenerdor_guia" >
                                                <div class="kt_customer_view_payment_method" class="card-body pt-0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                            <!--FIRMA INI-->
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <img class="select-dash" src="" alt="Cliente"  style="display: none;width: 100%;" id="idFirmaCliente">
                                    <div class="d-none kt_signature_datos" data-firma="customer" id="kt_signature_customer" ></div>
                                    <button type="button" class="btn btn-sm btn-primary w-100 mt-5 fs-4 btn-option-firma" data-opt="customer" id="btnFirmaCliente" >Firma del cliente</button>
                                </div>
                                <div class="col-md-3  col-sm-4 fv-row" >
                                    <img class="select-dash" src="" alt="Técnico" style="display: none;width: 100%; " id="idFirmaTecnico" >
                                    <div class="d-none kt_signature_datos"  data-firma="technical" id="kt_signature_technican" ></div>
                                    <button type="button" class="btn btn-sm btn-primary w-100 mt-5 fs-4 btn-option-firma" data-opt="technican" id="brtnFirmaTecnico" >Firma del Tecnico</button>
                                </div>
                            </div>
                            <!--FIRMA END-->
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Nombre Cliente</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" readonly id="id_nombre_jefe_encargado" name="nombre_jefe_encargado"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row d-none" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Correo para envio de email</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" readonly id="email_conact" name="email_conact"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class="row g-9 mb-8 d-none" >
                                <div class="col-md-3 col-sm-4  fv-row" id="kt_selected_email" >
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-stack pt-10" >
                        <div class="me-2">
                            <button type="button" class="btn btn-lg btn-light-primary fs-4 me-3 btn-stepper-previous" data-kt-stepper-action="previous">
                                <span class="svg-icon svg-icon-3 me-1 indicator-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                        <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <span class="indicator-label"> Regresar</span>
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-lg btn-dark fs-4" style="display: none" disabled id="btnactualizarFinal"  >
                                <span class="indicator-label">Guardar y Enviar</span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="button" class="btn btn-lg btn-dark mx-5 fs-4" style="display: none" id="btnaGuardarSalir"  >
                                <span class="indicator-label">Guardar y Salir</span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--button type="button" class="btn btn-lg btn-dark mx-5 fs-4" style="display: none" disabled id="btnSaveData"  >
                                <span class="indicator-label"> Guardar y Salir</span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button-->
                            <button type="button" class="btn btn-lg btn-primary btn-stepper-next fs-4 " style="display: none;" disabled data-kt-stepper-action="next">
                                <span class="indicator-label"> Continuar</span>
                                <span class="svg-icon svg-icon-3 ms-1 me-0 indicator-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <span class="indicator-progress">Espere por favor...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body py-3" id="kt_modal_create_secador" style="display: none" >
            <div class="stepper stepper-links d-flex flex-column" >
                <div class="stepper-nav justify-content-between py-2">
                    <div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_secador_content_1">
                        <h3 class="stepper-title">Paso 1</h3>
                    </div>
                    <div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_secador_content_2">
                        <h3 class="stepper-title">Paso 2</h3>
                    </div>
                    <!--div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_content_3">
                        <h3 class="stepper-title">Paso 3</h3>
                    </div-->
                    <div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_secador_content_3">
                        <h3 class="stepper-title">Paso 3</h3>
                    </div>
                    <!--div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_content_5">
                        <h3 class="stepper-title">Paso 5</h3>
                    </div-->
                    <div class="stepper-item me-5 me-md-15 cls_step_2" style="display: none;" data-kt-stepper-element="nav" id="page_secador_content_4">
                        <h3 class="stepper-title">Paso final</h3>
                    </div>
                </div>
                <form class="" novalidate="novalidate" id="kt_modal_create_secador_stepper_form">
                    
                    <div data-kt-stepper-element="content" id="page_secador_1">
                        <div class="w-100" id="kt_secador_form_input_page_1">
                            <div class="fv-row mb-10 "></div>
                            <div class="row g-9 mb-8" id="kt_secador_list_images" >                     
                                <div class="col-md-3 col-sm-4 fv-row px-8 pt-3" id="IdsecadorUploadImg" > 
                                    <input type="file" class="d-none filenameonsecadorchage" id="subirsecadorImg" accept=".png, .jpg, .jpeg" >
                                    <label for="subirsecadorImg" class="btn btn-outline btn-outline-dashed btn-outline-default w-100 h-155px p-0 image-input" >
                                        <div class="image-input image-input-empty image-input-outline w-100 h-150px" data-kt-image-input="true" style="background-image: url({{asset('assets/media/svg/files/blank-image.svg')}})">
                                            <!--div class="image-input-wrapper w-100 h-135px "></div-->
                                            <div class="row justify-content-md-center" id="spiner-secador-upload-images" style="display: none;    margin-top: 50%;">
                                                <div class="col-12 fv-row ">
                                                    <span class="indicator-progress d-block text-center" >
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                    </label>
                                </div>
                            </div>
                            <div class="row g-9 mb-8 d-none" id="kt_delete_archivos_guardados" >

                            </div>
                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_secador_2" >
                        <div class="w-100" id="kt_secador_form_input_page_2" >
                            <div class="fv-row mb-10 "></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Datos de cliente</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">OT</span>
                                    </label>
                                    <input type="text" id="secador_NumOT" name="secador_NumOT" disabled class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Reporte Serie</span>
                                    </label>
                                    <input type="text" id="secador_service_report_number" name="secador_service_report_number" value="004" disabled class="form-control form-control-bg fs-4 form-control-sm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Razón Social</span>
                                    </label>
                                    <input type="text" id="secador_empresa_nombre" name="secador_empresa_nombre" disabled class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required"> RUC</span>
                                    </label>
                                    <input type="text" id="secador_ruc" name="secador_ruc" disabled class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Local</span>
                                    </label>
                                    <input type="text" id="secador_local_nombre"  disabled name="secador_local_nombre" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-12 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Dirección</span>
                                    </label>
                                    <input type="text" id="secador_empresa_direccion" name="secador_empresa_direccion" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                
                            </div>
                           
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Servicio</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Seleccione Técnico 1</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="secador_id_tecnico_01" name="secador_Tecnico1_DNI" data-kt-select2="true" data-placeholder="Seleccionar técnico"  data-allow-clear="false">
                                        <option selected value="{{ session()->get("Codigo")  }}">{{ session()->get("Nombre")  }}</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required cls_required_tec_2">Seleccione Técnico 2</span> 
                                    </label>
                                    <input type="hidden" value="0" id="secador_id_obl" name="secador_id_obl">
                                    <input type="hidden" value="" id="secador_dni_teccnico" name="secador_dni_teccnico">
                                    <select disabled class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="secador_id_tecnico_02" name="secador_Tecnico2_DNI" data-kt-select2="true" data-placeholder="Seleccione técnico"  data-allow-clear="false">
                                        <option value="0">Seleccione técnico</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Tipo de Servicio</span>
                                    </label>
                                    <input type="text" disabled id="secador_TipoServicio" name="secador_TipoServicio" class="form-control form-control-bg fs-4 form-control-sm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row d-none " >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Tipo de Servicio Cotización</span>
                                    </label>
                                    <input type="text" id="secador_tipo_servicio_cotizacion" name="secador_tipo_servicio_cotizacion" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Fecha de servicio</span>
                                    </label>
                                    @if ($compact["opcion"]==="start-service")
                                        <input type="text" disabled id="service_secador_show_fecha1" name="service_secador_show_fecha1" value="{{date("d-m-Y")}}"  class="form-control form-control-bg fs-4 form-control-sm">
                                        <input type="text" disabled id="service_secador_fecha"      name="service_secador_fecha"      value="{{date("Y-m-d")}}" class="form-control form-control-bg fs-4 form-control-sm d-none" >
                                    @else
                                        <input type="text" disabled id="service_secador_show_fecha2" name="service_secador_show_fecha2" class="form-control form-control-bg fs-4 form-control-sm" >
                                        <select id="service_secador_fecha" name="service_secador_fecha"  class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" data-kt-select2="true" data-placeholder="Seleccione fecha de servicio"  data-allow-clear="false">
                                            <option value="0">Seleccione fecha de servicio</option>
                                        </select>
                                    @endif
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Equipo</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Secador</span>
                                    </label>
                                    <input type="hidden" id="secador_Equipo_Id"  name="secador_Equipo_Id" >
                                    <input type="text" disabled id="secador_Equipo"  name="secador_Equipo"  class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" > 
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Equipo Referencia</span>
                                    </label>
                                    <input type="text" disabled id="secador_equipo_referencia" name="secador_equipo_referencia" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Equipo modelo</span>
                                    </label>
                                    <input type="text" disabled id="secador_Modelo" name="secador_Modelo" class="form-control form-control-bg fs-4 form-control-sm" >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">N° Serie</span>
                                    </label>
                                    <input type="text" disabled id="secador_Serie" name="secador_Serie" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Máxima Presión (psi)</span> 
                                    </label>
                                    <input type="text" id="secador_PresMax" name="secador_PresMax" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                
                                <div class="col-md-3 col-sm-4  fv-row d-none" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Horómetro (horas)</span>
                                    </label>
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2"  id="id_secador_select_horometro" name="id_select_horometro">
                                        <option value="0">Seleccionar</option>
                                        <option value="0" data-opt="1">INGRESAR HORÓMETRO</option>
                                        <option selected value="MALOGRADO" data-opt="0">MALOGRADO</option>
                                        <option value="APAGADO" data-opt="0">APAGADO</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row">
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Horómetro (horas)</span>
                                    </label>
                                    <input type="number" id="secador_Horometro" name="secador_Horometro" class="form-control form-control-bg fs-4 form-control-sm"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-12 fv-row d-none">
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="" id="id_secador_last_horometro" >Obs. Último horómetro </span>
                                    </label>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Placa</span>
                                    </label>
                                    <input type="text" id="secador_Placa" name="secador_Placa" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Tipo de control</span>
                                    </label>
                                    <input type="text" id="secador_TipoControl" name="secador_TipoControl" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Voltaje de control</span>
                                    </label>
                                    <input type="text" id="secador_VoltControl" name="secador_VoltControl" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Motor Compresor:</span>
                            </label>
                            <div class="row g-9 mb-8 "  >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_mc_cheq_presion_succion_descarga" name="secador_mc_cheq_presion_succion_descarga"/>
                                        <label class="form-check-label" for="secador_mc_cheq_presion_succion_descarga">
                                            <div class="text-gray-600 fs-4 text-capitalize">checkeo de presiones de succion y descarga</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_mc_cheq_terminal_electrico" name="secador_mc_cheq_terminal_electrico"/>
                                        <label class="form-check-label" for="secador_mc_cheq_terminal_electrico">
                                            <div class="text-gray-600 fs-4 text-capitalize">checkeo de terminales electrico</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_mc_cheq_valvulas_servicio" name="secador_mc_cheq_valvulas_servicio"/>
                                        <label class="form-check-label" for="secador_mc_cheq_valvulas_servicio">
                                            <div class="text-gray-600 fs-4 text-capitalize">Verficación de válvulas de servicio</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_mc_cheq_posibles_fugas_gas_refrig" name="secador_mc_cheq_posibles_fugas_gas_refrig"/>
                                        <label class="form-check-label" for="secador_mc_cheq_posibles_fugas_gas_refrig">
                                            <div class="text-gray-600 fs-4 text-capitalize">checkeo de posibles fugas de gas refrigerante</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_mc_cheq_cojinetes_amort_perno_arand" name="secador_mc_cheq_cojinetes_amort_perno_arand"/>
                                        <label class="form-check-label" for="secador_mc_cheq_cojinetes_amort_perno_arand">
                                            <div class="text-gray-600 fs-4 text-capitalize">Chequeo cojinetes de amortiguación</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Unidad de Condensación:</span>
                            </label>
                            <div class="row g-9 mb-8 "  >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_uc_limpieza_serpentin_condensacion" name="secador_uc_limpieza_serpentin_condensacion"/>
                                        <label class="form-check-label" for="secador_uc_limpieza_serpentin_condensacion">
                                            <div class="text-gray-600 fs-4 text-capitalize">limpieza deserpentin de condensacion</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_uc_verif_motor_ventil_rodam_empel" name="secador_uc_verif_motor_ventil_rodam_empel"/>
                                        <label class="form-check-label" for="secador_uc_verif_motor_ventil_rodam_empel">
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
                                                <input class="form-check-input me-3" type="checkbox" value="1" id="secador_uc_verif_control_presion_alta" name="secador_uc_verif_control_presion_alta">
                                                <label class="form-check-label" for="secador_uc_verif_control_presion_alta">
                                                    <div class="text-gray-600 fs-4">Alta</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="fv-row mx-2 w-150px">
                                            <div class="form-check form-check-custom ">
                                                <input class="form-check-input me-3 " type="checkbox" value="1" id="secador_uc_verif_control_presion_baja" name="secador_uc_verif_control_presion_baja">
                                                <label class="form-check-label" for="secador_uc_verif_control_presion_baja">
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
                            <div class="row g-9 mb-8 "  >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_ue_verif_aislamiento_termico" name="secador_ue_verif_aislamiento_termico"/>
                                        <label class="form-check-label" for="secador_ue_verif_aislamiento_termico">
                                            <div class="text-gray-600 fs-4 text-capitalize">verificacion de aislamiento termico</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_ue_verif_ingreso_salida_aire" name="secador_ue_verif_ingreso_salida_aire"/>
                                        <label class="form-check-label" for="secador_ue_verif_ingreso_salida_aire">
                                            <div class="text-gray-600 fs-4 text-capitalize">verificacion del ingreso y salida del aire comprimido</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_ue_verif_limpieza_trampa" name="secador_ue_verif_limpieza_trampa"/>
                                        <label class="form-check-label" for="secador_ue_verif_limpieza_trampa">
                                            <div class="text-gray-600 fs-4 text-capitalize">verificacion y limpieza de la trampa de drenaje de consesado</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Gabinete y partes metálicas:</span>
                            </label>
                            <div class="row g-9 mb-8 "  >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_gpm_limpieza_interior_exterior" name="secador_gpm_limpieza_interior_exterior"/>
                                        <label class="form-check-label" for="secador_gpm_limpieza_interior_exterior">
                                            <div class="text-gray-600 fs-4 text-capitalize">limpiexa interior y exteriormente</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_gpm_limpieza_pintado" name="secador_gpm_limpieza_pintado"/>
                                        <label class="form-check-label" for="secador_gpm_limpieza_pintado">
                                            <div class="text-gray-600 fs-4 text-capitalize">lijado, pintado aquellas partes que presentan signos de corrosion</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >CIRCUITO DE REFRIGERACION:</span>
                            </label>

                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Medición de Voltaje:</span>
                            </label>
                            <div class="row g-9 mb-8">
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Unidad cargada con gas Refrig.</span>
                                    </label>
                                    <!--CUANDO ES NO EL CAMPO secador_cr_und_gas_refrigerante ES 0, SI HAY OTRO DATO GUARDAR EL VALOR EN CR_UND_GAS_REFRIGERANTE_TIPO  -->
                                    <select class="form-select form-select-bg fs-4 form-select-sm mb-2" data-hide-search="true" id="secador_cr_und_gas_refrigerante" name="secador_cr_und_gas_refrigerante" data-kt-select2="true" data-placeholder="Selecciones una apción"  data-allow-clear="false">
                                        <option value="0">Selecciones una apción</option>
                                        <option value="R-134A">R-134A</option>
                                        <option value="R-22">R-22</option>
                                        <option value="R-404A">R-404A</option>
                                        <option value="R-410A">R-410A</option>
                                        <option value="R-513A">R-513A</option>
                                    </select>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Fase 1 (Volt.)</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_voltaje_fase1" name="secador_cr_med_voltaje_fase1" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Fase 2 (Volt.)</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_voltaje_fase2" name="secador_cr_med_voltaje_fase2" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Fase 3 (Volt.)</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_voltaje_fase3" name="secador_cr_med_voltaje_fase3" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>

                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Medición de Amperaje de Arranque:</span>
                            </label>

                            <div class="row g-9 mb-8">
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">L1 (Amps):</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_amperaje_arranque_l1" name="secador_cr_med_amperaje_arranque_l1" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">L2 (Amps):</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_amperaje_arranque_l2" name="secador_cr_med_amperaje_arranque_l2" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">L3 (Amps):</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_amperaje_arranque_l3" name="secador_cr_med_amperaje_arranque_l3" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Medición de Amperaje de Trabajo:</span>
                            </label>

                            <div class="row g-9 mb-8">
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">L1 (Amps):</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_amperaje_trabajo_l1" name="secador_cr_med_amperaje_trabajo_l1" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">L2 (Amps):</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_amperaje_trabajo_l2" name="secador_cr_med_amperaje_trabajo_l2" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">L3 (Amps):</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_amperaje_trabajo_l3" name="secador_cr_med_amperaje_trabajo_l3" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Medición de presiones de gas Refrig.:</span>
                            </label>
                            <div class="row g-9 mb-8">
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Reposo:</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_pres_gasrefri_reposo" name="secador_cr_med_pres_gasrefri_reposo" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">PSI Alta:</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_pres_gasrefri_reposo_psialta" name="secador_cr_med_pres_gasrefri_reposo_psialta" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">PSI Baja:</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_pres_gasrefri_reposo_psibaja" name="secador_cr_med_pres_gasrefri_reposo_psibaja" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Medición de presiones de gas Refrig.:</span>
                            </label>
                            <div class="row g-9 mb-8">
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Trabajo:</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_pres_gasrefri_trabajo" name="secador_cr_med_pres_gasrefri_trabajo" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">PSI Alta:</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_pres_gasrefri_trabajo_psialta" name="secador_cr_med_pres_gasrefri_trabajo_psialta" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">PSI Baja:</span>
                                    </label>
                                    <input type="text" id="secador_cr_med_pres_gasrefri_trabajo_psibaja" name="secador_cr_med_pres_gasrefri_trabajo_psibaja" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>

                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Regulación de punto de rocio:</span>
                            </label>
                            <div class="row g-9 mb-8">
                                <div class="col-12  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_cr_reg_valvula_expansion" name="secador_cr_reg_valvula_expansion"/>
                                        <label class="form-check-label" for="secador_cr_reg_valvula_expansion">
                                            <div class="text-gray-600 fs-4 text-capitalize">Relgulación de la válvula de expansión Termostática </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Reposo:</span>
                                    </label>
                                    <input type="text" id="secador_cr_reg_pto_rocio_reposo" name="secador_cr_reg_pto_rocio_reposo" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Operación:</span>
                                    </label>
                                    <input type="text" id="secador_cr_reg_pto_rocio_operacion" name="secador_cr_reg_pto_rocio_operacion" class="form-control form-control-bg fs-4 form-control-sm">
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-4 fw-bold mb-8">
                                <span >Verficación de tablero eléctrico del equipo:</span>
                            </label>
                           
                            <div class="row g-9 mb-8 "  >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_vtee_contactor_termag" name="secador_vtee_contactor_termag"/>
                                        <label class="form-check-label" for="secador_vtee_contactor_termag">
                                            <div class="text-gray-600 fs-4 text-capitalize">Contactor termomagnético</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_vtee_pulsador_arran_parada" name="secador_vtee_pulsador_arran_parada"/>
                                        <label class="form-check-label" for="secador_vtee_pulsador_arran_parada">
                                            <div class="text-gray-600 fs-4 text-capitalize">Pulsador de arranque y parada</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_vtee_luz_piloto" name="secador_vtee_luz_piloto"/>
                                        <label class="form-check-label" for="secador_vtee_luz_piloto">
                                            <div class="text-gray-600 fs-4 text-capitalize">Luz Piloto</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_vtee_rele_protector_sobrecarga" name="secador_vtee_rele_protector_sobrecarga"/>
                                        <label class="form-check-label" for="secador_vtee_rele_protector_sobrecarga">
                                            <div class="text-gray-600 fs-4 text-capitalize">Rele protector de sobrecarga</div>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_vtee_control_temperatura" name="secador_vtee_control_temperatura"/>
                                        <label class="form-check-label" for="secador_vtee_control_temperatura">
                                            <div class="text-gray-600 fs-4 text-capitalize">Control de Temperatura</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <div class="form-check form-check-custom ">
                                        <input class="form-check-input me-3 " value=""  type="checkbox" id="secador_vtee_otros" name="secador_vtee_otros"/>
                                        <label class="form-check-label" for="secador_vtee_otros">
                                            <div class="text-gray-600 fs-4 text-capitalize">Otros</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class='separator separator-dashed my-5'></div>
                            <div class="row g-9 mb-8" >
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Descripción de trabajo:</span>
                                    </label>
                                    
                                    <textarea type="text"  class="form-control h-300px form-control-bg fs-4 form-control-sm" id="secador_desctrab" name="secador_desctrab"  ></textarea>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Recomendaciones:</span>
                                    </label>
                                    <textarea type="text"  class="form-control h-300px form-control-bg fs-4 form-control-sm" id="secador_observac" name="secador_observac"  ></textarea>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="">Observaciones internas:</span>
                                    </label>
                                    <textarea type="text" class="form-control text-danger text-uppercase h-200px form-control-bg fs-4 form-control-sm" id="secador_observaciones_internas" name="secador_observaciones_internas"  ></textarea>
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>

                            <div  class="d-flex flex-stack pt-10" >
                                <div class="me-2"></div>
                                <div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_secador_3" >
                        <div class="w-100" id="kt_secador_form_input_page_4">
                            <div class="fv-row mb-10 "></div>
                            <div class="row g-9 mb-8" id="kt_secador_list_final_images" >
                                <div class="col-md-3 col-sm-4 fv-row px-8 pt-3" id="IdsecadorUploadFinalImg" > 
                                    <input type="file" class="d-none filenamesecadoronFinalchage" id="subirsecadorFinalImg" accept=".png, .jpg, .jpeg" >
                                    <label for="subirsecadorFinalImg" class="btn btn-outline btn-outline-dashed btn-outline-default w-100 h-155px p-0 image-input" >
                                        <div class="image-input image-input-empty image-input-outline w-100 h-150px" data-kt-image-input="true" style="background-image: url({{asset('assets/media/svg/files/blank-image.svg')}})">
                                            <!--div class="image-input-wrapper w-100 h-135px "></div-->
                                            <div class="row justify-content-md-center" id="spiner_secador_upload_final_images" style="display: none;    margin-top: 50%;">
                                                <div class="col-12 fv-row ">
                                                    <span class="indicator-progress d-block text-center" >
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_secador_4" >
                        <div class="w-100" id="kt_secador_form_input_page_4">
                            <div class="fv-row mb-10 "></div>
                            <div class="row g-9 mb-8">
                                <div class="col-md-12 col-sm-12 fv-row p-0">
                                    <div class="separator separator-dashed my-6"></div>
                                    <div class="col-md-9 fv-row my-5">
                                        <div class="fs-4 text-dark fw-bolder">Datos de la empresa</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 fv-row" >
                                            <table border="0" class="w-100" >
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
                                        <div class="col-md-12 fv-row" >
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-5 w-200px">
                                                    <div class="fw-bold text-gray-600 fs-4 ">Guia de Remisión</div>
                                                </div>
                                            </div>
                                            <div id="cnt_contenerdor_guia" >
                                                <div class="kt_customer_view_payment_method" class="card-body pt-0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--FIRMA INI-->
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <img class="select-dash" src="" alt="Cliente"  style="display: none;width: 100%;" id="idSecadorFirmaCliente">
                                    <div class="d-none kt_secador_signature_datos" data-firma="customer" id="kt_secador_signature_customer" ></div>
                                    <button type="button" class="btn btn-sm btn-primary w-100 mt-5 fs-4 btn-option-firma" data-opt="customer" id="btnFirmaCliente" >Firma del cliente</button>
                                </div>
                                <div class="col-md-3  col-sm-4 fv-row" >
                                    <img class="select-dash" src="" alt="Técnico" style="display: none;width: 100%; " id="idSecadorFirmaTecnico" >
                                    <div class="d-none kt_secador_signature_datos"  data-firma="technical" id="kt_secador_signature_technican" ></div>
                                    <button type="button" class="btn btn-sm btn-primary w-100 mt-5 fs-4 btn-option-firma" data-opt="technican" id="brtnFirmaTecnico" >Firma del Tecnico</button>
                                </div>
                            </div>
                            <!--FIRMA END-->
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Nombre Cliente</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" readonly id="id_secador_nombre_jefe_encargado" name="secador_nombre_jefe_encargado"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row d-none" >
                                    <label class="d-flex align-items-center fs-4 fw-semibold mb-2">
                                        <span class="required">Correo para envio de email</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-bg fs-4 form-control-sm" readonly id="email_secador_conact" name="email_secador_conact"  >
                                    <span class="fs-5 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class="row g-9 mb-8 d-none">
                                <div class="col-md-3 col-sm-4  fv-row" id="kt_secador_selected_email" >
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-stack pt-10" >
                        <div class="me-2">
                            <button type="button" class="btn btn-lg btn-light-primary fs-4 me-3 btn-secador-stepper-previous" data-kt-stepper-action="previous">
                                <span class="svg-icon svg-icon-3 me-1 indicator-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                        <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <span class="indicator-label"> Regresar</span>
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-lg btn-dark mx-5 fs-4" style="display: none" disabled id="btnsecadoractualizarFinal"  >
                                <span class="indicator-label">Guardar y Enviar</span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="button" class="btn btn-lg btn-dark mx-5 fs-4" style="display: none" id="btnsecadoraGuardarSalir"  >
                                <span class="indicator-label">Guardar y Salir</span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--button type="button" class="btn btn-lg btn-dark mx-5 fs-4" style="display: none" disabled id="btnsecadorSaveData"  >
                                <span class="indicator-label"> Guardar y Salir</span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button-->
                            <button type="button" class="btn btn-lg btn-primary btn-secador-stepper-next fs-4 " style="display: none;"  data-kt-stepper-action="next">
                                <span class="indicator-label"> Continuar</span>
                                <span class="svg-icon svg-icon-3 ms-1 me-0 indicator-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <span class="indicator-progress">Espere por favor...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" id="id_token" value="{{session()->get("Token")}}" >
@endsection()
@push('script')
<script src="{{asset('assets/js/signature_pad.umd.js')}}"></script>
<script src="{{asset('assets/js/appsignature.js')}}"></script>
<script src="{{asset('assets/js/reporte.js')}}"></script>
<script>
    var asset = '{{ asset('') }}'   
    var datenow1 = '{{ date("d-m-Y") }}'
    var datenow2 = '{{ date("Y-m-d") }}'
    $(document).ready(async function (){
        
    });

 </script>
@endpush