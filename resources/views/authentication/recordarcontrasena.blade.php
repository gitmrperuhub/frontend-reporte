@extends('authentication.masterlogin')
@section('title', 'Recordar contraseña - MR PERU')

@section('content')
<form class="form w-100" novalidate="novalidate" id="kt_remeber_pass_form" method="POST" action="#">
	@csrf
	<div class="text-center mb-5">
		<h1 class="text-dark mb-3" style="font-size:60px;" >Bienvenido</h1>
	</div>
	<div class="fv-row mb-5">
        <label class="form-label fs-4 fw-bolder text-dark">
            <span class="required">Usuario</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Ingrese su correo y se le enviara un link para ingresar su nueva contraseña"></i>
        </label>
		<input placeholder="Ingrese su cuenta" class="form-control form-control-lg fs-4" type="text" id="email_pass" name="email_pass" autocomplete="off" />
	</div>
	<div class="text-center">
		<button type="submit" id="kt_remeber_pass_submit" class="btn btn-lg btn-dark w-100 mb-5 btn-dark fs-4">
			<span class="indicator-label">Enviar</span>
			<span class="indicator-progress">Espere por favor...
			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
		</button>
	</div>
    <div class="text-center">
		<a href="{{route('login')}}" class="btn btn-lg btn-light-primary fs-4 me-3 w-100" >
            <span class="svg-icon svg-icon-3 me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor"></rect>
                    <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor"></path>
                </svg>
            </span>
        Regresar</a>
        
	</div>
</form>
@endsection()