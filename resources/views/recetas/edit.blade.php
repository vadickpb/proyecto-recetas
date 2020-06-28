@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha256-scOSmTNhvwKJmV7JQCuR7e6SQ3U9PcJ5rM/OMgL78X8=" crossorigin="anonymous" />   
@endsection

@section('botones')
<a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection

@section('content')

{{ $receta }}
<h2 class="text-center mb-5">Editar Receta</h2>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">


        <form action="{{ route('recetas.update',['receta' => $receta->id]) }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf

            @method('PUT')
            <div class="form-group">
                <label for="titulo" >Titulo de la receta</label>
                <input 
                    type="text" 
                    name="titulo" 
                    id="titulo"
                    class="form-control @error('titulo') is-invalid @enderror"
                    placeholder="Titulo Receta"
                    value="{{ $receta->titulo }}"
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

                    <option value="{{ $categoria->id }}"  {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}>
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
                <input type="hidden" name="preparacion" id="preparacion" value="{{ $receta->preparacion }}">
                <trix-editor input="preparacion"
                            class="form-control @error('preparacion') is-invalid @enderror"
                >{{ $receta->preparacion }}</trix-editor>

                @error('preparacion')                  
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="form-group mt-3">
                <label for="ingredientes">Ingredientes</label>
                <input type="hidden" name="ingredientes" id="ingredientes" value="{{ $receta->ingredientes }}">
                <trix-editor input="ingredientes"
                            class="form-control @error('ingredientes') is-invalid @enderror"
                            value="{!! $receta->ingredientes !!}"
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

                <div class="mt-4">
                    <p>Imagen Actual:</p>

                    <img src="/storage/{{ $receta->imagen }}" alt="" style="width: 300px">
                </div>

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