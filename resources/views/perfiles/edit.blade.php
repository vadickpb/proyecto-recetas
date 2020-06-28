@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha256-scOSmTNhvwKJmV7JQCuR7e6SQ3U9PcJ5rM/OMgL78X8=" crossorigin="anonymous" />   
@endsection

@section('botones')
<a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection

@section('content')
{{-- {{ $perfil }} --}}

    <h1 class="text-center">Editar mi perfil</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white pd-3">

            <form 
                action="{{ route('perfiles.update', ['perfil' => $perfil->id]) }}"
                method="POST"
                enctype="multipart/form-data"
            >
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="nombre" >Nombre</label>
                    <input 
                        type="text" 
                        name="nombre" 
                        id="nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        placeholder="Tu Nombre"
                        value="{{ $perfil->usuario->name }}"
                        >
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="url" >Sitio Web</label>
                    <input 
                        type="text" 
                        name="url" 
                        id="url"
                        class="form-control @error('url') is-invalid @enderror"
                        placeholder="Tu Sitio Web"
                        value="{{ $perfil->usuario->url }}"
                        >
                    @error('url')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group mt-3">
                    <label for="biografia">Biografía</label>
                    <input 
                        type="hidden" 
                        name="biografia" 
                        id="biografia" 
                        value="{{ $perfil->biografia }}"
                        >
                    <trix-editor input="biografia"
                                class="form-control @error('biografia') is-invalid @enderror"
                    ></trix-editor>    
                    @error('biografia')                  
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror    
                </div>


                <div class="form-group mt-3">           
                    <label for="imagen">Tu Imagen</label>
    
                    <input 
                        type="file"
                        id="imagen"
                        class="form-control @error('imagen') is-invalid @enderror"
                        name="imagen"
                    >
                    
                    @if ($perfil->imagen)
                        <div class="mt-4">
                            <p>Imagen Actual:</p>
                            <img src="/storage/{{ $perfil->imagen }}" alt="" style="width: 300px">
                        </div>
                        @error('imagen')                  
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Editar Perfil">
                </div>


            </form>

        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha256-b2QKiCv0BXIIuoHBOxol1XbUcNjWqOcZixymQn9CQDE=" crossorigin="anonymous" defer></script>
@endsection