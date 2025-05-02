@extends('authentication.masterlogin')
@section('title', 'Iniciar Sesión - MR PERU')

@section('content')
<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="#">
	@csrf
	<div class="text-center mb-5">
		<h1 class="text-dark mb-3" style="font-size:60px;" >Bienvenido</h1>
	</div>
	<div class="fv-row mb-5">
		<label class="form-label fs-4 fw-bolder text-dark">
			<span class="required">Usuario</span>
		</label>
		<input placeholder="Ingrese su cuenta" class="form-control form-control-lg fs-4" type="text" id="email" name="email" autocomplete="off" />
	</div>
	<div class="fv-row mb-5 position-relative">
		<div class="d-flex flex-stack mb-2">
			<label class="form-label fw-bolder text-dark fs-4 mb-0">
				<span class="required">Contraseña</span>
			</label>
			<a href="{{route('remenber.password')}}" class="link-primary fs-4 fw-bolder">¿Has olvidado tu contraseña?</a>
		</div>
		<input placeholder="Ingrese su contraseña" class="form-control form-control-lg fs-4" type="password" id="password" name="password" autocomplete="off" />
		<div class="position-absolute" style="top: 42px;right: 17px;" > 
			<i class="fonticon-view fs-1 position-relative cls-view-see-password" style="cursor: pointer;">
				<p class="fs-5 position-absolute" style="display:none; top:7px;left:7px;">/</p>
			</i>
		</div>
	</div>
	<div class="fv-row mb-5 position-relative">
		<label class="form-check form-check-custom form-check-solid me-10">
			<input class="form-check-input h-20px w-20px" type="checkbox" checked name="remember_password" id="remember_password" value="email">
			<span class="form-check-label fw-bold fs-4">Recordar usuario</span>
		</label>
	</div>
	<div class="text-center">
		<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-dark w-100 mb-5 btn-dark fs-4">
			<span class="indicator-label">Ingresar</span>
			<span class="indicator-progress">Espere por favor...
			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
		</button>
	</div>
</form>
@endsection()