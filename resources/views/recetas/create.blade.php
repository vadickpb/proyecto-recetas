@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha256-scOSmTNhvwKJmV7JQCuR7e6SQ3U9PcJ5rM/OMgL78X8=" crossorigin="anonymous" />   
@endsection

@section('botones')

<a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 font-weight-bold text-uppercase">
    <svg class="icono" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg>
    Volver
</a>

@endsection

@section('content')

<h2 class="text-center mb-5">Crear Nueva Receta</h2>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">


        <form action="{{ route('recetas.store') }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf


            <div class="form-group">
                <label for="titulo" >Titulo de la receta</label>
                <input 
                    type="text" 
                    name="titulo" 
                    id="titulo"
                    class="form-control @error('titulo') is-invalid @enderror"
                    placeholder="Titulo Receta"
                    value={{ old('titulo') }}
                    >

                    @error('titulo')

                    <span class="invalid-feedback d-block" role="alert">

                        <strong>{{ $message }}</strong>
                    </span>

                    @enderror

            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select 
                        name="categoria" 
                        id="categoria" 
                        class="form-control @error('categoria') is-invalid @enderror"
                         >

                    <option value="">-- Seleccione --</option>

                    @foreach ($categorias as $categoria) 

                    <option value="{{ $categoria->id }}"  {{ old('categoria') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>

                    @endforeach

                </select>

                @error('categoria')                  
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="form-group mt-3">
                <label for="preparacion">Preparación</label>
                <input type="hidden" name="preparacion" id="preparacion" value="{{ old('preparacion') }}">
                <trix-editor input="preparacion"
                             class="form-control @error('preparacion') is-invalid @enderror"
                ></trix-editor>

                @error('preparacion')                  
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="form-group mt-3">
                <label for="ingredientes">Ingredientes</label>
                <input type="hidden" name="ingredientes" id="ingredientes" value="{{ old('ingredientes') }}">
                <trix-editor input="ingredientes"
                            class="form-control @error('ingredientes') is-invalid @enderror"
                
                ></trix-editor>

                @error('ingredientes')                  
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>


            <div class="form-group mt-3">           
                <label for="imagen">Elige la Imagen</label>

                <input 
                    type="file"
                    id="imagen"
                    class="form-control @error('imagen') is-invalid @enderror"
                    name="imagen"
                >

                @error('imagen')                  
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>



            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar Receta">
            </div>

        </form>
    </div>
</div>






@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha256-b2QKiCv0BXIIuoHBOxol1XbUcNjWqOcZixymQn9CQDE=" crossorigin="anonymous" defer></script>
@endsection