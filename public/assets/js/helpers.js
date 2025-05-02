

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    function beforeSendBtnLoad(IdElement,state =true){
        if(state){
            $(IdElement).prop("disabled", true);
            $(IdElement+" .indicator-label").hide();
            $(IdElement+" .indicator-progress").show();
            return;
        }
        $(IdElement).prop("disabled", false);
        $(IdElement+" .indicator-label").show();
        $(IdElement+" .indicator-progress").hide();
    }
    function beforeSendInputLoad(IdElement,state =true){
        if(state){
            $(IdElement).prop("disabled", true);
            $(IdElement).parent().children('.indicator-progress').css({"display":'inline-block'});
            return;
        }
        $(IdElement).prop("disabled", false);
        $(IdElement).parent().children('.indicator-progress').hide();
    }
    $(document).on("keypress", "input[data-number='true']", function(event){
        return solonumeros(event);
    });
    function solonumeros(e){
        var key = e.keyCode || e.which,
            tecla = String.fromCharCode(key).toLowerCase(),
            numeros = " 0123456789",
            especiales = [8, 37, 39, 46],
            tecla_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (numeros.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
        }
    }

    function validateFormProducto(IdElementForm){//#kt_modal_create_producto_form
        $(".empty_error").empty();
        var response =false;
        $(IdElementForm+ " .form_validate select, "+IdElementForm+" .form_validate input" ).each(function(i, a) {
            var _localName = $(this)[0].localName;
            var _valor = $(this).val();
            if(_localName=='select'){
                if(_valor=='0' || _valor==''){
                    response =true;
                    var _data_error = $(this).parent().children('.empty_error').data("error");
                    $(this).parent().children('.empty_error').text(_data_error);
                }
            }
            if(_localName=='input'){
                if(_valor==''){
                    response =true;
                    var _data_error = $(this).parent().children('.empty_error').data("error");
                    var _data_error_date = $(this).parent().parent().children('.empty_error').data("error");
                    $(this).parent().children('.empty_error').text(_data_error);
                    $(this).parent().parent().children('.empty_error').text(_data_error_date);
                }
            }
        });
        return response;
    }