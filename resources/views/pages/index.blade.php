@extends('master.master')
@section('title', 'Usuarios - Ventas')
@section('contentHeaderLeft')
    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Servicio
        <span class="h-20px border-gray-300 border-start mx-4"></span>
    </h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="javascript:void()" class="text-muted text-hover-primary">Crear</a>
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
                <div class="btn btn-sm btn-icon btn-active-color-primary" id="modal_close_Producto"  >
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 pt-15">
                <form class="form position-relative" novalidate="novalidate" id="kt_modal_create_producto_form">
                    <div class="mask-content position-absolute"></div>
                    <input type="hidden" id="idProducto" name="idProducto">
                    <div class="row" >
                        <div class="col-xl-12 col-md-12 col-sm-12 mb-8 form_validate" >
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="0" id="kt_modal_update_role_option_0" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="text-gray-600">Increase impression traffic onto the platform</div>
                                    </label>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" disabled name="user_role" type="checkbox" value="1" id="kt_modal_update_role_option_1" checked='checked' />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="text-gray-600">Increase community interaction and communication</div>
                                    </label>
                                </div>
                            </div> 
                        </div>
                    </div>
                </form>
                <div class="text-center">
                    <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">
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
@endsection()
@section('content')
    <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">
            
        </div>
    </div>
    <div class="row g-5 g-xl-8">
        
        <div class="col-md-4 col-sm-6">
            <div class="card card-xl-stretch">
                <div class="card-body pt-5">
                    <div class="d-flex flex-stack">
                        <h4 class="fw-bolder text-gray-800 m-0">Total</h4>
                    </div>
                    <div style="height: 300px" class="d-flex text-center flex-column text-info pt-8 w-100">
                        <h1 class="text-center m-0 " id="id_total" data-kt-countup="true"  data-kt-countup-prefix="" style="font-size: 58px;">0</h1>
                        <h3 class="text-center mb-10"  >Total de servicio</h3>
                    </div>
                    <div class="text-center w-100 position-relative z-index-1" style="margin-top: -130px">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 ">
            <div class="card card-xl-stretch mb-xl-8">
                <div class="card-body pt-5">
                    <div class="d-flex flex-stack">
                        <h4 class="fw-bolder text-gray-800 m-0">Nuevo</h4>
                    </div>
                    <div class="d-flex flex-center w-100">
                        <div class="col-md-2 fv-row cls_spinner ">
                            <span class="indicator-progress d-block text-center">
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </div>
                        <div id="widgets_1" class="mixed-widget-17-chart" data-kt-chart-color="primary" style="height: 300px"></div>
                    </div>
                    
                    <div class="text-center w-100 position-relative z-index-1" style="margin-top: -130px">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 ">
            <div class="card card-xl-stretch mb-xl-8">
                <div class="card-body pt-5">
                    <div class="d-flex flex-stack">
                        <h4 class="fw-bolder text-gray-800 m-0">Pendientes</h4>
                    </div>
                    <div class="d-flex flex-center w-100">
                        <div class="col-md-2 fv-row cls_spinner ">
                            <span class="indicator-progress d-block text-center">
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </div>
                        <div id="widgets_2" class="mixed-widget-17-chart" data-kt-chart-color="danger" style="height: 300px"></div>
                    </div>
                    <div class="text-center w-100 position-relative z-index-1" style="margin-top: -130px">
                    </div>
                </div>
            </div>
        </div>
        
    </div>  
    <div class="row g-5 g-xl-8">
        <div class="col-md-4 col-sm-6">
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <div class="card-body pt-5">
                    <div class="d-flex flex-stack">
                        <h4 class="fw-bolder text-gray-800 m-0">Completados</h4>
                    </div>
                    <div class="d-flex flex-center w-100">
                        <div class="col-md-2 fv-row cls_spinner ">
                            <span class="indicator-progress d-block text-center">
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </div>
                        <div id="widgets_3" class="mixed-widget-17-chart" data-kt-chart-color="success" style="height: 300px"></div>
                    </div>
                    <div class="text-center w-100 position-relative z-index-1" style="margin-top: -130px">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <div class="card-body pt-5">
                    <div class="d-flex flex-stack">
                        <h4 class="fw-bolder text-gray-800 m-0">Tasa de Exíto</h4>
                    </div>
                    <div class="d-flex flex-center w-100">
                        <div class="col-md-2 fv-row cls_spinner ">
                            <span class="indicator-progress d-block text-center">
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </div>
                        <div id="widgets_4" class="mixed-widget-17-chart" data-kt-chart-color="info" style="height: 300px"></div>
                    </div>
                    <div class="text-center w-100 position-relative z-index-1" style="margin-top: -130px">
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    
@endsection()
@push('script')
<script>
    $(document).ready(async function (){
        $('#kt_modal_create_productos').modal({ backdrop: 'static', keyboard: false });
        //$('#kt_modal_create_productos').modal("show");
        $(document).on("click", "#kt_modal_accept_condition", async function(event){
            $('#kt_modal_create_productos').modal("hide");
        });          
    
        await getOT();
        async function getOT(){
            $(".cls_spinner").show();
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            const response = await fetch(`${APP_URL}/service/ot-by-tecnico`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                $(".cls_spinner").hide();
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
                        $Total =0;
                        $Nuevo =0;
                        $Pendiente =0;
                        $Completado =0;
                        $tasaExito =0;
                        $.each( datos, function( key, value ){
                            $Total++;
                            $REPORTE_ESTADO = value["REPORTE_ESTADO"];
                            if ($REPORTE_ESTADO==="NUEVO"){
                                $Nuevo++;
                            }
                            if ($REPORTE_ESTADO==="PENDIENTE"){
                                $Pendiente++;
                            }
                            if ($REPORTE_ESTADO==="COMPLETADO"){
                                $Completado++;
                            }
                        });
                        $porNuevo =($Nuevo / $Total) * 100;
                        $porPendiente =($Pendiente / $Total) * 100;
                        $porCompletado =($Completado / $Total) * 100;
                        $porTasaExito =($Completado / $Total) * 100;
                        setTimeout(() => {
                            $("#id_total").html($Total);
                            $("#id_total").attr("data-kt-countup-value",$Total);
                            
                        }, 1200);
                        widget("#widgets_1", $porNuevo, $Nuevo+"/"+$Total);
                        widget("#widgets_2", $porPendiente, $Pendiente+"/"+$Total);
                        widget("#widgets_3", $porCompletado, $Completado+"/"+$Total);
                        widget("#widgets_4", $porTasaExito, $porTasaExito+"%");
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
        
        function widget(querySelectorAll, serie, value){
            var widgets_1 = document.querySelectorAll(querySelectorAll);
            [].slice.call(widgets_1).map(function (widgets_1) {
                var t = parseInt(KTUtil.css(widgets_1, "height"));
                if (widgets_1) {
                    var a = widgets_1.getAttribute("data-kt-chart-color"),
                        o = {
                            labels: ["Total"],
                            series: [serie],
                            chart: { fontFamily: "inherit", height: t, type: "radialBar", offsetY: 0 },
                            plotOptions: {
                                radialBar: {
                                    startAngle: -90,
                                    endAngle: 90,
                                    hollow: { margin: 0, size: "70%" },
                                    dataLabels: {
                                        showOn: "always",
                                        name: { show: !0, fontSize: "12px", fontWeight: "700", offsetY: -5, color: KTUtil.getCssVariableValue("--bs-gray-500") },
                                        value: {
                                            color: KTUtil.getCssVariableValue("--bs-gray-900"),
                                            fontSize: "24px",
                                            fontWeight: "600",
                                            offsetY: -40,
                                            show: !0,
                                            formatter: function (e) {
                                                return value;
                                            },
                                        },
                                    },
                                    track: { background: KTUtil.getCssVariableValue("--bs-gray-300"), strokeWidth: "100%" },
                                },
                            },
                            colors: [KTUtil.getCssVariableValue("--bs-" + a)],
                            stroke: { lineCap: "round" },
                        };
                    new ApexCharts(widgets_1, o).render();
                }
            });
        }
    })
    
            
</script>
@endpush