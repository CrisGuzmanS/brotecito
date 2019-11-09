@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- COLUMNA IZQUIERDA -->
        <div class="col-12 col-md-6 text-center my-auto">
            <h1>De tu <strong><span class="text-orange">casa</span></strong> a tu <strong><span class="text-orange">tasa</span></strong>.</h1>
            <p>
                LLegó este magnifico sistema a tu vida. Cuidarás de tus plantas,
                las verás crecer, estarán contigo en los momentos más importantes de tu vida.
            </p>
            <button class="btn btn-outline-dark">
                Caracteristicas
            </button>
        </div>
        <!-- COLUMNA DERECHA -->
        <div class="col-12 col-md-6">
            <img src="{{asset('img/brotecito_animacion.gif')}}" class="img-fluid">
        </div>
    </div>
</div>

@endsection