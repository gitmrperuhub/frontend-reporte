@extends('master.master')
@section('title', 'Usuarios - Ventas')
@section('contentHeaderLeft')
    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Servicios Programados
        <span class="h-20px border-gray-300 border-start mx-4"></span>
    </h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1" id="kt_seguimiento_menu" style="display: none;" >
        <li class="breadcrumb-item text-muted">
            <a href="javascript:void()" id="cliente-seguimiento" class="text-muted text-hover-primary"> </a>
        </li>
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <li class="breadcrumb-item text-muted">
            <a href="javascript:void()" id="ot-seguimiento" class="text-muted text-hover-primary"> </a>
        </li>
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <li class="breadcrumb-item text-muted">
            <a href="javascript:void()" id="modelo-seguimiento" class="text-muted text-hover-primary"> </a>
        </li>
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <li class="breadcrumb-item text-muted">
            <a href="javascript:void()" id="serie-seguimiento" class="text-muted text-hover-primary"> </a>
        </li>
    </ul>
@endsection()
@section('contentHeaderRight')
@endsection()
@section('contentModal')
<div class="modal fade" id="kt_modal_create_productos"  tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered mw-600px">
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
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 pt-15">
                <form class="form position-relative" novalidate="novalidate" id="kt_modal_create_producto_form">
                    <div class="mask-content position-absolute"></div>
                    <div class="row" >
                        <div class="col-xl-12 col-md-12 col-sm-12 mb-8 form_validate" >
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Conozco la evaluación del riesgo e instrucciones de seguridad para el trabajo y los acato ?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Conozco el contenido del permiso de trabajo (requerido por la cía o por el cliente) ylo acato?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Considero que el método de trabajo previsto es seguro?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Mi equipo de proteccion no tiene defectos ylos usaré de manera correcta ?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿He probado e inspeccionado las herramienta yes seguro su uso?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Cuento con suficiente iluminación yel lugar de trabajo está limpio ?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Conozco las salidas de emergencia/rutas de escape mas cercana y puntos de reunión?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Ubico el extintor mas cercano y los puntos de reunion?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿He consultado con otros cuyo trabajo se vea impactado por mi intervención o viceversa?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Conozco sobre riesgos químicos e instrucciones de seguridad relacionadas ylas acataré?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Conozco las fuentes de energia peligrosa y acataré el procedimiento de bloqueo?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Conozco las instrucciones de trabajo de altura y las acataré?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Conozco las instrucciones para el manejo de materiales y las acataré?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Conozco las instrucciones de espacios confinados ylos acataré?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
                                        <label class="form-check-label" for="">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="d-flex justify-content-between ">
                                <div class="fv-row ">
                                    <span class="fw-bold fs-6">¿Considero que todas las medidas de seguridad han sido tomadas en mi area de trabajo?</span>
                                </div>
                                <div class="fv-row  each_chk">
                                    <div class="form-check form-check-custom ">
                                        <input disabled checked class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox"  id="kt"/>
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
                    <button type="reset" class="btn btn-light me-3 cls_modal_close_condition">
                        Cancelar
                    </button>

                    <button type="button" id="kt_modal_accept_condition" class="btn btn-primary">
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
                            <button type="button" class="button btn btn-sm btn-primary clear" data-action="clear">Limpiar</button>
                            <button type="button" class="button btn btn-sm btn-primary btn-close-signature" >Cerrar</button>
                            <button type="button" class="button btn btn-sm btn-primary" id="IdSavedatatoDataURL" >
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
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 pt-15">
                <div class="mask-content position-absolute"></div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 form_validate">
                        <div class="d-flex justify-content-between ">
                            <div class="fv-row mx-10">
                                <input type="text" class="fw-bold fs-6 d-block w-200px" id="add_email_contact" name="add_email_contact" value="demo@cliente.pe" style="padding:0;border:0;" >
                                <input type="text" class="fw-bold text-gray-600 w-200px" id="add_name_contact" name="add_name_contact" value="CLIENTE 1" style="padding:0;border:0;">
                            </div>
                            <div class="fv-row mx-10 each_chk">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox" id="add_chk_contact" name="add_chk_contact"/>
                                    <label class="form-check-label" for="add_chk_contact">
                                        <div class="text-gray-600"></div>
                                    </label>
                                </div>
                            </div>
                            <div class="fv-row mx-10 " >
                                <button type="button" class="btn btn-icon btn-primary" id="id_save_add_email">
                                    +
                                </button>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-2"></div>
                    </div>
                </div>
                <div class="row" style="height: 300px;overflow: auto;" >
                    
                    <div class="col-xl-12 col-md-12 col-sm-12 form_validate" id="kt_listar_correo_contacto" >
                    </div>
                </div>
               
                <div class="text-center">
                    <button type="reset" id="" class="btn btn-light me-3 modal_close_correo_contact">
                        Cancelar
                    </button>

                    <button type="button" class="btn btn-primary"  id="modal_select_correc_contact" >
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
                <h2>Seleccione jefe de area</h2>
                <button type="button" class="btn btn-sm btn-icon btn-primary b-radius-50 modal_close_jefe_contact "  >
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 pt-15">
                <div class="mask-content position-absolute"></div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 form_validate">
                        <div class="d-flex justify-content-between">
                            <div class="fv-row mx-10">
                                <input type="text" value="JEFE 1" class="fw-bold fs-6 d-block w-200px" id="add_jefe_contact" name="add_jefe_contact" style="padding:0;border:0;" >
                            </div>
                            <!--div class="fv-row mx-10 each_chk">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" name="user_jefe_chk" type="radio" value="" id="kt_modal_jefe_contact_00"/>
                                    <label class="form-check-label" for="kt_modal_jefe_contact_00">
                                        <div class="text-gray-600"></div>
                                    </label>
                                </div>
                            </div-->
                            <div class="fv-row mx-10 " >
                                <button type="button" class="btn btn-icon btn-primary" id="id_save_add_jefe_contact">
                                    +
                                </button>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-2"></div>
                    </div>
                </div>
                <div class="row" style="height: 300px;overflow: auto;" >
                    <div class="col-xl-12 col-md-12 col-sm-12 form_validate" id="kt_listar_jefe_contact" >
                    </div>
                </div>
                <div class="text-center">
                    <button type="reset" id="" class="btn btn-light me-3 modal_close_jefe_contact">
                        Cancelar
                    </button>
                    <button type="button" class="btn btn-primary"  id="modal_select_jefe_contact" >
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
@endsection()
@section('content')
    <input type="hidden" id="user_sesion" name="user_sesion" value="{{ session()->get("Codigo")  }}" >
    <input type="hidden" id="inicio_contador_imag" name="inicio_contador_imag" value="0" >
    <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">
            
        </div>
    </div>

    <div class="card mb-5 mb-xl-8">
    
        <div class="card-body py-3">
            
            <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_campaign_stepper">
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
                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_2" >
                        <div class="w-100" id="kt_form_input_page_2" >
                            <div class="fv-row mb-10 "></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span >Datos de cliente</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">OT</span>
                                    </label>
                                    <input type="text" id="service_ot" name="reporte_orden_trabajo" disabled class="form-control form-control-solid form-control-sm" placeholder="Reporte Serie" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Reporte Serie</span>
                                    </label>
                                    <input type="text" id="service_report_number" name="service_report_number" value="004" disabled class="form-control form-control-solid form-control-sm" placeholder="Serie">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Razón Social</span>
                                    </label>
                                    <input type="text" id="service_razon_social" name="empresa_nombre" disabled class="form-control form-control-solid form-control-sm" placeholder="Razón Social" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required"> RUC</span>
                                    </label>
                                    <input type="text" id="service_ruc" name="ruc" disabled class="form-control form-control-solid form-control-sm" placeholder="RUC" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Dirección</span>
                                    </label>
                                    <input type="text" id="service_direccion" name="empresa_direccion" class="form-control form-control-solid form-control-sm" placeholder="Ingrese una dirección" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required"> Teléfono</span>
                                    </label>
                                    <input type="number" id="service_tel_cliente" name="empresa_telefono" class="form-control form-control-solid form-control-sm" placeholder="Ingrese Teléfono">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Email</span>
                                    </label>
                                    <input type="email" id="service_email_cliente" name="empresa_email" class="form-control form-control-solid form-control-sm" placeholder="Ingrese email" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-5 fw-bold mb-8">
                                <span >Servicio</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Seleccione Técnico 1</span>
                                    </label>
                                   
                                    <select class="form-select form-select-solid form-select-sm mb-2" data-hide-search="true" id="servicio_tenico1" name="id_tecnico_01" data-kt-select2="true" data-placeholder="Seleccionar una opción"  data-allow-clear="false">
                                        <option selected value="{{ session()->get("Codigo")  }}">{{ session()->get("Nombre")  }}</option>
                                    </select>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Seleccione Técnico 2</span> 
                                    </label>
                                    <input type="hidden" value="0" id="id_obl" name="id_obl">
                                    <input type="hidden" value="" id="dni_teccnico" name="dni_teccnico">
                                    <select class="form-select form-select-solid form-select-sm mb-2" data-hide-search="true" id="servicio_tenico2" name="id_tecnico_02" data-kt-select2="true" data-placeholder="Seleccionar una opción"  data-allow-clear="false">
                                        <option value="">Seleccione técnico</option>
                                    </select>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Tipo de Servicio</span>
                                    </label>
                                    <input type="text" id="service_tipo_service" name="tipo_servicio_desc" class="form-control form-control-solid form-control-sm" placeholder="Tipo de servicio" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                               
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Fecha de servicio</span>
                                    </label>
                                    <input type="text" disabled id="service_fecha" value="{{date("Y-m-d")}}" name="reporte_fecha_servicio" class="form-control form-control-solid form-control-sm" placeholder="ingrese fecha de servicio" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-5 fw-bold mb-8">
                                <span >Equipo</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Compresor</span>
                                    </label>
                                    <input type="hidden" id="service_equipo_id"  name="equipo_id" >
                                    <input type="text" id="service_equipo" name="equipo_referencia" class="form-control form-control-solid form-control-sm" placeholder="Modelo compresor" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Equipo modelo</span>
                                    </label>
                                    <input type="text" id="service_equipo_modelo" name="equipo_modelo" class="form-control form-control-solid form-control-sm" placeholder="Ingrese equipo modelo" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">N° Serie</span>
                                    </label>
                                    <input type="text" id="service_equipo_serie" name="equipo_nro_serie" class="form-control form-control-solid form-control-sm" placeholder="Ingrese serie" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Modelo tipo</span>
                                    </label>
                                    <input type="text" id="service_equipo_modelo_tipo" name="equipo_modulo_tipo" class="form-control form-control-solid form-control-sm" placeholder="Ingrese modelo tipo" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Presión (psi)</span>
                                    </label>
                                    <input type="text" id="service_equipo_presion" name="equipo_presion" class="form-control form-control-solid form-control-sm" placeholder="Ingrese presión" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Caudal</span>
                                    </label>
                                    <input type="text" id="service_equipo_caudal" name="equipo_caudal" class="form-control form-control-solid form-control-sm" placeholder="Ingrese caudal">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">RPM</span>
                                    </label>
                                    <input type="text" id="service_equipo_rpm" name="equipo_rpm" class="form-control form-control-solid form-control-sm" placeholder="ingrese RPM">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Horómetro (horas)</span>
                                    </label>
                                    <input type="number" id="service_equipo_horometro" name="equipo_horometro" class="form-control form-control-solid form-control-sm" placeholder="Ingrese horómetro " >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="form-check form-check-custom form-check-solid fw-bold mb-8">
                                <input class="form-check-input "  type="checkbox" id="id_tecnologia_vsd" name=""/>
                                <label class="form-check-label d-flex align-items-center fs-5 fw-bold" for="id_tecnologia_vsd">
                                    <span >Tecnología VSD</span>
                                </label>
                            </div>
                            <div class="row g-9 mb-8 cls_tecnologia_vsd" style="display: none;" >
                                <div class="col-12col-sm-4 fv-row" >
                                    <div class="d-flex justify-content-start">
                                        <div class="fv-row mx-10 w-150px">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3 " value="H" checked type="radio" id="id_Tecnologis_vsd_horas" name="id_Tecnologis_vsd"/>
                                                <label class="form-check-label" for="id_Tecnologis_vsd_horas">
                                                    <div class="text-gray-600">Uso en horas</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="fv-row mx-10">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3 " value="%" type="radio" id="id_Tecnologis_vsd_porc" name="id_Tecnologis_vsd"/>
                                                <label class="form-check-label" for="id_Tecnologis_vsd_porc">
                                                    <div class="text-gray-600">Uso en %</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">VSD 00-20 % rpm <span class="tipo_tec_vsd" >(h)</span> </span>
                                    </label>
                                    <input type="text" maxlength="2" data-number='true' id="vsd_00_20rpm" name="vsd_00_20rpm" class="form-control form-control-solid form-control-sm" placeholder="Ingrese VSD 00-20" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">VSD 20-40 % rpm <span class="tipo_tec_vsd" >(h)</span></span>
                                    </label>
                                    <input type="text" maxlength="2" data-number='true' id="vsd_20_40rpm" name="vsd_20_40rpm" class="form-control form-control-solid form-control-sm" placeholder="Ingrese VSD 20-40" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">VSD 40-60 % rpm <span class="tipo_tec_vsd" >(h)</span></span>
                                    </label>
                                    <input type="text" maxlength="2" data-number='true' id="vsd_40_60rpm" name="vsd_40_60rpm" class="form-control form-control-solid form-control-sm" placeholder="Ingrese VSD 40-60" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">VSD 60-80 % rpm <span class="tipo_tec_vsd" >(h)</span></span>
                                    </label>
                                    <input type="text" maxlength="2" data-number='true' id="vsd_60_80rpm" name="vsd_60_80rpm" class="form-control form-control-solid form-control-sm" placeholder="Ingrese VSD 60-80" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">VSD 80-100 % rpm <span class="tipo_tec_vsd" >(h)</span></span>
                                    </label>
                                    <input type="text" maxlength="2" data-number='true' id="vsd_80_100rpm" name="vsd_80_100rpm" class="form-control form-control-solid form-control-sm" placeholder="Ingrese VSD 80-100" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-5 fw-bold mb-8">
                                <span >Secador</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Modelo</span>
                                    </label>
                                    <input type="text" id="service_secador_modelo" name="secador_modelo" class="form-control form-control-solid form-control-sm" placeholder="Ingrese modelo" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Nro. de Serie</span>
                                    </label>
                                    <input type="text" id="service_secador_nro_serie" name="secador_nro_serie" class="form-control form-control-solid form-control-sm" placeholder="Ingrese serie" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Pto. de rocío</span>
                                    </label>
                                    <input type="text" id="service_secador_punto_rocio" name="secador_punto_rocio" class="form-control form-control-solid form-control-sm" placeholder="Ingrese pto de rocio" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Volt. /Amp.</span>
                                    </label>
                                    <input type="text" id="service_secador_voltaje_amp" name="secador_voltaje_amp" class="form-control form-control-solid form-control-sm" placeholder="Ingrese Volt." >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Protección</span>
                                    </label>
                                    <input type="text" id="service_secador_proteccion" name="secador_proteccion" class="form-control form-control-solid form-control-sm" placeholder="Ingrese protección">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Limpieza</span>
                                    </label>
                                    <input type="text" id="service_secador_limpieza" name="secador_limpieza" class="form-control form-control-solid form-control-sm" placeholder="Ingrese limpieza" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Tipo de refrig.</span>
                                    </label>
                                    <input type="text" id="service_secador_tipo_refrigeracion" name="secador_tipo_refrigeracion" class="form-control form-control-solid form-control-sm" placeholder="Ingrese Tipo ref." >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-12  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Nota</span>
                                    </label>
                                    <textarea type="text" id="service_secador_nota" name="secador_nota" class="form-control form-control-solid form-control-sm" placeholder="Ingrese una nota" ></textarea>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
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
                            <label class="d-flex align-items-center fs-5 fw-bold mb-8">
                                <span >Mecanicos</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Tipo de aceite usado</span>
                                    </label>
                                    <select class="form-select form-select-solid form-select-sm mb-2" data-hide-search="true" id="verificacion_tipo_aceite_usado" name="verificacion_tipo_aceite_usado" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione tipo de aceite usado</option>
                                        <option value="NDURANCE"> NDURANCE </option>
                                        <option value="SYNTHETIC RS ULTRA">SYNTHETIC RS ULTRA</option>
                                        <option value=" SYNTHETIC RS EXTEND DUTY ">SYNTHETIC RS EXTEND DUTY</option>
                                    </select>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Aceite</span>
                                    </label>
                                    <select class="form-select form-select-solid form-select-sm mb-2" data-hide-search="true" id="verificacion_estado_aceite" name="verificacion_estado_aceite" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Aceite</option>
                                        <option value="NUEVO">NUEVO</option>
                                        <option value="OPERATIVO">OPERATIVO</option>
                                        <option value="SE CAMBIÓ">SE CAMBIÓ</option>
                                    </select>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Estado del Separador</span>
                                    </label>
                                    <select class="form-select form-select-solid form-select-sm mb-2" data-hide-search="true" id="verificacion_estado_separador" name="verificacion_estado_separador" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Estado del Separador</option>
                                        <option value="NUEVO">NUEVO</option>
                                        <option value="OPERATIVO">OPERATIVO</option>
                                        <option value="SE CAMBIÓ">SE CAMBIÓ</option>
                                    </select>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Estado de Fajas y Acoplamiento</span>
                                    </label>
                                    <select class="form-select form-select-solid form-select-sm mb-2" data-hide-search="true" id="verificacion_estado_fajas_acoplamiento" name="verificacion_estado_fajas_acoplamiento" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione estado de fajas</option>
                                        <option value="NUEVO">NUEVO</option>
                                        <option value="OPERATIVO">OPERATIVO</option>
                                        <option value="SE CAMBIÓ">SE CAMBIÓ</option>
                                        <option value="N/T">N/T</option>
                                    </select>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Estado de Limpieza</span>
                                    </label>
                                    <textarea type="text"  class="form-control form-control-solid form-control-sm" id="verificacion_estado_de_limpieza" name="verificacion_estado_de_limpieza" placeholder="Target title" name="target_title"></textarea>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Filtro de Aceite</span>
                                    </label>
                                    <textarea type="text"  class="form-control form-control-solid form-control-sm" id="verificacion_estado_filtro_de_aceite" name="verificacion_estado_filtro_de_aceite" placeholder="Target title" name="target_title"></textarea>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Filtro de Aire</span>
                                    </label>
                                    <textarea type="text"  class="form-control form-control-solid form-control-sm" id="verificacion_estado_filtro_de_aire" name="verificacion_estado_filtro_de_aire" placeholder="Target title" name="target_title"></textarea>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span > Medición de Voltaje</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">UL1 - UL2 (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="medicion_voltaje_ul1l2" name="medicion_voltaje_ul1l2" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">UL2 - UL3 (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="medicion_voltaje_ul2l3" name="medicion_voltaje_ul2l3" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required"> UL1 - UL3 (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="medicion_voltaje_ul1l3" name="medicion_voltaje_ul1l3" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span >Medición del Amperaje</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required"> L1 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="medicion_amperaje_l1" name="medicion_amperaje_l1" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">L2 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="medicion_amperaje_l2" name="medicion_amperaje_l2" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">L3 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="medicion_amperaje_l3" name="medicion_amperaje_l3" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span >Amperaje de Fase y Ventiladores</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">F1 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="medicion_amperaje_f1" name="medicion_amperaje_f1" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">F2 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="medicion_amperaje_f2" name="medicion_amperaje_f2" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">F3 (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="medicion_amperaje_f3" name="medicion_amperaje_f3" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span >Termomagnético</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Termomagnético (Amps)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="thermomagnetico" name="thermomagnetico" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Línea a tierra (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="linea_a_tierra" name="linea_a_tierra" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Voltaje de control y de módulo (Volts)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="voltaje_del_modulo" name="voltaje_del_modulo" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span >Motor Eléctrico I</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Marca</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_i_marca" name="motor_electrico_i_marca" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Volt</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_i_voltaje" name="motor_electrico_i_voltaje"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Amp</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_i_amperaje" name="motor_electrico_i_amperaje"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Fs</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_i_fs" name="motor_electrico_i_fs"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">RPM</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_i_rpm" name="motor_electrico_i_rpm"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span >Motor Eléctrico II</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Marca</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_ii_marca" name="motor_electrico_ii_marca"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Volt</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_ii_voltaje" name="motor_electrico_ii_voltaje"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Amp</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_ii_amperaje" name="motor_electrico_ii_amperaje"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Fs</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_ii_fs" name="motor_electrico_ii_fs"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">RPM</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_ii_rpm" name="motor_electrico_ii_rpm"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span >Motor Eléctrico III</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Marca</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_iii_marca" name="motor_electrico_iii_marca"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Volt</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_iii_voltaje" name="motor_electrico_iii_voltaje"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Amp</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_iii_amperaje" name="motor_electrico_iii_amperaje"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Fs</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_iii_fs" name="motor_electrico_iii_fs"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">RPM</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="motor_electrico_iii_rpm" name="motor_electrico_iii_rpm"  placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span >Vida de Servicios Programados</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Vida de Aceite</span>
                                    </label>
                                    <select class="form-select form-select-solid form-select-sm mb-2" id="vida_de_aceite" name="vida_de_aceite" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Vida  de Aceite</option>
                                        <option value="1000 HORAS">1000 HORAS</option>
                                        <option value="2000 HORAS">2000 HORAS</option>
                                        <option value="4000 HORAS">4000 HORAS</option>
                                        <option value="8000 HORAS">8000 HORAS</option>
                                    </select>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Vida de fil. de aceite</span>
                                    </label>
                                    <select class="form-select form-select-solid form-select-sm mb-2" id="vida_de_filtro_aceite" name="vida_de_filtro_aceite" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Vida  de Aceite</option>
                                        <option value="1000 HORAS">1000 HORAS</option>
                                        <option value="2000 HORAS">2000 HORAS</option>
                                        <option value="4000 HORAS">4000 HORAS</option>
                                        <option value="8000 HORAS">8000 HORAS</option>
                                    </select>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Vida de fil. de aire</span>
                                    </label>
                                    <select class="form-select form-select-solid form-select-sm mb-2" id="vida_de_filtro_aire" name="vida_de_filtro_aire" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Vida  de Aceite</option>
                                        <option value="1000 HORAS">1000 HORAS</option>
                                        <option value="2000 HORAS">2000 HORAS</option>
                                        <option value="4000 HORAS">4000 HORAS</option>
                                        <option value="8000 HORAS">8000 HORAS</option>
                                    </select>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Vida de separador</span>
                                    </label>
                                    <select class="form-select form-select-solid form-select-sm mb-2" id="vida_de_separador" name="vida_de_separador" data-kt-select2="true" data-placeholder="Select option"  data-allow-clear="false">
                                        <option value="0">Seleccione Vida  de Aceite</option>
                                        <option value="1000 HORAS">1000 HORAS</option>
                                        <option value="2000 HORAS">2000 HORAS</option>
                                        <option value="4000 HORAS">4000 HORAS</option>
                                        <option value="8000 HORAS">8000 HORAS</option>
                                    </select>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Engrase de Motor</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="vida_de_engrase_motor" name="vida_de_engrase_motor" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span >Regulaciones Programadas</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Presión de Carga (psi)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="regulaciones_presion_carga" name="regulaciones_presion_carga" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Presión de Descarga (psi)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="regulaciones_de_descarga" name="regulaciones_de_descarga" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Tiempo (s)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="regulaciones_de_tiempo" name="regulaciones_de_tiempo" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Nro. Arranques</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="regulaciones_nro_arranques" name="regulaciones_nro_arranques" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Retardo de Carga (s)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="regulaciones_retardo_carga" name="regulaciones_retardo_carga" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Punto de Ajuste VSD (Bar)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="regulaciones_pto_de_ajuste" name="regulaciones_pto_de_ajuste" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <label class="d-flex align-items-center fs-6 fw-bold mb-8">
                                <span >Temperaturas y Presiones</span>
                            </label>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Temp. Elem. 1 (°C)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="temperatura_elemento1" name="temperatura_elemento1" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Temp. Elem. 2 (°C)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="temperatura_elemento2" name="temperatura_elemento2" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Temp. Aceite (°C)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="temperatura_aceite" name="temperatura_aceite" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Presión de Aceite (PSI)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="presion_de_aceite" name="presion_de_aceite" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Presión Intermedia (PSI)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="presion_intermedia" name="presion_intermedia" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Temp. Ent, Elem. 2 (°C)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="temperatura_ent_elemento2" name="temperatura_ent_elemento2" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Temp. Sal. Aire (°C)</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="temperatura_sal_aire" name="temperatura_sal_aire" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_4">
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
                    <div data-kt-stepper-element="content" id="page_5">
                        <div class="w-100" id="kt_form_input_page_5">
                            <div class="fv-row mb-10 "></div>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-6 col-sm-6  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Descripción de trabajo</span>
                                    </label>
                                    <textarea type="text"  class="form-control form-control-solid form-control-sm" id="descripcion_del_trabajo" name="descripcion_del_trabajo" placeholder="Target title" name="target_title"></textarea>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-6  col-sm-6 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Recomendaciones</span>
                                    </label>
                                    <textarea type="text"  class="form-control form-control-solid form-control-sm" id="recomendaciones" name="recomendaciones" placeholder="Target title" name="target_title"></textarea>
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Horas de viaje</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="horas_de_viaje" name="horas_de_viaje" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3  col-sm-4 fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Horas extras</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" id="horas_extras" name="horas_extras" placeholder="Target title" name="target_title">
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div data-kt-stepper-element="content" id="page_6">
                        <div class="w-100" id="kt_form_input_page_6">
                            <div class="fv-row mb-10 "></div>
                            <div class="row g-9 mb-8">
                                <div class="col-md-12 col-sm-12  fv-row">
                                    <!--div class="row g-9 mb-8">
                                        <div class="col-md-12 fv-row">
                                            <div class="d-flex align-items-center me-2">
                                                <div class="symbol symbol-50px me-3">
                                                    <div class="symbol-label bg-light-info">
                                                        <span class="svg-icon svg-icon-3x svg-icon-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"></path>
                                                                <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fs-4 text-dark fw-bolder">Datos del cliente</div>
                                                    <div class="fs-7 text-muted fw-bold">Datos del cliente</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div-->
                                    <div class="separator separator-dashed my-6"></div>
                                    <div class="col-md-9 fv-row my-5">
                                        <div class="fs-4 text-dark fw-bolder">Datos de la empresa</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 fv-row" >
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Razón Social:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_empresa_nombre"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">RUC:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_ruc"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Dirección:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_empresa_direccion"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Teléfono:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_empresa_telefono"></div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Compresor:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_equipo_referencia">xxxxx:</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Equipo model:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_equipo_modelo">xxxx</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">N° Serie:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_equipo_nro_serie">xxxxxx.</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Modelo tipo:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_equipo_modulo_tipo">xxxxxx.</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Presión (psi):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_equipo_presion"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Caudal:</div>
                                                </div>
                                                <div class="fv-row mx-10 ">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_equipo_caudal"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">RMP:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_equipo_rpm"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Horómetro:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_equipo_horometro"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-6"></div>
                                    <div class="col-md-9 fv-row my-5">
                                        <div class="fs-4 text-dark fw-bolder">Secador</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 fv-row" >
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Modelo:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_secador_modelo"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Nro. de Serie</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_secador_nro_serie"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Pto. de rocío</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_secador_punto_rocio"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 "> Volt. /Amp</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_secador_voltaje_amp"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Protección</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_secador_proteccion"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Limpieza</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_secador_limpieza"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Tipo de refrig.</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_secador_tipo_refrigeracion"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Nota</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_secador_nota"></div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Tipo de aceite usado:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_verificacion_tipo_aceite_usado"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Aceite:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_verificacion_estado_aceite"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Estado del Separador:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_verificacion_estado_separador"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Estado de Fajas y Acoplamiento:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_verificacion_estado_fajas_acoplamiento"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 "> Estado de Limpieza:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_verificacion_estado_de_limpieza"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Filtro de Aceite:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_verificacion_estado_filtro_de_aceite"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Filtro de Aire:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_verificacion_estado_filtro_de_aire"></div>
                                                </div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">UL1 - UL2 (Volts):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_medicion_voltaje_ul1l2">232</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">UL2 - UL3 (Volts):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_medicion_voltaje_ul2l3">23</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">UL1 - UL3 (Volts):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_medicion_voltaje_ul1l3">2</div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">L1 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_medicion_amperaje_l1">22</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">L2 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_medicion_amperaje_l2">2s3</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">L3 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_medicion_amperaje_l3">2</div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">F1 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_medicion_amperaje_f1">232</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">F2 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_medicion_amperaje_f2">23</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">F3 (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_medicion_amperaje_f3">2s</div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Termomagnético (Amps):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_thermomagnetico">232</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Línea a tierra (Volts):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_linea_a_tierra">23x</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Voltaje de control y de
                                                        módulo (Volts):</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_voltaje_del_modulo">2s</div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Marca:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_i_marca">232</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Vol:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_i_voltaje">23x</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Amp:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_i_amperaje">2s</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">FS:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_i_fs">2s</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">RPM:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_i_rpm">2s</div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Marca:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_ii_marca">232</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Vol:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_ii_voltaje">23x</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Amp:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_ii_amperaje">2s</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">FS:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_ii_fs">2s</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">RPM:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_ii_rpm">2s</div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Marca:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_iii_marca">232</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Vol:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_iii_voltaje">23x</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Amp:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_iii_amperaje">2s</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">FS:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_iii_fs">2s</div>
                                                </div>
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">RPM:</div>
                                                </div>
                                                <div class="fv-row  w-40px">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_motor_electrico_iii_rpm">2s</div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Vida de Aceite:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_vida_de_aceite"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Vida de fil. de aceite:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_vida_de_filtro_aceite"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Vida de fil. de aire:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_vida_de_filtro_aire"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Vida de separador:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_vida_de_separador"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Engrase de Motor</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_vida_de_engrase_motor"></div>
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
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Presión de Carga (psi):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_regulaciones_presion_carga"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Presión de Descarga (psi):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_regulaciones_de_descarga"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Tiempo (s):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_regulaciones_de_tiempo"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Nro. Arranques:</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_regulaciones_nro_arranques"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Retardo de Carga (s):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_regulaciones_retardo_carga"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Punto de Ajuste VSD (Bar):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_regulaciones_pto_de_ajuste"></div>
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
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Temp. Elem. 1 (°C):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_temperatura_elemento1"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Temp. Elem. 2 (°C):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_temperatura_elemento2"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Temp. Aceite (°C):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_temperatura_aceite"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Presión de Aceite (PSI):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_presion_de_aceite"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Presión Intermedia (PSI):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_presion_intermedia"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Temp. Ent, Elem. 2 (°C):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_temperatura_ent_elemento2"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="fv-row mx-10 w-150px">
                                                    <div class="fw-bold text-gray-600 ">Temp. Sal. Aire (°C):</div>
                                                </div>
                                                <div class="fv-row mx-10">
                                                    <div class="fw-bolder text-gray-800 " id="id_resumen_temperatura_sal_aire"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--FIRMA INI-->
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <img src="" alt="Cliente"  style="display: none;width: 100%;" id="idFirmaCliente">
                                    <div class="d-none kt_signature_datos " data-firma="customer" id="kt_signature_customer" ></div>
                                    <button type="button" class="btn btn-sm btn-primary btn-option-firma" data-opt="customer" id="btnFirmaCliente" >Firma del cliente</button>
                                </div>
                                <div class="col-md-3  col-sm-4 fv-row" >
                                    <img src="" alt="Técnico" style="display: none;width: 100%; " id="idFirmaTecnico" >
                                    <div class="d-none kt_signature_datos"  data-firma="technical" id="kt_signature_technican" ></div>
                                    <button type="button" class="btn btn-sm btn-primary btn-option-firma" data-opt="technican" id="brtnFirmaTecnico" >Firma del Tecnico</button>
                                </div>
                            </div>
                            <!--FIRMA END-->
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Jefe encargado</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" readonly id="id_nombre_jefe_encargado" name="nombre_jefe_encargado" placeholder="Jefe encargado" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                                <div class="col-md-3 col-sm-4  fv-row" >
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Correo para envio de email</span>
                                    </label>
                                    <input type="text"  class="form-control form-control-solid form-control-sm" readonly id="email_conact" name="email_conact" placeholder="Correo para envio de email" >
                                    <span class="fs-8 cls_empty text-danger " data-validator="notEmpty"></span>
                                </div>
                            </div>
                            <div class="row g-9 mb-8" >
                                <div class="col-md-3 col-sm-4  fv-row" id="kt_selected_email" >
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Step 5-->
                    <!--begin::Actions-->
                    
                    <div class="d-flex flex-stack pt-10" >
                        <!--begin::Wrapper-->
                        <div class="me-2">
                            <button type="button" class="btn btn-lg btn-light-primary me-3 btn-stepper-previous" data-kt-stepper-action="previous">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                            <span class="svg-icon svg-icon-3 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                    <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Regresar</button>
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Wrapper-->
                        <div>

                            <button type="button" class="btn btn-lg btn-dark" style="display: none" disabled id="btnactualizarFinal"  >
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>

                            <button type="button" class="btn btn-lg btn-dark mx-10" style="display: none" disabled id="btnSaveData"  >
                                <span class="indicator-label"> Guardar</span>
                                <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="button" class="btn btn-lg btn-primary btn-stepper-next " style="display: none;" disabled data-kt-stepper-action="next">Continue
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
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
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>

        </div>
    </div>
@endsection()
@push('script')
<script src="{{asset('assets/js/signature_pad.umd.js')}}"></script>
<script src="{{asset('assets/js/appsignature.js')}}"></script>
<script>
    $(document).ready(async function (){
        localStorage.removeItem('id_reporte_serie');
        var contadorImg1=0;
        var contadorIFinalmg1 =0;
        $('#kt_modal_create_productos, #kt_modal_firma_cliente, #kt_modal_contacto_correo').modal({ backdrop: 'static', keyboard: false });
        //$('#kt_modal_create_productos').modal("show");
        $(document).on("click", "#btn_close_see_images", async function(event){
            $('#kt_modal_see_images').modal("hide");
        });
        $(document).on("click", ".cls_modal_close_condition", async function(event){
            $('#kt_modal_create_productos').modal("hide");
        });
        await getOT();
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
        var countador_ = 0;
        $(document).on("click", ".btn-stepper-next", function(event){
            window.scrollTo(0, 0);
            validar4Images();
            resumenRporte();
            $("#btnSaveData").hide().prop("disabled", true);
            $("#btnactualizarFinal").hide().prop("disabled", true);
            var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado");
            if (countador_ == 0) {
                countador_ = 1;
                $('#page_0').removeClass('current');
                $('#page_1').addClass('current');
                $(".btn-stepper-previous").show();
                $('#page_content_0').removeClass('current');
                $('#page_content_1').addClass('current');
                $("#kt_seguimiento_menu, .cls_step_2").show();
                $(".cls_step_ot").hide();
            } else if (countador_ == 1) {
                countador_ = 2;
                $('#page_1').removeClass('current');
                $('#page_2').addClass('current');
                $(".btn-stepper-next").show();
                //$(".btn-stepper-next").prop("disabled", true);
                $(".btn-stepper-previous").show();
                $('#page_content_1').removeClass('current');
                $('#page_content_2').addClass('current');
                $("#btnSaveData").show().prop("disabled", false);
                if(btnNext=="NUEVO"){
                    $(".btn-stepper-next").prop("disabled", true);
                }
            }else if (countador_ == 2) {
                countador_ = 3;
                $('#page_2').removeClass('current');
                $('#page_3').addClass('current');
                $(".btn-stepper-next").show();
                $(".btn-stepper-previous").show();
                $('#page_content_2').removeClass('current');
                $('#page_content_3').addClass('current');
            }else if (countador_ == 3) {
                countador_ = 4;
                $('#page_3').removeClass('current');
                $('#page_4').addClass('current');
                $(".btn-stepper-next").show();
                $(".btn-stepper-previous").show();
                $('#page_content_3').removeClass('current');
                $('#page_content_4').addClass('current');
                validar4FinalImages()
            }else if (countador_ == 4) {
                countador_ = 5;
                $('#page_4').removeClass('current');
                $('#page_5').addClass('current');
                $(".btn-stepper-next").show();
                $(".btn-stepper-previous").show();
                $('#page_content_4').removeClass('current');
                $('#page_content_5').addClass('current');
            }else if (countador_ == 5) {
                countador_ = 6;
                $('#page_5').removeClass('current');
                $('#page_6').addClass('current');
                $(".btn-stepper-next").hide();
                $(".btn-stepper-previous").show();
                $('#page_content_5').removeClass('current');
                $('#page_content_6').addClass('current');
                $("#btnactualizarFinal").show().prop("disabled", false);
            } else if (countador_ == 6) {
                countador_ = 0;
                $('#page_6').removeClass('current')
                $('#page_0').addClass('current')
                $(".btn-stepper-next").show();
                $(".btn-stepper-previous").hide();
                $('#page_content_6').removeClass('current');
                $('#page_content_0').addClass('current');
            } 
            console.log("countador_ "+countador_);
            //console.log(localStorage.getItem('id_reporte_serie'));
        });

        $(document).on("click", ".btn-stepper-previous", function(event){
            window.scrollTo(0, 0);
            resumenRporte();
            validar4Images();
            $("#btnSaveData").hide().prop("disabled", true);
            $("#btnactualizarFinal").hide().prop("disabled", true);
            var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado");
            if (countador_ == 1) {
                countador_ = 0;
                $('#page_0').addClass('current')
                $('#page_1').removeClass('current')
                $(".btn-stepper-previous").hide();
                $(".btn-stepper-next").hide();
                //$('.btn-stepper-next').prop('disabled', true);
                $('#page_content_0').addClass('current');
                $('#page_content_1').removeClass('current');
                $("#kt_seguimiento_menu, .cls_step_2").hide();
                $(".cls_step_ot").show();
            } else if (countador_ == 2) {
                countador_ = 1;
                $('#page_1').addClass('current')
                $('#page_2').removeClass('current')
                $(".btn-stepper-previous").show();
                $(".btn-stepper-next").show();
                $('#page_content_1').addClass('current');
                $('#page_content_2').removeClass('current');
            }else if (countador_ == 3) {
                countador_ = 2;
                $('#page_2').addClass('current')
                $('#page_3').removeClass('current')
                $(".btn-stepper-previous").show();
                $(".btn-stepper-next").show();
                $('#page_content_2').addClass('current');
                $('#page_content_3').removeClass('current');
                $("#btnSaveData").show().prop("disabled", false);
                if(btnNext=="NUEVO"){
                    $(".btn-stepper-next").prop("disabled", true);
                }
            }else if (countador_ == 4) {
                countador_ = 3;
                $('#page_3').addClass('current')
                $('#page_4').removeClass('current')
                $(".btn-stepper-previous").show();
                $(".btn-stepper-next").show();
                $('#page_content_3').addClass('current');
                $('#page_content_4').removeClass('current');
            }else if (countador_ == 5) {
                countador_ = 4;
                $('#page_4').addClass('current')
                $('#page_5').removeClass('current')
                $(".btn-stepper-previous").show();
                $(".btn-stepper-next").show();
                $('#page_content_4').addClass('current');
                $('#page_content_5').removeClass('current');
                validar4FinalImages()
            }else if (countador_ == 6) {
                countador_ = 5;
                $('#page_5').addClass('current')
                $('#page_6').removeClass('current')
                $(".btn-stepper-previous").show();
                $(".btn-stepper-next").show();
                $('#page_content_5').addClass('current');
                $('#page_content_6').removeClass('current');
            }else if (countador_ == 0) {
                countador_ = 6;
                $('#page_6').addClass('current')
                $('#page_0').removeClass('current')
                $(".btn-stepper-previous").hide();
                $(".btn-stepper-next").show();
                $('#page_content_6').addClass('current');
                $('#page_content_0').removeClass('current');
                $("#btnactualizarFinal").show().prop("disabled", false);
            }
            console.log("countador_ "+countador_);
        });
        $(document).on("change", ".filenameonchage", async function(e){
            console.log("comienza en "+contadorImg1);
            const $this = $(this);
            const datosFiles = new FormData();
            var nameFileR = '';
            const files = e.target.files;
            var sumaSizeFile = 0;
            var sizeMB =10;
            ///const data_file_index = e.target.getAttribute('data-file_index');
            for(let index = 0; index <files.length; index++){
                datosFiles.append('files[]', files[index]);
                const archivos = e.target.files;
                const primerArchivo = archivos[index];
                const objectURL = URL.createObjectURL(primerArchivo);            
                const size = archivos[index].size;
                const type = archivos[index].type;
                sumaSizeFile+=size;           
            }
            if (sumaSizeFile>sizeMB*1000000){
                Toast.fire({
                    icon: 'error',
                    title: 'El archivo no debe superar los '+sizeMB+'MB.'
                });
                return;
            }
            $("#spiner-upload-images").show();
            datosFiles.append('_token', $("input[name='_token']").val());
            //var tarhe = e.target.parentElement.nextElementSibling.children[0]; 
            //const response = await fetch(`http://localhost/back-mrpe-develop/public/api/servicio/request-file`, {
            const response = await fetch(`${APP_URL_BK}/api/servicio/request-file`, {
            //const response = await fetch(`${APP_URL}/servicio/request-file`, {
                method: 'POST',
                body: datosFiles
            }).then(async (response)=> {
                const rest = await response.json();
                var datos = rest;
                var icon = rest.icon;
                var status = rest.status;
                var message = rest.message;    
                $("#spiner-upload-images").hide();          
                if (status){
                    var data = rest.data;                 
                    const IdUploadImg = $("#IdUploadImg").html();
                    const createElemntoImg = document.createElement("div");
                    createElemntoImg.classList.add('col-md-3');
                    createElemntoImg.classList.add('col-sm-4');
                    createElemntoImg.classList.add('fv-row');
                    createElemntoImg.classList.add('px-8');
                    createElemntoImg.classList.add('pt-3');
                    createElemntoImg.setAttribute("id", "IdUploadImg");
                    createElemntoImg.innerHTML = IdUploadImg;
                    var classActiveCheck = '';
                    var classBtnActiveCheck = ' ';
                    var htmlContenImg='';
                    var APP_URL_IMG_BK = APP_URL_BK.replace('index.php', '');
                    $.each( data, function( key, value ) {
                        contadorImg1=contadorImg1+1;
                        if (contadorImg1>=1 && contadorImg1<=4){
                            classActiveCheck = 'active';
                            classBtnActiveCheck =' checked ';
                        }
                        htmlContenImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_images_select cls_nuevo">
                                    <div class="position-absolute cls_check_photo ${classActiveCheck}" data-estado="${classActiveCheck}" > 
                                        <i class="bi bi-check2 fs-2x"></i>
                                    </div>
                                    <input type="hidden"  class="d-none cls_tipo_archivo" value="${value["tipo_archivo"]}" >
                                    <input type="hidden"  class="d-none cls_nombre_archivo" value="${value["nombre_archivo"]}">
                                    <input type="hidden"  class="d-none cls_nombre_original" value="${value["nombre_original"]}">
                                    <input type="hidden"  class="d-none cls_ruta_relativa" value="${value["ruta_relativa"]}">
                                    <input type="hidden"  class="d-none cls_id" value="0">
                                    <div  class="btn btn-outline btn-outline-dashed btn-outline-default w-100 active p-0 image-input" >
                                        <div data-image="${APP_URL_IMG_BK}${value["ruta_relativa"]}" class="image-input-wrapper w-100 h-120px background-size-cover" style="border-radius: 0.475rem 0.475rem 0 0;background-image: url(${APP_URL_IMG_BK}${value["ruta_relativa"]})" ></div> 
                                        <div class="d-flex align-items-stretch cls-btn-option-images" >
                                            <button class="btn btn-sm p-1 btn-dark w-100 tk_delete_image_sesion" data-name=${value["nombre_archivo"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                                <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin"></i>
                                            </button>
                                            <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                                <label class="form-check form-check-custom d-block ">
                                                    <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_check_image_sesion" type="checkbox" name="" value="" >
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    $("#kt_list_images").append(htmlContenImg);
                    document.getElementById("kt_list_images").append(createElemntoImg);
                    $("#IdUploadImg").remove();
                    validar4Images()
                    console.log("contadorImg1 "+contadorImg1);
                    $("#inicio_contador_imag").val(contadorImg1);
                }else{
                    Toast.fire({
                        icon: rest.icon,
                        title: rest.message
                    });
                }
            })
            //href={REACT_APP_REST_BACK+rsfiles.nombre_archivo}
            .catch(function (error){
                console.log(error)
            });
        })      
        async function EliminarArchivo(dataNombre, $this){
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('nombre_archivo', dataNombre);
            const response = await fetch(`${APP_URL}/servicio/delete-file`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                const rest = await response.json();
                const datos = rest.data;
                const status = rest.status;
                if(status){
                    const status1 = rest.data.status;
                    Toast.fire({
                        icon: rest.data.icon,
                        title: rest.data.message
                    });
                    $this.parent().parent().parent().remove();
                    validar4Images()
                    contadorImg1=contadorImg1-1;
                    return;
                }
                Toast.fire({
                    icon: rest.icon,
                    title: rest.message
                });
                              
            }).catch((error) => {
                console.log(error)
            });
        }
        
        $(document).on("click", ".tk_delete_image_sesion", async function(event){
            var dataNombre = $(this).data("name");
            var $this = $(this);
            Swal.fire({
                buttonsStyling:!1,
                showDenyButton: true,
                text: "¿Estas seguro que desea eliminar este archivo?",
                icon: 'question',
                confirmButtonText: 'Confirmar',
                denyButtonText: 'Cancelar',
                reverseButtons: true,
                customClass:{
                    confirmButton:"btn btn-dark-degradate ",
                    denyButton:"btn btn-light-degradate ",
                }
            }).then((function(result){
                console.log(result)
                if(result.value){
                    EliminarArchivo(dataNombre, $this);
                }
            }));
        });
        function validar4Images(){
            var count_ = 0;
            $(".ki_images_select").each(function(i, val){
                var thisclas = $(this).children().attr("data-estado");
                var thisclas1 = $(this).children();
                if (thisclas=='active'){
                    count_++;
                }
       		});
            $(".btn-stepper-next").prop("disabled", true);
            $(".btk_check_image_sesion").each(function(i, val){
                if(!$(this).is(":checked")){
                    $(this).parent().parent().prop("disabled", false);
                }
            });
            if (count_>=4){
                $(".btn-stepper-next").prop("disabled", false);
                $(".btk_check_image_sesion").each(function(i, val){
                    if(!$(this).is(":checked")){
                        $(this).parent().parent().prop("disabled", true);
                    }
                });
            }
            //console.log(count_);
            return count_;
        }
        $(document).on("click", ".ki_images_select .image-input .image-input-wrapper, .ki_images_final_select .image-input .image-input-wrapper", async function(event){
            $("#kt_modal_see_images").modal("show"); 
            var dataImage =$(this).data("image");
            $("#kt_show_images").attr("src", dataImage)
        });
        $(document).on("click", ".btk_check_image_sesion", async function(event){
            var children = $(this).parent().parent().parent().parent().parent().children(".cls_check_photo");
            var thisActive = children.attr("data-estado");
            $btk_image_sesion = $(this);
            if (thisActive=='active'){
                children.attr("data-estado", "").removeClass("active");
            }else{
                children.attr("data-estado", "active").addClass("active");
            }
            validar4Images();
        });
        async function getOT(){
            $("#kt_list_ot").html('');
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            const response = await fetch(`${APP_URL}/service/ot-by-tecnico`, {
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
                    var counterOt = 0;
                    if (status1){
                        const datos = rest.data.data;
                        var $html_list_ot = '';
                        $("#spiner-lits-ot").hide();
                        $.each( datos, function( key, value ) {
                            counterOt++;
                            $kc_res_list_ot = ' kc_list_ot ';
                            $cssOpcity = ' ';
                            $REPORTE_NUMERO = value["REPORTE_NUMERO"];
                            $REPORTE_ESTADO = value["REPORTE_ESTADO"];
                            $bgEstado = '';
                            if($REPORTE_ESTADO==="NUEVO"){
                                $bgEstado = ' badge-primary ';
                            }else if($REPORTE_ESTADO==="PENDIENTE"){
                                $kc_res_list_ot=' kc_list_ot ';
                                $bgEstado = ' badge-danger ';
                            }else if($REPORTE_ESTADO==="COMPLETADO"){
                                $bgEstado = ' badge-success ';
                                $kc_res_list_ot=' kc_list_ot ';
                            }
                            $html_list_ot+= `<div class="col-md-4 col-sm-6 fv-row ${$kc_res_list_ot}" 
                            data-programacionid=${value["PROGRAMACIONID"]}
                            data-numot=${value["NUMOT"]}
                            data-ruc=${value["RUC"]}
                            data-reporte_numero=${value["REPORTE_NUMERO"]}
                            data-reporte_estado=${value["REPORTE_ESTADO"]}
                            > 
                                    <div class="select-dash position-relative" id=${counterOt}_${value["PROGRAMACIONID"]} >
                                        <div class="row justify-content-md-center spinner_ot position-absolute" style="top:50%;left:50%;display:none;">
                                            <div class="col-12 fv-row ">
                                                <span class="indicator-progress d-block text-center" >
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="dz-message needsclick position-relative">
                                            <span class="svg-icon svg-icon-3hx svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM14.5 12L12.7 9.3C12.3 8.9 11.7 8.9 11.3 9.3L10 12H11.5V17C11.5 17.6 11.4 18 12 18C12.6 18 12.5 17.6 12.5 17V12H14.5Z" fill="currentColor" />
                                                    <path d="M13 11.5V17.9355C13 18.2742 12.6 19 12 19C11.4 19 11 18.2742 11 17.9355V11.5H13Z" fill="currentColor" />
                                                    <path d="M8.2575 11.4411C7.82942 11.8015 8.08434 12.5 8.64398 12.5H15.356C15.9157 12.5 16.1706 11.8015 15.7425 11.4411L12.4375 8.65789C12.1875 8.44737 11.8125 8.44737 11.5625 8.65789L8.2575 11.4411Z" fill="currentColor" />
                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <div class="ms-4">
                                                <h3 class="dfs-3 fw-bolder mb-1 select_razon_social">${value["RAZON_SOCIAL"]} </h3>
                                                <small class="fw-bold text-muted fs-5 select_ruc">${value["RUC"]}</small>  <br>  
                                                <small class="fw-bold text-muted fs-5 select_ot">OT - ${value["NUMOT"]}</small> <br>                
                                                <small class="fw-bold text-muted fs-5 select_modelo">Modelo: ${value["MODELO"]} </small>  <br>                                          
                                                <small class="fw-bold text-muted fs-5 select_serie">Serie: ${value["SERIE"]} </small> <br>                                        
                                                <small class="badge ${$bgEstado}">${value["REPORTE_ESTADO"]}</small>                                           
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>`;
                        });
                        $("#kt_list_ot").html( $html_list_ot );
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
                Toast.fire({
                    icon: 'error',
                    title:error
                });
            });
        }
        async function getServioByProgramacion(programacionid, $this){
            spinnerOt($this);
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('programacionid', programacionid);
            const response = await fetch(`${APP_URL}/service/servicio-by-programacion-id`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                spinnerOt($this, false);
                const rest = await response.json();
                console.log(rest);
                const datos = rest.data;
                const status1 = rest.status;
                contadorImg1=0;
                if (!status1){
                    Toast.fire({
                        icon: rest.icon,
                        title: rest.message
                    });
                    return;
                }
                const status = rest.data.status;
                if (!status){
                    Toast.fire({
                        icon: rest.data.icon,
                        title: rest.data.message
                    });
                    return;
                }
                if (datos){
                    const PROGRAMACIONID = rest.data.data.PROGRAMACIONID;
                    const NUMOT = rest.data.data.NUMOT;
                    const RUC = rest.data.data.RUC;
                    const RAZON_SOCIAL = rest.data.data.RAZON_SOCIAL;
                    const TIPO_SERVICIO = rest.data.data.TIPO_SERVICIO;
                    const EQUIPO_ID = rest.data.data.EQUIPO_ID;
                    const DESCRIPCION_TRABAJO = rest.data.data.DESCRIPCION_TRABAJO;
                    const DIRECCION_CLIENTE = rest.data.data.DIRECCION_CLIENTE;
                    const EQUIPO = rest.data.data.EQUIPO;
                    const MODELO = rest.data.data.MODELO;
                    const SERIE = rest.data.data.SERIE;
                    $("#service_ot").val(NUMOT); 
                    $("#service_razon_social").val(RAZON_SOCIAL);
                    $("#service_ruc").val(RUC);
                    $("#service_direccion").val(DIRECCION_CLIENTE);
                    $("#service_tipo_service").val(TIPO_SERVICIO);
                    $("#service_equipo").val(EQUIPO);
                    $("#service_equipo_modelo").val(MODELO);
                    $("#service_equipo_serie").val(SERIE);
                    $("#service_equipo_id").val(EQUIPO_ID);
                    countador_ = 1;
                    $('#page_0').removeClass('current');
                    $('#page_1').addClass('current');
                    $(".btn-stepper-previous").show();
                    $(".btn-stepper-next").show();
                    $('#page_content_0').removeClass('current');
                    $('#page_content_1').addClass('current');
                    validar4Images()
                    $("#kt_seguimiento_menu, .cls_step_2").show();
                    $(".cls_step_ot").hide();
                }else{
                    console.log(datos);
                }
            }).catch((error) => {
                console.log(error)
            });
        }
        $(document).on("click", "#kt_modal_accept_condition", async function(event){
            $('#kt_modal_create_productos').modal("hide");
            emptyForm()
            const id_ =$(this).attr("data-id");
            const $this = $("#"+id_);
            const programacionid =$(this).attr("data-programacionid");
            const reporte_numero =$(this).attr("data-reporte_numero");
            const reporte_estado =$(this).attr("data-reporte_estado");
            const reporte_ruc =$(this).attr("data-ruc");
            $(".select-dash").removeClass("active");
            $("#"+id_).addClass("active");
            $("#cliente-seguimiento").text( $("#"+id_+" .select_razon_social").text());
            $("#ot-seguimiento").text($("#"+id_+" .select_ot").text());
            $("#modelo-seguimiento").text($("#"+id_+" .select_modelo").text());
            $("#serie-seguimiento").text($("#"+id_+" .select_serie").text());
            if (parseInt(reporte_numero)>0){
                if (reporte_estado==="PENDIENTE"){
                    await getArchivoByNumeroReporte(reporte_numero, $this)
                    await getReporteByNumero(reporte_numero, $this)
                    $("#btnSaveData").attr("data-option", 'upd');
                    $("#idreportenumero").val(reporte_numero);
                }
            }else{
                await getServioByProgramacion(programacionid, $this);
                $("#btnSaveData").attr("data-option", 'ins');
                $("#idreportenumero").val(reporte_numero);
            }
            await listarCorreoContacto(reporte_ruc)
            await getEmpleadobycategory(programacionid);
        });
        $(document).on("click", ".kc_list_ot .select-dash", async function(event){
            $('#kt_modal_create_productos').modal("show");
            emptyForm()
            const id_ =$(this).prop("id");
            const $this = $(this);
            const programacionid =$(this).parent().data("programacionid");
            const reporte_numero =$(this).parent().data("reporte_numero");
            const reporte_estado =$(this).parent().data("reporte_estado");
            const reporte_ruc =$(this).parent().data("ruc");
            $(".select-dash").removeClass("active");
            $(this).addClass("active");
            /*if (parseInt(reporte_numero)>0){
                if (reporte_estado==="PENDIENTE"){
                    getArchivoByNumeroReporte(reporte_numero, $this)
                    getReporteByNumero(reporte_numero, $this)
                    $("#btnSaveData").attr("data-option", 'upd');
                    $("#idreportenumero").val(reporte_numero);
                }
            }else{
                getServioByProgramacion(programacionid, $this);
                $("#btnSaveData").attr("data-option", 'ins');
                $("#idreportenumero").val(reporte_numero);
            }
            listarCorreoContacto(reporte_ruc)
            getEmpleadobycategory(programacionid);
            */ 
            $("#kt_modal_accept_condition")
            .attr("data-programacionid", programacionid)
            .attr("data-reporte_numero", reporte_numero)
            .attr("data-reporte_estado",reporte_estado)     
            .attr("data-ruc",reporte_ruc)
            .attr("data-id",id_);
        });
        async function spinnerOt($this, state=true){
            if (state){
                $this.children(".spinner_ot").show();
                $this.addClass("opacity-50");
                return;
            }
            $this.children(".spinner_ot").hide();   
            $this.removeClass("opacity-50");       
        }
        async function getEmpleadobycategory(programacionid){
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('programacionid',programacionid);
            const response = await fetch(`${APP_URL}/empleado/get-by-category`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                const rest = await response.json();
                const datos = rest.data.data;
                $htmlSelect='';
                $htmlSelect+='<option value="0">Seleccione técnico</option>';
                const user_bloqued = $("#user_sesion").val();
                var idobl = 0;
                var dni_teccnico = $("#dni_teccnico").val();
                $.each( datos, function( key, value ) {
                    $disabled ='';
                    $selected ='';
                    if (user_bloqued!=value["PROGRAMACION_TECNICO"]){
                        //$disabled =' disabled ';
                        idobl++;
                        var selected1 = "  ";
                        if (dni_teccnico===value["DNI"]){
                            selected1 = " selected ";
                        }
                        $htmlSelect+= `<option data-tecnio=${value["PROGRAMACION_TECNICO"]} ${selected1} ${$disabled} value="${value["DNI"]}">${value["NOMBRE"]}</option>`;
                    }else{
                        if (value["PROGRAMACION_TECNICO"]!=0){
                            $selected =' selected  ';
                        }
                    }
                    //$htmlSelect+= `<option data-tecnio=${value["PROGRAMACION_TECNICO"]} ${$selected} ${$disabled} value="${value["DNI"]}">${value["NOMBRE"]}</option>`;
                });
                $("#id_obl").val(idobl);
                $("#servicio_tenico2").html($htmlSelect);
            }).catch((error) => {
                console.log(error)
            });
        }    
        async function GuardarReporte(){
            $(".cls_empty").empty();
            $("#kt_form_input_page_2 input").removeClass("input_danger_border");
            beforeSendBtnLoad("#btnSaveData");
            const data = new FormData();
            var pushImages =[]
            var cantidadInicialFotos=0;
            $(".ki_images_select.cls_nuevo").each(function(i, val){
                var children = $(this).children();
                var dataEstado = children.attr("data-estado");
                var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
                var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
                var val_nombre_original =$(this).children(".cls_nombre_original").val();
                var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
                var val_estado_ver_reporte =0;                
                if (dataEstado=='active'){
                    val_estado_ver_reporte=1;
                    cantidadInicialFotos++;
                }
                pushImages.push({
                    tipo_archivo: val_tipo_archivo,
                    nombre_archivo : val_nombre_archivo, 
                    nombre_original: val_nombre_original,
                    ruta_relativa: val_ruta_relativa,
                    estado_ver_reporte: val_estado_ver_reporte
                });
       		});
            if (cantidadInicialFotos!=4){
                Toast.fire({
                    icon: 'warning',
                    title: "Campo vacio: seleccione 4 fotos iniciales como mínimo." 
                }); 
                beforeSendBtnLoad("#btnSaveData", false);
                return;
            }
            const id_tecnico_01=$("#servicio_tenico1").val();
            const id_tecnico_02=$("#servicio_tenico2").val();
            data.append('_token', $("input[name='_token']").val());
            data.append("reporte_fecha_servicio",$("#service_fecha").val()); 
            data.append("reporte_orden_trabajo",$("#service_ot").val());
            data.append("nombre_tecnico_responsable_01",$("#servicio_tenico1 option:selected").text());
            data.append("id_tecnico_01",id_tecnico_01=="0"?'':id_tecnico_01);
            data.append("nombre_tecnico_responsable_02",$("#servicio_tenico2 option:selected").text());
            data.append("id_tecnico_02",id_tecnico_02=="0"?'':id_tecnico_02);
            data.append("id_obl",$("#id_obl").val());
            data.append("empresa_nombre", $("#service_razon_social").val());
            data.append("ruc",$("#service_ruc").val());
            data.append("empresa_direccion",$("#service_direccion").val());
            data.append("empresa_telefono",$("#service_tel_cliente").val());
            data.append("empresa_email",$("#service_email_cliente").val());
            data.append("equipo_id",$("#service_equipo_id").val()); 
            data.append("equipo_referencia",$("#service_equipo").val()  );
            data.append("equipo_modelo", $("#service_equipo_modelo").val() );
            data.append("equipo_nro_serie", $("#service_equipo_serie").val() );
            data.append("equipo_modulo_tipo",$("#service_equipo_modelo_tipo").val() ); 
            data.append("equipo_presion", $("#service_equipo_presion").val() );
            data.append("equipo_caudal", $("#service_equipo_caudal").val() );
            data.append("equipo_rpm",$("#service_equipo_rpm").val() );
            data.append("equipo_horometro",$("#service_equipo_horometro").val());
            data.append("tipo_servicio_desc",$("#service_tipo_service").val()); 
            data.append("tipo_servicio_arranque_inicial",'');
            data.append("tipo_servicio_mantenimiento",'');
            data.append("tipo_servicio_evaluacion",'');
            data.append("tipo_servicio_reparacion",'');
            data.append("tipo_servicio_asesoria",'');
            data.append("tipo_servicio_overhaul",'');
            data.append("tipo_servicio_alquiler",'');
            data.append("secador_modelo",$("#service_secador_modelo").val());
            data.append("secador_nro_serie",$("#service_secador_nro_serie").val());
            data.append("secador_punto_rocio",$("#service_secador_punto_rocio").val());
            data.append("secador_voltaje_amp",$("#service_secador_voltaje_amp").val());
            data.append("secador_proteccion",$("#service_secador_proteccion").val());
            data.append("secador_limpieza",$("#service_secador_limpieza").val());
            data.append("secador_tipo_refrigeracion",$("#service_secador_tipo_refrigeracion").val());
            data.append("programacionid",$(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-programacionid"));
            data.append("secador_nota",$("#service_secador_nota").val());
            data.append("vsd_00_20rpm", $("#vsd_00_20rpm").val());
            data.append("vsd_20_40rpm", $("#vsd_20_40rpm").val());
            data.append("vsd_40_60rpm", $("#vsd_40_60rpm").val());
            data.append("vsd_60_80rpm", $("#vsd_60_80rpm").val());
            data.append("vsd_80_100rpm", $("#vsd_80_100rpm").val());
            data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
            data.append("imagesDatos",JSON.stringify(pushImages));
            if($("#id_tecnologia_vsd").is(":checked")){
                console.log("checked ")
            }else{
                console.log("checked not ")
            }
            const response = await fetch(`${APP_URL}/reporte/registro`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                const rest = await response.json();
                const datos = rest.data;
                const type = rest.type;
                const status = rest.status;
                const icon = rest.icon;
                const message = rest.message;
                beforeSendBtnLoad("#btnSaveData", false);
                if(type==="empty"){
                    $txtEmpty = '';
                    $.each( datos, function( key, value ) {
                        $txtEmpty = value;
                        if (key != undefined) {
                            //$('#error_'+key).append(value);
                            $("#kt_form_input_page_2 input[name='"+key+"'], #kt_form_input_page_2 select[name='"+key+"']").parent().children(".cls_empty").append(value);
                            //$("#kt_form_input_page_2 input[name='"+key+"']").addClass("input_danger_border");
                        }
                    });
                    Toast.fire({
                        icon: 'warning',
                        title: "Campo vacio: " +$txtEmpty
                    });
                    return;
                }
                if (status){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        Swal.fire({
                            icon: icon1,
                            title: message1,
                            showConfirmButton: true,
                            timer: 5000
                        });
                        emptyForm();
                        $("#kt_seguimiento_menu, .cls_step_2").hide();
                        $(".cls_step_ot").show();
                        await getOT();
                        //localStorage.setItem('id_reporte_serie', data1);
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
        $(document).on("click", "#btnSaveData", async function(event){
            var optionAction = $(this).attr("data-option");
            Swal.fire({
                buttonsStyling:!1,
                showDenyButton: true,
                text: "¿Estas seguro que desea guardar?",
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
                    if (optionAction==="ins"){
                        GuardarReporte();
                    }else{
                        ActualizarReporteInicial();
                    }
                }
            }));
        }); 
        $(document).on("click", "#btnactualizarFinal", async function(event){
            Swal.fire({
                buttonsStyling:!1,
                showDenyButton: true,
                text: "¿Estas seguro que desea guardar?",
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
                    ActualizarReporteFinal();
                }
            }));
        });
        async function ActualizarReporteInicial(){
            $(".cls_empty").empty();
            $("#kt_form_input_page_2 input").removeClass("input_danger_border");
            beforeSendBtnLoad("#btnSaveData");
            const data = new FormData();
            var pushInicialImages =[]
            var pushInicialNuevoImages =[]
            var cantidadInicialUpdFotos =0;
            var cantidadInicialUpdNuevoFotos =0;
            $(".ki_images_select.cls_editar").each(function(i, val){
                var children = $(this).children();
                var dataEstado = children.attr("data-estado");
                var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
                var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
                var val_nombre_original =$(this).children(".cls_nombre_original").val();
                var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
                var val_id =$(this).children(".cls_id").val();
                var val_estado_ver_reporte =0;
                if (dataEstado=='active'){
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
                pushInicialImages.push({
                    tipo_archivo: val_tipo_archivo,
                    nombre_archivo : val_nombre_archivo, 
                    nombre_original: val_nombre_original,
                    ruta_relativa: val_ruta_relativa,
                    estado_ver_reporte: val_estado_ver_reporte,
                    id: val_id
                });
       		});
            $(".ki_images_select.cls_nuevo").each(function(i, val){
                var children = $(this).children();
                var dataEstado = children.attr("data-estado");
                var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
                var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
                var val_nombre_original =$(this).children(".cls_nombre_original").val();
                var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
                var val_id =$(this).children(".cls_id").val();
                var val_estado_ver_reporte =0;
                if (dataEstado=='active'){
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdNuevoFotos++;
                }
                pushInicialNuevoImages.push({
                    tipo_archivo: val_tipo_archivo,
                    nombre_archivo : val_nombre_archivo, 
                    nombre_original: val_nombre_original,
                    ruta_relativa: val_ruta_relativa,
                    estado_ver_reporte: val_estado_ver_reporte,
                    id: val_id
                });
       		});
            var cantidadInicialUpdSumaFotos = cantidadInicialUpdFotos +cantidadInicialUpdNuevoFotos;
            if (cantidadInicialUpdSumaFotos!=4){
                Toast.fire({
                    icon: 'warning',
                    title: "Campo vacio: seleccione 4 fotos iniciales como mínimo para actualizar" 
                }); 
                beforeSendBtnLoad("#btnSaveData", false);
                return;
            }
            const id_tecnico_02=$("#servicio_tenico2").val();
            data.append('_token', $("input[name='_token']").val());
            data.append("reporte_numero",$("#idreportenumero").val());
            data.append("reporte_orden_trabajo",$("#service_ot").val());
            data.append("nombre_tecnico_responsable_02", $("#servicio_tenico2 option:selected").text());
            data.append("id_tecnico_02",id_tecnico_02=="0"?'':id_tecnico_02);
            data.append("id_obl",$("#id_obl").val());
            data.append("empresa_nombre", $("#service_razon_social").val());
            data.append("ruc",$("#service_ruc").val());
            data.append("empresa_direccion",$("#service_direccion").val());
            data.append("empresa_telefono",$("#service_tel_cliente").val());
            data.append("empresa_email",$("#service_email_cliente").val());
            data.append("equipo_id",$("#service_equipo_id").val()); 
            data.append("equipo_referencia",$("#service_equipo").val()  );
            data.append("equipo_modelo", $("#service_equipo_modelo").val() );
            data.append("equipo_nro_serie", $("#service_equipo_serie").val() );
            data.append("equipo_modulo_tipo",$("#service_equipo_modelo_tipo").val() ); 
            data.append("equipo_presion", $("#service_equipo_presion").val() );
            data.append("equipo_caudal", $("#service_equipo_caudal").val() );
            data.append("equipo_rpm",$("#service_equipo_rpm").val() );
            data.append("equipo_horometro",$("#service_equipo_horometro").val());
            data.append("tipo_servicio_desc",$("#service_tipo_service").val()); 
            data.append("tipo_servicio_arranque_inicial",'');
            data.append("tipo_servicio_mantenimiento",'');
            data.append("tipo_servicio_evaluacion",'');
            data.append("tipo_servicio_reparacion",'');
            data.append("tipo_servicio_asesoria",'');
            data.append("tipo_servicio_overhaul",'');
            data.append("tipo_servicio_alquiler",'');
            data.append("secador_modelo",$("#service_secador_modelo").val());
            data.append("secador_nro_serie",$("#service_secador_nro_serie").val());
            data.append("secador_punto_rocio",$("#service_secador_punto_rocio").val());
            data.append("secador_voltaje_amp",$("#service_secador_voltaje_amp").val());
            data.append("secador_proteccion",$("#service_secador_proteccion").val());
            data.append("secador_limpieza",$("#service_secador_limpieza").val());
            data.append("secador_tipo_refrigeracion",$("#service_secador_tipo_refrigeracion").val());
            data.append("secador_nota",$("#service_secador_nota").val());
            data.append("imagesInicialDatos",JSON.stringify(pushInicialImages));
            data.append("imagesInicialNuevoDatos",JSON.stringify(pushInicialNuevoImages));
            data.append("vsd_00_20rpm", $("#vsd_00_20rpm").val());
            data.append("vsd_20_40rpm", $("#vsd_20_40rpm").val());
            data.append("vsd_40_60rpm", $("#vsd_40_60rpm").val());
            data.append("vsd_60_80rpm", $("#vsd_60_80rpm").val());
            data.append("vsd_80_100rpm", $("#vsd_80_100rpm").val());
            data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
            const response = await fetch(`${APP_URL}/reporte/actualizar-inicial`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                const rest = await response.json();
                const datos = rest.data;
                const type = rest.type;
                const status = rest.status;
                const icon = rest.icon;
                const message = rest.message;
                beforeSendBtnLoad("#btnSaveData", false);
                if(type==="empty"){
                    $txtEmpty = '';
                    $.each( datos, function( key, value ) {
                        $txtEmpty = value;
                        if (key != undefined) {
                            //$('#error_'+key).append(value);
                            $("#kt_form_input_page_2 input[name='"+key+"'], #kt_form_input_page_2 select[name='"+key+"']").parent().children(".cls_empty").append(value);
                            //$("#kt_form_input_page_2 input[name='"+key+"']").addClass("input_danger_border");
                        }
                    });
                    Toast.fire({
                        icon: 'warning',
                        title: "Campo vacio: " +$txtEmpty
                    });
                    return;
                }
                if (status){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        Swal.fire({
                            icon: icon1,
                            title: message1,
                            showConfirmButton: true,
                            timer: 5000
                        });
                        empty2Form();
                        $("#kt_seguimiento_menu, .cls_step_2").hide();
                        $(".cls_step_ot").show();
                        await getOT();
                        //localStorage.setItem('id_reporte_serie', data1);
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
        function emptyForm(){
            $(".empty_error").empty();
            $("#kt_modal_create_campaign_stepper_form")[0].reset()
            $("#servicio_tenico2").val(0).trigger('change.select2');
            countador_ = 0;
            $('#page_0').addClass('current')
            $('#page_2').removeClass('current')
            $(".btn-stepper-previous").hide();
            $(".btn-stepper-next").hide();
            $('#page_content_0').addClass('current');
            $('#page_content_2').removeClass('current');
            $(".ki_images_select").remove();
            $("#btnSaveData").hide().prop("disabled", false);
            $("#kt_form_input_page_0 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_1 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_2 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_2 #servicio_tenico1").val($("#user_sesion").val()).trigger('change.select2');
            $("#id_tecnologia_vsd").prop("checked", false);
            $(".cls_tecnologia_vsd").hide();    
            $("#id_Tecnologis_vsd_horas").prop("checked", true);
            $(".tipo_tec_vsd").text("(H)")
        }
        function empty2Form(){
            $(".empty_error").empty();
            $("#kt_modal_create_campaign_stepper_form")[0].reset()
            $("#servicio_tenico2").val(0).trigger('change.select2');
            countador_ = 0;
            $('#page_0').addClass('current')
            $('#page_2').removeClass('current') 
            $(".btn-stepper-previous").hide();
            $(".btn-stepper-next").hide();
            $('#page_content_0').addClass('current');
            $('#page_content_2').removeClass('current');
            $(".ki_images_select").remove();
            $("#btnSaveData").hide().prop("disabled", false);
            $("#kt_form_input_page_0 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_1 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_2 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_2 #servicio_tenico1").val($("#user_sesion").val()).trigger('change.select2');
            $("#id_tecnologia_vsd").prop("checked", false);
            $(".cls_tecnologia_vsd").hide();    
            $("#id_Tecnologis_vsd_horas").prop("checked", true);
            $(".tipo_tec_vsd").text("(H)")
        }
        function empty3Form(){
            $(".empty_error").empty();
            $("#kt_modal_create_campaign_stepper_form")[0].reset()
            $("#servicio_tenico2").val(0).trigger('change.select2');
            countador_ = 0;
            $('#page_0').addClass('current')
            $('#page_6').removeClass('current')
            $(".btn-stepper-previous").hide();
            $(".btn-stepper-next").hide();
            $('#page_content_0').addClass('current');
            $('#page_content_6').removeClass('current');
            $(".ki_images_select").remove();
            $(".ki_images_final_select").remove();
            $("#btnSaveData").hide().prop("disabled", false);
            $("#kt_selected_email").html('');  
            $("#btnactualizarFinal").hide();
            $(".chk_input_email").prop("checked", false); 
            $("#kt_form_input_page_0 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_1 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_2 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_2 #servicio_tenico1").val($("#user_sesion").val()).trigger('change.select2');
            $("#kt_form_input_page_3 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_3 input").val('');
            $("#kt_form_input_page_4 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_4 input").val('');
            $("#kt_form_input_page_5 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_5 input").val('');
            $("#kt_form_input_page_6 select").val(0).trigger('change.select2');
            $("#kt_form_input_page_6 input").val('');
            $("#id_tecnologia_vsd").prop("checked", false);
            $(".cls_tecnologia_vsd").hide();    
            $("#id_Tecnologis_vsd_horas").prop("checked", true);
            $(".tipo_tec_vsd").text("(H)")
        }
        async function getArchivoByNumeroReporte(numero_reporte, $this){
            spinnerOt($this);
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('reporte_numero', numero_reporte);
            const response = await fetch(`${APP_URL}/reporte/listar-archivo-by-reporte`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                spinnerOt($this, false);
                
                const rest = await response.json();
                const status1 = rest.status;                
                if (status1){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    const IdUploadImg = $("#IdUploadImg").html();
                    const createElemntoImg = document.createElement("div");
                    createElemntoImg.classList.add('col-md-3');
                    createElemntoImg.classList.add('col-sm-4');
                    createElemntoImg.classList.add('fv-row');
                    createElemntoImg.classList.add('px-8');
                    createElemntoImg.classList.add('pt-3');
                    createElemntoImg.setAttribute("id", "IdUploadImg");
                    createElemntoImg.innerHTML = IdUploadImg;
                    if (status1){
                        contadorImg1 =0;
                        const datos = rest.data.data;
                        var htmlContenImg='';
                        var APP_URL_IMG_BK = APP_URL_BK.replace('index.php', '');
                        $.each( datos, function( key, value ) {
                            var classActiveCheck = '';
                            var classBtnActiveCheck = ' ';
                            contadorImg1=contadorImg1+1;
                            if (contadorImg1>=1 && contadorImg1<4){
                                //classActiveCheck = 'active';
                                //classBtnActiveCheck =' checked ';
                            }
                            if (value["ESTADO_VER_REPORTE"]==="1"){
                                classActiveCheck = 'active';
                                classBtnActiveCheck =' checked ';
                            }
                            htmlContenImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_images_select cls_editar">
                                        <div class="position-absolute cls_check_photo ${classActiveCheck}" data-estado="${classActiveCheck}" > 
                                            <i class="bi bi-check2 fs-2x"></i>
                                        </div>
                                        <input type="hidden"  class="d-none cls_tipo_archivo" value="${value["TIPO_ARCHIVO"]}" >
                                        <input type="hidden"  class="d-none cls_nombre_archivo" value="${value["NOMBRE_ARCHIVO"]}">
                                        <input type="hidden"  class="d-none cls_nombre_original" value="${value["NOMBRE_ORIGINAL"]}">
                                        <input type="hidden"  class="d-none cls_ruta_relativa" value="${value["RUTAL_RELATIVA"]}">
                                        <input type="hidden"  class="d-none cls_id" value="${value["ID"]}">
                                        <div  class="btn btn-outline btn-outline-dashed btn-outline-default w-100 active p-0 image-input" >
                                            <div data-image="${APP_URL_IMG_BK}${value["RUTAL_RELATIVA"]}" class="image-input-wrapper w-100 h-120px background-size-cover" style="border-radius: 0.475rem 0.475rem 0 0;background-image: url(${APP_URL_IMG_BK}${value["RUTAL_RELATIVA"]})" ></div> 
                                            <div class="d-flex align-items-stretch cls-btn-option-images" >
                                                <button disabled class="btn btn-sm p-1 btn-dark w-100 tk_delete_image_sesionNOT" data-name=${value["NOMBRE_ARCHIVO"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                                    <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin"></i>
                                                </button>
                                                <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                                    <label class="form-check form-check-custom d-block ">
                                                        <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_check_image_sesion" type="checkbox" name="" value="${value["ESTADO_VER_REPORTE"]}" >
                                                    </label>
                                                </button>
                                            </div>
                                        </div>
                                    </div>`;
                        });
                        $("#kt_list_images").html(htmlContenImg);
                        document.getElementById("kt_list_images").append(createElemntoImg);
                        countador_ = 1;
                        $('#page_0').removeClass('current');
                        $('#page_1').addClass('current');
                        $(".btn-stepper-previous").show();
                        $(".btn-stepper-next").show();
                        $('#page_content_0').removeClass('current');
                        $('#page_content_1').addClass('current');
                        validar4Images()
                        Toast.fire({
                            icon: icon1,
                            title:message1
                        });
                        $("#inicio_contador_imag").val(contadorImg1);
                        $("#kt_seguimiento_menu, .cls_step_2").show();
                        $(".cls_step_ot").hide();
                    }else{
                        
                        if (icon1=="error"){
                            
                        }
                        Toast.fire({
                            icon: icon1,
                            title:message1
                        });
                        
                        $("#kt_list_images").html('');
                        document.getElementById("kt_list_images").append(createElemntoImg);
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
        async function getReporteByNumero(numero_reporte, $this){
            spinnerOt($this);
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('reporte_numero', numero_reporte);
            const response = await fetch(`${APP_URL}/reporte/listar-reporte-by-numero`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                spinnerOt($this, false);
                const rest = await response.json();
                const status1 = rest.status;                
                if (status1){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        //contadorImg1=0;
                        const datos = rest.data.data;
                        var htmlContenImg='';
                        $.each( datos, function( key, value ) {
                            $("#dni_teccnico").val(value["ID_TECNICO_02"]);
                            var REPORTE_SERIE = value["REPORTE_SERIE"];
                            var VSD_MEDIDA_RPM= value["VSD_MEDIDA_RPM"];
                            $("#service_fecha").val(value["REPORTE_FECHA_SERVICIO"]);
                            $("#service_ot").val(value["REPORTE_ORDEN_TRABAJO"]);
                            $("#servicio_tenico2").val(value["ID_TECNICO_02"]).trigger('change.select2');
                            $("#service_razon_social").val(value["EMPRESA_NOMBRE"]);
                            $("#service_ruc").val(value["RUC"]);
                            $("#service_direccion").val(value["EMPRESA_DIRECCION"]);
                            $("#service_tel_cliente").val(value["EMPRESA_TELEFONO"]);
                            $("#service_email_cliente").val(value["EMPRESA_EMAIL"]);
                            $("#service_equipo_id").val(value["EQUIPO_ID"]);
                            $("#service_equipo").val(value["EQUIPO_REFERENCIA"]);
                            $("#service_equipo_modelo").val(value["EQUIPO_MODELO"]);
                            $("#service_equipo_serie").val(value["EQUIPO_NRO_SERIE"]);
                            $("#service_equipo_modelo_tipo").val(value["EQUIPO_MODULO_TIPO"]);
                            $("#service_equipo_presion").val(value["EQUIPO_PRESION"]);
                            $("#service_equipo_caudal").val(value["EQUIPO_CAUDAL"]);
                            $("#service_equipo_rpm").val(value["EQUIPO_RPM"]);
                            $("#service_equipo_horometro").val(value["EQUIPO_HOROMETRO"]);
                            $("#service_tipo_service").val(value["TIPO_SERVICIO_DESC"]);
                            $("#service_secador_modelo").val(value["SECADOR_MODELO"]);
                            $("#service_secador_nro_serie").val(value["SECADOR_NRO_SERIE"]);
                            $("#service_secador_punto_rocio").val(value["SECADOR_PUNTO_ROCIO"]);
                            $("#service_secador_voltaje_amp").val(value["SECADOR_VOLTAJE_AMP"]);
                            $("#service_secador_proteccion").val(value["SECADOR_PROTECCION"]);
                            $("#service_secador_limpieza").val(value["SECADOR_LIMPIEZA"]);
                            $("#service_secador_tipo_refrigeracion").val(value["SECADOR_TIPO_REFRIGERACION"]);
                            $("#vsd_00_20rpm").val(value["VSD_00_20RPM"]);
                            $("#vsd_20_40rpm").val(value["VSD_20_40RPM"]);
                            $("#vsd_40_60rpm").val(value["VSD_40_60RPM"]);
                            $("#vsd_60_80rpm").val(value["VSD_60_80RPM"]);
                            $("#vsd_80_100rpm").val(value["VSD_80_100RPM"]);
                            $("#service_secador_nota").val(value["SECADOR_NOTA"]);
                            if (VSD_MEDIDA_RPM!=0){
                                $("#id_tecnologia_vsd").prop("checked", true);
                                $(".cls_tecnologia_vsd").show();
                                if (VSD_MEDIDA_RPM==='H'){
                                    $("#id_Tecnologis_vsd_horas").prop("checked", true);
                                    $(".tipo_tec_vsd").text("(H)")
                                }else{
                                    $("#id_Tecnologis_vsd_porc").prop("checked", true);
                                    $(".tipo_tec_vsd").text("(%)")
                                }
                            }
                        });
                        $("#kt_seguimiento_menu, .cls_step_2").show();
                        $(".cls_step_ot").hide();
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
        async function ActualizarReporteFinal(){
            $("#kt_form_input_page_3 .cls_empty").empty();
            $("#kt_form_input_page_5 .cls_empty").empty();
            $("#kt_form_input_page_6 .cls_empty").empty();
            $("#kt_form_input_page_3 input").removeClass("input_danger_border");      
            beforeSendBtnLoad("#btnactualizarFinal");
            const data = new FormData();
            /////*******ini
            var pushInicialImages =[]
            var pushInicialNuevoImages =[]
            var cantidadInicialUpdFotos =0;
            var cantidadInicialUpdNuevoFotos =0;
            $(".ki_images_select.cls_editar").each(function(i, val){
                var children = $(this).children();
                var dataEstado = children.attr("data-estado");
                var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
                var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
                var val_nombre_original =$(this).children(".cls_nombre_original").val();
                var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
                var val_id =$(this).children(".cls_id").val();
                var val_estado_ver_reporte =0;
                if (dataEstado=='active'){
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
                pushInicialImages.push({
                    tipo_archivo: val_tipo_archivo,
                    nombre_archivo : val_nombre_archivo, 
                    nombre_original: val_nombre_original,
                    ruta_relativa: val_ruta_relativa,
                    estado_ver_reporte: val_estado_ver_reporte,
                    id: val_id
                });
       		});
            $(".ki_images_select.cls_nuevo").each(function(i, val){
                var children = $(this).children();
                var dataEstado = children.attr("data-estado");
                var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
                var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
                var val_nombre_original =$(this).children(".cls_nombre_original").val();
                var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
                var val_id =$(this).children(".cls_id").val();
                var val_estado_ver_reporte =0;
                if (dataEstado=='active'){
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdNuevoFotos++;
                }
                pushInicialNuevoImages.push({
                    tipo_archivo: val_tipo_archivo,
                    nombre_archivo : val_nombre_archivo, 
                    nombre_original: val_nombre_original,
                    ruta_relativa: val_ruta_relativa,
                    estado_ver_reporte: val_estado_ver_reporte,
                    id: val_id
                });
       		});
            var cantidadInicialUpdSumaFotos = cantidadInicialUpdFotos +cantidadInicialUpdNuevoFotos;
            if (cantidadInicialUpdSumaFotos!=4){
                Toast.fire({
                    icon: 'warning',
                    title: "Campo vacio: seleccione 4 fotos iniciales como mínimo para actualizar" 
                }); 
                beforeSendBtnLoad("#btnactualizarFinal", false);
                return;
            }
            /////*******fin
            var pushFinalImages =[]
            var cantidadFinalFotos = 0;
            $(".ki_images_final_select").each(function(i, val){
                var children = $(this).children();
                var dataEstado = children.attr("data-estado");
                var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
                var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
                var val_nombre_original =$(this).children(".cls_nombre_original").val();
                var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
                var val_estado_ver_reporte =0;                
                if (dataEstado=='active'){
                    val_estado_ver_reporte=1;
                    cantidadFinalFotos++;
                }
                pushFinalImages.push({
                    tipo_archivo: val_tipo_archivo,
                    nombre_archivo : val_nombre_archivo, 
                    nombre_original: val_nombre_original,
                    ruta_relativa: val_ruta_relativa,
                    estado_ver_reporte: val_estado_ver_reporte
                });
       		});
            if (cantidadFinalFotos!=4){
                Toast.fire({
                    icon: 'warning',
                    title: "Campo vacio: seleccione 4 fotos finales como mínimo." 
                }); 
                beforeSendBtnLoad("#btnactualizarFinal", false);
                return;
            }
            var pushFirmaImages =[]
            var cantidadFirma = 0;
            $(".kt_signature_datos").each(function(i, val){
                var children = $(this).children();
                var val_tipo_firma =$(this).children(".cls_tipo_firma").val();
                var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
                var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
                var val_nombre_original =$(this).children(".cls_nombre_original").val();
                var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
                
                if (val_tipo_archivo != undefined) {
                    cantidadFirma++;
                    pushFirmaImages.push({
                        tipo_firma: val_tipo_firma,
                        tipo_archivo: val_tipo_archivo,
                        nombre_archivo : val_nombre_archivo, 
                        nombre_original: val_nombre_original,
                        ruta_relativa: val_ruta_relativa
                    });
                }
       		});
            if (cantidadFirma!=2){
                Toast.fire({
                    icon: 'warning',
                    title: "Campo vacio: falta la firma del cliente y la firma del técnico." 
                }); 
                beforeSendBtnLoad("#btnactualizarFinal", false);
                return;
            }
            const dataEmailContact =[];
            var counterContactEmail=0;
            $("#kt_selected_email .kt_uni_cnt_email").each(function(i, val){
                var email = $(this).data("email");
                counterContactEmail++;
                dataEmailContact.push({
                    email: email
                });
            });
            if (counterContactEmail==0){
                Toast.fire({
                    icon: 'warning',
                    title: "Seleccione un contacto para el envio de correo por favor." 
                }); 
                beforeSendBtnLoad("#btnactualizarFinal", false);
                return;
            }
            const id_tecnico_02=$("#servicio_tenico2").val();
            const verifi_tipo_aceite_usado=$("#verificacion_tipo_aceite_usado").val();
            const verifi_est_aceite=$("#verificacion_estado_aceite").val();
            const verifi_est_separado=$("#verificacion_estado_separador").val();
            const verifi_est_fajas_acopl=$("#verificacion_estado_fajas_acoplamiento").val();
            const vida_de_aceite=$("#vida_de_aceite").val();
            const vida_de_filtro_aceite=$("#vida_de_filtro_aceite").val();
            const vida_de_filtro_aire=$("#vida_de_filtro_aire").val();
            const vida_de_separador=$("#vida_de_separador").val();            
            data.append('_token', $("input[name='_token']").val());
            data.append("reporte_numero",$("#idreportenumero").val());
            data.append("reporte_orden_trabajo",$("#service_ot").val());
            data.append("nombre_tecnico_responsable_02",$("#servicio_tenico2 option:selected").text());
            data.append("id_tecnico_02",id_tecnico_02=="0"?'':id_tecnico_02);
            data.append("id_obl",$("#id_obl").val());
            data.append("empresa_nombre", $("#service_razon_social").val());
            data.append("ruc",$("#service_ruc").val());
            data.append("empresa_direccion",$("#service_direccion").val());
            data.append("empresa_telefono",$("#service_tel_cliente").val());
            data.append("empresa_email",$("#service_email_cliente").val());
            data.append("equipo_id",$("#service_equipo_id").val()); 
            data.append("equipo_referencia",$("#service_equipo").val()  );
            data.append("equipo_modelo", $("#service_equipo_modelo").val() );
            data.append("equipo_nro_serie", $("#service_equipo_serie").val() );
            data.append("equipo_modulo_tipo",$("#service_equipo_modelo_tipo").val() ); 
            data.append("equipo_presion", $("#service_equipo_presion").val() );
            data.append("equipo_caudal", $("#service_equipo_caudal").val() );
            data.append("equipo_rpm",$("#service_equipo_rpm").val() );
            data.append("equipo_horometro",$("#service_equipo_horometro").val());
            data.append("tipo_servicio_desc",$("#service_tipo_service").val()); 
            data.append("tipo_servicio_arranque_inicial",'');
            data.append("tipo_servicio_mantenimiento",'');
            data.append("tipo_servicio_evaluacion",'');
            data.append("tipo_servicio_reparacion",'');
            data.append("tipo_servicio_asesoria",'');
            data.append("tipo_servicio_overhaul",'');
            data.append("tipo_servicio_alquiler",'');
            data.append("secador_modelo",$("#service_secador_modelo").val());
            data.append("secador_nro_serie",$("#service_secador_nro_serie").val());
            data.append("secador_punto_rocio",$("#service_secador_punto_rocio").val());
            data.append("secador_voltaje_amp",$("#service_secador_voltaje_amp").val());
            data.append("secador_proteccion",$("#service_secador_proteccion").val());
            data.append("secador_limpieza",$("#service_secador_limpieza").val());
            data.append("secador_tipo_refrigeracion",$("#service_secador_tipo_refrigeracion").val());
            data.append("secador_nota",$("#service_secador_nota").val());
            data.append("imagesDatos",JSON.stringify(pushFinalImages));
            data.append("imagesInicialDatos",JSON.stringify(pushInicialImages));
            data.append("imagesInicialNuevoDatos",JSON.stringify(pushInicialNuevoImages));

            data.append("verificacion_tipo_aceite_usado",verifi_tipo_aceite_usado=="0"?'':verifi_tipo_aceite_usado);
            data.append("verificacion_estado_aceite",verifi_est_aceite=="0"?'':verifi_est_aceite); 
            data.append("verificacion_estado_separador",verifi_est_separado=="0"?'':verifi_est_separado); 
            data.append("verificacion_estado_fajas_acoplamiento",verifi_est_fajas_acopl=="0"?'':verifi_est_fajas_acopl);
            data.append("verificacion_estado_de_limpieza",$("#verificacion_estado_de_limpieza").val());
            data.append("verificacion_estado_filtro_de_aceite",$("#verificacion_estado_filtro_de_aceite").val());
            data.append("verificacion_estado_filtro_de_aire",$("#verificacion_estado_filtro_de_aire").val());
            data.append("medicion_voltaje_ul1l2",$("#medicion_voltaje_ul1l2").val());
            data.append("medicion_voltaje_ul2l3",$("#medicion_voltaje_ul2l3").val());
            data.append("medicion_voltaje_ul1l3",$("#medicion_voltaje_ul1l3").val());
            data.append("medicion_amperaje_l1",$("#medicion_amperaje_l1").val());
            data.append("medicion_amperaje_l2",$("#medicion_amperaje_l2").val());
            data.append("medicion_amperaje_l3",$("#medicion_amperaje_l3").val());
            data.append("medicion_amperaje_f1",$("#medicion_amperaje_f1").val());
            data.append("medicion_amperaje_f2",$("#medicion_amperaje_f2").val());
            data.append("medicion_amperaje_f3",$("#medicion_amperaje_f3").val());
            data.append("thermomagnetico",$("#thermomagnetico").val());
            data.append("linea_a_tierra",$("#linea_a_tierra").val());
            data.append("voltaje_del_modulo",$("#voltaje_del_modulo").val());
            data.append("motor_electrico_i_marca",$("#motor_electrico_i_marca").val());
            data.append("motor_electrico_i_voltaje",$("#motor_electrico_i_voltaje").val());
            data.append("motor_electrico_i_amperaje",$("#motor_electrico_i_amperaje").val());
            data.append("motor_electrico_i_fs",$("#motor_electrico_i_fs").val());
            data.append("motor_electrico_i_rpm",$("#motor_electrico_i_rpm").val());
            data.append("motor_electrico_ii_marca",$("#motor_electrico_ii_marca").val());
            data.append("motor_electrico_ii_voltaje",$("#motor_electrico_ii_voltaje").val());
            data.append("motor_electrico_ii_amperaje",$("#motor_electrico_ii_amperaje").val());
            data.append("motor_electrico_ii_fs",$("#motor_electrico_ii_fs").val());
            data.append("motor_electrico_ii_rpm",$("#motor_electrico_ii_rpm").val());
            data.append("motor_electrico_iii_marca",$("#motor_electrico_iii_marca").val());
            data.append("motor_electrico_iii_voltaje",$("#motor_electrico_iii_voltaje").val());
            data.append("motor_electrico_iii_amperaje",$("#motor_electrico_iii_amperaje").val());
            data.append("motor_electrico_iii_fs",$("#motor_electrico_iii_fs").val());
            data.append("motor_electrico_iii_rpm",$("#motor_electrico_iii_rpm").val());
            data.append("vida_de_aceite",vida_de_aceite=="0"?'':vida_de_aceite);
            data.append("vida_de_filtro_aceite",vida_de_filtro_aceite=="0"?'':vida_de_filtro_aceite);
            data.append("vida_de_filtro_aire",vida_de_filtro_aire=="0"?'':vida_de_filtro_aire);
            data.append("vida_de_separador",vida_de_separador=="0"?'':vida_de_separador);
            data.append("vida_de_engrase_motor",$("#vida_de_engrase_motor").val());
            data.append("regulaciones_presion_carga",$("#regulaciones_presion_carga").val());
            data.append("regulaciones_de_descarga",$("#regulaciones_de_descarga").val());
            data.append("regulaciones_de_tiempo",$("#regulaciones_de_tiempo").val());
            data.append("regulaciones_nro_arranques",$("#regulaciones_nro_arranques").val());
            data.append("regulaciones_retardo_carga",$("#regulaciones_retardo_carga").val());
            data.append("regulaciones_pto_de_ajuste",$("#regulaciones_pto_de_ajuste").val());
            data.append("temperatura_elemento1",$("#temperatura_elemento1").val());
            data.append("temperatura_elemento2",$("#temperatura_elemento2").val());
            data.append("temperatura_aceite",$("#temperatura_aceite").val());
            data.append("presion_de_aceite",$("#presion_de_aceite").val());
            data.append("presion_intermedia",$("#presion_intermedia").val());
            data.append("temperatura_ent_elemento2",$("#temperatura_ent_elemento2").val());
            data.append("temperatura_sal_aire",$("#temperatura_sal_aire").val());
            data.append("descripcion_del_trabajo", $("#descripcion_del_trabajo").val());
            data.append("recomendaciones",$("#recomendaciones").val());
            data.append("horas_de_viaje",$("#horas_de_viaje").val());
            data.append("horas_extras",$("#horas_extras").val());
            data.append("nombre_jefe_encargado", $("#id_nombre_jefe_encargado").val()); 
            data.append("horas_de_trabajo", "");
            data.append("copia", "");
            data.append("temperatura_ambiente", "");
            data.append("vsd_00_20rpm", $("#vsd_00_20rpm").val());
            data.append("vsd_20_40rpm", $("#vsd_20_40rpm").val());
            data.append("vsd_40_60rpm", $("#vsd_40_60rpm").val());
            data.append("vsd_60_80rpm", $("#vsd_60_80rpm").val());
            data.append("vsd_80_100rpm", $("#vsd_80_100rpm").val());
            data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
            data.append("imagesFirma",JSON.stringify(pushFirmaImages));
            data.append("dataEmailContact",JSON.stringify(dataEmailContact));
            const response = await fetch(`${APP_URL}/reporte/actualizar-final`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                const rest = await response.json();
                const datos = rest.data;
                const type = rest.type;
                const status = rest.status;
                const icon = rest.icon;
                const message = rest.message;
                beforeSendBtnLoad("#btnactualizarFinal", false);
                if(type==="empty"){
                    $txtEmpty = '';
                    $.each( datos, function( key, value ) {
                        $txtEmpty = value;
                        if (key != undefined) {
                            //$('#error_'+key).append(value);
                            $(`#kt_form_input_page_3 input[name='${key}'], 
                            #kt_form_input_page_3 select[name='${key}'],
                            #kt_form_input_page_3 textarea[name='${key}']
                            `).parent().children(".cls_empty").append(value);
                            $(`#kt_form_input_page_5 input[name='${key}'], 
                            #kt_form_input_page_5 textarea[name='${key}']
                            `).parent().children(".cls_empty").append(value);
                            $(`#kt_form_input_page_6 input[name='${key}'], 
                            #kt_form_input_page_6 textarea[name='${key}']
                            `).parent().children(".cls_empty").append(value);
                            //$("#kt_form_input_page_2 input[name='"+key+"']").addClass("input_danger_border");
                        }
                    });
                    Toast.fire({
                        icon: 'warning',
                        title: "Campo vacio: " +$txtEmpty
                    });
                    return;
                }
                if (status){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        Swal.fire({
                            icon: icon1,
                            title: message1,
                            showConfirmButton: true,
                            timer: 5000
                        });
                        empty3Form();
                        $("#kt_seguimiento_menu, .cls_step_2").hide();
                        $(".cls_step_ot").show();
                        await getOT();
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
        //*******************************************FINAL********************************************///
        $(document).on("change", ".filenameonFinalchage", async function(e){
            const $this = $(this);
            const datosFiles = new FormData();
            var nameFileR = '';
            const files = e.target.files;
            var sumaSizeFile = 0;
            var sizeMB =10;
            ///const data_file_index = e.target.getAttribute('data-file_index');
            for(let index = 0; index <files.length; index++){
                datosFiles.append('files[]', files[index]);
                const archivos = e.target.files;
                const primerArchivo = archivos[index];
                const objectURL = URL.createObjectURL(primerArchivo);            
                const size = archivos[index].size;
                const type = archivos[index].type;
                sumaSizeFile+=size;           
            }
            if (sumaSizeFile>sizeMB*1000000){
                Toast.fire({
                    icon: 'error',
                    title: 'El archivo no debe superar los '+sizeMB+'MB.'
                });
                return;
            }
            $("#spiner_upload_final_images").show();
            datosFiles.append('_token', $("input[name='_token']").val());
            //var tarhe = e.target.parentElement.nextElementSibling.children[0]; 
            //const response = await fetch(`http://localhost/back-mrpe-develop/public/api/servicio/request-file`, {
            const response = await fetch(`${APP_URL_BK}/api/servicio/request-file`, {
            //const response = await fetch(`${APP_URL}/servicio/request-file`, {
                method: 'POST',
                body: datosFiles
            }).then(async (response)=> {
                const rest = await response.json();
                var datos = rest;
                var icon = rest.icon;
                var status = rest.status;
                var message = rest.message;    
                $("#spiner_upload_final_images").hide();          
                if (status){
                    var data = rest.data;                 
                    const IdUploadFinalImg = $("#IdUploadFinalImg").html();
                    const createElemntoImg = document.createElement("div");
                    createElemntoImg.classList.add('col-md-3');
                    createElemntoImg.classList.add('col-sm-4');
                    createElemntoImg.classList.add('fv-row');
                    createElemntoImg.classList.add('px-8');
                    createElemntoImg.classList.add('pt-3');
                    createElemntoImg.setAttribute("id", "IdUploadFinalImg");
                    createElemntoImg.innerHTML = IdUploadFinalImg;
                    var classActiveCheck = '';
                    var classBtnActiveCheck = ' ';
                    var htmlContenImg='';
                    var APP_URL_IMG_BK = APP_URL_BK.replace('index.php', '');
                    $.each( data, function( key, value ) {
                        contadorIFinalmg1=contadorIFinalmg1+1;
                        if (contadorIFinalmg1>=1 && contadorIFinalmg1<=4){
                            classActiveCheck = 'active';
                            classBtnActiveCheck =' checked ';
                        }
                        htmlContenImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_images_final_select">
                                    <div class="position-absolute cls_check_final_photo ${classActiveCheck}" data-estado="${classActiveCheck}" > 
                                        <i class="bi bi-check2 fs-2x"></i>
                                    </div>
                                    <input type="hidden"  class="d-none cls_tipo_archivo" value="${value["tipo_archivo"]}" >
                                    <input type="hidden"  class="d-none cls_nombre_archivo" value="${value["nombre_archivo"]}">
                                    <input type="hidden"  class="d-none cls_nombre_original" value="${value["nombre_original"]}">
                                    <input type="hidden"  class="d-none cls_ruta_relativa" value="${value["ruta_relativa"]}">
                                    <div  class="btn btn-outline btn-outline-dashed btn-outline-default w-100 active p-0 image-input" >
                                        <div data-image="${APP_URL_IMG_BK}${value["ruta_relativa"]}" class="image-input-wrapper w-100 h-120px background-size-cover" style="border-radius: 0.475rem 0.475rem 0 0;background-image: url(${APP_URL_IMG_BK}${value["ruta_relativa"]})" ></div> 
                                        <div class="d-flex align-items-stretch cls-btn-option-images" >
                                            <button class="btn btn-sm p-1 btn-dark w-100 tk_delete_image_final_sesion" data-name=${value["nombre_archivo"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                                <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin"></i>
                                            </button>
                                            <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                                <label class="form-check form-check-custom d-block ">
                                                    <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_check_image_final_sesion" type="checkbox" name="" value="" >
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    $("#kt_list_final_images").append(htmlContenImg);
                    document.getElementById("kt_list_final_images").append(createElemntoImg);
                    $("#IdUploadFinalImg").remove();
                    validar4FinalImages()
                }
            })
            //href={REACT_APP_REST_BACK+rsfiles.nombre_archivo}
            .catch(function (error){
                console.log(error)
            });
        });

        function validar4FinalImages(){
            var count_ = 0;
            $(".ki_images_final_select").each(function(i, val){
                var thisclas = $(this).children().attr("data-estado");
                var thisclas1 = $(this).children();
                if (thisclas=='active'){
                    count_++;
                }
       		});
            $(".btn-stepper-next").prop("disabled", true);
            $(".btk_check_image_final_sesion").each(function(i, val){
                if(!$(this).is(":checked")){
                    $(this).parent().parent().prop("disabled", false);
                }
            });
            if (count_>=4){
                $(".btn-stepper-next").prop("disabled", false);
                $(".btk_check_image_final_sesion").each(function(i, val){
                    if(!$(this).is(":checked")){
                        $(this).parent().parent().prop("disabled", true);
                    }
                });
            }
            console.log(count_);
            return count_;
        }
        $(document).on("click", ".btk_check_image_final_sesion", async function(event){
            var children = $(this).parent().parent().parent().parent().parent().children(".cls_check_final_photo");
            var thisActive = children.attr("data-estado");
            $btk_image_sesion = $(this);
            if (thisActive=='active'){
                children.attr("data-estado", "").removeClass("active");
            }else{
                children.attr("data-estado", "active").addClass("active");
            }
            validar4FinalImages();
        });
        async function EliminarFinalArchivo(dataNombre, $this){
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('nombre_archivo', dataNombre);
            const response = await fetch(`${APP_URL}/servicio/delete-file`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                const rest = await response.json();
                const datos = rest.data;
                const status = rest.status;
                if(status){
                    const status1 = rest.data.status;
                    Toast.fire({
                        icon: rest.data.icon,
                        title: rest.data.message
                    });
                    $this.parent().parent().parent().remove();
                    validar4FinalImages()
                    contadorIFinalmg1=contadorIFinalmg1-1;
                    return;
                }
                Toast.fire({
                    icon: rest.icon,
                    title: rest.message
                });
                              
            }).catch((error) => {
                console.log(error)
            });
        }
        
        $(document).on("click", ".tk_delete_image_final_sesion", async function(event){
            var dataNombre = $(this).data("name");
            var $this = $(this);
            Swal.fire({
                buttonsStyling:!1,
                showDenyButton: true,
                text: "¿Estas seguro que desea eliminar este archivo?",
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
                    EliminarFinalArchivo(dataNombre, $this);
                }
            }));
        });

        $(document).on("click", "#IdSavedatatoDataURL", async function(event){
            beforeSendBtnLoad("#IdSavedatatoDataURL");
            const opt = $(this).attr("data-opt");
            const $canvas = document.getElementById("canvanIdData");
            const datatoDataURL = $canvas.toDataURL("image/png");
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('imagen', datatoDataURL);
            data.append('opt', opt);
            const response = await fetch(`${APP_URL}/servicio/datatoDataURL`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                beforeSendBtnLoad("#IdSavedatatoDataURL",false);
                const rest = await response.json();
                console.log(rest); 
                const datos = rest.data;
                const status = rest.status;
                if(status){
                    const status1 = rest.data.status;
                    if (status1){
                        const ruta_relativa = rest.data.data.ruta_relativa;
                        const tipo_archivo = rest.data.data.tipo_archivo;
                        const nombre_archivo = rest.data.data.nombre_archivo;
                        const nombre_original = rest.data.data.nombre_original;
                        var APP_URL_IMG_BK = APP_URL_BK.replace('index.php', '');
                        if (opt==="customer"){
                            $("#idFirmaCliente").attr("src",`${APP_URL_IMG_BK }/${ruta_relativa}` ).show();
                            $("#kt_signature_customer").html(
                                `<input type="hidden" class="cls_tipo_firma" value="${opt}">
                                <input type="hidden" class="cls_ruta_relativa" value="${ruta_relativa}">
                                 <input type="hidden" class="cls_tipo_archivo" value="${tipo_archivo}">
                                 <input type="hidden" class="cls_nombre_archivo" value="${nombre_archivo}">
                                 <input type="hidden" class="cls_nombre_original" value="${nombre_original}">  
                                `
                            );
                        }else{
                            $("#idFirmaTecnico").attr("src",`${APP_URL_IMG_BK }/${ruta_relativa}` ).show();
                            $("#kt_signature_technican").html(
                                `<input type="hidden" class="cls_tipo_firma" value="${opt}">
                                <input type="hidden" class="cls_ruta_relativa" value="${ruta_relativa}" >
                                 <input type="hidden" class="cls_tipo_archivo" value="${tipo_archivo}">
                                 <input type="hidden" class="cls_nombre_archivo" value="${nombre_archivo}">
                                 <input type="hidden" class="cls_nombre_original" value="${nombre_original}">  
                                `
                            );
                        }
                        $('#kt_modal_firma_cliente').modal("hide");
                        signaturePadMRPeru();
                    }
                    Toast.fire({
                        icon: rest.data.icon,
                        title: rest.data.message
                    });
                    return;
                }
                Toast.fire({
                    icon: rest.icon,
                    title: rest.message
                });     
            }).catch((error) => {
                console.log(error)
            });
        })
        $(document).on("click", ".btn-option-firma", async function(event){
            $('#kt_modal_firma_cliente').modal("show");
            const opt = $(this).data("opt");
            $("#IdSavedatatoDataURL").attr("data-opt",opt)
            setTimeout(() => {
                signaturePadMRPeru();
            }, 500);
        });
        $(document).on("click", ".btn-close-signature", async function(event){
            $('#kt_modal_firma_cliente').modal("hide");
        });
        function resumenRporte(){
            $("#id_resumen_empresa_nombre").text($("input[name='empresa_nombre']").val());
            $("#id_resumen_ruc").text($("input[name='ruc']").val());
            $("#id_resumen_empresa_direccion").text($("input[name='empresa_direccion']").val());
            $("#id_resumen_empresa_telefono").text($("input[name='empresa_telefono']").val());
            $("#id_resumen_equipo_referencia").text($("input[name='equipo_referencia']").val());
            $("#id_resumen_equipo_modelo").text($("input[name='equipo_modelo']").val());
            $("#id_resumen_equipo_nro_serie").text($("input[name='equipo_nro_serie']").val());
            $("#id_resumen_equipo_modulo_tipo").text($("input[name='equipo_modulo_tipo']").val());
            $("#id_resumen_equipo_presion").text($("input[name='equipo_presion']").val());
            $("#id_resumen_equipo_caudal").text($("input[name='equipo_caudal']").val());
            $("#id_resumen_equipo_rpm").text($("input[name='equipo_rpm']").val());
            $("#id_resumen_equipo_horometro").text($("input[name='equipo_horometro']").val());
            $("#id_resumen_secador_modelo").text($("input[name='secador_modelo']").val());
            $("#id_resumen_secador_nro_serie").text($("input[name='secador_nro_serie']").val());
            $("#id_resumen_secador_punto_rocio").text($("input[name='secador_punto_rocio']").val());
            $("#id_resumen_secador_voltaje_amp").text($("input[name='secador_voltaje_amp']").val());
            $("#id_resumen_secador_proteccion").text($("input[name='secador_proteccion']").val());
            $("#id_resumen_secador_limpieza").text($("input[name='secador_limpieza']").val());
            $("#id_resumen_secador_tipo_refrigeracion").text($("input[name='secador_tipo_refrigeracion']").val());
            $("#id_resumen_secador_nota").text($("input[name='secador_nota']").val());
            $("#id_resumen_verificacion_tipo_aceite_usado").text($("select[name='verificacion_tipo_aceite_usado']").val());
            $("#id_resumen_verificacion_estado_aceite").text($("select[name='verificacion_estado_aceite']").val());
            $("#id_resumen_verificacion_estado_separador").text($("select[name='verificacion_estado_separador']").val());
            $("#id_resumen_verificacion_estado_fajas_acoplamiento").text($("select[name='verificacion_estado_fajas_acoplamiento']").val());
            $("#id_resumen_verificacion_estado_de_limpieza").text($("textarea[name='verificacion_estado_de_limpieza']").val());
            $("#id_resumen_verificacion_estado_filtro_de_aceite").text($("textarea[name='verificacion_estado_filtro_de_aceite']").val());
            $("#id_resumen_verificacion_estado_filtro_de_aire").text($("textarea[name='verificacion_estado_filtro_de_aire']").val());
            $("#id_resumen_medicion_voltaje_ul1l2").text($("input[name='medicion_voltaje_ul1l2']").val());
            $("#id_resumen_medicion_voltaje_ul2l3").text($("input[name='medicion_voltaje_ul2l3']").val());
            $("#id_resumen_medicion_voltaje_ul1l3").text($("input[name='medicion_voltaje_ul1l3']").val());
            $("#id_resumen_medicion_amperaje_l1").text($("input[name='medicion_amperaje_l1']").val());
            $("#id_resumen_medicion_amperaje_l2").text($("input[name='medicion_amperaje_l2']").val());
            $("#id_resumen_medicion_amperaje_l3").text($("input[name='medicion_amperaje_l3']").val());
            $("#id_resumen_medicion_amperaje_f1").text($("input[name='medicion_amperaje_f1']").val());
            $("#id_resumen_medicion_amperaje_f2").text($("input[name='medicion_amperaje_f2']").val());
            $("#id_resumen_medicion_amperaje_f3").text($("input[name='medicion_amperaje_f3']").val());
            $("#id_resumen_thermomagnetico").text($("input[name='thermomagnetico']").val());
            $("#id_resumen_linea_a_tierra").text($("input[name='linea_a_tierra']").val());
            $("#id_resumen_voltaje_del_modulo").text($("input[name='voltaje_del_modulo']").val());
            $("#id_resumen_motor_electrico_i_marca").text($("input[name='motor_electrico_i_marca']").val());
            $("#id_resumen_motor_electrico_i_voltaje").text($("input[name='motor_electrico_i_voltaje']").val());
            $("#id_resumen_motor_electrico_i_amperaje").text($("input[name='motor_electrico_i_amperaje']").val());
            $("#id_resumen_motor_electrico_i_fs").text($("input[name='motor_electrico_i_fs']").val());
            $("#id_resumen_motor_electrico_i_rpm").text($("input[name='motor_electrico_i_rpm']").val());
            $("#id_resumen_motor_electrico_ii_marca").text($("input[name='motor_electrico_ii_marca']").val());
            $("#id_resumen_motor_electrico_ii_voltaje").text($("input[name='motor_electrico_ii_voltaje']").val());
            $("#id_resumen_motor_electrico_ii_amperaje").text($("input[name='motor_electrico_ii_amperaje']").val());
            $("#id_resumen_motor_electrico_ii_fs").text($("input[name='motor_electrico_ii_fs']").val());
            $("#id_resumen_motor_electrico_ii_rpm").text($("input[name='motor_electrico_ii_rpm']").val());
            $("#id_resumen_motor_electrico_iii_marca").text($("input[name='motor_electrico_iii_marca']").val());
            $("#id_resumen_motor_electrico_iii_voltaje").text($("input[name='motor_electrico_iii_voltaje']").val());
            $("#id_resumen_motor_electrico_iii_amperaje").text($("input[name='motor_electrico_iii_amperaje']").val());
            $("#id_resumen_motor_electrico_iii_fs").text($("input[name='motor_electrico_iii_fs']").val());
            $("#id_resumen_motor_electrico_iii_rpm").text($("input[name='motor_electrico_iii_rpm']").val());
            $("#id_resumen_vida_de_aceite").text($("select[name='vida_de_aceite']").val());
            $("#id_resumen_vida_de_filtro_aceite").text($("select[name='vida_de_filtro_aceite']").val());
            $("#id_resumen_vida_de_filtro_aire").text($("select[name='vida_de_filtro_aire']").val());
            $("#id_resumen_vida_de_separador").text($("select[name='vida_de_separador']").val());
            $("#id_resumen_vida_de_engrase_motor").text($("input[name='vida_de_engrase_motor']").val());
            $("#id_resumen_regulaciones_presion_carga").text($("input[name='regulaciones_presion_carga']").val());
            $("#id_resumen_regulaciones_de_descarga").text($("input[name='regulaciones_de_descarga']").val());
            $("#id_resumen_regulaciones_de_tiempo").text($("input[name='regulaciones_de_tiempo']").val());
            $("#id_resumen_regulaciones_nro_arranques").text($("input[name='regulaciones_nro_arranques']").val());
            $("#id_resumen_regulaciones_retardo_carga").text($("input[name='regulaciones_retardo_carga']").val());
            $("#id_resumen_regulaciones_pto_de_ajuste").text($("input[name='regulaciones_pto_de_ajuste']").val());
            $("#id_resumen_temperatura_elemento1").text($("input[name='temperatura_elemento1']").val());
            $("#id_resumen_temperatura_elemento2").text($("input[name='temperatura_elemento2']").val());
            $("#id_resumen_temperatura_aceite").text($("input[name='temperatura_aceite']").val());
            $("#id_resumen_presion_de_aceite").text($("input[name='presion_de_aceite']").val());
            $("#id_resumen_presion_intermedia").text($("input[name='presion_intermedia']").val());
            $("#id_resumen_temperatura_ent_elemento2").text($("input[name='temperatura_ent_elemento2']").val());
            $("#id_resumen_temperatura_sal_aire").text($("input[name='temperatura_sal_aire']").val());
        }
        //listarCorreoContacto("20100094135");
        async function listarCorreoContacto(ruc){
            $("#kt_listar_correo_contacto").html('');
            $("#kt_listar_jefe_contact").html('');
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('ruc', ruc);
            const response = await fetch(`${APP_URL}/contacto/contacto-email-by-ruc`, {
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
                        var $html_lista_correo_cnt = '';
                        var $html_lista_jefe_cnt = '';
                        //$("#spiner-lits-ot").hide();
                        var counterEmail = 0;
                        $.each( datos, function( key, value ) {
                            counterEmail++;
                            $html_lista_correo_cnt+= `<div class="d-flex justify-content-between kt_list_cnt_email">
                                <div class="fv-row mx-10">
                                    <span class="fw-bold fs-6">${value["Contacto_Email"]}</span>
                                    <div class="fw-bold text-gray-600 text-nombre-contact">${value["Contacto_Desc"]}</div>
                                </div>
                                <div class="fv-row mx-10 each_chk">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox" value="${value["Contacto_Email"]}" id="kt_modal_email_contact_${counterEmail}"/>
                                        <label class="form-check-label" for="kt_modal_email_contact_${counterEmail}">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>`;
                            $html_lista_jefe_cnt+= `<div class="d-flex justify-content-between">
                                <div class="fv-row mx-10">
                                    <span class="fw-bold fs-6">${value["Contacto_Desc"]}</span>
                                </div>
                                <div class="fv-row mx-10 each_chk">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="user_jefe_chk" type="radio" value="${value["Contacto_Desc"]}" id="kt_modal_jefe_contact_${counterEmail}"/>
                                        <label class="form-check-label" for="kt_modal_jefe_contact_${counterEmail}">
                                            <div class="text-gray-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>`;
                        });
                        $("#kt_listar_correo_contacto").html( $html_lista_correo_cnt );
                        $("#kt_listar_jefe_contact").html($html_lista_jefe_cnt );
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
        $(document).on("click", "#email_conact", async function(event){
            $('#kt_modal_contacto_correo').modal("show");
        });
        $(document).on("click", ".modal_close_correo_contact", async function(event){
            $('#kt_modal_contacto_correo').modal("hide");
        });        
        $(document).on("click", "#modal_select_correc_contact", async function(event){
            $html_each_correo ='';
            var datoContact =[];
            $("#kt_listar_correo_contacto .kt_list_cnt_email").each(function(i, val){
                var $this = $(this).children(".each_chk").children().children("input");
                var $nombreContact= $(this).children().children(".text-nombre-contact").text();
                if($this.is(":checked")){
                    console.log("$this "+$this.val());
                    $html_each_correo+= `<div data-email=${$this.val()} class="d-flex justify-content-between kt_uni_cnt_email">
                        <div class="fv-row mx-10">
                            <span class="fw-bold fs-6">${$this.val()}</span>
                            <div class="fw-bold text-gray-600 ">${$nombreContact}</div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-2"></div>`;
                    datoContact.push($this.val());
                }
            });
            $("#email_conact").val(datoContact.join('; '));
            $("#kt_selected_email").html($html_each_correo);
            $('#kt_modal_contacto_correo').modal("hide");
        });
        var contador_add_contact=0;
        $(document).on("click", "#id_save_add_email", async function(event){
            var add_email_contact = $("#add_email_contact").val();
            var add_name_contact = $("#add_name_contact").val();
            var add_chk_contact = $("#add_chk_contact").is(":checked")? 1:0;
            var countcorreocomparar =0;
            $("#kt_listar_correo_contacto .kt_list_cnt_email").each(function(i, val){
                var $correocontacto = $(this).children(".each_chk").children().children("input").val();
                var $nombreContact= $(this).children().children(".text-nombre-contact").text();
                if (add_email_contact===$correocontacto){
                    countcorreocomparar++;
                }
            });
            if(countcorreocomparar>0){
                Toast.fire({
                    icon: 'error',
                    title:'Este correo ya existe en la lista de contactos.'
                });
                return;
            }
            var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
            if(!validEmail.test($('#add_email_contact').val() ) ){
                Toast.fire({
                    icon: 'error',
                    title:'Ingrese un correo válido'
                });
                return;
            }
            $html_add_correo_cnt='';
            contador_add_contact++;
            $html_add_correo_cnt+= `<div class="d-flex justify-content-between kt_list_cnt_email">
                <div class="fv-row mx-10">
                    <span class="fw-bold fs-6">${add_email_contact}</span>
                    <div class="fw-bold text-gray-600 text-nombre-contact">${add_name_contact}</div>
                </div>
                <div class="fv-row mx-10 each_chk">
                    <div class="form-check form-check-custom form-check-solid">
                        <input ${add_chk_contact==1?'checked':''} class="form-check-input me-3 chk_input_email" name="user_role_chk" type="checkbox" value="${add_email_contact}" id="kt_modal_email_contact_${contador_add_contact}"/>
                        <label class="form-check-label" for="kt_modal_email_contact_${contador_add_contact}">
                            <div class="text-gray-600"></div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="separator separator-dashed my-2"></div>`;
            $("#kt_listar_correo_contacto").prepend( $html_add_correo_cnt );
        });
        $(document).on("click", "#id_nombre_jefe_encargado", async function(event){
            $('#kt_modal_jefe_contacto').modal("show");
        });
        $(document).on("click", ".modal_close_jefe_contact", async function(event){
            $('#kt_modal_jefe_contacto').modal("hide");
        });   
        var conountejefe=0;
        $(document).on("click", "#id_save_add_jefe_contact", async function(event){
            conountejefe++;
            var add_jefe_contact = $("#add_jefe_contact").val();
            $html_lista_jefe_cnt=`<div class="d-flex justify-content-between">
                    <div class="fv-row mx-10">
                        <span class="fw-bold fs-6">${add_jefe_contact}</span>
                    </div>
                    <div class="fv-row mx-10 each_chk">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input me-3" name="user_jefe_chk" type="radio" value="${add_jefe_contact}" id="kt_modal_jefe_contact_${conountejefe}"/>
                            <label class="form-check-label" for="kt_modal_jefe_contact_${conountejefe}">
                                <div class="text-gray-600"></div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-2"></div>`;
            $("#kt_listar_jefe_contact").prepend($html_lista_jefe_cnt );
        }) 
        $(document).on("click", "#modal_select_jefe_contact", async function(event){
            var user_jefe_chk = $('input[name="user_jefe_chk"]:checked').val();
            $("#id_nombre_jefe_encargado").val(user_jefe_chk);
            $('#kt_modal_jefe_contacto').modal("hide");
        });
        $(document).on("click", "#id_tecnologia_vsd", async function(event){
            if($(this).is(":checked")){
                $(".cls_tecnologia_vsd").show();
            }else{
                $(".cls_tecnologia_vsd").hide();
            }
        });  
        $(document).on("click", "input[name='id_Tecnologis_vsd']", async function(event){
            var tipo_tec = $('input[name="id_Tecnologis_vsd"]:checked').val();
            tipo_tec=='H'?$(".tipo_tec_vsd").text("(H)"):$(".tipo_tec_vsd").text("(%)");
        });          
    })
</script>
@endpush