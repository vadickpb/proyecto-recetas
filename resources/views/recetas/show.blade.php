@extends('layouts.app')

@section('botones')    
<a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 font-weight-bold text-uppercase">
    <svg class="icono" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg>
    Volver
</a>
@endsection

@section('content')

    

        {{-- <h1>{{ $receta }}</h1> --}}


    <article class="contenido-receta">
        <h1 class="text-center mb-4">{{ $receta->titulo }}</h1>

        <div class="imagen-receta">
            <img src="/storage/{{ $receta->imagen }}" class="w-100" alt="">
        </div>

        <div class="receta-meta mt-2">


            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                {{ $receta->categoria->nombre }}
            </p>

            <p>
                <a href="{{ route('perfiles.show',['perfil'=>$receta->autor->id]) }}"><span class="font-weight-bold text-primary">Autor:</span>
                {{ $receta->autor->name }}</a> 
            </p>

            <p>
                <span class="font-weight-bold text-primary">Fecha:</span>
                @php
                    $fecha = $receta->created_at
                @endphp

                <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
                
            </p>


            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>

                {!! $receta->ingredientes !!}
            </div>

            <div class="preparacion">
                <h2 class="my-3 text-primary">Preparación</h2>

                {!! $receta->preparacion !!}
            </div>


        </div>
    </article>
    
@endsection

