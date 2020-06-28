@extends('layouts.app')

@section('botones')
<a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2">Volver</a>
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

@endsection