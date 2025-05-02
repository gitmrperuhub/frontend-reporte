@extends('master.master')
@section('title', 'Farmacia - Ventas')
@section('content')
<div class="row gy-5 g-xl-8" data-kt-menu="true"  id="kt_menu_6234242342342342">
    @csrf
    <div class="col-xl-12">
        <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
            <div class="pt-lg-10 mb-10">
                <h1 class="fw-bolder fs-2qx text-gray-800 mb-10 pt-20">Lo sentimos, usted no tiene <br> permiso para este modulo</h1>
                <div class="fw-bold fs-3 text-muted mb-15">Comuniquese con el administrador.</div>
                <div class="text-center">
                    <a href="{{route('home')}}" class="btn btn-lg btn-primary fw-bolder">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
