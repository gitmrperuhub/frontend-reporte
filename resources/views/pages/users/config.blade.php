@extends('master.master')
@section('title', 'Farmacia - Ventas')
@section('content')
<div class="row gy-5 g-xl-8" data-kt-menu="true"  id="kt_menu_6234242342342342">
    @csrf
    <div class="col-xl-6">
        <select class="form-select form-select-solid" id="IdCombo_user" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6234242342342342" data-allow-clear="false">
            <option value="0">Seleccione un usuario</option>
            @foreach ($userArray as $val )
                <option value="{{$val->id}}">{{$val->document_number}} | {{$val->name}} {{$val->last_name}}</option>
            @endforeach
        </select>
        <br>
        <button type="button" class="btn btn-primary d-none"   title="Check out 22 more demos" data-bs-toggle="tooltip" data-bs-placement="bottom">Crear </button>
    </div>
    <div class="col-xl-12" style="margin:0;"> </div>
    <div class="col-xl-6">
        <div id="idElement_menu" ></div>
    </div>
</div>
@endsection()
@push('script')
<script>
    $(document).on("change", "#IdCombo_user", function(){
        var val = $(this).val();
        console.log(val);
        ConfigurarModuloByUser(val);
    });
    async function ConfigurarModuloByUser(id_iuser){
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('id_iuser', id_iuser);
        const response = await fetch( APP_URL + '/api/module/menu_by_user', {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            const rest = await response.json();
            const estado = rest.estado;
            if (rest.response=='success'){
                $("#idElement_menu").html(rest.data);
                return;
            }
            Toast.fire({
                icon: 'error',
                title: 'Ocurrio un problema, vuelva a intentarlo'
            });
        }).catch((error) => {
            console.log(error)
        });
    }  
    $(document).on("change", ".check_module_usr", function(){
        var user_id = $("#IdCombo_user").val();
        var module_id = $(this).val();
        var id_permiso = $(this).parent().attr("data-id_permiso");
        $getElement = $(this).parent();
        var status = 0;
        if($(this).prop('checked')){
            status =1;
        }
        saveModuloByUser(user_id, module_id, status, id_permiso, $getElement);
        return;
    });
    async function saveModuloByUser(user_id, module_id, status, id_permiso, $getElement){
        const data = new FormData();
        data.append('_token', $("input[name='_token']").val());
        data.append('user_id', user_id);
        data.append('module_id', module_id);
        data.append('id_permiso', id_permiso);
        data.append('status', status);
        const response = await fetch( APP_URL + '/api/module/config_menu_by_user', {
            method: 'POST',
            body: data
        }).then(async (response)=> {
            const rest = await response.json();
            const estado = rest.estado;
            console.log(rest.data.id);
            $($getElement).attr("data-id_permiso", rest.data.id);
        }).catch((error) => {
            console.log(error)
        });
    }
</script>
@endpush