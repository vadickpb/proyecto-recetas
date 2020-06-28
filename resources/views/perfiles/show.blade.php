@extends('layouts.app')

@section('botones')
<a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 font-weight-bold text-uppercase">
    <svg class="icono" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
            clip-rule="evenodd"></path>
    </svg>
    Volver
</a>
@endsection

@section('content')

<div class="row">
    <div class="col-md-5">
        @if ($perfil->imagen)
        <img src="/storage/{{ $perfil->imagen }}" alt="" class="w-100 rounded-circle" alt="imagen chef">
        @endif
    </div>

    <div class="col-md-7 mt-5 mt-md-0">
        <h2 class="text-center mb-2 text-primary">{{ $perfil->usuario->name }}</h2>
        <a href="{{ $perfil->usuario->url }}">Visitar Sitio Web</a>
        <div class="biografia">
            {!! $perfil->biografia !!}
        </div>
    </div>
</div>

<h2 class="text-center my-5">Recetas Creadas por: {{ $perfil->usuario->name }}</h2>

<div class="container">
    <div class="row mx-auto bg-white">
        @if ( count($recetas) > 0 )
        @foreach ($recetas as $receta)
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="/storage/{{ $receta->imagen }}" alt="imagen receta" class="card-img-top">

                <div class="card-body">
                    <h3 class="text-center">{{ $receta->titulo }}</h3>
                    <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="font-weight-bold  btn btn-outline-primary btn-block text-uppercase mt-3">Ver Receta</a>
                </div>
            </div>
        </div>

        @endforeach

        @else
        <p class="text-center w-100">El usuario no ha creado recetas</p>
        @endif        
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $recetas->links() }}
    </div>

</div>

@endsection