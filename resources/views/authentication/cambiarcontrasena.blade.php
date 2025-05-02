@extends('authentication.masterlogin')
@section('title', 'Cambiar contraseña - MR PERU')
@section('content')
@if ($compact["estadoApiRest"])
    @if ($compact["data"]["status"])
        @if ($compact["data"]["data"][0]["fecha_expired"]==0)
            <form class="form w-100" novalidate="novalidate" id="kt_cambiar_pass_form" method="POST" action="#">
                @csrf
                <div class="text-center mb-5">
                    <h1 class="text-dark mb-3" style="font-size:60px;" >Bienvenido</h1>
                </div>
                <div class="fv-row mb-5">
                    <label class="form-label fs-4 fw-bolder text-dark">
                        <span class="required">Contraseña</span>
                    </label>
                    <input type="hidden" id="token_2" name="token_2" autocomplete="off" value="{{$compact["token"]}}"/>
                    <input type="hidden" id="email_cambiar" name="email_cambiar" autocomplete="off"  value="{{$compact["data"]["data"][0]["email"]}}" />
                    <input placeholder="Ingrese una contraseña" class="form-control form-control-lg fs-4" type="password" id="password_cambiar" name="password_cambiar" autocomplete="off" />
                </div>
                <div class="fv-row mb-5">
                    <label class="form-label fs-4 fw-bolder text-dark">
                        <span class="required">Confirmar contraseña</span>
                    </label>
                    <input placeholder="Confirme su contraseña su cuenta" class="form-control form-control-lg fs-4" type="password" id="password_confirm" name="password_confirm" autocomplete="off" />
                </div>
                <div class="text-center">
                    <button type="submit" id="kt_cambiar_pass_submit" class="btn btn-lg btn-dark w-100 mb-5 btn-dark fs-4">
                        <span class="indicator-label">Enviar</span>
                        <span class="indicator-progress">Espere por favor...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        @else
            <div class="text-center mb-5">
                <h1 class="text-dark mb-3" style="font-size:30px;" >Token expirado</h1>
            </div>
        @endif
    @else
        <div class="text-center mb-5">
            <h1 class="text-dark mb-3" style="font-size:30px;" >Sin resultados</h1>
        </div>
    @endif
@else
    <div class="text-center mb-5">
        <h1 class="text-dark mb-3" style="font-size:30px;" >Servicio no responde</h1>
    </div>
@endif
@endsection()