@extends('master.master')
@section('title', 'Usuarios - Ventas')
@section('content')
<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-4">
        <pre>{{Auth::user()}}</pre>
        <pre>{{$p_routes}}</pre>
        <pre>{{$p_urll}}</pre>
        <pre>{{$idModule}}</pre>
        <button type="button" class="btn btn-dark"   title="Check out 22 more demos" data-bs-toggle="tooltip" data-bs-placement="bottom">Usuario </button>
    </div>
</div>
@endsection()