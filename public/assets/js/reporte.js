
$(document).ready(async function (){
    localStorage.removeItem('id_reporte_serie');
    var contadorImg1=0;
    var contadorIFinalmg1 =0;
    var contadorsecadorImg1=0;
    var contadorsecadorIFinalmg1 =0;
    $('#kt_modal_create_productos, #kt_modal_firma_cliente, #kt_modal_contacto_correo').modal({ backdrop: 'static', keyboard: false });
    //$('#kt_modal_create_productos').modal("show");
    $(document).on("click", "#btn_close_see_images", async function(event){
        $('#kt_modal_see_images').modal("hide");
    });
    $(document).on("click", ".cls_modal_close_condition", async function(event){
        $('#kt_modal_create_productos').modal("hide");
    });
    await getOT();
    await listarTipoModulo();
    await listarTipoRefrigerante();
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
    var countador_secador = 0;
    $(document).on("click", ".btn-stepper-next", function(event){
        window.scrollTo(0, 0);
        validar4Images();
        resumenRporte();
        $("#btnSaveData").hide();
        $("#btnactualizarFinal").hide().prop("disabled", true);
        $("#btnaGuardarSalir").hide();
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
            $("#btnaGuardarSalir").hide().attr("data-paso", "paso_1");
        } else if (countador_ == 1) {
            countador_ = 2;
            $('#page_1').removeClass('current');
            $('#page_2').addClass('current');
            $(".btn-stepper-next").show();
            //$(".btn-stepper-nextnot").prop("disabled", true);
            $(".btn-stepper-previous").show();
            $('#page_content_1').removeClass('current');
            $('#page_content_2').addClass('current');
            $("#btnaGuardarSalir").show().attr("data-paso", "paso_2");
            /*
            $("#btnSaveData").show().prop("disabled", false);
            if(btnNext=="NUEVO"){
                $(".btn-stepper-nextnot").prop("disabled", true);
                $(".btn-stepper-next").hide();
            }else{
                $(".btn-stepper-nextnot").prop("disabled", false);
                $(".btn-stepper-next").show();
            }*/
            
        }else if (countador_ == 2) {
            /*countador_ = 3;
            $('#page_2').removeClass('current');
            $('#page_3').addClass('current');
            $(".btn-stepper-next").show();
            $(".btn-stepper-previous").show();
            $('#page_content_2').removeClass('current');
            $('#page_content_3').addClass('current');
            */
            //validacionpas02()
            $("#btnaGuardarSalir").show();
            ActualizarReportePaso2();
            //$(".btn-stepper-nextnot").prop("disabled", true);
        }else if (countador_ == 3) {
            //validacionpas04();
            $("#btnaGuardarSalir").show();
            ActualizarReportePaso3();
            AdDescripcionTrabajo();
        }else if (countador_ == 4) {
            /*countador_ = 5;
            $('#page_4').removeClass('current');
            $('#page_5').addClass('current');
            $(".btn-stepper-next").show();
            $(".btn-stepper-previous").show();
            $('#page_content_4').removeClass('current');
            $('#page_content_5').addClass('current');
            */
            $("#btnaGuardarSalir").show();
            guardarFotosFinalesPaso4();
        }else if (countador_ == 5) {
            $("#btnaGuardarSalir").show();
            actualizarReportePaso5()
        } else if (countador_ == 6) {
            countador_ = 0;
            $('#page_6').removeClass('current')
            $('#page_0').addClass('current')
            $(".btn-stepper-next").show();
            $(".btn-stepper-previous").hide();
            $('#page_content_6').removeClass('current');
            $('#page_content_0').addClass('current');
            $("#btnaGuardarSalir").hide().attr("data-paso", 0);

        } 
    });
    
    $(document).on("click", ".btn-stepper-previous", function(event){
        window.scrollTo(0, 0);
        resumenRporte();
        validar4Images();
        $("#btnSaveData").hide();
        $("#btnactualizarFinal").hide().prop("disabled", true);
        $("#btnaGuardarSalir").hide();
        var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado");
        if (countador_ == 1) {
            Swal.fire({
                buttonsStyling:!1,
                showDenyButton: true,
                text: "¿Estas seguro que desea regresar?",
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
                    $("#btnaGuardarSalir").hide().attr("data-paso", 0);
                    $("#kt_modal_create_compresor").show();
                    $("#kt_modal_create_secador").hide();
                }
            }));
        } else if (countador_ == 2) {    
            $("#btnaGuardarSalir").show();        
            guardarSaliRegresarReportePaso2('previous');
        }else if (countador_ == 3) {
            $("#btnaGuardarSalir").show();        
            guardarSaliRegresarReportePaso3("previous")
        }else if (countador_ == 4) {
            countador_ = 3;
            $('#page_3').addClass('current')
            $('#page_4').removeClass('current')
            $(".btn-stepper-previous").show();
            $(".btn-stepper-next").show();
            $('#page_content_3').addClass('current');
            $('#page_content_4').removeClass('current');
            $("#btnaGuardarSalir").show().attr("data-paso", "paso_3");
        }else if (countador_ == 5) {
            $("#btnaGuardarSalir").show();        
            guardarSaliRegresarReportePaso5("previous")
        }else if (countador_ == 6) {
            countador_ = 5;
            $('#page_5').addClass('current')
            $('#page_6').removeClass('current')
            $(".btn-stepper-previous").show();
            $(".btn-stepper-next").show();
            $('#page_content_5').addClass('current');
            $('#page_content_6').removeClass('current');
            $("#btnaGuardarSalir").show().attr("data-paso", "paso_5");
        }else if (countador_ == 0) {
            countador_ = 6;
            $('#page_6').addClass('current')
            $('#page_0').removeClass('current')
            $(".btn-stepper-previous").hide();
            $(".btn-stepper-next").show();
            $('#page_content_6').addClass('current');
            $('#page_content_0').removeClass('current');
            $("#btnactualizarFinal").show().prop("disabled", false);
            $("#btnaGuardarSalir").hide().attr("data-paso", "paso_6");
        }
    });
    function validarPaso3(){

        $("#regulaciones_programadas input").each(function(i, val){
            var valor = $(this).val();
        });
    }
    async function validacionpas04(){
        $(".cls_empty").empty();
        const data = new FormData();
        each_kit_push_valvulas =[];            
        $(".each_kit_valvulas").each(function(i, val){
            var valor = $(this).is(":checked");
            if ( $(this).is(":checked")){
                each_kit_push_valvulas.push({
                    valor:valor
                });
            }
        })
        $("#name_kit_valvulas").val('');
        if (each_kit_push_valvulas.length>0){
            $("#name_kit_valvulas").val(1);
        }
        each_kit_filtro_push_linea =[];
        $(".each_kit_filtro_linea").each(function(i, val){
            var valor1 = $(this).is(":checked");
            if ( $(this).is(":checked")){
                each_kit_filtro_push_linea.push({
                    valor:valor1
                });
            }  
        });
        $("#name_kit_filtro_linea").val('');
        if (each_kit_filtro_push_linea.length>0){
            $("#name_kit_filtro_linea").val(1);
        }
        data.append('_token', $("input[name='_token']").val());
        const id_tecnico_02=$("#servicio_tenico2").val();
        const verifi_tipo_aceite_usado=$("#verificacion_tipo_aceite_usado").val();
        const verifi_est_aceite=$("#verificacion_estado_aceite").val();
        const verifi_est_separado=$("#verificacion_estado_separador").val();
        const verifi_est_fajas_acopl=$("#verificacion_estado_fajas_acoplamiento").val();
        const verificacion_estado_filtro_de_aceite=$("#verificacion_estado_filtro_de_aceite").val();
        const verificacion_estado_filtro_de_aire=$("#verificacion_estado_filtro_de_aire").val();
        const vida_de_aceite=$("#vida_de_aceite").val();
        const vida_de_filtro_aceite=$("#vida_de_filtro_aceite").val();
        const vida_de_filtro_aire=$("#vida_de_filtro_aire").val();
        const vida_de_separador=$("#vida_de_separador").val();
        const verificacion_estado_de_limpieza=$("#verificacion_estado_de_limpieza").val();
        const vida_de_engrase_motor=$("#vida_de_engrase_motor").val();
        data.append("verificacion_tipo_aceite_usado",verifi_tipo_aceite_usado=="0"?'':verifi_tipo_aceite_usado);
        data.append("verificacion_estado_aceite",verifi_est_aceite=="0"?'':verifi_est_aceite); 
        data.append("verificacion_estado_separador",verifi_est_separado=="0"?'':verifi_est_separado); 
        data.append("verificacion_estado_fajas_acoplamiento",verifi_est_fajas_acopl=="0"?'':verifi_est_fajas_acopl);
        data.append("verificacion_estado_de_limpieza",verificacion_estado_de_limpieza=="0"?'':verificacion_estado_de_limpieza);
        data.append("verificacion_estado_filtro_de_aceite",verificacion_estado_filtro_de_aceite=="0"?'':verificacion_estado_filtro_de_aceite);
        data.append("verificacion_estado_filtro_de_aire",verificacion_estado_filtro_de_aire=="0"?'':verificacion_estado_filtro_de_aire);
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
        data.append("voltaje_de_control",$("#voltaje_de_control").val());
        data.append("voltaje_del_modulo",$("#voltaje_del_modulo").val());
        data.append("motor_electrico_i_marca",$("#motor_electrico_i_marca").val());
        data.append("motor_electrico_i_voltaje",$("#motor_electrico_i_voltaje").val());
        data.append("motor_electrico_i_amperaje",$("#motor_electrico_i_amperaje").val());
        data.append("motor_electrico_i_fs",$("#motor_electrico_i_fs").val());
        data.append("motor_electrico_i_rpm",$("#motor_electrico_i_rpm").val());
        data.append("vida_de_aceite",vida_de_aceite=="0"?'':vida_de_aceite);
        data.append("vida_de_filtro_aceite",vida_de_filtro_aceite=="0"?'':vida_de_filtro_aceite);
        data.append("vida_de_filtro_aire",vida_de_filtro_aire=="0"?'':vida_de_filtro_aire);
        data.append("vida_de_separador",vida_de_separador=="0"?'':vida_de_separador);
        data.append("vida_de_engrase_motor",vida_de_engrase_motor=="0"?'':vida_de_engrase_motor);
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
        data.append("kitvalvulas_cambio", $("#id_kit_valvulas").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_cambio", $("#id_kit_filtro_linea").is(":checked")?'X':'');  
        data.append("name_kit_valvulas",$("#name_kit_valvulas").val() ); 
        data.append("name_kit_filtro_linea",$("#name_kit_filtro_linea").val()); 
        data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
        const response = await fetch(`${APP_URL}/reporte/validar-paso3`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            const rest = await response.json();
            const status1 = rest.status;  
            if (!status1){
                const type = rest.type;
                const icon = rest.icon;
                const data = rest.data;
                if(type==="empty"){
                    $txtEmpty = '';
                    $.each( data, function( key, value ) {
                        $txtEmpty = value;
                        if (key != undefined) {
                            $("#kt_form_input_page_3 input[name='"+key+"'], #kt_form_input_page_3 select[name='"+key+"'], #kt_form_input_page_3 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
                        }
                    });
                    Toast.fire({
                        icon: 'warning',
                        title: "Campo vacio: " +$txtEmpty
                    });
                    return;
                }
            }else{
                countador_ = 4;
                $('#page_3').removeClass('current');
                $('#page_4').addClass('current');
                $(".btn-stepper-next").show();
                $(".btn-stepper-previous").show();
                $('#page_content_3').removeClass('current');
                $('#page_content_4').addClass('current');
                validar4FinalImages()
            }  
            
        }).catch((error) => {
            Toast.fire({
                icon: 'error',
                title:error
            });
        });
    }
    $(document).on("change", ".filenameonchage", async function(e){
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
        //var myHeaders = new Headers();
        //myHeaders.append("Accept", "application/json");
        //myHeaders.append("Authorization", "Bearer "+$("#id_token").val());
        const id_tecnico_01=$("#servicio_tenico1").val();
        datosFiles.append('_token', $("input[name='_token']").val());
        datosFiles.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));
        datosFiles.append("programacionid",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"));
        datosFiles.append("id_tecnico_01",id_tecnico_01=="0"?'':id_tecnico_01);
        datosFiles.append("tipo_registro",'inicio');
        //var tarhe = e.target.parentElement.nextElementSibling.children[0]; 
        const response = await fetch(`${APP_URL_BK}/api/servicio/request-file`, {
            method: 'POST',
            //headers: myHeaders,
            body: datosFiles,
            //redirect: 'follow'
        }).then(async (response)=> {
            const rest = await response.json();
            var datos = rest;
            var icon = rest.icon;
            var status = rest.status;
            var message = rest.message;    
            $("#spiner-upload-images").hide();          
            if (status){
                var data = rest.data;                 
                var latest = rest.latest;                 
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
                    classActiveCheck = 'active';
                    classBtnActiveCheck =' checked ';
                    htmlContenImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_images_select cls_nuevo">
                                <div class="position-absolute cls_check_photo ${classActiveCheck}" data-estado="${classActiveCheck}" > 
                                    <i class="bi bi-check2 fs-2x"></i>
                                </div>
                                <input type="hidden"  class="d-none cls_tipo_archivo" value="${value["tipo_archivo"]}" >
                                <input type="hidden"  class="d-none cls_nombre_archivo" value="${value["nombre_archivo"]}">
                                <input type="hidden"  class="d-none cls_nombre_original" value="${value["nombre_original"]}">
                                <input type="hidden"  class="d-none cls_ruta_relativa" value="${value["ruta_relativa"]}">
                                <input type="hidden"  class="d-none cls_id" value="${latest}">
                                <div  class="btn btn-outline btn-outline-dashed btn-outline-default w-100 active p-0 image-input" >
                                    <div data-image="${APP_URL_IMG_BK}${value["ruta_relativa"]}" class="image-input-wrapper w-100 h-120px background-size-cover" style="border-radius: 0.475rem 0.475rem 0 0;background-image: url(${APP_URL_IMG_BK}${value["ruta_relativa"]})" ></div> 
                                    <div class="d-flex align-items-stretch cls-btn-option-images" >
                                        <button class="btn btn-sm p-1 btn-dark w-100 tk_delete_image_sesion ${value["name_cls"]} " data-opt="nuevo" data-cls="${value["name_cls"]}" data-name=${value["nombre_archivo"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                            <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin indicator-label"></i>
                                            <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                            <label class="form-check form-check-custom d-block ">
                                                <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_check_image_sesion ${value["name_cls"]+'inp'}" data-cls="${value["name_cls"]+'inp'}" type="checkbox" name="" value="" >
                                                <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                $("#inicio_contador_imag").val(contadorImg1);
            }else{
                Toast.fire({
                    icon: 'error',
                    title: rest.message
                });
            }
        })
        //href={REACT_APP_REST_BACK+rsfiles.nombre_archivo}
        .catch(function (error){
            console.log(error)
        });
    })      
    async function EliminarArchivo(dataNombre, $this, dataCls){
        beforeSendBtnLoad("."+dataCls);
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('nombre_archivo', dataNombre["dataNombre"]);
        data.append('id', dataNombre["id"]);
        data.append('estado_ver_reporte', 0);
        data.append('estado', 0);
        const response = await fetch(`${APP_URL}/servicio/delete-file`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            beforeSendBtnLoad("."+dataCls, false);
            const rest = await response.json();
            const datos = rest.data;
            const status = rest.status;
            if(status){
                const status1 = rest.data.status;
                const message = rest.data.message
                if (message==="Unauthenticated."){
                    Toast.fire({
                        icon: 'error',
                        title: message
                    });
                    return;
                }
                Toast.fire({
                    icon: rest.data.icon,
                    title: message
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
    async function EliminarArchivoMultiple(dataNombre, $this, dataCls){
        beforeSendBtnLoad("."+dataCls);
        $this.parent().parent().parent().attr("data-delete", true).hide();
        validar4Images()
        contadorImg1=contadorImg1-1;
        return;
    }
    $(document).on("click", ".tk_delete_image_sesion", async function(event){
        var dataNombre = $(this).data("name");
        var dataCls = $(this).data("cls");
        var dataOpt = $(this).data("opt");
        var $this = $(this);
        var val_id =$(this).parent().parent().parent().children(".cls_id").val();
        var arr = [];
        arr["dataNombre"]=dataNombre;
        arr["id"]=val_id;
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
                EliminarArchivo(arr, $this, dataCls);
                return;
                if(dataOpt==="nuevo"){
                    EliminarArchivo(arr, $this, dataCls);
                }else{
                    EliminarArchivoMultiple(dataNombre, $this, dataCls)
                }
            }
        }));
    });
    function validar4Images(){
        var count_ = 0;
        $(".ki_images_select").each(function(i, val){
            var thisclas = $(this).children().attr("data-estado");
            var estatus_delete =$(this).attr("data-delete");
            var thisclas1 = $(this).children();
            if (thisclas=='active'){
                if (estatus_delete!=="true"){
                    count_++;
                }
            }
        });
        $(".btn-stepper-next").prop("disabled", true);
        $(".btk_check_image_sesion").each(function(i, val){
            if(!$(this).is(":checked")){
                $(this).parent().parent().prop("disabled", false);
            }
        });
        const select_sr_tipo_servicio= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo_servicio').children('p').text();
        if (select_sr_tipo_servicio==="REVISION" ||select_sr_tipo_servicio==="ALQUILER" || select_sr_tipo_servicio==="ARRANQUE"){
            $(".btn-stepper-next").prop("disabled", false);
        }else{
            if (count_>=4){
                $(".btn-stepper-next").prop("disabled", false);
            }
        }
        return count_;
    }
    $(document).on("click", ".ki_images_select .image-input .image-input-wrapper, .ki_images_final_select .image-input .image-input-wrapper, .ki_secador_images_select .image-input .image-input-wrapper, .ki_secador_images_final_select .image-input .image-input-wrapper", async function(event){
        $("#kt_modal_see_images").modal("show"); 
        var dataImage =$(this).data("image");
        $("#kt_show_images").attr("src", dataImage)
    });
    $(document).on("click", ".btk_check_image_sesion", async function(event){
        var $this = $(this);
        var dataCls = $this.attr("data-cls");
        var estado_ver_reporte = 0;
        if($this.is(":checked")){
            var estado_ver_reporte = 1;
        }
        var val_id = $this.parent().parent().parent().parent().parent().children(".cls_id").val();
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('id',val_id);
        data.append('estado_ver_reporte', estado_ver_reporte);
        data.append('estado', 1);
        beforeSendInputLoad("."+dataCls);
        const response = await fetch(`${APP_URL}/servicio/check-ver-reporte-foto`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            beforeSendInputLoad("."+dataCls, false);
            const rest = await response.json();
            const datos = rest.data;
            const status = rest.status;
            if(status){
                const status1 = rest.data.status;
                const message = rest.data.message
                if (message==="Unauthenticated."){
                    Toast.fire({
                        icon: 'error',
                        title: message
                    });
                    return;
                }                
                var children = $this.parent().parent().parent().parent().parent().children(".cls_check_photo");
                var thisActive = children.attr("data-estado");
                $btk_image_sesion = $this;
                if (thisActive=='active'){
                    children.attr("data-estado", "").removeClass("active");
                }else{
                    children.attr("data-estado", "active").addClass("active");
                }
                validar4Images();
                return;
            }
            Toast.fire({
                icon: rest.icon,
                title: rest.message
            });
                            
        }).catch((error) => {
            console.log(error)
        });
    });
    async function getOT(){
        $("#kt_list_ot").html('');
        $("#spiner-lits-ot").show(); 
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('opcion', $("#id_tipo_ot").val());
        const response = await fetch(`${APP_URL}/service/ot-by-tecnico`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            const rest = await response.json();
            const status1 = rest.status;
            $("#spiner-lits-ot").hide();             
            if (status1){
                const status1 = rest.data.status;
                const icon1 = rest.data.icon;
                const message1 = rest.data.message;
                const data1 = rest.data.data;
                var counterOt = 0;
                if (status1){
                    const datos = rest.data.data;
                    var $html_list_ot = '';
                    $.each( datos, function( key, value ) {
                        counterOt++;
                        $kc_res_list_ot = ' kc_list_ot ';
                        $cssOpcity = ' ';
                        $REPORTE_NUMERO = value["REPORTE_NUMERO"];
                        $REPORTE_ESTADO = value["REPORTE_ESTADO"];
                        $TIPO_EQUIPO = value["TIPO_EQUIPO"];
                        $bgEstado = '';
                        if ($TIPO_EQUIPO==="S"){
                            $REPORTE_ESTADO = value["REPORTE_ESTADO_SECADOR"];
                            $REPORTE_NUMERO = value["NUM_REPORTE_SECADOR"];
                        }else if ($TIPO_EQUIPO==="C"){
                            $REPORTE_ESTADO = value["REPORTE_ESTADO"];
                            $REPORTE_NUMERO = value["REPORTE_NUMERO"];
                        }
                        if($REPORTE_ESTADO==="NUEVO"){
                            $bgEstado = ' badge-primary ';
                        }else if($REPORTE_ESTADO==="PENDIENTE"){
                            $kc_res_list_ot=' kc_list_ot ';
                            $bgEstado = ' badge-danger ';
                        }else if($REPORTE_ESTADO==="COMPLETADO"){
                            $bgEstado = ' badge-success ';
                            $kc_res_list_ot=' kc_list_ot ';
                        }

                        $html_list_ot+= `<div class="col-md-6 col-sm-12 fv-row ${$kc_res_list_ot}" 
                        data-programacionid=${value["PROGRAMACIONID"]}
                        data-numot=${value["NUMOT"]}
                        data-ruc=${value["RUC"]}
                        data-reporte_numero=${$REPORTE_NUMERO}
                        data-reporte_estado=${$REPORTE_ESTADO}
                        data-equipo_referencia=${value["REFERENCIA"]}
                        data-equipo_marca=${value["EQUIPO"]}
                        data-fecha_inicio=${value["FECHA_INICIO"]}
                        data-fecha_inicio_vista=${value["FECHA_INICIO_VISTA"]}
                        data-usuario_login=${value["USUARIO_LOGIN"]}
                        data-tipo_equipo=${value["TIPO_EQUIPO"]}
                        data-tipo_servicio=${value["TIPO_SERVICIO"]}
                        
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
                                            <small class="fw-bold text-muted fs-4 d-none select_sr_referencia">Referencia: <p class="m-0 d-inline-block select_ot">${value["REFERENCIA"]}</p> </small>
                                            <small class="fw-bold text-muted fs-4 d-none select_sr_tipo_servicio">Referencia: <p class="m-0 d-inline-block select_ot">${value["TIPO_SERVICIO"]}</p> </small>
                                            <small class="fw-bold text-muted fs-4 d-none select_sr_equipo_id"><p class="m-0 d-inline-block select_ot">${value["EQUIPO_ID"]}</p> </small>
                                            <small class="fw-bold text-muted fs-4 d-none select_sr_equipo_marca"><p class="m-0 d-inline-block select_ot">${value["EQUIPO"]}</p> </small>
                                            <h3 class="dfs-3 fs-2 fw-bolder mb-1 select_sr_razon_social">${value["RAZON_SOCIAL"]} </h3>
                                            <small class="fw-bold text-muted fs-4 select_sr_ruc"> <p class="m-0 d-inline-block select_sr_ruc">${value["RUC"]}</p> </small>  <br>  
                                            <small class="fw-bold text-muted fs-4 select_sr_ot">OT - <p class="m-0 d-inline-block select_ot">${value["NUMOT"]}</p> </small> <br> 
                                            <small class="fw-bold text-muted fs-4 select_sr_hora_inicio">Hora Inicio: <p class="m-0 d-inline-block select_ot">${value["HoraInicio_Id"]}</p> </small> <br>  
                                            <small class="fw-bold text-muted fs-4 select_sr_tipo">Tipo: <p class="m-0 d-inline-block select_ot">${value["TIPO_SERVICIO_COTIZACION"]}</p> </small> <br>  
                                            <small class="fw-bold text-muted fs-4 select_sr_local">Local: <p class="m-0 d-inline-block select_ot">${value["LOCAL_NOMBRE"]}</p> </small> <br>  
                                            <small class="fw-bold text-muted fs-4 select_sr_direccion">Dirección: <p class="m-0 d-inline-block select_ot">${value["LOCAL_DIRECCION"]}</p> </small> <br>  
                                            <small class="fw-bold text-muted fs-4 select_sr_contacto">Contacto: <p class="m-0 d-inline-block select_ot">${value["CONTACTO_NOMBRE"]}</p> </small> <br>  
                                            <small class="fw-bold text-muted fs-4 select_sr_telefono">Télefono: <p class="m-0 d-inline-block select_ot">${value["CONTACTO_TELEFONO"]}</p> </small> <br>                                              
                                            <small class="fw-bold text-muted fs-4 select_sr_modelo">Modelo: <p class="m-0 d-inline-block select_modelo">${value["MODELO"]}</p>  </small>  <br>                                          
                                            <small class="fw-bold text-muted fs-4 select_sr_serie">Serie: <p class="m-0 d-inline-block select_serie">${value["SERIE"]} </p>  </small> <br>                                     
                                            <small class="fs-4 mt-2 select_sr_reporte_estado badge ${$bgEstado}">${$REPORTE_ESTADO}</small>                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>`;
                    });
                    $("#kt_list_ot").html( $html_list_ot );
                }else{
                    Toast.fire({
                        icon: 'error',
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
    async function getReporteByNumero(numero_reporte, $this){
        spinnerOt($this);
        $("#kt_seguimiento_menu li a").text('');
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('reporte_numero', numero_reporte);
        data.append('reporte_serie', '004');
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
                    var PROGRAMACIONID='';
                    var NUMOT='';
                    $.each( datos, function( key, value ) {        
                        $("#dni_teccnico, #secador_dni_teccnico").val(value["ID_TECNICO_02"]);
                        var REPORTE_SERIE = value["REPORTE_SERIE"];
                        var VSD_MEDIDA_RPM= value["VSD_MEDIDA_RPM"];
                        var KITVALVULAS_CAMBIO= value["KITVALVULAS_CAMBIO"];
                        var KITVALVULAS_AMISION= value["KITVALVULAS_AMISION"];
                        var KITVALVULAS_TERMOSTATICA= value["KITVALVULAS_TERMOSTATICA"];
                        var KITVALVULAS_MINIMAPRESION= value["KITVALVULAS_MINIMAPRESION"];
                        var KITVALVULAS_CHECK= value["KITVALVULAS_CHECK"];
                        var KITVALVULAS_PARADAACEITE= value["KITVALVULAS_PARADAACEITE"];
                        var KITVALVULAS_LINEABARRIDO= value["KITVALVULAS_LINEABARRIDO"];
                        var KITVALVULAS_TRAMPAGUA= value["KITVALVULAS_TRAMPAGUA"];
                        var KITVALVULAS_SOLENOIDE= value["KITVALVULAS_SOLENOIDE"];
                        var KITFILTROSLINEA_CAMBIO= value["KITFILTROSLINEA_CAMBIO"];
                        var KITFILTROSLINEA_DD= value["KITFILTROSLINEA_DD"];
                        var KITFILTROSLINEA_QD= value["KITFILTROSLINEA_QD"];
                        var KITFILTROSLINEA_DDP= value["KITFILTROSLINEA_DDP"];
                        var KITFILTROSLINEA_PD= value["KITFILTROSLINEA_PD"];
                        var KITFILTROSLINEA_QDT= value["KITFILTROSLINEA_QDT"];
                        var KITFILTROSLINEA_UDPLUS= value["KITFILTROSLINEA_UDPLUS"];
                        var KITFILTROSLINEA_PDP= value["KITFILTROSLINEA_PDP"];
                        $("#service_show_fecha1, #service_show_fecha2").val(value["REPORTE_FECHA_SERVICIO"]);
                        $("#service_fecha").val(value["REPORTE_FECHA_SERVICIO_VALOR"]).trigger('change.select2');
                        $("#service_ot").val(value["REPORTE_ORDEN_TRABAJO"]);
                        $("#servicio_tenico2").val(value["ID_TECNICO_02"]).trigger('change.select2');
                        $("#service_razon_social").val(value["EMPRESA_NOMBRE"]);
                        $("#service_ruc").val(value["RUC"]);
                        $("#service_direccion").val(value["EMPRESA_DIRECCION"]);
                        $("#service_tel_cliente").val(value["EMPRESA_TELEFONO"]);
                        $("#service_email_cliente").val(value["EMPRESA_EMAIL"]);
                        $("#service_equipo_id").val(value["EQUIPO_ID"]);
                        $("#service_equipo_marca").val(value["EQUIPO_MARCA"]);
                        $("#service_equipo_referencia").val(value["EQUIPO_REFERENCIA"]);
                        $("#service_equipo_modelo").val(value["EQUIPO_MODELO"]);
                        $("#service_equipo_serie").val(value["EQUIPO_NRO_SERIE"]);
                        //$("#service_equipo_modelo_tipo").val(value["EQUIPO_MODULO_TIPO"]).trigger('change.select2');
                        $("#service_equipo_modelo_tipo").val(0).trigger('change.select2');
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
                        //$("#service_secador_tipo_refrigeracion").val(value["SECADOR_TIPO_REFRIGERACION"]).trigger('change.select2');
                        $("#service_secador_tipo_refrigeracion").val(0).trigger('change.select2');
                        $("#vsd_00_20rpm").val(value["VSD_00_20RPM"]==0.00?'':value["VSD_00_20RPM"]);
                        $("#vsd_20_40rpm").val(value["VSD_20_40RPM"]==0.00?'':value["VSD_20_40RPM"]);
                        $("#vsd_40_60rpm").val(value["VSD_40_60RPM"]==0.00?'':value["VSD_40_60RPM"]);
                        $("#vsd_60_80rpm").val(value["VSD_60_80RPM"]==0.00?'':value["VSD_60_80RPM"]);
                        $("#vsd_80_100rpm").val(value["VSD_80_100RPM"]==0.00?'':value["VSD_80_100RPM"]);
                        $("#service_secador_nota").val(value["SECADOR_NOTA"]);
                        $("#service_tipo_servicio_cotizacion").val(value["TIPO_SERVICIO_COTIZACION"])
                        $("#service_local_nombre").val(value["LOCAL_NOMBRE"])
                        $("#proximo_servicio").val(value["PROXIMO_SERVICIO"])
                        $("#service_secador_amperaje").val(value["SECADOR_AMPERAJE"])
                        $("#tipo_ser_cotizaciono").text(value["TIPO_SERVICIO_COTIZACION"] );
                        $("#cliente-seguimiento").text(value["EMPRESA_NOMBRE"] );
                        $("#ot-seguimiento").text(value["REPORTE_ORDEN_TRABAJO"]);
                        $("#modelo-seguimiento").text(value["EQUIPO_MODELO"]);
                        $("#serie-seguimiento").text(value["EQUIPO_NRO_SERIE"]);
                        $("#referencia-seguimiento").text(value["EQUIPO_REFERENCIA"]);
                        if (VSD_MEDIDA_RPM!=0){
                            $("#id_tecnologia_vsd").prop("checked", true);
                            $(".cls_tecnologia_vsd").show();
                            fnVsTecnologia('SI')
                            if (VSD_MEDIDA_RPM==='H'){
                                $("#id_Tecnologis_vsd_horas").prop("checked", true);
                                $(".tipo_tec_vsd").text("(H)")
                                $(".cls_por").removeClass("input_Tecnologia_vsd");
                            }else{
                                $("#id_Tecnologis_vsd_porc").prop("checked", true);
                                $(".tipo_tec_vsd").text("(%)")
                                $(".cls_por").addClass("input_Tecnologia_vsd");
                            }
                        }else{
                            fnVsTecnologia('NO')
                        }
                        if (KITVALVULAS_CAMBIO==="X"){
                            $(".cls_kit_valvulas").show();
                            $("#id_kit_valvulas").prop("checked", true);                        
                        }
                        if (KITFILTROSLINEA_CAMBIO==="X"){
                            $(".cls_kit_filtro_linea").show();
                            $("#id_kit_filtro_linea").prop("checked", true);
                        }
                        /*
                        KITVALVULAS_AMISION==='X'? $("#id_kitvalvulas_amision").prop("checked", true): $("#id_kitvalvulas_amision").prop("checked", false);
                        KITVALVULAS_TERMOSTATICA==='X'? $("#id_kitvalvulas_termostatica").prop("checked", true): $("#id_kitvalvulas_termostatica").prop("checked", false);
                        KITVALVULAS_MINIMAPRESION==='X'? $("#id_kitvalvulas_minimapresion").prop("checked", true): $("#id_kitvalvulas_minimapresion").prop("checked", false);
                        KITVALVULAS_CHECK==='X'? $("#id_kitvalvulas_check").prop("checked", true): $("#id_kitvalvulas_check").prop("checked", false);
                        KITVALVULAS_PARADAACEITE==='X'? $("#id_kitvalvulas_paradaaceite").prop("checked", true): $("#id_kitvalvulas_paradaaceite").prop("checked", false);
                        KITVALVULAS_LINEABARRIDO==='X'? $("#id_kitvalvulas_lineabarrido").prop("checked", true): $("#id_kitvalvulas_lineabarrido").prop("checked", false);
                        KITVALVULAS_TRAMPAGUA==='X'? $("#id_kitvalvulas_trampagua").prop("checked", true): $("#id_kitvalvulas_trampagua").prop("checked", false);
                        KITVALVULAS_SOLENOIDE==='X'? $("#id_kitvalvulas_solenoide").prop("checked", true): $("#id_kitvalvulas_solenoide").prop("checked", false);  
                        */
                        if (KITFILTROSLINEA_CAMBIO==="X"){
                            $(".cls_kit_filtro_linea").show();
                            $("#id_kit_filtro_linea").prop("checked", true);
                        }
                        /*
                        KITFILTROSLINEA_DD==='X'? $("#id_kitfiltroslinea_dd").prop("checked", true): $("#id_kitfiltroslinea_dd").prop("checked", false);
                        KITFILTROSLINEA_QD==='X'? $("#id_kitfiltroslinea_qd").prop("checked", true): $("#id_kitfiltroslinea_qd").prop("checked", false);
                        KITFILTROSLINEA_DDP==='X'? $("#id_kitfiltroslinea_ddp").prop("checked", true): $("#id_kitfiltroslinea_ddp").prop("checked", false);
                        KITFILTROSLINEA_PD==='X'? $("#id_kitfiltroslinea_pd").prop("checked", true): $("#id_kitfiltroslinea_pd").prop("checked", false);
                        KITFILTROSLINEA_QDT==='X'? $("#id_kitfiltroslinea_qdt").prop("checked", true): $("#id_kitfiltroslinea_qdt").prop("checked", false);
                        KITFILTROSLINEA_UDPLUS==='X'? $("#id_kitfiltroslinea_udplus").prop("checked", true): $("#id_kitfiltroslinea_udplus").prop("checked", false);
                        KITFILTROSLINEA_PDP==='X'? $("#id_kitfiltroslinea_pdp").prop("checked", true): $("#id_kitfiltroslinea_pdp").prop("checked", false);
                        */
                        validateSecador(value["EQUIPO_MODELO"]);
                        PROGRAMACIONID = value["PROGRAMACIONID"];
                    });
                    NUMOT = $("#service_ot").val();                    
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
    async function getServioByProgramacion(programacionid, $this){
        spinnerOt($this);
        $("#kt_seguimiento_menu li a").text('');
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('programacionid', programacionid);
        const response = await fetch(`${APP_URL}/service/servicio-by-programacion-id`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            spinnerOt($this, false);
            const rest = await response.json();
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
                const REFERENCIA = rest.data.data.REFERENCIA;
                const TIPO_SERVICIO_COTIZACION = rest.data.data.TIPO_SERVICIO_COTIZACION;
                const LOCAL_NOMBRE = rest.data.data.LOCAL_NOMBRE;
                console.log("REPORTE_FECHA_SERVICIO_VALOR "+rest.data.data.REPORTE_FECHA_SERVICIO_VALOR)
                $("#service_ot").val(NUMOT); 
                $("#service_razon_social").val(RAZON_SOCIAL);
                $("#service_ruc").val(RUC);
                $("#service_direccion").val(DIRECCION_CLIENTE);
                $("#service_tipo_service").val(TIPO_SERVICIO);
                $("#service_equipo_referencia").val(REFERENCIA);
                $("#service_equipo_modelo").val(MODELO);
                $("#service_equipo_serie").val(SERIE);
                $("#service_equipo_id").val(EQUIPO_ID);
                $("#service_equipo_marca").val(EQUIPO);
                $("#service_tipo_servicio_cotizacion").val(TIPO_SERVICIO_COTIZACION);
                $("#service_local_nombre").val(LOCAL_NOMBRE);
                $("#cliente-seguimiento").text(RAZON_SOCIAL );
                $("#tipo_ser_cotizaciono").text(TIPO_SERVICIO_COTIZACION );
                $("#ot-seguimiento").text(NUMOT);
                $("#modelo-seguimiento").text(MODELO);
                $("#serie-seguimiento").text(SERIE);
                $("#referencia-seguimiento").text(REFERENCIA);
                $("#service_show_fecha1, #service_show_fecha2").val(rest.data.data.REPORTE_FECHA_SERVICIO);
                $("#service_fecha").val(rest.data.data.REPORTE_FECHA_SERVICIO_VALOR).trigger('change.select2');
                $("#servicio_tenico2").val(rest.data.data.ID_TECNICO_02).trigger('change.select2');
                $("#service_tel_cliente").val(rest.data.data.EMPRESA_TELEFONO);
                $("#service_email_cliente").val(rest.data.data.EMPRESA_EMAIL);
                $("#service_equipo_modelo_tipo").val(rest.data.data.EQUIPO_MODULO_TIPO).trigger('change.select2');
                $("#service_equipo_presion").val(rest.data.data.EQUIPO_PRESION);
                $("#service_equipo_caudal").val(rest.data.data.EQUIPO_CAUDAL);
                $("#service_equipo_rpm").val(rest.data.data.EQUIPO_RPM);
                $("#id_last_horometro").text("Obs. Último horómetro  "+rest.data.data.LAST_HOROMETRO);
                $("#service_equipo_horometro").val(rest.data.data.EQUIPO_HOROMETRO);
                $("#id_input_horometro").val(rest.data.data.EQUIPO_HOROMETRO);
                $("#service_horas_carga").val(rest.data.data.HORAS_CARGA);
                var EQUIPO_HOROMETRO= rest.data.data.EQUIPO_HOROMETRO;
                //$("#service_equipo_horometro").prop("disabled", true); descomentar cuando se active el select
                if (parseInt(EQUIPO_HOROMETRO)>0){
                    //$("#service_equipo_horometro").prop("disabled", false);descomentar cuando se active el select
                    $('#id_select_horometro option').eq(1).val(rest.data.data.EQUIPO_HOROMETRO).text(rest.data.data.EQUIPO_HOROMETRO);
                }
                if (EQUIPO_HOROMETRO==""){
                    $("#id_select_horometro").val(0).trigger('change.select2');
                    $('#id_select_horometro option').eq(1).val(0).text('INGRESAR HORÓMETRO');
                }else{
                    $("#id_select_horometro").val(rest.data.data.EQUIPO_HOROMETRO).trigger('change.select2');
                }
                $("#service_secador_modelo").val(rest.data.data.SECADOR_MODELO);
                $("#service_secador_nro_serie").val(rest.data.data.SECADOR_NRO_SERIE);
                $("#service_secador_punto_rocio").val(rest.data.data.SECADOR_PUNTO_ROCIO);
                $("#service_secador_voltaje_amp").val(rest.data.data.SECADOR_VOLTAJE_AMP);
                $("#service_secador_proteccion").val(rest.data.data.SECADOR_PROTECCION);
                $("#service_secador_limpieza").val(rest.data.data.SECADOR_LIMPIEZA);
                $("#service_secador_tipo_refrigeracion").val(rest.data.data.SECADOR_TIPO_REFRIGERACION).trigger('change.select2');
                $("#vsd_00_20rpm").val(rest.data.data.VSD_00_20RPM==0.00?'':rest.data.data.VSD_00_20RPM);
                $("#vsd_20_40rpm").val(rest.data.data.VSD_20_40RPM==0.00?'':rest.data.data.VSD_20_40RPM);
                $("#vsd_40_60rpm").val(rest.data.data.VSD_40_60RPM==0.00?'':rest.data.data.VSD_40_60RPM);
                $("#vsd_60_80rpm").val(rest.data.data.VSD_60_80RPM==0.00?'':rest.data.data.VSD_60_80RPM);
                $("#vsd_80_100rpm").val(rest.data.data.VSD_80_100RPM==0.00?'':rest.data.data.VSD_80_100RPM);
                $("#service_secador_nota").val(rest.data.data.SECADOR_NOTA);
                $("#proximo_servicio").val(rest.data.data.PROXIMO_SERVICIO);
                $("#service_secador_amperaje").val(rest.data.data.SECADOR_AMPERAJE);
                var KITVALVULAS_CAMBIO=rest.data.data.KITVALVULAS_CAMBIO;
                var KITFILTROSLINEA_CAMBIO=rest.data.data.KITFILTROSLINEA_CAMBIO;
                var VSD_MEDIDA_RPM=rest.data.data.VSD_MEDIDA_RPM;
                if (VSD_MEDIDA_RPM!=0){
                    $("#id_tecnologia_vsd").prop("checked", true);
                    $(".cls_tecnologia_vsd").show();
                    fnVsTecnologia('SI')
                    if (VSD_MEDIDA_RPM==='H'){
                        $("#id_Tecnologis_vsd_horas").prop("checked", true);
                        $(".tipo_tec_vsd").text("(H)")
                        $(".cls_por").removeClass("input_Tecnologia_vsd");
                    }else{
                        $("#id_Tecnologis_vsd_porc").prop("checked", true);
                        $(".tipo_tec_vsd").text("(%)")
                        $(".cls_por").addClass("input_Tecnologia_vsd");
                    }
                }else{
                    fnVsTecnologia('NO')
                }
                if (KITVALVULAS_CAMBIO==="X"){
                    $(".cls_kit_valvulas").show();
                    $("#id_kit_valvulas").prop("checked", true);                        
                }
                if (KITFILTROSLINEA_CAMBIO==="X"){
                    $(".cls_kit_filtro_linea").show();
                    $("#id_kit_filtro_linea").prop("checked", true);
                }
                $("#verificacion_tipo_aceite_usado").val(rest.data.data.VERIFICACION_TIPO_ACEITE_USADO).trigger('change.select2');
                $("#verificacion_estado_aceite").val(rest.data.data.VERIFICACION_ESTADO_ACEITE).trigger('change.select2');
                $("#verificacion_estado_separador").val(rest.data.data.VERIFICACION_ESTADO_SEPARADOR).trigger('change.select2');
                $("#verificacion_estado_fajas_acoplamiento").val(rest.data.data.VERIFICACION_ESTADO_FAJAS_ACOPLAMIENTO).trigger('change.select2');
                $("#verificacion_estado_de_limpieza").val(rest.data.data.VERIFICACION_ESTADO_DE_LIMPIEZA).trigger('change.select2');
                $("#verificacion_estado_filtro_de_aceite").val(rest.data.data.VERIFICACION_ESTADO_FILTRO_DE_ACEITE).trigger('change.select2');
                $("#verificacion_estado_filtro_de_aire").val(rest.data.data.VERIFICACION_ESTADO_FILTRO_DE_AIRE).trigger('change.select2');
                $("#engrase_de_motor").val(rest.data.data.ENGRASE_DE_MOTOR).trigger('change.select2');
                $("#medicion_voltaje_ul1l2").val(rest.data.data.MEDICION_VOLTAJE_UL1L2);
                $("#medicion_voltaje_ul2l3").val(rest.data.data.MEDICION_VOLTAJE_UL2L3);
                $("#medicion_voltaje_ul1l3").val(rest.data.data.MEDICION_VOLTAJE_UL1L3);
                $("#medicion_amperaje_l1").val(rest.data.data.MEDICION_AMPERAJE_L1);
                $("#medicion_amperaje_l2").val(rest.data.data.MEDICION_AMPERAJE_L2);
                $("#medicion_amperaje_l3").val(rest.data.data.MEDICION_AMPERAJE_L3);
                $("#medicion_amperaje_f1").val(rest.data.data.MEDICION_AMPERAJE_F1);
                $("#medicion_amperaje_f2").val(rest.data.data.MEDICION_AMPERAJE_F2);
                $("#medicion_amperaje_f3").val(rest.data.data.MEDICION_AMPERAJE_F3);
                $("#medicion_ventilador_01_l1").val(rest.data.data.MEDICION_VENTILADOR_01_L1);
                $("#medicion_ventilador_01_l2").val(rest.data.data.MEDICION_VENTILADOR_01_L2);
                $("#medicion_ventilador_01_l3").val(rest.data.data.MEDICION_VENTILADOR_01_L3);
                $("#medicion_ventilador_02_l1").val(rest.data.data.MEDICION_VENTILADOR_02_L1);
                $("#medicion_ventilador_02_l2").val(rest.data.data.MEDICION_VENTILADOR_02_L2);
                $("#medicion_ventilador_02_l3").val(rest.data.data.MEDICION_VENTILADOR_02_L3);
                $("#thermomagnetico").val(rest.data.data.THERMOMAGNETICO);
                $("#linea_a_tierra").val(rest.data.data.LINEA_A_TIERRA);
                $("#voltaje_de_control").val(rest.data.data.VOLTAJE_DE_CONTROL);
                $("#voltaje_del_modulo").val(rest.data.data.VOLTAJE_DEL_MODULO);
                $("#motor_electrico_i_marca").val(rest.data.data.MOTOR_ELECTRICO_I_MARCA);
                $("#motor_electrico_i_voltaje").val(rest.data.data.MOTOR_ELECTRICO_I_VOLTAJE);
                $("#motor_electrico_i_amperaje").val(rest.data.data.MOTOR_ELECTRICO_I_AMPERAJE);
                $("#motor_electrico_i_fs").val(rest.data.data.MOTOR_ELECTRICO_I_FS);
                $("#motor_electrico_i_rpm").val(rest.data.data.MOTOR_ELECTRICO_I_RPM);
                $("#motor_electrico_ii_marca").val(rest.data.data.MOTOR_ELECTRICO_II_MARCA);
                $("#motor_electrico_ii_voltaje").val(rest.data.data.MOTOR_ELECTRICO_II_VOLTAJE);
                $("#motor_electrico_ii_amperaje").val(rest.data.data.MOTOR_ELECTRICO_II_AMPERAJE);
                $("#motor_electrico_ii_fs").val(rest.data.data.MOTOR_ELECTRICO_II_FS);
                $("#motor_electrico_ii_rpm").val(rest.data.data.MOTOR_ELECTRICO_II_RPM);
                $("#motor_electrico_iii_marca").val(rest.data.data.MOTOR_ELECTRICO_III_MARCA);
                $("#motor_electrico_iii_voltaje").val(rest.data.data.MOTOR_ELECTRICO_III_VOLTAJE);
                $("#motor_electrico_iii_amperaje").val(rest.data.data.MOTOR_ELECTRICO_III_AMPERAJE);
                $("#motor_electrico_iii_fs").val(rest.data.data.MOTOR_ELECTRICO_III_FS);
                $("#motor_electrico_iii_rpm").val(rest.data.data.MOTOR_ELECTRICO_III_RPM);
                $("#vida_de_aceite").val(rest.data.data.VIDA_DE_ACEITE).trigger('change.select2');
                $("#vida_de_filtro_aceite").val(rest.data.data.VIDA_DE_FILTRO_ACEITE).trigger('change.select2');
                $("#vida_de_filtro_aire").val(rest.data.data.VIDA_DE_FILTRO_AIRE).trigger('change.select2');
                $("#vida_de_separador").val(rest.data.data.VIDA_DE_SEPARADOR).trigger('change.select2');
                $("#vida_de_engrase_motor").val(rest.data.data.VIDA_DE_ENGRASE_MOTOR).trigger('change.select2');
                $("#regulaciones_presion_carga").val(rest.data.data.REGULACIONES_PRESION_CARGA);
                $("#regulaciones_de_descarga").val(rest.data.data.REGULACIONES_DE_DESCARGA);
                $("#regulaciones_de_tiempo").val(rest.data.data.REGULACIONES_DE_TIEMPO);
                $("#regulaciones_nro_arranques").val(rest.data.data.REGULACIONES_NRO_ARRANQUES);
                $("#regulaciones_retardo_carga").val(rest.data.data.REGULACIONES_RETARDO_CARGA);
                $("#regulaciones_pto_de_ajuste").val(rest.data.data.REGULACIONES_PTO_DE_AJUSTE);
                $("#temperatura_elemento1").val(rest.data.data.TEMPERATURA_ELEMENTO1);
                $("#temperatura_elemento2").val(rest.data.data.TEMPERATURA_ELEMENTO2);
                $("#temperatura_aceite").val(rest.data.data.TEMPERATURA_ACEITE);
                $("#presion_de_aceite").val(rest.data.data.PRESION_DE_ACEITE);
                $("#presion_intermedia").val(rest.data.data.PRESION_INTERMEDIA);
                $("#temperatura_ent_elemento2").val(rest.data.data.TEMPERATURA_ENT_ELEMENTO2);
                $("#temperatura_sal_aire").val(rest.data.data.TEMPERATURA_SAL_AIRE); 
                $("#diferencial_presion_aire").val(rest.data.data.DIFERENCIAL_PRESION_AIRE);
                $("#diferencial_presion_separador").val(rest.data.data.DIFERENCIAL_PRESION_SEPARADOR);
                $("#temperatura_ambiente").val(rest.data.data.TEMPERATURA_AMBIENTE);
                var VSD_MEDIDA_RPM = rest.data.data.VSD_MEDIDA_RPM;
                var KITVALVULAS_CAMBIO = rest.data.data.KITVALVULAS_CAMBIO;
                var KITFILTROSLINEA_CAMBIO = rest.data.data.KITFILTROSLINEA_CAMBIO;
                var LIMPIEZA_ENFRIADORES = rest.data.data.LIMPIEZA_ENFRIADORES;
                $("#id_limp_enf_no").prop("checked", true);
                $("#id_limpieza_enfriadores").prop("checked", false);
                if(LIMPIEZA_ENFRIADORES==="X"){
                    $("#id_limp_enf_no").prop("checked", false);
                    $("#id_limp_enf_si").prop("checked", true);
                    $("#id_limpieza_enfriadores").prop("checked", true);
                }
                
                $(".cls_kit_valvulas").hide();
                $(".cls_kit_filtro_linea").hide();
                $("#id_kit_valvulas").prop("checked", false);  
                $("#id_kit_filtro_linea").prop("checked", false);
                if (KITVALVULAS_CAMBIO==="X"){
                    $(".cls_kit_valvulas").show(); 
                    $("#id_kit_valvulas").prop("checked", true);                        
                }
                if (KITFILTROSLINEA_CAMBIO==="X"){
                    $(".cls_kit_filtro_linea").show();
                    $("#id_kit_filtro_linea").prop("checked", true);
                }

                //$("#id_kit_valvulas").is(":checked")? $("#id_kit_valvulas").prop("checked", true): $("#id_kit_valvulas").prop("checked", false);
                rest.data.data.KITVALVULAS_AMISION==="X"? $("#id_kitvalvulas_amision").prop("checked", true): $("#id_kitvalvulas_amision").prop("checked", false);
                rest.data.data.KITVALVULAS_TERMOSTATICA==="X"? $("#id_kitvalvulas_termostatica").prop("checked", true): $("#id_kitvalvulas_termostatica").prop("checked", false);
                rest.data.data.KITVALVULAS_MINIMAPRESION==="X"? $("#id_kitvalvulas_minimapresion").prop("checked", true): $("#id_kitvalvulas_minimapresion").prop("checked", false);
                rest.data.data.KITVALVULAS_CHECK==="X"? $("#id_kitvalvulas_check").prop("checked", true): $("#id_kitvalvulas_check").prop("checked", false);
                rest.data.data.KITVALVULAS_PARADAACEITE==="X"? $("#id_kitvalvulas_paradaaceite").prop("checked", true): $("#id_kitvalvulas_paradaaceite").prop("checked", false);
                rest.data.data.KITVALVULAS_LINEABARRIDO==="X"? $("#id_kitvalvulas_lineabarrido").prop("checked", true): $("#id_kitvalvulas_lineabarrido").prop("checked", false);
                rest.data.data.KITVALVULAS_TRAMPAGUA==="X"? $("#id_kitvalvulas_trampagua").prop("checked", true): $("#id_kitvalvulas_trampagua").prop("checked", false);
                rest.data.data.KITVALVULAS_SOLENOIDE==="X"? $("#id_kitvalvulas_solenoide").prop("checked", true): $("#id_kitvalvulas_solenoide").prop("checked", false);  
                rest.data.data.KITVALVULAS_VENTILACION==="X"? $("#id_kitvalvulas_ventilacion").prop("checked", true): $("#id_kitvalvulas_ventilacion").prop("checked", false);  
                rest.data.data.KITVALVULAS_TRESVIAS==="X"? $("#id_kitvalvulas_tresvias").prop("checked", true): $("#id_kitvalvulas_tresvias").prop("checked", false);  
                rest.data.data.KITVALVULAS_REGULACION_TERMOSTATICA==="X"? $("#id_kitvalvulas_regulacion_termostatica").prop("checked", true): $("#id_kitvalvulas_regulacion_termostatica").prop("checked", false);  
                rest.data.data.KITVALVULAS_PURGADOR_AUTO_EWD==="X"? $("#id_kitvalvulas_purgador_auto_ewd").prop("checked", true): $("#id_kitvalvulas_purgador_auto_ewd").prop("checked", false);         
                //$("#id_kit_filtro_linea").is(":checked")? $("#id_kit_filtro_linea").prop("checked", true): $("#id_kit_filtro_linea").prop("checked", false);
                rest.data.data.KITFILTROSLINEA_DD==="X"? $("#id_kitfiltroslinea_dd").prop("checked", true): $("#id_kitfiltroslinea_dd").prop("checked", false);
                rest.data.data.KITFILTROSLINEA_QD==="X"? $("#id_kitfiltroslinea_qd").prop("checked", true): $("#id_kitfiltroslinea_qd").prop("checked", false);
                rest.data.data.KITFILTROSLINEA_DDP==="X"? $("#id_kitfiltroslinea_ddp").prop("checked", true): $("#id_kitfiltroslinea_ddp").prop("checked", false);
                rest.data.data.KITFILTROSLINEA_PD==="X"? $("#id_kitfiltroslinea_pd").prop("checked", true): $("#id_kitfiltroslinea_pd").prop("checked", false);
                rest.data.data.KITFILTROSLINEA_QDT==="X"? $("#id_kitfiltroslinea_qdt").prop("checked", true): $("#id_kitfiltroslinea_qdt").prop("checked", false);
                rest.data.data.KITFILTROSLINEA_UDPLUS==="X"? $("#id_kitfiltroslinea_udplus").prop("checked", true): $("#id_kitfiltroslinea_udplus").prop("checked", false);
                rest.data.data.KITFILTROSLINEA_PDP==="X"? $("#id_kitfiltroslinea_pdp").prop("checked", true): $("#id_kitfiltroslinea_pdp").prop("checked", false);
                
                validateSecador(MODELO);
                /*countador_ = 1;
                $('#page_0').removeClass('current');
                $('#page_1').addClass('current');
                $(".btn-stepper-previous").show();
                $(".btn-stepper-next").show();
                $('#page_content_0').removeClass('current');
                $('#page_content_1').addClass('current');
                $("#btnaGuardarSalir").show().attr("data-paso", "paso_1");
                */
                validarFotorInicialXTipoServ(TIPO_SERVICIO, 'next');

                var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_estado");
                console.log("btnNext "+btnNext )
                $("#btnSaveData").show();
                if(btnNext=="NUEVO"){
                    $(".btn-stepper-next").prop("disabled", true);
                    $(".btn-stepper-next").hide();
                }else{
                    $(".btn-stepper-next").prop("disabled", false);
                    $(".btn-stepper-next").show();
                }
                $("#descripcion_del_trabajo").val(rest.data.data.DESCRIPCION_DEL_TRABAJO_P5);
                $("#recomendaciones").val(rest.data.data.RECOMENDACIONES_P5);
                $("#observaciones_internas").val(rest.data.data.OBSERVACIONES_INTERNAS_P5);
               
                $("#kt_seguimiento_menu, .cls_step_2").show();
                $(".cls_step_ot").hide();
                validar4Images();
                await actualizarProgramacionUser('SI',PROGRAMACIONID,NUMOT); 
            }else{
                console.log(datos);
            }
        }).catch((error) => {
            console.log(error)
        });
    }
    async function GuardarReporteInicial($this){
        $(".cls_empty").empty();
        $("#kt_form_input_page_2 input").removeClass("input_danger_border");
        const data = new FormData();
        var pushImages =[]        
        const id_tecnico_01=$("#servicio_tenico1").val();
        const id_tecnico_02=$("#servicio_tenico2").val();
        const service_equipo_modelo_tipo=$("#service_equipo_modelo_tipo").val();
        const service_secador_tipo_refrigeracion=$("#service_secador_tipo_refrigeracion").val();
        const service_fecha=$("#service_fecha").val();
        const programacionid= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-programacionid");
        const reporte_orden_trabajo= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-numot");
        const referencia= $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_referencia').children('p').text();
        const equipo_id= $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_equipo_id').children('p').text();
        const razon_social= $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_razon_social').text();
        const ruc= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_ruc').children('p').text();
        const modelo= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_modelo').children('p').text();
        const serie= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_serie').children('p').text();
        const tipo= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo').children('p').text();
        const equipo_marca= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_equipo_marca').children('p').text();
        const select_sr_local= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_local').children('p').text();
        const TIPO_SERVICIO_COTIZACION= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo').children('p').text();
        const service_fecha_= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-fecha_inicio");
        const select_sr_tipo_servicio= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo_servicio').children('p').text();
        const DIRECCION_CLIENTE= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_direccion').children('p').text();
        $("#service_ot").val(reporte_orden_trabajo); 
        $("#service_razon_social").val(razon_social);
        $("#service_ruc").val(ruc);
        $("#service_direccion").val(DIRECCION_CLIENTE);
        $("#service_tipo_service").val(select_sr_tipo_servicio);
        $("#service_equipo_referencia").val(referencia);
        $("#service_equipo_modelo").val(modelo);
        $("#service_equipo_serie").val(serie);
        $("#service_equipo_id").val(equipo_id);
        $("#service_equipo_marca").val(equipo_marca);
        $("#service_tipo_servicio_cotizacion").val(TIPO_SERVICIO_COTIZACION);
        $("#service_local_nombre").val(select_sr_local);
        console.log("select_sr_tipo_servicio "+select_sr_tipo_servicio)
        data.append('_token', $("input[name='_token']").val());
        data.append("reporte_fecha_servicio",service_fecha_=="0"?'':service_fecha_);
        data.append("reporte_orden_trabajo",reporte_orden_trabajo);
        data.append("nombre_tecnico_responsable_01",$("#servicio_tenico1 option:selected").text());
        data.append("id_tecnico_01",id_tecnico_01=="0"?'':id_tecnico_01);
        data.append("nombre_tecnico_responsable_02",id_tecnico_02=="0"?'':$("#servicio_tenico2 option:selected").text());
        data.append("id_tecnico_02",id_tecnico_02=="0"?'':id_tecnico_02);
        data.append("id_obl",$("#id_obl").val());
        data.append("empresa_nombre", $("#service_razon_social").val());
        data.append("ruc",$("#service_ruc").val());
        data.append("empresa_direccion",$("#service_direccion").val());
        data.append("empresa_telefono",$("#service_tel_cliente").val());
        data.append("empresa_email",$("#service_email_cliente").val());
        data.append("equipo_id",$("#service_equipo_id").val()); 
        data.append("equipo_marca",$("#service_equipo_marca").val()); 
        data.append("equipo_referencia",$("#service_equipo_referencia").val()  );            
        data.append("equipo_modelo", $("#service_equipo_modelo").val() );
        data.append("equipo_nro_serie", $("#service_equipo_serie").val() );
        data.append("equipo_modulo_tipo",service_equipo_modelo_tipo=="0"?'':service_equipo_modelo_tipo ); 
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
        data.append("secador_tipo_refrigeracion",service_secador_tipo_refrigeracion=="0"?'':service_secador_tipo_refrigeracion);
        data.append("programacionid",programacionid);
        data.append("secador_nota",$("#service_secador_nota").val());
        data.append("vsd_00_20rpm", $("#vsd_00_20rpm").val());
        data.append("vsd_20_40rpm", $("#vsd_20_40rpm").val());
        data.append("vsd_40_60rpm", $("#vsd_40_60rpm").val());
        data.append("vsd_60_80rpm", $("#vsd_60_80rpm").val());
        data.append("vsd_80_100rpm", $("#vsd_80_100rpm").val());
        data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
        data.append("imagesDatos",JSON.stringify(pushImages));
        data.append("id_secador_obl", $("#id_secador_obl").val());
        data.append("tipo_servicio_cotizacion", $("#service_tipo_servicio_cotizacion").val());
        data.append("local_nombre", $("#service_local_nombre").val());
        data.append("proximo_servicio", 'proximo_servicio');
        data.append("secador_amperaje", $("#service_secador_amperaje").val()); 
        $(".btn-stepper-previous").prop("disabled", true);
        //beforeSendBtnLoad("#btnSaveData");
        spinnerOt($this);
        const response = await fetch(`${APP_URL}/reporte/registro-inicial`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            spinnerOt($this, false);
            $(".btn-stepper-previous").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            //beforeSendBtnLoad("#btnSaveData", false);
            if(type==="empty"){
                $txtEmpty = '';
                $.each( datos, function( key, value ) {
                    $txtEmpty = value;
                    if (key != undefined) {
                        $("#kt_form_input_page_2 input[name='"+key+"'], #kt_form_input_page_2 select[name='"+key+"'], #kt_form_input_page_2 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
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
                    var reporteestado = 'PENDIENTE';
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_numero",data1);
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado",reporteestado);
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_reporte_estado').text(reporteestado);
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_reporte_estado').removeClass("badge-primary").addClass('badge-danger');                    
                    $("#tipo_ser_cotizaciono").text(tipo);
                    $("#cliente-seguimiento").text(razon_social);
                    $("#ot-seguimiento").text(reporte_orden_trabajo);
                    $("#modelo-seguimiento").text(modelo);
                    $("#serie-seguimiento").text(serie);
                    $("#referencia-seguimiento").text(referencia);

                    /*countador_ = 1;
                    $('#page_0').removeClass('current');
                    $('#page_1').addClass('current');
                    $(".btn-stepper-previous").show();
                    $(".btn-stepper-next").show();
                    $('#page_content_0').removeClass('current');
                    $('#page_content_1').addClass('current');
                    $("#btnaGuardarSalir").show().attr("data-paso", "paso_1");
                    */
                    validarFotorInicialXTipoServ(select_sr_tipo_servicio, 'next');
                    var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado");
                    $("#btnSaveData").show();
                    if(btnNext=="NUEVO"){
                        $(".btn-stepper-next").prop("disabled", true);
                        $(".btn-stepper-next").hide();
                    }else{
                        $(".btn-stepper-next").prop("disabled", false);
                        $(".btn-stepper-next").show();
                    }                
                    $("#kt_seguimiento_menu, .cls_step_2").show();
                    $(".cls_step_ot").hide();
                    validar4Images();
                    //await actualizarProgramacionUser('SI',programacionid,reporte_orden_trabajo); 
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
    async function GuardarySalirReporteInicial(){
        $(".cls_empty").empty();
        $("#kt_form_input_page_2 input").removeClass("input_danger_border");
        const data = new FormData();
        var pushImages =[]        
        const id_tecnico_01=$("#servicio_tenico1").val();
        const id_tecnico_02=$("#servicio_tenico2").val();
        const service_equipo_modelo_tipo=$("#service_equipo_modelo_tipo").val();
        const service_secador_tipo_refrigeracion=$("#service_secador_tipo_refrigeracion").val();
        const service_fecha=$("#service_fecha").val();
        const programacionid= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-programacionid");
        const reporte_orden_trabajo= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-numot");
        const referencia= $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_referencia').children('p').text();
        const razon_social= $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_razon_social').text();
        const ruc= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_ruc').children('p').text();
        const modelo= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_modelo').children('p').text();
        const serie= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_serie').children('p').text();
        const tipo= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo').children('p').text();
        const service_fecha_= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-fecha_inicio");
        const select_sr_tipo_servicio= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo_servicio').children('p').text();
        console.log("select_sr_tipo_servicio "+select_sr_tipo_servicio)
        data.append('_token', $("input[name='_token']").val());
        data.append("reporte_fecha_servicio",service_fecha_=="0"?'':service_fecha_);
        data.append("reporte_orden_trabajo",reporte_orden_trabajo);
        data.append("nombre_tecnico_responsable_01",$("#servicio_tenico1 option:selected").text());
        data.append("id_tecnico_01",id_tecnico_01=="0"?'':id_tecnico_01);
        data.append("nombre_tecnico_responsable_02",id_tecnico_02=="0"?'':$("#servicio_tenico2 option:selected").text());
        data.append("id_tecnico_02",id_tecnico_02=="0"?'':id_tecnico_02);
        data.append("id_obl",$("#id_obl").val());
        data.append("empresa_nombre", $("#service_razon_social").val());
        data.append("ruc",$("#service_ruc").val());
        data.append("empresa_direccion",$("#service_direccion").val());
        data.append("empresa_telefono",$("#service_tel_cliente").val());
        data.append("empresa_email",$("#service_email_cliente").val());
        data.append("equipo_id",$("#service_equipo_id").val()); 
        data.append("equipo_marca",$("#service_equipo_marca").val()); 
        data.append("equipo_referencia",$("#service_equipo_referencia").val()  );            
        data.append("equipo_modelo", $("#service_equipo_modelo").val() );
        data.append("equipo_nro_serie", $("#service_equipo_serie").val() );
        data.append("equipo_modulo_tipo",service_equipo_modelo_tipo=="0"?'':service_equipo_modelo_tipo ); 
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
        data.append("secador_tipo_refrigeracion",service_secador_tipo_refrigeracion=="0"?'':service_secador_tipo_refrigeracion);
        data.append("programacionid",programacionid);
        data.append("secador_nota",$("#service_secador_nota").val());
        data.append("vsd_00_20rpm", $("#vsd_00_20rpm").val());
        data.append("vsd_20_40rpm", $("#vsd_20_40rpm").val());
        data.append("vsd_40_60rpm", $("#vsd_40_60rpm").val());
        data.append("vsd_60_80rpm", $("#vsd_60_80rpm").val());
        data.append("vsd_80_100rpm", $("#vsd_80_100rpm").val());
        data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
        data.append("imagesDatos",JSON.stringify(pushImages));
        data.append("id_secador_obl", $("#id_secador_obl").val());
        data.append("tipo_servicio_cotizacion", $("#service_tipo_servicio_cotizacion").val());
        data.append("local_nombre", $("#service_local_nombre").val());
        data.append("proximo_servicio", 'proximo_servicio');
        data.append("secador_amperaje", $("#service_secador_amperaje").val()); 
        $(".btn-stepper-previous, .btn-stepper-next").prop("disabled", true);
        beforeSendBtnLoad("#btnaGuardarSalir");
        beforeSendBtnLoad("#btnSaveData");
        const response = await fetch(`${APP_URL}/reporte/registro-inicial`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            $(".btn-stepper-previous, .btn-stepper-next").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            beforeSendBtnLoad("#btnaGuardarSalir", false);
            beforeSendBtnLoad("#btnSaveData", false);
            if(type==="empty"){
                $txtEmpty = '';
                $.each( datos, function( key, value ) {
                    $txtEmpty = value;
                    if (key != undefined) {
                        $("#kt_form_input_page_2 input[name='"+key+"'], #kt_form_input_page_2 select[name='"+key+"'], #kt_form_input_page_2 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
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
                    var reporteestado = 'PENDIENTE';
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_numero",data1);
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado",reporteestado);
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_reporte_estado').text(reporteestado);
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_reporte_estado').removeClass("badge-primary").addClass('badge-danger');                    
                    $("#tipo_ser_cotizaciono").text(tipo);
                    $("#cliente-seguimiento").text(razon_social);
                    $("#ot-seguimiento").text(reporte_orden_trabajo);
                    $("#modelo-seguimiento").text(modelo);
                    $("#serie-seguimiento").text(serie);
                    $("#referencia-seguimiento").text(referencia);
                    Swal.fire({
                        icon: 'success',
                        title: 'El servicio se registró correctamente!!!',
                        showConfirmButton: true,
                        timer: 3000
                    }).then((function(result){
                        if(result.value){
                            location.reload();
                        }
                    }));
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                    await updateReporteArchivo();
                    await actualizarProgramacionUser('NO', $("#programcion_id_temporal").val() ,$("#programcion_id_numot_tmporal").val());
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
    async function updateReporteArchivo(){
        const data = new FormData();   
        const programacionid= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-programacionid");
        data.append('_token', $("input[name='_token']").val());
        data.append("programacionid",programacionid);
        const response = await fetch(`${APP_URL}/reporte/update-reporte-archivo`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
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
                    // success                     
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


    function validarFotorInicialXTipoServ(select_sr_tipo_servicio, tipo_btn ){
        if (tipo_btn==="next"){
            if (select_sr_tipo_servicio==="REVISION" ||select_sr_tipo_servicio==="ALQUILER" || select_sr_tipo_servicio==="ARRANQUE"){ 
                countador_ = 2;
                $('#page_1, #page_0').removeClass('current');   
                $('#page_2').addClass('current');
                $(".btn-stepper-next").show();
                $(".btn-stepper-previous").show();    
                $('#page_content_1, #page_content_0').removeClass('current');
                $('#page_content_2').addClass('current');
                $("#btnaGuardarSalir").show().attr("data-paso", "paso_2");
            }else{
                countador_ = 1;
                $('#page_0').removeClass('current');
                $('#page_1').addClass('current');
                $(".btn-stepper-previous").show();
                $(".btn-stepper-next").show();
                $('#page_content_0').removeClass('current');
                $('#page_content_1').addClass('current');
                $("#btnaGuardarSalir").show().attr("data-paso", "paso_1");
            }
        }else if  (tipo_btn==="previous"){
            if (select_sr_tipo_servicio==="REVISION" ||select_sr_tipo_servicio==="ALQUILER" || select_sr_tipo_servicio==="ARRANQUE"){
                countador_ = 0;
                $('#page_0').addClass('current')
                $('#page_1, #page_2').removeClass('current')
                $(".btn-stepper-previous").hide();
                $(".btn-stepper-next").hide();
                $('#page_content_0').addClass('current');
                $('#page_content_1, #page_content_2').removeClass('current');
                $("#kt_seguimiento_menu, .cls_step_2").hide();
                $(".cls_step_ot").show();
                $("#btnaGuardarSalir").hide().attr("data-paso", 0);
                $("#kt_modal_create_compresor").show();
                $("#kt_modal_create_secador").hide(); 
            }else{
                var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado");
                countador_ = 1;
                $('#page_1').addClass('current')
                $('#page_2').removeClass('current')
                $(".btn-stepper-previous").show();
                $(".btn-stepper-next").show();
                $('#page_content_1').addClass('current');
                $('#page_content_2').removeClass('current');
                $("#btnSaveData").show();
                if(btnNext=="NUEVO"){
                    $(".btn-stepper-next").prop("disabled", true);
                }
                $("#btnaGuardarSalir").show().attr("data-paso", "paso_1");
            }
        }        

    }
    $(document).on("click", "#kt_modal_accept_condition", async function(event){     
        emptyForm()
        const id_ =$(this).attr("data-id");
        const $this = $("#"+id_);
        const programacionid     =$(this).attr("data-programacionid");
        const reporte_numero     =$(this).attr("data-reporte_numero");
        const reporte_estado     =$(this).attr("data-reporte_estado");
        const equipo_referencia  =$(this).attr("data-equipo_referencia");
        const reporte_ruc        =$(this).attr("data-ruc");
        const fecha_inicio       =$(this).attr("data-fecha_inicio");
        const fecha_inicio_vista =$(this).attr("data-fecha_inicio_vista");
        const tipo_equipo        =$(this).attr("data-tipo_equipo");
        const numot              =$(this).attr("data-numot");
        $("#id_programacionid").val(programacionid);
        $(".select-dash").removeClass("active");
        $("#"+id_).addClass("active");
        $('#kt_modal_create_productos').modal("hide");
        if (tipo_equipo=="C"){
            if (parseInt(reporte_numero)>0){
                if (reporte_estado==="PENDIENTE"){
                    await getArchivoByNumeroReporte(reporte_numero, $this, programacionid)
                    await getServioByProgramacion(programacionid, $this); //await getReporteByNumero(reporte_numero, $this)
                    $("#idreportenumero").val(reporte_numero);
                    $("#service_show_fecha2").hide();
                    $("#service_fecha + .select2").show();
                }
            }else{
                await GuardarReporteInicial($this)
                //await getServioByProgramacion(programacionid, $this);
                $("#idreportenumero").val(reporte_numero);
                $("#service_show_fecha2").hide();
                $("#service_fecha + .select2").show();
            }
        }else if (tipo_equipo=="S") {  
            $("#btnsecadoraGuardarSalir").hide().attr("data-paso", 0);
            $("#idreportenumero").val(reporte_numero);
            if (parseInt(reporte_numero)>0){
                if (reporte_estado==="PENDIENTE"){
                    await getArchivoSecadorByNumeroReporte(reporte_numero, $this, programacionid)
                    await getServioByProgramacionSecadores(programacionid, $this);
                    $("#service_secador_show_fecha2").hide();
                    $("#service_secador_fecha + .select2").show();
                }
            }else{
                await GuardarReporteInicialSecador($this)
                //await getServioByProgramacionSecadores(programacionid, $this);
                $("#btnsecadorSaveData").attr("data-option", 'ins');
                $("#service_secador_show_fecha2").hide();
                $("#service_secador_fecha + .select2").show();
            }
            
        }else{
            Toast.fire({
                icon: 'warning',
                title:'Este equipo no tiene agregado el tipo de secador/compresor.'
            });
        }
        await listarCorreoContacto(reporte_ruc)
        await getEmpleadobycategory(programacionid);
        await getGuiaDetalleByOt();
    });
    $(document).on("click", ".kc_list_ot .select-dash", async function(event){
        const id_                =$(this).prop("id");
        const $this              = $(this);
        const programacionid     =$(this).parent().attr("data-programacionid");
        const reporte_numero     =$(this).parent().attr("data-reporte_numero");
        const reporte_estado     =$(this).parent().attr("data-reporte_estado");
        const reporte_ruc        =$(this).parent().attr("data-ruc");
        const fecha_inicio       =$(this).parent().attr("data-fecha_inicio");
        const fecha_inicio_vista =$(this).parent().attr("data-fecha_inicio_vista");
        const tipo_equipo =$(this).parent().attr("data-tipo_equipo");
        $("#id_programacionid").val(programacionid);
        const numot =$(this).parent().attr("data-numot");
        $("#kt_modal_accept_condition")
        .attr("data-programacionid", programacionid)
        .attr("data-reporte_numero", reporte_numero)
        .attr("data-reporte_estado",reporte_estado)     
        .attr("data-ruc",reporte_ruc)
        .attr("data-fecha_inicio",fecha_inicio)
        .attr("data-fecha_inicio_vista",fecha_inicio_vista)
        .attr("data-numot",numot)
        .attr("data-tipo_equipo",tipo_equipo)
        .attr("data-id",id_);
        if (reporte_estado!=="COMPLETADO"){
            spinnerOt($this);
            const data = new FormData();
            data.append('_token', $("input[name='_token']").val());
            data.append('programacionid',programacionid);
            data.append('numot', numot);
            data.append('usuariologin',$("#programcion_id_correo").val());
            const response = await fetch(`${APP_URL}/reporte/get-bloqueo`, {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                spinnerOt($this, false);
                const rest = await response.json();
                const datos = rest.data;
                const status = rest.status;
                const icon = rest.icon;
                const message = rest.message;  
                if (status){
                    const status1 = rest.data.status;
                    const icon1 = rest.data.icon;
                    const message1 = rest.data.message;
                    const data1 = rest.data.data;
                    if (status1){
                        const datos = rest.data.data;
                        var bloqueo = datos.BLOQUEO; 
                        var REPORTE_ESTADO = datos.REPORTE_ESTADO;
                        if (REPORTE_ESTADO==="COMPLETADO"){
                            Toast.fire({
                                icon: 'error',
                                title:'Lo sentimos, este OT ya se completó.'
                            });
                            return;
                        }
                        if (bloqueo==1){// si bloquedo
                            Toast.fire({
                                icon: 'warning',
                                title:'Lo sentimos, este OT está ocupado por otro técnico.'
                            });
                        }else{// no bloquedo
                            $(".select-dash").removeClass("active");
                            $(this).addClass("active");
                            $('#kt_modal_create_productos').modal("show");
                        }
                    }else{
                        Toast.fire({
                            icon: 'error',
                            title:'La lista de bloqueo no tiene resultados.'
                        });   
                    }
                    return;
                }
                Toast.fire({
                    icon: 'error',
                    title:'Ocurrió un problema en la consulta de bloqueo.'
                });              
            }).catch((error) => {
                console.log(error)
            });
        }
        $("#service_fecha, #service_secador_fecha").html(`
        <option value="0">Seleccione fecha de servicio</option>
        <option value="${datenow2}" selected >${datenow1}</option>
        <option value="${fecha_inicio}">${fecha_inicio_vista}</option>`);
        //return;
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
                    $htmlSelect+= `<option data-tecnio=${value["PROGRAMACION_TECNICO"]} selected ${$disabled} value="${value["DNI"]}">${value["NOMBRE"]}</option>`;
                }else{
                    if (value["PROGRAMACION_TECNICO"]!=0){
                        $selected =' selected  ';
                    }
                }
                //$htmlSelect+= `<option data-tecnio=${value["PROGRAMACION_TECNICO"]} ${$selected} ${$disabled} value="${value["DNI"]}">${value["NOMBRE"]}</option>`;
            });
            $("#servicio_tenico2, #secador_id_tecnico_02").prop("disabled", true);
            $(".cls_required_tec_2").removeClass("required");
            if (idobl>0){
                $("#servicio_tenico2, #secador_id_tecnico_02").prop("disabled", false);
                $(".cls_required_tec_2").addClass("required");
            }
            $("#id_obl, #secador_id_obl").val(idobl);
            $("#servicio_tenico2, #secador_id_tecnico_02").html($htmlSelect);
        }).catch((error) => {
            console.log(error)
        });
    }
    async function GuardarReporte(){
        var report_num = $(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero");
        if (report_num==0){
            await  GuardarySalirReporteInicial();
        }else{
            $(".cls_empty").empty();
            const data = new FormData();
            var pushImages =[]
            var cantidadInicialFotos=0;
            $(".ki_images_select.cls_nuevo, .ki_images_select.cls_editar").each(function(i, val){
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
                    estado_ver_reporte: val_estado_ver_reporte,
                    programacionid:$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"),
                });
            });
            Swal.fire({
                icon: 'success',
                title: 'El servicio se registró correctamente!!!',
                showConfirmButton: true,
                timer: 3000
            });
            emptyForm();
            await getOT();
            await actualizarProgramacionUser('NO', $("#programcion_id_temporal").val() ,$("#programcion_id_numot_tmporal").val());
            // edwin    
        }     
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
                GuardarReporte();
                return;
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
    
    function emptyForm(){
        $(".cls_empty").empty();
        $("#kt_modal_create_campaign_stepper_form")[0].reset()
        $("#kt_modal_create_secador_stepper_form")[0].reset()
        $("#servicio_tenico2").val(0).trigger('change.select2');
        $("#secador_id_tecnico_02").val(0).trigger('change.select2');
        
        countador_ = 0;
        $('#page_0').addClass('current')
        $('#page_2, #page_1, #page_3, #page_4, #page_5, #page_6').removeClass('current')
        $(".btn-stepper-previous").hide();
        $(".btn-stepper-next").hide();
        $('#page_content_0').addClass('current');
        $('#page_content_2, #page_content_1').removeClass('current');

        $(".ki_images_select").remove();
        $(".ki_secador_images_select").remove();
        $("#btnSaveData, #btnsecadorSaveData, #btnaGuardarSalir").hide().prop("disabled", false);
        $("#kt_form_input_page_0 select").val(0).trigger('change.select2');
        $("#kt_form_input_page_1 select").val(0).trigger('change.select2');
        $("#kt_form_input_page_2 select").val(0).trigger('change.select2');
        $("#kt_form_input_page_2 #servicio_tenico1").val($("#user_sesion").val()).trigger('change.select2');
        $("#id_tecnologia_vsd").prop("checked", false);
        $(".cls_tecnologia_vsd").hide(); 
        fnVsTecnologia('NO')
        $("#id_Tecnologis_vsd_porc").prop("checked", true);
        $(".tipo_tec_vsd").text("(%)");
        $(".cls_por").addClass("input_Tecnologia_vsd");
        $(".cls_secador").hide();
        $("#id_secador_obl").val(0);
        $(".cls_kit_valvulas").hide(); 
        $(".cls_kit_filtro_linea").hide(); 
        $("#id_kit_valvulas, #id_kit_filtro_linea, .each_kit_valvulas, .each_kit_filtro_linea").prop("checked", false);
        $("#kt_seguimiento_menu, .cls_step_2").hide();
        $(".cls_step_ot").show();
        $("#kt_modal_create_compresor").show();
        $("#kt_modal_create_secador").hide();
    }
    function empty2Form(){
        $(".cls_empty").empty();
        $("#kt_modal_create_campaign_stepper_form")[0].reset()
        $("#servicio_tenico2").val(0).trigger('change.select2');
        countador_ = 0;
        $('#page_0').addClass('current')
        $('#page_2, #page_1').removeClass('current') 
        $(".btn-stepper-previous").hide();
        $(".btn-stepper-next").hide();
        $('#page_content_0').addClass('current');
        $('#page_content_2, #page_content_1').removeClass('current');
        $(".ki_images_select").remove();
        $("#btnSaveData, #btnsecadorSaveData, #btnaGuardarSalir").hide().prop("disabled", false);
        $("#kt_form_input_page_0 select").val(0).trigger('change.select2');
        $("#kt_form_input_page_1 select").val(0).trigger('change.select2');
        $("#kt_form_input_page_2 select").val(0).trigger('change.select2');
        $("#kt_form_input_page_2 #servicio_tenico1").val($("#user_sesion").val()).trigger('change.select2');
        $("#id_tecnologia_vsd").prop("checked", false);
        $(".cls_tecnologia_vsd").hide();    
        fnVsTecnologia('NO')
        $("#id_Tecnologis_vsd_porc").prop("checked", true);
        $(".tipo_tec_vsd").text("(%)");
        $(".cls_por").addClass("input_Tecnologia_vsd");
        $(".cls_secador").hide();
        $("#id_secador_obl").val(0);
        $(".cls_kit_valvulas").hide(); 
        $(".cls_kit_filtro_linea").hide();   
        $("#id_kit_valvulas, #id_kit_filtro_linea, .each_kit_valvulas, .each_kit_filtro_linea").prop("checked", false);
        $("#kt_seguimiento_menu, .cls_step_2").hide();
        $(".cls_step_ot").show();
    }
    function empty3Form(){
        $(".cls_empty").empty();
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
        $("#btnSaveData, #btnsecadorSaveData, #btnaGuardarSalir").hide().prop("disabled", false);
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
        fnVsTecnologia('NO')
        $("#id_Tecnologis_vsd_porc").prop("checked", true);
        $("#id_limp_enf_no").prop("checked", true);
        $("#id_limpieza_enfriadores").prop("checked", false);
        $(".tipo_tec_vsd").text("(%)");
        $(".cls_por").addClass("input_Tecnologia_vsd");
        $(".cls_secador").hide();
        $("#id_secador_obl").val(0);
        $(".cls_kit_valvulas").hide(); 
        $(".cls_kit_filtro_linea").hide();  
        $("#id_kit_valvulas, #id_kit_filtro_linea, .each_kit_valvulas, .each_kit_filtro_linea").prop("checked", false);
        clearFirma();
        actualizarProgramacionUser('NO', $("#programcion_id_temporal").val() ,$("#programcion_id_numot_tmporal").val());
        $("#kt_seguimiento_menu, .cls_step_2").hide();
        $(".cls_step_ot").show();
        $("#kt_modal_create_compresor").show();
        $("#kt_modal_create_secador").hide();
        $(".kt_customer_view_payment_method").html('');
    }
    async function getArchivoByNumeroReporte(numero_reporte, $this, programacionid){
        spinnerOt($this);
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('reporte_numero', numero_reporte);
        data.append('tipo_registro', 'inicio');
        data.append('programacionid', programacionid);
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
                        var NOMBRE_ARCHIVO_CLS = value["NOMBRE_ARCHIVO"].replace('.', '');
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
                                            <button class="btn btn-sm p-1 btn-dark w-100 tk_delete_image_sesion NOT ${NOMBRE_ARCHIVO_CLS}" data-opt="editar" data-cls="${NOMBRE_ARCHIVO_CLS}" data-name=${value["NOMBRE_ARCHIVO"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                                <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin indicator-label"></i>
                                                <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                                <label class="form-check form-check-custom d-block ">
                                                    <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_check_image_sesion ${NOMBRE_ARCHIVO_CLS+'inp'}" data-cls="${NOMBRE_ARCHIVO_CLS+'inp'}" type="checkbox" name="" value="${value["ESTADO_VER_REPORTE"]}" >
                                                    <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    $("#kt_list_images").html(htmlContenImg);
                    document.getElementById("kt_list_images").append(createElemntoImg);
                    /*countador_ = 1;
                    $('#page_0').removeClass('current');
                    $('#page_1').addClass('current');
                    $(".btn-stepper-previous").show();
                    $(".btn-stepper-next").show();
                    $('#page_content_0').removeClass('current');
                    $('#page_content_1').addClass('current');
                    */
                    validar4Images()
                    /*
                    Toast.fire({
                        icon: icon1,
                        title:message1
                    });*/
                    $("#inicio_contador_imag").val(contadorImg1);
                    //$("#kt_seguimiento_menu, .cls_step_2").show();
                    //$(".cls_step_ot").hide();
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
    async function ActualizarReporteFinal(){
        $("#kt_form_input_page_2 .cls_empty").empty();
        $("#kt_form_input_page_3 .cls_empty").empty();
        $("#kt_form_input_page_5 .cls_empty").empty();
        $("#kt_form_input_page_6 .cls_empty").empty();
        $("#kt_form_input_page_3 input").removeClass("input_danger_border"); 
        const select_sr_tipo_servicio= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo_servicio').children('p').text();     
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
            var estatus_delete =$(this).attr("data-delete");
            var val_estado_ver_reporte =0;
            if (dataEstado=='active'){
                if (estatus_delete!=="true"){ 
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
            }
            var deletes = 1;
            if (estatus_delete==="true"){
                deletes = 0;
            }
            pushInicialImages.push({
                tipo_archivo: val_tipo_archivo,
                nombre_archivo : val_nombre_archivo, 
                nombre_original: val_nombre_original,
                ruta_relativa: val_ruta_relativa,
                estado_ver_reporte: val_estado_ver_reporte,
                estado: deletes,
                programacionid:$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"),
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
            var estatus_delete =$(this).attr("data-delete");
            var val_estado_ver_reporte =0;
            if (dataEstado=='active'){
                if (estatus_delete!=="true"){ 
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdNuevoFotos++;
                }
            }
            pushInicialNuevoImages.push({
                tipo_archivo: val_tipo_archivo,
                nombre_archivo : val_nombre_archivo, 
                nombre_original: val_nombre_original,
                ruta_relativa: val_ruta_relativa,
                estado_ver_reporte: val_estado_ver_reporte,
                programacionid:$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"),
                id: val_id
            });
        });
        var cantidadInicialUpdSumaFotos = cantidadInicialUpdFotos +cantidadInicialUpdNuevoFotos;
        if (select_sr_tipo_servicio==="REVISION" ||select_sr_tipo_servicio==="ALQUILER" || select_sr_tipo_servicio==="ARRANQUE"){

        }else{
            if (cantidadInicialUpdSumaFotos<4){
                Toast.fire({
                    icon: 'warning',
                    title: "Campo vacio: seleccione 4 fotos iniciales como mínimo para actualizar" 
                }); 
                beforeSendBtnLoad("#btnactualizarFinal", false);
                return;
            }
        }
        
        /////*******fin
        var pushFinalEditarImages =[]
        var pushFinalImages =[]
        var cantidadInicialUpdFotos =0;
        $(".ki_images_final_select.cls_editar").each(function(i, val){
            var children = $(this).children();
            var dataEstado = children.attr("data-estado");
            var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
            var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
            var val_nombre_original =$(this).children(".cls_nombre_original").val();
            var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
            var val_id =$(this).children(".cls_id").val();
            var estatus_delete =$(this).attr("data-delete");
            var val_estado_ver_reporte =0;
            if (dataEstado=='active'){
                if (estatus_delete!=="true") {
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
            }
            var deletes = 1;
            if (estatus_delete==="true"){
                deletes = 0;
            }
            pushFinalEditarImages.push({
                tipo_archivo: val_tipo_archivo,
                nombre_archivo : val_nombre_archivo, 
                nombre_original: val_nombre_original,
                ruta_relativa: val_ruta_relativa,
                estado_ver_reporte: val_estado_ver_reporte,
                estado: deletes,
                programacionid:$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"),
                id: val_id
            });
        });
        $(".ki_images_final_select.cls_nuevo").each(function(i, val){
            var children = $(this).children();
            var dataEstado = children.attr("data-estado");
            var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
            var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
            var val_nombre_original =$(this).children(".cls_nombre_original").val();
            var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
            var val_id =$(this).children(".cls_id").val();
            var estatus_delete =$(this).attr("data-delete");
            var val_estado_ver_reporte =0;
            if (dataEstado=='active'){
                if (estatus_delete!=="true") {
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
            }
            pushFinalImages.push({
                tipo_archivo: val_tipo_archivo,
                nombre_archivo : val_nombre_archivo, 
                nombre_original: val_nombre_original,
                ruta_relativa: val_ruta_relativa,
                estado_ver_reporte: val_estado_ver_reporte,
                programacionid:$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"),
                id: val_id
            });
        });
        var tipo_servicio = $("#service_tipo_service").val();
        if (tipo_servicio!=="REVISION"){
            if (cantidadInicialUpdFotos<4){
                Toast.fire({
                    icon: 'warning',
                    title: "Campo vacio: seleccione 4 fotos finales como mínimo para actualizar." 
                }); 
                beforeSendBtnLoad("#btnactualizarFinal", false);
                return;
            }
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
                    ruta_relativa: val_ruta_relativa,
                    programacionid:$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"),
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
        /*if (counterContactEmail==0){
            Toast.fire({
                icon: 'warning',
                title: "Seleccione un contacto para el envio de correo por favor." 
            }); 
            beforeSendBtnLoad("#btnactualizarFinal", false);
            return;
        }
        */
        each_kit_push_valvulas =[];            
        $(".each_kit_valvulas").each(function(i, val){
            var valor = $(this).is(":checked");
            if ( $(this).is(":checked")){
                each_kit_push_valvulas.push({
                    valor:valor
                });
            }
        })
        $("#name_kit_valvulas").val('');
        if (each_kit_push_valvulas.length>0){
            $("#name_kit_valvulas").val(1);
        }
        each_kit_filtro_push_linea =[];
        $(".each_kit_filtro_linea").each(function(i, val){
            var valor1 = $(this).is(":checked");
            if ( $(this).is(":checked")){
                each_kit_filtro_push_linea.push({
                    valor:valor1
                });
            }  
        });
        $("#name_kit_filtro_linea").val('');
        if (each_kit_filtro_push_linea.length>0){
            $("#name_kit_filtro_linea").val(1);
        }
        $arrayGuiaRem = [];
        $counterTotalGuia =0;
        $(".chk_guia_remision").each(function(i, val){
            $counterTotalGuia++;
            var valor = $(this).is(":checked");
            var ot = $(this).data("ot");
            var numguia = $(this).data("numguia");
            var numserie = $(this).data("numserie");
            if ( $(this).is(":checked")){
                $arrayGuiaRem.push({
                    valor:valor,
                    ot:ot,
                    numguia:numguia,
                    numserie:numserie,
                });
            }
        })
        if ($counterTotalGuia>0){
            if ($arrayGuiaRem.length==0){
                Toast.fire({
                    icon: 'warning',
                    title: "Seleccione al menos una guia de remisión."
                });
                $(".btn-stepper-previous").prop("disabled", false);
                beforeSendBtnLoad("#btnactualizarFinal", false);
                return;
            }
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
        const service_equipo_modelo_tipo=$("#service_equipo_modelo_tipo").val();
        const service_secador_tipo_refrigeracion=$("#service_secador_tipo_refrigeracion").val();
        const verificacion_estado_filtro_de_aceite=$("#verificacion_estado_filtro_de_aceite").val();
        const verificacion_estado_filtro_de_aire=$("#verificacion_estado_filtro_de_aire").val();
        const verificacion_estado_de_limpieza=$("#verificacion_estado_de_limpieza").val();
        const vida_de_engrase_motor=$("#vida_de_engrase_motor").val();
        const engrase_de_motor=$("#engrase_de_motor").val();
        const service_fecha=$("#service_fecha").val();
        data.append('_token', $("input[name='_token']").val());
        data.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));
        data.append("programacionid",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"));
        data.append("reporte_orden_trabajo",$("#service_ot").val());
        data.append("reporte_fecha_servicio",service_fecha=="0"?'':service_fecha);
        data.append("nombre_tecnico_responsable_02",id_tecnico_02=="0"?'':$("#servicio_tenico2 option:selected").text());
        data.append("id_tecnico_02",id_tecnico_02=="0"?'':id_tecnico_02);
        data.append("id_obl",$("#id_obl").val());
        data.append("empresa_nombre", $("#service_razon_social").val());
        data.append("ruc",$("#service_ruc").val());
        data.append("empresa_direccion",$("#service_direccion").val());
        data.append("empresa_telefono",$("#service_tel_cliente").val());
        data.append("empresa_email",$("#service_email_cliente").val());
        data.append("equipo_id",$("#service_equipo_id").val()); 
        data.append("equipo_marca",$("#service_equipo_marca").val()); 
        data.append("equipo_referencia",$("#service_equipo_referencia").val()  );
        data.append("equipo_modelo", $("#service_equipo_modelo").val() );
        data.append("equipo_nro_serie", $("#service_equipo_serie").val() );
        data.append("equipo_modulo_tipo",service_equipo_modelo_tipo=="0"?'':service_equipo_modelo_tipo ); 
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
        data.append("secador_tipo_refrigeracion",service_secador_tipo_refrigeracion=="0"?'':service_secador_tipo_refrigeracion);
        data.append("secador_nota",$("#service_secador_nota").val());
        data.append("imagesFinalNuevoDatos",JSON.stringify(pushFinalImages));
        data.append("pushFinalEditarImages",JSON.stringify(pushFinalEditarImages));
        data.append("imagesInicialDatos",JSON.stringify(pushInicialImages));
        data.append("imagesInicialNuevoDatos",JSON.stringify(pushInicialNuevoImages));
        data.append("verificacion_tipo_aceite_usado",verifi_tipo_aceite_usado=="0"?'':verifi_tipo_aceite_usado);
        data.append("verificacion_estado_aceite",verifi_est_aceite=="0"?'':verifi_est_aceite); 
        data.append("verificacion_estado_separador",verifi_est_separado=="0"?'':verifi_est_separado); 
        data.append("verificacion_estado_fajas_acoplamiento",verifi_est_fajas_acopl=="0"?'':verifi_est_fajas_acopl);
        data.append("verificacion_estado_de_limpieza",verificacion_estado_de_limpieza=="0"?'':verificacion_estado_de_limpieza);
        data.append("limpieza_enfriadores", $("#id_limpieza_enfriadores").is(":checked")?'X':''); 
        data.append("engrase_de_motor", engrase_de_motor=="0"?'':engrase_de_motor); 
        data.append("verificacion_estado_filtro_de_aceite",verificacion_estado_filtro_de_aceite=="0"?'':verificacion_estado_filtro_de_aceite);
        data.append("verificacion_estado_filtro_de_aire",verificacion_estado_filtro_de_aire=="0"?'':verificacion_estado_filtro_de_aire);
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
        data.append("voltaje_de_control",$("#voltaje_de_control").val());
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
        data.append("vida_de_engrase_motor",vida_de_engrase_motor=="0"?'':vida_de_engrase_motor);
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
        data.append("observaciones_internas",$("#observaciones_internas").val());
        data.append("diferencial_presion_aire",$("#diferencial_presion_aire").val());
        data.append("diferencial_presion_separador",$("#diferencial_presion_separador").val());
        data.append("temperatura_ambiente", $("#temperatura_ambiente").val());
        data.append("horas_de_viaje",$("#horas_de_viaje").val());
        data.append("horas_extras",$("#horas_extras").val());
        data.append("nombre_jefe_encargado", $("#id_nombre_jefe_encargado").val()); 
        data.append("horas_de_trabajo", "");
        data.append("copia", "");
        data.append("vsd_00_20rpm", $("#vsd_00_20rpm").val());
        data.append("vsd_20_40rpm", $("#vsd_20_40rpm").val());
        data.append("vsd_40_60rpm", $("#vsd_40_60rpm").val());
        data.append("vsd_60_80rpm", $("#vsd_60_80rpm").val());
        data.append("vsd_80_100rpm", $("#vsd_80_100rpm").val());
        data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
        data.append("imagesFirma",JSON.stringify(pushFirmaImages));
        data.append("dataEmailContact",JSON.stringify(dataEmailContact));
        data.append("id_secador_obl", $("#id_secador_obl").val());
        data.append("tipo_servicio_cotizacion", $("#service_tipo_servicio_cotizacion").val());
        data.append("local_nombre", $("#service_local_nombre").val());
        data.append("proximo_servicio", 'proximo_servicio');
        data.append("secador_amperaje", $("#service_secador_amperaje").val());
        data.append("kitvalvulas_cambio", $("#id_kit_valvulas").is(":checked")?'X':''); 
        data.append("kitvalvulas_amision", $("#id_kitvalvulas_amision").is(":checked")?'X':''); 
        data.append("kitvalvulas_termostatica", $("#id_kitvalvulas_termostatica").is(":checked")?'X':''); 
        data.append("kitvalvulas_minimapresion", $("#id_kitvalvulas_minimapresion").is(":checked")?'X':''); 
        data.append("kitvalvulas_check", $("#id_kitvalvulas_check").is(":checked")?'X':''); 
        data.append("kitvalvulas_paradaaceite", $("#id_kitvalvulas_paradaaceite").is(":checked")?'X':''); 
        data.append("kitvalvulas_lineabarrido", $("#id_kitvalvulas_lineabarrido").is(":checked")?'X':''); 
        data.append("kitvalvulas_trampagua", $("#id_kitvalvulas_trampagua").is(":checked")?'X':''); 
        data.append("kitvalvulas_solenoide", $("#id_kitvalvulas_solenoide").is(":checked")?'X':'');
        data.append("kitvalvulas_ventilacion", $("#id_kitvalvulas_ventilacion").is(":checked")?'X':'');
        data.append("kitvalvulas_tresvias", $("#id_kitvalvulas_tresvias").is(":checked")?'X':'');
        data.append("kitvalvulas_regulacion_termostatica", $("#id_kitvalvulas_regulacion_termostatica").is(":checked")?'X':'');
        data.append("kitvalvulas_purgador_auto_ewd", $("#id_kitvalvulas_purgador_auto_ewd").is(":checked")?'X':'');
        data.append("kitfiltroslinea_cambio", $("#id_kit_filtro_linea").is(":checked")?'X':'');    
        data.append("kitfiltroslinea_dd", $("#id_kitfiltroslinea_dd").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_qd", $("#id_kitfiltroslinea_qd").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_ddp", $("#id_kitfiltroslinea_ddp").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_pd", $("#id_kitfiltroslinea_pd").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_qdt", $("#id_kitfiltroslinea_qdt").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_udplus", $("#id_kitfiltroslinea_udplus").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_pdp", $("#id_kitfiltroslinea_pdp").is(":checked")?'X':''); 
        data.append("name_kit_valvulas",$("#name_kit_valvulas").val() ); 
        data.append("name_kit_filtro_linea",$("#name_kit_filtro_linea").val()); 
        data.append("medicion_ventilador_01_l1",$("#medicion_ventilador_01_l1").val()); 
        data.append("medicion_ventilador_01_l2",$("#medicion_ventilador_01_l2").val()); 
        data.append("medicion_ventilador_01_l3",$("#medicion_ventilador_01_l3").val()); 
        data.append("medicion_ventilador_02_l1",$("#medicion_ventilador_02_l1").val()); 
        data.append("medicion_ventilador_02_l2",$("#medicion_ventilador_02_l2").val()); 
        data.append("medicion_ventilador_02_l3",$("#medicion_ventilador_02_l3").val()); 
        data.append("arrayGuiaRem",JSON.stringify($arrayGuiaRem)); 
        $(".btn-stepper-previous").prop("disabled", true);
        const response = await fetch(`${APP_URL}/reporte/actualizar-final`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            $(".btn-stepper-previous").prop("disabled", false);
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
                        $("#kt_form_input_page_2 input[name='"+key+"'], #kt_form_input_page_2 select[name='"+key+"'], #kt_form_input_page_2 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
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
                        timer: 3000
                    });
                    empty3Form();
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
        var myHeaders = new Headers();
        //myHeaders.append("Accept", "application/json");
        //myHeaders.append("Authorization", "Bearer "+$("#id_token").val());
        const id_tecnico_01=$("#servicio_tenico1").val();
        datosFiles.append('_token', $("input[name='_token']").val());
        datosFiles.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));
        datosFiles.append("programacionid",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"));
        datosFiles.append("id_tecnico_01",id_tecnico_01=="0"?'':id_tecnico_01);
        datosFiles.append("tipo_registro",'final');
        //var tarhe = e.target.parentElement.nextElementSibling.children[0]; 
        const response = await fetch(`${APP_URL_BK}/api/servicio/request-file`, {
            method: 'POST',
            //headers: myHeaders,
            body: datosFiles,
            //redirect: 'follow'
        }).then(async (response)=> {
            const rest = await response.json();
            var datos = rest;
            var icon = rest.icon;
            var status = rest.status;
            var message = rest.message;    
            $("#spiner_upload_final_images").hide();          
            if (status){
                var data = rest.data;     
                var latest = rest.latest;             
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
                    //if (contadorIFinalmg1>=1 && contadorIFinalmg1<=4){
                        classActiveCheck = 'active';
                        classBtnActiveCheck =' checked ';
                    //}
                    htmlContenImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_images_final_select cls_nuevo">
                                <div class="position-absolute cls_check_final_photo ${classActiveCheck}" data-estado="${classActiveCheck}" > 
                                    <i class="bi bi-check2 fs-2x"></i>
                                </div>
                                <input type="hidden"  class="d-none cls_tipo_archivo" value="${value["tipo_archivo"]}" >
                                <input type="hidden"  class="d-none cls_nombre_archivo" value="${value["nombre_archivo"]}">
                                <input type="hidden"  class="d-none cls_nombre_original" value="${value["nombre_original"]}">
                                <input type="hidden"  class="d-none cls_ruta_relativa" value="${value["ruta_relativa"]}">
                                <input type="hidden"  class="d-none cls_id" value="${latest}">
                                <div  class="btn btn-outline btn-outline-dashed btn-outline-default w-100 active p-0 image-input" >
                                    <div data-image="${APP_URL_IMG_BK}${value["ruta_relativa"]}" class="image-input-wrapper w-100 h-120px background-size-cover" style="border-radius: 0.475rem 0.475rem 0 0;background-image: url(${APP_URL_IMG_BK}${value["ruta_relativa"]})" ></div> 
                                    <div class="d-flex align-items-stretch cls-btn-option-images" >
                                        <button class="btn btn-sm p-1 btn-dark w-100 tk_delete_image_final_sesion ${value["name_cls"]}" data-opt="nuevo" data-cls="${value["name_cls"]}" data-name=${value["nombre_archivo"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                            <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin indicator-label"></i>
                                            <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                            <label class="form-check form-check-custom d-block ">
                                                <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_check_image_final_sesion ${value["name_cls"]+'inp'}" data-cls="${value["name_cls"]+'inp'}" type="checkbox" name="" value="" >
                                                <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
            }else{
                Toast.fire({
                    icon: 'error',
                    title: rest.message
                });
            }
        })
        //href={REACT_APP_REST_BACK+rsfiles.nombre_archivo}
        .catch(function (error){
            console.log(error)
        });
    });

    async function getArchivoFinalByNumeroReporte(numero_reporte, $this, programacionid){
        //spinnerOt($this);
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('reporte_numero', numero_reporte);
        data.append('tipo_registro', 'final');
        data.append('programacionid', programacionid);
        const response = await fetch(`${APP_URL}/reporte/listar-archivo-by-reporte`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            //spinnerOt($this, false);
            
            const rest = await response.json();
            const status1 = rest.status;                
            if (status1){
                const status1 = rest.data.status;
                const icon1 = rest.data.icon;
                const message1 = rest.data.message;
                const data1 = rest.data.data;
                const IdUploadFinalImg = $("#IdUploadFinalImg").html();
                const createElemntoImg = document.createElement("div");
                createElemntoImg.classList.add('col-md-3');
                createElemntoImg.classList.add('col-sm-4');
                createElemntoImg.classList.add('fv-row');
                createElemntoImg.classList.add('px-8');
                createElemntoImg.classList.add('pt-3');
                createElemntoImg.setAttribute("id", "IdUploadFinalImg");
                createElemntoImg.innerHTML = IdUploadFinalImg;
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
                        var NOMBRE_ARCHIVO_CLS = value["NOMBRE_ARCHIVO"].replace('.', '');
                        htmlContenImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_images_final_select cls_editar">
                                    <div class="position-absolute cls_check_final_photo ${classActiveCheck}" data-estado="${classActiveCheck}" > 
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
                                            <button class="btn btn-sm p-1 btn-dark w-100 tk_delete_image_final_sesion NOT ${NOMBRE_ARCHIVO_CLS}" data-opt="editar" data-cls="${NOMBRE_ARCHIVO_CLS}" data-name=${value["NOMBRE_ARCHIVO"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                                <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin indicator-label"></i>
                                                <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                                <label class="form-check form-check-custom d-block ">
                                                    <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_check_image_final_sesion ${NOMBRE_ARCHIVO_CLS+'inp'}" data-cls="${NOMBRE_ARCHIVO_CLS+'inp'}" type="checkbox" name="" value="${value["ESTADO_VER_REPORTE"]}" >
                                                    <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    $("#kt_list_final_images").html(htmlContenImg);
                    document.getElementById("kt_list_final_images").append(createElemntoImg);
                    $("#inicio_contador_imag").val(contadorImg1);
                    validar4FinalImages()
                }else{
                    if (icon1=="error"){
                        
                    }
                    /*
                    Toast.fire({
                        icon: icon1,
                        title:message1
                    });
                    */
                    
                    $("#kt_list_final_images").html('');
                    document.getElementById("kt_list_final_images").append(createElemntoImg);
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

    function validar4FinalImages(){
        var count_ = 0;
        var tipo_servicio = $("#service_tipo_service").val();
        $(".ki_images_final_select").each(function(i, val){
            var thisclas = $(this).children().attr("data-estado");
            var estatus_delete =$(this).attr("data-delete");
            var thisclas1 = $(this).children();
            if (thisclas=='active'){
                if(estatus_delete!=="true"){
                    count_++;
                }
            }
        });
        $(".btn-stepper-next").prop("disabled", true);
        if (tipo_servicio==="REVISION"){
            $(".btn-stepper-next").prop("disabled", false);
        }
        $(".btk_check_image_final_sesion").each(function(i, val){
            if(!$(this).is(":checked")){
                $(this).parent().parent().prop("disabled", false);
            }
        });
        if (count_>=4){
            $(".btn-stepper-next").prop("disabled", false);
        }
        return count_;
    }
    $(document).on("click", ".btk_check_image_final_sesion", async function(event){
        var $this = $(this);
        var dataCls = $this.attr("data-cls");
        var estado_ver_reporte = 0;
        if($this.is(":checked")){
            var estado_ver_reporte = 1;
        }
        var val_id = $this.parent().parent().parent().parent().parent().children(".cls_id").val();
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('id',val_id);
        data.append('estado_ver_reporte', estado_ver_reporte);
        data.append('estado', 1);
        beforeSendInputLoad("."+dataCls);
        const response = await fetch(`${APP_URL}/servicio/check-ver-reporte-foto`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            beforeSendInputLoad("."+dataCls, false);
            const rest = await response.json();
            const datos = rest.data;
            const status = rest.status;
            if(status){
                const status1 = rest.data.status;
                const message = rest.data.message
                if (message==="Unauthenticated."){
                    Toast.fire({
                        icon: 'error',
                        title: message
                    });
                    return;
                }              
                var children = $this.parent().parent().parent().parent().parent().children(".cls_check_final_photo");
                var thisActive = children.attr("data-estado");
                $btk_image_sesion = $this;
                if (thisActive=='active'){
                    children.attr("data-estado", "").removeClass("active");
                }else{
                    children.attr("data-estado", "active").addClass("active");
                }
                validar4FinalImages();
                
                return;
            }
            Toast.fire({
                icon: rest.icon,
                title: rest.message
            });
                            
        }).catch((error) => {
            console.log(error)
        });

    });
    async function EliminarFinalArchivo(dataNombre, $this, dataCls){
        beforeSendBtnLoad("."+dataCls);
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('nombre_archivo', dataNombre["dataNombre"]);
        data.append('id', dataNombre["id"]);
        data.append('estado_ver_reporte', 0);
        data.append('estado', 0);
        const response = await fetch(`${APP_URL}/servicio/delete-file`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            beforeSendBtnLoad("."+dataCls, false);
            const rest = await response.json();
            const datos = rest.data;
            const status = rest.status;
            if(status){
                const status1 = rest.data.status;
                const message = rest.data.message
                if (message==="Unauthenticated."){
                    Toast.fire({
                        icon: 'error',
                        title: message
                    });
                    return;
                }
                Toast.fire({
                    icon: rest.data.icon,
                    title: message
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
    async function EliminarArchivoFinalMultiple(dataNombre, $this, dataCls){
        beforeSendBtnLoad("."+dataCls);
        $this.parent().parent().parent().attr("data-delete", true).hide();
        validar4FinalImages()
        contadorIFinalmg1=contadorIFinalmg1-1;
        return;
    }
    
    $(document).on("click", ".tk_delete_image_final_sesion", async function(event){
        var dataNombre = $(this).data("name");
        var dataCls = $(this).data("cls");
        var dataOpt = $(this).data("opt");
        var $this = $(this);
        var val_id =$(this).parent().parent().parent().children(".cls_id").val();
        var arr = [];
        arr["dataNombre"]=dataNombre;
        arr["id"]=val_id;
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
                EliminarFinalArchivo(arr, $this, dataCls);
                return;
                if(dataOpt==="nuevo"){
                    EliminarFinalArchivo(dataNombre, $this, dataCls);
                }else{
                    EliminarArchivoFinalMultiple(dataNombre, $this, dataCls)
                }
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
                        $("#idSecadorFirmaCliente").attr("src",`${APP_URL_IMG_BK }/${ruta_relativa}` ).show();
                        $("#kt_signature_customer, #kt_secador_signature_customer").html(
                            `<input type="hidden" class="cls_tipo_firma" value="${opt}">
                            <input type="hidden" class="cls_ruta_relativa" value="${ruta_relativa}">
                                <input type="hidden" class="cls_tipo_archivo" value="${tipo_archivo}">
                                <input type="hidden" class="cls_nombre_archivo" value="${nombre_archivo}">
                                <input type="hidden" class="cls_nombre_original" value="${nombre_original}">  
                            `
                        );
                    }else{
                        $("#idFirmaTecnico").attr("src",`${APP_URL_IMG_BK }/${ruta_relativa}` ).show();
                        $("#idSecadorFirmaTecnico").attr("src",`${APP_URL_IMG_BK }/${ruta_relativa}` ).show();
                        $("#kt_signature_technican, #kt_secador_signature_technican").html(
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
                }else{
                    Toast.fire({
                        icon: rest.data.icon,
                        title: rest.data.message
                    });
                }
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
    function clearFirma(){
        $(".kt_signature_datos").html('')
        $(".kt_secador_signature_datos").html('')
        $("#idFirmaCliente, #idFirmaTecnico").hide();
        $("#idSecadorFirmaCliente, #idSecadorFirmaTecnico").hide();
    }
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
        var vida_de_engrase_motor = $("select[name='vida_de_engrase_motor']").val() ;
        var engrase_de_motor = $("select[name='engrase_de_motor']").val() ;
        $("#id_resumen_empresa_nombre").text($("input[name='empresa_nombre']").val());
        $("#id_resumen_ruc").text($("input[name='ruc']").val());
        $("#id_resumen_empresa_direccion").text($("input[name='empresa_direccion']").val());
        $("#id_resumen_empresa_telefono").text($("input[name='empresa_telefono']").val());
        $("#id_resumen_equipo_marca").text($("input[name='equipo_marca']").val());
        $("#id_resumen_equipo_modelo").text($("input[name='equipo_modelo']").val());
        $("#id_resumen_equipo_nro_serie").text($("input[name='equipo_nro_serie']").val());
        $("#id_resumen_equipo_modulo_tipo").text($("select[name='equipo_modulo_tipo']").val());
        $("#id_resumen_equipo_presion").text($("input[name='equipo_presion']").val());
        $("#id_resumen_equipo_caudal").text($("input[name='equipo_caudal']").val());
        $("#id_resumen_equipo_rpm").text($("input[name='equipo_rpm']").val());
        $("#id_resumen_equipo_horometro").text($("input[name='equipo_horometro']").val());
        $("#id_resumen_horas_carga").text($("input[name='horas_carga']").val());
        $("#id_resumen_secador_modelo").text($("input[name='secador_modelo']").val());
        $("#id_resumen_secador_nro_serie").text($("input[name='secador_nro_serie']").val());
        $("#id_resumen_secador_punto_rocio").text($("input[name='secador_punto_rocio']").val());
        $("#id_resumen_secador_voltaje_amp").text($("input[name='secador_voltaje_amp']").val());
        $("#id_resumen_secador_amperaje").text($("input[name='secador_amperaje']").val());
        $("#id_resumen_secador_proteccion").text($("input[name='secador_proteccion']").val());
        $("#id_resumen_secador_limpieza").text($("input[name='secador_limpieza']").val());
        $("#id_resumen_secador_tipo_refrigeracion").text($("select[name='secador_tipo_refrigeracion']").val());
        $("#id_resumen_secador_nota").text($("textarea[name='secador_nota']").val());
        $("#id_resumen_verificacion_tipo_aceite_usado").text($("select[name='verificacion_tipo_aceite_usado']").val());
        $("#id_resumen_verificacion_estado_aceite").text($("select[name='verificacion_estado_aceite']").val());
        $("#id_resumen_verificacion_estado_separador").text($("select[name='verificacion_estado_separador']").val());
        $("#id_resumen_verificacion_estado_fajas_acoplamiento").text($("select[name='verificacion_estado_fajas_acoplamiento']").val());
        $("#id_resumen_verificacion_estado_de_limpieza").text($("select[name='verificacion_estado_de_limpieza']").val());
        $("#id_resumen_verificacion_estado_filtro_de_aceite").text($("select[name='verificacion_estado_filtro_de_aceite']").val());
        $("#id_resumen_verificacion_estado_filtro_de_aire").text($("select[name='verificacion_estado_filtro_de_aire']").val());
        $("#id_resumen_medicion_voltaje_ul1l2").text($("input[name='medicion_voltaje_ul1l2']").val());
        $("#id_resumen_medicion_voltaje_ul2l3").text($("input[name='medicion_voltaje_ul2l3']").val());
        $("#id_resumen_medicion_voltaje_ul1l3").text($("input[name='medicion_voltaje_ul1l3']").val());
        $("#id_resumen_medicion_amperaje_l1").text($("input[name='medicion_amperaje_l1']").val());
        $("#id_resumen_medicion_amperaje_l2").text($("input[name='medicion_amperaje_l2']").val());
        $("#id_resumen_medicion_amperaje_l3").text($("input[name='medicion_amperaje_l3']").val());
        $("#id_resumen_medicion_amperaje_f1").text($("input[name='medicion_amperaje_f1']").val());
        $("#id_resumen_medicion_amperaje_f2").text($("input[name='medicion_amperaje_f2']").val());
        $("#id_resumen_medicion_amperaje_f3").text($("input[name='medicion_amperaje_f3']").val());

        $("#id_resumen_medicion_ventilador_01_l1").text($("input[name='medicion_ventilador_01_l1']").val());
        $("#id_resumen_medicion_ventilador_01_l2").text($("input[name='medicion_ventilador_01_l2']").val());
        $("#id_resumen_medicion_ventilador_01_l3").text($("input[name='medicion_ventilador_01_l3']").val());
        $("#id_resumen_medicion_ventilador_02_l1").text($("input[name='medicion_ventilador_02_l1']").val());
        $("#id_resumen_medicion_ventilador_02_l2").text($("input[name='medicion_ventilador_02_l2']").val());
        $("#id_resumen_medicion_ventilador_02_l3").text($("input[name='medicion_ventilador_02_l3']").val());
        $("#id_resumen_thermomagnetico").text($("input[name='thermomagnetico']").val());
        $("#id_resumen_linea_a_tierra").text($("input[name='linea_a_tierra']").val());
        
        $("#id_resumen_voltaje_del_control").text($("input[name='voltaje_de_control']").val());
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
        $("#id_resumen_vida_de_engrase_motor").text(vida_de_engrase_motor=="0"?'': $("select[name='vida_de_engrase_motor']").val());
        //$("#id_resumen_limpieza_enfriadores").text();
        $("#id_limpieza_enfriadores").is(":checked")? $("#id_resumen_limpieza_enfriadores").text('SE REALIZÓ'):$("#id_resumen_limpieza_enfriadores").text('')
        $("#id_resumen_engrase_de_motor").text(engrase_de_motor=="0"?'': $("select[name='engrase_de_motor']").val());
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
        $("#id_resumen_diferencial_presion_aire").text($("input[name='diferencial_presion_aire']").val()); 
        $("#id_resumen_diferencial_presion_separador").text($("input[name='diferencial_presion_separador']").val()); 
        $("#id_resumen_temperatura_ambiente").text($("input[name='temperatura_ambiente']").val()); 
        /*var descripcion_del_trabajo = $("textarea[name='descripcion_del_trabajo']").val();
        var recomendaciones = $("textarea[name='recomendaciones']").val();
        console.log(descripcion_del_trabajo)
        var descripcion_del_trabajo = descripcion_del_trabajo.replace('\n', '<br>');
        $("#id_resumen_descripcion_del_trabajo").html(descripcion_del_trabajo); 
        console.log(descripcion_del_trabajo)
        $("#id_resumen_recomendaciones").text(recomendaciones.replace('\n', '<br>')); 
        */
        
        $("#id_kit_valvulas").is(":checked")? $("#id_resumen_kit_valvulas").prop("checked", true): $("#id_resumen_kit_valvulas").prop("checked", false);
        $("#id_kitvalvulas_amision").is(":checked")? $("#id_resumen_kitvalvulas_amision").prop("checked", true): $("#id_resumen_kitvalvulas_amision").prop("checked", false);
        $("#id_kitvalvulas_termostatica").is(":checked")? $("#id_resumen_kitvalvulas_termostatica").prop("checked", true): $("#id_resumen_kitvalvulas_termostatica").prop("checked", false);
        $("#id_kitvalvulas_minimapresion").is(":checked")? $("#id_resumen_kitvalvulas_minimapresion").prop("checked", true): $("#id_resumen_kitvalvulas_minimapresion").prop("checked", false);
        $("#id_kitvalvulas_check").is(":checked")? $("#id_resumen_kitvalvulas_check").prop("checked", true): $("#id_resumen_kitvalvulas_check").prop("checked", false);
        $("#id_kitvalvulas_paradaaceite").is(":checked")? $("#id_resumen_kitvalvulas_paradaaceite").prop("checked", true): $("#id_resumen_kitvalvulas_paradaaceite").prop("checked", false);
        $("#id_kitvalvulas_lineabarrido").is(":checked")? $("#id_resumen_kitvalvulas_lineabarrido").prop("checked", true): $("#id_resumen_kitvalvulas_lineabarrido").prop("checked", false);
        $("#id_kitvalvulas_trampagua").is(":checked")? $("#id_resumen_kitvalvulas_trampagua").prop("checked", true): $("#id_resumen_kitvalvulas_trampagua").prop("checked", false);
        $("#id_kitvalvulas_solenoide").is(":checked")? $("#id_resumen_kitvalvulas_solenoide").prop("checked", true): $("#id_resumen_kitvalvulas_solenoide").prop("checked", false);  
        $("#id_kitvalvulas_ventilacion").is(":checked")? $("#id_resumen_kitvalvulas_ventilacion").prop("checked", true): $("#id_resumen_kitvalvulas_ventilacion").prop("checked", false);  
        $("#id_kitvalvulas_tresvias").is(":checked")? $("#id_resumen_kitvalvulas_tresvias").prop("checked", true): $("#id_resumen_kitvalvulas_tresvias").prop("checked", false);  
        $("#id_kitvalvulas_regulacion_termostatica").is(":checked")? $("#id_resumen_kitvalvulas_regulacion_termostatica").prop("checked", true): $("#id_resumen_kitvalvulas_regulacion_termostatica").prop("checked", false);  
        $("#id_kitvalvulas_purgador_auto_ewd").is(":checked")? $("#id_resumen_kitvalvulas_purgador_auto_ewd").prop("checked", true): $("#id_resumen_kitvalvulas_purgador_auto_ewd").prop("checked", false);         
        $("#id_kit_filtro_linea").is(":checked")? $("#id_resumen_kit_filtro_linea").prop("checked", true): $("#id_resumen_kit_filtro_linea").prop("checked", false);
        $("#id_kitfiltroslinea_dd").is(":checked")? $("#id_resumen_kitfiltroslinea_dd").prop("checked", true): $("#id_resumen_kitfiltroslinea_dd").prop("checked", false);
        $("#id_kitfiltroslinea_qd").is(":checked")? $("#id_resumen_kitfiltroslinea_qd").prop("checked", true): $("#id_resumen_kitfiltroslinea_qd").prop("checked", false);
        $("#id_kitfiltroslinea_ddp").is(":checked")? $("#id_resumen_kitfiltroslinea_ddp").prop("checked", true): $("#id_resumen_kitfiltroslinea_ddp").prop("checked", false);
        $("#id_kitfiltroslinea_pd").is(":checked")? $("#id_resumen_kitfiltroslinea_pd").prop("checked", true): $("#id_resumen_kitfiltroslinea_pd").prop("checked", false);
        $("#id_kitfiltroslinea_qdt").is(":checked")? $("#id_resumen_kitfiltroslinea_qdt").prop("checked", true): $("#id_resumen_kitfiltroslinea_qdt").prop("checked", false);
        $("#id_kitfiltroslinea_udplus").is(":checked")? $("#id_resumen_kitfiltroslinea_udplus").prop("checked", true): $("#id_resumen_kitfiltroslinea_udplus").prop("checked", false);
        $("#id_kitfiltroslinea_pdp").is(":checked")? $("#id_resumen_kitfiltroslinea_pdp").prop("checked", true): $("#id_resumen_kitfiltroslinea_pdp").prop("checked", false);
    }
    function AdDescripcionTrabajo(){
        var aceite = $("select[name='verificacion_estado_aceite']").val();
        var filtro_aceite =$("select[name='verificacion_estado_filtro_de_aceite']").val();
        var filtro_aire =$("select[name='verificacion_estado_filtro_de_aire']").val();
        var estado_separador =$("select[name='verificacion_estado_separador']").val();
        var fajas_acomplamiento =$("select[name='verificacion_estado_fajas_acoplamiento']").val();
        var engrase_de_motor =$("select[name='engrase_de_motor']").val();

        aceite=aceite==="SE CAMBIÓ"? 'Se cambió Aceite.' +'\n': '';
        filtro_aceite=filtro_aceite==="SE CAMBIÓ"? 'Se cambió Filtro de Aceite.' +'\n': '';
        filtro_aire=filtro_aire=== "SE CAMBIÓ"? 'Se cambió Filtro de Aire.' +'\n': '';
        estado_separador=estado_separador==="SE CAMBIÓ"? 'Se cambió Separador de aceite.' +'\n': '';
        fajas_acomplamiento=fajas_acomplamiento==="SE CAMBIÓ"? 'Se cambiaron las fajas.' +'\n': '';
        engrase_de_motor=engrase_de_motor==="SE CAMBIÓ"? 'Se cambió engrase del motor.' +'\n': '';
        var KITVALVULAS_AMISION=$("#id_kitvalvulas_amision").is(":checked")? 'Se cambió Kit de Válvula de admisión.'+'\n': '';
        var KITVALVULAS_TERMOSTATICA= $("#id_kitvalvulas_termostatica").is(":checked")? 'Se cambió kit de Válvula termostática.' +'\n' :'';
        var KITVALVULAS_MINIMAPRESION= $("#id_kitvalvulas_minimapresion").is(":checked")? 'Se cambió kit de Válvula de mínima presión.' +'\n' :'';
        var KITVALVULAS_CHECK=$("#id_kitvalvulas_check").is(":checked")? 'Se cambió kit de Válvula de chek.' +'\n' :'';
        var KITVALVULAS_PARADAACEITE= $("#id_kitvalvulas_paradaaceite").is(":checked")? 'Se cambió kit de Válvula de parada de aciete.' +'\n' :'';
        var KITVALVULAS_LINEABARRIDO= $("#id_kitvalvulas_lineabarrido").is(":checked")? 'Se cambió kit de línea de barrido.' +'\n' :'';
        var KITVALVULAS_TRAMPAGUA= $("#id_kitvalvulas_trampagua").is(":checked")? 'Se cambió kit de trampa de agua.' +'\n' :'';
        var KITVALVULAS_SOLENOIDE= $("#id_kitvalvulas_solenoide").is(":checked")? 'Se cambió Válvula solenoide.' +'\n' :''; 

        var id_kitvalvulas_ventilacion= $("#id_kitvalvulas_ventilacion").is(":checked")? 'Se cambió Kit de Válvula de ventilación.' +'\n' :''; 
        var id_kitvalvulas_tresvias= $("#id_kitvalvulas_tresvias").is(":checked")? 'Se cambió Kit de Válvula de 3 vías.' +'\n' :''; 
        var id_kitvalvulas_regulacion_termostatica= $("#id_kitvalvulas_regulacion_termostatica").is(":checked")? 'Se cambió Kit de Válvula de regulación termostática.' +'\n' :''; 
        var id_kitvalvulas_purgador_auto_ewd= $("#id_kitvalvulas_purgador_auto_ewd").is(":checked")? 'Se cambió Kit de Válvula Purgador automático EWD.' +'\n' :''; 

        var KITFILTROSLINEA_DD=$("#id_kitfiltroslinea_dd").is(":checked")? 'Se cambió cartucho de filtro de línea DD.'+'\n':'';
        var KITFILTROSLINEA_QD= $("#id_kitfiltroslinea_qd").is(":checked")? 'Se cambió cartucho de filtro de línea QD.'+'\n':'';
        var KITFILTROSLINEA_DDP= $("#id_kitfiltroslinea_ddp").is(":checked")? 'Se cambió cartucho de filtro de línea DDP.'+'\n':'';
        var KITFILTROSLINEA_PD= $("#id_kitfiltroslinea_pd").is(":checked")? 'Se cambió cartucho de filtro de línea PD.'+'\n':'';
        var KITFILTROSLINEA_QDT= $("#id_kitfiltroslinea_qdt").is(":checked")? 'Se cambió material de la torre QDT.'+'\n':'';
        var KITFILTROSLINEA_UDPLUS= $("#id_kitfiltroslinea_udplus").is(":checked")? 'Se cambió cartucho de filtro de línea UD+.'+'\n':'';
        var KITFILTROSLINEA_PDP= $("#id_kitfiltroslinea_pdp").is(":checked")? 'Se cambió cartucho de filtro de línea PDP.'+'\n':'';
        $("#descripcion_del_trabajo").val(aceite+''+filtro_aceite+''+filtro_aire+''+estado_separador+''+fajas_acomplamiento +engrase_de_motor
        +KITVALVULAS_AMISION+KITVALVULAS_TERMOSTATICA + KITVALVULAS_MINIMAPRESION+ KITVALVULAS_CHECK+ KITVALVULAS_PARADAACEITE+
        KITVALVULAS_LINEABARRIDO+ KITVALVULAS_TRAMPAGUA+ KITVALVULAS_SOLENOIDE+id_kitvalvulas_ventilacion+id_kitvalvulas_tresvias+id_kitvalvulas_regulacion_termostatica+id_kitvalvulas_purgador_auto_ewd+ KITFILTROSLINEA_DD+ KITFILTROSLINEA_QD+
        KITFILTROSLINEA_DDP+ KITFILTROSLINEA_PD+KITFILTROSLINEA_QDT+KITFILTROSLINEA_UDPLUS+KITFILTROSLINEA_PDP);
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
                        $html_lista_correo_cnt+= `
                        <div class="d-flex justify-content-start kt_list_cnt_email">
                            <div class="fv-row mx-10 d-flex align-items-center">
                                <img width="40" src="${asset+'assets/media/logos/avatar.svg'}" alt="user" class="b-radius-50">
                            </div>
                            <div class="fv-row w-100">
                                <div class="fw-bold text-primary text-nombre-contact d-block w-100 fs-4">${value["Contacto_Desc"]}</div>
                                <span class="fw-bold text-muted fs-4 d-block w-100">${value["Contacto_Cargo"]}</span>
                                <span class="fw-bold fs-4 d-block w-100 fs-4 d-none">${value["Contacto_Email"]}</span>                                    
                            </div>
                            <div class="fv-row mx-10 each_chk w-30-px d-flex align-items-center">
                                <div data-tipo_chk_form="false" class="form-check form-check-custom " style="float: right;">
                                    <input data-tipo_chk_form="false" class="form-check-input me-3 chk_input_email" name="kt_modal_email_contact_0${counterEmail}" type="checkbox" value="${value["Contacto_Email"]}" id="kt_modal_email_contact_0${counterEmail}"/>
                                    <label class="form-check-label" for="kt_modal_email_contact_0${counterEmail}">
                                        <div class="text-gray-600"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-2"></div>`;
                        $html_lista_jefe_cnt+= `
                        <div class="d-flex justify-content-start kt_list_cnt_jefe_email">
                            <div class="fv-row mx-10 d-flex align-items-center">
                                <img width="40" src="${asset+'assets/media/logos/avatar.svg'}" alt="user" class="b-radius-50">
                            </div>
                            <div class="fv-row w-100">
                                <div class="fw-bold text-primary text-nombre-contact d-block w-100 fs-4">${value["Contacto_Desc"]}</div>
                                <span class="fw-bold text-muted fs-4 d-block w-100">${value["Contacto_Cargo"]}</span>
                                <span class="fw-bold fs-4 d-block w-100 fs-4 d-none">${value["Contacto_Email"]}</span>
                            </div>
                            <div class="fv-row mx-10 each_chk w-30-px d-flex align-items-center">
                                <div class="form-check form-check-custom " style="float: right;">
                                    <input data-id="kt_modal_email_contact_0${counterEmail}" class="form-check-input me-3" name="user_jefe_chk" type="radio" data-validaremail="true" data-nombre="${value["Contacto_Desc"]}" value="${value["Contacto_Email"]}" id="kt_modal_jefe_contact_${counterEmail}"/>
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
                    /*Toast.fire({
                        icon: icon1,
                        title:message1
                    }); 
                    */
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
    $(document).on("click", "#email_conact, #email_secador_conact", async function(event){
        $('#kt_modal_contacto_correo').modal("show");
        $("#scroll_correo_cnt").scrollTop(0);
    });
    $(document).on("click", ".modal_close_correo_contact", async function(event){
        $('#kt_modal_contacto_correo').modal("hide");
    });
    $(document).on("change", ".chk_input_email", async function(event){
        var val = $(this).val();
        if($(this).is(":checked")){
            $(this).parent().attr("data-tipo_chk_form", 'true');
            $(this).attr("data-tipo_chk_form", 'true');
        }else{
            $(this).parent().attr("data-tipo_chk_form", 'false');
            $(this).attr("data-tipo_chk_form", 'false');
        }
    });
    $(document).on("click", "#modal_select_jefe_contact", async function(event){
        var user_jefe_chk = $('input[name="user_jefe_chk"]:checked').attr("data-nombre");
        var user_data_id = $('input[name="user_jefe_chk"]:checked').attr("data-id");
        $("#id_nombre_jefe_encargado").val(user_jefe_chk);
        $("#id_secador_nombre_jefe_encargado").val(user_jefe_chk);
        $('#kt_modal_jefe_contacto').modal("hide");
        /*$("#kt_listar_correo_contacto .kt_list_cnt_email").each(function(i, val){
            var $tipo_chk_form = $(this).children(".each_chk").children().children("input").attr("data-tipo_chk_form");
            var $id = $(this).children(".each_chk").children().children("input").attr("id");
            var $this = $(this).children(".each_chk").children().children("input");
            if ($tipo_chk_form==="false"){
                $($this).prop("checked", false);
                if($this.is(":checked")){
                }
            }
        });*/
        $("#"+user_data_id).prop("checked", true);
        listarCorreoParaEnviar();
    });
    $(document).on("click", "#modal_select_correc_contact", async function(event){
        listarCorreoParaEnviar();
    });
    function listarCorreoParaEnviar(){
        $html_each_correo ='';
        var datoContact =[];
        $("#kt_listar_correo_contacto .kt_list_cnt_email").each(function(i, val){
            var $this = $(this).children(".each_chk").children().children("input");
            var $nombreContact= $(this).children().children(".text-nombre-contact").text();
            if ($this.val()!==""){
                if($this.is(":checked")){
                    $html_each_correo+= `<div data-email=${$this.val()} class="d-flex justify-content-between kt_uni_cnt_email">
                        <div class="fv-row mx-10">
                            <span class="fw-bold fs-4">${$this.val()}</span>
                            <div class="fw-bold text-gray-600 fs-4 ">${$nombreContact}</div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-2"></div>`;
                    datoContact.push($this.val());
                }
            }
        });
        $("#email_conact").val(datoContact.join('; '));
        $("#email_secador_conact").val(datoContact.join('; '));
        $("#kt_selected_email").html($html_each_correo);
        $("#kt_secador_selected_email").html($html_each_correo);
        $('#kt_modal_contacto_correo').modal("hide");
    }
    var contador_add_contact=0;
    $(document).on("click", "#id_save_add_email", async function(event){
        var add_email_contact = $("#add_email_contact").val();
        var add_name_contact = $("#add_name_contact").val();
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
        contador_add_contact++;
        $html_add_correo_cnt= `
            <div class="d-flex justify-content-start kt_list_cnt_email">
                <div class="fv-row mx-10 d-flex align-items-center">
                    <img width="40" src="${asset+'assets/media/logos/avatar.svg'}" alt="user" class="b-radius-50">
                </div>
                <div class="fv-row w-100">
                    <div class="fw-bold text-primary text-nombre-contact d-block w-100 fs-4">${add_name_contact}</div>
                    <span class="fw-bold fs-4 d-block w-100 fs-4 d-none">${add_email_contact}</span>
                    
                </div>
                <div class="fv-row mx-10 each_chk w-30-px d-flex align-items-center">
                    <div data-tipo_chk_form="false" class="form-check form-check-custom " style="float: right;">
                        <input data-tipo_chk_form="false" class="form-check-input me-3 chk_input_email" name="kt_modal_email_contact_00${contador_add_contact}" type="checkbox" value="${add_email_contact}" id="kt_modal_email_contact_00${contador_add_contact}"/>
                        <label class="form-check-label" for="kt_modal_email_contact_00${contador_add_contact}">
                            <div class="text-gray-600"></div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="separator separator-dashed my-2"></div>`;
        $html_lista_jefe_cnt=`
            <div class="d-flex justify-content-start kt_list_cnt_jefe_email">
                <div class="fv-row mx-10 d-flex align-items-center">
                    <img width="40" src="${asset+'assets/media/logos/avatar.svg'}" alt="user" class="b-radius-50">
                </div>
                <div class="fv-row w-100">
                    <div class="fw-bold text-primary text-nombre-contact d-block w-100 fs-4">${add_name_contact}</div>
                    <span class="fw-bold fs-4 d-block w-100 fs-4 d-none">${add_email_contact}</span>
                </div>
                <div class="fv-row mx-10 each_chk w-30-px d-flex align-items-center">
                    <div class="form-check form-check-custom" style="float: right;">
                        <input data-id="kt_modal_email_contact_00${contador_add_contact}" class="form-check-input me-3" name="user_jefe_chk"  type="radio" data-validaremail="true" data-nombre="${add_name_contact}" value="${add_email_contact}" id="kt_modal_jefe_contact_${contador_add_contact}"/>
                        <label class="form-check-label" for="kt_modal_jefe_contact_${contador_add_contact}">
                            <div class="text-gray-600"></div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="separator separator-dashed my-2"></div>`;
        $("#kt_listar_correo_contacto").prepend( $html_add_correo_cnt );
        $("#kt_listar_jefe_contact").prepend($html_lista_jefe_cnt );
        $("#add_email_contact").val('');
        $("#add_name_contact").val('');
    });
        
    var conountejefe=0;
    $(document).on("click", "#id_save_add_jefe_contact", async function(event){
        var add_jefe_contact = $("#add_jefe_contact").val();
        var add_email_jefe_contact = $("#add_email_jefe_contact").val();
        var countcorreojefecomparar =0;
        $("#kt_listar_jefe_contact .kt_list_cnt_jefe_email").each(function(i, val){
            var $correocontacto = $(this).children(".each_chk").children().children("input").val();
            var $nombreContact= $(this).children().children(".text-nombre-contact").text();
            if ($correocontacto!==""){
                if (add_email_jefe_contact===$correocontacto){
                    countcorreojefecomparar++;
                }
            }
        });
        if(countcorreojefecomparar>0){
            Toast.fire({
                icon: 'error',
                title:'Este correo ya existe en la lista de contactos.'
            });
            return;
        }
        if (add_jefe_contact===""){
            Toast.fire({
                icon: 'error',
                title:'Ingrese nombre y apellido'
            });
            return;
        }
        var EmailDataValid = "false";
        if (add_email_jefe_contact!==""){
            EmailDataValid = "true";
            var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
            if(!validEmail.test($('#add_email_jefe_contact').val() ) ){
                Toast.fire({
                    icon: 'error',
                    title:'Ingrese un correo válido'
                });
                return;
            }
        }
        conountejefe++;
        $html_add_correo_cnt= `
            <div class="d-flex justify-content-start kt_list_cnt_email">
                <div class="fv-row mx-10 d-flex align-items-center">
                    <img width="40" src="${asset+'assets/media/logos/avatar.svg'}" alt="user" class="b-radius-50">
                </div>
                <div class="fv-row w-100">
                    <div class="fw-bold text-primary text-nombre-contact d-block w-100 fs-4">${add_jefe_contact}</div>
                    <span class="fw-bold fs-4 d-block w-100 fs-4 d-none">${add_email_jefe_contact}</span>
                </div>
                <div class="fv-row mx-10 each_chk w-30-px d-flex align-items-center">
                    <div data-tipo_chk_form="false" class="form-check form-check-custom " style="float: right;">
                        <input data-tipo_chk_form="false" class="form-check-input me-3 chk_input_email" name="kt_modal_email_contact_000${conountejefe}" type="checkbox" value="${add_email_jefe_contact}" id="kt_modal_email_contact_00${conountejefe}"/>
                        <label class="form-check-label" for="kt_modal_email_contact_00${conountejefe}">
                            <div class="text-gray-600"></div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="separator separator-dashed my-2"></div>`;
        $html_lista_jefe_cnt=`
            <div class="d-flex justify-content-start kt_list_cnt_jefe_email">
                <div class="fv-row mx-10 d-flex align-items-center">
                    <img width="40" src="${asset+'assets/media/logos/avatar.svg'}" alt="user" class="b-radius-50">
                </div>
                <div class="fv-row w-100">
                    <div class="fw-bold text-primary text-nombre-contact d-block w-100 fs-4">${add_jefe_contact}</div>
                    <span class="fw-bold fs-4 d-block w-100 fs-4 d-none">${add_email_jefe_contact}</span>
                </div>
                <div class="fv-row mx-10 each_chk w-30-px d-flex align-items-center">
                    <div class="form-check form-check-custom" style="float: right;">
                        <input data-id="kt_modal_email_contact_00${conountejefe}" class="form-check-input me-3" name="user_jefe_chk" type="radio" data-validaremail="${EmailDataValid}"  data-nombre="${add_jefe_contact}"  value="${add_email_jefe_contact}" id="kt_modal_jefe_contact_${conountejefe}"/>
                        <label class="form-check-label" for="kt_modal_jefe_contact_${conountejefe}">
                            <div class="text-gray-600"></div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="separator separator-dashed my-2"></div>`;
        
        $("#kt_listar_correo_contacto").prepend( $html_add_correo_cnt );
        $("#kt_listar_jefe_contact").prepend($html_lista_jefe_cnt );
        $("#add_email_jefe_contact").val('');
        $("#add_jefe_contact").val('');
    }) 
    $(document).on("click", "#id_nombre_jefe_encargado, #id_secador_nombre_jefe_encargado", async function(event){
        $('#kt_modal_jefe_contacto').modal("show");
        $("#scroll_jefe_cnt").scrollTop(0);
    });
    $(document).on("click", ".modal_close_jefe_contact", async function(event){
        $('#kt_modal_jefe_contacto').modal("hide");
    }); 
    
    $(document).on("click", "#id_tecnologia_vsd", async function(event){
        if($(this).is(":checked")){
            $(".cls_tecnologia_vsd").show();
            fnVsTecnologia('SI')
        }else{
            $(".cls_tecnologia_vsd").hide();
            fnVsTecnologia('NO')
        }
    });  
    function fnVsTecnologia(opt){
        if (opt=="SI"){
            $("#id_required_regulaciones_presion_carga, #id_required_regulaciones_de_descarga").hide();
            $("#id_resumen_cab_regulaciones_presion_carga, #id_resumen_cab_regulaciones_de_descarga").hide();            
            $("#id_required_regulaciones_pto_de_ajuste").show();
            $("#id_resumen_cab_regulaciones_pto_de_ajuste").show();
            $("#id_resumen_cab_regulaciones_presion_carga, #id_resumen_cab_regulaciones_de_descarga").removeClass("d-flex");
            $("#id_resumen_cab_regulaciones_pto_de_ajuste").addClass('d-flex');
        }else{
            $("#id_required_regulaciones_presion_carga, #id_required_regulaciones_de_descarga").show();
            $("#id_resumen_cab_regulaciones_presion_carga, #id_resumen_cab_regulaciones_de_descarga").show();            
            $("#id_required_regulaciones_pto_de_ajuste").hide();
            $("#id_resumen_cab_regulaciones_pto_de_ajuste").hide();
            $("#id_resumen_cab_regulaciones_presion_carga, #id_resumen_cab_regulaciones_de_descarga").addClass("d-flex");
            $("#id_resumen_cab_regulaciones_pto_de_ajuste").removeClass("d-flex");
        }
    }
    $(document).on("click", "input[name='id_Tecnologis_vsd']", async function(event){
        var tipo_tec = $('input[name="id_Tecnologis_vsd"]:checked').val();
        if (tipo_tec=='H'){
            $(".tipo_tec_vsd").text("(H)")
            $(".cls_por").removeClass("input_Tecnologia_vsd");
        }else{
            $(".tipo_tec_vsd").text("(%)")
            $(".cls_por").addClass("input_Tecnologia_vsd");
        }
    });
    $(document).on("keyup", "#service_equipo_modelo", async function(event){
        var val = $(this).val();
        validateSecador(val);
    });
    function validateSecador($val){
        var upperval = $val==null?'':$val.toUpperCase();
        var valIndexOf = upperval.indexOf('FF');
        if (valIndexOf!==-1){
            $(".cls_secador").show();
            $("#id_secador_obl").val(1);
        }else{
            $(".cls_secador").hide();
            $("#id_secador_obl").val(0);
        }
    }
    
    async function listarTipoModulo(){
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('tipo_table', 'TIPO_MODULO');
        const response = await fetch(`${APP_URL}/reporte/listar-tipo-table`, {
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
                    $htmlSelect='';
                    $htmlSelect+='<option value="0">Seleccione Tipo de Módulo</option>';
                    $.each( datos, function( key, value ) {
                        $REPORTE_NUMERO = value["REPORTE_NUMERO"];
                        $htmlSelect+=`<option value="${value["MODULOTIPO_DESC"]}">${value["MODULOTIPO_DESC"]}</option>`;
                    });
                    $("#service_equipo_modelo_tipo").html($htmlSelect);
                }else{
                    Toast.fire({
                        icon: "error",
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
    
    async function listarTipoRefrigerante(){
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('tipo_table', 'TIPO_REFRIGERANTE');
        const response = await fetch(`${APP_URL}/reporte/listar-tipo-table`, {
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
                    $htmlSelect='';
                    $htmlSelect+='<option value="0">Seleccione Tipo de refrig.</option>';
                    $.each( datos, function( key, value ) {
                        $REPORTE_NUMERO = value["REPORTE_NUMERO"];
                        $htmlSelect+=`<option value="${value["TIPOREFRIGERANTE_DESC"]}">${value["TIPOREFRIGERANTE_DESC"]}</option>`;
                    });  
                    $("#service_secador_tipo_refrigeracion").html($htmlSelect);
                }else{
                    Toast.fire({
                        icon: "error",
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
    //await getUser();
    async function getUser(){
        const data = new FormData();
        const myHeaders = new Headers();
        //myHeaders.append("Accept", "application/json");
        //myHeaders.append("Content-Type", "application/json");
        data.append('_token', $("input[name='_token']").val());
        data.append('tipo_table', 'TIPO_REFRIGERANTE');
        const response = await fetch(`${APP_URL}/getUser`, {
            method: 'POST',
            
            body: data,
            
            //redirect: 'follow'
        }).then(async (response)=> {
            const rest = await response.json();
            const status1 = rest.status;   
            console.log(rest);
        }).catch((error) => {
            Toast.fire({
                icon: 'error',
                title:error
            });
        });
    }
    $(document).on("click", "#id_kit_valvulas", async function(event){
        if($(this).is(":checked")){
            $(".cls_kit_valvulas").show();
        }else{
            $(".cls_kit_valvulas").hide();
            $(".each_kit_valvulas").prop("checked", false);
        }
    });
    $(document).on("click", "#id_kit_filtro_linea", async function(event){
        if($(this).is(":checked")){
            $(".cls_kit_filtro_linea").show();
        }else{
            $(".cls_kit_filtro_linea").hide();
            $(".each_kit_filtro_linea").prop("checked", false);
        }
    });
    $(document).on("keyup", ".input_Tecnologia_vsd", async function(event){
        var sumPorcentaje =0;
        var val = $(this).val();
        $(".input_Tecnologia_vsd").each(function (i, a){
            var input = $(this).val();
            input = input===""?0:parseInt(input);
            sumPorcentaje+= parseInt(input); 
        });
        var falta =100 - sumPorcentaje;
        if (parseInt(falta)<0){
            $(this).val(0)
        }
    });
    async function actualizarProgramacionUser(opcion,programacionid,numot){
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('opcion', opcion);
        data.append('usuario_login', $("#programcion_id_correo").val());
        data.append('programacionid',programacionid);
        data.append('numot', numot);
        $("#programcion_id_temporal").val(programacionid);
        $("#programcion_id_numot_tmporal").val(numot);
        const response = await fetch(`${APP_URL}/reporte/actualizar-programacion-user`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            const rest = await response.json();
            /*const datos = rest.data;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            */
            const status = rest.status;   
            if (status){
                const status1 = rest.data.status;
                const icon1 = rest.data.icon;
                const message1 = rest.data.message;
                const data1 = rest.data.data;
                if (status1){
                    const datos = rest.data.data;
                }
            }             
        }).catch((error) => {
            console.log(error)
        });
    }
    
    $(document).on("click", "input[name='check_limpieza_enfriadores']", async function(event){
        var valor = $('input[name="check_limpieza_enfriadores"]:checked').val();
        if (valor=='SI'){
            $("#id_limpieza_enfriadores").prop("checked", true) 
        }else{
            $("#id_limpieza_enfriadores").prop("checked", false) 
        }
    });

    async function ActualizarReportePaso2(){
        $("#kt_form_input_page_2 .cls_empty").empty(); 
        const data = new FormData();
        /////*******ini
        const id_tecnico_02=$("#servicio_tenico2").val();
        const service_equipo_modelo_tipo=$("#service_equipo_modelo_tipo").val();
        const service_secador_tipo_refrigeracion=$("#service_secador_tipo_refrigeracion").val();
        const id_tecnico_01=$("#servicio_tenico1").val();
        const service_fecha=$("#service_fecha").val();
        const id_select_horometro=$("#id_select_horometro").val();
        data.append('_token', $("input[name='_token']").val());
        data.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));
        data.append("reporte_fecha_servicio",service_fecha=="0"?'':service_fecha);
        data.append("reporte_orden_trabajo",$("#service_ot").val());
        data.append("id_tecnico_01",id_tecnico_01=="0"?'':id_tecnico_01);
        data.append("nombre_tecnico_responsable_02",id_tecnico_02=="0"?'':$("#servicio_tenico2 option:selected").text());
        data.append("id_tecnico_02",id_tecnico_02=="0"?'':id_tecnico_02);
        data.append("id_obl",$("#id_obl").val());
        data.append("empresa_nombre", $("#service_razon_social").val());
        data.append("ruc",$("#service_ruc").val());
        data.append("empresa_direccion",$("#service_direccion").val());
        data.append("empresa_telefono",$("#service_tel_cliente").val());
        data.append("empresa_email",$("#service_email_cliente").val());
        data.append("equipo_id",$("#service_equipo_id").val()); 
        data.append("equipo_marca",$("#service_equipo_marca").val()); 
        data.append("equipo_referencia",$("#service_equipo_referencia").val()  );
        data.append("equipo_modelo", $("#service_equipo_modelo").val() );
        data.append("equipo_nro_serie", $("#service_equipo_serie").val() );
        data.append("equipo_modulo_tipo",service_equipo_modelo_tipo=="0"?'':service_equipo_modelo_tipo ); 
        data.append("equipo_presion", $("#service_equipo_presion").val() );
        data.append("equipo_caudal", $("#service_equipo_caudal").val() );
        data.append("equipo_rpm",$("#service_equipo_rpm").val() );
        data.append("horometro",id_select_horometro=="0"?'':id_select_horometro ); 
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
        data.append("secador_amperaje", $("#service_secador_amperaje").val());
        data.append("secador_proteccion",$("#service_secador_proteccion").val());
        data.append("secador_limpieza",$("#service_secador_limpieza").val());
        data.append("secador_tipo_refrigeracion",service_secador_tipo_refrigeracion=="0"?'':service_secador_tipo_refrigeracion);
        data.append("secador_nota",$("#service_secador_nota").val()); 
        data.append("vsd_00_20rpm", $("#vsd_00_20rpm").val());
        data.append("vsd_20_40rpm", $("#vsd_20_40rpm").val());
        data.append("vsd_40_60rpm", $("#vsd_40_60rpm").val());
        data.append("vsd_60_80rpm", $("#vsd_60_80rpm").val());
        data.append("vsd_80_100rpm", $("#vsd_80_100rpm").val());
        data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
        data.append("id_secador_obl", $("#id_secador_obl").val());
        data.append("horas_carga", $("#service_horas_carga").val());
        beforeSendBtnLoad(".btn-stepper-next");
        $(".btn-stepper-previous, #btnaGuardarSalir").prop("disabled", true);
        const response = await fetch(`${APP_URL}/reporte/actualizar-reporte-paso2`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            $(".btn-stepper-previous, #btnaGuardarSalir").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            beforeSendBtnLoad(".btn-stepper-next", false);
            if(type==="empty"){
                $txtEmpty = '';
                $.each( datos, function( key, value ) {
                    $txtEmpty = value;
                    if (key != undefined) {
                        $("#kt_form_input_page_2 input[name='"+key+"'], #kt_form_input_page_2 select[name='"+key+"'], #kt_form_input_page_2 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
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
                    /*Swal.fire({
                        icon: icon1,
                        title: message1,
                        showConfirmButton: true,
                        timer: 3000
                    });*/
                    countador_ = 3;
                    $('#page_2').removeClass('current');
                    $('#page_3').addClass('current');
                    $(".btn-stepper-next").show();
                    $(".btn-stepper-previous").show();
                    $('#page_content_2').removeClass('current');
                    $('#page_content_3').addClass('current');
                    $("#btnaGuardarSalir").show().attr("data-paso", "paso_3");
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

    async function ActualizarReportePaso3(){
        $("#kt_form_input_page_3 .cls_empty").empty(); 
        const data = new FormData();
        each_kit_push_valvulas =[];            
        $(".each_kit_valvulas").each(function(i, val){
            var valor = $(this).is(":checked");
            if ( $(this).is(":checked")){
                each_kit_push_valvulas.push({
                    valor:valor
                });
            }
        })
        $("#name_kit_valvulas").val('');
        if (each_kit_push_valvulas.length>0){
            $("#name_kit_valvulas").val(1);
        }
        each_kit_filtro_push_linea =[];
        $(".each_kit_filtro_linea").each(function(i, val){
            var valor1 = $(this).is(":checked");
            if ( $(this).is(":checked")){
                each_kit_filtro_push_linea.push({
                    valor:valor1
                });
            }  
        });
        $("#name_kit_filtro_linea").val('');
        if (each_kit_filtro_push_linea.length>0){
            $("#name_kit_filtro_linea").val(1);
        }
        data.append('_token', $("input[name='_token']").val());
        const id_tecnico_02=$("#servicio_tenico2").val();
        const verifi_tipo_aceite_usado=$("#verificacion_tipo_aceite_usado").val();
        const verifi_est_aceite=$("#verificacion_estado_aceite").val();
        const verifi_est_separado=$("#verificacion_estado_separador").val();
        const verifi_est_fajas_acopl=$("#verificacion_estado_fajas_acoplamiento").val();
        const verificacion_estado_filtro_de_aceite=$("#verificacion_estado_filtro_de_aceite").val();
        const verificacion_estado_filtro_de_aire=$("#verificacion_estado_filtro_de_aire").val();
        const vida_de_aceite=$("#vida_de_aceite").val();
        const vida_de_filtro_aceite=$("#vida_de_filtro_aceite").val();
        const vida_de_filtro_aire=$("#vida_de_filtro_aire").val();
        const vida_de_separador=$("#vida_de_separador").val();
        const verificacion_estado_de_limpieza=$("#verificacion_estado_de_limpieza").val();
        const vida_de_engrase_motor=$("#vida_de_engrase_motor").val();
        const engrase_de_motor=$("#engrase_de_motor").val();
        data.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));
        data.append("verificacion_tipo_aceite_usado",verifi_tipo_aceite_usado=="0"?'':verifi_tipo_aceite_usado);
        data.append("verificacion_estado_aceite",verifi_est_aceite=="0"?'':verifi_est_aceite); 
        data.append("verificacion_estado_separador",verifi_est_separado=="0"?'':verifi_est_separado); 
        data.append("verificacion_estado_fajas_acoplamiento",verifi_est_fajas_acopl=="0"?'':verifi_est_fajas_acopl);
        data.append("verificacion_estado_de_limpieza",verificacion_estado_de_limpieza=="0"?'':verificacion_estado_de_limpieza);
        data.append("limpieza_enfriadores", $("#id_limpieza_enfriadores").is(":checked")?'X':''); 
        data.append("engrase_de_motor", engrase_de_motor=="0"?'':engrase_de_motor); 
        data.append("verificacion_estado_filtro_de_aceite",verificacion_estado_filtro_de_aceite=="0"?'':verificacion_estado_filtro_de_aceite);
        data.append("verificacion_estado_filtro_de_aire",verificacion_estado_filtro_de_aire=="0"?'':verificacion_estado_filtro_de_aire);
        data.append("kitvalvulas_cambio", $("#id_kit_valvulas").is(":checked")?'X':''); 
        data.append("kitvalvulas_amision", $("#id_kitvalvulas_amision").is(":checked")?'X':''); 
        data.append("kitvalvulas_termostatica", $("#id_kitvalvulas_termostatica").is(":checked")?'X':''); 
        data.append("kitvalvulas_minimapresion", $("#id_kitvalvulas_minimapresion").is(":checked")?'X':''); 
        data.append("kitvalvulas_check", $("#id_kitvalvulas_check").is(":checked")?'X':''); 
        data.append("kitvalvulas_paradaaceite", $("#id_kitvalvulas_paradaaceite").is(":checked")?'X':''); 
        data.append("kitvalvulas_lineabarrido", $("#id_kitvalvulas_lineabarrido").is(":checked")?'X':''); 
        data.append("kitvalvulas_trampagua", $("#id_kitvalvulas_trampagua").is(":checked")?'X':''); 
        data.append("kitvalvulas_solenoide", $("#id_kitvalvulas_solenoide").is(":checked")?'X':'');
        data.append("kitvalvulas_ventilacion", $("#id_kitvalvulas_ventilacion").is(":checked")?'X':'');
        data.append("kitvalvulas_tresvias", $("#id_kitvalvulas_tresvias").is(":checked")?'X':'');
        data.append("kitvalvulas_regulacion_termostatica", $("#id_kitvalvulas_regulacion_termostatica").is(":checked")?'X':'');
        data.append("kitvalvulas_purgador_auto_ewd", $("#id_kitvalvulas_purgador_auto_ewd").is(":checked")?'X':'');
        data.append("kitfiltroslinea_cambio", $("#id_kit_filtro_linea").is(":checked")?'X':'');    
        data.append("kitfiltroslinea_dd", $("#id_kitfiltroslinea_dd").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_qd", $("#id_kitfiltroslinea_qd").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_ddp", $("#id_kitfiltroslinea_ddp").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_pd", $("#id_kitfiltroslinea_pd").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_qdt", $("#id_kitfiltroslinea_qdt").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_udplus", $("#id_kitfiltroslinea_udplus").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_pdp", $("#id_kitfiltroslinea_pdp").is(":checked")?'X':''); 
        data.append("name_kit_valvulas",$("#name_kit_valvulas").val() ); 
        data.append("name_kit_filtro_linea",$("#name_kit_filtro_linea").val());
        data.append("medicion_voltaje_ul1l2",$("#medicion_voltaje_ul1l2").val());
        data.append("medicion_voltaje_ul2l3",$("#medicion_voltaje_ul2l3").val());
        data.append("medicion_voltaje_ul1l3",$("#medicion_voltaje_ul1l3").val());
        data.append("medicion_amperaje_l1",$("#medicion_amperaje_l1").val());
        data.append("medicion_amperaje_l2",$("#medicion_amperaje_l2").val());
        data.append("medicion_amperaje_l3",$("#medicion_amperaje_l3").val());
        data.append("medicion_amperaje_f1",$("#medicion_amperaje_f1").val());
        data.append("medicion_amperaje_f2",$("#medicion_amperaje_f2").val());
        data.append("medicion_amperaje_f3",$("#medicion_amperaje_f3").val());
        data.append("medicion_ventilador_01_l1",$("#medicion_ventilador_01_l1").val()); 
        data.append("medicion_ventilador_01_l2",$("#medicion_ventilador_01_l2").val()); 
        data.append("medicion_ventilador_01_l3",$("#medicion_ventilador_01_l3").val()); 
        data.append("medicion_ventilador_02_l1",$("#medicion_ventilador_02_l1").val()); 
        data.append("medicion_ventilador_02_l2",$("#medicion_ventilador_02_l2").val()); 
        data.append("medicion_ventilador_02_l3",$("#medicion_ventilador_02_l3").val()); 
        data.append("thermomagnetico",$("#thermomagnetico").val());
        data.append("linea_a_tierra",$("#linea_a_tierra").val());
        data.append("voltaje_de_control",$("#voltaje_de_control").val());
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
        data.append("vida_de_engrase_motor",vida_de_engrase_motor=="0"?'':vida_de_engrase_motor);
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
        data.append("kitvalvulas_cambio", $("#id_kit_valvulas").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_cambio", $("#id_kit_filtro_linea").is(":checked")?'X':'');  
        data.append("name_kit_valvulas",$("#name_kit_valvulas").val() ); 
        data.append("name_kit_filtro_linea",$("#name_kit_filtro_linea").val()); 
        data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
        data.append("diferencial_presion_aire",$("#diferencial_presion_aire").val());
        data.append("diferencial_presion_separador",$("#diferencial_presion_separador").val());
        data.append("temperatura_ambiente",$("#temperatura_ambiente").val());
        beforeSendBtnLoad(".btn-stepper-next");
        $(".btn-stepper-previous, #btnaGuardarSalir").prop("disabled", true);
        const response = await fetch(`${APP_URL}/reporte/actualizar-reporte-paso3`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            $(".btn-stepper-previous, #btnaGuardarSalir").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            beforeSendBtnLoad(".btn-stepper-next", false);
            if(type==="empty"){
                $txtEmpty = '';
                $.each( datos, function( key, value ) {
                    $txtEmpty = value;
                    if (key != undefined) {
                        $("#kt_form_input_page_3 input[name='"+key+"'], #kt_form_input_page_3 select[name='"+key+"'], #kt_form_input_page_3 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
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
                    countador_ = 4;
                    $('#page_3').removeClass('current');
                    $('#page_4').addClass('current');
                    $(".btn-stepper-next").show();
                    $(".btn-stepper-previous").show();
                    $('#page_content_3').removeClass('current');
                    $('#page_content_4').addClass('current');
                    getArchivoFinalByNumeroReporte($("#idreportenumero").val(), '', $("#id_programacionid").val())
                    $("#btnaGuardarSalir").hide().attr("data-paso", "paso_4");
                    validar4FinalImages();
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

    async function guardarFotosFinalesPaso4(){
        //$("#kt_form_input_page_2 .cls_empty").empty();    
       
        const data = new FormData();
        /////*** */ 
        var pushFinalImages =[]
        var pushFinalNuevoImages =[]
        var cantidadInicialUpdFotos =0;
        $(".ki_images_final_select.cls_editar").each(function(i, val){
            var children = $(this).children();
            var dataEstado = children.attr("data-estado");
            var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
            var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
            var val_nombre_original =$(this).children(".cls_nombre_original").val();
            var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
            var val_id =$(this).children(".cls_id").val();
            var estatus_delete =$(this).attr("data-delete");
            var val_estado_ver_reporte =0;
            if (dataEstado=='active'){
                if (estatus_delete!=="true") {
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
            }
            var deletes = 1;
            if (estatus_delete==="true"){
                deletes = 0;
            }
            pushFinalImages.push({
                tipo_archivo: val_tipo_archivo,
                nombre_archivo : val_nombre_archivo, 
                nombre_original: val_nombre_original,
                ruta_relativa: val_ruta_relativa,
                estado_ver_reporte: val_estado_ver_reporte,
                estado: deletes,
                programacionid:$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"),
                id: val_id
            });
        });
        $(".ki_images_final_select.cls_nuevo").each(function(i, val){
            var children = $(this).children();
            var dataEstado = children.attr("data-estado");
            var val_tipo_archivo =$(this).children(".cls_tipo_archivo").val();
            var val_nombre_archivo =$(this).children(".cls_nombre_archivo").val();
            var val_nombre_original =$(this).children(".cls_nombre_original").val();
            var val_ruta_relativa =$(this).children(".cls_ruta_relativa").val();
            var val_id =$(this).children(".cls_id").val();
            var estatus_delete =$(this).attr("data-delete");
            var val_estado_ver_reporte =0;
            if (dataEstado=='active'){
                if (estatus_delete!=="true") {
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
            }
            pushFinalNuevoImages.push({
                tipo_archivo: val_tipo_archivo,
                nombre_archivo : val_nombre_archivo, 
                nombre_original: val_nombre_original,
                ruta_relativa: val_ruta_relativa,
                estado_ver_reporte: val_estado_ver_reporte,
                programacionid:$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"),
                id: val_id
            });
        });
        if (cantidadInicialUpdFotos<4){
            Toast.fire({
                icon: 'warning',
                title: "Campo vacio: seleccione 4 fotos finales como mínimo para actualizar." 
            }); 
            beforeSendBtnLoad(".btn-stepper-next", false);
            return;
        }
        countador_ = 5;
        $('#page_4').removeClass('current');
        $('#page_5').addClass('current');
        $(".btn-stepper-next").show();
        $(".btn-stepper-previous").show();
        $('#page_content_4').removeClass('current');
        $('#page_content_5').addClass('current');
        getArchivoFinalByNumeroReporte($(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"), '', $("#id_programacionid").val())
        $("#btnaGuardarSalir").show().attr("data-paso", "paso_5");
        return;
        beforeSendBtnLoad(".btn-stepper-next");
        const servicio_tenico1=$("#servicio_tenico1").val();
        data.append('_token', $("input[name='_token']").val());
        data.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));
        data.append("id_tecnico_01",servicio_tenico1=="0"?'':servicio_tenico1);        
        data.append("imagesNuevoDatos",JSON.stringify(pushFinalNuevoImages));
        data.append("pushFinalImages",JSON.stringify(pushFinalImages));
        $(".btn-stepper-previous").prop("disabled", true);
        const response = await fetch(`${APP_URL}/reporte/guardar-fotos-finales-paso4`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            $(".btn-stepper-previous").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            beforeSendBtnLoad(".btn-stepper-next", false);
            if(type==="empty"){
                $txtEmpty = '';
                $.each( datos, function( key, value ) {
                    $txtEmpty = value;
                    if (key != undefined) {
                        
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
                    countador_ = 5;
                    $('#page_4').removeClass('current');
                    $('#page_5').addClass('current');
                    $(".btn-stepper-next").show();
                    $(".btn-stepper-previous").show();
                    $('#page_content_4').removeClass('current');
                    $('#page_content_5').addClass('current');
                    getArchivoFinalByNumeroReporte($(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"), '', $("#id_programacionid").val())
                    $("#btnaGuardarSalir").show().attr("data-paso", "paso_5");
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
    async function actualizarReportePaso5(){
        $("#kt_form_input_page_5 .cls_empty").empty(); 
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));       
        data.append("descripcion_del_trabajo",$("#descripcion_del_trabajo").val());       
        data.append("recomendaciones",$("#recomendaciones").val());
        data.append("observaciones_internas",$("#observaciones_internas").val());
        beforeSendBtnLoad(".btn-stepper-next");
        $(".btn-stepper-previous, #btnaGuardarSalir").prop("disabled", true);
        const response = await fetch(`${APP_URL}/reporte/guardar-fotos-finales-paso5`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            $(".btn-stepper-previous, #btnaGuardarSalir").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const datos1 = rest.datos;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            beforeSendBtnLoad(".btn-stepper-next", false);
            if(type==="empty"){
                $txtEmpty = '';
                $.each( datos, function( key, value ) {
                    $txtEmpty = value;
                    if (key != undefined) {
                        $("#kt_form_input_page_5 input[name='"+key+"'], #kt_form_input_page_5 select[name='"+key+"'], #kt_form_input_page_5 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
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
                    countador_ = 6;
                    $('#page_5').removeClass('current');
                    $('#page_6').addClass('current');
                    $(".btn-stepper-next").hide();
                    $(".btn-stepper-previous").show();
                    $('#page_content_5').removeClass('current');
                    $('#page_content_6').addClass('current');
                    $("#btnactualizarFinal").show().prop("disabled", false);
                    $("#id_resumen_descripcion_del_trabajo").html(datos1.descripcion_del_trabajo); 
                    $("#id_resumen_recomendaciones").html(datos1.recomendaciones); 
                    $("#id_resumen_observaciones_internas").html(datos1.observaciones_internas); 
                    $("#btnaGuardarSalir").hide().attr("data-paso", "paso_6");
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
    $(document).on("change", "#id_select_horometro", function(){
        var opt= $("#id_select_horometro option:selected").data("opt");
        $("#service_equipo_horometro").prop("disabled", true);
        var val =$(this).val();
        if (opt==1){
            $("#kt_modal_see_horometro").modal("show");
            var h =$("#id_input_horometro").val()
            $("#service_equipo_horometro").val(h);
            $("#service_equipo_horometro").prop("disabled", false);
            $("#id_input_horometro").val(val=="0"?'':val);
        }else{
            if($(this).val()==0){
                $("#service_equipo_horometro").val('');
            }else{
                $("#service_equipo_horometro").val($(this).val());
            }
        }
    })
    $(document).on("click", ".cls_modal_horometros", function(){
        $("#kt_modal_see_horometro").modal("hide");
    })
    $(document).on("click", "#kt_add_horometro", function(){
        var h =$("#id_input_horometro").val()
        if (parseInt(h)>0){
            $("#kt_modal_see_horometro").modal("hide");
            $("#service_equipo_horometro").val(h);
            $('#id_select_horometro option').eq(1).val(h).text(h);
            $('#id_select_horometro').val(h).trigger('change.select2');
        }else{
            Toast.fire({
                icon: 'warning',
                title: 'Ingrese un valor de horómetro.'
            });
        }
    })  
    $(document).on("click", "#btnaGuardarSalir", function(){
        var btn = $(this).attr("data-paso");
        if (btn==="paso_1"){
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
                    GuardarReporte();
                }
            }));
        }else if (btn==="paso_2"){
            guardarSaliRegresarReportePaso2('guardar_salir');
        }else if (btn==="paso_3"){
            guardarSaliRegresarReportePaso3("guardar_salir")
        }else if (btn==="paso_5"){
            guardarSaliRegresarReportePaso5("guardar_salir")
        }
    });
    async function guardarSaliRegresarReportePaso2(opcion){
        $("#kt_form_input_page_2 .cls_empty").empty(); 
        beforeSendBtnLoad("#btnaGuardarSalir");
        beforeSendBtnLoad(".btn-stepper-previous");
        const data = new FormData();
        /////*******ini
        const id_tecnico_02=$("#servicio_tenico2").val();
        const service_equipo_modelo_tipo=$("#service_equipo_modelo_tipo").val();
        const service_secador_tipo_refrigeracion=$("#service_secador_tipo_refrigeracion").val();
        const id_tecnico_01=$("#servicio_tenico1").val();   
        const service_fecha=$("#service_fecha").val();     
        const id_select_horometro=$("#id_select_horometro").val();
        const select_sr_tipo_servicio= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo_servicio').children('p').text();
        data.append('_token', $("input[name='_token']").val());
        data.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));
        data.append("reporte_fecha_servicio",service_fecha=="0"?'':service_fecha);
        data.append("reporte_orden_trabajo",$("#service_ot").val());
        data.append("id_tecnico_01",id_tecnico_01=="0"?'':id_tecnico_01);
        data.append("nombre_tecnico_responsable_02",id_tecnico_02=="0"?'':$("#servicio_tenico2 option:selected").text());
        data.append("id_tecnico_02",id_tecnico_02=="0"?'':id_tecnico_02);
        data.append("id_obl",$("#id_obl").val());
        data.append("empresa_nombre", $("#service_razon_social").val());
        data.append("ruc",$("#service_ruc").val());
        data.append("empresa_direccion",$("#service_direccion").val());
        data.append("empresa_telefono",$("#service_tel_cliente").val());
        data.append("empresa_email",$("#service_email_cliente").val());
        data.append("equipo_id",$("#service_equipo_id").val()); 
        data.append("equipo_marca",$("#service_equipo_marca").val()); 
        data.append("equipo_referencia",$("#service_equipo_referencia").val()  );
        data.append("equipo_modelo", $("#service_equipo_modelo").val() );
        data.append("equipo_nro_serie", $("#service_equipo_serie").val() );
        data.append("equipo_modulo_tipo",service_equipo_modelo_tipo=="0"?'':service_equipo_modelo_tipo ); 
        data.append("equipo_presion", $("#service_equipo_presion").val() );
        data.append("equipo_caudal", $("#service_equipo_caudal").val() );
        data.append("equipo_rpm",$("#service_equipo_rpm").val() );
        data.append("horometro",id_select_horometro=="0"?'':id_select_horometro ); 
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
        data.append("secador_amperaje", $("#service_secador_amperaje").val());
        data.append("secador_proteccion",$("#service_secador_proteccion").val());
        data.append("secador_limpieza",$("#service_secador_limpieza").val());
        data.append("secador_tipo_refrigeracion",service_secador_tipo_refrigeracion=="0"?'':service_secador_tipo_refrigeracion);
        data.append("secador_nota",$("#service_secador_nota").val()); 
        data.append("vsd_00_20rpm", $("#vsd_00_20rpm").val());
        data.append("vsd_20_40rpm", $("#vsd_20_40rpm").val());
        data.append("vsd_40_60rpm", $("#vsd_40_60rpm").val());
        data.append("vsd_60_80rpm", $("#vsd_60_80rpm").val());
        data.append("vsd_80_100rpm", $("#vsd_80_100rpm").val());
        data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
        data.append("id_secador_obl", $("#id_secador_obl").val());
        data.append("horas_carga", $("#service_horas_carga").val());
        $(".btn-stepper-previous, .btn-stepper-next").prop("disabled", true);
        const response = await fetch(`${APP_URL}/reporte/guardar-sali-regresar-reporte-paso2`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            $(".btn-stepper-previous, .btn-stepper-next").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            beforeSendBtnLoad("#btnaGuardarSalir", false);
            beforeSendBtnLoad(".btn-stepper-previous", false);
            if (status){
                const status1 = rest.data.status;
                const icon1 = rest.data.icon;
                const message1 = rest.data.message;
                const data1 = rest.data.data;
                if (status1){
                    if (opcion==="guardar_salir"){
                        $("#btnaGuardarSalir").hide().attr("data-paso", "0");
                        emptyForm()    
                        await getOT();
                    }else{
                        /*var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado");
                        countador_ = 1;
                        $('#page_1').addClass('current')
                        $('#page_2').removeClass('current')
                        $(".btn-stepper-previous").show();
                        $(".btn-stepper-next").show();
                        $('#page_content_1').addClass('current');
                        $('#page_content_2').removeClass('current');
                        $("#btnSaveData").show();
                        if(btnNext=="NUEVO"){
                            $(".btn-stepper-next").prop("disabled", true);
                        }
                        $("#btnaGuardarSalir").show().attr("data-paso", "paso_1");
                        */
                        validarFotorInicialXTipoServ(select_sr_tipo_servicio, 'previous' );
                    }
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
    async function guardarSaliRegresarReportePaso3(opcion){
        $("#kt_form_input_page_3 .cls_empty").empty(); 
        beforeSendBtnLoad("#btnaGuardarSalir");
        const data = new FormData();
        each_kit_push_valvulas =[];            
        $(".each_kit_valvulas").each(function(i, val){
            var valor = $(this).is(":checked");
            if ( $(this).is(":checked")){
                each_kit_push_valvulas.push({
                    valor:valor
                });
            }
        })
        $("#name_kit_valvulas").val('');
        if (each_kit_push_valvulas.length>0){
            $("#name_kit_valvulas").val(1);
        }
        each_kit_filtro_push_linea =[];
        $(".each_kit_filtro_linea").each(function(i, val){
            var valor1 = $(this).is(":checked");
            if ( $(this).is(":checked")){
                each_kit_filtro_push_linea.push({
                    valor:valor1
                });
            }  
        });
        $("#name_kit_filtro_linea").val('');
        if (each_kit_filtro_push_linea.length>0){
            $("#name_kit_filtro_linea").val(1);
        }
        data.append('_token', $("input[name='_token']").val());
        const id_tecnico_02=$("#servicio_tenico2").val();
        const verifi_tipo_aceite_usado=$("#verificacion_tipo_aceite_usado").val();
        const verifi_est_aceite=$("#verificacion_estado_aceite").val();
        const verifi_est_separado=$("#verificacion_estado_separador").val();
        const verifi_est_fajas_acopl=$("#verificacion_estado_fajas_acoplamiento").val();
        const verificacion_estado_filtro_de_aceite=$("#verificacion_estado_filtro_de_aceite").val();
        const verificacion_estado_filtro_de_aire=$("#verificacion_estado_filtro_de_aire").val();
        const vida_de_aceite=$("#vida_de_aceite").val();
        const vida_de_filtro_aceite=$("#vida_de_filtro_aceite").val();
        const vida_de_filtro_aire=$("#vida_de_filtro_aire").val();
        const vida_de_separador=$("#vida_de_separador").val();
        const verificacion_estado_de_limpieza=$("#verificacion_estado_de_limpieza").val();
        const vida_de_engrase_motor=$("#vida_de_engrase_motor").val();
        const engrase_de_motor=$("#engrase_de_motor").val();
        data.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));
        data.append("verificacion_tipo_aceite_usado",verifi_tipo_aceite_usado=="0"?'':verifi_tipo_aceite_usado);
        data.append("verificacion_estado_aceite",verifi_est_aceite=="0"?'':verifi_est_aceite); 
        data.append("verificacion_estado_separador",verifi_est_separado=="0"?'':verifi_est_separado); 
        data.append("verificacion_estado_fajas_acoplamiento",verifi_est_fajas_acopl=="0"?'':verifi_est_fajas_acopl);
        data.append("verificacion_estado_de_limpieza",verificacion_estado_de_limpieza=="0"?'':verificacion_estado_de_limpieza);
        data.append("limpieza_enfriadores", $("#id_limpieza_enfriadores").is(":checked")?'X':''); 
        data.append("engrase_de_motor", engrase_de_motor=="0"?'':engrase_de_motor); 
        data.append("verificacion_estado_filtro_de_aceite",verificacion_estado_filtro_de_aceite=="0"?'':verificacion_estado_filtro_de_aceite);
        data.append("verificacion_estado_filtro_de_aire",verificacion_estado_filtro_de_aire=="0"?'':verificacion_estado_filtro_de_aire);
        data.append("kitvalvulas_cambio", $("#id_kit_valvulas").is(":checked")?'X':''); 
        data.append("kitvalvulas_amision", $("#id_kitvalvulas_amision").is(":checked")?'X':''); 
        data.append("kitvalvulas_termostatica", $("#id_kitvalvulas_termostatica").is(":checked")?'X':''); 
        data.append("kitvalvulas_minimapresion", $("#id_kitvalvulas_minimapresion").is(":checked")?'X':''); 
        data.append("kitvalvulas_check", $("#id_kitvalvulas_check").is(":checked")?'X':''); 
        data.append("kitvalvulas_paradaaceite", $("#id_kitvalvulas_paradaaceite").is(":checked")?'X':''); 
        data.append("kitvalvulas_lineabarrido", $("#id_kitvalvulas_lineabarrido").is(":checked")?'X':''); 
        data.append("kitvalvulas_trampagua", $("#id_kitvalvulas_trampagua").is(":checked")?'X':''); 
        data.append("kitvalvulas_solenoide", $("#id_kitvalvulas_solenoide").is(":checked")?'X':'');
        data.append("kitvalvulas_ventilacion", $("#id_kitvalvulas_ventilacion").is(":checked")?'X':'');
        data.append("kitvalvulas_tresvias", $("#id_kitvalvulas_tresvias").is(":checked")?'X':'');
        data.append("kitvalvulas_regulacion_termostatica", $("#id_kitvalvulas_regulacion_termostatica").is(":checked")?'X':'');
        data.append("kitvalvulas_purgador_auto_ewd", $("#id_kitvalvulas_purgador_auto_ewd").is(":checked")?'X':'');
        data.append("kitfiltroslinea_cambio", $("#id_kit_filtro_linea").is(":checked")?'X':'');    
        data.append("kitfiltroslinea_dd", $("#id_kitfiltroslinea_dd").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_qd", $("#id_kitfiltroslinea_qd").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_ddp", $("#id_kitfiltroslinea_ddp").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_pd", $("#id_kitfiltroslinea_pd").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_qdt", $("#id_kitfiltroslinea_qdt").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_udplus", $("#id_kitfiltroslinea_udplus").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_pdp", $("#id_kitfiltroslinea_pdp").is(":checked")?'X':''); 
        data.append("name_kit_valvulas",$("#name_kit_valvulas").val() ); 
        data.append("name_kit_filtro_linea",$("#name_kit_filtro_linea").val());     
        data.append("medicion_voltaje_ul1l2",$("#medicion_voltaje_ul1l2").val());
        data.append("medicion_voltaje_ul2l3",$("#medicion_voltaje_ul2l3").val());
        data.append("medicion_voltaje_ul1l3",$("#medicion_voltaje_ul1l3").val());
        data.append("medicion_amperaje_l1",$("#medicion_amperaje_l1").val());
        data.append("medicion_amperaje_l2",$("#medicion_amperaje_l2").val());
        data.append("medicion_amperaje_l3",$("#medicion_amperaje_l3").val());
        data.append("medicion_amperaje_f1",$("#medicion_amperaje_f1").val());
        data.append("medicion_amperaje_f2",$("#medicion_amperaje_f2").val());
        data.append("medicion_amperaje_f3",$("#medicion_amperaje_f3").val());
        data.append("medicion_ventilador_01_l1",$("#medicion_ventilador_01_l1").val()); 
        data.append("medicion_ventilador_01_l2",$("#medicion_ventilador_01_l2").val()); 
        data.append("medicion_ventilador_01_l3",$("#medicion_ventilador_01_l3").val()); 
        data.append("medicion_ventilador_02_l1",$("#medicion_ventilador_02_l1").val()); 
        data.append("medicion_ventilador_02_l2",$("#medicion_ventilador_02_l2").val()); 
        data.append("medicion_ventilador_02_l3",$("#medicion_ventilador_02_l3").val()); 
        data.append("thermomagnetico",$("#thermomagnetico").val());
        data.append("linea_a_tierra",$("#linea_a_tierra").val());
        data.append("voltaje_de_control",$("#voltaje_de_control").val());
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
        data.append("vida_de_engrase_motor",vida_de_engrase_motor=="0"?'':vida_de_engrase_motor);
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
        data.append("kitvalvulas_cambio", $("#id_kit_valvulas").is(":checked")?'X':''); 
        data.append("kitfiltroslinea_cambio", $("#id_kit_filtro_linea").is(":checked")?'X':'');  
        data.append("name_kit_valvulas",$("#name_kit_valvulas").val() ); 
        data.append("name_kit_filtro_linea",$("#name_kit_filtro_linea").val()); 
        data.append("vsd_medida_rpm",$("#id_tecnologia_vsd").is(":checked")?$('input[name="id_Tecnologis_vsd"]:checked').val():'');
        data.append("diferencial_presion_aire",$("#diferencial_presion_aire").val());
        data.append("diferencial_presion_separador",$("#diferencial_presion_separador").val());
        data.append("temperatura_ambiente",$("#temperatura_ambiente").val());
        $(".btn-stepper-previous, .btn-stepper-next").prop("disabled", true);
        const response = await fetch(`${APP_URL}/reporte/guardar-sali-regresar-reporte-paso3`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            $(".btn-stepper-previous, .btn-stepper-next").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            beforeSendBtnLoad("#btnaGuardarSalir", false);
            if (status){
                const status1 = rest.data.status;
                const icon1 = rest.data.icon;
                const message1 = rest.data.message;
                const data1 = rest.data.data;
                if (status1){
                    if (opcion==="guardar_salir"){
                        $("#btnaGuardarSalir").hide().attr("data-paso", "0");
                        emptyForm()
                        await getOT();
                    }else{
                        countador_ = 2;
                        $('#page_2').addClass('current')
                        $('#page_3').removeClass('current')
                        $(".btn-stepper-previous").show();
                        $(".btn-stepper-next").show();
                        $('#page_content_2').addClass('current');
                        $('#page_content_3').removeClass('current');
                        $("#btnaGuardarSalir").show().attr("data-paso", "paso_2");
                    }
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
    async function guardarSaliRegresarReportePaso5(opcion){
        $("#kt_form_input_page_5 .cls_empty").empty(); 
        beforeSendBtnLoad("#btnaGuardarSalir");
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));       
        data.append("descripcion_del_trabajo",$("#descripcion_del_trabajo").val());       
        data.append("recomendaciones",$("#recomendaciones").val());
        data.append("observaciones_internas",$("#observaciones_internas").val());
        $(".btn-stepper-previous, .btn-stepper-next").prop("disabled", true);
        const response = await fetch(`${APP_URL}/reporte/guardar-fotos-finales-paso5`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            $(".btn-stepper-previous, .btn-stepper-next").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const datos1 = rest.datos;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            beforeSendBtnLoad("#btnaGuardarSalir", false);
            if (status){
                const status1 = rest.data.status;
                const icon1 = rest.data.icon;
                const message1 = rest.data.message;
                const data1 = rest.data.data;
                if (status1){
                    if (opcion==="guardar_salir"){
                        $("#btnaGuardarSalir").hide().attr("data-paso", "0");
                        emptyForm()
                        await getOT();
                    }else{
                        countador_ = 4;
                        $('#page_4').addClass('current')
                        $('#page_5').removeClass('current')
                        $(".btn-stepper-previous").show();
                        $(".btn-stepper-next").show();
                        $('#page_content_4').addClass('current');
                        $('#page_content_5').removeClass('current');
                        validar4FinalImages()
                        $("#btnaGuardarSalir").hide().attr("data-paso", "paso_4");
                    }   
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
    /**********************************SECADOR****************************************** */
    /*********************************************************************************** */
    $(document).on("click", ".btn-secador-stepper-next", function(event){
        window.scrollTo(0, 0);
        validar4SecadorImages();
        resumenSecadorRporte();
        $("#btnsecadorSaveData").hide();
        $("#btnsecadoractualizarFinal").hide().prop("disabled", true);
        $("#btnsecadoraGuardarSalir").hide();
        var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado");
        if (countador_secador == 0) {
            countador_secador = 1;
            $('#page_secador_0').removeClass('current');
            $('#page_secador_1').addClass('current');
            $(".btn-secador-stepper-previous").show();
            $('#page_secador_content_0').removeClass('current');
            $('#page_secador_content_1').addClass('current');
            $("#kt_seguimiento_menu, .cls_step_2").show();
            $(".cls_step_ot").hide();
            $("#btnsecadoraGuardarSalir").hide().attr("data-paso", "paso_1");
        } else if (countador_secador == 1) {
            $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_1");
            guardarFotosSecadorPaso1()
        }else if (countador_secador == 2) {
            $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_2");
            ActualizarSecadorReportePaso2()
        }else if (countador_secador == 3) {
            $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_3");;
            guardarFotosSecadorFinalesPaso3()
        }else if (countador_secador == 4) {
            countador_secador = 0;
            $('#page_secador_4').removeClass('current')
            $('#page_secador_0').addClass('current')
            $(".btn-secador-stepper-next").show();
            $(".btn-secador-stepper-previous").hide();
            $('#page_secador_content_4').removeClass('current');
            $('#page_secador_content_0').addClass('current');
            $("#btnsecadoraGuardarSalir").hide().attr("data-paso", 0)
        } 
        console.log("countador_secador "+countador_secador)
    });
    
    $(document).on("click", ".btn-secador-stepper-previous", function(event){
        window.scrollTo(0, 0);
        resumenSecadorRporte();
        validar4SecadorImages();
        $("#btnsecadorSaveData").hide();
        $("#btnsecadoractualizarFinal").hide().prop("disabled", true);
        $("#btnsecadoraGuardarSalir").hide();
        var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado");
        if (countador_secador == 1) {
            Swal.fire({
                buttonsStyling:!1,
                showDenyButton: true,
                text: "¿Estas seguro que desea regresar?",
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
                    GuardarSecadorReportePaso1("previous");
                }
            }));
        } else if (countador_secador == 2) { 
            /*countador_secador = 1;
            $('#page_secador_2').removeClass('current');
            $('#page_secador_1').addClass('current');
            $(".btn-secador-stepper-next").show();
            $(".btn-secador-stepper-previous").show();
            $('#page_secador_content_2').removeClass('current');
            $('#page_secador_content_1').addClass('current');
            $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_1");         
            */
            guardarSecadorSaliRegresarReportePaso2("previous");

        }else if (countador_secador == 3) {
            guardarSecadorSaliRegresarReportePaso3("previous")
        }else if (countador_secador == 4) {
            countador_secador = 3;
            $('#page_secador_3').addClass('current')
            $('#page_secador_4').removeClass('current')
            $(".btn-secador-stepper-previous").show();
            $(".btn-secador-stepper-next").show();
            $('#page_secador_content_3').addClass('current');
            $('#page_secador_content_4').removeClass('current');
            $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_3");
        }else if (countador_secador == 5) {
            //guardarSaliRegresarReportePaso5("previous")
            countador_secador = 1;
            $('#page_secador_2').removeClass('current');
            $('#page_secador_1').addClass('current');
            $(".btn-secador-stepper-next").show();
            $(".btn-secador-stepper-previous").show();
            $('#page_secador_content_2').removeClass('current');
            $('#page_secador_content_1').addClass('current');
            $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_1"); 
        }
        console.log("countador_secador "+countador_secador)
    });

    async function getServioByProgramacionSecadores(programacionid, $this){
        spinnerOt($this);
        
        $("#kt_seguimiento_menu li a").text('');
        const select_sr_tipo_servicio= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo_servicio').children('p').text();
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('programacionid', programacionid);
        const response = await fetch(`${APP_URL}/servicio/servicio-by-programacion-id-secadores`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            spinnerOt($this, false);
            const rest = await response.json();
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
                const REFERENCIA = rest.data.data.REFERENCIA;
                const TIPO_SERVICIO_COTIZACION = rest.data.data.TIPO_SERVICIO_COTIZACION;
                const LOCAL_NOMBRE = rest.data.data.LOCAL_NOMBRE;
                console.log(RUC)
                $("#secador_NumOT").val(NUMOT);
                $("#secador_empresa_nombre").val(RAZON_SOCIAL);
                $("#secador_ruc").val(RUC);
                $("#secador_empresa_direccion").val(DIRECCION_CLIENTE);
                $("#secador_TipoServicio").val(TIPO_SERVICIO);
                $("#secador_equipo_referencia").val(REFERENCIA);
                $("#secador_Modelo").val(MODELO);
                $("#secador_Serie").val(SERIE);
                $("#secador_local_nombre").val(LOCAL_NOMBRE);    
                $("#secador_Equipo_Id").val(EQUIPO_ID);
                $("#secador_Equipo").val(EQUIPO);
                $("#secador_tipo_servicio_cotizacion").val(TIPO_SERVICIO_COTIZACION);
                $("#service_secador_local_nombre").val(LOCAL_NOMBRE);
                $("#cliente-seguimiento").text(RAZON_SOCIAL );
                $("#tipo_ser_cotizaciono").text(TIPO_SERVICIO_COTIZACION );
                $("#ot-seguimiento").text(NUMOT);
                $("#modelo-seguimiento").text(MODELO);
                $("#serie-seguimiento").text(SERIE);
                $("#referencia-seguimiento").text(REFERENCIA);
                $("#service_secador_show_fecha1, #service_secador_show_fecha2").val(rest.data.data.FechServicio);
                $("#service_secador_fecha").val(rest.data.data.FechServicio_valor).trigger('change.select2');
                $("#secador_id_tecnico_02").val(rest.data.data.Tecnico2_DNI).trigger('change.select2');
                $("#id_secador_last_horometro").text("Obs. Último horómetro  "+rest.data.data.LAST_HOROMETRO);
                $("#secador_Horometro").val(rest.data.data.Horometro);
                $("#secador_PresMax").val(rest.data.data.PresMax);
                $("#secador_Placa").val(rest.data.data.Placa);
                $("#secador_TipoControl").val(rest.data.data.TipoControl);
                $("#secador_VoltControl").val(rest.data.data.VoltControl);

                /*
                countador_secador = 1;
                $('#page_secador_0').removeClass('current');
                $('#page_secador_1').addClass('current');
                $(".btn-secador-stepper-previous").show();
                $(".btn-secador-stepper-next").show();
                $('#page_secador_content_0').removeClass('current');
                $('#page_secador_content_1').addClass('current');
                $("#kt_modal_create_compresor").hide();
                $("#kt_modal_create_secador").show();
                $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_1");
                */
                
                validarSecadorFotorInicialXTipoServ(select_sr_tipo_servicio, 'next');

                $("#kt_seguimiento_menu, .cls_step_2").show();
                $(".cls_step_ot").hide();
                var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado");
                $("#btnsecadorSaveData").show();
                if(btnNext=="NUEVO"){
                    $(".btn-secador-stepper-next").prop("disabled", true);
                    $(".btn-secador-stepper-next").hide();
                }else{
                    $(".btn-secador-stepper-next").prop("disabled", false);
                    $(".btn-secador-stepper-next").show();
                }                
                $("#kt_seguimiento_menu, .cls_step_2").show();
                $(".cls_step_ot").hide();
                validar4SecadorImages();

                rest.data.data.MC_CHEQ_PRESION_SUCCION_DESCARGA==1? $("#secador_mc_cheq_presion_succion_descarga").prop("checked", true): $("#secador_mc_cheq_presion_succion_descarga").prop("checked", false);
                rest.data.data.MC_CHEQ_TERMINAL_ELECTRICO==1? $("#secador_mc_cheq_terminal_electrico").prop("checked", true): $("#secador_mc_cheq_terminal_electrico").prop("checked", false);
                rest.data.data.MC_CHEQ_VALVULAS_SERVICIO==1? $("#secador_mc_cheq_valvulas_servicio").prop("checked", true): $("#secador_mc_cheq_valvulas_servicio").prop("checked", false);
                rest.data.data.MC_CHEQ_POSIBLES_FUGAS_GAS_REFRIG==1? $("#secador_mc_cheq_posibles_fugas_gas_refrig").prop("checked", true): $("#secador_mc_cheq_posibles_fugas_gas_refrig").prop("checked", false);
                rest.data.data.MC_CHEQ_COJINETES_AMORT_PERNO_ARAND==1? $("#secador_mc_cheq_cojinetes_amort_perno_arand").prop("checked", true): $("#secador_mc_cheq_cojinetes_amort_perno_arand").prop("checked", false);
                rest.data.data.UC_LIMPIEZA_SERPENTIN_CONDENSACION==1? $("#secador_uc_limpieza_serpentin_condensacion").prop("checked", true): $("#secador_uc_limpieza_serpentin_condensacion").prop("checked", false);
                rest.data.data.UC_VERIF_MOTOR_VENTIL_RODAM_EMPEL==1? $("#secador_uc_verif_motor_ventil_rodam_empel").prop("checked", true): $("#secador_uc_verif_motor_ventil_rodam_empel").prop("checked", false);
                rest.data.data.UC_VERIF_CONTROL_PRESION_ALTA==1? $("#secador_uc_verif_control_presion_alta").prop("checked", true): $("#secador_uc_verif_control_presion_alta").prop("checked", false);
                rest.data.data.UC_VERIF_CONTROL_PRESION_BAJA==1? $("#secador_uc_verif_control_presion_baja").prop("checked", true): $("#secador_uc_verif_control_presion_baja").prop("checked", false);
                rest.data.data.UE_VERIF_AISLAMIENTO_TERMICO==1? $("#secador_ue_verif_aislamiento_termico").prop("checked", true): $("#secador_ue_verif_aislamiento_termico").prop("checked", false);
                rest.data.data.UE_VERIF_INGRESO_SALIDA_AIRE==1? $("#secador_ue_verif_ingreso_salida_aire").prop("checked", true): $("#secador_ue_verif_ingreso_salida_aire").prop("checked", false);
                rest.data.data.UE_VERIF_LIMPIEZA_TRAMPA==1? $("#secador_ue_verif_limpieza_trampa").prop("checked", true): $("#secador_ue_verif_limpieza_trampa").prop("checked", false);
                rest.data.data.GPM_LIMPIEZA_INTERIOR_EXTERIOR==1? $("#secador_gpm_limpieza_interior_exterior").prop("checked", true): $("#secador_gpm_limpieza_interior_exterior").prop("checked", false);
                rest.data.data.GPM_LIMPIEZA_PINTADO==1? $("#secador_gpm_limpieza_pintado").prop("checked", true): $("#secador_gpm_limpieza_pintado").prop("checked", false);
                $("#secador_cr_und_gas_refrigerante").val(rest.data.data.CR_UND_GAS_REFRIGERANTE_TIPO).trigger('change.select2');
                $("#secador_cr_med_voltaje_fase1").val(rest.data.data.CR_MED_VOLTAJE_FASE1);
                $("#secador_cr_med_voltaje_fase2").val(rest.data.data.CR_MED_VOLTAJE_FASE2);
                $("#secador_cr_med_voltaje_fase3").val(rest.data.data.CR_MED_VOLTAJE_FASE3);
                $("#secador_cr_med_amperaje_arranque_l1").val(rest.data.data.CR_MED_AMPERAJE_ARRANQUE_L1);
                $("#secador_cr_med_amperaje_arranque_l2").val(rest.data.data.CR_MED_AMPERAJE_ARRANQUE_L2);
                $("#secador_cr_med_amperaje_arranque_l3").val(rest.data.data.CR_MED_AMPERAJE_ARRANQUE_L3);
                $("#secador_cr_med_amperaje_trabajo_l1").val(rest.data.data.CR_MED_AMPERAJE_TRABAJO_L1);
                $("#secador_cr_med_amperaje_trabajo_l2").val(rest.data.data.CR_MED_AMPERAJE_TRABAJO_L2);
                $("#secador_cr_med_amperaje_trabajo_l3").val(rest.data.data.CR_MED_AMPERAJE_TRABAJO_L3);
                $("#secador_cr_med_pres_gasrefri_reposo").val(rest.data.data.CR_MED_PRES_GASREFRI_REPOSO);
                $("#secador_cr_med_pres_gasrefri_reposo_psialta").val(rest.data.data.CR_MED_PRES_GASREFRI_REPOSO_PSIALTA);
                $("#secador_cr_med_pres_gasrefri_reposo_psibaja").val(rest.data.data.CR_MED_PRES_GASREFRI_REPOSO_PSIBAJA);
                $("#secador_cr_med_pres_gasrefri_trabajo").val(rest.data.data.CR_MED_PRES_GASREFRI_TRABAJO);
                $("#secador_cr_med_pres_gasrefri_trabajo_psialta").val(rest.data.data.CR_MED_PRES_GASREFRI_TRABAJO_PSIALTA);
                $("#secador_cr_med_pres_gasrefri_trabajo_psibaja").val(rest.data.data.CR_MED_PRES_GASREFRI_TRABAJO_PSIBAJA);
                rest.data.data.CR_REG_VALVULA_EXPANSION==1? $("#secador_cr_reg_valvula_expansion").prop("checked", true): $("#secador_cr_reg_valvula_expansion").prop("checked", false);
                $("#secador_cr_reg_pto_rocio_reposo").val(rest.data.data.CR_REG_PTO_ROCIO_REPOSO);
                $("#secador_cr_reg_pto_rocio_operacion").val(rest.data.data.CR_REG_PTO_ROCIO_OPERACION);
                rest.data.data.VTEE_CONTACTOR_TERMAG==1? $("#secador_vtee_contactor_termag").prop("checked", true): $("#secador_vtee_contactor_termag").prop("checked", false);
                rest.data.data.VTEE_PULSADOR_ARRAN_PARADA==1? $("#secador_vtee_pulsador_arran_parada").prop("checked", true): $("#secador_vtee_pulsador_arran_parada").prop("checked", false);
                rest.data.data.VTEE_LUZ_PILOTO==1? $("#secador_vtee_luz_piloto").prop("checked", true): $("#secador_vtee_luz_piloto").prop("checked", false);
                rest.data.data.VTEE_RELE_PROTECTOR_SOBRECARGA==1? $("#secador_vtee_rele_protector_sobrecarga").prop("checked", true): $("#secador_vtee_rele_protector_sobrecarga").prop("checked", false);
                rest.data.data.VTEE_CONTROL_TEMPERATURA==1? $("#secador_vtee_control_temperatura").prop("checked", true): $("#secador_vtee_control_temperatura").prop("checked", false);
                rest.data.data.VTEE_OTROS==1? $("#secador_vtee_otros").prop("checked", true): $("#secador_vtee_otros").prop("checked", false);
                $("#secador_observaciones_internas").val(rest.data.data.OBSERVACIONES_INTERNAS);
                $("#secador_desctrab").val(rest.data.data.DESCTRAB);
                $("#secador_observac").val(rest.data.data.OBSERVAC);

                await actualizarProgramacionUser('SI',PROGRAMACIONID,NUMOT);
            }else{
                console.log(datos);
            }
        }).catch((error) => {
            console.log(error)
        });
    }
    async function GuardarReporteInicialSecador($this){
        $(".cls_empty").empty();
        $("#kt_secador_form_input_page_2 input").removeClass("input_danger_border");
        const data = new FormData();
        var pushImages =[]        
        const id_tecnico_01=$("#secador_id_tecnico_01").val();
        const id_tecnico_02=$("#secador_id_tecnico_02").val();
        const service_equipo_modelo_tipo=$("#service_secador_equipo_modelo_tipo").val();
        const service_secador_tipo_refrigeracion=$("#service_secador_secador_tipo_refrigeracion").val();
        const service_fecha=$("#service_secador_fecha").val();
        const programacionid= $(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid");
        const reporte_orden_trabajo= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-numot");
        const referencia= $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_referencia').children('p').text();
        const razon_social= $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_razon_social').text();
        const ruc= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_ruc').children('p').text();
        const modelo= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_modelo').children('p').text();
        const serie= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_serie').children('p').text();
        const tipo= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo').children('p').text();
        const secador_empresa_direccion= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_direccion').children('p').text();
        const select_sr_local= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_local').children('p').text();
        const select_sr_tipo_servicio= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo_servicio').children('p').text();
        const equipo_id= $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_equipo_id').children('p').text();
        const equipo_marca= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_equipo_marca').children('p').text();
        $("#secador_NumOT").val(reporte_orden_trabajo); 
        $("#secador_empresa_nombre").val(razon_social);
        $("#secador_ruc").val(ruc);
        $("#secador_empresa_direccion").val(secador_empresa_direccion);
        $("#secador_TipoServicio").val(select_sr_tipo_servicio);
        $("#secador_equipo_referencia").val(referencia);
        $("#secador_Modelo").val(modelo);
        $("#secador_Serie").val(serie);
        $("#secador_Equipo_Id").val(equipo_id);
        $("#secador_Equipo").val(equipo_marca);
        $("#secador_tipo_servicio_cotizacion").val(tipo);
        $("#secador_local_nombre").val(select_sr_local);

        data.append('_token', $("input[name='_token']").val());
        data.append("secador_FechServicio",service_fecha=="0"?'':service_fecha);
        data.append("secador_NumOT",reporte_orden_trabajo);
        data.append("secador_empresa_nombre",razon_social);
        data.append("secador_ruc",ruc);
        data.append("secador_empresa_direccion",secador_empresa_direccion);
        data.append("secador_local_nombre",select_sr_local);
        data.append("secador_TipoServicio",select_sr_tipo_servicio);
        data.append("secador_ProxServicio",$("#secador_ProxServicio").val());
        data.append("secador_Equipo_Id",$("#secador_Equipo_Id").val());
        data.append("secador_Equipo",$("#secador_Equipo").val());
        data.append("secador_Modelo",$("#secador_Modelo").val());
        data.append("secador_Serie",$("#secador_Serie").val());
        data.append("secador_Tecnico1_Nombre",id_tecnico_01=="0"?'':$("#secador_id_tecnico_01 option:selected").text());
        data.append("secador_Tecnico1_DNI",id_tecnico_01=="0"?'':id_tecnico_01);
        data.append("secador_Tecnico2_Nombre",id_tecnico_02=="0"?'':$("#secador_id_tecnico_02 option:selected").text());
        data.append("secador_Tecnico2_DNI",id_tecnico_02=="0"?'':id_tecnico_02);
        data.append("secador_id_obl",$("#secador_id_obl").val());
        data.append("secador_PresMax",$("#secador_PresMax").val());
        data.append("secador_Placa",$("#secador_Placa").val());
        data.append("secador_TipoControl",$("#secador_TipoControl").val());
        data.append("secador_VoltControl",$("#secador_VoltControl").val());      
        data.append("secador_programacionid",programacionid);
        data.append("secador_nota",$("#service_secador_nota").val());
        $(".btn-secador-stepper-previous").prop("disabled", true);
        spinnerOt($this);
        const response = await fetch(`${APP_URL}/secador/registro`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            spinnerOt($this, false);
            $(".btn-secador-stepper-previous").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            if(type==="empty"){
                $txtEmpty = '';
                $.each( datos, function( key, value ) {
                    $txtEmpty = value;
                    if (key != undefined) {
                        $("#kt_secador_form_input_page_2 input[name='"+key+"'], #kt_secador_form_input_page_2 select[name='"+key+"'], #kt_secador_form_input_page_2 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
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
                    var reporteestado = 'PENDIENTE';
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_numero",data1);
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado",reporteestado);
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_reporte_estado').text(reporteestado);
                    $(".kc_list_ot").children(".active").parent(".kc_list_ot").children().children().children().children('.select_sr_reporte_estado').removeClass("badge-primary").addClass('badge-danger');                    
                    $("#tipo_ser_cotizaciono").text(tipo);
                    $("#cliente-seguimiento").text(razon_social);
                    $("#ot-seguimiento").text(reporte_orden_trabajo);
                    $("#modelo-seguimiento").text(modelo);
                    $("#serie-seguimiento").text(serie);
                    $("#referencia-seguimiento").text(referencia);
                    
                    /*
                    countador_secador = 1;
                    $('#page_secador_0').removeClass('current');
                    $('#page_secador_1').addClass('current');
                    $(".btn-secador-stepper-previous").show();
                    $(".btn-secador-stepper-next").show();
                    $('#page_secador_content_0').removeClass('current');
                    $('#page_secador_content_1').addClass('current');
                    $("#kt_modal_create_compresor").hide();
                    $("#kt_modal_create_secador").show();
                    $("#btnsecadoraGuardarSalir").hide().attr("data-paso", "paso_1");
                    */
                    validarSecadorFotorInicialXTipoServ(select_sr_tipo_servicio, 'next');

                    $("#kt_seguimiento_menu, .cls_step_2").show();
                    $(".cls_step_ot").hide();
                    var btnNext =  $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-reporte_estado");
                    $("#btnsecadorSaveData").show();
                    if(btnNext=="NUEVO"){
                        $(".btn-secador-stepper-next").prop("disabled", true);
                        $(".btn-secador-stepper-next").hide();
                    }else{
                        $(".btn-secador-stepper-next").prop("disabled", false);
                        $(".btn-secador-stepper-next").show();
                    }                
                    $("#kt_seguimiento_menu, .cls_step_2").show();
                    $(".cls_step_ot").hide();
                    validar4SecadorImages();
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
    function validarSecadorFotorInicialXTipoServ(select_sr_tipo_servicio, tipo_btn ){
        if (tipo_btn==="next"){
            if (select_sr_tipo_servicio==="REVISION" ||select_sr_tipo_servicio==="ALQUILER" || select_sr_tipo_servicio==="ARRANQUE"){ 
                countador_secador = 2;
                $('#page_secador_1, #page_secador_0').removeClass('current');
                $('#page_secador_2').addClass('current');
                $(".btn-secador-stepper-next").show();
                $(".btn-secador-stepper-previous").show();
                $('#page_secador_content_1, #page_secador_content_0').removeClass('current');
                $('#page_secador_content_2').addClass('current');
                $("#kt_modal_create_compresor").hide();
                $("#kt_modal_create_secador").show();
                $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_2");   
            }else{
                countador_secador = 1;
                $('#page_secador_0').removeClass('current');
                $('#page_secador_1').addClass('current');
                $(".btn-secador-stepper-previous").show();
                $(".btn-secador-stepper-next").show();
                $('#page_secador_content_0').removeClass('current');
                $('#page_secador_content_1').addClass('current');
                $("#kt_modal_create_compresor").hide();
                $("#kt_modal_create_secador").show();
                $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_1");
            }
        }else if  (tipo_btn==="previous"){
            if (select_sr_tipo_servicio==="REVISION" ||select_sr_tipo_servicio==="ALQUILER" || select_sr_tipo_servicio==="ARRANQUE"){
                countador_secador = 0;
                $('#page_secador_0').addClass('current')
                $('#page_secador_1, #page_secador_2').removeClass('current')
                $(".btn-secador-stepper-previous").hide();
                $(".btn-secador-stepper-next").hide();
                $('#page_secador_content_0').addClass('current');
                $('#page_secador_content_1, #page_secador_content_2').removeClass('current');
                $("#kt_seguimiento_menu, .cls_step_2").hide();
                $(".cls_step_ot").show();
                $("#btnsecadoraGuardarSalir").hide().attr("data-paso", 0);
                $("#kt_modal_create_compresor").show();
                $("#kt_modal_create_secador").hide(); 
            }else{
                countador_secador = 1;
                $('#page_secador_2').removeClass('current');
                $('#page_secador_1').addClass('current');
                $(".btn-secador-stepper-next").show();
                $(".btn-secador-stepper-previous").show();
                $('#page_secador_content_2').removeClass('current');
                $('#page_secador_content_1').addClass('current');
                $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_1"); 
            }
        }        

    }
    $(document).on("change", ".filenameonsecadorchage", async function(e){
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
        $("#spiner-secador-upload-images").show();
        //var myHeaders = new Headers();
        //myHeaders.append("Accept", "application/json");
        //myHeaders.append("Authorization", "Bearer "+$("#id_token").val());
        const id_tecnico_01=$("#secador_id_tecnico_01").val();
        datosFiles.append('_token', $("input[name='_token']").val());
        datosFiles.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));
        datosFiles.append("programacionid",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"));
        datosFiles.append("id_tecnico_01",id_tecnico_01=="0"?'':id_tecnico_01);
        datosFiles.append("tipo_registro",'inicio');
        //var tarhe = e.target.parentElement.nextElementSibling.children[0]; 
        const response = await fetch(`${APP_URL_BK}/api/servicio/request-file`, {
            method: 'POST',
            //headers: myHeaders,
            body: datosFiles,
            //redirect: 'follow'
        }).then(async (response)=> {
            const rest = await response.json();
            var datos = rest;
            var icon = rest.icon;
            var status = rest.status;
            var message = rest.message;    
            $("#spiner-secador-upload-images").hide();          
            if (status){
                var data = rest.data;                 
                var latest = rest.latest;                 
                const IdsecadorUploadImg = $("#IdsecadorUploadImg").html();
                const createElemntoImg = document.createElement("div");
                createElemntoImg.classList.add('col-md-3');
                createElemntoImg.classList.add('col-sm-4');
                createElemntoImg.classList.add('fv-row');
                createElemntoImg.classList.add('px-8');
                createElemntoImg.classList.add('pt-3');
                createElemntoImg.setAttribute("id", "IdsecadorUploadImg");
                createElemntoImg.innerHTML = IdsecadorUploadImg;
                var classActiveCheck = '';
                var classBtnActiveCheck = ' ';
                var htmlContenImg='';
                var APP_URL_IMG_BK = APP_URL_BK.replace('index.php', '');
                $.each( data, function( key, value ) {
                    contadorsecadorImg1=contadorsecadorImg1+1;
                    classActiveCheck = 'active';
                    classBtnActiveCheck =' checked ';
                    htmlContenImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_secador_images_select cls_nuevo">
                                <div class="position-absolute cls_check_photo ${classActiveCheck}" data-estado="${classActiveCheck}" > 
                                    <i class="bi bi-check2 fs-2x"></i>
                                </div>
                                <input type="hidden"  class="d-none cls_tipo_archivo" value="${value["tipo_archivo"]}" >
                                <input type="hidden"  class="d-none cls_nombre_archivo" value="${value["nombre_archivo"]}">
                                <input type="hidden"  class="d-none cls_nombre_original" value="${value["nombre_original"]}">
                                <input type="hidden"  class="d-none cls_ruta_relativa" value="${value["ruta_relativa"]}">
                                <input type="hidden"  class="d-none cls_id" value="${latest}">
                                <div  class="btn btn-outline btn-outline-dashed btn-outline-default w-100 active p-0 image-input" >
                                    <div data-image="${APP_URL_IMG_BK}${value["ruta_relativa"]}" class="image-input-wrapper w-100 h-120px background-size-cover" style="border-radius: 0.475rem 0.475rem 0 0;background-image: url(${APP_URL_IMG_BK}${value["ruta_relativa"]})" ></div> 
                                    <div class="d-flex align-items-stretch cls-btn-option-images" >
                                        <button class="btn btn-sm p-1 btn-dark w-100 tk_secador_delete_image_sesion ${value["name_cls"]} " data-opt="nuevo" data-cls="${value["name_cls"]}" data-name=${value["nombre_archivo"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                            <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin indicator-label"></i>
                                            <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                            <label class="form-check form-check-custom d-block ">
                                                <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_secador_check_image_sesion ${value["name_cls"]+'inp'}" data-cls="${value["name_cls"]+'inp'}" type="checkbox" name="" value="" >
                                                <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </label>
                                        </button>
                                    </div>
                                </div>
                            </div>`;
                });
                $("#kt_secador_list_images").append(htmlContenImg);
                document.getElementById("kt_secador_list_images").append(createElemntoImg);
                $("#IdsecadorUploadImg").remove();
                validar4SecadorImages()
            }else{
                Toast.fire({
                    icon: 'error',
                    title: rest.message
                });
            }
        })
        //href={REACT_APP_REST_BACK+rsfiles.nombre_archivo}
        .catch(function (error){
            console.log(error)
        });
    })
    function validar4SecadorImages(){
        var count_ = 0;
        $(".ki_secador_images_select").each(function(i, val){
            var thisclas = $(this).children().attr("data-estado");
            var estatus_delete =$(this).attr("data-delete");
            var thisclas1 = $(this).children();
            if (thisclas=='active'){
                if (estatus_delete!=="true"){
                    count_++;
                }
            }
        });
        $(".btn-secador-stepper-next").prop("disabled", true);
        $(".btk_secador_check_image_sesion").each(function(i, val){
            if(!$(this).is(":checked")){
                $(this).parent().parent().prop("disabled", false);
            }
        });

        const select_sr_tipo_servicio= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo_servicio').children('p').text();
        if (select_sr_tipo_servicio==="REVISION" ||select_sr_tipo_servicio==="ALQUILER" || select_sr_tipo_servicio==="ARRANQUE"){
            $(".btn-secador-stepper-next").prop("disabled", false);
        }else{
            if (count_>=4){
                $(".btn-secador-stepper-next").prop("disabled", false);
            }
        }
        return count_;
    }
    $(document).on("click", ".btk_secador_check_image_sesion", async function(event){
        var $this = $(this);
        var dataCls = $this.attr("data-cls");
        var estado_ver_reporte = 0;
        if($this.is(":checked")){
            var estado_ver_reporte = 1;
        }
        var val_id = $this.parent().parent().parent().parent().parent().children(".cls_id").val();
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('id',val_id);
        data.append('estado_ver_reporte', estado_ver_reporte);
        data.append('estado', 1);
        beforeSendInputLoad("."+dataCls);
        const response = await fetch(`${APP_URL}/servicio/check-ver-reporte-foto`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            beforeSendInputLoad("."+dataCls, false);
            const rest = await response.json();
            const datos = rest.data;
            const status = rest.status;
            if(status){
                const status1 = rest.data.status;
                const message = rest.data.message
                if (message==="Unauthenticated."){
                    Toast.fire({
                        icon: 'error',
                        title: message
                    });
                    return;
                }                
                var children = $this.parent().parent().parent().parent().parent().children(".cls_check_photo");
                var thisActive = children.attr("data-estado");
                $btk_image_sesion = $this;
                if (thisActive=='active'){
                    children.attr("data-estado", "").removeClass("active");
                }else{
                    children.attr("data-estado", "active").addClass("active");
                }
                validar4SecadorImages();
                return;
            }
            Toast.fire({
                icon: rest.icon,
                title: rest.message
            });
                            
        }).catch((error) => {
            console.log(error)
        });
    });

    $(document).on("click", ".tk_secador_delete_image_sesion", async function(event){
        var dataNombre = $(this).data("name");
        var dataCls = $(this).data("cls");
        var dataOpt = $(this).data("opt");
        var $this = $(this);
        var val_id =$(this).parent().parent().parent().children(".cls_id").val();
        var arr = [];
        arr["dataNombre"]=dataNombre;
        arr["id"]=val_id;
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
                EliminarSecadorArchivo(arr, $this, dataCls);
                return;
                
            }
        }));
    });
    async function EliminarSecadorArchivo(dataNombre, $this, dataCls){
        beforeSendBtnLoad("."+dataCls);
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('nombre_archivo', dataNombre["dataNombre"]);
        data.append('id', dataNombre["id"]);
        data.append('estado_ver_reporte', 0);
        data.append('estado', 0);
        const response = await fetch(`${APP_URL}/servicio/delete-file`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            beforeSendBtnLoad("."+dataCls, false);
            const rest = await response.json();
            const datos = rest.data;
            const status = rest.status;
            if(status){
                const status1 = rest.data.status;
                const message = rest.data.message
                if (message==="Unauthenticated."){
                    Toast.fire({
                        icon: 'error',
                        title: message
                    });
                    return;
                }
                Toast.fire({
                    icon: rest.data.icon,
                    title: message
                });
                $this.parent().parent().parent().remove();
                validar4SecadorImages()
                contadorsecadorImg1=contadorsecadorImg1-1;
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
    async function getArchivoSecadorByNumeroReporte(numero_reporte, $this, programacionid){
        spinnerOt($this);
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('reporte_numero', numero_reporte);
        data.append('tipo_registro', 'inicio');
        data.append('programacionid', programacionid);
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
                const IdsecadorUploadImg = $("#IdsecadorUploadImg").html();
                const createElemntoImg = document.createElement("div");
                createElemntoImg.classList.add('col-md-3');
                createElemntoImg.classList.add('col-sm-4');
                createElemntoImg.classList.add('fv-row');
                createElemntoImg.classList.add('px-8');
                createElemntoImg.classList.add('pt-3');
                createElemntoImg.setAttribute("id", "IdsecadorUploadImg");
                createElemntoImg.innerHTML = IdsecadorUploadImg;
                if (status1){
                    contadorImg1 =0;
                    const datos = rest.data.data;
                    var htmlContenImg='';
                    var APP_URL_IMG_BK = APP_URL_BK.replace('index.php', '');
                    $.each( datos, function( key, value ) {
                        var classActiveCheck = '';
                        var classBtnActiveCheck = ' ';
                        contadorsecadorImg1=contadorsecadorImg1+1;
                        if (value["ESTADO_VER_REPORTE"]==="1"){
                            classActiveCheck = 'active';
                            classBtnActiveCheck =' checked ';
                        }
                        var NOMBRE_ARCHIVO_CLS = value["NOMBRE_ARCHIVO"].replace('.', '');
                        htmlContenImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_secador_images_select cls_editar">
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
                                            <button class="btn btn-sm p-1 btn-dark w-100 tk_secador_delete_image_sesion NOT ${NOMBRE_ARCHIVO_CLS}" data-opt="editar" data-cls="${NOMBRE_ARCHIVO_CLS}" data-name=${value["NOMBRE_ARCHIVO"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                                <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin indicator-label"></i>
                                                <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                                <label class="form-check form-check-custom d-block ">
                                                    <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_secador_check_image_sesion ${NOMBRE_ARCHIVO_CLS+'inp'}" data-cls="${NOMBRE_ARCHIVO_CLS+'inp'}" type="checkbox" name="" value="${value["ESTADO_VER_REPORTE"]}" >
                                                    <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    $("#kt_secador_list_images").html(htmlContenImg);
                    document.getElementById("kt_secador_list_images").append(createElemntoImg);
                    validar4SecadorImages()                    
                }else{
                    Toast.fire({
                        icon: icon1,
                        title:message1
                    });
                    $("#kt_secador_list_images").html('');
                    document.getElementById("kt_secador_list_images").append(createElemntoImg);
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
    ///FOTOS FINAL SECADOR
    $(document).on("change", ".filenamesecadoronFinalchage", async function(e){
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
        $("#spiner_secador_upload_final_images").show();
        var myHeaders = new Headers();
        //myHeaders.append("Accept", "application/json");
        //myHeaders.append("Authorization", "Bearer "+$("#id_token").val());
        const id_tecnico_01=$("#secador_id_tecnico_01").val();
        datosFiles.append('_token', $("input[name='_token']").val());
        datosFiles.append("reporte_numero",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero"));
        datosFiles.append("programacionid",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"));
        datosFiles.append("id_tecnico_01",id_tecnico_01=="0"?'':id_tecnico_01);
        datosFiles.append("tipo_registro",'final');
        //var tarhe = e.target.parentElement.nextElementSibling.children[0]; 
        const response = await fetch(`${APP_URL_BK}/api/servicio/request-file`, {
            method: 'POST',
            //headers: myHeaders,
            body: datosFiles,
            //redirect: 'follow'
        }).then(async (response)=> {
            const rest = await response.json();
            var datos = rest;
            var icon = rest.icon;
            var status = rest.status;
            var message = rest.message;    
            $("#spiner_secador_upload_final_images").hide();          
            if (status){
                var data = rest.data;     
                var latest = rest.latest;             
                const IdsecadorUploadFinalImg = $("#IdsecadorUploadFinalImg").html();
                const createElemntoImg = document.createElement("div");
                createElemntoImg.classList.add('col-md-3');
                createElemntoImg.classList.add('col-sm-4');
                createElemntoImg.classList.add('fv-row');
                createElemntoImg.classList.add('px-8');
                createElemntoImg.classList.add('pt-3');
                createElemntoImg.setAttribute("id", "IdsecadorUploadFinalImg");
                createElemntoImg.innerHTML = IdsecadorUploadFinalImg;
                var classActiveCheck = '';
                var classBtnActiveCheck = ' ';
                var htmlContenImg='';
                var APP_URL_IMG_BK = APP_URL_BK.replace('index.php', '');
                $.each( data, function( key, value ) {
                    contadorsecadorIFinalmg1=contadorsecadorIFinalmg1+1;
                        classActiveCheck = 'active';
                        classBtnActiveCheck =' checked ';
                    
                    htmlContenImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_secador_images_final_select cls_nuevo">
                                <div class="position-absolute cls_check_final_photo ${classActiveCheck}" data-estado="${classActiveCheck}" > 
                                    <i class="bi bi-check2 fs-2x"></i>
                                </div>
                                <input type="hidden"  class="d-none cls_tipo_archivo" value="${value["tipo_archivo"]}" >
                                <input type="hidden"  class="d-none cls_nombre_archivo" value="${value["nombre_archivo"]}">
                                <input type="hidden"  class="d-none cls_nombre_original" value="${value["nombre_original"]}">
                                <input type="hidden"  class="d-none cls_ruta_relativa" value="${value["ruta_relativa"]}">
                                <input type="hidden"  class="d-none cls_id" value="${latest}">
                                <div  class="btn btn-outline btn-outline-dashed btn-outline-default w-100 active p-0 image-input" >
                                    <div data-image="${APP_URL_IMG_BK}${value["ruta_relativa"]}" class="image-input-wrapper w-100 h-120px background-size-cover" style="border-radius: 0.475rem 0.475rem 0 0;background-image: url(${APP_URL_IMG_BK}${value["ruta_relativa"]})" ></div> 
                                    <div class="d-flex align-items-stretch cls-btn-option-images" >
                                        <button class="btn btn-sm p-1 btn-dark w-100 tk_secador_delete_image_final_sesion ${value["name_cls"]}" data-opt="nuevo" data-cls="${value["name_cls"]}" data-name=${value["nombre_archivo"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                            <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin indicator-label"></i>
                                            <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                            <label class="form-check form-check-custom d-block ">
                                                <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_secador_check_image_final_sesion ${value["name_cls"]+'inp'}" data-cls="${value["name_cls"]+'inp'}" type="checkbox" name="" value="" >
                                                <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </label>
                                        </button>
                                    </div>
                                </div>
                            </div>`;
                });
                $("#kt_secador_list_final_images").append(htmlContenImg);
                document.getElementById("kt_secador_list_final_images").append(createElemntoImg);
                $("#IdsecadorUploadFinalImg").remove();
                validar4SecadorFinalImages()
            }else{
                Toast.fire({
                    icon: 'error',
                    title: rest.message
                });
            }
        })
        //href={REACT_APP_REST_BACK+rsfiles.nombre_archivo}
        .catch(function (error){
            console.log(error)
        });
    });
    function validar4SecadorFinalImages(){
        var count_ = 0;
        var tipo_servicio = $("#secador_TipoServicio").val();
        $(".ki_secador_images_final_select").each(function(i, val){
            var thisclas = $(this).children().attr("data-estado");
            var estatus_delete =$(this).attr("data-delete");
            var thisclas1 = $(this).children();
            if (thisclas=='active'){
                if(estatus_delete!=="true"){
                    count_++;
                }
            }
        });
        $(".btn-secador-stepper-next").prop("disabled", true);
        if (tipo_servicio==="REVISION"){
            $(".btn-secador-stepper-next").prop("disabled", false);
        }
        $(".btk_secador_check_image_final_sesion").each(function(i, val){
            if(!$(this).is(":checked")){
                $(this).parent().parent().prop("disabled", false);
            }
        });
        if (count_>=4){
            $(".btn-secador-stepper-next").prop("disabled", false);
        }
        return count_;
    }
    $(document).on("click", ".btk_secador_check_image_final_sesion", async function(event){
        var $this = $(this);
        var dataCls = $this.attr("data-cls");
        var estado_ver_reporte = 0;
        if($this.is(":checked")){
            var estado_ver_reporte = 1;
        }
        var val_id = $this.parent().parent().parent().parent().parent().children(".cls_id").val();
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('id',val_id);
        data.append('estado_ver_reporte', estado_ver_reporte);
        data.append('estado', 1);
        beforeSendInputLoad("."+dataCls);
        const response = await fetch(`${APP_URL}/servicio/check-ver-reporte-foto`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            beforeSendInputLoad("."+dataCls, false);
            const rest = await response.json();
            const datos = rest.data;
            const status = rest.status;
            if(status){
                const status1 = rest.data.status;
                const message = rest.data.message
                if (message==="Unauthenticated."){
                    Toast.fire({
                        icon: 'error',
                        title: message
                    });
                    return;
                }              
                var children = $this.parent().parent().parent().parent().parent().children(".cls_check_final_photo");
                var thisActive = children.attr("data-estado");
                $btk_image_sesion = $this;
                if (thisActive=='active'){
                    children.attr("data-estado", "").removeClass("active");
                }else{
                    children.attr("data-estado", "active").addClass("active");
                }
                validar4SecadorFinalImages();
                return;
            }
            Toast.fire({
                icon: rest.icon,
                title: rest.message
            });
                            
        }).catch((error) => {
            console.log(error)
        });

    });

    $(document).on("click", ".tk_secador_delete_image_final_sesion", async function(event){
        var dataNombre = $(this).data("name");
        var dataCls = $(this).data("cls");
        var dataOpt = $(this).data("opt");
        var $this = $(this);
        var val_id =$(this).parent().parent().parent().children(".cls_id").val();
        var arr = [];
        arr["dataNombre"]=dataNombre;
        arr["id"]=val_id;
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
                EliminarFinalSecadorArchivo(arr, $this, dataCls);
            }
        }));
    });

    async function EliminarFinalSecadorArchivo(dataNombre, $this, dataCls){
        beforeSendBtnLoad("."+dataCls);
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('nombre_archivo', dataNombre["dataNombre"]);
        data.append('id', dataNombre["id"]);
        data.append('estado_ver_reporte', 0);
        data.append('estado', 0);
        const response = await fetch(`${APP_URL}/servicio/delete-file`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            beforeSendBtnLoad("."+dataCls, false);
            const rest = await response.json();
            const datos = rest.data;
            const status = rest.status;
            if(status){
                const status1 = rest.data.status;
                const message = rest.data.message
                if (message==="Unauthenticated."){
                    Toast.fire({
                        icon: 'error',
                        title: message
                    });
                    return;
                }
                Toast.fire({
                    icon: rest.data.icon,
                    title: message
                });
                $this.parent().parent().parent().remove();
                validar4SecadorFinalImages()
                contadorsecadorIFinalmg1=contadorsecadorIFinalmg1-1;
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

    async function getArchivoSecadorFinalByNumeroReporte(numero_reporte, $this, programacionid){
        //spinnerOt($this);
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('reporte_numero', numero_reporte);
        data.append('tipo_registro', 'final');
        data.append('programacionid', programacionid);
        const response = await fetch(`${APP_URL}/reporte/listar-archivo-by-reporte`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            //spinnerOt($this, false);
            
            const rest = await response.json();
            const status1 = rest.status;                
            if (status1){
                const status1 = rest.data.status;
                const icon1 = rest.data.icon;
                const message1 = rest.data.message;
                const data1 = rest.data.data;
                const IdsecadorUploadFinalImg = $("#IdsecadorUploadFinalImg").html();
                const createElemntoImg = document.createElement("div");
                createElemntoImg.classList.add('col-md-3');
                createElemntoImg.classList.add('col-sm-4');
                createElemntoImg.classList.add('fv-row');
                createElemntoImg.classList.add('px-8');
                createElemntoImg.classList.add('pt-3');
                createElemntoImg.setAttribute("id", "IdsecadorUploadFinalImg");
                createElemntoImg.innerHTML = IdsecadorUploadFinalImg;
                if (status1){
                    contadorImg1 =0;
                    const datos = rest.data.data;   
                    var htmlContenImg='';
                    var APP_URL_IMG_BK = APP_URL_BK.replace('index.php', '');
                    $.each( datos, function( key, value ) {
                        var classActiveCheck = '';
                        var classBtnActiveCheck = ' ';
                        contadorsecadorIFinalmg1=contadorsecadorIFinalmg1+1;   
                        if (value["ESTADO_VER_REPORTE"]==="1"){
                            classActiveCheck = 'active';
                            classBtnActiveCheck =' checked ';
                        }
                        var NOMBRE_ARCHIVO_CLS = value["NOMBRE_ARCHIVO"].replace('.', '');
                        htmlContenImg+=`<div class="col-md-3 px-8 pt-3 col-sm-4 fv-row position-relative ki_secador_images_final_select cls_editar">
                                    <div class="position-absolute cls_check_final_photo ${classActiveCheck}" data-estado="${classActiveCheck}" > 
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
                                            <button class="btn btn-sm p-1 btn-dark w-100 tk_secador_delete_image_final_sesion NOT ${NOMBRE_ARCHIVO_CLS}" data-opt="editar" data-cls="${NOMBRE_ARCHIVO_CLS}" data-name=${value["NOMBRE_ARCHIVO"]} type="button" style="border-radius: 0 0 0 0.475rem;" >
                                                <i style="color:#fff !important ;" class="bi fs-2x fonticon-trash-bin indicator-label"></i>
                                                <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <button class="btn btn-sm p-3 btn-dark text-white w-100 " type="button" style="border-radius: 0 0 0.475rem 0;">
                                                <label class="form-check form-check-custom d-block ">
                                                    <input ${classBtnActiveCheck}  class="form-check-input h-25px w-25px btk_secador_check_image_final_sesion ${NOMBRE_ARCHIVO_CLS+'inp'}" data-cls="${NOMBRE_ARCHIVO_CLS+'inp'}" type="checkbox" name="" value="${value["ESTADO_VER_REPORTE"]}" >
                                                    <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    $("#kt_secador_list_final_images").html(htmlContenImg);
                    document.getElementById("kt_secador_list_final_images").append(createElemntoImg);
                    $("#inicio_contador_imag").val(contadorImg1);
                    validar4SecadorFinalImages()
                }else{
                    $("#kt_secador_list_final_images").html('');
                    document.getElementById("kt_secador_list_final_images").append(createElemntoImg);
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

    async function ActualizarSecadorReportePaso2(){
        $("#kt_secador_form_input_page_2 .cls_empty").empty(); 
        beforeSendBtnLoad(".btn-secador-stepper-next");
        const data = new FormData();        
        /////*******ini
        const secador_id_tecnico_02=$("#secador_id_tecnico_02").val();
        const service_secador_fecha=$("#service_secador_fecha").val();
        const secador_cr_und_gas_refrigerante=$("#secador_cr_und_gas_refrigerante").val();
        const secador_NumReporte = $(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero")
        data.append('_token', $("input[name='_token']").val());
        data.append("secador_NumReporte",secador_NumReporte);
        data.append("secador_empresa_nombre",$("#secador_empresa_nombre").val());
        data.append("secador_ruc",$("#secador_ruc").val());
        data.append("secador_FechServicio",service_secador_fecha=="0"?'':service_secador_fecha);
        data.append("secador_ProxServicio",'');
        data.append("secador_Equipo_Id",$("#secador_Equipo_Id").val());
        data.append("secador_Equipo",$("#secador_Equipo").val());
        data.append("secador_Modelo",$("#secador_Modelo").val());
        data.append("secador_Serie",$("#secador_Serie").val());
        data.append("secador_Tecnico2_DNI",secador_id_tecnico_02=="0"?'':secador_id_tecnico_02);
        data.append("secador_Tecnico2_Nombre",secador_id_tecnico_02=="0"?'':$("#secador_id_tecnico_02 option:selected").text());
        data.append("secador_id_obl",$("#secador_id_obl").val());
        data.append("secador_Hora_Inicio",$("#secador_Serie").val());
        data.append("secador_Hora_Fin",$("#secador_Serie").val());
        data.append("secador_Horometro",$("#secador_Horometro").val());
        data.append("secador_TipoServicio",$("#secador_TipoServicio").val());
        data.append("secador_PresMax",$("#secador_PresMax").val());
        data.append("secador_Placa",$("#secador_Placa").val());
        data.append("secador_TipoControl",$("#secador_TipoControl").val());
        data.append("secador_VoltControl",$("#secador_VoltControl").val());
        data.append("secador_equipo_referencia",$("#secador_equipo_referencia").val());
        data.append("secador_mc_cheq_presion_succion_descarga",$("#secador_mc_cheq_presion_succion_descarga").is(":checked")?1:0);
        data.append("secador_mc_cheq_terminal_electrico",$("#secador_mc_cheq_terminal_electrico").is(":checked")?1:0);
        data.append("secador_mc_cheq_valvulas_servicio",$("#secador_mc_cheq_valvulas_servicio").is(":checked")?1:0);
        data.append("secador_mc_cheq_posibles_fugas_gas_refrig",$("#secador_mc_cheq_posibles_fugas_gas_refrig").is(":checked")?1:0);
        data.append("secador_mc_cheq_cojinetes_amort_perno_arand",$("#secador_mc_cheq_cojinetes_amort_perno_arand").is(":checked")?1:0);
        data.append("secador_uc_limpieza_serpentin_condensacion",$("#secador_uc_limpieza_serpentin_condensacion").is(":checked")?1:0);
        data.append("secador_uc_verif_motor_ventil_rodam_empel",$("#secador_uc_verif_motor_ventil_rodam_empel").is(":checked")?1:0);
        data.append("secador_uc_verif_control_presion_alta",$("#secador_uc_verif_control_presion_alta").is(":checked")?1:0);
        data.append("secador_uc_verif_control_presion_baja",$("#secador_uc_verif_control_presion_baja").is(":checked")?1:0);
        data.append("secador_ue_verif_aislamiento_termico",$("#secador_ue_verif_aislamiento_termico").is(":checked")?1:0);
        data.append("secador_ue_verif_ingreso_salida_aire",$("#secador_ue_verif_ingreso_salida_aire").is(":checked")?1:0);
        data.append("secador_ue_verif_limpieza_trampa",$("#secador_ue_verif_limpieza_trampa").is(":checked")?1:0);
        data.append("secador_gpm_limpieza_interior_exterior",$("#secador_gpm_limpieza_interior_exterior").is(":checked")?1:0);
        data.append("secador_gpm_limpieza_pintado",$("#secador_gpm_limpieza_pintado").is(":checked")?1:0);
        data.append("secador_cr_und_gas_refrigerante",secador_cr_und_gas_refrigerante=="0"?'':secador_cr_und_gas_refrigerante);
        data.append("secador_cr_med_voltaje_fase1",$("#secador_cr_med_voltaje_fase1").val());
        data.append("secador_cr_med_voltaje_fase2",$("#secador_cr_med_voltaje_fase2").val());
        data.append("secador_cr_med_voltaje_fase3",$("#secador_cr_med_voltaje_fase3").val());
        data.append("secador_cr_med_amperaje_arranque_l1",$("#secador_cr_med_amperaje_arranque_l1").val());
        data.append("secador_cr_med_amperaje_arranque_l2",$("#secador_cr_med_amperaje_arranque_l2").val());
        data.append("secador_cr_med_amperaje_arranque_l3",$("#secador_cr_med_amperaje_arranque_l3").val());
        data.append("secador_cr_med_amperaje_trabajo_l1",$("#secador_cr_med_amperaje_trabajo_l1").val());
        data.append("secador_cr_med_amperaje_trabajo_l2",$("#secador_cr_med_amperaje_trabajo_l2").val());
        data.append("secador_cr_med_amperaje_trabajo_l3",$("#secador_cr_med_amperaje_trabajo_l3").val());
        data.append("secador_cr_med_pres_gasrefri_reposo",$("#secador_cr_med_pres_gasrefri_reposo").val());
        data.append("secador_cr_med_pres_gasrefri_reposo_psialta",$("#secador_cr_med_pres_gasrefri_reposo_psialta").val());
        data.append("secador_cr_med_pres_gasrefri_reposo_psibaja",$("#secador_cr_med_pres_gasrefri_reposo_psibaja").val());
        data.append("secador_cr_med_pres_gasrefri_trabajo",$("#secador_cr_med_pres_gasrefri_trabajo").val());
        data.append("secador_cr_med_pres_gasrefri_trabajo_psialta",$("#secador_cr_med_pres_gasrefri_trabajo_psialta").val());
        data.append("secador_cr_med_pres_gasrefri_trabajo_psibaja",$("#secador_cr_med_pres_gasrefri_trabajo_psibaja").val());
        data.append("secador_cr_reg_valvula_expansion",$("#secador_cr_reg_valvula_expansion").is(":checked")?1:0);
        data.append("secador_cr_reg_pto_rocio_reposo",$("#secador_cr_reg_pto_rocio_reposo").val());
        data.append("secador_cr_reg_pto_rocio_operacion",$("#secador_cr_reg_pto_rocio_operacion").val());
        data.append("secador_vtee_contactor_termag",$("#secador_vtee_contactor_termag").is(":checked")?1:0);
        data.append("secador_vtee_pulsador_arran_parada",$("#secador_vtee_pulsador_arran_parada").is(":checked")?1:0);
        data.append("secador_vtee_luz_piloto",$("#secador_vtee_luz_piloto").is(":checked")?1:0);
        data.append("secador_vtee_rele_protector_sobrecarga",$("#secador_vtee_rele_protector_sobrecarga").is(":checked")?1:0);
        data.append("secador_vtee_control_temperatura",$("#secador_vtee_control_temperatura").is(":checked")?1:0);
        data.append("secador_vtee_otros",$("#secador_vtee_otros").is(":checked")?1:0);
        data.append("secador_desctrab",$("#secador_desctrab").val());
        data.append("secador_observac",$("#secador_observac").val());
        data.append("secador_observaciones_internas",$("#secador_observaciones_internas").val());
        data.append("secador_tipo_servicio_cotizacion",$("#secador_tipo_servicio_cotizacion").val());
        $(".btn-secador-stepper-previous").prop("disabled", true);
        const response = await fetch(`${APP_URL}/secador/actualizar-reporte-paso2`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            $(".btn-secador-stepper-previous").prop("disabled", false);
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            beforeSendBtnLoad(".btn-secador-stepper-next", false);
            if(type==="empty"){
                $txtEmpty = '';
                $.each( datos, function( key, value ) {
                    $txtEmpty = value;
                    if (key != undefined) {
                        $("#kt_secador_form_input_page_2 input[name='"+key+"'], #kt_secador_form_input_page_2 select[name='"+key+"'], #kt_secador_form_input_page_2 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
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
                    const datos1 = rest.datos;
                    countador_secador = 3;
                    $('#page_secador_2').removeClass('current');
                    $('#page_secador_3').addClass('current');
                    $(".btn-secador-stepper-next").show();
                    $(".btn-secador-stepper-previous").show();
                    $('#page_secador_content_2').removeClass('current');
                    $('#page_secador_content_3').addClass('current');
                    $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_3");
                    getArchivoSecadorFinalByNumeroReporte(secador_NumReporte, '', $("#id_programacionid").val())
                    $("#id_resumen_secador_desctrab").html(datos1.secador_desctrab); 
                    $("#id_resumen_secador_observac").html(datos1.secador_observac); 
                    $("#id_resumen_secador_observaciones_internas").html(datos1.secador_observaciones_internas);
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

    async function guardarFotosSecadorFinalesPaso3(){
        //$("#kt_form_input_page_2 .cls_empty").empty();    
        const data = new FormData();
        var cantidadInicialUpdFotos =0;
        $(".ki_secador_images_final_select.cls_editar").each(function(i, val){
            var children = $(this).children();
            var dataEstado = children.attr("data-estado");
            var estatus_delete =$(this).attr("data-delete");
            var val_estado_ver_reporte =0;
            if (dataEstado=='active'){
                if (estatus_delete!=="true") {
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
            } 
        });
        $(".ki_secador_images_final_select.cls_nuevo").each(function(i, val){
            var children = $(this).children();
            var dataEstado = children.attr("data-estado");
            var estatus_delete =$(this).attr("data-delete");
            var val_estado_ver_reporte =0;
            if (dataEstado=='active'){
                if (estatus_delete!=="true") {
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
            }
            
        });
        if (cantidadInicialUpdFotos<4){
            Toast.fire({
                icon: 'warning',
                title: "Campo vacio: seleccione 4 fotos finales como mínimo para actualizar." 
            });
            return;
        }
        countador_secador = 4;
        $('#page_secador_3').removeClass('current');
        $('#page_secador_4').addClass('current');
        $(".btn-secador-stepper-next").hide();
        $(".btn-secador-stepper-previous").show();
        $('#page_secador_content_3').removeClass('current');
        $('#page_secador_content_4').addClass('current');
        $("#btnsecadoractualizarFinal").show().prop("disabled", false);
        $("#btnsecadoraGuardarSalir").hide().attr("data-paso", "paso_4");       
    } 

    async function guardarFotosSecadorPaso1(){
        //$("#kt_form_input_page_2 .cls_empty").empty();    
        const data = new FormData();
        var cantidadInicialUpdFotos =0;
        const select_sr_tipo_servicio= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo_servicio').children('p').text();
        $(".ki_secador_images_select.cls_editar").each(function(i, val){
            var children = $(this).children();
            var dataEstado = children.attr("data-estado");
            var estatus_delete =$(this).attr("data-delete");
            var val_estado_ver_reporte =0;
            if (dataEstado=='active'){
                if (estatus_delete!=="true") {
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
            }
            
        });
        $(".ki_secador_images_select.cls_nuevo").each(function(i, val){
            var children = $(this).children();
            var dataEstado = children.attr("data-estado");
            var estatus_delete =$(this).attr("data-delete");
            var val_estado_ver_reporte =0;
            if (dataEstado=='active'){
                if (estatus_delete!=="true") {
                    val_estado_ver_reporte=1;
                    cantidadInicialUpdFotos++;
                }
            }
            
        });
        
        if (select_sr_tipo_servicio==="REVISION" ||select_sr_tipo_servicio==="ALQUILER" || select_sr_tipo_servicio==="ARRANQUE"){

        }else{
            if (cantidadInicialUpdFotos<4){
                Toast.fire({
                    icon: 'warning',
                    title: "Campo vacio: seleccione 4 fotos iniciales como mínimo para actualizar." 
                });
                return;
            }
        }
        countador_secador = 2;
        $('#page_secador_1').removeClass('current');
        $('#page_secador_2').addClass('current');
        $(".btn-secador-stepper-next").show();
        $(".btn-secador-stepper-previous").show();
        $('#page_secador_content_1').removeClass('current');
        $('#page_secador_content_2').addClass('current');
        $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_2");     
    } 
    $(document).on("click", "#btnsecadoraGuardarSalir", function(){
        var btn = $(this).attr("data-paso");
        if (btn==="paso_1"){
            GuardarSecadorReportePaso1("guardar_salir");
        }else if (btn==="paso_2"){
            guardarSecadorSaliRegresarReportePaso2("guardar_salir");
        }else if (btn==="paso_3"){
            guardarSecadorSaliRegresarReportePaso3("guardar_salir")
        }else if (btn==="paso_5"){
            //guardarSaliRegresarReportePaso5("guardar_salir")
        }
    });

    async function GuardarSecadorReportePaso1(opcion){
        $(".cls_empty").empty()
        const programacionid = $(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid")   ;     
        const numot = $(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-numot");
        if (opcion==="guardar_salir"){
            Swal.fire({
                icon: 'success',
                title: 'El servicio se registró correctamente!!!',
                showConfirmButton: true,
                timer: 3000
            }).then((function(result){
                if(result.value){
                    location.reload();
                }
            }));
            beforeSendBtnLoad(".btn-secador-stepper-next");
            beforeSendBtnLoad(".btn-secador-stepper-previous");
            beforeSendBtnLoad("#btnsecadoraGuardarSalir");
            emptyFormSecador();
            await actualizarProgramacionUser('NO', programacionid ,numot);
        }else {
            countador_secador = 0;
            $('#page_secador_0').addClass('current')
            $('#page_secador_1').removeClass('current')
            $(".btn-secador-stepper-previous").hide();
            $(".btn-secador-stepper-next").hide();
            $('#page_secador_content_0').addClass('current');
            $('#page_secador_content_1').removeClass('current');
            $("#kt_seguimiento_menu, .cls_step_2").hide();
            $(".cls_step_ot").show();
            $("#btnsecadoraGuardarSalir").hide().attr("data-paso", 0);
            $("#kt_modal_create_compresor").show();
            $("#kt_modal_create_secador").hide();
        }   
    }

    async function guardarSecadorSaliRegresarReportePaso2(opcion){
        $("#kt_secador_form_input_page_2 .cls_empty").empty(); 
        beforeSendBtnLoad(".btn-secador-stepper-next");
        beforeSendBtnLoad(".btn-secador-stepper-previous");
        beforeSendBtnLoad("#btnsecadoraGuardarSalir");
        const data = new FormData();        
        /////*******ini
        const secador_id_tecnico_02=$("#secador_id_tecnico_02").val();
        const service_secador_fecha=$("#service_secador_fecha").val();
        const secador_cr_und_gas_refrigerante=$("#secador_cr_und_gas_refrigerante").val();
        const secador_NumReporte = $(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero")
        const select_sr_tipo_servicio= $(".kc_list_ot").children(".active").parent(".kc_list_ot ").children().children().children().children('.select_sr_tipo_servicio').children('p').text();
        data.append('_token', $("input[name='_token']").val());
        data.append("secador_NumReporte",secador_NumReporte);
        data.append("secador_FechServicio",service_secador_fecha=="0"?'':service_secador_fecha);
        data.append("secador_ProxServicio",'');
        data.append("secador_Equipo_Id",$("#secador_Equipo_Id").val());
        data.append("secador_Equipo",$("#secador_Equipo").val());
        data.append("secador_Modelo",$("#secador_Modelo").val());
        data.append("secador_Serie",$("#secador_Serie").val());
        data.append("secador_Tecnico2_DNI",secador_id_tecnico_02=="0"?'':secador_id_tecnico_02);
        data.append("secador_Tecnico2_Nombre",secador_id_tecnico_02=="0"?'':$("#secador_id_tecnico_02 option:selected").text());
        data.append("secador_id_obl",$("#secador_id_obl").val());
        data.append("secador_Hora_Inicio",$("#secador_Serie").val());
        data.append("secador_Hora_Fin",$("#secador_Serie").val());
        data.append("secador_Horometro",$("#secador_Horometro").val());
        data.append("secador_TipoServicio",$("#secador_TipoServicio").val());
        data.append("secador_PresMax",$("#secador_PresMax").val());
        data.append("secador_Placa",$("#secador_Placa").val());
        data.append("secador_TipoControl",$("#secador_TipoControl").val());
        data.append("secador_VoltControl",$("#secador_VoltControl").val());
        data.append("secador_equipo_referencia",$("#secador_equipo_referencia").val());
        data.append("secador_mc_cheq_presion_succion_descarga",$("#secador_mc_cheq_presion_succion_descarga").is(":checked")?1:0);
        data.append("secador_mc_cheq_terminal_electrico",$("#secador_mc_cheq_terminal_electrico").is(":checked")?1:0);
        data.append("secador_mc_cheq_valvulas_servicio",$("#secador_mc_cheq_valvulas_servicio").is(":checked")?1:0);
        data.append("secador_mc_cheq_posibles_fugas_gas_refrig",$("#secador_mc_cheq_posibles_fugas_gas_refrig").is(":checked")?1:0);
        data.append("secador_mc_cheq_cojinetes_amort_perno_arand",$("#secador_mc_cheq_cojinetes_amort_perno_arand").is(":checked")?1:0);
        data.append("secador_uc_limpieza_serpentin_condensacion",$("#secador_uc_limpieza_serpentin_condensacion").is(":checked")?1:0);
        data.append("secador_uc_verif_motor_ventil_rodam_empel",$("#secador_uc_verif_motor_ventil_rodam_empel").is(":checked")?1:0);
        data.append("secador_uc_verif_control_presion_alta",$("#secador_uc_verif_control_presion_alta").is(":checked")?1:0);
        data.append("secador_uc_verif_control_presion_baja",$("#secador_uc_verif_control_presion_baja").is(":checked")?1:0);
        data.append("secador_ue_verif_aislamiento_termico",$("#secador_ue_verif_aislamiento_termico").is(":checked")?1:0);
        data.append("secador_ue_verif_ingreso_salida_aire",$("#secador_ue_verif_ingreso_salida_aire").is(":checked")?1:0);
        data.append("secador_ue_verif_limpieza_trampa",$("#secador_ue_verif_limpieza_trampa").is(":checked")?1:0);
        data.append("secador_gpm_limpieza_interior_exterior",$("#secador_gpm_limpieza_interior_exterior").is(":checked")?1:0);
        data.append("secador_gpm_limpieza_pintado",$("#secador_gpm_limpieza_pintado").is(":checked")?1:0);
        data.append("secador_cr_und_gas_refrigerante",secador_cr_und_gas_refrigerante=="0"?'':secador_cr_und_gas_refrigerante);
        data.append("secador_cr_med_voltaje_fase1",$("#secador_cr_med_voltaje_fase1").val());
        data.append("secador_cr_med_voltaje_fase2",$("#secador_cr_med_voltaje_fase2").val());
        data.append("secador_cr_med_voltaje_fase3",$("#secador_cr_med_voltaje_fase3").val());
        data.append("secador_cr_med_amperaje_arranque_l1",$("#secador_cr_med_amperaje_arranque_l1").val());
        data.append("secador_cr_med_amperaje_arranque_l2",$("#secador_cr_med_amperaje_arranque_l2").val());
        data.append("secador_cr_med_amperaje_arranque_l3",$("#secador_cr_med_amperaje_arranque_l3").val());
        data.append("secador_cr_med_amperaje_trabajo_l1",$("#secador_cr_med_amperaje_trabajo_l1").val());
        data.append("secador_cr_med_amperaje_trabajo_l2",$("#secador_cr_med_amperaje_trabajo_l2").val());
        data.append("secador_cr_med_amperaje_trabajo_l3",$("#secador_cr_med_amperaje_trabajo_l3").val());
        data.append("secador_cr_med_pres_gasrefri_reposo",$("#secador_cr_med_pres_gasrefri_reposo").val());
        data.append("secador_cr_med_pres_gasrefri_reposo_psialta",$("#secador_cr_med_pres_gasrefri_reposo_psialta").val());
        data.append("secador_cr_med_pres_gasrefri_reposo_psibaja",$("#secador_cr_med_pres_gasrefri_reposo_psibaja").val());
        data.append("secador_cr_med_pres_gasrefri_trabajo",$("#secador_cr_med_pres_gasrefri_trabajo").val());
        data.append("secador_cr_med_pres_gasrefri_trabajo_psialta",$("#secador_cr_med_pres_gasrefri_trabajo_psialta").val());
        data.append("secador_cr_med_pres_gasrefri_trabajo_psibaja",$("#secador_cr_med_pres_gasrefri_trabajo_psibaja").val());
        data.append("secador_cr_reg_valvula_expansion",$("#secador_cr_reg_valvula_expansion").is(":checked")?1:0);
        data.append("secador_cr_reg_pto_rocio_reposo",$("#secador_cr_reg_pto_rocio_reposo").val());
        data.append("secador_cr_reg_pto_rocio_operacion",$("#secador_cr_reg_pto_rocio_operacion").val());
        data.append("secador_vtee_contactor_termag",$("#secador_vtee_contactor_termag").is(":checked")?1:0);
        data.append("secador_vtee_pulsador_arran_parada",$("#secador_vtee_pulsador_arran_parada").is(":checked")?1:0);
        data.append("secador_vtee_luz_piloto",$("#secador_vtee_luz_piloto").is(":checked")?1:0);
        data.append("secador_vtee_rele_protector_sobrecarga",$("#secador_vtee_rele_protector_sobrecarga").is(":checked")?1:0);
        data.append("secador_vtee_control_temperatura",$("#secador_vtee_control_temperatura").is(":checked")?1:0);
        data.append("secador_vtee_otros",$("#secador_vtee_otros").is(":checked")?1:0);
        data.append("secador_desctrab",$("#secador_desctrab").val());
        data.append("secador_observac",$("#secador_observac").val());
        data.append("secador_observaciones_internas",$("#secador_observaciones_internas").val());
        data.append("secador_tipo_servicio_cotizacion",$("#secador_tipo_servicio_cotizacion").val());
        const response = await fetch(`${APP_URL}/secador/guardar-salir-regresar-reporte-paso2`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            if (status){
                const status1 = rest.data.status;
                const icon1 = rest.data.icon;
                const message1 = rest.data.message;
                const data1 = rest.data.data;
                if (status1){
                    if (opcion==="guardar_salir"){
                        emptyFormSecador();
                    }else{
                        /*countador_secador = 1;
                        $('#page_secador_2').removeClass('current');
                        $('#page_secador_1').addClass('current');
                        $(".btn-secador-stepper-next").show();
                        $(".btn-secador-stepper-previous").show();
                        $('#page_secador_content_2').removeClass('current');
                        $('#page_secador_content_1').addClass('current');
                        $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_1"); 
                        */
                        validarSecadorFotorInicialXTipoServ(select_sr_tipo_servicio, 'previous' )
                        beforeSendBtnLoad(".btn-secador-stepper-next",false);
                        beforeSendBtnLoad(".btn-secador-stepper-previous",false);
                        beforeSendBtnLoad("#btnsecadoraGuardarSalir",false);
                    }

                }else{
                    beforeSendBtnLoad(".btn-secador-stepper-next",false);
                    beforeSendBtnLoad(".btn-secador-stepper-previous",false);
                    beforeSendBtnLoad("#btnsecadoraGuardarSalir",false);
                    Toast.fire({
                        icon: icon1,
                        title:message1
                    }); 
                }
            }else{
                beforeSendBtnLoad(".btn-secador-stepper-next",false);
                beforeSendBtnLoad(".btn-secador-stepper-previous",false);
                beforeSendBtnLoad("#btnsecadoraGuardarSalir",false);
                Toast.fire({
                    icon: icon,
                    title:message
                });
            }                
        }).catch((error) => {
            console.log(error)
        });
    } 
    function emptyFormSecador(){
        setTimeout(() => {
            location.reload();
        }, 3000);
        
    }
    async function guardarSecadorSaliRegresarReportePaso3(opcion){
        if (opcion==="guardar_salir"){
            beforeSendBtnLoad(".btn-secador-stepper-next");
            beforeSendBtnLoad(".btn-secador-stepper-previous");
            beforeSendBtnLoad("#btnsecadoraGuardarSalir");
            emptyFormSecador();
        }  else{
            countador_secador = 2;
            $('#page_secador_3').removeClass('current');
            $('#page_secador_2').addClass('current');
            $(".btn-secador-stepper-next").show();
            $(".btn-secador-stepper-previous").show();
            $('#page_secador_content_3').removeClass('current');
            $('#page_secador_content_2').addClass('current');
            $("#btnsecadoraGuardarSalir").show().attr("data-paso", "paso_2");
        }    
    } 
    function resumenSecadorRporte (){
        const secador_cr_und_gas_refrigerante=$("#secador_cr_und_gas_refrigerante").val();
        $("#id_resumen_secador_empresa_nombre").text($("#secador_empresa_nombre").val());
        $("#id_resumen_secador_ruc").text($("#secador_ruc").val());
        $("#id_resumen_secador_empresa_direccion").text($("#secador_empresa_direccion").val());
        $("#id_resumen_secador_Equipo").text($("#secador_Equipo").val());
        $("#id_resumen_secador_Modelo").text($("#secador_Modelo").val());
        $("#id_resumen_secador_Serie").text($("#secador_Serie").val());
        $("#id_resumen_secador_PresMax").text($("#secador_PresMax").val());
        $("#id_resumen_secador_Placa").text($("#secador_Placa").val());
        $("#id_resumen_secador_Horometro").text($("#secador_Horometro").val());
        $("#id_resumen_secador_TipoControl").text($("#secador_TipoControl").val());
        $("#id_resumen_secador_VoltControl").text($("#secador_VoltControl").val());
        $("#secador_mc_cheq_presion_succion_descarga").is(":checked")? $("#id_resumen_secador_mc_cheq_presion_succion_descarga").prop("checked", true): $("#id_resumen_secador_mc_cheq_presion_succion_descarga").prop("checked", false);
        $("#secador_mc_cheq_terminal_electrico").is(":checked")? $("#id_resumen_secador_mc_cheq_terminal_electrico").prop("checked", true): $("#id_resumen_secador_mc_cheq_terminal_electrico").prop("checked", false);
        $("#secador_mc_cheq_valvulas_servicio").is(":checked")? $("#id_resumen_secador_mc_cheq_valvulas_servicio").prop("checked", true): $("#id_resumen_secador_mc_cheq_valvulas_servicio").prop("checked", false);
        $("#secador_mc_cheq_posibles_fugas_gas_refrig").is(":checked")? $("#id_resumen_secador_mc_cheq_posibles_fugas_gas_refrig").prop("checked", true): $("#id_resumen_secador_mc_cheq_posibles_fugas_gas_refrig").prop("checked", false);
        $("#secador_mc_cheq_cojinetes_amort_perno_arand").is(":checked")? $("#id_resumen_secador_mc_cheq_cojinetes_amort_perno_arand").prop("checked", true): $("#id_resumen_secador_mc_cheq_cojinetes_amort_perno_arand").prop("checked", false);
        $("#secador_uc_limpieza_serpentin_condensacion").is(":checked")? $("#id_resumen_secador_uc_limpieza_serpentin_condensacion").prop("checked", true): $("#id_resumen_secador_uc_limpieza_serpentin_condensacion").prop("checked", false);
        $("#secador_uc_verif_motor_ventil_rodam_empel").is(":checked")? $("#id_resumen_secador_uc_verif_motor_ventil_rodam_empel").prop("checked", true): $("#id_resumen_secador_uc_verif_motor_ventil_rodam_empel").prop("checked", false);
        $("#secador_uc_verif_control_presion_alta").is(":checked")? $("#id_resumen_secador_uc_verif_control_presion_alta").prop("checked", true): $("#id_resumen_secador_uc_verif_control_presion_alta").prop("checked", false);
        $("#secador_uc_verif_control_presion_baja").is(":checked")? $("#id_resumen_secador_uc_verif_control_presion_baja").prop("checked", true): $("#id_resumen_secador_uc_verif_control_presion_baja").prop("checked", false);
        $("#secador_ue_verif_aislamiento_termico").is(":checked")? $("#id_resumen_secador_ue_verif_aislamiento_termico").prop("checked", true): $("#id_resumen_secador_ue_verif_aislamiento_termico").prop("checked", false);
        $("#secador_ue_verif_ingreso_salida_aire").is(":checked")? $("#id_resumen_secador_ue_verif_ingreso_salida_aire").prop("checked", true): $("#id_resumen_secador_ue_verif_ingreso_salida_aire").prop("checked", false);
        $("#secador_ue_verif_limpieza_trampa").is(":checked")? $("#id_resumen_secador_ue_verif_limpieza_trampa").prop("checked", true): $("#id_resumen_secador_ue_verif_limpieza_trampa").prop("checked", false);
        $("#secador_gpm_limpieza_interior_exterior").is(":checked")? $("#id_resumen_secador_gpm_limpieza_interior_exterior").prop("checked", true): $("#id_resumen_secador_gpm_limpieza_interior_exterior").prop("checked", false);
        $("#secador_gpm_limpieza_pintado").is(":checked")? $("#id_resumen_secador_gpm_limpieza_pintado").prop("checked", true): $("#id_resumen_secador_gpm_limpieza_pintado").prop("checked", false);
        $("#id_resumen_cr_und_gas_refrigerante_tipo").text(secador_cr_und_gas_refrigerante=="0"?'':secador_cr_und_gas_refrigerante);
        $("#id_resumen_secador_cr_med_voltaje_fase1").text($("#secador_cr_med_voltaje_fase1").val());
        $("#id_resumen_secador_cr_med_voltaje_fase2").text($("#secador_cr_med_voltaje_fase2").val());
        $("#id_resumen_secador_cr_med_voltaje_fase3").text($("#secador_cr_med_voltaje_fase3").val());
        $("#id_resumen_secador_cr_med_amperaje_arranque_l1").text($("#secador_cr_med_amperaje_arranque_l1").val());
        $("#id_resumen_secador_cr_med_amperaje_arranque_l2").text($("#secador_cr_med_amperaje_arranque_l2").val());
        $("#id_resumen_secador_cr_med_amperaje_arranque_l3").text($("#secador_cr_med_amperaje_arranque_l3").val());
        $("#id_resumen_secador_cr_med_amperaje_trabajo_l1").text($("#secador_cr_med_amperaje_trabajo_l1").val());
        $("#id_resumen_secador_cr_med_amperaje_trabajo_l2").text($("#secador_cr_med_amperaje_trabajo_l2").val());
        $("#id_resumen_secador_cr_med_amperaje_trabajo_l3").text($("#secador_cr_med_amperaje_trabajo_l3").val());
        $("#id_resumen_secador_cr_med_pres_gasrefri_reposo").text($("#secador_cr_med_pres_gasrefri_reposo").val());
        $("#id_resumen_secador_cr_med_pres_gasrefri_reposo_psialta").text($("#xxxxxxsecador_cr_med_pres_gasrefri_reposo_psialtaxx").val());
        $("#id_resumen_secador_cr_med_pres_gasrefri_reposo_psibaja").text($("#secador_cr_med_pres_gasrefri_reposo_psibaja").val());
        $("#id_resumen_secador_cr_med_pres_gasrefri_trabajo").text($("#secador_cr_med_pres_gasrefri_trabajo").val());
        $("#id_resumen_secador_cr_med_pres_gasrefri_trabajo_psialta").text($("#secador_cr_med_pres_gasrefri_trabajo_psialta").val());
        $("#id_resumen_secador_cr_med_pres_gasrefri_trabajo_psibaja").text($("#secador_cr_med_pres_gasrefri_trabajo_psibaja").val());
        $("#secador_cr_reg_valvula_expansion").is(":checked")? $("#id_resumen_secador_cr_reg_valvula_expansion").prop("checked", true): $("#id_resumen_secador_cr_reg_valvula_expansion").prop("checked", false);
        $("#id_resumen_secador_cr_reg_pto_rocio_reposo").text($("#secador_cr_reg_pto_rocio_reposo").val());
        $("#id_resumen_secador_cr_reg_pto_rocio_operacion").text($("#secador_cr_reg_pto_rocio_operacion").val());
        $("#secador_vtee_contactor_termag").is(":checked")? $("#id_resumen_secador_vtee_contactor_termag").prop("checked", true): $("#id_resumen_secador_vtee_contactor_termag").prop("checked", false);
        $("#secador_vtee_pulsador_arran_parada").is(":checked")? $("#id_resumen_secador_vtee_pulsador_arran_parada").prop("checked", true): $("#id_resumen_secador_vtee_pulsador_arran_parada").prop("checked", false);
        $("#secador_vtee_luz_piloto").is(":checked")? $("#id_resumen_secador_vtee_luz_piloto").prop("checked", true): $("#id_resumen_secador_vtee_luz_piloto").prop("checked", false);
        $("#secador_vtee_rele_protector_sobrecarga").is(":checked")? $("#id_resumen_secador_vtee_rele_protector_sobrecarga").prop("checked", true): $("#id_resumen_secador_vtee_rele_protector_sobrecarga").prop("checked", false);
        $("#secador_vtee_control_temperatura").is(":checked")? $("#id_resumen_secador_vtee_control_temperatura").prop("checked", true): $("#id_resumen_secador_vtee_control_temperatura").prop("checked", false);
        $("#secador_vtee_otros").is(":checked")? $("#id_resumen_secador_vtee_otros").prop("checked", true): $("#id_resumen_secador_vtee_otros").prop("checked", false);
    }
    $(document).on("click", "#btnsecadoractualizarFinal", function(){
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
                actualizarFinalSecador();
            }
        }));
    });
    
    async function actualizarFinalSecador(){
        $("#kt_secador_form_input_page_4 .cls_empty, #kt_secador_form_input_page_2 .cls_empty").empty(); 
        beforeSendBtnLoad(".btn-secador-stepper-next");
        beforeSendBtnLoad(".btn-secador-stepper-previous");
        beforeSendBtnLoad("#btnsecadoractualizarFinal");
        var pushFirmaImages =[]
        var cantidadFirma = 0;
        $(".kt_secador_signature_datos").each(function(i, val){
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
                    ruta_relativa: val_ruta_relativa,
                    programacionid:$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid"),
                });
            }
        });
        if (cantidadFirma!=2){
            Toast.fire({
                icon: 'warning',
                title: "Campo vacio: falta la firma del cliente y la firma del técnico." 
            }); 
            beforeSendBtnLoad(".btn-secador-stepper-next", false);
            beforeSendBtnLoad(".btn-secador-stepper-previous", false);
            beforeSendBtnLoad("#btnsecadoractualizarFinal", false);
            return;
        }
        const dataEmailContact =[];
        var counterContactEmail=0;
        $("#kt_secador_selected_email .kt_uni_cnt_email").each(function(i, val){
            var email = $(this).data("email");
            counterContactEmail++;
            dataEmailContact.push({
                email: email
            });
        });
        /*
        if (counterContactEmail==0){
            Toast.fire({
                icon: 'warning',
                title: "Seleccione un contacto para el envio de correo por favor." 
            }); 
            beforeSendBtnLoad(".btn-secador-stepper-next", false);
            beforeSendBtnLoad(".btn-secador-stepper-previous", false);
            beforeSendBtnLoad("#btnsecadoractualizarFinal", false);
            return;
        }*/
        $arrayGuiaRem = [];
        $counterTotalGuia =0;
        $(".chk_guia_remision").each(function(i, val){
            $counterTotalGuia++;
            var valor = $(this).is(":checked");
            var ot = $(this).data("ot");
            var numguia = $(this).data("numguia");
            var numserie = $(this).data("numserie");
            if ( $(this).is(":checked")){
                $arrayGuiaRem.push({
                    valor:valor,
                    ot:ot,
                    numguia:numguia,
                    numserie:numserie,
                });
            }
        })
        if ($counterTotalGuia>0){
            if ($arrayGuiaRem.length==0){
                Toast.fire({  
                    icon: 'warning',
                    title: "Seleccione al menos una guia de remisión."
                });
                beforeSendBtnLoad(".btn-secador-stepper-next", false);
                beforeSendBtnLoad(".btn-secador-stepper-previous", false);
                beforeSendBtnLoad("#btnsecadoractualizarFinal", false);
                return;
            }
        }
        const data = new FormData();        
        const secador_NumReporte = $(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-reporte_numero")
        const programacionid = $(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-programacionid")
        const secador_NumOT = $(".kc_list_ot").children(".active").parent(".kc_list_ot ").attr("data-numot")
        data.append('_token', $("input[name='_token']").val());
        data.append("secador_NumReporte",secador_NumReporte);
        data.append("programacionid",programacionid);
        data.append("secador_NumOT",secador_NumOT);
        data.append("secador_nombre_jefe_encargado",$("#id_secador_nombre_jefe_encargado").val());
        data.append("imagesFirma",JSON.stringify(pushFirmaImages));
        data.append("dataEmailContact",JSON.stringify(dataEmailContact));
        data.append("secador_Equipo_Id",$("#secador_Equipo_Id").val());
        data.append("secador_TipoServicio",$("#secador_TipoServicio").val());
        data.append("arrayGuiaRem",JSON.stringify($arrayGuiaRem)); 
        const response = await fetch(`${APP_URL}/secador/actualizar-final-secador`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            beforeSendBtnLoad(".btn-secador-stepper-next", false);
            beforeSendBtnLoad(".btn-secador-stepper-previous", false);
            beforeSendBtnLoad("#btnsecadoractualizarFinal", false);
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            if(type==="empty"){
                $txtEmpty = '';
                $.each( datos, function( key, value ) {
                    $txtEmpty = value;
                    if (key != undefined) {
                        $("#kt_secador_form_input_page_2 input[name='"+key+"'], #kt_secador_form_input_page_2 select[name='"+key+"'], #kt_secador_form_input_page_2 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
                        $("#kt_secador_form_input_page_4 input[name='"+key+"'], #kt_secador_form_input_page_4 select[name='"+key+"'], #kt_secador_form_input_page_4 textarea[name='"+key+"']").parent().children(".cls_empty").append(value);
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
                        timer: 3000
                    }).then((function(result){
                        if(result.value){
                            location.reload();
                        }
                    }));
                    emptyFormSecador();
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
    $(document).on("input", "#service_equipo_horometro, #secador_Horometro", function (event) {
        var val = $(this).val();
        $(this).val(val.replace(".", ""));
    });
    
    async function getGuiaDetalleByOt(){
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append("orden_trabajo",$(".kc_list_ot").children(".active").parent(".kc_list_ot").attr("data-numot"),);
        const response = await fetch(`${APP_URL}/reporte/get-guia-detalle-by-ot`, {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            const rest = await response.json();
            const datos = rest.data;
            const type = rest.type;
            const status = rest.status;
            const icon = rest.icon;
            const message = rest.message;
            console.log(rest)
            if (status){
                const status1 = rest.status;
                const icon1 = rest.icon;
                const message1 = rest.message;
                const data1 = rest.data;
                if (status1){
                    $(".kt_customer_view_payment_method").html(data1);             
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
})
